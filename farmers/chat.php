<?php
    session_start();
    
    //connecting to the database
    include '../library/config.php';
 
    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../farmer-login.php");
        exit();
    }
 
    //get the farm id of the logged in farmer
    $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
    $farmer = $database->query($sql)->fetch_assoc();
    
    //get the id of the customer
    $customer_id = $_GET['id'];
    $sql = "SELECT * FROM customers WHERE id = {$customer_id}";
    $result = $database->query($sql);


?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Chat on!</title>
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
                    <?php
                        while($record = $result->fetch_assoc()):; ?>
                    <img src="image.php?id=<?=$customer_id?>" alt="">
                </div>
                <!--the icon placed here is back arrow icon-->
                <div class="chat-details">
                    <span><?=$record['first_name']. ' '. $record['last_name'];?></span>
                    <p><?=$record['status'];?></p>
                    <?php
                        endwhile; ?>
                </div>
            </div>
            <!--the body of the chat area-->
            <div class="chat-box">
            </div>
            <div class="typing area">
                <form action="" class="typing-area" method="POST">
                    <p class="display" style="display:none;"></p>
                    <input type="hidden" name="incoming_id" value="<?=$customer_id?>"><!--the recipient, in this case the customer-->
                    <input type="hidden" name="outgoing_id" value="<?=$farmer['farm_id']?>"><!--the sender, in this case the farmer-->
                    <input type="text" name="message" placeholder="Enter your message here.." class="input-field">
                    <button class="send" name="send">send</button>
                </form>
            </div>
        </section>
        <script src="../assets/javascript/all.min.js"></script>
        <!--<script src="insert.js"></script>-->
        <script src="../assets/javascript/farmer-chat.js"></script>
    </body>
</html>