<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registers ACF field groups when Advanced Custom Fields is active.
 * Meta keys match post_meta used by REST mappers (st_*).
 */
final class SpinesTech_Headless_ACF_Fields
{
    public static function register(): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        self::service_fields();
        self::product_fields();
        self::sector_fields();
        self::case_study_fields();
        self::pricing_fields();
        self::job_fields();
        self::testimonial_fields();
        self::team_fields();
    }

    private static function service_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_service',
            'title' => 'Service Fields',
            'fields' => [
                ['key' => 'field_st_icon', 'label' => 'Icon (Material)', 'name' => 'st_icon', 'type' => 'text'],
                ['key' => 'field_st_features', 'label' => 'Features', 'name' => 'st_features', 'type' => 'textarea', 'instructions' => 'One per line'],
                ['key' => 'field_st_details', 'label' => 'Details', 'name' => 'st_details', 'type' => 'textarea', 'instructions' => 'One per line'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::SERVICE]]],
        ]);
    }

    private static function product_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_product',
            'title' => 'Product Fields',
            'fields' => [
                ['key' => 'field_st_prod_icon', 'label' => 'Icon', 'name' => 'st_icon', 'type' => 'text'],
                ['key' => 'field_st_badge', 'label' => 'Badge', 'name' => 'st_badge', 'type' => 'text'],
                ['key' => 'field_st_prod_features', 'label' => 'Features', 'name' => 'st_features', 'type' => 'textarea'],
                ['key' => 'field_st_cta_primary', 'label' => 'CTA Primary', 'name' => 'st_cta_primary', 'type' => 'text'],
                ['key' => 'field_st_cta_secondary', 'label' => 'CTA Secondary', 'name' => 'st_cta_secondary', 'type' => 'text'],
                ['key' => 'field_st_tagline', 'label' => 'Tagline', 'name' => 'st_tagline', 'type' => 'text'],
                ['key' => 'field_st_highlights', 'label' => 'Highlights', 'name' => 'st_highlights', 'type' => 'textarea', 'instructions' => 'One per line: icon|title|body'],
                ['key' => 'field_st_modules', 'label' => 'Modules', 'name' => 'st_modules', 'type' => 'textarea', 'instructions' => 'One per line: icon|title|description'],
                ['key' => 'field_st_use_cases', 'label' => 'Use Cases', 'name' => 'st_use_cases', 'type' => 'textarea', 'instructions' => 'One per line'],
                ['key' => 'field_st_tech_specs', 'label' => 'Tech Specs', 'name' => 'st_tech_specs', 'type' => 'textarea', 'instructions' => 'One per line'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::PRODUCT]]],
        ]);
    }

    private static function sector_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_sector',
            'title' => 'Sector Fields',
            'fields' => [
                ['key' => 'field_st_sector_icon', 'label' => 'Icon', 'name' => 'st_icon', 'type' => 'text'],
                ['key' => 'field_st_sector_tags', 'label' => 'Tags', 'name' => 'st_tags', 'type' => 'textarea', 'instructions' => 'One per line'],
                ['key' => 'field_st_sector_layout', 'label' => 'Layout', 'name' => 'st_layout', 'type' => 'select', 'choices' => [
                    'default' => 'Default',
                    'featured' => 'Featured',
                    'tall' => 'Tall',
                    'accent' => 'Accent',
                ], 'default_value' => 'default'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::SECTOR]]],
        ]);
    }

    private static function case_study_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_case_study',
            'title' => 'Case Study Fields',
            'fields' => [
                // Basic Fields
                ['key' => 'field_st_client', 'label' => 'Client', 'name' => 'st_client', 'type' => 'text'],
                ['key' => 'field_st_sector_name', 'label' => 'Sector', 'name' => 'st_sector', 'type' => 'text'],
                ['key' => 'field_st_challenge', 'label' => 'Challenge', 'name' => 'st_challenge', 'type' => 'textarea'],
                ['key' => 'field_st_solution', 'label' => 'Solution', 'name' => 'st_solution', 'type' => 'textarea'],
                ['key' => 'field_st_result', 'label' => 'Result', 'name' => 'st_result', 'type' => 'textarea'],
                ['key' => 'field_st_stats', 'label' => 'Stats JSON', 'name' => 'st_stats', 'type' => 'textarea', 'instructions' => 'Example: [{"label":"ROI","value":"+35%"}]'],

                // Hero Section
                ['key' => 'field_st_hero_tags', 'label' => 'Hero Tags', 'name' => 'st_hero_tags', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Tag',
                    'sub_fields' => [
                        ['key' => 'field_st_hero_tag_text', 'label' => 'Tag Text', 'name' => 'text', 'type' => 'text'],
                    ]],
                ['key' => 'field_st_hero_images', 'label' => 'Hero Images', 'name' => 'st_hero_images', 'type' => 'gallery', 'instructions' => 'Upload phone and desktop mockups'],

                // Project Snapshot
                ['key' => 'field_st_project_snapshot', 'label' => 'Project Snapshot', 'name' => 'st_project_snapshot', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Snapshot Item',
                    'sub_fields' => [
                        ['key' => 'field_st_snapshot_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
                        ['key' => 'field_st_snapshot_value', 'label' => 'Value', 'name' => 'value', 'type' => 'text'],
                        ['key' => 'field_st_snapshot_highlight', 'label' => 'Highlight', 'name' => 'highlight', 'type' => 'true_false', 'default_value' => 0],
                    ]],

                // Opportunity Section
                ['key' => 'field_st_opportunity_title', 'label' => 'Opportunity Title', 'name' => 'st_opportunity_title', 'type' => 'text'],
                ['key' => 'field_st_opportunity_text', 'label' => 'Opportunity Text', 'name' => 'st_opportunity_text', 'type' => 'textarea'],
                ['key' => 'field_st_opportunity_steps', 'label' => 'Opportunity Steps', 'name' => 'st_opportunity_steps', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Step',
                    'sub_fields' => [
                        ['key' => 'field_st_opportunity_step_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_opportunity_step_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
                    ]],

                // Perspectives Section
                ['key' => 'field_st_perspectives', 'label' => 'Perspectives', 'name' => 'st_perspectives', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add Perspective',
                    'sub_fields' => [
                        ['key' => 'field_st_perspective_style', 'label' => 'Style', 'name' => 'style', 'type' => 'select', 'choices' => ['light' => 'Light', 'dark' => 'Dark'], 'default_value' => 'light'],
                        ['key' => 'field_st_perspective_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_perspective_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
                        ['key' => 'field_st_perspective_items', 'label' => 'Items', 'name' => 'items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Item',
                            'sub_fields' => [
                                ['key' => 'field_st_perspective_item_text', 'label' => 'Item Text', 'name' => 'text', 'type' => 'text'],
                            ]],
                    ]],

                // Process Section
                ['key' => 'field_st_process_title', 'label' => 'Process Title', 'name' => 'st_process_title', 'type' => 'text'],
                ['key' => 'field_st_process_subtitle', 'label' => 'Process Subtitle', 'name' => 'st_process_subtitle', 'type' => 'textarea'],
                ['key' => 'field_st_process_steps', 'label' => 'Process Steps', 'name' => 'st_process_steps', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Step',
                    'sub_fields' => [
                        ['key' => 'field_st_process_step_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
                        ['key' => 'field_st_process_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
                        ['key' => 'field_st_process_step_text', 'label' => 'Description', 'name' => 'text', 'type' => 'textarea'],
                    ]],
                ['key' => 'field_st_process_image', 'label' => 'Process Image', 'name' => 'st_process_image', 'type' => 'image', 'return_format' => 'url'],
                ['key' => 'field_st_process_caption_title', 'label' => 'Process Caption Title', 'name' => 'st_process_caption_title', 'type' => 'text'],
                ['key' => 'field_st_process_caption_sub', 'label' => 'Process Caption Subtitle', 'name' => 'st_process_caption_sub', 'type' => 'text'],

                // Pillars Section
                ['key' => 'field_st_pillars', 'label' => 'Pillars', 'name' => 'st_pillars', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add Pillar',
                    'sub_fields' => [
                        ['key' => 'field_st_pillar_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'],
                        ['key' => 'field_st_pillar_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
                        ['key' => 'field_st_pillar_items', 'label' => 'Features', 'name' => 'items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Feature',
                            'sub_fields' => [
                                ['key' => 'field_st_pillar_item_text', 'label' => 'Feature Text', 'name' => 'text', 'type' => 'text'],
                            ]],
                    ]],

                // Operational Depth Section
                ['key' => 'field_st_operational_depth', 'label' => 'Operational Depth', 'name' => 'st_operational_depth', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Depth Card',
                    'sub_fields' => [
                        ['key' => 'field_st_depth_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_depth_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
                        ['key' => 'field_st_depth_text', 'label' => 'Description', 'name' => 'text', 'type' => 'textarea'],
                    ]],

                // Trust Section
                ['key' => 'field_st_trust_title', 'label' => 'Trust Title', 'name' => 'st_trust_title', 'type' => 'text'],
                ['key' => 'field_st_trust_text', 'label' => 'Trust Text', 'name' => 'st_trust_text', 'type' => 'textarea'],
                ['key' => 'field_st_trust_items', 'label' => 'Trust Items', 'name' => 'st_trust_items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Trust Item',
                    'sub_fields' => [
                        ['key' => 'field_st_trust_item_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_trust_item_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
                        ['key' => 'field_st_trust_item_text', 'label' => 'Description', 'name' => 'text', 'type' => 'textarea'],
                    ]],

                // Live Section
                ['key' => 'field_st_live_title', 'label' => 'Live Title', 'name' => 'st_live_title', 'type' => 'text'],
                ['key' => 'field_st_live_text', 'label' => 'Live Text', 'name' => 'st_live_text', 'type' => 'textarea'],
                ['key' => 'field_st_live_url', 'label' => 'Live URL', 'name' => 'st_live_url', 'type' => 'url'],
                ['key' => 'field_st_live_apps', 'label' => 'Live Apps', 'name' => 'st_live_apps', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add App',
                    'sub_fields' => [
                        ['key' => 'field_st_live_app_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_live_app_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
                        ['key' => 'field_st_live_app_url', 'label' => 'URL', 'name' => 'url', 'type' => 'url'],
                    ]],

                // Tech Stack Section
                ['key' => 'field_st_tech_stack', 'label' => 'Tech Stack', 'name' => 'st_tech_stack', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Tech',
                    'sub_fields' => [
                        ['key' => 'field_st_tech_icon', 'label' => 'Icon (Material)', 'name' => 'icon', 'type' => 'text'],
                        ['key' => 'field_st_tech_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
                    ]],

                // CTA Section
                ['key' => 'field_st_cta_title', 'label' => 'CTA Title', 'name' => 'st_cta_title', 'type' => 'text'],
                ['key' => 'field_st_cta_text', 'label' => 'CTA Text', 'name' => 'st_cta_text', 'type' => 'textarea'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::CASE_STUDY]]],
        ]);
    }

    private static function pricing_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_pricing',
            'title' => 'Pricing Fields',
            'fields' => [
                ['key' => 'field_st_tier', 'label' => 'Tier', 'name' => 'st_tier', 'type' => 'text'],
                ['key' => 'field_st_pricing_features', 'label' => 'Features', 'name' => 'st_features', 'type' => 'textarea', 'instructions' => 'One per line'],
                ['key' => 'field_st_recommended', 'label' => 'Recommended', 'name' => 'st_recommended', 'type' => 'true_false'],
                ['key' => 'field_st_cta_text', 'label' => 'CTA Text', 'name' => 'st_cta_text', 'type' => 'text'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::PRICING]]],
        ]);
    }

    private static function job_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_job',
            'title' => 'Job Fields',
            'fields' => [
                ['key' => 'field_st_department', 'label' => 'Department', 'name' => 'st_department', 'type' => 'text'],
                ['key' => 'field_st_location', 'label' => 'Location', 'name' => 'st_location', 'type' => 'text'],
                ['key' => 'field_st_type', 'label' => 'Type', 'name' => 'st_type', 'type' => 'text'],
                ['key' => 'field_st_experience', 'label' => 'Experience', 'name' => 'st_experience', 'type' => 'text'],
                ['key' => 'field_st_requirements', 'label' => 'Requirements', 'name' => 'st_requirements', 'type' => 'textarea'],
                ['key' => 'field_st_benefits', 'label' => 'Benefits', 'name' => 'st_benefits', 'type' => 'textarea'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::JOB]]],
        ]);
    }

    private static function testimonial_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_testimonial',
            'title' => 'Testimonial Fields',
            'fields' => [
                ['key' => 'field_st_testimonial_name', 'label' => 'Name', 'name' => 'st_name', 'type' => 'text'],
                ['key' => 'field_st_role', 'label' => 'Role', 'name' => 'st_role', 'type' => 'text'],
                ['key' => 'field_st_company', 'label' => 'Company', 'name' => 'st_company', 'type' => 'text'],
                ['key' => 'field_st_quote', 'label' => 'Quote', 'name' => 'st_quote', 'type' => 'textarea'],
                ['key' => 'field_st_rating', 'label' => 'Rating', 'name' => 'st_rating', 'type' => 'number', 'min' => 1, 'max' => 5, 'default_value' => 5],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::TESTIMONIAL]]],
        ]);
    }

    private static function team_fields(): void
    {
        acf_add_local_field_group([
            'key' => 'group_st_team',
            'title' => 'Team Member Fields',
            'fields' => [
                ['key' => 'field_st_team_role', 'label' => 'Role', 'name' => 'st_role', 'type' => 'text'],
                ['key' => 'field_st_bio', 'label' => 'Bio', 'name' => 'st_bio', 'type' => 'textarea'],
                ['key' => 'field_st_linkedin', 'label' => 'LinkedIn', 'name' => 'st_linkedin', 'type' => 'url'],
                ['key' => 'field_st_twitter', 'label' => 'Twitter / X', 'name' => 'st_twitter', 'type' => 'url'],
            ],
            'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => SpinesTech_Headless_Post_Types::TEAM]]],
        ]);
    }
}
