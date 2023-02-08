<?php
    //start the session
    session_start();

    //include the database connection file
    include('./library/config.php');
    
    //if the sign-in button is clicked
    if(isset($_POST['submit'])) {
        //check if the login values are not empty
        if(!empty($_POST['phone']) AND !empty($_POST['password'])) {
            //get the desired parameters
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            //check if the details are correct from the admins table
            $sql = "SELECT * FROM admin WHERE phone = '{$phone}' AND password = '{$password}' LIMIT 1";
            $result = $database->query($sql);
            if($result->num_rows > 0) {
                while($admin = $result->fetch_assoc()) {
                    $_SESSION['id'] = $admin['id'];
                    header("Location: ./admins/authentication/dashboard.php");
                }
            }
        }
    }

?>