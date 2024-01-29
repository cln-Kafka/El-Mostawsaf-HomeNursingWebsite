function openFeedbackPopup() {
    document.getElementById("feedbackPopup").style.display = "block";
  }
  
  function closeFeedbackPopup() {
    document.getElementById("feedbackPopup").style.display = "none";
  }
  
  function submitFeedback() {
    var feedback = document.querySelector(".feedback-input").value;
    var rating = document.querySelector("feedback.rating").value;
    // Perform actions with the feedback (e.g., send it to a server)
    closeFeedbackPopup();
  }
  