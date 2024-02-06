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
    <form action="/intelligentsystems/includes/taskinsert.inc.php" method="post">

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

<div class="title">Task list</div>

<?php if (!empty($tasks)) : ?>
    <div class="task-list">
        <?php foreach ($tasks as $task) : ?>
            <div class="task-item">
                <div>
                    <div class="task-item-content">
                        <div class="task-item-title">
                            <input type="text" value="<?= $task['task_name']; ?>" name="task_name"
                                   id="task_title_<?= $task['id']; ?>">
                        </div>
                        <div class="task-item-description">
                            <input type="text" value="<?= $task['task_description']; ?>" name="task_description"
                                   id="task_description_<?= $task['id']; ?>">
                        </div>
                    </div>

                    <form action="/intelligentsystems/includes/taskdelete.inc.php" method="post">
                        <input type="hidden" name="id" value="<?= $task['id']; ?>">
                        <button type="submit" class="button-delete">Delete</button>
                    </form>
                </div>
                <form action="/intelligentsystems/includes/taskupdate.inc.php" method="post">
                    <input type="hidden" name="id" value="<?= $task['id']; ?>">
                    <button type="submit" class="button-save" id="saveButton" style="display: none;">Save</button>
                    <button type="button" class="button-edit" id="editButton" data-task-id="<?= $task['id']; ?>">Edit
                    </button>
                    <label for="<?= $task['id']; ?>">Done</label>
                    <input type="checkbox" id="<?= $task['id']; ?>" name="is_done" value="1">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <p>No tasks found.</p>
<?php endif; ?>

<script src="../../intelligentsystems/utils/editTask.js">

</script>


</body>

</html>