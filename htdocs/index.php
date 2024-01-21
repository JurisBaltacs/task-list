<?php

declare(strict_types=1);

$dsn = "mysql:host=localhost:3307;dbname=task_manager";
$dbusername = "root";
$dbpassword = "";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM tasks";
  $stmt = $pdo->query($query);
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Connection error: " . $e->getMessage();
  die();
}

include('pages/homepage.php');
