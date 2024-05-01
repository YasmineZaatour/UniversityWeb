<?php
    $servername="localhost";
    $username="root";
    $password="root";
    $dbname="project_web";

    //créer une connexion
    $conn= new mysqli($servername,$username,$password,$dbname,8888);

    //vérifier la connexion
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
?>


