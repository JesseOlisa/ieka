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
        $report = $_POST['issue'];
    
        //get the details of the farmer
        $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
        $customer = $database->query($sql)->fetch_assoc();

        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');

        if(!empty($report)) {
            if($customer['id'] === $_SESSION['id']) {
                $portfolio = "customer";
                //insert into the REPORTS database
                $sql = "INSERT INTO reports(`name`, `unique_code`, `portfolio`, `report`, `modified_at`)
                    VALUES('{$name}', '{$customer['id']}', '{$portfolio}', '{$report}', '{$created_at}')";
                $result = $database->query($sql);
                if($result) {
                    echo "Successful";
                }
            } else {
                echo "We don't have your report! Please try again";
            }
        }

    }

?>