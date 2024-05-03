<?php
    include 'db_connexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      $query = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ssss", $name, $email, $subject, $message);

      if ($stmt->execute()) {
        header("Location: contact-result.php");
        exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>University Website</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <section class="sub-header">
      <nav>
        <a href="signIn-result.html"><img src="image/logoI.png" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="signIn-result.html">HOME</a></li>
            <li><a href="about-result.html">ABOUT</a></li>
            <li><a href="contact-result.php">CONTACT</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <h1>Contact</h1>
    </section>
    <!-----contact us-->
    <section class="location">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.0905728666976!2d10.058772015031954!3d36.816349479945316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd2d9783ace44f%3A0xde66d0d8c4b29aa6!2sISAMM%20Institut%20Sup%C3%A9rieur%20des%20Arts%20Multim%C3%A9dia%20de%20la%20Manouba!5e0!3m2!1sfr!2stn!4v1670268274591!5m2!1sfr!2stn"
        width="600"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </section>
    <section class="contact-us">
      <div class="row">
        <div class="contact-col">
          <div>
            <i class="fa fa-home"></i>
            <span>
              <h5>ISAMM, Campus Universitaire de la Manouba, 2010</h5>
            </span>
          </div>
          <div>
            <i class="fa fa-envelope-o"></i>
            <span>
              <h5>direction@isamm.uma.tn</h5>
              <p>Email us</p>
            </span>
          </div>
          <div>
            <i class="fa fa-phone"></i>
            <span>
              <h5>+216 71 603 498</h5>
            </span>
          </div>
        </div>
        <div class="contact-col">
          <form method="POST" action="contact-result.php">
            <input
              type="text"
              name="name"
              placeholder="Enter Your Name"
              required
            />
            <input
              type="email"
              name="email"
              placeholder="Enter Your Email"
              pattern="[a-zA-Z0-9._%+-]+@(gmail|icloud|outlook)\.com"
              title="Please enter a valid email address"
              required
            />
            <input
              type="text"
              name="subject"
              placeholder="Enter Your subject"
              required
            />
            <textarea
              rows="5"
              name="message"
              placeholder="Your Message"
            ></textarea>
            <button
              type="submit"
              class="hero-btn red-btn"
              style="margin-left: 14px"
            >
              Send Message
            </button>
          </form>
        </div>
      </div>
    </section>
    <script>
    function validateForm() {
        var name = document.forms["contactForm"]["name"].value;
        var email = document.forms["contactForm"]["email"].value;
        var subject = document.forms["contactForm"]["subject"].value;
        var message = document.forms["contactForm"]["message"].value;

        var namePattern = /^[a-zA-Z ]{2,30}$/;
        var emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail|icloud|outlook)\.(com|fr|tn)$/;
        var subjectPattern = /^[a-zA-Z ]{2,30}$/;
        var messagePattern = /^[a-zA-Z ]{2,500}$/;

        if (!namePattern.test(name)) {
          alert("Invalid name. Please enter a valid name.");
          return false;
        }

        if (!emailPattern.test(email)) {
          alert("Invalid email. Please enter a valid email.");
          return false;
        }

        if (!subjectPattern.test(subject)) {
          alert("Invalid subject. Please enter a valid subject.");
          return false;
        }

        if (!messagePattern.test(message)) {
          alert("Invalid message. Please enter a valid message.");
          return false;
        }

        return true;
    }
    </script>
  </body>
</html>
