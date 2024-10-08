
        // function scrollToSection() {
        //     // Get the element to scroll to
        //     var section = document.querySelector('.t2');
        //     // alert("Action performed!");
        //     // Scroll to the section
        //     section.scrollIntoView({ behavior: 'smooth' });
        // }

        function refreshPage() {
            location.reload();
}
        
const dot = document.querySelector('.dot');

function fadeInOut() {
  dot.style.opacity = '1';
  requestAnimationFrame(fadeOut);
}

function fadeOut() {
  dot.style.opacity = '0';
  requestAnimationFrame(fadeInOut);
}

requestAnimationFrame(fadeInOut);





"use strict";
// scrolling for top
const scroller = document.getElementById("progress-scroll");
if (scroller) {
    scroller.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}
document.addEventListener("DOMContentLoaded", () => {
    "use strict";
    // Scroll back to top
    const progressPath = document.querySelector(".progress-wrap path");
    if (progressPath) {
        const pathLength = progressPath.getTotalLength();
        progressPath.style.transition = "none";
        progressPath.style.strokeDasharray = `${pathLength} ${pathLength}`;
        progressPath.style.strokeDashoffset = `${pathLength}`;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = "stroke-dashoffset 10ms linear";
        const updateProgress = () => {
            const scroll = window.scrollY || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - window.innerHeight;
            const progress = pathLength - (scroll * pathLength) / height;
            progressPath.style.strokeDashoffset = `${progress}`;
        };
        window.addEventListener("scroll", updateProgress);
        const offset = 50;
        window.addEventListener("scroll", () => {
            if (window.scrollY > offset) {
                const progressWrap = document.querySelector(".progress-wrap");
                if (progressWrap) {
                    progressWrap.classList.add("active-progress");
                }
            }
            else {
                const progressWrap = document.querySelector(".progress-wrap");
                if (progressWrap) {
                    progressWrap.classList.remove("active-progress");
                }
            }
        });
    }
});






