<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../customer-login.php");
        exit();
    } else {
    

        //get the details of the farmer logged in
        $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
        $result = $database->query($sql)->fetch_assoc(); 
        
        $number = $_GET['id']; 
        if($number === NULL):
            echo 'dead';die();
        else:
            
            $srl = "SELECT * FROM customer_couriers WHERE id = {$number}";
            $query = $database->query($srl)->fetch_assoc();
            
            if(isset($_POST['add_courier'])):
                var_dump($query);die();
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
                        if($update):
                            echo "success";
                        endif;
                    endif;
                    
                endif;

            endif;
        endif; 
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit courier information</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!---SIDEBAR WITH COURIER SECTIONS-->
        <aside class="side">
            <div class="nomenclature">
                <h4><?=$result['first_name'].' '.$result['last_name'];?></h4>
                <p id="identity">Customer</p>
                <hr>
            </div>
            <div class="menu">
                <a href="dashboard.php" id="dashboard">dashboard</a>
            </div>
            <div class="menu">
                <span class="courier-btn">courier</span>
            </div>
            <div class="courier_details" style="display:block;">
                <a href="new_courier.php">new courier</a>
                <a href="list_courier.php">all courier</a>
                <a href="in_transit.php">on transit</a>
                <a href="delivered.php">delivered</a>
            </div>
            <div class="menu">
                <a href="track_courier.php" id="track">Track courier</a>
            </div>
        </aside>

        <!--SECTION WITH OTHER INFORMATION-->
        <section class="main_information">
            <!--nav bar-->
            <div class="topnav">
                <nav>
                    <div class="account section">
                        <a href="../account.php">account</a>
                    </div>
                    <div class="report section">
                        <a href="../report.php" class="nav report">report</a>
                    </div>
                    <div class="enquiry section">
                        <a href="../enquiry.php" class="nav enquiry">enquiry</a>
                    </div>
                    <div class="chat section">
                        <a href="../chat-list.php" class="nav chat">chat</a>
                    </div>
                    <div class="transactions section">
                        <a href="../transactions.php" class="nav transaction">transactions</a>
                    </div>
                    <div class="logout">
                        <a href="logout.php" class="nav-logout">logout</a>
                    </div>
                </nav>
            </div>

            <div class="headnote">
                <h6>Edit Courier information</h6>
                <hr id="under">
            </div>
            <div class="successful_submission">
                <p>Your courier order couldn't be placed!</p>
                <span id="close">Close</span>
            </div>

            <!--the various categories in the courier section-->
            <div class="new_courier">

            <!--Form for adding new courier-->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="courier_form" method="POST">
                    <div class="form_parts">
                        <div class="first_part">
                            <div>
                                <label for="customer_name">Customer name</label>
                                <input type="text" name="customer_name" id="customer_name">
                            </div>
                            <div>
                                <label for="customer_phone">Customer phone</label>
                                <input type="tel" name="customer_phone" id="customer_phone">
                            </div>
                            <div>
                                <label for="farm_id">Farm id</label>
                                <input type="number" name="farm_id" id="farm_id">
                            </div>
                            <div>
                                <label for="delivery_address">Delivery address</label>
                                <input type="text" name="delivery_address" id="delivery_address">
                            </div>
                            <div>
                                <label for="delivery_state">delivery state</label>
                                <input type="text" name="delivery_state" id="delivery_state">
                            </div>
                        </div>
                        <div class="second_part">
                            <div>
                                <label for="delivery_country">delivery country</label>
                                <input type="text" name="delivery_country" id="delivery_country">
                            </div>
                            <div>
                                <label for="recipient_name">recipient name</label>
                                <input type="text" name="recipient_name" id="recipient_name">
                            </div>
                            <div>
                                <label for="recipient_phone">recipient phone</label>
                                <input type="tel" name="recipient_phone" id="recipient_phone">
                            </div>
                            <div>
                                <label for="courier_description">courier description</label>
                                <textarea name="courier_description" id="courier_description" cols="55" rows="8"></textarea>
                            </div>
                            <div>
                                <label for="total_price">Total price</label>
                                <input type="text" name="total_price" id="total_price">
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="add_courier" id="add_courier" value="add courier">
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>