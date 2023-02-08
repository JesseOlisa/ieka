<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

     //check if the user is logged in
     if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    }
    
    //check if the customer has a chat record
    $customer = $_SESSION['id'];

    $sql = "SELECT * FROM messages WHERE sender = '{$customer}' OR receiver = '{$customer}'";
    $query = $database->query($sql);
    if($query->num_rows == 0) {
        echo "No chat record yet!";
    }

?>