// custom.js
function validateSize(input) {
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
    if (fileSize > 2) {
        alert('File size exceeds 2 MiB');
        return false;
    }
}

function menuToggle() {
    const toggleMenu = document.querySelector(".user-account-menu");
    toggleMenu.classList.toggle("active");
}