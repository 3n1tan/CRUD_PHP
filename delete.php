<?php
    include 'config.php';

    $id = $_GET['id'];

    // Delete the task from the database
    $stmt = $db->prepare('DELETE FROM todos WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php');
    exit();
?>
