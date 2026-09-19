<?php
declare(strict_types=1);

/*
 * One-time BOM cleaner for the SpinesTech theme.
 *
 * Upload this file to the theme root, open it once with the token below,
 * then delete it immediately.
 */

$token = 'spines-bom-fix-2026-08-14';

if (!isset($_GET['token']) || !hash_equals($token, (string) $_GET['token'])) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "Forbidden\n";
    exit;
}

header('Content-Type: text/plain; charset=UTF-8');

$root = __DIR__;
$allowedExtensions = ['php', 'css', 'js'];
$changed = [];
$checked = 0;
$errors = [];

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

foreach ($iterator as $fileInfo) {
    if (!$fileInfo instanceof SplFileInfo || !$fileInfo->isFile()) {
        continue;
    }

    $path = $fileInfo->getPathname();
    $extension = strtolower($fileInfo->getExtension());

    if (!in_array($extension, $allowedExtensions, true)) {
        continue;
    }

    $relativePath = str_replace($root . DIRECTORY_SEPARATOR, '', $path);

    if ($relativePath === basename(__FILE__)) {
        continue;
    }

    $checked++;
    $bytes = @file_get_contents($path);

    if ($bytes === false) {
        $errors[] = "Could not read: {$relativePath}";
        continue;
    }

    if (strncmp($bytes, "\xEF\xBB\xBF", 3) !== 0) {
        continue;
    }

    $newBytes = substr($bytes, 3);

    if (@file_put_contents($path, $newBytes, LOCK_EX) === false) {
        $errors[] = "Could not write: {$relativePath}";
        continue;
    }

    $changed[] = $relativePath;
}

echo "SpinesTech BOM cleanup complete\n";
echo "Root: {$root}\n";
echo "Checked files: {$checked}\n";
echo "Cleaned files: " . count($changed) . "\n\n";

if ($changed) {
    echo "Files cleaned:\n";
    foreach ($changed as $path) {
        echo "- {$path}\n";
    }
} else {
    echo "No BOM found.\n";
}

if ($errors) {
    echo "\nErrors:\n";
    foreach ($errors as $error) {
        echo "- {$error}\n";
    }
}

echo "\nDelete this file now: " . basename(__FILE__) . "\n";
