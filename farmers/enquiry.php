<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../farmer-login.php");
        exit();
    } else {
    }

    //get the details of the farmer logged in
    $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
    $result = $database->query($sql)->fetch_assoc();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Ask us anything!</title>
        <meta charset="utf-8"/>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/index.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!--NAVIGATION BAR-->

        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="search-navbar">
                    <form action="search.php" class="search-tab" method="GET">
                        <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                        <button class="search" name="search" type="submit">
                            search
                        </button>
                        <ul class="search-list" id="search-list" style="display: none;">
                        </ul>
                    </form>
                </div>
            </div>
            <div class="navigation_bar">
                <nav class="navbar">
                    <div class="account section">
                        <a href="account.php">my account</a>
                    </div>
                    <div class="report section">
                        <a href="report.php" class="nav report">report</a>
                    </div>
                    <div class="enquiry section">
                        <a href="enquiry.php" class="nav enquiry">enquiry</a>
                    </div>
                    <div class="chat section">
                        <a href="chat-list.php" class="nav chat">chat</a>
                    </div>
                    <div class="transactions section">
                        <a href="transactions.php" class="nav transaction">transactions</a>
                    </div>
                    <div class="courier section">
                        <a href="courier/dashboard.php">courier</a>
                    </div>
                    <div class="logout">
                        <a href="logout.php" class="nav-logout">logout</a><span id="separate"> | </span><a href="index.php">Dashboard</a>
                    </div>
                </nav>
            </div>
        </header>

        <section class="report_box">
            <div class="prelude">
                <h6>You can ask us anything you have in mind</h6>
            </div>

            <!---FORM CONTAINING CUSTOMER COMPLAINTS-->
            <div class="complaints">
                <form action="" method="post" id="enquire">
                    <div>
                        <input type="hidden" id="farmer_name" name="farmer_name" value="<?=$result['first_name'].' '.$result['last_name'];?>" placeholder="Customer Name">
                    </div>
                    <div>
                        <input type="hidden" id="farm_id" name="farm_id" value="<?=$result['farm_id'];?>">
                    </div>
                    <div>
                        <textarea name="issue" id="issue" cols="40" rows="8" placeholder="Ask us anything"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="enquiry" id="enquiry">
                    </div>
                </form>
            </div>

            <!---THE BOX CONFIRMING SUBMISSION OF REPORT--->
            <div id="move" style="display:none;">
                <span id="confirm">Dear customer, we have received your enquiry! You will hear from us soon!</span><br/>
                <span id="close">Close</span>
            </div>
        </section>

        <script src="enquiry.js"></script>
        <script src="text.js"></script>
    </body>
</html>