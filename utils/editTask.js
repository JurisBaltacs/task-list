const editButtons = document.querySelectorAll(".button-edit");

editButtons.forEach((button) => {
  const taskId = button.getAttribute("data-task-id");
  const taskTitleInput = document.getElementById(`task_title_${taskId}`);
  const taskDescriptionInput = document.getElementById(
    `task_description_${taskId}`
  );

  taskTitleInput.readOnly = true;
  taskTitleInput.classList.add("gray-background");

  taskDescriptionInput.readOnly = true;
  taskDescriptionInput.classList.add("gray-background");

  const toggleReadOnlyAndClass = (inputElement) => {
    inputElement.readOnly = !inputElement.readOnly;
    inputElement.classList.toggle("gray-background");
  };

  const handleEditClick = () => {
    toggleReadOnlyAndClass(taskTitleInput);
    toggleReadOnlyAndClass(taskDescriptionInput);
  };

  button.addEventListener("click", handleEditClick);
});

document.addEventListener("DOMContentLoaded", function () {
  const saveButton = document.getElementById("saveButton");
  const editButton = document.getElementById("editButton");

  editButton.addEventListener("click", function () {
    saveButton.style.display = "inline-block";
    editButton.style.display = "none";
  });
});
