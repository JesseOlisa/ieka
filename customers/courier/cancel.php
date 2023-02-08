<?php

    session_start();

    //connecting to the database
    include '../../library/config.php';


    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../customer-login.php");
        exit();
    } else {
        if(isset($_POST['delete'])):
            $id = $_POST['number'];
            $sql = "DELETE FROM customer_couriers WHERE id = {$id}";
            $result = $database->query($sql);
            echo "success";
        endif;
    }

?>