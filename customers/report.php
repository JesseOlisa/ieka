<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
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
        <title id="name">Tell us anything</title>
        <meta charset="utf-8"/>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/index.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/fb151ec1c7.js" crossorigin="anonymous" defer></script>
        <!-- JAVASCRIPT -->
        <script src="../assets/javascript/dashboardLayout.js" defer></script>

    </head>
    <body>
        <!--NAVIGATION BAR-->
        <main class="dashboard--wrapper">
             <!-- DESKTOP SIDEBAR -->
             <div class="sidebar--wrapper">
                <div class="logo--container">
                    <h4>ieka</h4>
                </div>
                <ul class="sidebar-links--container">
                    <li><a href="index.php">Overview</a></li>
                    <li><a href="">Orders</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li><a href="chat-list.php">Chats</a></li>
                    <li class="active"><a href="report.php">Report</a></li>
                    <li><a href="courier/dashboard.php">Courier</a></li>
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
                            <li><a href="">Overview</a></li>
                            <li><a href="">Orders</a></li>
                            <li><a href="transactions.php">Transactions</a></li>
                            <li><a href="chat-list.php">Chats</a></li>
                            <li class="active"><a href="report.php">Report</a></li>
                            <li><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                    <section class="report_box">
                        <div class="prelude">
                            <h6>You can report anyone to us or tell us about anything that you feel doesn't sit right with you</h6>
                        </div>

                        <!---FORM CONTAINING CUSTOMER COMPLAINTS-->
                        <div class="complaints">
                            <form action="" method="post" id="complaint">
                                <div>
                                    <input type="hidden" id="customer_name" name="customer_name" value="<?=$result['first_name'].' '.$result['last_name'];?>" placeholder="Customer Name">
                                </div>
                                <div>
                                    <textarea name="issue" id="issue" placeholder="Key in your complaints here"></textarea>
                                </div>
                                <div>
                                    <input type="submit" name="report" id="report">
                                </div>
                            </form>
                        </div>

                        <!---THE BOX CONFIRMING SUBMISSION OF REPORT--->
                        <div id="move" style="display:none;">
                            <span id="confirm">Dear customer, we have received your report! You will hear from us soon!</span><br/>
                            <span id="close">Close</span>
                        </div>
                    </section>
                </div>

        <script src="report.js"></script>
        <script src="text.js"></script>
    </body>
</html>