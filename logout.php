<?php
    session_start();
    include 'db_connexion.php';

    // When the user clicks "LOGOUT"
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        // Remove all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header("Location: index.php");
        exit;
    }
?>