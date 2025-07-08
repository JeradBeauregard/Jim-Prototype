
// exercise dropdown
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".dropdown-toggle").forEach(button => {
    button.addEventListener("click", (e) => {
      e.preventDefault();

      const container = button.closest(".full_exercise_container");
      const dropdown = container.querySelector(".exercise_banner_dropdown_container");

      dropdown.classList.toggle("open");
      button.classList.toggle("open"); // flips the arrow
    });
  });
});

