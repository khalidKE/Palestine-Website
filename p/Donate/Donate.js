function showPaymentDetails(paymentMethod) {
    var visaDetails = document.getElementById("visa-details");
    var vodafoneCashDetails = document.getElementById("vodafone-cash-details");
    
    if (paymentMethod === 'visa') {
      visaDetails.style.display = "block";
      vodafoneCashDetails.style.display = "none";
    } else if (paymentMethod === 'vodafone-cash') {
      visaDetails.style.display = "none";
      vodafoneCashDetails.style.display = "block";
    } else {
      visaDetails.style.display = "none";
      vodafoneCashDetails.style.display = "none";
    }
  }