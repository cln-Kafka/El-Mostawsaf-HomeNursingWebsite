document.addEventListener("DOMContentLoaded", function() {
  // Get all the request buttons and corresponding popups
  const requestButtons = document.querySelectorAll(".custom-request-btn");
  const requestPopups = document.querySelectorAll(".request-popup");

  // Get all the rate buttons and corresponding popups
  const rateButtons = document.querySelectorAll(".custom-rate-btn");
  const ratePopups = document.querySelectorAll(".rate-popup");

  // Show the corresponding request popup when a request button is clicked
  requestButtons.forEach(function(button, index) {
    button.addEventListener("click", function() {
      requestPopups[index].style.display = "block";
    });
  });

  // Show the corresponding rate popup when a rate button is clicked
  rateButtons.forEach(function(button, index) {
    button.addEventListener("click", function() {
      ratePopups[index].style.display = "block";
    });
  });

  // Hide the popups when the close button is clicked
  const closeButtons = document.querySelectorAll(".close-btn");
  closeButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      requestPopups.forEach(function(popup) {
        popup.style.display = "none";
      });
      ratePopups.forEach(function(popup) {
        popup.style.display = "none";
      });
    });
  });
});
