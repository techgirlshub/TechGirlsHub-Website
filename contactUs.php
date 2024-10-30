<?php session_start();//create a session for each user and use the session states ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGirlsHub - Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
        <style>

            header {
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 15px 50px;
              background: linear-gradient(90deg, #00a3c8 0%, #d282fc 100%);
              position: sticky;
              top: 0;
              z-index: 1000;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            header .logo img {
              width: 150px;
              background-color: transparent;
              border: none;
            }

            nav ul {
              list-style-type: none;
              display: flex;
              gap: 20px;
            }

            nav ul li {
              display: inline;
            }

            nav ul li a {
              text-decoration: none;
              color: #fcfcfc;
              font-size: 16px;
              transition: color 0.3s;
            }

            nav ul li a:hover {
              color: #0056b3;
            }

            /* Sticky Header */
            header.sticky {
              background: linear-gradient(90deg, #d282fc 0%, #0093c8 100%);
            }

            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}
            
            input[type=text], select, textarea {
              width: 100%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              margin-top: 6px;
              margin-bottom: 16px;
              resize: vertical;
            }
            
            input[type=submit] {
              background-color: #04AA6D;
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            
            input[type=submit]:hover {
              background-color: #45a049;
            }
            
            .container {
              border-radius: 5px;
              background-color: #f2f2f2;
              padding: 20px;

            }

            .social-icons {
              list-style-type: none;
              display: flex;
              gap: 10px; /* Reduced gap */
              padding: 0;
              margin: 0;
              }

            .social-icons li {
                display: inline-flex;
            }

            .social-icons li a {
                color: white;
                font-size: 20px; /* Reduced icon size */
                transition: color 0.3s;
                text-decoration: none;
            }

            .social-icons li a:hover {
                color: #1c1b4d; 
                transform: scale(1.1); /* Optional: slightly enlarge on hover */
            }

            /* Footer Styles */
            footer {
              background: linear-gradient(to right, #08979d, #ae7fbe);
              color: white;
              padding: 40px 0px;
              margin-top: 50px;
            }

            footer .container {
              display: flex;
              justify-content: space-between;
              align-items: flex-start;
              flex-wrap: wrap;
              background: linear-gradient(to right, #08979d, #ae7fbe);
            }

            footer .footer-left,
            footer .footer-middle,
            footer .footer-right {
              flex: 1;
              margin: 10px;
             
            }

            footer h3 {
              font-size: 24px;
              margin-bottom: 10px;
            }

            footer p {
              font-size: 14px;
              line-height: 1.6;
            }

            footer ul {
              list-style-type: none;
              padding-left: 0;
            }

            footer ul li {
              margin-bottom: 8px;
            }

            footer ul li a {
              color: white;
              border-top: 1px solid rgba(255, 255, 255, 0.2);
              text-decoration: none;
              transition: color 0.3s;
            }

            footer ul li a:hover {
              color: #d1c1ff;
            }

            .footer-bottom {
              margin-top: 30px;
              border-top: 1px solid rgba(255, 255, 255, 0.2);
              padding-top: 20px;
              text-align: center;
            }

            .footer-bottom ul {
              list-style: none;
              display: flex;
              justify-content: center;
              padding: 0;
            }

            .footer-bottom ul li {
              margin: 0 10px;
            }

            .footer-bottom ul li a {
              color: white;
              text-decoration: none;
              transition: color 00.3s;
            }

            .footer-bottom ul li a:hover {
              color: #d1c1ff;
            }

            /* Social Icons */
            .social-icons a i {
              width: 30px;
              margin-top: 5px;
              margin-right: 5px;
            }

        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
      <header>
        <div class="logo">
         <a href ="/"><img src="images/TGHlogo-noback.png" alt="TechGirlsHub Logo" /></a>
        </div>
        <nav>
                <ul>
                    <li><a href="#index.html">About Us</a></li>
                    <li><a href="#Services.html">Services</a></li>
                    <li><a href="#projects.html">Projects</a></li>
                    <li><a href="#team">Team Members</a></li>
                    <li><a href="#contactUs.php">Contact Us</a></li>
                    <li><a href="#feedbackRating.php">Feedback Rating</a></li>
                </ul>
        </nav>
      </header>

             <!-- Hero Section -->
              <section style="position: relative; width: 100%; height: 300px; background-image: url('images/hero2.jpg'); background-size: 400px 300px; background-position: center;">
                  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;">
                      <h1 style="color: #fff; font-size: 2.5rem; text-align: center;">Let’s Build Something Together</h1>
                  </div>
              </section>

        <!-- Contact Form Section -->
       <section style="display: flex; flex-direction: column; align-items: center; padding: 40px 20px; background-color: #f4f4f4;">
        <div style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); width: 100%; max-width: 500px;">
            <h2 style="text-align: center; color: #333;">Contact Us</h2>
            <form action="sendContactUsEmail.php" method="post" style="display: flex; flex-direction: column; gap: 15px;">
            <!--form style="display: flex; flex-direction: column; gap: 15px;"-->
                <!-- Name Field -->
                <input type="text" class="form-control" id="yourname" name="yourname" placeholder="Name" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

                <!-- Email Field -->
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

                <!-- Phone Number Field -->
                <input type="text" pattern="[0-9]{10}" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

                <!-- Message Field -->
                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="4" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required></textarea>

                <!-- Request Callback Checkbox -->
                <label style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="requestCallback" name="requestCallback">
                    <span>Request a Callback</span>
                </label>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" name="submitContact" value="Submit" style="padding: 12px; background-color: #333; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Send Message</button>
            </form>
        </div>
    </section>

     <!-- Contact Information Section -->
     <section style="text-align: center; padding: 20px; background-color: #333; color: #fff;">
        <h3>Contact Information</h3>
        <p>Email: testaccount3@techgirlshub.co.za</p>
        <p>Phone: 082 338 9840</p>
    </section>




    <!-- Footer Section -->
    <footer>
      <div class="container">
        <div class="footer-left">
          <h3>TechGirlsHub</h3>
          <p>
            TechGirlsHub is a team of women in tech, showcasing projects,
            expertise, and services while connecting with clients.
          </p>
          <div class="social-icons">
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
          </div>
        </div>
        <div class="footer-middle">
          <h3>MENU</h3>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#Services.html">Services</a></li>
            <li><a href="#projects.html">Projects</a></li>
          </ul>
        </div>
        <div class="footer-right">
          <h3>LINKS</h3>
          <ul>
            <li><a href="#index.html">About Us</a></li>
            <li><a href="#team">Team Members</a></li>
            <li><a href="#contactUs.php">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 TechGirlsHub. All rights reserved.</p>
        <ul class="footer-policy-links">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Cookie Policy</a></li>
        </ul>
      </div>
    </footer>

     
      

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>


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
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>


    </body>
</html> 