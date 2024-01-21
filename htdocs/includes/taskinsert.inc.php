<?php

declare(strict_types=1);
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $taskName = $_POST["task_name"];
  $taskDescription = $_POST["task_description"];

  try {
    require_once "../index.php";

    $query = "INSERT INTO tasks (task_name, task_description) VALUES (?, ?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$taskName, $taskDescription]);

    header("Location: ../index.php");

    die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("location: ../index.php");
}
