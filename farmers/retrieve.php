<?php
    session_start();
 
    //connecting to the database
    include '../library/config.php';
 

    //get the inputs in the form and set the variables
    $sender = mysqli_real_escape_string($database, $_POST['outgoing_id']);
    $recipient = mysqli_real_escape_string($database, $_POST['incoming_id']);
    $output = '';//Always declare null variables that would be filled by data from the database
    
    //get the message from the database
    $sql = "SELECT * FROM messages WHERE (sender = '{$sender}' AND receiver = '{$recipient}') OR 
            (sender = '{$recipient}' AND receiver = '{$sender}')";
    $query = $database->query($sql); 
    //if the query ran through the database
    if($query->num_rows > 0) {
        while($message = $query->fetch_assoc()) {
            //if the sender sends a message
            if($sender === $message['sender']) {
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

?>