"use strict";

window.refreshPage = () => {
    window.location.reload();
};

document.addEventListener("DOMContentLoaded", () => {
    const progressWrap = document.getElementById("progress-scroll");
    const progressPath = document.querySelector(".progress-wrap path");

    if (!progressWrap || !progressPath) {
        return;
    }

    const pathLength = progressPath.getTotalLength();
    progressPath.style.transition = "none";
    progressPath.style.strokeDasharray = `${pathLength} ${pathLength}`;
    progressPath.style.strokeDashoffset = `${pathLength}`;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = "stroke-dashoffset 10ms linear";

    const updateProgress = () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = scrollHeight > 0
            ? pathLength - (scrollTop * pathLength) / scrollHeight
            : pathLength;

        progressPath.style.strokeDashoffset = `${progress}`;
        progressWrap.classList.toggle("active-progress", scrollTop > 50);
    };

    progressWrap.addEventListener("click", (event) => {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", updateProgress);
    updateProgress();
});
