<?php

/**
 * Web-based runner for WordPress seed files.
 * Place this file in the WordPress root next to wp-load.php.
 */

$key = $_GET['key'] ?? '';
if ($key !== 'spinestech2026') {
    http_response_code(403);
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Access Denied</title></head><body style="font-family:Arial,sans-serif;background:#f4f4f4;color:#333;"><div style="max-width:720px;margin:80px auto;padding:24px;background:#fff;border:1px solid #ddd;border-radius:8px;text-align:center;"><h1 style="margin-top:0;color:#d9534f;">Access Denied</h1><p>Invalid or missing secret key.</p></div></body></html>';
    exit;
}

$root = __DIR__;
$load = $root . '/wp-load.php';
if (!file_exists($load)) {
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Runner Error</title></head><body style="font-family:Arial,sans-serif;background:#f4f4f4;color:#333;"><div style="max-width:720px;margin:80px auto;padding:24px;background:#fff;border:1px solid #ddd;border-radius:8px;"><h1 style="margin-top:0;color:#d9534f;">Runner Error</h1><p>Could not find <code>wp-load.php</code> in the current directory.</p></div></body></html>';
    exit;
}

require_once $load;

$files = [
    'create-pages.php',
    'seed.php',
    'seed-extended.php',
];

function runSeedFile(string $path): array
{
    $fullPath = __DIR__ . '/' . ltrim($path, '/');
    if (!file_exists($fullPath)) {
        return [
            'status' => 'error',
            'message' => "File not found: {$path}",
            'output' => '',
        ];
    }

    $output = '';
    set_error_handler(function ($severity, $message, $file, $line) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });

    try {
        ob_start();
        require $fullPath;
        $output = ob_get_clean();
        restore_error_handler();

        return [
            'status' => 'success',
            'message' => "Executed: {$path}",
            'output' => $output,
        ];
    } catch (Throwable $exception) {
        restore_error_handler();
        ob_end_clean();

        return [
            'status' => 'error',
            'message' => "Error executing {$path}: " . $exception->getMessage(),
            'output' => '',
        ];
    }
}

$results = [];
foreach ($files as $file) {
    $results[] = runSeedFile($file);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpinesTech Seed Runner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .page {
            max-width: 900px;
            margin: 32px auto;
            padding: 24px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .08);
        }

        h1 {
            margin-top: 0;
        }

        .result {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 18px;
        }

        .success {
            border-color: #28a745;
            background: #e6f7ed;
        }

        .error {
            border-color: #d9534f;
            background: #f9e6e6;
        }

        .message {
            font-size: 16px;
            margin: 0 0 8px;
        }

        .output {
            white-space: pre-wrap;
            background: #f8f8f8;
            border: 1px solid #e1e1e1;
            border-radius: 6px;
            padding: 12px;
            font-family: monospace;
            font-size: 13px;
            color: #222;
            overflow-x: auto;
        }

        .warning {
            padding: 14px 16px;
            background: #fff3cd;
            border: 1px solid #ffeeba;
            border-radius: 6px;
            color: #856404;
        }

        code {
            background: rgba(27, 31, 35, 0.05);
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <div class="page">
        <h1>SpinesTech Seed Runner</h1>
        <p>Seed runner executed with secret key <strong>spinestech2026</strong>.</p>
        <?php foreach ($results as $result): ?>
            <div class="result <?php echo $result['status'] === 'success' ? 'success' : 'error'; ?>">
                <p class="message"><strong><?php echo htmlspecialchars($result['message'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
                <?php if ($result['output'] !== ''): ?>
                    <div class="output"><?php echo htmlspecialchars($result['output'], ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div class="warning">
            <strong>Warning:</strong> Delete this file from the server immediately after use.
        </div>
    </div>
</body>

</html>