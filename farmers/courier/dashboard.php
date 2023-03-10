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

    //get all the courier that the farmer is involved with
    $srl = "SELECT * FROM customer_couriers WHERE farmer_id = {$result['farm_id']}";
    $query = $database->query($srl);
    $courier_no = mysqli_num_rows($query);

    //get the number of courier with status 'order placed'
    $sdl = "SELECT * FROM customer_couriers WHERE (farmer_id = {$result['farm_id']} AND status = 'Order placed')";
    $record = $database->query($sdl);
    $new_courier_no = mysqli_num_rows($record);

    //get the number of courier with status 'delivered'
    $skl = "SELECT * FROM customer_couriers WHERE (farmer_id = {$result['farm_id']} AND status = 'Delivered')";
    $feedback = $database->query($skl);
    $delivered_no = mysqli_num_rows($feedback);

    //get the number of courier with status 'On transit'
    $sgl = "SELECT * FROM customer_couriers WHERE (farmer_id = {$result['farm_id']} AND status = 'On transit')";
    $trans = $database->query($sgl);
    $transit_no = mysqli_num_rows($trans);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Ieka's delivery system</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/courier.css" type="text/css" rel="stylesheet">
        <link href="/ieka/assets/css/all.min.css" rel="stylesheet" type="text/css">
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
            <div class="courier_details">
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
            </div>

            <!--the various categories in the courier section-->
            <div class="niche">
                <div>
                    <p class="descript"><?=$courier_no;?></p>
                    <p class="description">all courier</p>
                </div>
                <div>
                    <p class="descript"><?=$delivered_no;?></p>
                    <p class="description">Delivered</p>
                </div>
                <div>
                    <p class="descript"><?=$new_courier_no;?></p>
                    <p class="description">new courier</p>
                </div>
                <div class="second_row">
                    <p class="descript"><?=$transit_no;?></p>
                    <p class="description">on transit</p>
                </div>
            </div>
        </section>
        <script src="dropdown.js"></script>
    </body>
</html>