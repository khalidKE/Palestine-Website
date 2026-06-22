"use strict";

window.refreshPage = () => {
    window.location.reload();
};

document.addEventListener("DOMContentLoaded", () => {
    const returnToTopButton = document.getElementById("return-to-top");

    if (!returnToTopButton) {
        return;
    }

    const toggleReturnToTop = () => {
        returnToTopButton.classList.toggle("hide", window.scrollY < 100);
    };

    returnToTopButton.addEventListener("click", (event) => {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", toggleReturnToTop);
    toggleReturnToTop();
});
