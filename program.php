<?php
    include 'db_connexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $commentaire = $_POST['commentaire'];

      $query = "INSERT INTO program (name, email, commentaire) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("sss", $name, $email, $commentaire);
      $stmt->execute();
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
        <a href="index.php"><img src="image/logoI.png" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="program.php">COURSE</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <h1>Programs</h1>
    </section>
    <!---blog page content-->
    <section class="blog-content">
      <div class="row">
        <div class="blog-left">
          <h2>Our Programs For 2023/2024</h2>
          <img src="image/master.jpg" />
          <div class="comment-box">
            <h3 style="font-size: 28px">Leave a comment</h3>
            <form class="comment-form" method="POST" action="program.php">
              <input
                name="name"
                type="text"
                placeholder="Enter Name"
                pattern="[A-Za-z\s]+"
                title="Please enter a valid name (letters only)"
                required
              />
              <input
                name="email"
                type="email"
                placeholder="Enter Your Email"
                pattern="[a-zA-Z0-9._%+-]+@(gmail|icloud|outlook)\.com"
                title="Please enter a valid email address"
                required
              />
              <textarea rows="5" placeholder="Your Comment" name="commentaire"></textarea>
              <button type="submit" class="hero-btn red-btn">
                Post Comments
              </button>
            </form>
          </div>
        </div>
        <div class="blog-right">
          <h3>Post Categories</h3>
          <div>
            <span>Informatique & Multimédia</span>
          </div>

          <div>
            <span>Big DATA & Analyse de Données</span>
          </div>
          <div>
            <span>Micro Informatique & Machines Embarqués</span>
          </div>
          <div>
            <span>Coco jeux Video</span>
          </div>
          <div>
            <span>Coco 3D</span>
          </div>
          <div>
            <span>Communicaton Multimedia</span>
          </div>
          <div>
            <span>Cinéma et Audio Visuel</span>
          </div>
        </div>
      </div>
    </section>

    <!----Footer-->

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h2>Contact Information</h2>
            <ul>
              <li>
                <a
                  ><i class="fa fa-map-marker"></i> University Campus of La
                  Manouba - CP 2010, Tunis, Tunisia</a
                >
              </li>
              <li>
                <a
                  ><i class="fa fa-envelope"></i>Email:
                  direction@isamm.uma.tn</a
                >
              </li>
              <li>
                <a><i class="fa fa-phone"></i>Tel: +216 71 603 498</a>
              </li>
              <li>
                <a><i class="fa fa-fax"></i>Fax: +216 71 603 450</a>
              </li>
            </ul>
            <div class="social-links">
              <a href="https://www.facebook.com/profile.php?id=100063945285880"
                ><i class="fa fa-facebook"></i
              ></a>
              <a href="https://www.linkedin.com/school/isamm-manouba/"
                ><i class="fa fa-linkedin"></i
              ></a>
            </div>
          </div>
          <div class="footer-col-map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.0905728666976!2d10.058772015031954!3d36.816349479945316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd2d9783ace44f%3A0xde66d0d8c4b29aa6!2sISAMM%20Institut%20Sup%C3%A9rieur%20des%20Arts%20Multim%C3%A9dia%20de%20la%20Manouba!5e0!3m2!1sfr!2stn!4v1670268274591!5m2!1sfr!2stn"
              width="500"
              height="240"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
