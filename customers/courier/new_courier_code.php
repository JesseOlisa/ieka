<?php

    session_start();

    //connecting to the database
    include '../../library/config.php';


    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../customer-login.php");
        exit();
    } else {
        //get all the form parameters
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $farmer = $_POST['farm_id'];
        $delivery_address = $_POST['delivery_address'];
        $delivery_state = $_POST['delivery_state'];
        $delivery_country = $_POST['delivery_country'];
        $recipient_name = $_POST['recipient_name'];
        $recipient_phone = $_POST['recipient_phone'];
        $courier = $_POST['courier_description'];
        $price = $_POST['total_price'];

        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');

        //get the data of the customer
        $sql = "SELECT * FROM customers WHERE id = '{$_SESSION['id']}'";
        $record = $database->query($sql)->fetch_assoc();
        $customer = $record['id'];

        //if all the inputs are not empty
        if(isset($_POST['add_courier'])) {
        if(!empty($customer_name) AND !empty($customer_phone) AND !empty($farmer) AND !empty($delivery_address) AND !empty($delivery_country) AND !empty($delivery_state) AND !empty($recipient_name) AND !empty($recipient_phone) AND !empty($courier) AND !empty($price)) {
            //make sure that there is a farmer with a corresponding farm id
            $sql = "SELECT * FROM farmers WHERE farm_id = '{$farmer}'";
            $query = $database->query($sql)->fetch_assoc();
            //if there is a farmer there, allow the courier to be placed
            if($query === NULL) {
                echo "There is no farmer with that farm id in IEKA!";
            } elseif($farmer === $query['farm_id']) {
                //get the reference id for every courier
                //this gives the courier a 12-digit identifier
                $reference = rand(0, 9999999999);

                $status = "Order placed";
                //insert the courier into the customer courier table
                $sql0 = "INSERT INTO customer_couriers(`customer_name`, `customer_phone`, `customer_id`, `farmer_id`, `delivery_address`, `delivery_country`, `delivery_state`, `recipient_name`, `recipient_phone`, `courier`, `price`, `reference`, `status`, `modified_at`)
                    VALUES('{$customer_name}', '{$customer_phone}', '{$customer}', '{$farmer}', '{$delivery_address}', '{$delivery_country}', '{$delivery_state}', '{$recipient_name}', '{$recipient_phone}', '{$courier}', '{$price}', '{$reference}', '{$status}', '{$created_at}')";
                $result = $database->query($sql0);
                if($result) {
                    echo "success";
                }    
        }
        }
    }}

?>