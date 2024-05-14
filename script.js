document.addEventListener("DOMContentLoaded", function() {
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modal = document.getElementById("myModal");

    openModalBtn.addEventListener("click", function() {
        modal.style.display = "block";
        setTimeout(function() {
            modal.querySelector(".modal-content").style.right = "0";
        }, 10);
    });

    closeModalBtn.addEventListener("click", function() {
        modal.querySelector(".modal-content").style.right = "-300px";
        setTimeout(function() {
            modal.style.display = "none";
        }, 300);
    });
});