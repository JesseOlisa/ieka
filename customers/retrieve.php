<?php
    session_start();
    

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
        
    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
        //get the inputs in the form and set the variables
        $sender = $_POST['outgoing_id'];
        $receiver = $_POST['incoming_id'];
        $output = '';//Always declare null variables that would be filled by data from the database
        
        //get the message from the database
        $sql = "SELECT * FROM messages WHERE (sender = '{$sender}' AND receiver = '{$receiver}') OR 
                (sender = '{$receiver}' AND receiver = '{$sender}')";
        $query = $database->query($sql); 
        //if the query ran through the database
        if($query->num_rows > 0) {
            while($message = $query->fetch_assoc()) {
                //if the sender sends a message
                if($sender == $message['sender']) {
                    $output .= '<div class="chat outgoing">
                                    <div>
                                        <p>'. $message['message'].'</p>
                                    </div>
                                </div>';
                } else {
                    //if the receiver sends a message
                    $output .= ' <div class="chat incoming">
                                    <div>
                                        <p>'. $message['message']. '</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    }
   

?>