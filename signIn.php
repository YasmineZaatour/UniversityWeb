<?php
  // Start a new session or resume the existing one
  session_start();

  include 'db_connexion.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // Store user data in session variables
      $user = $result->fetch_assoc();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];

      // Redirect to signIn-result.php
      header("Location: signIn-result.html");
      exit;
    } else {
      $_SESSION['login_error'] = "Password is incorrect.";
      header("Location: signIn.php");
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
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
      <div
      style="
        width: 522px;
        height: 540px;
        margin-left: 600px;
        margin-top: 100px;
        padding: 20px;
        background-color: #a5c1d5;
        text-align: center;
        border-radius: 15px;
      "
      class="signInContainer"
    >
      <h2 style="color: white; font-size: 40px; margin-bottom: 50px">
        Connectez vous
      </h2>
      <p
        style="
          color: white;
          font-size: 20px;
          margin-bottom: 10px;
          font-weight: 600;
        "
      >
        Saisissez votre e-mail et mot de passe
      </p>
      <?php
        

        if (isset($_SESSION['login_error'])) {
          echo "<p id='loginErrorMessage' style='color:red; text-align:center;'>" . $_SESSION['login_error'] . "</p>";
          echo "
          <script type='text/javascript'>
            setTimeout(function() {
              var element = document.getElementById('loginErrorMessage');
              element.parentNode.removeChild(element);
            }, 3000);
          </script>
          ";
          unset($_SESSION['login_error']);
        }
      ?>
      <form method="POST" action="signIn.php">
      <input
        name="email"
        style="
          width: 380px;
          height: 45px;
          border-radius: 8px;
          margin-bottom: 10px;
          border: 1px solid white;
          margin-left: auto;
          margin-right: auto;
          padding: 3px;
          padding-top: 2px;
          margin-top: 2px;
          color: black;
        "
        type="email"
        placeholder="Email"
      />
      <div style="position: relative">
        <input
          name="password"
          style="
            width: 380px;
            height: 45px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid white;
            margin-left: auto;
            margin-right: auto;
            padding: 3px;
            padding-top: 2px;
            margin-top: 2px;
            color: black;
          "
          type="password"
          placeholder="Mot de Passe"
        />
        <div
          style="
            color: white;
            font-size: small;
            text-align: right;
            margin-right: 70px;
          "
        >
          mot de passe oublié?
        </div>
      </div>
      <div
        style="
          display: flex;
          align-items: center;
          color: white;
          margin-left: 50px;
          margin-right: 50px;
          margin-top: 55px;
        "
        class="signIn-divider"
      >
        <hr
          style="flex: 1; border: none; height: 1px; background-color: white"
        />
        <span style="padding-left: 5px; padding-right: 5px">Ou</span>
        <hr
          style="flex: 1; border: none; height: 1px; background-color: white"
        />
      </div>
      <div
        style="display: flex; justify-content: center; margin-top: 18px; margin-bottom: 20px;"
        class="icons"
      >
        <img
          style="width: 70px; height: 40px; margin-right: 4px"
          alt="Facebook logo"
          src="image/facebook.png"
        />
        <img
          style="width: 38px; height: 40px; margin-right: 6px"
          alt="Google logo"
          src="image/googleI.png"
        />
      </div>
      <button
      type="submit"
        style="
          width: 380px;
          height: 45px;
          background-color: rgb(42, 174, 221);
          border-radius: 8px;
          border: none;
          color: white;
          font-size: large;
          font-weight: bold;
          margin-top: 3px;
        "
      >
        Continuer
      </button>
      <div
        style="
          display: flex;
          justify-content: center;
          margin-top: 20px;
          color: white;
        ">
          <p
        style="
          color: white;
          font-size: 14px;
          margin-bottom: 10px;
          font-weight: 300;
          margin-right:10px;
        "
      >
        Vous n'avez pas de compte? 
      </p>
      <a href="signUp.php" style="color: white; font-size: 14px; margin-bottom: 10px; font-weight: 200;">Inscrivez-vous</a>
        </div>
      </form>
      
    </div>
    </section>
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
