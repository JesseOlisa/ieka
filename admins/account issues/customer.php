<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../admin-login.php");
        exit();
    } else {
    }

    //get the details of the admin logged in
    $sql = "SELECT * FROM admin WHERE id = {$_SESSION['id']}";
    $result = $database->query($sql)->fetch_assoc();

    //assign a page number to the current page
    if(!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //number of records to be in a page
    $limit = 10;

    //offset value to get records for the next page and determine the initial page limit
    $offset = ((int)$page - (int)1) * $limit;
    $previous = (int)$page - 1;
    $next = (int)$page + 1;
    $adjacent = "2";

    //get the total number of pages for pagination
    $scl = "SELECT * FROM customer_account_issues";
    $query = $database->query($scl);
    $total = mysqli_num_rows($query);

    
    //get the required number of pages
    $pages = ceil($total/$limit);
    
    //get the data from database with limit to every page
    //get all the data from the customer couriers table
    $sdl = "SELECT * FROM customer_account_issues ORDER BY id DESC LIMIT $offset, $limit";
    $fetch = $database->query($sdl);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>All customer complaints on IEKA</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dash.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body><aside class="side">
            <div class="nomenclature">
                <h4><?=$result['first_name'].' '.$result['last_name'];?></h4>
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
        </aside>

        <!--Section bearing main information-->
        <div class="main_information">
            <!--Header-->
            <header class="kilo">
                <div class="greeting">
                    <h6>Hi! <?= $result['first_name'].' '.$result['last_name'];?></h6>
                </div>
                <nav class="head">
                    <div class="logout">
                        <a href="../authentication/logout.php">logout</a>
                    </div>
                </nav>
            </header>
            
            <!--SECTION WITH OTHER INFORMATION-->
            <section class="main_section">
          
                <div class="headnote">
                    <h6>All customer complaints on IEKA</h6>
                    <hr id="under">
                </div>

                <!--the various categories in the courier section-->
                <div class="all_complaints">
                    <!--The table with all the data-->
                    <table>
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>customer name</td>
                                <td>account issue</td>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                            <tr>
                        <?php
                            $number = 1;
                            while($customer_complaints = $fetch->fetch_assoc()):
                        ?>    
                                <td><?=$number++;?></td>
                                <td><?=$customer_complaints['customer_name'];?></td>
                                <td><?=$customer_complaints['account_issue'];?></td>
                            </tr>
                        <?php
                            endwhile;
                        ?>
                        </tbody>
                    </table>
                    <div class="page_numbers">
                    <?php
                        if($page > 1): ?>
                    
                        <a class="later" href="transactions.php?page=1">First Page</a>
                        <a class="later" href="transactions.php?page=<?=$previous;?>">Previous</a>
                    <?php
                        endif;
                        if($pages <= 10):
                            for($counter = 1; $counter <= $pages; $counter++):
                                if($counter == $page) {
                                    echo '<a class="current">'.$counter.'</a>';
                                } else {
                                    echo '<a class="later" href="transactions.php?page='.$counter.'">'.$counter.'</a>';
                                }
                            endfor;
                        elseif($pages >= 10):
                            if($page <= 4) {
                                for($counter = 1; $counter <= 8; $counter++) {
                                    if($counter == $page) {
                                        echo '<a class="current">'. $counter.'</a>';
                                    } else {
                                        echo '<a class="later" href="transactions.php?page='.$counter.'">'.$counter.'</a>';
                                    }
                                }
                                echo '<a class="dotted">..</a>';
                            } elseif($page > 4 && $page < ($pages - 4)) {
                                echo '<a class="later" href="transactions.php?page=1">1</a>';
                                echo '<a class="later" href="transactions.php?page=2"></a>';
                                echo '<a class="dotted">...</a>';
                                for($i = $page -$adjacent; $i <= $page + $adjacent; $i++) {
                                    if($i == $page) {
                                        echo '<a class="current">'.$i.'</a>';
                                    } else {
                                        echo '<a class="later" href="transactions.php?page='.$i.'">'.$i.'</a>';
                                    }
                                }
                            } else {
                                echo '<a class="later" href="transactions.php?page=1">1</a>';
                                echo '<a class="later" href="transactions.php?page=2"></a>';
                                echo '<a class="dotted">...</a>';
                                for($counter = $pages - 6; $counter <= $pages; $counter++) {
                                    if($counter == $page) {
                                        echo '<a class="current">'.$counter.'</a>';
                                    } else {
                                        echo '<a class="later" href="transactions.php?page='.$counter.'">'.$counter.'</a>';
                                    }
                                }
                            }
                        endif;
                        if($page <= $total): ?>
                    
                        <a class="later" href="transactions.php?page=<?=$next;?>">Next</a></span>
                        <a class="later" href="transactions.php?page=<?=$total;?>">Last</a></span>
                    <?php
                        endif;
                    ?>
                    </div>
                </div>
            
            </section>
            <script src="../../assets/javascript/side.js"></script>
    </body>
</html>