"use strict";

(() => {
  const getTodos = document.querySelectorAll('input[type="checkbox"]');

  getTodos.forEach((getTodo) => {
    getTodo.addEventListener("change", () => {
      getTodo.parentNode.submit();
    });
  });

  const getCheckBoxes = document.querySelectorAll(".delete");

  getCheckBoxes.forEach((span) => {
    span.addEventListener("click", () => {
      alert("Are you sure ?");
      span.parentNode.submit();
    });
  });

  const editTodos = document.querySelectorAll(".edit");
  const editForm = document.querySelector(".edit-form");
  const getTitle = document.querySelectorAll(".todo-title");
  const editTitle = document.getElementById('editText');
  const getEditVals = document.querySelectorAll(".edit-input");
  const getEditId = document.getElementById("editId");
  const getTitleId = document.getElementById("titleId");

  editTodos.forEach((span) => {
    span.addEventListener("click", () => {

      editForm.style.display = 'block';
      getTitleId.style.display = 'none';

      let index = [...editTodos].indexOf(span);
      let title = getTitle[index].innerText;
      let editId = getEditVals[index].value;

      getEditId.value = editId;
      editTitle.setAttribute('value',title);

      // span.parentNode.submit();

    });
  });

  const purgeTodos = document.querySelector(".purge");

  purgeTodos.addEventListener("click", () => {
    alert("Are you sure ?");
    purgeTodos.parentNode.submit();
  });
})();
