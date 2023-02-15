<?php
    session_start();

    //connecting to the database
    include '../../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../../customer-login.php");
        exit();
    } else {
    }

    //get the details of the farmer logged in
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
    $result = $database->query($sql)->fetch_assoc();

    //get the number of couriers with status 'delivered'
    $skl = "SELECT * FROM customer_couriers WHERE (customer_id = {$result['id']} AND status = 'Delivered')";
    $feedback = $database->query($skl);
    $delivered_no = mysqli_num_rows($feedback);

    //get the number of couriers with status 'On transit'
    $sgl = "SELECT * FROM customer_couriers WHERE (customer_id = {$result['id']} AND status = 'On transit')";
    $trans = $database->query($sgl);
    $transit_no = mysqli_num_rows($trans);

    //get the number of couriers with status 'Order placed'
    $sml = "SELECT * FROM customer_couriers WHERE (customer_id = {$result['id']} AND status = 'Order placed')";
    $order_placed = $database->query($sml);
    $order_no = mysqli_num_rows($order_placed);

    //get the number of couriers the customer has
    $snl = "SELECT * FROM customer_couriers WHERE customer_id = {$result['id']}";
    $recond = $database->query($snl);
    $courier_no = mysqli_num_rows($recond);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Ieka's delivery system</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/fb151ec1c7.js" crossorigin="anonymous" defer></script>
        <!-- JAVASCRIPT -->
        <script src="../assets/javascript/dashboardLayout.js" defer></script>

    </head>
    <body>
    <main class="dashboard--wrapper">
            <!-- DESKTOP SIDEBAR -->
            <div class="sidebar--wrapper">
                <div class="logo--container">
                    <h4>ieka</h4>
                </div>
                <ul class="sidebar-links--container">
                    <li><a href="../index.php">Overview</a></li>
                    <li><a href="">Orders</a></li>
                    <li><a href="../transactions.php">Transactions</a></li>
                    <li><a href="../chat-list.php">Chats</a></li>
                    <li><a href="../report.php">Report</a></li>
                    <li class="active"><a href="courier/dashboard.php">Courier</a></li>
                    <li><a href="../pay.php?id=<?=$customer['id']?>">Payment</a></li>
                </ul>
            </div>
            <div class="content-wrapper">
                <!-- DESKTOP NAVBAR -->
                <div class="dashboard--navbar">
                    <div class="menu--container">
                        <div role="button" class="menu--btn"></div>
                    </div>
                    <div class="mobile-logo--container">
                        <h4>ieka</h4>
                    </div>
                    <div class="search-navbar">
                        <form action="chatList.php" class="search-list" method="POST">
                            <label for="search" class="search--container">
                                <input type="text" autocomplete="on" placeholder="Which agro product do you want?" id="search" class="search-bar" name="find">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </label>
                            <ul class="search-list" id="search-list" style="display: none;"></ul>
                        </form>
                    </div>
                    <div class="logout--container">
                        <button class="btn btn-green">
                            <a href="logout.php">Logout</a>
                        </button>
                    </div>
                </div>
               
                <!-- MOBILE SIDEBAR -->
                <div class="mobile-navbar--container">
                    <!-- MOBILE SIDEBAR  -->
                    <div>
                        <ul class="mobile-sidebar-links-container">
                            <li><a href="">Overview</a></li>
                            <li><a href="">Orders</a></li>
                            <li><a href="transactions.php">Transactions</a></li>
                            <li><a href="chat-list.php">Chats</a></li>
                            <li><a href="report.php">Report</a></li>
                            <li class="active"><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                    <div class="courier--nav-links--container">
                            <a href="list_courier.php">
                                <button type="button" class="btn btn-green disabled">
                                    Sell all courier
                                </button></a>
                        <div class="options--container">
                            <a href="new_courier.php">
                                <button type="button" class="btn btn-green">
                                    New courier
                                </button>
                            </a>
                            <a href="track_courier.php" id="track">
                                <button type="button" class="btn btn-green">
                                    Track courier
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- COURIER CONTENTS -->
                    <div class="all_courier">
                <!--The table with all the data-->
                <div class="table--container">

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
                </div>
                <div class="page_numbers">
                <?php
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
                            for($i = $page -$adjacent; $i <= $page + $adjacent; $i++) {
                                if($i == $page) {
                                    echo '<a class="current">'.$i.'</a>';
                                } else {
                                    echo '<a class="later" href="list_courier.php?page='.$i.'">'.$i.'</a>';
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
                </div>
            </div>
                </div>
            </div>
        </main>
        <script src="dropdown.js"></script>
    </body>
    </html>

    
    
    <!---SIDEBAR WITH COURIER SECTIONS-->
    <!-- <aside class="side">
        <div class="nomenclature">
            <h4><?=$result['first_name'].' '.$result['last_name'];?></h4>
            <p id="identity">Customer</p>
            <hr>
        </div>
        <div class="menu">
            <a href="dashboard.php" id="dashboard">dashboard</a>
        </div>
        <div class="menu">
            <span class="courier-btn">courier</span>
        </div>
        <div class="courier_details">
            <a href="new_courier.php">new courier</a>
            <a href="list_courier.php">all courier</a>
            <a href="in_transit.php">on transit</a>
            <a href="delivered.php">delivered</a>
        </div>
        <div class="menu">
            <a href="track_courier.php" id="track">Track courier</a>
        </div>
    </aside> -->

    <!--SECTION WITH OTHER INFORMATION-->
    <!-- <section class="main_information">
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
                    <a href="../logout.php" class="nav-logout">logout</a>
                </div>
                <div class="index section" style="float:right;">
                    <a href="../index.php">Home</a>
                </div>
            </nav>
        </div>

        <div class="headnote">
            <h6>Be incharge of all your courier activities on IEKA</h6>
            <hr id="under">
        </div> -->

        <!--the various categories in the courier section-->
        <!-- <div class="niche">
            <div>
                <p class="descript"><?=$courier_no;?></p>
                <p class="description">all courier</p>
            </div>
            <div>
                <p class="descript"><?=$delivered_no;?></p>
                <p class="description">Delivered</p>
            </div>
            <div>
                <p class="descript"><?=$order_no;?></p>
                <p class="description">new courier</p>
            </div>
            <div class="second_row">
                <p class="descript"><?=$transit_no;?></p>
                <p class="description">on transit</p>
            </div>
        </div> -->
    <!-- </section> -->