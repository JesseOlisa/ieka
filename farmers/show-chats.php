<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../farmer-login.php");
        exit();
    }
    
    $me = $_SESSION['id'];

    $sql = "SELECT * FROM farmers WHERE id = '{$me}'";
    $logic = $database->query($sql)->fetch_assoc();
    $sender = $logic['farm_id'];

    //get the list of all the farmers in the system
    $sql = "SELECT * FROM customers";
    $query = $database->query($sql);

    while($customer = $query->fetch_assoc()) {
        $sql1 = "SELECT * FROM messages WHERE (sender = '{$sender}' AND receiver = '{$customer['id']}') OR
            (sender = '{$customer['id']}' AND receiver = '{$sender}') ORDER BY id DESC LIMIT 1";
        $query1 = $database->query($sql1);
        $chat = $query1->fetch_assoc();
        if(isset($chat['receiver'])) {
            echo '<div class="person">
                    <div class="chat-content">
                        <div class="chat-details">
                            <a href="chat.php?id='.$customer['id'].'" >
                            <p class="chat_name">'.$customer['first_name'].'</p>
                            <p class="message">'.$chat['message'].'</p> 
                            </a>
                        </div>
                    </div>
                </div>';
        }
    }

   
    
    
?>
