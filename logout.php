<?php
    session_start();
    include 'db_connexion.php';

    // When the user clicks "LOGOUT"
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $userId = $_SESSION['user_id'];

        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Remove all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header("Location: index.php");
        exit;
    }
?>