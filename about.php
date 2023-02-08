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
        <title id="title">Ieka Enterprises</title>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/about.css" rel="stylesheet" type="text/css">
        <!-- <link href="/ieka/assets/css/correct.css" rel="stylesheet" type="text/css"> -->
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/fb151ec1c7.js" crossorigin="anonymous" defer></script>
    </head>
    <body>
        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="search-navbar">
                    <form action="search.php" class="search-tab" method="GET">
                        <label for="search" class="search--container">
                            <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                            <span><i class="fa-solid fa-magnifying-glass"></i></span>
                        </label>
                        <ul class="search-list" id="search-list" style="display: none;">
                        </ul>
                    </form>
                </div>
                
                <!--login and register-->
                <div class="credentials">
                    <div class="login">
                        <button type="button" class="login-button">
                            <i class="far fa-user"></i>Login
                        </button>
                        
                        <!--the login details as a modal dialog-->
                        <div class="dropdown form" id="dropdown-login">
                            
                            <div class="form-group">
                                <a href="farmer-login.php">Farmer</a>
                            </div>
                            <div class="form-group">
                                <a href="customer-login.php">Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="register">
                        <button type="button" class="signup-button">
                        <i class="fas fa-user-plus"></i>Signup
                    </button>
                    <div class="dropdown form" id="dropdown-signup">
                        <div class="form-group">
                            <a href="farmer-signup.php">Farmer</a>
                        </div>
                        <div class="form-group">
                            <a href="customer-signup.php">Customer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--navigation bar-->
            <div class="navigation_bar">
                <nav class="navbar">
                    <div class="home section">
                        <a href="index.php">home</a>
                    </div>
                    <div class="about section">
                        <a href="about.php" class="nav about">about us</a>
                    </div>
                    <!-- <div class="category section">
                        <a href="category.php" class="nav category">categories</a>
                    </div> -->
                    <!-- <div class="sell section">
                        <a href="sell.php" class="nav sell">sell</a>
                    </div> -->
                    <div class="customer section">
                        <a href="customer-service.php" class="nav customer">customer service</a>
                    </div>
                </nav>
            </div>
        </header>

        <header class="mobile-nav-container">
                <div class="menu--container">
                    <div role="button" class="menu--btn"></div>
                </div>
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <!-- MOBILE SEARCH BAR -->
            <div class="mobile-search-navbar">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                <form action="search.php" class="search-tab" method="GET">
                    <label for="search" class="search--container">
                        <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                    </label>
                    <ul class="search-list" id="search-list" style="display: none;">
                    </ul>
                </form>
            </div>

        </header>

        <!--introduction-->
        <section class="intro">
            <h6>Hi! Welcome to Ieka</h6>
            <div class="ieka-statement">
                <p>
                    <strong>Ieka Enterprises</strong> is a Nigerian company that provides a network for sale and distribution of agricultural products, either crops
                    or animals. We have a virtual agricultural market, that is same to the physical market, characteristic of the bargaining and
                    pricing between customers and sellers. Prospective customers reach out to the dealer on the product they want to buy and 
                    discuss the price and quantity. Once the parties agree, our system ensures the payments made by the customer get to the 
                    dealer, after getting our 10% share
                </p>
            </div>
        </section>

        <!--mission and vision-->
        <section class="mission-and-vision">
            <!--mission-->
            <div class="mission">
                <h6>our mission</h6>
                <p><q>We intend to stop farmers from looking for display stores or warehouses or having to go the markets with their crops or animals.
                    Farmers should just worry about their farms and storage houses.
                </q></p>
            </div>
            <!--vision-->
            <div class="vision">
                <h6>our visions</h6>
                <ol>
                    <li>Recreate the physical agric market online</li>
                    <li>Reduce concerns of farmers over poor road network</li>
                    <li>Promote greater participation in agriculture</li>
                </ol>
            </div>
        </section>
        
        <!--footer-->
        <footer>
            <div class="first-part">
                <!--get to know us-->
                <div class="acquaintance">
                    <h6>Acquaint with us</h6>
                    <ul class="know us">
                        <li><a href="careers.php">careers</a></li>
                        <li><a href="about.php">about ieka</a></li>
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
                        <li><a href="negotiate-info.php">Negotiate with Meka</a></li>
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