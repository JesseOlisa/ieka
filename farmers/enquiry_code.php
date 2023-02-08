<?php

    session_start();

    //connecting to the database
    include '../library/config.php';


    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../farmer-login.php");
        exit();
    } else {
        $name = $_POST['farmer_name'];
        $enquiry = $_POST['issue'];
        $farmId = $_POST['farm_id'];
    
        //get the details of the farmer
        $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
        $farmer = $database->query($sql)->fetch_assoc();

        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');

        if(!empty($enquiry)) {
            if($farmer['farm_id'] === $farmId) {
                $portfolio = "farmer";
                //insert into the REPORTS database
                $sql = "INSERT INTO enquiries(`name`, `portfolio`, `enquiry`, `modified_at`)
                    VALUES('{$name}', '{$portfolio}', '{$enquiry}', '{$created_at}')";
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