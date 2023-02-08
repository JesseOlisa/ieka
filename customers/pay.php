
<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(isset($_SESSION['id'])) {

        //the details of the logged in user
        $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
        $customer = $database->query($sql)->fetch_assoc();

        if(isset($_POST['pay'])):
            //get the form parameters
            $customer_name = htmlspecialchars($_POST['buyer_name']);
            $customer_phone =  htmlspecialchars($_POST['buyer_phone']);
            $customer_email = htmlspecialchars($_POST['buyer_email']);
            $farmer_id = htmlspecialchars($_POST['farmer_id']);
            $farmer_name = htmlspecialchars($_POST['farmer_name']);
            $products = htmlspecialchars($_POST['products']);
            $amount = htmlspecialchars($_POST['price']);
           // echo $farmer_id;die();

            //integrate to flutterwave payment gateway by getting the payment link/endpoint
            $endpoint = "https://api.flutterwave.com/v3/payments";

            //assemble the payment details
            $postData =  array(
                "tx_ref" => uniqid(),
                "currency" => "NGN",
                "amount" => $amount,
                //customer and farmer information in an array within the general data container
                "customer" => [
                    "name" => $customer_name,
                    "email" => $customer_email,
                    "phone" => $customer_phone,
                ],
                //give other customization information
                "customizations" => [
                    "title" => "Payment to IEKA",
                    "description" => "Customers pay for the products they have bargained with farmers on IEKA"
                ],
                //metadata for all collecting the payments
                "meta" => [
                    "reason" => $farmer_id,
                    "address" => $customer['id']
                ],
                //get the url to the page if payment is successful
                "redirect_url" => "http://localhost/ieka/customers/verify.php"
            );
        
            //using cURL to handle payments
            $ch = curl_init();           //initiate the cURL handler

            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);     //turn off the SSL certificate checking

            curl_setopt($ch, CURLOPT_URL, $endpoint);    //set the endpoint to the cURL handler

            curl_setopt($ch, CURLOPT_POST, 1);    //turn the cURL form POST feature

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));    //encode the information from the form into JSON object

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //return data from payment process

            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);     //time before timeout if there is a network problem

            curl_setopt($ch, CURLOPT_TIMEOUT, 200);        //terminate the process after 2 minutes

            //set the server headers for request
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer FLWSECK_TEST-daa73411425a02cd994fa1bff368d7c7-X",
                "Content-Type: Application/json",
                "Cache-Control: no-cache"
            ));

            
            $request = curl_exec($ch);   //execute the cURL request
            //echo $request;die();
            $result = json_decode($request);   
            //echo $result; die();

            //redirect the user to the payment options page
            header("Location: ". $result->data->link);

            curl_close($ch);          //close the curl section
        endif;  
    }

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Easy, safe and fast payments for your products</title>
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
                    <p><span><?= $customer['first_name'];?></span>! Make payments from your bed</p>
                </div>
                <div class="out">
                    <span id="logout" class="logout"><a href="logout.php">logout</a></span> 
                    <span id="home" class="home"><a href="index.php">Home</a></span>
                </div>
            </div>
        </header>

        <section class="users-search">
            <div class="find-chat">
                <form action="chatList.php" class="search-list" method="POST">
                    <input type="text" name="search" placeholder="Enter farm id to search" id="find">
                    <button name="check" type="button" id="click"><i class="fab fa-telegram"></i></button>
                </form>
            </div>
        </section>
        
        <!--This part contains details of the farmer the customer bargained with-->
        <section class="form-details">
            <div class="purchase">
                <form class="order_info" action="" method="POST">
                    <h4>AGRO ORDER PAYMENT FORM</h4>
                    <div class="bucket">
                        <div class="flex-section">
                            <div>
                                <label for="buyer_name">buyer name</label>
                                <input type="text" name="buyer_name" id="buyer_name" required>
                            </div>
                            <div>
                                <label for="buyer_phone">buyer phone no</label>
                                <input type="tel" name="buyer_phone" id="buyer_phone" required>
                                <input type="hidden" name="buyer_email" value="<?=$customer['email'];?>">
                            </div>
                        </div>
                        <div class="farmer-info">
                            <div>
                                <label for="farmer_id">Farmer Id</label>
                                <input type="text" name="farmer_id" id="farmer_id" required>
                            </div>
                            <div>
                                <label for="farmer_name">Farmer name</label>
                                <input type="text" name="farmer_name" id="farmer_name">
                            </div>
                        </div>
                        <div class="textarea">
                            <label for="products">Products and Quantity</label>
                            <textarea name="products" id="products" cols="55" rows="3" required></textarea>                    
                        </div>
                        <div>
                            <label for="price" class="money">Total Amount (NGN)</label>
                            <input type="text" name="price" id="price" required>
                        </div>
                        <div>
                            <input type="submit" name="pay" value="Make Payment" id="payment">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <script src="../assets/javascript/all.min.js"></script>
    </body>
</html>
