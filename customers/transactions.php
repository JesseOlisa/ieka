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
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="/ieka/assets/plugins/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <!--SECTION WITH OTHER INFORMATION-->
        <section class="main_section">
            <!--nav bar-->
            <div class="topnav">
                <nav>
                    <div class="account section">
                        <a href="account.php">account</a>
                    </div>
                    <div class="report section">
                        <a href="report.php" class="nav report">report</a>
                    </div>
                    <div class="enquiry section">
                        <a href="enquiry.php" class="nav enquiry">enquiry</a>
                    </div>
                    <div class="chat section">
                        <a href="chat-list.php" class="nav chat">chat</a>
                    </div>
                    <div class="transactions section">
                        <a href="transactions.php" class="nav transaction">transactions</a>
                    </div>
                    <div class="logout">
                        <a href="logout.php" class="nav-logout">logout</a>
                    </div>
                    <div class="index section" style="float:right;">
                        <a href="index.php">Home</a>
                    </div>
                </nav>
            </div>
            <div class="headnote">
                <h6>You get to see all your transactions on IEKA</h6>
                <hr id="under">
            </div>

            <!--the various categories in the courier section-->
            <div class="all_transaction">
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
                            <td>action</td>
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
    </body>
</html>