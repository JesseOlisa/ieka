<?php
    //start the session
    session_start();

    //connect to the database
    include 'library/config.php';

     //if the sign-in button is clicked
     if(isset($_POST['submit'])) {
        //check if the login values are not empty
        if(!empty($_POST['phone']) AND !empty($_POST['password'])) {
            //get the desired parameters
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            //check if the details are correct from the admins table
            $sql = "SELECT * FROM farmers WHERE phone = '{$phone}' AND password = '{$password}' LIMIT 1";
            $result = $database->query($sql);
            if($result->num_rows > 0) {
                while($farmer = $result->fetch_assoc()) {
                    $_SESSION['id'] = $farmer['id'];
                    header("Location: ./farmers/index.php");
                }
            } else {
                echo "Incorrect details!";
            }
        } else {
            echo "All fields are required!";
        }
    }

?>