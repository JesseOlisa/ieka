<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../farmer-login.php");
        exit();
    } else {
        if(isset($_POST['track_courier'])):
            //get the parameters in the form
            $reference = $_POST['trace'];
            if(!empty($reference)):
                //search for the reference number in the customer courier table
                $sql = "SELECT * FROM customer_couriers WHERE reference LIKE '%{$reference}%'";
                $record = $database->query($sql);
            
                if($record->num_rows > 0):
                    while($return = $record->fetch_assoc()):
                        echo $return['status'];
                    endwhile;
                else:
                    echo 'There is no record of such courier in IEKA';
                endif;
            endif;
        endif;
    }


?>