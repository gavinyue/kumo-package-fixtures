<?php
/** Plugin Name: KumoBuild Release */
add_action('rest_api_init', function () {
    register_rest_route('kumobuild/v1', '/release', array(
        'methods' => 'GET',
        'permission_callback' => '__return_true',
        'callback' => function () {
            return array('release' => 'baseline', 'environment' => getenv('KUMO_ENVIRONMENT_NAME'));
        },
    ));
});
