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

    //get the details of the customer logged in
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}"; 
    $result = $database->query($sql)->fetch_assoc();

    //get the details of the customer courier
    $sdl = "SELECT * FROM customer_couriers WHERE ((customer_id = {$_SESSION['id']}) AND (status = 'transit'))"; 
    $record = $database->query($sql);
    $transit = mysqli_num_rows($record);

    //get the details of the customer courier
    $sjl = "SELECT * FROM transactions WHERE ((customer_id = {$_SESSION['id']}) AND (status = 'successful'))"; 
    $status = $database->query($sjl);
    $number = mysqli_num_rows($status);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Get on with business at Ieka</title>
        <meta charset="utf-8"/>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/styles.css" rel="stylesheet" type="text/css">
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
        <main class="dashboard--wrapper">
             <!-- DESKTOP SIDEBAR -->
             <div class="sidebar--wrapper">
                <div class="logo--container">
                    <h4>ieka</h4>
                </div>
                <ul class="sidebar-links--container">
                    <li class="active"><a href="index.php">Overview</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li><a href="chat-list.php">Chats</a></li>
                    <li><a href="report.php">Report</a></li>
                    <li><a href="./courier/dashboard.php">Courier</a></li>
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
                            <li><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                    <div class="welcome-farmer">
                        <h4>Hi, <?= $result['first_name']. ' '. $result['last_name'];?>!</h4>
                        <div class="intro-message">
                            <p>Always remember that you are an asset to IEKA!</p>
                        </div>
                    </div>
                    <div class="stats--container">
                        <div class="stats--box">
                            <p>Completed Transactions</p>
                            <img src="../assets/images/icons/money.png" alt="transaction">
                            <p><?=$number;?></p>

                        </div>
                        <div class="stats--box">
                            <p>In Transit</p>
                            <img src="../assets/images/icons/delivery-bus.png" alt="courier">
                            <p><?=$transit;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="../assets/javascript/all.min.js"></script>
        <script>
            $("#search").keyup(function(event) {
                console.log('goon');
                //get the value in the search box
                var search_keyword = event.target.value;
                if (search_keyword) {
                    var url = document.location.origin + '/ieka/search.php'
                    //make an ajax call to the server with the above url
                    $.get(url, {keyword: search_keyword}, function(response, statusCode, xJR){
                        document.getElementById("search-list").innerHTML = response;
                        //display the options corresponding to the searchwords
                        document.getElementById('search-list').style.display = "block";
                });
                } else {
                    document.getElementById('search-list').style.display = "none";
                }
            });
        </script>    
    </body>
</html>