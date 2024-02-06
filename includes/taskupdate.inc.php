<?php

declare(strict_types=1);
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
    $taskId = $_POST['id'];
$isComplete = isset($_POST[$taskId]);
$taskIsDone = isset($_POST['is_done']) ? 1 : 0;

require_once "../index.php";

try {
    $query = "UPDATE tasks SET is_done = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$taskIsDone, $taskId]);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}



