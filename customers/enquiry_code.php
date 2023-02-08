<?php

    session_start();

    //connecting to the database
    include '../library/config.php';


    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    } else {
        $name = $_POST['customer_name'];
        $enquiry = $_POST['issue'];
    
        //get the details of the farmer
        $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
        $customer = $database->query($sql)->fetch_assoc();

        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');

        if(!empty($enquiry)) {
            if($customer['id'] === $_SESSION['id']) {
                $portfolio = "customer";
                //insert into the REPORTS database
                $sql = "INSERT INTO enquiries(`name`, `unique_id`, `portfolio`, `enquiry`, `modified_at`)
                    VALUES('{$name}', '{$customer['id']}', '{$portfolio}', '{$enquiry}', '{$created_at}')";
                $result = $database->query($sql);
                if($result) {
                    echo "Successful";
                }
            } else {
                echo "We don't have your enquiry! Please try again";
            }
        }

    }

?>