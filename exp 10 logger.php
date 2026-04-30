<?php
function log_login($username, $status) {
    echo "LOGGER CALLED<br>";
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $time = date("Y-m-d H:i:s");
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

    $file = __DIR__ . "/login_logs.csv";

    // DEBUG: check path
    // echo $file;

    $log = "$time,$ip,$username,$status,$user_agent\n";

    file_put_contents($file, $log, FILE_APPEND | LOCK_EX);
}
?>
