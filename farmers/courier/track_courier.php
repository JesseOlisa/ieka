<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../farmer-login.php");
        exit();
    } else {
    }

    $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
    $customer = $database->query($sql)->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Track your courier on IEKA</title>
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
                <p id="identity">Farmer</p>
                <hr>
            </div>
            <div class="menu">
                <a href="dashboard.php" id="dashboard">dashboard</a>
            </div>
            <div class="menu">
                <span class="courier-btn">courier</span>
            </div>
            <div class="courier_details" style="display:none;">
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
                    <div class="index section" style="float:right;">
                        <a href="../index.php">Home</a>
                    </div>
                </nav>
            </div>

                <!--Form to fill in the reference number-->
            <div class="track">
                <form action="track_courier_code.php" class="track_form" method="GET">
                    <p class="ref_number">Enter courier reference number</p>
                    <input type="search" id="trace" name="trace">
                    <input type="submit" value="Track" id="track_courier" name="track_courier">
                </form>
                
                <div class="options">
                    <p class="one">
                        <span id="firs"></span>
                        <span id="clos">Close</p>
                </div>
            </div>
        </section>
        <script src="dropdown.js"></script> 
    </body>
</html>