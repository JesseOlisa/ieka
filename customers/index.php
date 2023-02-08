<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    } else {
    }

    //get the details of the farmer logged in
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}"; 
    $result = $database->query($sql)->fetch_assoc();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title id="name">Get on with business at Ieka</title>
        <meta charset="utf-8"/>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/index.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="search-navbar">
                    <form action="search.php" class="search-tab" method="GET">
                        <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                        <button class="search" name="search" type="submit">
                            search
                        </button>
                        <ul class="search-list" id="search-list" style="display: none;">
                        </ul>
                    </form>
                </div>
            </div>
            <div class="navigation_bar">
                <nav class="navbar">
                    <div class="account section">
                        <a href="account.php">my account</a>
                    </div>
                    <div class="report section">
                        <a href="report.php" class="nav report">report</a>
                    </div>
                    <div class="enquiry section">
                        <a href="enquiry.php" class="nav enquiry">enquiry</a>
                    </div>
                    <div class="chat section">
                        <a href="chat-list.php" class="nav chat">chat</a>
                    </div>
                    <div class="transactions section">
                        <a href="transactions.php" class="nav transaction">transactions</a>
                    </div>
                    <div class="courier section">
                        <a href="courier/dashboard.php">courier</a>
                    </div>
                    <div class="logout">
                        <a href="logout.php" class="nav-logout">logout</a>
                    </div>
                </nav>
            </div>
        </header>

        <!---Intro-->
        <div class="welcome-farmer">
            <h4>Hi <?= $result['first_name']. ' '. $result['last_name'];?> !</h4>
            <div class="intro-message">
                <p>Always remember that you are an asset to IEKA!</p>
            </div>
        </div>
        <!--the four box section-->
        <section>
            <div class="boxes">
                <div class="box-1">
                    <p>See all information concerning you on Ieka. You can change, delete and add to your database anytime.
                        We got you!
                    </p>
                    <p class="links"><a href="account.php">account</a></p>
                </div>
                <div class="box-2">
                    <p>View chats with new and existing customers. You can also reconnect with them here to foster healthy relations.</p>
                    <p class="links"><a href="chat.php">Chat</a></p>
                </div>
                <div class="box-3">
                    <p>Your money is very important. View all your transactions and when they were conducted.</p>
                    <p class="links"><a href="transactions.php">transactions</a></p>
                </div>
                <div class="box-4">
                    <p>What can we help you with? Please do not hesitate to inform us here!</p>
                    <p class="links"><a href="enquiry.php">enquiries</a></p>
                </div>
            </div>
        </section>
        <!--know more about the app section-->
        <section class="know-and-ads">
            <div class="know-your-way">
                <h6>know your way through Ieka......</h6>
                <p class="tour">It is important that you know your way through Ieka market so that you can be able to do anything you want 
                    without getting confused. It is our utmost priority to make sure that you perform the same operations you perform on the 
                    physical market here, with no hiccups.
                    This includes knowledge of all tabs on your screen and an easy way to find products outside your locality.
                    Click <a href="./guide.php">here</a> to know more about the features on this agro market.
                </p>
            </div>

        <!--talk about ads section-->
            <div class="talk-ads">
                <h6>Make the best bargains on products......</h6>
                <p class="make-ads">
                    Click <a href="./get-ad.php">here</a> to get into this framework.
                With Ieka's chat feature, you can be able to bargain for products from your home, just the way you do in physical markets. Get on the <a href="chat-list.php">chat</a>
                app to connect with different sellers, irrespective of where they are.</p>
            </div>
        </section>
        <footer>
            <div class="first-part">
                <!--get to know us-->
                <div class="acquaintance">
                    <h6>Acquaint with us</h6>
                    <ul class="know us">
                        <li><a href="./careers.php">careers</a></li>
                        <li><a href="./about.php">about ieka</a></li>
                        <li><a href="./relations.php">investor relations</a></li>
                        <li><a href="./login.php">login</a></li>
                        <li><a href="./register.php">register</a></li>
                        <li class="flag"><img src="../assets/images/download.png" alt="nigeria flag"> Nigeria</li>
                    </ul>
                </div>

                <!--make money with us-->
                <div class="make money with us">
                    <h6>Make money with Ieka</h6>
                    <ul class="make-money">
                        <li><a href="./crop-sell.php">Sell your farm products</a></li>
                        <li><a href="./animal-sell.php">Sell your animals</a></li>
                        <li><a href="./advertise-info.php">Advertise with Ieka</a></li>
                        <li><a href="./affliate-info.php">Become an affliate</a></li>
                        <li><a href="./make-money.php">More...</a></li>
                    </ul>
                </div>

                <!--terms and conditions-->
                <div class="terms and conditions">
                    <h6 class="policy">our policies</h6>
                    <ul class="policies">
                        <li><a href="./payment-policy.php">Payment Policy</a></li>
                        <li><a href="./privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="./service-terms.php">Service Terms & Agreement</a></li>
                        <li><a href="./negotiate-info.php">Negotiate with Ieka</a></li>
                    </ul>
                </div>

                <!--helpdesk-->
                <div class="helpdesk">
                    <h6>our helpdesk</h6>
                    <ul class="help">
                        <li><a href="./report-buyer.php">Report a Buyer</a></li>
                        <li><a href="./report-seller.php">Report a Seller</a></li>
                        <li><a href="account-issue.php">Account Issues</a></li>
                        <li><a href="account-creation-problem.php">Problems with account creation</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="second part">
                <!--social media section-->
                <div class="social-media">
                    <div class="twitter media">
                        <a href="#"><img src="../assets/icons/png/512/social-twitter-outline.png" alt="twitter"></a>
                    </div>
                    <div class="instagram media">
                        <a href="#"><img src="../assets/icons/png/512/social-instagram-outline.png" alt="instagram"></a>
                    </div>
                    <div class="linkedIn media">
                        <a href="#"><img src="../assets/icons/png/512/social-linkedin-outline.png" alt="linkedIn"></a>
                    </div>
                    <div class="facebook media">
                        <a href="#"><img src="../assets/icons/png/512/social-facebook-outline.png" alt="facebook"></a>
                    </div>
                </div>

                <!--Company reserved rights-->
                <div class="reserved">
                    <p class="company">
                    &copy all rights reserved. ieka enterprises. or its affliates
                    </p>
                </div>
            </div>
        </footer>
        <script src="../assets/javascript/all.min.js"></script>
    </body>
</html>
