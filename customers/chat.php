<?php
    session_start();

    //set all PHP error reporting in order to see every error in our script
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   //connecting to the database
   include '../library/config.php';

   //check if the user is logged in
   if(!isset($_SESSION['id'])) {
       header("Location: ../customer-login.php");
       exit();
   }
    
    //get the id of the farmer 
    $farm_id = $_GET['farm_id']; //echo $farm_id;
    $sql = "SELECT * FROM farmers WHERE farm_id = {$farm_id}";
    $result = $database->query($sql)->fetch_assoc(); //var_dump($result);


?>
<!DOCTYPE HTML>
<html>
    <head>
        <title class="title">Talk with <?=$result['first_name'].' '.$result['last_name'];?></title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/chat.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <section class="chat-area">
            <!--the header part of the chat page-->
            <div class="header">
                <div class="back-and-picture">
                    <a href="chat-list.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <!--the icon placed here is back arrow icon-->
                    <div class="chat-details">
                        <span><?=$result['first_name']. ' '. $result['last_name'];?></span>
                        <p><?=$result['status'];?></p>
                    </div>
                </div>
            </div>
            <!--the body of the chat area-->
            <div class="chat-box">
            </div>
            <div class="typing area">
                <form action="" class="typing-area" method="POST">
                    <input type="hidden" name="incoming_id" value="<?=$result['farm_id']?>" id="receiver"><!--the recipient, in this case the farmer-->
                    <input type="hidden" name="outgoing_id" value="<?=$_SESSION['id']?>" id="sender"><!--the sender, in this case the customer-->
                    <input type="text" name="message" placeholder="Enter your message here.." class="input-field" autocomplete="off">
                    <button class="send" name="send">Send</button>
                </form>
            </div>
        </section>
        <script src="../assets/javascript/all.min.js"></script>
        <!--<script src="../assets/javascript/customer-chat.js"></script>-->
        <script src="insert.js"></script>
    </body>
</html>