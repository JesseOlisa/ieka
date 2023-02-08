<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    }
    
    $sender = $_SESSION['id'];

    //get all the farmers in the system
    $sql = "SELECT * FROM farmers";
    $query = $database->query($sql);

    while($farmer = $query->fetch_assoc()) {
        //get their records in the database with the sender
        $sql1 = "SELECT * FROM messages WHERE (sender = '{$sender}' AND receiver = '{$farmer['farm_id']}') OR
            (sender = '{$farmer['farm_id']}' AND receiver = '{$sender}') ORDER BY id DESC LIMIT 1";
        $query1 = $database->query($sql1);
        $chat = $query1->fetch_assoc();
        if(isset($chat['sender'])) {
            echo '<div class="person">
                    <div class="chat-content">
                            <div class="chat-details">
                            <a href="chat.php#lastMessage">
                                <a href="chat.php?farm_id='.$farmer['farm_id'].'">
                                <p class="chat_name">'.$farmer['first_name'].' '.$farmer['last_name'].'</p>
                                <p class="message" id="lastMessage">'.$chat['message'].'</p>
                                </a>
                                </a>
                            </div>
                        </div>
                </div>'; 
        }
           
}
       
    
    
?>
