<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //including the number words
    include 'number-words.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();

    } else {
        $message = $_POST['message'];
        $sender = $_POST['outgoing_id'];
        $recipient = $_POST['incoming_id'];
 
        //set the database time to that of the user
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Africa/Lagos');
        $datetime->setTimezone($timezone);
        $created_at = $datetime->format('Y-m-d h:i:s');
         
        if(!empty($message)) {
            //insert into messages table
            $sql = "INSERT INTO message_store(`sender`, `receiver`, `message`, `created`)
                 VALUES('{$sender}', '{$recipient}', '{$message}', '{$created_at}')";
            $insert = $database->query($sql);

            //create empty arrays for the conditions that would be checked
            $contact = [];
            $prohibited = [];
            $match = [];
            $lenght = [];
            
            if($insert) {
                $last = $database->insert_id;
                $sql0 ="SELECT * FROM message_store WHERE id = {$last}";            //get the last message stored in the database
                $result0 = $database->query($sql0)->fetch_assoc(); 
                
                $record = $result0['message'];

                $last_message = explode(" ",$record); 

                $bound = ['aza', 'account no', 'phone no', 'phone number', 'number', 'account number', 'digits', 'details', 'email',
                            'mail', 'inbox', 'hit', 'phone', 'tel', 'account number'];
            
                //open the array so that you can access each value of the array
                foreach($last_message as $value) {
                    //check if there are set of numbers showing account number or phone number
                    if(preg_match('/^[0-9][0-9]{6,}$/', $value)) {
                        $match[] = $value;
             
                    //check to see that the length of the message does not exceed the required number
                    } elseif(strlen($value) > 13) {
                        $lenght[] = $value;
                  
                    //check if the message contains any of the bound words
                    } elseif(preg_grep("/$value/i",$bound)) {
                        $prohibited[] = $value;
             
                    //check if the message contains any of the bound numbers
                    } elseif(preg_grep("/$value/i", $numbers)) {
                        $contact[] = $value;
                    }

                }
                
                //Do not display message if these conditions are fulfilled!
                //if the numbers exceed their supposed length
                if(sizeof($match) > 0) {
                    echo "This message cannot be displayed! See documentation for more details";
             
                //if any of the message values exceeded the stated length
                } elseif(sizeof($lenght) > 0) {
                    echo "This message cannot be displayed! See documentation for more details";
             
                //if any of the bound words are present in the message
                } elseif(sizeof($prohibited) > 4) {
                    echo "This message cannot be displayed! See documentation for more details";
             
                //if exceeding amount of number words are present in the message
                } elseif(sizeof($contact) > 6) {
                    echo "This message cannot be displayed! See documentation for more details";
             
                } else{
                    $sql1 = "INSERT INTO messages(`sender`, `receiver`, `message`, `created_at`)
                        VALUES('{$sender}', '{$recipient}', '{$message}', '{$created_at}')";
                    $insert0 = $database->query($sql1);
                }

            } 
    }
}


?>