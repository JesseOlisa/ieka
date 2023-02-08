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
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!---SIDEBAR WITH COURIER SECTIONS-->
        <aside class="side">
            <div class="nomenclature">
                <h4><?=$customer['first_name'].' '.$customer['last_name'];?></h4>
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
                <a href="all_courier.php">all courier</a>
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
            <?php while($courier = $result->fetch_assoc()):
                    //get the details of the farmer that supplied the goods
                    $sdl = "SELECT * FROM farmers WHERE farm_id = {$courier['farmer_id']}";
                    $farmer = $database->query($sdl)->fetch_assoc();?>
            <!--Other details about Customer Courier-->
            <div class="general_body">
                <div class="side_head">
                    <span class="delete">cancel</span>
                    <a href="edit.php?id=<?=$courier['id'];?>">edit</a>
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
                    <div class="group-1">
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

                    <div class="group-2">
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

                    <div class="group-3">
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
        </section>
        <script src="dropdown.js"></script>
        <script src="cancel.js"></script>
    </body>
</html>