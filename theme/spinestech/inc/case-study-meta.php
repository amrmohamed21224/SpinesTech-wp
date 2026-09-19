<?php
/**
 * Case Study — Proof Metadata Schema
 * File: inc/case-study-meta.php
 *
 * Defines the canonical schema for all Case Study proof fields.
 * Provides helper functions consumed by single-st_case_study.php
 * and the st-cs-proof-header / st-cs-outcome-block template parts.
 *
 * Schema fields (all optional in CMS, all typed here):
 *   engagement_type    : 'direct' | 'white_label' | 'co_execution' | 'not_disclosed'
 *   spines_role        : free text — SpinesTech's specific contribution
 *   scope              : free text — what was/wasn't in scope
 *   timeline           : e.g. "8 months" / "Q1 2024 – Q3 2024"
 *   platforms          : comma-separated — iOS, Android, Web, Admin Panel …
 *   status             : 'live' | 'beta' | 'internal' | 'sunset'
 *   measurable_outcomes: JSON or free text — only shown when evidence_note is set
 *   evidence_note      : internal source / measurement context for outcomes
 *   disclosure_note    : public-facing caveat (e.g. "Published with client approval")
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── 1. Register ACF field group (only when ACF is active) ─────────────────────
add_action( 'acf/init', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'      => 'group_cs_proof_meta',
        'title'    => 'Proof Metadata (SpinesTech)',
        'fields'   => [
            [
                'key'           => 'field_cs_engagement_type',
                'label'         => 'Engagement Type',
                'name'          => 'engagement_type',
                'type'          => 'select',
                'instructions'  => 'What was SpinesTech\'s relationship to this project?',
                'required'      => 0,
                'choices'       => [
                    'direct'        => 'Direct (client-facing)',
                    'white_label'   => 'White-Label (through agency/partner)',
                    'co_execution'  => 'Co-Execution (alongside client team)',
                    'not_disclosed' => 'Not Disclosed',
                ],
                'allow_null'    => 1,
                'default_value' => '',
            ],
            [
                'key'           => 'field_cs_spines_role',
                'label'         => 'SpinesTech\'s Role',
                'name'          => 'spines_role',
                'type'          => 'textarea',
                'instructions'  => 'Describe specifically what SpinesTech built or contributed.',
                'required'      => 0,
                'rows'          => 3,
            ],
            [
                'key'           => 'field_cs_scope',
                'label'         => 'Scope Summary',
                'name'          => 'scope',
                'type'          => 'textarea',
                'instructions'  => 'Briefly describe what was in scope (and optionally what was out of scope).',
                'required'      => 0,
                'rows'          => 3,
            ],
            [
                'key'           => 'field_cs_timeline',
                'label'         => 'Delivery Timeline',
                'name'          => 'timeline',
                'type'          => 'text',
                'instructions'  => 'e.g. "8 months" or "Q1 2024 – Q3 2024"',
                'required'      => 0,
            ],
            [
                'key'           => 'field_cs_platforms',
                'label'         => 'Platforms',
                'name'          => 'platforms',
                'type'          => 'text',
                'instructions'  => 'Comma-separated: iOS, Android, Web, Admin Panel, API …',
                'required'      => 0,
            ],
            [
                'key'           => 'field_cs_status',
                'label'         => 'Project Status',
                'name'          => 'status',
                'type'          => 'select',
                'instructions'  => 'Current live status of the product.',
                'required'      => 0,
                'choices'       => [
                    'live'       => 'Live / In Production',
                    'beta'       => 'Beta / Limited Release',
                    'internal'   => 'Internal / Not Public',
                    'sunset'     => 'Sunset / Discontinued',
                ],
                'allow_null'    => 1,
                'default_value' => '',
            ],
            [
                'key'           => 'field_cs_measurable_outcomes',
                'label'         => 'Measurable Outcomes',
                'name'          => 'measurable_outcomes',
                'type'          => 'textarea',
                'instructions'  => 'Only fill if you have internal evidence. Leave blank to suppress the Outcomes block.',
                'required'      => 0,
                'rows'          => 4,
            ],
            [
                'key'           => 'field_cs_evidence_note',
                'label'         => 'Evidence / Measurement Source',
                'name'          => 'evidence_note',
                'type'          => 'text',
                'instructions'  => 'REQUIRED if Measurable Outcomes is set. Internal source: e.g. "Client-reported via email, Aug 2024".',
                'required'      => 0,
            ],
            [
                'key'           => 'field_cs_disclosure_note',
                'label'         => 'Disclosure Note (public)',
                'name'          => 'disclosure_note',
                'type'          => 'text',
                'instructions'  => 'Optional public-facing caveat. e.g. "Published with client approval. White-label engagement."',
                'required'      => 0,
            ],
        ],
        'location' => [
            [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'st_case_study' ] ],
        ],
        'menu_order'            => 10,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
    ] );
} );


// ── 2. Fallback: register via post_meta if ACF is not active ─────────────────
add_action( 'init', function () {
    if ( function_exists( 'acf_add_local_field_group' ) ) return; // ACF handles it

    $fields = [
        'engagement_type', 'spines_role', 'scope', 'timeline',
        'platforms', 'status', 'measurable_outcomes', 'evidence_note', 'disclosure_note',
    ];
    foreach ( $fields as $field ) {
        register_post_meta( 'st_case_study', $field, [
            'show_in_rest'  => false,
            'single'        => true,
            'type'          => 'string',
            'auth_callback' => function () { return current_user_can( 'edit_posts' ); },
        ] );
    }
} );


// ── 3. Helper: retrieve proof meta for a given post ──────────────────────────
/**
 * Returns the proof metadata array for a Case Study post.
 * Falls back to post_meta when ACF is not active.
 *
 * @param int $post_id
 * @return array<string,string>
 */
