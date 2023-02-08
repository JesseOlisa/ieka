<?php
    session_start();

    //connecting to the database
    include '../library/config.php';

     //check if the user is logged in
     if(!isset($_SESSION['id'])) {
        header("Location: ../customer-login.php");
        exit();
    }

    $list = '';
    
    //$search = $_GET['keyword'];          //get the name of the input field
    //$search = htmlspecialchars($search);         //change html characters to their e

    $search = $_POST['search'];
    //get the name of the farmer who has the specific farm id
    $sql = "SELECT * FROM farmers WHERE farm_id = '{$search}'";
    $result = $database->query($sql);
    if($result->num_rows > 0) {
        while($farmer = $result->fetch_assoc()) {
           $list = '<div class="person">
                        <a href="chat.php?farmid='.$farmer['farm_id'].'">
                        <div class="chat-content">
                            <div class="chat-details">
                                <span>'.$farmer['first_name'].' '. $farmer['last_name']. '</span><br>
                                <p>'.$farmer['agro_products'].'</p>
                            </div>
                        </div>
                        <div class="status-dot"><img src="" alt=""></div>
                        </a>
                    </div>'; 
        }
        echo $list;
    } else {
        echo '<div id="error">Farmer not found!</div>';
    }

?>