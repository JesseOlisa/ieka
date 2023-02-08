<?php
 
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
        <title id="title">Help! Get the help you need</title>

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
                    <form action="search.php" class="search-tab" method="GET">
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

        <!--intro-->
        <div class="welcome-customer">
            <h4>Hi esteemed customer! What can we help you with today?</h4>
        </div>

        <section class="user options">
            <div class="things-you-can-do">
                <h6>Some things you can do here</h6>
            </div>
            <div class="services-list">
                <div class="first-line">   
                    <div class="list-1">
                        <h6><a href="">Account</a></h6>
                        <ul>
                            <li>Do a lot with your Ieka account</li>
                        </ul>
                    </div>
                    <div class="list-2">
                        <h6><a href="">Delivery & Logistics</a></h6>
                        <ul>
                            <li>Have your say on our delivery service</li>
                        </ul>
                    </div>
                    <div class="list-3">
                        <h6><a href="">report</a></h6>
                        <ul>
                            <li>Report to us today</li>
                        </ul>
                    </div>
                </div>

                <div class="second-line">
                    <div class="list-1">
                        <h6><a href="">advertisements</a></h6>
                        <ul>
                            <li>Advertise on Ieka</li>
                        </ul>
                    </div>
                    <div class="list-2">
                        <h6><a href="">careers</a></h6>
                        <ul>
                            <li>Explore the variety of careers on Ieka</li>
                        </ul>
                    </div>
                    <div>
                        <h6><a href="">investor relations</a></h6>
                        <ul>
                            <li>Invest in our evergreen project</li>
                        </ul>
                    </div>
                </div>

                <div class="third-line">
                    <div class="list-1">
                        <h6><a href="">know ieka</a></h6>
                        <ul>
                            <li>Acquaint with us today</li>
                        </ul>
                    </div>
                    <div class="list-2">
                        <h6><a href="">reviews</a></h6>
                        <ul>
                            <li>Say what you think about our market</li>
                        </ul>
                    </div>
                    <div class="list-3">
                        <h6><a href="">Devices</a></h6>
                        <ul>
                            <li>Device compatibility</li>
                        </ul>
                    </div>
                </div>

                <div class="fourth-line">
                    <div class="list-1">
                        <h6><a href="">SDG Vision</a></h6>
                        <ul>
                            <li>Our SDG goal</li>
                        </ul>
                    </div>
                </div>
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
<<<<<<< HEAD
                <div class="twitter media">
                        <a href="#"><img src="./assets/icons/png/512/social-twitter-outline.png" alt="facebook"></a>
                    </div>
                    <div class="instagram media">
                        <a href="#"><img src="./assets/icons/png/512/social-instagram-outline.png" alt="facebook"></a>
                    </div>
                    <div class="linkedin media">
                        <a href="#"><img src="./assets/icons/png/512/social-linkedin-outline.png" alt="facebook"></a>
                    </div>
                    <div class="facebook media">
                        <a href="#"><img src="./assets/icons/png/512/social-facebook-outline.png" alt="facebook"></a>
=======
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
>>>>>>> 490793f12f1168573f6d673e3a1fd453bd2fe610
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