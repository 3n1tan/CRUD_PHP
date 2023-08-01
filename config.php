<?php
    $host = "127.0.0.1";
    $dbname = "todolist";
    $user = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
