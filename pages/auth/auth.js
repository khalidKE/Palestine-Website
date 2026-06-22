"use strict";

const container = document.getElementById("container");
const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const forgotPasswordLink = document.getElementById("myLink");

registerButton?.addEventListener("click", () => {
    container?.classList.add("active");
});

loginButton?.addEventListener("click", () => {
    container?.classList.remove("active");
});

function refreshPage() {
    window.location.reload();
}

function showAlert() {
    alert("remember then try ,Sir");
}

forgotPasswordLink?.addEventListener("click", showAlert);
