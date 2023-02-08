<?php
    //set all PHP error reporting in order to see every error in our script
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //connecting to the database
    include('./library/config.php');
    
    if(isset($_POST['search'])) {
        //validate the search form values
        $search = $_POST['find'];
        //set it to empty values
        $search = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = strip($_POST['search']);
        }
    }
    

    //strip unnecessary characters and backlashes in the search form
    function strip($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //set error messages for null required fields
    //set the fields to null empty values
    $firstErr = $lastErr = $addErr = $phErr = $emaErr  = $passErr = $stateErr = $resErr = $coErr = $rescErr = $genErr = "";

    //display the error message if it is not field
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //check if the firstname field is empty
        if(empty($_POST['firstname'])) {
            $firstErr = "First name is required";
        } else {
            $firstVal = validate($_POST['firstname']);
        }
        //check if the lastname field is empty
        if(empty($_POST['lastname'])) {
            $lastErr = "Lastname is required";
        } else {
            $lastVal = validate($_POST['lastname']);
        }
        //check if the address field is empty
        if(empty($_POST['address'])) {
            $addErr = "Address is required";
        } else {
            $addVal = validate($_POST['address']);
        }
        //check if the email field is empty
        if(empty($_POST['email'])) {
            $emaErr = "Email is required";
        } else {
            $emaVal = validate($_POST['email']);
            //validate the email
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emaErr = "Invalid email format";
            }
        }
        
        //check if the phone number field is empty
        if(empty($_POST['phone'])) {
            $phErr = "Phone number is required";
        } else {
            $phVal = validate($_POST['phone']);
        }
        //check if the password field is empty
        if(empty($_POST['password'])) {
            $passErr = "Password is required";
        } else {
            $passVal = validate($_POST['lastname']);
        }
        //check if the residence state field is empty
        if(empty($_POST['residence-state'])) {
            $resErr = "Residence state is required";
        } else {
            $resVal = validate($_POST['residence-state']);
        }
        //check if the state of origin field is empty
        if(empty($_POST['state-of-origin'])) {
            $stateErr = "State of origin is required";
        } else {
            $stateVal = validate($_POST['lastname']);
        }
        //check if the country of origin field is empty
        if(empty($_POST['country-of-origin'])) {
            $coErr = "Country of origin is required";
        } else {
            $coVal = validate($_POST['country-of-origin']);
        }
        //check if the residence country field is empty
        if(empty($_POST['residence-country'])) {
            $rescErr = "Residence country is required";
        } else {
            $rescVal = validate($_POST['residence-country']);
        }
    }

    //validate the register form and strip unnecessary backlashes and characters
    //set it to empty values
    $first = $last = $add = $number = $mail = $state = $reside = $live = $origin = $pword = $sex = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first = validate($_POST['firstname']);
        $last = validate($_POST['lastname']);
        $add = validate($_POST['address']);
        $sex = validate($_POST['gender']);
        $number = validate($_POST['phone']);
        $mail = validate($_POST['email']);
        $state = validate($_POST['state-of-origin']);
        $reside = validate($_POST['residence-state']);
        $live = validate($_POST['residence-country']);
        $origin = validate($_POST['country-of-origin']);
        $pword = validate($_POST['password']);
    }
 
    //strip unnecessary characters and backlashes in the search form
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //set the database time to that of the user
    $datetime = new DateTime();
    $timezone = new DateTimeZone('Africa/Lagos');
    $datetime->setTimezone($timezone);
    $created_at = $datetime->format('Y-m-d h:i:s');

    //get all the parameters in the form
    $firstname = mysqli_real_escape_string($database, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($database, $_POST['lastname']);
    $address = mysqli_real_escape_string($database, $_POST['address']);
    $phone = mysqli_real_escape_string($database, $_POST['phone']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['password']);
    $stateOfOrigin = mysqli_real_escape_string($database, $_POST['state-of-origin']);
    $residenceState = mysqli_real_escape_string($database, $_POST['residence-state']);
    $countryOfOrigin = mysqli_real_escape_string($database, $_POST['country-of-origin']);
    $residenceCountry = mysqli_real_escape_string($database, $_POST['residence-country']);
    $gender = mysqli_real_escape_string($database, $_POST['gender']);

    if(!empty($firstname) AND !empty($lastname) AND !empty($address) AND !empty($email) AND !empty($phone) AND !empty($gender) AND !empty($residenceState) AND !empty($residenceCountry) AND !empty($stateOfOrigin) AND !empty($countryOfOrigin) AND !empty($password)) {
        //check if the phone number has been used and insert the logic if not used 
        $phone_sql = "SELECT `phone` FROM admins WHERE phone = {$phone}";
        $phone_check = $database->query($phone_sql);
       
        //check if the phone number is in the farmers table
        $check_sql = "SELECT `phone` FROM farmers WHERE phone = {$phone}";
        $check = $database->query($check_sql);

        //check if the phone number is in the customers table
        $sql = "SELECT `phone` FROM customers WHERE phone = {$phone}";
        $result = $database->query($sql);

        //assign the status variable
        $status = 'Active';

        if($phone_check->num_rows < 1 && $check->num_rows < 1 && $result->num_rows < 1) {
            $sql = "INSERT INTO admins(`first_name`,`last_name`, `address`, `email`, `phone`, `gender`, `residence_state`, `residence_country`, `state_of_origin`, `country_of_origin`, `password`, `status`)
                VALUES('{$firstname}', '{$lastname}', '{$address}', '{$email}', '{$phone}', '{$gender}', '{$residenceState}', '{$residenceCountry}', '{$stateOfOrigin}', '{$countryOfOrigin}', '{$password}', '{$status}')";    
            $insert = $database->query($sql);
            if($insert) { 
                echo "success";
            } 
        } else  {
            echo "This phone number is already registered with us!";
        }
        
    } else {
        echo "All fields must be filled!";
    }


?>