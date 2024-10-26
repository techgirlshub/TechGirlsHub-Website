
const stars = document.querySelectorAll('#starRating span');
const ratingInput = document.getElementById('rating');

// Handle star hover and click events
stars.forEach((star, index) => {
  star.addEventListener('mouseover', () => {
    fillStars(index + 1);
  });
  
  star.addEventListener('click', () => {
    ratingInput.value = index + 1;
  });
  
  star.addEventListener('mouseout', () => {
    resetStars();
    if (ratingInput.value) {
      fillStars(ratingInput.value);
    }
  });
});

// Function to fill stars up to a certain rating
function fillStars(rating) {
  stars.forEach((star, index) => {
    if (index < rating) {
      star.classList.add('filled');
    } else {
      star.classList.remove('filled');
    }
  });
}

// Function to reset stars (no fill)
function resetStars() {
  stars.forEach(star => star.classList.remove('filled'));
}

/*
// Handle form submission
document.getElementById('feedbackForm').addEventListener('submit', function(event) {
  event.preventDefault();

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const feedback = document.getElementById('feedback').value;
  const rating = ratingInput.value;

  if (!rating) {
    alert('Please select a rating.');
    return;
  }

  // Example of form data handling - Displaying the feedback as a confirmation
  document.getElementById('responseMessage').innerHTML = `
    <div class="alert alert-success" role="alert">
      Thank you, <strong>${name}</strong>! Your feedback has been received.<br>
      Rating: ${rating} stars<br>
      Message: ${feedback}
    </div>
  `;

  // Reset form after submission
  document.getElementById('feedbackForm').reset();
  resetStars();
});
*/