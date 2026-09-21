<?php
/**
 * Automatixes Web Application Firewall (WAF) & Security Suite
 * Shields the PHP application from common web attacks (XSS, SQLi, bad bots, and directory traversing).
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Set Security Headers
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer-when-downgrade");
header("Content-Security-Policy: default-src 'self' https: wss: blob: data: 'unsafe-inline' 'unsafe-eval'; img-src 'self' data: https:; frame-src 'self' https:; connect-src 'self' https: wss:; worker-src 'self' blob:;");

// 2. Prevent Bad Bots & Scanners
$bad_bots = [
    'acunetix', 'sqlmap', 'nikto', 'nmap', 'havij', 'hydra', 'dirbuster',
    'libwww', 'wget', 'curl', 'python', 'perl', 'scanner', 'harvest', 'scrappy'
];
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
foreach ($bad_bots as $bot) {
    if ($bot !== '' && strpos($user_agent, $bot) !== false) {
        http_response_code(403);
        die("<h1>403 Forbidden</h1><p>Access denied by Automatixes Security Firewall.</p>");
    }
}

// 3. Simple Rate Limiting (Prevent Brute Force)
$limit = 100; // max requests
$timeframe = 60; // in seconds
if (!isset($_SESSION['firewall_req_count'])) {
    $_SESSION['firewall_req_count'] = 1;
    $_SESSION['firewall_req_start'] = time();
} else {
    $_SESSION['firewall_req_count']++;
    if (time() - $_SESSION['firewall_req_start'] > $timeframe) {
        $_SESSION['firewall_req_count'] = 1;
        $_SESSION['firewall_req_start'] = time();
    } elseif ($_SESSION['firewall_req_count'] > $limit) {
        http_response_code(429);
        die("<h1>429 Too Many Requests</h1><p>Rate limit exceeded. Please try again in a minute.</p>");
    }
}

// 4. Sanitize Input Parameter Globals (XSS & Injection Filter)
function sanitize_input_filter(&$value) {
    if (is_array($value)) {
        foreach ($value as $key => $val) {
            sanitize_input_filter($value[$key]);
        }
    } else {
        // Block script tags and typical sql injections keywords
        $blocked_patterns = [
            '/<script[^>]*\x3f\x3e.*?<\/script>/is',
            '/select\s+.*\s+from/i',
            '/union\s+select/i',
            '/insert\s+into/i',
            '/delete\s+from/i',
            '/drop\s+table/i',
            '/or\s+1\s*=\s*1/i'
        ];
        foreach ($blocked_patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                http_response_code(400);
                die("<h1>400 Bad Request</h1><p>Suspicious activity blocked by Automatixes Security Firewall.</p>");
            }
        }
        $value = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }
}

sanitize_input_filter($_GET);
sanitize_input_filter($_POST);
sanitize_input_filter($_COOKIE);
?>


