<?php

declare(strict_types=1);
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    <?php include 'styles.css'; ?>
  </style>

</head>

<body class="body">
  <div class="title">Add task</div>
  <div class="form-container">

    <form action="/includes/taskinsert.inc.php" method="post">
      <div class="form-inputs">
        <div class="task-name-container">
          <label for="task_name">Task name:</label>
          <input type="text" id="task_name" name="task_name" required>
        </div>

        <div class="task-description-container">
          <label for="task_description">Task description:</label>
          <input type="text" id="task_description" name="task_description">
        </div>
      </div>
      <button type="submit" class="button-submit">Submit</button>
    </form>
  </div>

  <div class="title">Task List</div>

  <?php if (!empty($tasks)) : ?>
    <div class="task-list">
      <?php foreach ($tasks as $task) : ?>
        <div class="task-item">
          <div class="task-item-content">
            <div class="task-item-title"><?= $task['task_name']; ?></div>
            <div class="task-item-description"><?= $task['task_description']; ?></div>
          </div>

          <form action="/includes/taskdelete.inc.php" method="post">
            <input type="hidden" name="id" value="<?= $task['id']; ?>">

            <button type="submit" class="button-delete">Delete</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <p>No tasks found.</p>
  <?php endif; ?>

</body>

</html>