function st_cs_get_proof_meta( int $post_id ): array {
    $fields = [
        'engagement_type', 'spines_role', 'scope', 'timeline',
        'platforms', 'status', 'measurable_outcomes', 'evidence_note', 'disclosure_note',
    ];

    $data = [];
    foreach ( $fields as $field ) {
        if ( function_exists( 'get_field' ) ) {
            $val = get_field( $field, $post_id );
        } else {
            $val = get_post_meta( $post_id, $field, true );
        }
        $data[ $field ] = is_string( $val ) ? trim( $val ) : '';
    }

    // Guard: if outcomes exist but no evidence, suppress outcomes.
    if ( ! empty( $data['measurable_outcomes'] ) && empty( $data['evidence_note'] ) ) {
        $data['measurable_outcomes'] = '';
    }

    return $data;
}


// ── 4. Helper: label map for engagement_type ─────────────────────────────────
function st_cs_engagement_label( string $type, bool $is_rtl ): string {
    $map = [
        'direct'        => [ 'ar' => "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0645}\u{0628}\u{0627}\u{0634}\u{0631}",           'en' => 'Direct Engagement'    ],
        'white_label'   => [ 'ar' => "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0057}\u{0068}\u{0069}\u{0074}\u{0065}\u{002D}\u{004C}\u{0061}\u{0062}\u{0065}\u{006C}",     'en' => 'White-Label Project'  ],
        'co_execution'  => [ 'ar' => "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0645}\u{0634}\u{062A}\u{0631}\u{0643}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{0641}\u{0631}\u{064A}\u{0642}", 'en' => 'Co-Execution'         ],
        'not_disclosed' => [ 'ar' => "\u{063A}\u{064A}\u{0631}\u{0020}\u{0645}\u{064F}\u{0641}\u{0635}\u{064E}\u{062D}\u{0020}\u{0639}\u{0646}\u{0647}",        'en' => 'Not Disclosed'        ],
    ];
    $lang = $is_rtl ? 'ar' : 'en';
    return $map[ $type ][ $lang ] ?? '';
}


// ── 5. Helper: label map for status ──────────────────────────────────────────
function st_cs_status_label( string $status, bool $is_rtl ): array {
    $map = [
        'live'     => [ 'ar' => "\u{0642}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}",          'en' => 'Live',             'color' => '#22c55e' ],
        'beta'     => [ 'ar' => "\u{0625}\u{0635}\u{062F}\u{0627}\u{0631}\u{0020}\u{062A}\u{062C}\u{0631}\u{064A}\u{0628}\u{064A}",          'en' => 'Beta',             'color' => '#f59e0b' ],
        'internal' => [ 'ar' => "\u{062F}\u{0627}\u{062E}\u{0644}\u{064A}\u{0020}\u{002F}\u{0020}\u{063A}\u{064A}\u{0631}\u{0020}\u{0645}\u{0646}\u{0634}\u{0648}\u{0631}",     'en' => 'Internal',         'color' => '#6366f1' ],
        'sunset'   => [ 'ar' => "\u{0645}\u{062A}\u{0648}\u{0642}\u{0641}",                 'en' => 'Sunset',           'color' => '#94a3b8' ],
    ];
    $lang = $is_rtl ? 'ar' : 'en';
    return [
        'label' => $map[ $status ][ $lang ] ?? $status,
        'color' => $map[ $status ]['color'] ?? '#94a3b8',
    ];
}
