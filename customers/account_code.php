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
        $account_issue = $_POST['issue'];
    
        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');

        if(!empty($account_issue)) {
            //insert into the REPORTS database
            $sql = "INSERT INTO customer_account_issues(`customer_name`, `account_issue`, `modified_at`)
                VALUES('{$name}', '{$account_issue}', '{$created_at}')";
            $result = $database->query($sql);
            if($result) {
               echo "Successful";
            }
        }

    }

?>