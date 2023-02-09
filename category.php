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
        <title id="title">Different groups of crops and animals in agriculture</title>

        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <!--Links to the stylesheets-->
        <!--Links to the stylesheets-->
        <link href="/ieka/assets/css/category.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/navbar.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/footer.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body class="category-body">
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
        <!--crops category-->
        <section class="crop-science">
            <p>Get to know various crops and their groups.<br/><strong>Note</strong> that crops you can get here are not limited to the underlisted. Thanks.</p>
            <!--cereals--->
            <div id="cereals" class="cereals">
            <h6>cereals</h6>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/rice.jpg" alt="rice" class="food">
                    <a name="retrieve" href="search.php" class="foodname">rice</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/maize.jpg" alt="maize" class="food">
                    <a name="retrieve" href="search.php" class="foodname">maize</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/wheat.jpg" alt="wheat" class="food">
                    <a name="retrieve" href="search.php" class="foodname">wheat</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/sorghum.jpg" alt="sorghum" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sorghum</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/millet.jpg" alt="millet" class="food">
                    <a name="retrieve" href="search.php" class="foodname">millet</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/garri.jpeg" alt="garri" class="food">
                    <a name="retrieve" href="search.php" class="foodname">garri</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/oats.jpg" alt="oats" class="food">
                    <a name="retrieve" href="search.php" class="foodname">oats</a>
                </div>
                <div class="cereal-group">
                    <img src="./assets/images/crops/cereals/barley.jpg" alt="barley" class="food">
                    <a name="retrieve" href="search.php" class="foodname">barley</a>
                </div>
            </div>

            <!--pulses--->
            <div class="pulses">
            <h6>pulses & legumes</h6>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/beans.jpg" alt="beans" class="food">
                    <a name="retrieve" href="search.php" class="foodname">beans</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/alfafa.jpg" alt="alfafa" class="food">
                    <a name="retrieve" href="search.php" class="foodname">alfafa</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/carob.jpg" alt="carob" class="food">
                    <a name="retrieve" href="search.php" class="foodname">carob</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/chickpeas.jpg" alt="chickpeas" class="food">
                    <a name="retrieve" href="search.php" class="foodname">chickpeas</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/clover.jpg" alt="clover" class="food">
                    <a name="retrieve" href="search.php" class="foodname">clover</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/groundnut.jpg" alt="groundnut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">groundnut</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/lentils.jpg" alt="lentils" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lentils</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/lupin.jpg" alt="lupin" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lupin</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/mimosa.jpg" alt="mimosa" class="food">
                    <a name="retrieve" href="search.php" class="foodname">mimosa</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/peas.jpg" alt="peas" class="food">
                    <a name="retrieve" href="search.php" class="foodname">peas</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/soybeans.jpg" alt="soybeans" class="food">
                    <a name="retrieve" href="search.php" class="foodname">soybeans</a>
                </div>
                <div class="legumes group">
                    <img src="./assets/images/crops/pulses/tamarind.jpg" alt="tamarind" class="food">
                    <a name="retrieve" href="search.php" class="foodname">tamarind</a>
                </div>
            </div>

            <!--oils and oil seeds-->
            <div class="oils and oilseeds">
            <h6>Oils & Oil seeds</h6>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/canola.jpg" alt="canola" class="food">
                    <a name="retrieve" href="search.php" class="foodname">canola</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/coconut.jpg" alt="coconut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">coconut</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/hemp-oil.jpg" alt="hemp" class="food">
                    <a name="retrieve" href="search.php" class="foodname">hemp</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/jatropha.jpg" alt="jatropha" class="food">
                    <a name="retrieve" href="search.php" class="foodname">jatropha</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/mustard.jpg" alt="mustard" class="food">
                    <a name="retrieve" href="search.php" class="foodname">mustard</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/palm oil.jpg" alt="palm oil" class="food">
                    <a name="retrieve" href="search.php" class="foodname">palm oil</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/palm.jpg" alt="palm" class="food">
                    <a name="retrieve" href="search.php" class="foodname">palm</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/pennycress.jpg" alt="pennycress" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pennycress</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/rapeseed.jpg" alt="rapeseed" class="food">
                    <a name="retrieve" href="search.php" class="foodname">rapeseed</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/sunflower.jpg" alt="sunflower" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sunflower</a>
                </div>
                <div class="oils-and-oilseeds group">
                    <img src="./assets/images/crops/oils and oil seeds/vegetable oil.jpg" alt="vegetable oil" class="food">
                    <a name="retrieve" href="search.php" class="foodname">vegetable oil</a>
                </div>
            </div>

            <!--vegetables-->
            <div id="vegetables" class="vegetabless">
            <h6>Vegetables</h6>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/broccoli.jpg" alt="broccoli" class="food">
                    <a name="retrieve" href="search.php" class="foodname">broccoli</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/cabbage.jpg" alt="cabbage" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cabbage</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/carrot.jpg" alt="carrot" class="food">
                    <a name="retrieve" href="search.php" class="foodname">carrot</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/cassava.jpg" alt="cassava" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cassava</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/cauliflower.jpg" alt="cauliflower" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cauliflower</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/cocoyam.jpg" alt="cocoyam" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cocoyam</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/cucumber.jpg" alt="cucumber" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cucumber</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/eggplant.jpg" alt="eggplant" class="food">
                    <a name="retrieve" href="search.php" class="foodname">eggplant</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/garlic.jpg" alt=" garlic" class="food">
                    <a name="retrieve" href="search.php" class="foodname">garlic</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/lettuce.jpg" alt="lettuce" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lettuce</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/okra.jpg" alt="okra" class="food">
                    <a name="retrieve" href="search.php" class="foodname">okra</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/onion.jpg" alt="onion" class="food">
                    <a name="retrieve" href="search.php" class="foodname">onion</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/potato.jpg" alt="potato" class="food">
                    <a name="retrieve" href="search.php" class="foodname">potato</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/pumpkin.jpg" alt="pumpkin" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pumpkin</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/spinach.jpg" alt=" spinach" class="food">
                    <a name="retrieve" href="search.php" class="foodname">spinach</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/sweet potato.jpg" alt="sweet potato" class="food">
                    <a name="retrieve" href="search.php" class="foodname">Sweet Potato</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/tomato.jpg" alt="tomato" class="food">
                    <a name="retrieve" href="search.php" class="foodname">tomato</a>
                </div>
                <div class="vegetable group">
                    <img src="./assets/images/crops/vegetables/yam.jpg" alt="yam" class="food">
                    <a name="retrieve" href="search.php" class="foodname">yam</a>
                </div>
            </div>

            <!--fruits-->
            <div class="fruits">
            <h6>fruits</h6>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/apple.jpg" alt="apple" class="food">
                    <a name="retrieve" href="search.php" class="foodname">apple</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/banana.jpg" alt="banana" class="food">
                    <a name="retrieve" href="search.php" class="foodname">banana</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/egusi.jpg" alt="egusi" class="food">
                    <a name="retrieve" href="search.php" class="foodname">egusi</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/kiwifruit.jpg" alt="kiwifruit" class="food">
                    <a name="retrieve" href="search.php" class="foodname">kiwifruit</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/lemon.jpg" alt="lemon" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lemon</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/mango.jpg" alt="mango" class="food">
                    <a name="retrieve" href="search.php" class="foodname">mango</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/melon.jpg" alt="melon" class="food">
                    <a name="retrieve" href="search.php" class="foodname">melon</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/mulberry.jpg" alt="mulberry" class="food">
                    <a name="retrieve" href="search.php" class="foodname">mulberry</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/ogbono.jpg" alt="ogbono" class="food">
                    <a name="retrieve" href="search.php" class="foodname">ogbono</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/orange.jpg" alt="orange" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lettuce</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/peach.jpg" alt="peach" class="food">
                    <a name="retrieve" href="search.php" class="foodname">peach</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/pear.jpg" alt="pear" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pear</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/plantain.jpg" alt="plantain" class="food">
                    <a name="retrieve" href="search.php" class="foodname">plantain</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/strawberry.jpg" alt="strawberry" class="food">
                    <a name="retrieve" href="search.php" class="foodname">strawberry</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/watermelon.jpg" alt="watermelon" class="food">
                    <a name="retrieve" href="search.php" class="foodname">watermelon</a>
                </div>
            </div>

            <!--nuts-->
            <div class="nuts">
            <h6>nuts</h6>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/acorn.jpg" alt="acorn" class="food">
                    <a name="retrieve" href="search.php" class="foodname">acorn</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/almond.jpg" alt="almond" class="food">
                    <a name="retrieve" href="search.php" class="foodname">almond</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/brazilnut.jpg" alt="brazilnut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">brazilnut</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/chestnut.jpg" alt="chestnut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">chestnut</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/hazelnut.jpg" alt="hazelnut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">hazelnut</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/macadamia.jpg" alt="macadamia" class="food">
                    <a name="retrieve" href="search.php" class="foodname">macadamia</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/pecans.jpg" alt="pecans" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pecans</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/pinenut.jpg" alt="pinenut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pinenut</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/pistachios.jpg" alt="pistachios" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pistachios</a>
                </div>
                <div class="nut group">
                    <img src="./assets/images/crops/nuts/walnut.jpg" alt="walnut" class="food">
                    <a name="retrieve" href="search.php" class="foodname">walnut</a>
                </div>
            </div>

            <!--sugars-->
            <div class="sugars">
            <h6>Sugars</h6>
                <div class="sugar group">
                    <img src="./assets/images/crops/sugars/milk.jpg" alt="milk" class="food">
                    <a name="retrieve" href="search.php" class="foodname">milk</a>
                </div>
                <div class="sugar group">
                    <img src="./assets/images/crops/sugars/sugarbeet.jpg" alt="sugarbeet" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sugarbeet</a>
                </div>
                <div class="sugar group">
                    <img src="./assets/images/crops/sugars/sugarcane.jpg" alt="sugarcane" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sugarcane</a>
                </div>
                <div class="sugar group">
                    <img src="./assets/images/crops/sugars/sweet sorghum.jpg" alt="sweet sorghum" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sweet sorghum</a>
                </div>
            </div>

            <!--fibers-->
            <div class="fibers">
            <h6>fibers</h6>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/coir.jpg" alt="coir" class="food">
                    <a name="retrieve" href="search.php" class="foodname">coir</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/cotton.jpg" alt="cotton" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cotton</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/flax.jpg" alt="flax" class="food">
                    <a name="retrieve" href="search.php" class="foodname">flax</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/hemp.jpg" alt="industrial hemp" class="food">
                    <a name="retrieve" href="search.php" class="foodname">industrial hemp</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/hoopvine.jpg" alt="hoopvine" class="food">
                    <a name="retrieve" href="search.php" class="foodname">hoopvine</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/jute.jpg" alt="jute" class="food">
                    <a name="retrieve" href="search.php" class="foodname">jute</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/kenaf.jpg" alt="kenaf" class="food">
                    <a name="retrieve" href="search.php" class="foodname">kenaf</a>
                </div>
                <div class="fiber group">
                    <img src="./assets/images/crops/fibers/sunhemp.jpg" alt="sunhemp" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sunhemp</a>
                </div>
            </div>

            <!--beverages-->
            <div class="beverages">
            <h6>beverages</h6>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/agave.jpg" alt="agave" class="food">
                    <a name="retrieve" href="search.php" class="foodname">agave</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/chocolate.jpg" alt="chocolate" class="food">
                    <a name="retrieve" href="search.php" class="foodname">chocolate</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/coffee.jpg" alt="coffee" class="food">
                    <a name="retrieve" href="search.php" class="foodname">coffee</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/honey.jpg" alt="honey" class="food">
                    <a name="retrieve" href="search.php" class="foodname">honey</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/juice.jpg" alt="juice" class="food">
                    <a name="retrieve" href="search.php" class="foodname">juice</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/lemongrass.jpg" alt="lemongrass" class="food">
                    <a name="retrieve" href="search.php" class="foodname">lemongrass</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/liquor.jpg" alt="liquor" class="food">
                    <a name="retrieve" href="search.php" class="foodname">liquor</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/spirit.jpg" alt="spirit" class="food">
                    <a name="retrieve" href="search.php" class="foodname">spirit</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/tea.jpg" alt="tea" class="food">
                    <a name="retrieve" href="search.php" class="foodname">tea</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/tequila.jpg" alt="tequila" class="food">
                    <a name="retrieve" href="search.php" class="foodname">tequila</a>
                </div>
                <div class="beverage group">
                    <img src="./assets/images/crops/beverages/wine.jpg" alt="wine" class="food">
                    <a name="retrieve" href="search.php" class="foodname">wine</a>
                </div>
            </div>

            <!--spices-->
            <div class="spices">
            <h6>spices</h6>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/crayfish.jpeg" alt="crayfish" class="food">
                    <a name="retrieve" href="search.php" class="foodname">crayfish</a>
                </div>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/cumin.jpg" alt="cumin" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cumin</a>
                </div>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/curry.jpg" alt="curry" class="food">
                    <a name="retrieve" href="search.php" class="foodname">curry</a>
                </div>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/ginger.jpg" alt="ginger" class="food">
                    <a name="retrieve" href="search.php" class="foodname">ginger</a>
                </div>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/nutmeg.jpg" alt="nutmeg" class="food">
                    <a name="retrieve" href="search.php" class="foodname">spices</a>
                </div>
                <div class="spice group">
                    <img src="./assets/images/crops/spices/pepper.jpg" alt="pepper" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pepper</a>
                </div>
                <div class="fruit group">
                    <img src="./assets/images/crops/fruits/melon.jpg" alt="melon" class="food">
                    <a name="retrieve" href="search.php" class="foodname">melon</a>
                </div>
            </div>
        </section>

        <!--animals-->
        <section id="animals" class="animal-science">
            <p><strong>Animal Husbandary</strong><br/>Get to know various animals and their groups.<br/><strong>Note</strong> that animals you can get here are not limited to the underlisted. Thanks.</p>
            
            <!--aquaculture-->
            <div class="aquaculture">
                <h6>aquaculture</h6>
                <div class="aqua group">
                    <img src="./assets/images/animals/aquaculture/catfish.jpg" alt="catfish" class="food">
                    <a name="retrieve" href="search.php" class="foodname">catfish</a>
                </div>
                <div class="aqua group">
                    <img src="./assets/images/animals/aquaculture/prawn.jpg" alt="prawn" class="food">
                    <a name="retrieve" href="search.php" class="foodname">prawn</a>
                </div>
                <div class="aqua group">
                    <img src="./assets/images/animals/aquaculture/shrimp.jpg" alt="shrimp" class="food">
                    <a name="retrieve" href="search.php" class="foodname">shrimp</a>
                </div>
                <div class="aqua group">
                    <img src="./assets/images/animals/aquaculture/tilapia.jpg" alt="tilapia" class="food">
                    <a name="retrieve" href="search.php" class="foodname">tilapia</a>
                </div>
                <div class="aqua group">
                    <img src="./assets/images/animals/aquaculture/yak.jpg" alt="yak" class="food">
                    <a name="retrieve" href="search.php" class="foodname">yak</a>
                </div>
            </div>

            <!--dairy-->
            <div class="dairy">
                <h6>dairy</h6>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/buffalo.jpg" alt="buffalo" class="food">
                    <a name="retrieve" href="search.php" class="foodname">buffalo</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/camel.jpg" alt="camel" class="food">
                    <a name="retrieve" href="search.php" class="foodname">camel</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/cow.jpg" alt="cow" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cow</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/donkey.jpg" alt="donkey" class="food">
                    <a name="retrieve" href="search.php" class="foodname">donkey</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/giraffe.jpg" alt="giraffe" class="food">
                    <a name="retrieve" href="search.php" class="foodname">giraffe</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/goat.jpg" alt="goat" class="food">
                    <a name="retrieve" href="search.php" class="foodname">goat</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/horse.jpg" alt="horse" class="food">
                    <a name="retrieve" href="search.php" class="foodname">horse</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/pygmy.jpg" alt="pygmy" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pygmy</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/reindeer.jpg" alt="reindeer" class="food">
                    <a name="retrieve" href="search.php" class="foodname">reindeer</a>
                </div>
                <div class="dairy-group">
                    <img src="./assets/images/animals/dairy/sheep.jpg" alt="sheep" class="food">
                    <a name="retrieve" href="search.php" class="foodname">sheep</a>
                </div>
            </div>

            <!--pets-->
            <div class="petss">
                <h6>pets</h6>
                <div class="pet-group">
                    <img src="./assets/images/animals/pets/cat.jpg" alt="cat" class="food">
                    <a name="retrieve" href="search.php" class="foodname">cat</a>
                </div>
                <div class="pet-group">
                    <img src="./assets/images/animals/pets/dog.jpg" alt="dog" class="food">
                    <a name="retrieve" href="search.php" class="foodname">dog</a>
                </div>
                <div class="pet-group">
                    <img src="./assets/images/animals/pets/parrot.jpg" alt="parrot" class="food">
                    <a name="retrieve" href="search.php" class="foodname">parrot</a>
                </div>
                <div class="pet-group">
                    <img src="./assets/images/animals/pets/pig.jpg" alt="pig" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pig</a>
                </div>
                <div class="pet-group">
                    <img src="./assets/images/animals/pets/rabbit.jpg" alt="rabbit" class="food">
                    <a name="retrieve" href="search.php" class="foodname">rabbit</a>
                </div>
            </div>

            <!--poultry-->
            <div class="poultry">
                <h6>Poultry and Birds</h6>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/duck.jpg" alt="duck" class="food">
                    <a name="retrieve" href="search.php" class="foodname">duck</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/fowl.jpg" alt="fowl" class="food">
                    <a name="retrieve" href="search.php" class="foodname">fowl</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/goose.jpg" alt="goose" class="food">
                    <a name="retrieve" href="search.php" class="foodname">goose</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/guineafowl.jpg" alt="guineafowl" class="food">
                    <a name="retrieve" href="search.php" class="foodname">guineafowl</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/ostrich.jpg" alt="ostrich" class="food">
                    <a name="retrieve" href="search.php" class="foodname">ostrich</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/peafowl.jpg" alt="peafowl" class="food">
                    <a name="retrieve" href="search.php" class="foodname">peafowl</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/pheasant.jpg" alt="pheasant" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pheasant</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/pigeon.jpg" alt="pigeon" class="food">
                    <a name="retrieve" href="search.php" class="foodname">pigeon</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/quail.jpg" alt="quail" class="food">
                    <a name="retrieve" href="search.php" class="foodname">quail</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/ratite.jpg" alt="ratite" class="food">
                    <a name="retrieve" href="search.php" class="foodname">ratite</a>
                </div>
                <div class="bird group">
                    <img src="./assets/images/animals/poultry/turkey.jpg" alt="turkey" class="food">
                    <a name="retrieve" href="search.php" class="foodname">turkey</a>
                </div>
            </div>
        </section>
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