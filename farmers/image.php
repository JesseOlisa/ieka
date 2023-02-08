<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    $customer = $_GET['id'];
    $sql = "SELECT picture FROM customers WHERE id = {$customer}";
    $result = $database->query($sql);
    $record = $result->fetch_assoc();

    header("Content-type: image/png");
    echo $record['picture'];
    
?>