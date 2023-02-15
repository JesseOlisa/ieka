
<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    }

    //the details of the logged in user
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
    $customer = $database->query($sql)->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Chat with your best farmers</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/chatlist.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        
        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/fb151ec1c7.js" crossorigin="anonymous" defer></script>
        <!-- JAVASCRIPT -->
        <script src="../assets/javascript/dashboardLayout.js" defer></script>

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
                    <li><a href="">Orders</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li class="active"><a href="chat-list.php">Chats</a></li>
                    <li><a href="report.php">Report</a></li>
                    <li><a href="courier/dashboard.php">Courier</a></li>
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
                                <input type="text" name="search" placeholder="Enter farm id to search" id="find">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </label>
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
                            <li class="active"><a href="chat-list.php">Chats</a></li>
                            <li><a href="report.php">Report</a></li>
                            <li><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                    <!--This part shows the list of chats that the farmer has had-->
                    <section class="users-list" id="users">
                </div>
        <script src="../assets/javascript/all.min.js"></script>
        <script src="../assets/javascript/customer-chatlist.js"></script>
    </body>
</html>
