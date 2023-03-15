const menuBtn = document.getElementById("config-btn");
const menuModal = document.getElementById("config-modal");

menuBtn.addEventListener("click", function() {
  menuModal.style.display = "block";
});

menuBtn.addEventListener("click", function() {
    menuModal.style.opacity = "1";
  });

menuModal.addEventListener("click", function() {
  menuModal.style.display = "none";
});
