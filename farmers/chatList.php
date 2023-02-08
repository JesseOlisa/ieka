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

    $search = $_POST['search'];

    $sql = "SELECT * FROM customers WHERE first_name = '{$search}' OR last_name = '{$search}'";
    $query = $database->query($sql);
    while($customer = $query->fetch_assoc()) {
        $sql0 = "SELECT * FROM messages WHERE (sender = '{$sender}' AND receiver = '{$customer['id']}') OR
        (sender = '{$customer['id']}' AND receiver = '{$sender}') ORDER BY id DESC LIMIT 1";
        $result0 = $database->query($sql0);
        $record = $result0->fetch_assoc();
        if(isset($record['receiver'])) {
            echo '<div class="person">
                        <a href="chat.php?id='.$customer['id'].'">
                        <div class="chat-content">
                            <img src="../assets/images/Customers/"'.$customer['picture'].' alt="">
                            <div class="chat-details">
                                <span>'.$customer['first_name'].' '. $customer['last_name']. '</span><br>
                                <p>'.$record['message'].'</p>
                            </div>
                        </div>
                        <div class="status-dot"><img src="" alt=""></div>
                        </a>
                    </div>'; 
        } else {
            echo '<div id="error">Farmer not found!</div>';
        }
    }
    
?>