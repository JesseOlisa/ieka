
<?php
    session_start();
    
   //connecting to the database
   include '../library/config.php';

   //check if the user is logged in
   if(!isset($_SESSION['id'])) {
       header("Location: ../farmer-login.php");
       exit();
   }

    //the details of the logged in user
    $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
    $farmer = $database->query($sql)->fetch_assoc();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Chat with your customers</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/chatlist.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="header">
                    <p><span><?= $farmer['first_name'];?></span>! Talk to customers</p>
                </div>
                <div class="out">
                    <span id="logout"><a href="logout.php">logout</a></span> 
                    <span id="home"><a href="index.php">Home</a></span>
                    <span id="pay"><a href="pay.php">Payments</a></span>
                </div>
            </div>
        </header>
        <section class="users-search">
            <div class="find-chat">
                <form action="chatList" class="search-list" method="POST">
                    <input type="text" placeholder="Enter Customer name to search" name="search" id="find">
                    <button name="check" type="button" id="click"><i class="fab fa-telegram"></i></button>
                </form> 
            </div>
        </section>
        <!--This part shows the list of chats that the farmer has had-->
        <section class="users-list" id="users">

        </section>
        <script src="../assets/javascript/all.min.js"></script>
        <script src="../assets/javascript/farmer-chatlist.js"></script>
    </body>
</html>