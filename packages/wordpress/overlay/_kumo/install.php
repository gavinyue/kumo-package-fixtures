<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
$input = json_decode(stream_get_contents(STDIN), true);
if (!is_array($input) || empty($input['password']) || empty($input['url'])) { exit(1); }
$_SERVER['HTTP_HOST'] = parse_url($input['url'], PHP_URL_HOST) . ':' . parse_url($input['url'], PHP_URL_PORT);
define('WP_INSTALLING', true);
require '/var/www/html/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';
$created = false;
if (!is_blog_installed()) {
    $result = wp_install($input['title'], $input['user'], $input['email'], true, '', $input['password']);
    if (is_wp_error($result)) { exit(1); }
    $created = true;
}
echo json_encode(array('created' => $created));
