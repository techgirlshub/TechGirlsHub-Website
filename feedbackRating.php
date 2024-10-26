<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form Rating</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="styles-feedbackRating.css" rel="stylesheet">
  <style>
   
  </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="images/TechGirlsHub Logo.png" alt="TechGirlsHub Logo" />
    </div>
    <nav>
        <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#team">Team Members</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#contact">Feedback Rating</a></li>
        </ul>
    </nav>
</header>

  <div class="container feedback-container">
    <h2 class="mb-4 text-center">Feedback Form</h2>
    <form id="feedbackForm" action="php/feedbackRatingSubmission.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="project" class="form-label">Project</label>
        <input class="form-control" list="projectList" id="project" name="project" placeholder="Select a project you would like to rate:" required>
        <datalist id="projectList">
          <option value="1 - Website"></option>
          <option value="2 - unknown"></option>
          <option value="3 - unknown"></option>
          <option value="4 - unknown"></option>
          <option value="5 - unknown"></option>
        </datalist>
        
      </div>
      <div class="mb-3">
        <label for="feedback" class="form-label">Feedback</label>
        <textarea class="form-control" id="feedback" name="comment" rows="4" placeholder="Write your feedback" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Rating</label>
        <div id="starRating" class="star-rating">
          <span data-value="1">&#9733;</span>
          <span data-value="2">&#9733;</span>
          <span data-value="3">&#9733;</span>
          <span data-value="4">&#9733;</span>
          <span data-value="5">&#9733;</span>
        </div>
        <input type="hidden" id="rating" name="rating" required>
      </div>
      <button type="submit" name="feedbackRatingSubmission" class="btn btn-primary">Submit Feedback</button>
    </form>
   
  </div>

  <!-- Start Footer -->
  <footer>
  <div class="footer-container">
    <div class="footer-left">
      <h2>TechGirlsHub</h2>
      <p>
        TechGirlsHub is a team of women in tech, showcasing projects,
        expertise, and services while connecting with clients.
      </p>
      <div class="social-icons">
        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="#" aria-label="TikTok"><i class="fab fa-tiktok fa-2x"></i></a>
      </div>
    </div>
    <div class="footer-middle">
      <h3>MENU</h3>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#projects">Projects</a></li>
      </ul>
    </div>
    <div class="footer-right">
      <h3>LINKS</h3>
      <ul>
        <li><a href="#about">About Us</a></li>
        <li><a href="#team">Team Members</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2024 TechGirlsHub. All rights reserved.</p>
    <ul>
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Terms and Conditions</a></li>
      <li><a href="#">Cookie Policy</a></li>
    </ul>
  </div>
</footer>

  <!--End Footer -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="script-feedbackRating.js"></script>
<script>


var message = "<?= $_SESSION['status'] ?? ''; 
?>";
debugger;
if(message) {
  Swal.fire({
    title: "Thank you!",
    text: message,
    icon: "success"
  });
  <?php unset($_SESSION['status']); ?>
}

</script>
</body>
</html>
