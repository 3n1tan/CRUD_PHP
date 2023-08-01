<?php
    include('config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task = $_POST['task'];

        // Insert the new task into the database
        $stmt = $db->prepare('INSERT INTO todos (task) VALUES (:task)');
        $stmt->bindParam(':task', $task);
        $stmt->execute();

        header('Location: index.php');
        exit();
    }
?>
