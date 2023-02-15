<?php
    session_start();

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

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Add new courier</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/fb151ec1c7.js" crossorigin="anonymous" defer></script>
        <!-- JAVASCRIPT -->
        <script src="../../assets/javascript/dashboardLayout.js" defer></script>

        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <main class="dashboard--wrapper">

            <!-- DESKTOP SIDEBAR -->
            <div class="sidebar--wrapper">
                    <div class="logo--container">
                        <h4>ieka</h4>
                    </div>
                    <ul class="sidebar-links--container">
                        <li><a href="../index.php">Overview</a></li>
                        <li><a href="../transactions.php">Transactions</a></li>
                        <li><a href="../chat-list.php">Chats</a></li>
                        <li><a href="../report.php">Report</a></li>
                        <li class="active"><a href="../courier/dashboard.php">Courier</a></li>
                        <li><a href="../pay.php?id=<?=$customer['id']?>">Payment</a></li>
                    </ul>
                </div>
                <div class="content-wrapper">
                    <!-- DESKTOP NAVBAR -->
                    <div class="dashboard--navbar">
                        <div class="menu--container">
                            <div role="button" class="menu--btn"></div>
                        </div>
                        <div class="mobile-logo--container">
                            <h4>ieka</h4>
                        </div>
                        <div class="logout--container">
                            <button class="btn btn-green">
                                <a href="../logout.php">Logout</a>
                            </button>
                        </div>
                    </div>
                   
                    <!-- MOBILE SIDEBAR -->
                    <div class="mobile-navbar--container">
                        <!-- MOBILE SIDEBAR  -->
                        <div>
                            <ul class="mobile-sidebar-links-container">
                                <li><a href="../index.php">Overview</a></li>
                                <li><a href="../transactions.php">Transactions</a></li>
                                <li><a href="../chat-list.php">Chats</a></li>
                                <li><a href="../report.php">Report</a></li>
                                <li class="active"><a href="../courier/dashboard.php">Courier</a></li>
                                <li><a href="../pay.php?id=<?=$customer['id']?>">Payment</a></li>
                            </ul>
                        </div>
                    </div>
    
    
    
    
    
                    <!-- INSERT DASHBOARD CONTENT HERE -->
                    <div class="dashboard--main--content">
                        <div class="courier--nav-links--container">
                                <a href="dashboard.php">
                                    <button type="button" class="btn btn-green">
                                        Sell all courier
                                    </button></a>
                            <div class="options--container">
                                <a href="new_courier.php">
                                    <button type="button" class="btn btn-green disabled">
                                        New courier
                                    </button>
                                </a>
                                <a href="track_courier.php" id="track">
                                    <button type="button" class="btn btn-green">
                                        Track courier
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="headnote">
                            <h6>New Courier</h6>
                            <hr id="under">
                        </div>
                        <div class="successful_submission">
                            <p>Your courier order couldn't be placed!</p>
                            <span id="close">Close</span>
                        </div>
            
                        <!--the various categories in the courier section-->
                        <div class="new_courier">
            
                            <!--Form for adding new courier-->
                            <form action="" class="courier_form" method="POST">
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
                                            <textarea name="courier_description" id="courier_description"></textarea>
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
                    </div>
                </div>
        </main>

        <script src="dropdown.js"></script>
    </body>
</html>