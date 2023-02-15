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

    //get the details of the particular order
    $order = $_GET['courier_no'];

    $sql = "SELECT * FROM customer_couriers WHERE reference = {$order}";
    $result = $database->query($sql);
    
    //get the details of the customer who made the order
    $snl = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
    $customer = $database->query($snl)->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>See everything about your courier</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
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
                    <li><a href="index.php">Overview</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li><a href="chat-list.php">Chats</a></li>
                    <li><a href="report.php">Report</a></li>
                    <li class="active"><a href="./courier/dashboard.php">Courier</a></li>
                    <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
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
                    <div class="search-navbar">
                        <form action="chatList.php" class="search-list" method="POST">
                            <label for="search" class="search--container">
                                <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </label>
                            <ul class="search-list" id="search-list" style="display: none;"></ul>
                        </form>
                    </div>
                    <div class="logout--container">
                        <button class="btn btn-green">
                            <a href="logout.php">Logout</a>
                        </button>
                    </div>
                </div>
               
                <!-- MOBILE SIDEBAR -->
                <div class="mobile-navbar--container">
                    <!-- MOBILE SIDEBAR  -->
                    <div>
                        <ul class="mobile-sidebar-links-container">
                            <li class="active"><a href="">Overview</a></li>
                            <li><a href="transactions.php">Transactions</a></li>
                            <li><a href="chat-list.php">Chats</a></li>
                            <li><a href="report.php">Report</a></li>
                            <li class="active"><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                    <?php while($courier = $result->fetch_assoc()):
                            //get the details of the farmer that supplied the goods
                            $sdl = "SELECT * FROM farmers WHERE farm_id = {$courier['farmer_id']}";
                            $farmer = $database->query($sdl)->fetch_assoc();?>
                    <!--Other details about Customer Courier-->
                    <div class="general_body">
                        <div class="side_head">
                            <div class="top--nav--container">
                                <div>
                                    <a href="dashboard.php">Back</a>
                                </div>
                                <div>
                                    <span class="delete">cancel</span>
                                    <a href="edit.php?id=<?=$courier['id'];?>">edit</a>
                                </div>
                            </div>
                        </div>
                        
                        <!--Section for canceling courier order-->
                        <div class="cancel">
                            <form action="" class="modal" method="POST">
                                <p>Are you sure you want to cancel this courier?</p>
                                <input type="hidden" name="number" value="<?=$courier['id'];?>">
                                <input type="submit" id="delete" name="delete" value="Yes">
                                <span id="no">No</span>
                            </form>
                        </div>
            
                        <div class="data_info">
                            <div class="group group-1">
                                <div>
                                    <p class="label">customer name</p>
                                    <p class="data"><?=$customer['first_name'];?> <?=$customer['last_name'];?></p>
                                </div>
                                <div>
                                    <p class="label">name <span id="lower">on</span> form</p>
                                    <p  class="data"><?=$courier['customer_name'];?></p>
                                </div>
                                <div>
                                    <p class="label">farmer name</p>
                                    <p class="data"><?=$farmer['first_name'];?> <?=$farmer['last_name'];?></p>
                                </div>
                                <div>
                                    <p class="label">recipient name</p>
                                    <p class="data"><?=$courier['recipient_name'];?></p>
                                </div>
                                <div>
                                    <p class="label">courier id</p>
                                    <p class="data"><?=$courier['reference'];?></p>
                                </div>
                            </div>
            
                            <div class="group group-2">
                                <div>
                                    <p class="label">delivery address</p>
                                    <p class="data"><?=$courier['delivery_address'];?></p>
                                </div>
                                <div>
                                    <p class="label">delivery state</p>
                                    <p class="data"><?=$courier['delivery_state'];?></p>
                                </div>
                                <div>
                                    <p class="label">delivery country</p>
                                    <p class="data"><?=$courier['delivery_country'];?>
                                </div>
                                <div>
                                    <p class="label">delivery date</p>
                                    <p class="data"><?=$courier['delivery_date'];?></p>
                                </div>
                                <div>
                                    <p class="label">recipient phone</p>
                                    <p class="data"><?=$courier['recipient_phone'];?></p>
                                </div> 
                            </div>
            
                            <div class="group group-3">
                                <div>
                                    <p class="jabe">Date order was placed</p>
                                    <p class="data"><?=$courier['modified_at'];?></p>
                                </div>
                                <div>
                                    <p class="label">courier details</p>
                                    <p class="data"><?=$courier['courier'];?></p>
                                </div>
                                <div>
                                    <p class="label">price</p>
                                    <p class="data">₦<?=$courier['price'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                    
                </div>
            </div>
        </main>
        
        </section>
        <script src="dropdown.js"></script>
        <script src="cancel.js"></script>
    </body>
</html>