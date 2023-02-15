<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

    //check if the user is logged in
    if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    } else {
    }

    //get the details of the customer logged in
    $sql = "SELECT * FROM customers WHERE id = {$_SESSION['id']}";
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
    $scl = "SELECT * FROM transactions";
    $query = $database->query($scl);
    $total = mysqli_num_rows($query);

    
    //get the required number of pages
    $pages = ceil($total/$limit);
    
    //get the data from database with limit to every page
    //get all the data from the customer couriers table
    $sdl = "SELECT * FROM transactions WHERE customer_id = {$result['id']} ORDER BY id DESC LIMIT $offset, $limit";
    $fetch = $database->query($sdl);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>All your transactions on IEKA</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        
        <!-- LINKS TO STYLES -->
        <link href="/ieka/assets/css/dashboardlayout.css" rel="stylesheet" type="text/css">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">

        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
    <main class="dashboard--wrapper">
            <!-- DESKTOP SIDEBAR -->
            <div class="sidebar--wrapper">
                <div class="logo--container">
                    <h4>ieka</h4>
                </div>
                <ul class="sidebar-links--container">
                    <li><a href="index.php">Overview</a></li>
                    <li><a href="">Orders</a></li>
                    <li class="active"><a href="transactions.php">Transactions</a></li>
                    <li><a href="chat-list.php">Chats</a></li>
                    <li><a href="report.php">Report</a></li>
                    <li><a href="courier/dashboard.php">Courier</a></li>
                    <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
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
                            <li class="active"><a href="transactions.php">Transactions</a></li>
                            <li><a href="chat-list.php">Chats</a></li>
                            <li><a href="report.php">Report</a></li>
                            <li><a href="courier/dashboard.php">Courier</a></li>
                            <li><a href="pay.php?id=<?=$customer['id']?>">Payment</a></li>
                        </ul>
                    </div>
                </div>





                <!-- INSERT DASHBOARD CONTENT HERE -->
                <div class="dashboard--main--content">
                     <!--the various categories in the courier section-->
                    <div class="dashboard--intro">
                        <h6>You get to see all your transactions on IEKA</h6>
                        <hr id="under">
                    </div>
                    <div class="all_transaction">
                        <div class="table--container">

                            <!--The table with all the data-->
                               <table>
                                   <thead>
                                       <tr>
                                           <td>S/N</td>
                                           <td>Reference Number</td>
                                           <td>Customer</td>
                                           <td>farm id</td>
                                           <td>farmer</td>
                                           <td>status</td>
                                           <td>product</td>
                                       </tr>
                                   </thead>
                                   <tbody class="table_body">
                                       <tr>
                                           <?php
                                               $number = 1;
                                               while($transactions = $fetch->fetch_assoc()):
                                                   $sql = "SELECT * FROM farmers WHERE farm_id = '{$transactions['farm_id']}' LIMIT 1";
                                                   $farmers = $database->query($sql);
                                                   while($farmer = $farmers->fetch_assoc()):
                                           ?>    
                                               <td><?=$number++;?></td>
                                               <td><?=$transactions['transaction_reference'];?></td>
                                               <td><?=$result['first_name'] . ' '. $result['last_name'];?></td>
                                               <td><?=$transactions['farm_id'];?></td>
                                               <td><?=$farmer['first_name'].' '. $farmer['last_name']?></td>
                                               <td><?=$transactions['status'];?></td>
                                               <td id="show_details"><a href="view_transaction.php?transaction_no=<?=$transactions['id'];?>">View</a></td>         
       
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
                </div>
            </div>
    `</body>
    </html>