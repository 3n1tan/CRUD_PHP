<?php
include 'config.php';

// Fetch all tasks from the database
$stmt = $db->query('SELECT * FROM todos ORDER BY created_at DESC');
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>

    <h2>Add New Task</h2>
    <form action="create.php" method="POST">
        <input type="text" name="task" placeholder="Enter task">
        <input type="submit" value="Add">
    </form>

    <?php if (count($todos) > 0): ?>
        <ol>
            <?php foreach ($todos as $todo): ?>
                <li><?php echo htmlspecialchars($todo['task']); ?>
                    <a href="update.php?id=<?php echo $todo['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $todo['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <p>No tasks found.</p>
    <?php endif; ?>
</body>
</html>
