<?php
/**
 * Plugin Name: KumoBuild Service Connection
 * Description: Platform-maintained. WordPress disables Application Passwords
 * over plain HTTP outside local environments. KumoBuild reaches the site
 * through an authenticated loopback tunnel, so allow them for loopback hosts
 * only; any other host still requires HTTPS.
 */
add_filter('wp_is_application_passwords_available', function ($available) {
    if ($available || is_ssl()) {
        return $available;
    }
    $host = strtolower(parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST) ?? '');
    return in_array($host, array('127.0.0.1', 'localhost', '[::1]', '::1'), true);
});
