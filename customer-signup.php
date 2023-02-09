
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8"/>
        <title id="title">Welcome dearest customer!</title>

        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/forms.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/navbar.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
    <header class="desktop-nav-container">
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
                    <div class="customer section">
                        <a href="customer-service.php" class="nav customer">customer service</a>
                    </div>
                </nav>
            </div>
        </header>
        
        <!-- *************** MOBILE NAVBAR  **************** -->
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

                <div>
                <nav class="mobile-nav-links-container">
                    <div>
                        <a href="index.php">Home</a>
                    </div>
                    <div>
                        <a href="about.php">About us</a>
                    </div>
                    <div>
                        <a href="customer-service.php">Customer service</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
        <section class="container">
            <div class="hi">
                <h6>Welcome to Ieka's Digital Market</h6>
            </div>
            <div class="signup form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="signup-data" method="POST" enctype="multipart/form-data">
                    <p id="error" style="display:none;"></p>    
                    <div class="sects">    
                        <div class="sect-1">
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
                            <div>
                                <label for="password">passcode</label>
                                <input type="password" name="password" id="password">
                            </div>
                        </div>
                        <div class="sect-2"> 
                            <div>
                                <label for="phone">phone number</label>
                                <input type="tel" name="phone" id="phone" required>
                            </div>
                            <div>
                                <label for="gender">gender</label>
                                <select name="gender" id="gender">
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                    <option value="transgender">transgender</option>
                                </select>
                            </div>    
                            <div>
                                <label for="residence-state">residence state</label>
                                <input type="text" name="residence-state" id="residence-state" required>
                            </div>
                            <div>
                                <label for="residence-country">residence country</label>
                                <input type="text" name="residence-country" id="residence-country" required>
                            </div>
                            <div>
                                <label for="picture">Select Image</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                        </div>
                    </div>
                    <div class="sub">
                        <input type="submit" name="submit" value="submit" class="submit">
                    </div>
                </form>
            </div>
        </section>
        <script src="./assets/javascript/forms-customer.js"></script>
        <script type="text/javascript" src="./assets/javascript/script.js"></script>
        <script src="./assets/javascript/all.min.js"></script>
    </body>
</html>