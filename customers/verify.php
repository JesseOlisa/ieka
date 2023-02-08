<?php
    //connecting to the database
    include '../library/config.php';

    if(isset($_GET['transaction_id']) AND isset($_GET['status']) AND isset($_GET['tx_ref'])):
        $trans_id = htmlspecialchars($_GET['transaction_id']);
        $trans_status = htmlspecialchars($_GET['status']);
        $trans_ref = htmlspecialchars($_GET['tx_ref']);

        //verify Endpoint for transactions
        $url = "https://api.flutterwave.com/v3/transactions/".$trans_id."/verify";

        //create cURL session
        $curl = curl_init($url);                //initiate cURL session

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);                  //turn off the SSL checker

        //determine the kind of request you want
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

        //set the API headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer FLWSECK_TEST-daa73411425a02cd994fa1bff368d7c7-X",
            "Content-Type: Application/json"
        ]);

        //execute the cURL
        $start = curl_exec($curl);

        //check for errors
        $error = curl_error($curl);
        if($error) {
            die("Curl returned some errors: ". $error);
        }
        //echo $start;die();
        $result = json_decode($start);                      //make the result a JSON object

        //get the transaction credentials
        $status = $result->data->status;
        $message = $result->message;
        $id = $result->data->id;
        $reference = $result->data->tx_ref;
        $amount = $result->data->amount;
        $charged_amount = $result->data->charged_amount;
        $customer_name = $result->data->customer->name;
        $customer_email = $result->data->customer->email;
        $farmer = $result->data->meta->reason; 
        $customer = $result->data->meta->address;

        if(($status != $trans_status) OR ($id != $trans_id)) {
            header("Location: pay.php");
            exit();
        } else {
            //insert the transaction data into the transaction table
            $sql = "INSERT INTO transactions(`transaction_id`, `transaction_reference`, `farm_id`, `customer_id`, `status`, `amount`)
                VALUES('{$id}', '{$reference}', '{$farmer}', '{$customer}', '{$status}', '{$amount}')";
            $record = $database->query($sql);
            if($record) {
                echo '<div class="tx_verified">Your transaction has been verified by IEKA!</div>';
                header("Location: transactions.php");
            }
        }

        curl_close($curl);              //close the execution

    else:
        header("Location: pay.php");
        exit();
        
    endif;

?>

