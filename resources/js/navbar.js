// navbar.js
function ActivateNav() {
    const nav = document.querySelector("#navbar");
    nav.style.display = "block";
}

function DeactivateNav() {
    const nav = document.querySelector("#navbar");
    nav.style.display = "none";
}

document.addEventListener('DOMContentLoaded', (event) => {
    const navToggleButton = document.querySelector('#activateNav');
    navToggleButton.addEventListener('click', ActivateNav);
})

document.addEventListener('DOMContentLoaded', (event) => {
    const navToggleButton = document.querySelector('#deactivateNav');
    navToggleButton.addEventListener('click', DeactivateNav);
})