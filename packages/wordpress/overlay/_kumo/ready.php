<?php
header('Content-Type: application/json');
mysqli_report(MYSQLI_REPORT_OFF);
$db = @new mysqli(getenv('WORDPRESS_DB_HOST'), getenv('WORDPRESS_DB_USER'), getenv('WORDPRESS_DB_PASSWORD'), getenv('WORDPRESS_DB_NAME'));
if ($db->connect_errno || !$db->query('SELECT 1')) { http_response_code(503); echo '{"ok":false}'; exit; }
echo '{"ok":true,"application":"WordPress"}';
