<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $db = new mysqli("127.0.0.1", "root", "", "", 3306);

    echo "<h2>SUCCESS</h2>";
    echo "Server: " . $db->server_info;
} catch (Throwable $e) {
    echo "<pre>";
    echo $e->getMessage();
    echo "</pre>";
}