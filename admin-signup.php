<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8"/>
        <title id="title">Become an Ieka admin today!</title>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/forms.css" rel="stylesheet" type="text/css">
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
                        <input type="text" autocomplete="on" placeholder="Type your search here" id="search" class="search-bar" name="find">
                        <button class="search" name="search" type="submit">
                            <img src="./assets/ionicons-2.0.1/png/512/ios7-search.png">
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
                        <div class="dropdown">
                            <form action="login.php" class="login-form" method="POST" name="form">
                                <div class="form-group">
                                    <label for="phone-number">phone number</label>
                                    <input type="text" name="phone-number" id="farmer" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="passcode">passcode</label>
                                    <input type="password" name="passcode" id="passcode" class="form-control">
                                </div>
                                <div class="enter">
                                    <input type="submit" value="submit" name="enter">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="register">
                        <a href="farmer-register.php" class="register-button">
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
                    <div class="register-customer">
                        <a href="customer-signup.php" class="nav-register">customer signup</a>
                    </div>
                </nav>
            </div>
        </header>
        <section class="container">
            <div class="hi">
                <h6>Hello member! Welcome to Ieka</h6>
            </div>
            <div class="signup form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="signup-data" method="POST">
                    <p class="error" style="display:none;"></p> 
                    <div class="sections">
                        <div class="section-1">
                            <div>
                                <label for="firstname">first name</label>
                                <input type="text" name="firstname" id="first" required>
                            </div>
                            <div>
                                <label for="lastname">last name</label>
                                <input type="text" name="lastname" id="last" required>
                            </div>
                            <div>
                                <label for="address">address</label>
                                <input type="text" name="address" id="address" required>
                            </div>
                            <div>
                                <label for="email">email</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="section-2">
                            <div>
                                <label for="phone">phone number</label>
                                <input type="tel" name="phone" id="phone" required>
                            </div>
                            <div>
                                <label for="gender">gender</label>
                                <input type="checkbox" name="gender" id="male" value="male"><span class="male">male</span>
                                <input type="checkbox" name="gender" id="female" value="female"><span class="female">female</span>
                            </div>
                            <div>
                                <label for="residence-state">residence state</label>
                                <input type="text" name="residence-state" id="residence-state" required>
                            </div>
                        </div>
                        <div class="section-3">
                            <div>
                                <label for="residence-country">residence country</label>
                                <input type="text" name="residence-country" id="residence-country" required>
                            </div>
                            <div>
                                <label for="state-of-origin">State-of-Origin</label>
                                <input type="text" name="state-of-origin" id="state-of-origin" required>
                            </div>
                            <div>
                                <label for="country-of-origin">Country-of-Origin</label>
                                <input type="text" name="country-of-origin" id="country-of-origin" required>
                            </div>
                            <div>
                                <label for="password">passcode</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sub">
                        <input type="submit" name="submit" value="submit" class="submit">
                    </div>
                </form>
            </div>
        </section>
        <script type="text/javascript" src="./assets/javascript/script.js"></script>
        <script type="text/javascript" src="./assets/javascript/forms-admins.js"></script>
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