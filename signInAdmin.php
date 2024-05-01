<?php
  include 'db_connexion.php';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE emailAdmin='$email' AND passwordAdmin='$password'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Start a new session or resume the existing one
        session_start();

        // Store admin data in session variables
        $admin = $result->fetch_assoc();
        $_SESSION['admin_id'] = $admin['idAdmin'];
        $_SESSION['admin_email'] = $admin['emailAdmin'];

        // Redirect to admin dashboard or any other page
        header("Location: admin_dashboad.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In Admin</title>
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
        
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <div
      style="
        width: 522px;
        height: 400px;
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
        Admin Login 
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
      <form method="POST" action="signInAdmin.php">
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
          margin-top: 50px;
        "
      >
        Continuer
      </button>

      </form>
      
    </div>
    </section>

  </body>
</html>

