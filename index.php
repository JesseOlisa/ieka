<?php
    //do the session check
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
        <title id="title">Connect, Sell and Buy agricultural products</title>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/styles.css" rel="stylesheet" type="text/css">
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
                        <input type="tel" name="find" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar">
                        <button class="search" name="search" type="submit">
                            search
                        </button>
                        <ul class="search-list" id="search-list" style="display: none;">
                        </ul>
<<<<<<< HEAD
=======
                        <button class="search" name="search" type="submit">
                            <img src="./assets/ionicons-2.0.1/png/512/ios7-search.png">
                        </button>
>>>>>>> 490793f12f1168573f6d673e3a1fd453bd2fe610
                    </form>
                </div>
                <div class="overlay" style="display:none;"></div>
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

        <!--photo gallery with wordings and categories-->
        <section class="slideshow category">
            <!--crop science-->
            <div class="crop">
                <ul class="crops">
                    <h6>crops</h6>
                    <li>Cereals e.g <strong>rice, maize, wheat, sorghum...</strong></li>
                    <li>Pulses e.g <strong>beans, peas, lentils...</strong></li>
                    <li>Oils and oil seeds e.g <strong>groundnut, soybean, mustard...</strong></li>
                    <li>Vegetables e.g <strong>cabbage, onion, cucumber...</strong></li>
                    <li>Fruits e.g <strong>orange, pineapple, mango, guava...</strong></li>
                    <li>Nuts e.g <strong>cashewnut, almond, pinenuts...</strong></li>
                    <li>Sugars & Starches e.g <strong>cassava, milk, sugarcane...</strong></li>
                    <li>Fibres e.g <strong>cotton, banana, silk, wool...</strong></li>
                    <li>Beverages e.g <strong>rootbeer, tea, chocolate...</strong></li>
                    <li>Spices e.g <strong>ginger, pepper, curry...</strong></li>
                    <li><a href="category.php">See more...</a></li>
                </ul>
            </div>
            <!--photo gallery-->
            <div class="slide">
                <div class="photo">
                    <img src="./assets/images/photo-1509813685-e7f0e4eaf3ee.jpeg" alt="first photo">
                    <div class="text-0">Sell your farm produce beyond your geolocation</div>
                    <div class="text-1"><a href="register.php">get started</a></div>
                </div>
                <div class="photo">
                    <img src="./assets/images/YamsatBrixtonMarket.jpg" alt="second photo">
                    <div class="text-2">A better farm structure, with no need for display stores, just the farm and storage facility</div>
                </div>
                <div class="photo">
                    <img src="./assets/images/photo-1566385101042-1a0aa0c1268c.jpeg" alt="third photo">
                    <div class="text-3">Purchase desired agricultural products not present in your geolocation, spanning from crops to animal
                    husbandary</div>
                </div>
                <div class="photo">
                    <img src="./assets/images/gettyimages-889395368-612x612.jpg" alt="fourth photo">
                    <div class="text-4">Efficient payment-and-delivery system</div>
                </div>
                <div class="photo">
                    <img src="./assets/images/photo-1560466683-62821c7ab0fa.jpg" alt="fifth photo">
                    <div class="text-5">Create a lucrative network with other farmers, outside your location</div>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span> 
                    <span class="dot" onclick="currentSlide(5)"></span>  
                </div>
            </div>
            
            <!--animal husbandary-->
            <div class="animal husbandary">
                <h6>animals</h6>
                <ul class="animals">
                    <li>Dairy e.g <strong></strong></li>
                    <li>Pets e.g <strong></strong></li>
                    <li>Poultry e.g <strong></strong></li>
                    <li>Aquaculture e.g <strong></strong></li>
                    <li><a href="category.php">See more...</a></li>
                </ul>
            </div>
        </section>
        
        <!--display according to groups-->
        <section class="groups">

        <!--cereals-->
            <div class="cereals">
                <h6>cereals</h6>
                <div class="slope">
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/rice.jpg" alt="rice" class="food">
                        <a name="retrieve" href="search.php" class="foodname">rice</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/maize.jpg" alt="maize" class="food">
                        <a name="retrieve" href="search.php" class="foodname">maize</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/wheat.jpg" alt="wheat" class="food">
                        <a name="retrieve" href="search.php" class="foodname">wheat</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/sorghum.jpg" alt="sorghum" class="food">
                        <a name="retrieve" href="search.php" class="foodname">sorghum</a>
                    </div>
                </div>
                <div class="slope">
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/millet.jpg" alt="millet" class="food">
                        <a name="retrieve" href="search.php" class="foodname">millet</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/garri.jpeg" alt="garri" class="food">
                        <a name="retrieve" href="search.php" class="foodname">garri</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/oats.jpg" alt="oats" class="food">
                        <a name="retrieve" href="search.php" class="foodname">oats</a>
                    </div>
                    <div class="cereal group">
                        <img src="./assets/images/crops/cereals/barley.jpg" alt="barley" class="food">
                        <a name="retrieve" href="search.php" class="foodname">barley</a>
                    </div>
                </div>
                <div class="cereal extra">
                    <a href="category.php#cereals">See more...</a>
                </div>
            </div>

            <!--roots tubers and bulbs-->
            <div class="roots tubers bulbs">
                <h6>roots, tubers & bulbs</h6>
                <div class="sleek">
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/yam.jpg" alt="yam" class="food">
                        <a name="retrieve" href="search.php" class="foodname">yam</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/potato.jpg" alt="potato" class="food">
                        <a name="retrieve" href="search.php" class="foodname">potato</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/cassava.jpg" alt="cassava" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cassava</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/cocoyam.jpg" alt="cocoyam" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cocoyam</a>
                    </div>
                </div>
                <div class="sleek">
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/carrot.jpg" alt="carrot" class="food">
                        <a name="retrieve" href="search.php" class="foodname">carrot</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/sweet potato.jpg" alt="sweet potato" class="food">
                        <a name="retrieve" href="search.php" class="foodname">sweet potato</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/onion.jpg" alt="onion" class="food">
                        <a name="retrieve" href="search.php" class="foodname">onion</a>
                    </div>
                    <div class="root-bulb group">
                        <img src="./assets/images/crops/vegetables/garlic.jpg" alt="garlic" class="food">
                        <a name="retrieve" href="search.php" class="foodname">garlic</a>
                    </div>
                </div>
                <div class="root-bulb extra">
                    <a href="category.php">See more...</a>
                </div>
            </div>
            
            <!--vegetables-->
            <div class="vegetables">
                <h6>vegetables</h6>
                <div class="slant">
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/cabbage.jpg" alt="cabbage" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cabbage</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/cucumber.jpg" alt="cucumber" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cucumber</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/lettuce.jpg" alt="lettuce" class="food">
                        <a name="retrieve" href="search.php" class="foodname">lettuce</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/okra.jpg" alt="okra" class="food">
                        <a name="retrieve" href="search.php" class="foodname">okra</a>
                    </div>
                </div>
                <div class="slant">
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/tomato.jpg" alt="tomato" class="food">
                        <a name="retrieve" href="search.php" class="foodname">tomato</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/spinach.jpg" alt="spinach" class="food">
                        <a name="retrieve" href="search.php" class="foodname">spinach</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/vegetables/pumpkin.jpg" alt="pumpkin" class="food">
                        <a name="retrieve" href="search.php" class="foodname">pumpkin</a>
                    </div>
                    <div class="vegetable group">
                        <img src="./assets/images/crops/pulses/soybeans.jpg" alt="soybeans" class="food">
                        <a name="retrieve" href="search.php" class="foodname">soybeans</a>
                    </div>
                </div>
                <div class="vegetable extra">
                    <a href="category.php#vegetables">See more...</a>
                </div>
            </div>

            <!--pets and meat-->
            <div class="pets and meat">
                <h6>pets & meat</h6>
                <div class="slay">
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/pets/parrot.jpg" alt="parrot" class="food">
                        <a name="retrieve" href="search.php" class="foodname">parrot</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/dairy/cow.jpg" alt="cow" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cow</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/pets/dog.jpg" alt="dog" class="food">
                        <a name="retrieve" href="search.php" class="foodname">dog</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/aquaculture/catfish.jpg" alt="fish" class="food">
                        <a name="retrieve" href="search.php" class="foodname">fish</a>
                    </div>
                </div>
                <div class="slay">
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/pets/cat.jpg" alt="cat" class="food">
                        <a name="retrieve" href="search.php" class="foodname">cat</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/poultry/fowl.jpg" alt="fowl" class="food">
                        <a name="retrieve" href="search.php" class="foodname">fowl</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/pets/rabbit.jpg" alt="rabbit" class="food">
                        <a name="retrieve" href="search.php" class="foodname">rabbit</a>
                    </div>
                    <div class="pet-and-meat group">
                        <img src="./assets/images/animals/dairy/goat.jpg" alt="goat" class="food">
                        <a name="retrieve" href="search.php" class="foodname">goat</a>
                    </div>
                </div>
                <div class="pet-and-meat extra">
                    <a href="category.php#animals">See more...</a>
                </div>
            </div>
        </section>

        <!--footer-->
        <footer id="footer">
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
                        <li><a href="sell.php">Sell your animals</a></li>
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
                        <li class="report" name="report_buyer"><a href="#">Report a Buyer</a></li>
                        <li id="show_error" style="display:none;">You have to log into your account to complete this operation</li>
                        <li class="report" name="report-seller"><a href="#">Report a Seller</a></li>
                        <li><a href="account-issue.php">Account Issues</a></li>
                        <li><a href="account-creation-problem.php">Problems with account creation</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="second part">
                <!--social media section-->
                <div class="social-media">
                    <div class="twitter media">
<<<<<<< HEAD
                        <a href="#"><img src="./assets/icons/png/512/social-twitter-outline.png" alt="twitter"></a>
                    </div>
                    <div class="instagram media">
                        <a href="#"><img src="./assets/icons/png/512/social-instagram-outline.png" alt="instagram"></a>
                    </div>
                    <div class="linkedIn media">
                        <a href="#"><img src="./assets/icons/png/512/social-linkedin-outline.png" alt="linkedIn"></a>
                    </div>
                    <div class="facebook media">
                        <a href="#"><img src="./assets/icons/png/512/social-facebook-outline.png" alt="facebook"></a>
=======
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
                    <p>This is lovely to wattchq</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="./assets/javascript/script.js"></script>
        <script type="text/javascript" src="./assets/javascript/login-farmers.js"></script>
        <script src="./assets/javascript/all.min.js"></script>
        <script type="text/javascript" src="index.js"></script> 
        <script type="text/javascript" src="slant.js"></script>
        <script type="text/javascript" src="pets.js"></script>
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
