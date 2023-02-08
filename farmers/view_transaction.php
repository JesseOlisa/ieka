<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ./farmer-login.php");
        exit();
    } else {
    }

    //get the details of the particular order
    $tx = $_GET['transaction_no'];

    $sql = "SELECT * FROM transactions WHERE id = {$tx}";
    $result = $database->query($sql);
    
    //get the details of the customer who made the order
    $snl = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
    $farmer = $database->query($snl)->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Every detail about your IEKA transaction</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!--SECTION WITH OTHER INFORMATION-->
        <section class="main_section">
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
            <?php while($transactions = $result->fetch_assoc()):
                    //get the details of the farmer that received the payment
                    $sdl = "SELECT * FROM customers WHERE id = {$transactions['customer_id']}";
                    $customer = $database->query($sdl)->fetch_assoc();?>
            <!--Other details about Customer transaction-->
            <div class="general_body">
                <div class="side_head">
                    <a href="transactions.php">Back to transactions</a>
                </div>

                <div class="all_data">
                    <div class="group-1">
                        <div>
                            <p class="label">customer name</p>
                            <p class="data"><?=$customer['first_name'];?> <?=$customer['last_name'];?></p>
                        </div>
                        <div>
                            <p class="label">farmer name</p>
                            <p class="data"><?=$farmer['first_name'];?> <?=$farmer['last_name'];?></p>
                        </div>
                        <div>
                            <p class="label">transaction id</p>
                            <p class="data"><?=$transactions['transaction_id'];?></p>
                        </div>
                        <div>
                            <p class="label">reference</p>
                            <p class="data"><?=$transactions['transaction_reference'];?></p>
                        </div>
                    </div>

                    <div class="group-2">
                        <div>
                            <p class="label">farmer phone</p>
                            <p class="data"><?=$farmer['phone'];?></p>
                        </div> 
                        <div>
                            <p class="label">payment date</p>
                            <p class="data"><?=$transactions['modified_at'];?></p>
                        </div>
                        <div>
                            <p class="label">status</p>
                            <p class="data"><?=$transactions['status'];?></p>
                        </div>
                        <div>
                            <p class="label">amount</p>
                            <p class="data"><?=$transactions['amount'];?></p>
                        </div>
                    </div>

                    
                </div>
                <?php endwhile;?>
            </div>
        </section>
    </body>
</html>