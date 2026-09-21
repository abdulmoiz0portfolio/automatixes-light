<?php
/**
 * Automatixes Vercel Serverless PHP Router
 * Routes incoming URLs to corresponding PHP files in the root folder.
 */

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Strip leading/trailing slashes
$path = trim($path, '/');

// Default page is index
if (empty($path)) {
    $path = 'index';
}

// 301 Permanent Redirect for legacy ai-automated-solutions URL
if (strtolower($path) === 'ai-automated-solutions') {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /ai-Agent-Automations");
    exit();
}

// Canonical route alias normalization
$route_map = [
    'ai-agent-automations' => 'ai-Agent-Automations',
    'ai-Agent-Automations' => 'ai-Agent-Automations',
    'real-estate-chatbot' => 'propertybot'
];
if (isset($route_map[$path]) || isset($route_map[strtolower($path)])) {
    $matched_key = isset($route_map[$path]) ? $path : strtolower($path);
    $path = $route_map[$matched_key];
}

// Allowed dynamic PHP pages in root directory
$allowed_pages = [
    'index','portfolio','process','ai-image-generator','reviews',
    'about',
    'contact',
    'admin',
    'website-development',
    'ai-Agent-Automations',
    'ai-automated-solutions',
    'product-shoot',
    'service',
    'Reviews',
    'privacy',
    'terms',
    'invoice-maker',
    'blogs',
    'blog-detail',
    'voice-agent',
    'case-study',
    'whatsapp-api',
    'propertybot',
    'whatsapp-automation',
    'crm-integration',
    'email-automation',
    'lead-recovery',
    'support-agents',
    'lead-scoring',
    'inbound-voice',
    'outbound-voice',
    'tools'
];

if (in_array($path, $allowed_pages) || in_array(strtolower($path), array_map('strtolower', $allowed_pages))) {
    // Check exact or case-insensitive match
    $targetFile = __DIR__ . '/../' . $path . '.php';
    if (!file_exists($targetFile)) {
        if ($path === 'ai-Agent-Automations' || strtolower($path) === 'ai-agent-automations') {
            $targetFile = __DIR__ . '/../ai-Agent-Automations.php';
        }
    }
    if (file_exists($targetFile)) {
        include $targetFile;
        exit;
    } else {
        http_response_code(404);
        echo "404 - Page not found in root.";
        exit;
    }
} else {
    // Check if the requested path is an existing static file (e.g., images/blog/...)
    $staticFile = realpath(__DIR__ . '/../' . $path);
    $rootPath = realpath(__DIR__ . '/..');
    
    if ($staticFile && file_exists($staticFile) && strpos($staticFile, $rootPath) === 0) {
        $ext = strtolower(pathinfo($staticFile, PATHINFO_EXTENSION));
        $mimes = [
            'png'  => 'image/png',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'webp' => 'image/webp',
            'svg'  => 'image/svg+xml',
            'gif'  => 'image/gif',
            'ico'  => 'image/x-icon',
            'css'  => 'text/css',
            'js'   => 'application/javascript'
        ];
        if (isset($mimes[$ext])) {
            header('Content-Type: ' . $mimes[$ext]);
            header('Content-Length: ' . filesize($staticFile));
            header('Cache-Control: public, max-age=31536000, immutable');
            readfile($staticFile);
            exit;
        }
    }

    http_response_code(404);
    echo "404 - Page not allowed.";
}
?>




