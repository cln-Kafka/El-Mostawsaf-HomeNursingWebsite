 // Fetch feedback data from JSON file
 fetch('feedback.json')
 .then(response => response.json())
 .then(data => {
     // Get the feedback container element
     const feedbackContainer = document.getElementById('feedbackContainer');
     
     // Loop through the feedback data
     data.forEach(feedback => {
         // Create a new container div
         const container = document.createElement('div');
         container.classList.add('feed_container');
         
         // Create the name paragraph
         const nameParagraph = document.createElement('p');
         nameParagraph.classList.add('name');
         nameParagraph.textContent = feedback.name;
         
         // Create the feedback content paragraph
         const contentParagraph = document.createElement('p');
         contentParagraph.textContent = feedback.content;
         
         // Append the paragraphs to the container
         container.appendChild(nameParagraph);
         container.appendChild(contentParagraph);
         
         // Append the container to the feedback container
         feedbackContainer.appendChild(container);
     });
 })
 .catch(error => {
     console.error('Error fetching feedback data:', error);
 });