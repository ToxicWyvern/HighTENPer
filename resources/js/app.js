// import "./bootstrap";

const dropdownBtn = document.getElementById("dropdown-Btn");
const dropdownMenu = document.getElementById("dropdown-menu");
const header = document.getElementById("header");

dropdownBtn.addEventListener("click", () => {
    showDropdown();
});

const showDropdown = () => {
    dropdownMenu.style.display = "block";
};

const removeDropdown = () => {
    dropdownMenu.style.display = "none";
};
