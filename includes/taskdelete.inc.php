<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $taskId = $_POST["id"];

  try {
    require_once "../index.php";

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $taskId, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: ../index.php");
    die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("location: ../index.php");
}
