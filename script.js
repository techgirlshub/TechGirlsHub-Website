window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
});

document
  .getElementById("serviceRequestForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default submission

    // Get form data
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const budget = document.getElementById("budget").value;
    const service = document.getElementById("service").value;
    const websiteType = document.getElementById("website-type").value;
    const details = document.getElementById("details").value;

    // Using EmailJS to send an email (you'll need to set up an account)
    emailjs
      .send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", {
        name: name,
        email: email,
        phone: phone,
        budget: budget,
        service: service,
        websiteType: websiteType,
        details: details,
      })
      .then(
        function (response) {
          console.log("SUCCESS!", response.status, response.text);
          document.getElementById("successMessage").style.display = "block"; // Show success message
          document.getElementById("serviceRequestForm").reset(); // Reset the form
        },
        function (error) {
          console.log("FAILED...", error);
          alert("There was an error sending your request. Please try again.");
        }
      );
  });
