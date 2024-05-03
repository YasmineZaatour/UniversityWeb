<?php
  include 'db_connexion.php';

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nom_prenom=$_POST["nom_prenom"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $tel=$_POST["tel"];

    $sql="INSERT INTO users (nom_prenom,email,password,tel) VALUES ('$nom_prenom','$email','$password','$tel')";

    if ($conn->query($sql) === TRUE) {
      // Redirect to signIn.php
      header("Location: signIn.php");
      exit;
    } else {
      echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Sign Up</title>
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
          height: 640px;
          margin-left: 600px;
          margin-top: 90px;
          padding: 5px;
          background-color: #a5c1d5;
          text-align: center;
          border-radius: 15px;
        "
        class="signUpContainer"
      >
        <h2 style="color: white; font-size: 40px; margin-bottom: 40px; margin-top: 30px">
          Inscription
        </h2>
        <p
          style="
            color: white;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 600;
          "
        >
          Ajouter toutes les informations
        </p>
        <form name="myForm" method="POST" action="signUp.php" onsubmit="return validateForm()">
        <input
          name="nom_prenom"
          style="
            width: 380px;
            height: 45px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
            margin-left: auto;
            margin-right: auto;
            padding: 3px;
            color: black;
          "
          type="text"
          placeholder="Nom Prenom"
        />
        <input
          name="email"
          style="
            width: 380px;
            height: 45px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
            margin-left: auto;
            margin-right: auto;
            padding: 3px;
            color: black;
          "
          type="email"
          placeholder="Email"
        />
        <input
          name="password"
          style="
            width: 380px;
            height: 45px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
            margin-left: auto;
            margin-right: auto;
            padding: 3px;
            color: black;
          "
          type="password"
          placeholder="Mot de Passe"
        />
        <input
          name="tel"
          style="
            width: 380px;
            height: 45px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
            margin-left: auto;
            margin-right: auto;
            padding: 3px;
            color: black;
          "
          type="tel"
          placeholder="Numero de telephone"
        />
        <div 
          
          style="
            display: flex;
            align-items: center;
            color: white;
            margin-left: 53px;
            margin-right: 53px;
            margin-top: 10px;
          "
          class="signUp-divider"
        >
          <hr
            style="flex: 1; border: none; height: 1px; background-color: white"
          />
          <span style="padding-left: 20px; padding-right: 20px">Ou</span>
          <hr
            style="flex: 1; border: none; height: 1px; background-color: white"
          />
        </div>
        <div
          style="
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 40px;
          "
          class="icons"
        >
          <img
            style="width: 70px; height: 40px; margin-right: 4px"
            alt="Facebook logo"
            src="image/facebook.png"
          />
          <img
            style="width: 40px; height: 40px; margin-right: 4px"
            alt="Facebook logo"
            src="image/googleI.png"
          />
        </div>
        <button
          style="
            width: 380px;
            height: 45px;
            background-color: rgb(42, 174, 221);
            border-radius: 8px;
            border: none;
            color: white;
            font-size: large;
            font-weight: bold;
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
              margin-top: 10px;
              font-weight: 300;
              margin-right:10px;
            "
          >
            Vous avez de compte? 
          </p>
          <a href="signIn.php" style="color: white; font-size: 14px; margin-top: 10px; font-weight: 200;">Register</a>
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
    <script>
    function validateForm() {
        var nom_prenom = document.forms["myForm"]["nom_prenom"].value;
        var email = document.forms["myForm"]["email"].value;
        var password = document.forms["myForm"]["password"].value;
        var tel = document.forms["myForm"]["tel"].value;
        if (nom_prenom == "") {
          alert("Name is required.");
          return false;
        }
        if(email =="" ){
          alert("Email is required.");
          return false;
        }
        if(password =="" ){
          alert("Password is required.");
          return false;
        }
        if(tel =="" ){
          alert("Phone Number is required.");
          return false;
        }
        if (nom_prenom == "" || email == "" || password == "" || tel == "") {
          alert("All fields are required.");
          return false;
        }
        var namePattern = /^[a-zA-Z ]{2,30}$/;
        var emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail|icloud|outlook)\.(com|fr|tn)$/;
        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        var telPattern = /^\d{8}$/;

        if (!namePattern.test(nom_prenom)) {
          alert("Invalid name. Please enter a valid name.");
          return false;
        }

        if (!emailPattern.test(email)) {
          alert("Invalid email. Please enter a valid email.");
          return false;
        }

        if (!passwordPattern.test(password)) {
          alert("Invalid password. Password must contain at least one number, one lowercase and one uppercase letter, and at least 8 or more characters.");
          return false;
        }

        if (!telPattern.test(tel)) {
          alert("Invalid phone number. Please enter a valid phone number.");
          return false;
        }

        return true;
    }
  </script>
  </body>
</html>
