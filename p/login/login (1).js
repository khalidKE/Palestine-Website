const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

function refreshPage() {
    location.reload();
}
function showAlert() {
    alert("remember then try ,Sir");
}

// Get the link element by its id
var link = document.getElementById("myLink");

// Attach event listener to the link
link.addEventListener("click", showAlert);