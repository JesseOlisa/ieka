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

    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
    $customer = $database->query($sql)->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Track your courier on IEKA</title>
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
            <li><a href="">Orders</a></li>
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
                    <li><a href="">Orders</a></li>
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
                        <button type="button" class="btn btn-green">
                            New courier
                        </button>
                    </a>
                    <a href="track_courier.php" id="track">
                        <button type="button" class="btn btn-green disabled">
                            Track courier
                        </button>
                    </a>
                </div>
            </div>
            
            <!--Form to fill in the reference number-->
            <div class="track">
                <form action="track_courier_code.php" class="track_form" method="GET">
                    <p class="ref_number">Enter courier reference number</p>
                    <div class="track--input--container">
                        <input type="search" id="trace" name="trace">
                        <input type="submit" value="Track" id="track_courier" name="track_courier">
                    </div>
                </form>
    
            <div class="options">
                <p class="one">
                    <span id="firs"></span>
                    <span id="clos">Close</span>
                </p>
            </div>
        </main>
        
        <script src="dropdown.js"></script> 
    </body>
</html>
    </div>