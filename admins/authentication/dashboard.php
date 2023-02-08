<?php
    session_start();

    //set all PHP error reporting in order to see every error in our script
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //connecting to the database
    include '../../library/config.php';
    //check connection

    if($database->connect_error) {
        die("error in connection". $database->connect_error);
    } else {
      // echo "connection successful";
    }
    
    if(!isset($_SESSION['id'])) {
       header("Location:../../admin-login.php");
    }
    
    //get the name of the particular admin logged in
    $sql = "SELECT * FROM admin WHERE id = '{$_SESSION['id']}'";
    $admin = $database->query($sql)->fetch_assoc();

    //get the data from other tables
    $sql = "SELECT * FROM admin";
    $admins = $database->query($sql);

    $sql = "SELECT * FROM announcements";
    $notices = $database->query($sql);

    $sql = "SELECT * FROM farmers";
    $farmers = $database->query($sql); 

    $sql = "SELECT * FROM customers";
    $customers = $database->query($sql);

    $sql = "SELECT * FROM deliverers";
    $deliverers = $database->query($sql);

    $sql = "SELECT * FROM users";
    $users = $database->query($sql);

    $sql = "SELECT * FROM reports";
    $reports = $database->query($sql);

    /*$sql = "SELECT * FROM careers";
    $careers = $database->query($sql);*/
    
    $sql = "SELECT * FROM investors";
    $investors = $database->query($sql);

    /*$sql = "SELECT * FROM adverts";
    $adverts = $database->query($sql);*/
    
    $sql = "SELECT * FROM desk_offices";
    $desks = $database->query($sql);
    
    
    $sql = "SELECT * FROM deliveries";
    $deliveries = $database->query($sql);
    
    $sdl = "SELECT COUNT(*) FROM customer_account_issues UNION SELECT COUNT(*) FROM farmer_account_issues";
    $account_issues = $database->query($sdl);

    $sql = "SELECT * FROM reviews";
    $reviews = $database->query($sql);
    
    $sql = "SELECT * FROM announcements";
    $announcements = $database->query($sql);


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Everything within Ieka</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dash.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <aside class="side">
            <div class="nomenclature">
                <h4><?=$admin['first_name'].' '.$admin['last_name'];?></h4>
                <p id="identity">Admin</p>
                <hr>
            </div>
            <div class="menu">
                <a href="dashboard.php" class="menu-btn">dashboard</a>
            </div>

            <!--Couriers-->
            <div class="menu">
                <span class="menu-btn">courier</span>
                <div class="details">
                    <a href="../courier/new_courier.php">new courier</a>
                    <a href="../courier/list_courier.php">all courier</a>
                    <a href="../courier/in_transit.php">on transit</a>
                    <a href="../courier/delivered.php">delivered</a>
                    <a href="../courier/track_courier.php">track courier</a>
                </div>
            </div>

            <!--Users-->
            <div class="menu">
                <span class="menu-btn">users</span>
                <div class="details">
                    <a href="../users/list_users.php">all users</a>
                    <a href="../users/new_user.php">add new user</a>
                </div>
            </div>

            <!--Finances-->
            <div class="menu">
                <a href="../finances/transactions.php" class="menu-btn">transactions</a>
            </div>

            <!--Investors-->
            <div class="menu">
                <span class="menu-btn">investors</span>
                <div class="details">
                    <a href="../investors/investors.php">all Investors</a>
                    <a href="../investors/edit.php">edit</a>
                </div>
            </div>

            <!--Reports-->
            <div class="menu">
                <a href="../reports/reports.php" class="menu-btn">reports</a>
            </div>

            <!--Account issues-->
            <div class="menu">
                <span class="menu-btn">account issues</span>
                <div class="details">
                    <a href="../account issues/customer.php">Customer</a>
                    <a href="../account issues/farmer.php">farmer</a>
                </div>
            </div>
            
            <!--Reviews-->
            <div class="menu">
                <a href="../reviews/reviews.php" class="menu-btn">reviews</a>
            </div>

            <!--Farmers-->
            <div class="menu">
                <span class="menu-btn">farmers</span>
                <div class="details">
                    <a href="../farmers/farmers.php">all farmers</a>
                    <a href="../farmers/new_farmer.php">add farmer</a>
                </div>
            </div>

            <!--Customers-->
            <div class="menu">
                <span class="menu-btn">customers</span>
                <div class="details">
                    <a href="../customers/customers.php">all customers</a>
                    <a href="../customers/new_customer.php">add customer</a>
                </div>
            </div>

            <!--Careers-->
            <div class="menu">
                <span class="menu-btn">Careers</span>
                <div class="details">
                    <a href="../careers/careers.php">all careers</a>
                    <a href="../careers/new_career.php">add career</a>
                </div>
            </div>

            <!--desk offices-->
            <div class="menu">
                <span class="menu-btn">desk offices</span>
                <div class="details">
                    <a href="../desk offices/offices.php">desk offices</a>
                    <a href="../desk offices/new_office.php">add office</a>
                </div>
            </div>

            <!--Deliverers-->
            <div class="menu">
                <span class="menu-btn">deliverers</span>
                <div class="details">
                    <a href="../deliverers/service.php">deliverers</a>
                    <a href="../deliverers/new_service.php">add deliverer</a>
                </div>
            </div>

            <!--Announcements-->
            <div class="menu">
                <span class="menu-btn">announcements</span>
                <div class="details">
                    <a href="../announcements/index.php">notices</a>
                    <a href="../announcements/notice.php">new notice</a>
                </div>
            </div>
        </aside>

        <div class="main_information">
            <!--Header-->
            <header class="kilo">
                <div class="greeting">
                    <h6>Hi! <?= $admin['first_name'].' '.$admin['last_name'];?></h6>
                </div>
                <nav class="head">
                    <div class="logout">
                        <a href="logout.php">logout</a>
                    </div>
                </nav>
            </header>

            <!--Section bearing information-->
            <section class="start">
                <div class="total">
                    <div>
                        <a href="./reviews/index.php">reviews<br><?=$reviews->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./announcements/index.php">announcements<br><?=$announcements->num_rows;?></a>
                    </div>
                    <div>
                        <a href="#">administrator<br><?=$admins->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./farmers/index.php">farmers<br><?=$farmers->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./customers/index.php">customers<br><?=$customers->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./drivers/index.php">drivers<br><?=$deliverers->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./users/index.php">users<br><?=$users->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./reports/index.php">reports<br><?=$reports->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./investors/index.php">investors<br><?=$investors->num_rows;?></a>
                    </div>    

                    <div>
                        <a href="./desk offices/index.php">desk offices<br><?=$desks->num_rows;?></a>
                    </div>

                    <div>
                        <a href="./finances/index.php">finances<br></a>
                    </div>

                    <div>
                        <a href="./account-issues/index.php">account issues<br><?=$account_issues->num_rows;?></a>                        </div>
                    </div>

                   
                </div>
            </section>

            <footer class="bottom">
                <div class="second part">
                    <!--social media section-->
                    <div class="social-media">
                        <div class="twitter media">
                            <a href="#"><img src="../../assets/icons/png/512/social-twitter-outline.png" alt="twitter"></a>
                        </div>
                        <div class="instagram media">
                            <a href="#"><img src="../../assets/icons/png/512/social-instagram-outline.png" alt="instagram"></a>
                        </div>
                        <div class="linkedIn media">
                            <a href="#"><img src="../../assets/icons/png/512/social-linkedin-outline.png" alt="linkedIn"></a>
                        </div>
                        <div class="facebook media">
                            <a href="#"><img src="../../assets/icons/png/512/social-facebook-outline.png" alt="facebook"></a>
                        </div>
                    </div>

                    <!--Company reserved rights-->
                    <div class="reserved">
                        <p class="company">
                        &copy all rights reserved. ieka enterprises. or its affliates
                        </p>
                    </div>
            </footer>
        </div>
        <script src="../../assets/javascript/side.js"></script>
    </body>
</html>