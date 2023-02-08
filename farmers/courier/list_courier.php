<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../farmer-login.php");
        exit();
    } else {
    }

    //get the details of the farmer logged in
    $sql = "SELECT * FROM farmers WHERE id = {$_SESSION['id']}";
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
    $scl = "SELECT * FROM customer_couriers";
    $query = $database->query($scl);
    $total = mysqli_num_rows($query);
    
    //get the required number of pages
    $pages = ceil($total/$limit);
    
    //get the data from database with limit to every page
    //get all the data from the customer couriers table
    $sdl = "SELECT * FROM customer_couriers WHERE farmer_id = {$result['farm_id']} ORDER BY id DESC LIMIT $offset, $limit";
    $fetch = $database->query($sdl);


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>All your courier on IEKA</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!---SIDEBAR WITH COURIER SECTIONS-->
        <aside class="side">
            <div class="nomenclature">
                <h4><?=$result['first_name'].' '.$result['last_name'];?></h4>
                <p id="identity">Farmer</p>
                <hr>
            </div>
            <div class="menu">
                <a href="dashboard.php" id="dashboard">dashboard</a>
            </div>
            <div class="menu">
                <span class="courier-btn">courier</span>
            </div>
            <div class="courier_details" style="display:block;">
                <a href="list_courier.php">all courier</a>
                <a href="in_transit.php">on transit</a>
                <a href="delivered.php">delivered</a>
            </div>
            <div class="menu">
                <a href="track_courier.php" id="track">Track courier</a>
            </div>
        </aside>

        <!--SECTION WITH OTHER INFORMATION-->
        <section class="main_information">
            <!--nav bar-->
            <div class="topnav">
                <nav>
                    <div class="account section">
                        <a href="../account.php">account</a>
                    </div>
                    <div class="report section">
                        <a href="../report.php" class="nav report">report</a>
                    </div>
                    <div class="enquiry section">
                        <a href="../enquiry.php" class="nav enquiry">enquiry</a>
                    </div>
                    <div class="chat section">
                        <a href="../chat-list.php" class="nav chat">chat</a>
                    </div>
                    <div class="transactions section">
                        <a href="../transactions.php" class="nav transaction">transactions</a>
                    </div>
                    <div class="logout">
                        <a href="logout.php" class="nav-logout">logout</a>
                    </div>
                    <div class="index section" style="float:right;">
                        <a href="../index.php">Home</a>
                    </div>
                </nav>
            </div>

            <div class="headnote">
                <h6>You get to see all your courier on IEKA</h6>
                <hr id="under">
            </div>

            <!--the various categories in the courier section-->
            <div class="all_courier">
                <!--The table with all the data-->
                <table>
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Reference Number</td>
                            <td>Sender name</td>
                            <td>recipient name</td>
                            <td>status</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        <tr>
                    <?php
                        $number = 1;
                        while($couriers = $fetch->fetch_assoc()):
                            $sql = "SELECT * FROM farmers WHERE farm_id = '{$couriers['farmer_id']}' LIMIT 1";
                            $farmers = $database->query($sql);
                            while($farmer = $farmers->fetch_assoc()):
                    ?>    
                            <td><?=$number++;?></td>
                            <td><?=$couriers['reference'];?></td>
                            <td><?=$couriers['customer_name'];?></td>
                            <td><?=$couriers['recipient_name'];?></td>
                            <td><?=$couriers['status'];?></td>
                            <td id="show_details"><a href="view.php?courier_no=<?=$couriers['reference'];?>">View</a></td>         

                        </tr>
                    <?php
                            endwhile;
                        endwhile;
                    ?>
                    </tbody>
                </table>
                <div class="page_numbers">
                <?php
                    $counter;
                    if($page > 1): ?>
                    
                    <a class="later" href="list_courier.php?page=1">First Page</a>
                    <a class="later" href="list_courier.php?page=<?=$previous;?>">Previous</a>
                <?php
                    endif;
                    if($pages <= 10):
                        for($counter = 1; $counter <= $pages; $counter++):
                            if($counter == $page) {
                                echo '<a class="current">'.$counter.'</a>';
                            } else {
                                echo '<a class="later" href="list_courier.php?page='.$counter.'">'.$counter.'</a>';
                            }
                        endfor;
                    elseif($pages >= 10):
                        if($page <= 4) {
                            for($counter = 1; $counter <= 8; $counter++) {
                                if($counter == $page) {
                                    echo '<a class="current">'. $counter.'</a>';
                                } else {
                                    echo '<a class="later" href="list_courier.php?page='.$counter.'">'.$counter.'</a>';
                                }
                            }
                            echo '<a class="dotted">..</a>';
                        } elseif($page > 4 && $page < ($pages - 4)) {
                            echo '<a class="later" href="list_courier.php?page=1">1</a>';
                            echo '<a class="later" href="list_courier.php?page=2"></a>';
                            echo '<a class="dotted">...</a>';
                            for($counter = $page -$adjacent; $counter <= $page + $adjacent; $counter++) {
                                if($counter == $page) {
                                    echo '<a class="current">'.$counter.'</a>';
                                } else {
                                    echo '<a class="later" href="list_courier.php?page='.$counter.'">'.$counter.'</a>';
                                }
                            }
                        } else {
                            echo '<a class="later" href="list_courier.php?page=1">1</a>';
                            echo '<a class="later" href="list_courier.php?page=2"></a>';
                            echo '<a class="dotted">...</a>';
                            for($counter = $pages - 6; $counter <= $pages; $counter++) {
                                if($counter == $page) {
                                    echo '<a class="current">'.$counter.'</a>';
                                } else {
                                    echo '<a class="later" href="list_courier.php?page='.$counter.'">'.$counter.'</a>';
                                }
                            }
                        }
                    endif;
                    if($page <= $total): ?>
                    
                    <a class="later" href="list_courier.php?page=<?=$next;?>">Next</a></span>
                    <a class="later" href="list_courier.php?page=<?=$total;?>">Last</a></span>
                <?php
                    endif;
                ?>
                <span style="display:none;"><?=$page;?></span>
                </div>
            </div>
        </section>
        <script src="dropdown.js"></script>
    </body>
</html>