"use strict";

const nextButton = document.getElementById("next");
const previousButton = document.getElementById("prev");
const carousel = document.querySelector(".carousel");
const slideList = carousel?.querySelector(".list");
const thumbnailList = carousel?.querySelector(".thumbnail");

let slideResetTimer;
let autoAdvanceTimer;

const transitionDuration = 3000;
const autoAdvanceDelay = 7000;

function resetTransitionClasses() {
    carousel.classList.remove("next", "prev");
}

function scheduleAutoAdvance() {
    clearTimeout(autoAdvanceTimer);
    autoAdvanceTimer = setTimeout(() => {
        nextButton.click();
    }, autoAdvanceDelay);
}

function showSlide(direction) {
    const slides = slideList.querySelectorAll(".item");
    const thumbnails = thumbnailList.querySelectorAll(".item");

    if (direction === "next") {
        slideList.appendChild(slides[0]);
        thumbnailList.appendChild(thumbnails[0]);
        carousel.classList.add("next");
    } else {
        slideList.prepend(slides[slides.length - 1]);
        thumbnailList.prepend(thumbnails[thumbnails.length - 1]);
        carousel.classList.add("prev");
    }

    clearTimeout(slideResetTimer);
    slideResetTimer = setTimeout(resetTransitionClasses, transitionDuration);
    scheduleAutoAdvance();
}

if (nextButton && previousButton && carousel && slideList && thumbnailList) {
    const thumbnails = thumbnailList.querySelectorAll(".item");

    if (thumbnails.length > 0) {
        thumbnailList.appendChild(thumbnails[0]);
    }

    nextButton.addEventListener("click", () => showSlide("next"));
    previousButton.addEventListener("click", () => showSlide("prev"));
    scheduleAutoAdvance();
}
