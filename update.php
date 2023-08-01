<?php
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $task = $_POST['task'];

        // Update the task in the database
        $stmt = $db->prepare('UPDATE todos SET task = :task WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':task', $task);
        $stmt->execute();

        header('Location: index.php');
        exit();
    }

    // Fetch the task to be edited
    $id = $_GET['id'];
    $stmt = $db->prepare('SELECT * FROM todos WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $todo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
</head>
<body>
    <h1>Edit Todo</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
        <input type="text" name="task" value="<?php echo htmlspecialchars($todo['task']); ?>">
        <input type="submit" value="Save">
    </form>
</body>
</html>
