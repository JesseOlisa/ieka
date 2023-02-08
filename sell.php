<?php
    session_start();

    //connecting to the database
    $database = new mysqli("localhost", "root", "", "ieka");
    //check connection

    if($database->connect_error) {
        die("error in connection". $database->connect_error);
    } else {
      // echo "connection successful";
    }


?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8"/>
        <title id="title">Join other farmers in selling their products</title>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/sell.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/correct.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="search-navbar">
                    <form action="login.php" class="search-tab" method="POST">
                        <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                        <button class="search" name="search" type="submit">
<<<<<<< HEAD
                            search
=======
                            <img src="./assets/ionicons-2.0.1/png/512/ios7-search.png">
>>>>>>> 490793f12f1168573f6d673e3a1fd453bd2fe610
                        </button>
                        <ul class="search-list" id="search-list" style="display: none;">
                        </ul>
                    </form>
                </div>

                <!--login and register-->
                <div class="credentials">
                    <div class="login">
                        <span type="button" class="login-button">
                            <i class="far fa-user"></i>Login
                        </span>

                        <!--the login details as a modal dialog-->
                        <div class="dropdown form">
                            <div class="form-group">
                                <a href="admin-login.php">Admin</a>
                            </div>
                            <div class="form-group">
                                <a href="farmer-login.php">Farmer</a>
                            </div>
                            <div class="form-group">
                                <a href="customer-login.php">Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="register">
                        <a href="farmer-signup.php" class="register-button">
                            <i class="fas fa-user-plus"></i>Farmer Signup
                        </a>
                    </div>
                </div>
            </div>

            <!--navigation bar-->
            <div class="navigation_bar">
                <nav class="navbar">
                    <div class="about section">
                        <a href="about.php" class="nav about">about us</a>
                    </div>
                    <div class="category section">
                        <a href="category.php" class="nav category">categories</a>
                    </div>
                    <div class="sell section">
                        <a href="sell.php" class="nav sell">sell</a>
                    </div>
                    <div class="customer section">
                        <a href="customer-service.php" class="nav customer">customer service</a>
                    </div>
                    <div class="signup-customer">
                        <a href="customer-signup.php" class="nav-signup">customer signup</a>
                    </div>
                </nav>
            </div>
        </header>

        <section class="sell-image">
            <div class="sell-top">
                <h1>Sell like<br> crazy on <br>Ieka</h1>
                <p>Every product on Ieka belong to independent farmers and agricultural product dealers</p>
                <a class="join " href="register.php">sign up</a>
            </div>
            <div class="image">
                <img src="./assets/images/gettyimages-1226414629-612x612.jpg" alt="delivery vehicle">
            </div>
        </section>

        <section class="sale info">
            <div class="first-info">
                <h6>sell more</h6>
                <p>Irrespective of your location, Ieka provides an opportunity to reach out to prospective customers outside your location. 
                    You can sell to corporations, households, individuals, restaurants, hotels, retailers and even customers off the shores 
                    of your resident country.</p>
            </div>
            <div class="values">
                <h6>trust us</h6>
                <p>We are based on integrity transactions, ensuring that transacting parties are duly represented and satisfied.
                    <br/><a href="#">see our policy</a></p>
            </div>
            <div class="agric">
                <h6>Agriculture to the World</h6>
                <p>Farmers and agro products dealers should only worry about their farms and storage houses. They shouldn't not have to worry 
                    about display houses in market places, enhancing a nature friendly habitat</p>
            </div>
        </section>

        <section class="other services">
            <div class="sellguide">
                <a href="">Build your brand with Ieka   <img class="click" src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Information on selling online   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Guidelines on having a farm account on Ieka   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Advertise your farm products on Ieka   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Partner with Ieka   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>               
            </div>

            <div class="associate">
                <a href="">Want to partner with other farmers within your location?   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Access grants available for farmers   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Own multiple accounts on Ieka   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Confine your operations within your location   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>
                <a href="">Discuss with Ieka   <img src="./assets/ionicons-2.0.1/ionicons-2.0.1/png/512/android-arrow-up-right.png"></a>      
            </div>
        </section>

        <footer>
            <div class="first-part">
                <!--get to know us-->
                <div class="acquaintance">
                    <h6>Acquaint with us</h6>
                    <ul class="know us">
                        <li><a href="careers.php">careers</a></li>
                        <li><a href="about.php">about Ieka</a></li>
                        <li><a href="relations.php">investor relations</a></li>
                        <li><a href="customer-signup.php">customer signup</a></li>
                        <li><a href="farmer-signup.php">farmer signup</a></li>
                        <li class="flag"><img src="./assets/images/download.png" alt="nigeria flag"> Nigeria</li>
                    </ul>
                </div>

                <!--make money with us-->
                <div class="make money with us">
                    <h6>Make money with Ieka</h6>
                    <ul class="make-money">
                        <li><a href="sell.php">Sell your farm products</a></li>
                        <li><a href="sell">Sell your animals</a></li>
                        <li><a href="advertise-info.php">Advertise with Ieka</a></li>
                        <li><a href="affliate-info.php">Become an affliate</a></li>
                        <li><a href="make-money.php">More...</a></li>
                    </ul>
                </div>

                <!--terms and conditions-->
                <div class="terms and conditions">
                    <h6 class="policy">our policies</h6>
                    <ul class="policies">
                        <li><a href="payment-policy.php">Payment Policy</a></li>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="service-terms.php">Service Terms & Agreement</a></li>
                        <li><a href="negotiate-info.php">Negotiate with Ieka</a></li>
                    </ul>
                </div>

                <!--helpdesk-->
                <div class="helpdesk">
                    <h6>our helpdesk</h6>
                    <ul class="help">
                        <li><a href="report-buyer.php">Report a Buyer</a></li>
                        <li><a href="report-seller.php">Report a Seller</a></li>
                        <li><a href="account-issue.php">Account Issues</a></li>
                        <li><a href="account-creation-problem.php">Problems with account creation</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="second part">
                <!--social media section-->
                <div class="social-media">
                    <div class="twitter media">
                        <a href="#"><img src="./assets/ionicons-2.0.1/png/512/social-twitter-outline.png" alt="twitter"></a>
                    </div>
                    <div class="instagram media">
                        <a href="#"><img src="./assets/ionicons-2.0.1/png/512/social-instagram-outline.png" alt="instagram"></a>
                    </div>
                    <div class="linkedIn media">
                        <a href="#"><img src="./assets/ionicons-2.0.1/png/512/social-linkedin-outline.png" alt="linkedIn"></a>
                    </div>
                    <div class="facebook media">
                        <a href="#"><img src="./assets/ionicons-2.0.1/png/512/social-facebook-outline.png" alt="facebook"></a>
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
        <script type="text/javascript" src="./assets/javascript/script.js"></script>
        <script src="./assets/javascript/all.min.js"></script>
        <script>
            $("#search").keyup(function(event) {
                //get the value in the search box
                var search_keyword = event.target.value;
                if (search_keyword) {
                    var url = document.location.origin + '/ieka/search.php'
                    //make an ajax call to the server with the above url
                    $.get(url, {keyword: search_keyword}, function(response, statusCode, xJR){
                        document.getElementById("search-list").innerHTML = response;
                        //display the options corresponding to the searchwords
                        document.getElementById('search-list').style.display = "block";
                });
                } else {
                    document.getElementById('search-list').style.display = "none";
                }
            });
        </script>
    </body>
</html>