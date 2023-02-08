<?php

    //connecting to the database
    include '../../library/config.php';


    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../customer-login.php");
        exit();
    } else {
    }

    //get the details of the farmer logged in
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
    $result = $database->query($sql)->fetch_assoc();
    
    var_dump($number);die();
    if($number === NULL):
        echo 'dead';die();
    else:
        $srl = "SELECT * FROM customer_couriers WHERE id = {$number}";
        $query = $database->query($srl)->fetch_assoc();
        
        if(isset($_POST['add_courier'])):
            //get the parameters in the form
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

            if(!empty($customer_name) AND !empty($customer_phone) AND !empty($farmer) AND !empty($delivery_address) AND !empty($delivery_country) AND !empty($delivery_state) AND !empty($recipient_name) AND !empty($recipient_phone) AND !empty($courier) AND !empty($price)):
                if($query['farmer_id'] !== $farmer):
                    echo "Farmer details are incorrect";
                else:
                    $status = "Order Placed";
                    $spl = "UPDATE customer_couriers
                        SET `customer_name` = '{$customer_name}', `customer_phone` = '{$customer_phone}', `customer_id` = '{$result['id']}', `farmer_id` = '{$farmer}',
                            `delivery_address` = '{$delivery_address}', `delivery_country` = '{$delivery_country}', `delivery_state` = '{$delivery_state}', `recipient_name` = '{$recipient_name}', 
                            `recipient_phone` = '{$recipient_phone}', `courier` = '{$courier}', `price` = '{$price}', `status` = '{$status}'
                        WHERE id = {$query['id']}";
                    $update = $database->query($spl);
                    if($update):?>
                        <script>
                            window.location = "view.php";
                        </script><?php
                    endif;
                endif;
                
            endif;

        endif;
    endif;

?>