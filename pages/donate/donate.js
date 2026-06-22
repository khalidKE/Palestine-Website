"use strict";

function showPaymentDetails(paymentMethod) {
    const visaDetails = document.getElementById("visa-details");
    const vodafoneCashDetails = document.getElementById("vodafone-cash-details");

    if (!visaDetails || !vodafoneCashDetails) {
        return;
    }

    visaDetails.style.display = paymentMethod === "visa" ? "block" : "none";
    vodafoneCashDetails.style.display = paymentMethod === "vodafone-cash" ? "block" : "none";
}

document.addEventListener("DOMContentLoaded", () => {
    const donationForm = document.getElementById("donation-form");

    donationForm?.addEventListener("submit", (event) => {
        event.preventDefault();
        alert("Great job, you will save the lives of innocent people");
    });
});
