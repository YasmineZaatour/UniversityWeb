<?php
    include 'db_connexion.php';
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
    <section class="header">
      <nav>
        <img src="image/logoI.png" />
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="signIn.php">REGISTER</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <div class="text-box">
        <h1>Welcome To My University ISAMM</h1>
        <p>
          The Higher Institute of Multimedia Arts of La Manouba is a Tunisian
          training institute in the field of<br />
          information and communication technologies, particularly in that of
          multimedia.<br />
          Attached to the University of La Manouba, it is a member of the
          International University of Multimedia.
        </p>
        <a href="https://isa2m.rnu.tn/" class="hero-btn"
          >Visit us to know More</a
        >
      </div>
    </section>
    <!----course----->
    <section class="course">
      <h1>Courses We Offer</h1>

      <table>
        <tr class="first-row">
          <td>
            <h3>Big Data and Data Analysis</h3>
            <br />
            <br />
            <p>
              The Bachelor's degree in Big Data and Data Analysis focuses on
              harnessing Big Data technologies to analyze large amounts of data
              from various sources. Students acquire skills to extract useful
              information, preparing them for careers in fields such as business
              analytics and data science.
            </p>
          </td>
          <td>
            <h3>Embedded Systems</h3>
            <br />
            <br />
            <p>
              The Bachelor's degree in Embedded Systems focuses on the design,
              development, and implementation of specialized and autonomous
              computer systems. Students learn to develop embedded software,
              control real-time systems, and design computer hardware. This
              program prepares graduates for careers in fields such as
              automotive, aerospace, and consumer electronics.
            </p>
          </td>
          <td>
            <h3>Multimedia Communication</h3>
            <br />
            <br />
            <p>
              The Bachelor's degree in Multimedia Communication trains students
              in the creation, production, and dissemination of multimedia
              content through digital media. This program also covers
              theoretical aspects of communication. Graduates are prepared for
              careers in audiovisual production, online journalism, web content
              management, digital advertising, and social media marketing.
            </p>
          </td>
        </tr>
      </table>
    </section>

    <!----Call to action-->
    <section class="cta">
      <h1>
        Enroll For Our Various Online Courses <br />Anywhere From The World
      </h1>
      <a href="contact.php" class="hero-btn">Contact Us</a>
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
                  ><i class="fa fa-map-marker"></i>University Campus of La
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
          <div class="footer-col">
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
