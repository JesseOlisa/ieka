<?php
    //set all PHP error reporting in order to see every error in our script
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //connecting to the database
    include 'library/config.php';

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
    $firstErr = $lastErr = $addErr = $phErr = $emaErr = $passErr = $stateErr = $resErr = $rescErr = $genErr  = "";

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
        //check if the residence state field is empty
        if(empty($_POST['residence-state'])) {
            $resErr = "Residence state is required";
        } else {
            $resVal = validate($_POST['residence-state']);
        }
        //check if the residence country field is empty
        if(empty($_POST['residence-country'])) {
            $rescErr = "Residence country is required";
        } else {
            $rescVal = validate($_POST['residence-country']);
        }
        //check if the password field is empty
        if(empty($_POST['password'])) {
            $passErr = "Password is required";
        } else {
            $passVal = validate($_POST['password']);
        }
        if(empty($_POST['gender'])) {
            $genErr = "Gender is required";
        } else {
            $genVal = validate($_POST['gender']);
        }
    }

    //validate the register form and strip unnecessary backlashes and characters
    //set it to empty values
    $first = $last = $add = $number = $mail = $state = $passcode = $reside = $live = $sex = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first = validate($_POST['firstname']);
        $last = validate($_POST['lastname']);
        $add = validate($_POST['address']);
        $sex = validate($_POST['gender']);
        $number = validate($_POST['phone']);
        $mail = validate($_POST['email']);
        $reside = validate($_POST['residence-state']);
        $live = validate($_POST['residence-country']);
        $passcode = validate($_POST['password']);
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
    $residenceState = mysqli_real_escape_string($database, $_POST['residence-state']);
    $residenceCountry = mysqli_real_escape_string($database, $_POST['residence-country']);
    $gender = mysqli_real_escape_string($database, $_POST['gender']);
    
    if(!empty($firstname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($email) && !empty($passcode) && !empty($residenceState) && !empty($residenceCountry) && !empty($gender)) {
        //check to see user upload file
        if(isset($_FILES['picture'])) {
            //get the image name, type and temporary name
            $imageName = $_FILES['picture']['name'];
            $imageType = $_FILES['picture']['type'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            //explode the image and get the file extension like jpg, png
            $imgExplode = explode('.', $imageName);
            $extension = end($imgExplode);

            $extensions = ['jpeg', 'png', 'gif', 'jpg'];
            if(in_array($extension, $extensions) === true) {
                //get the time 
                $time = time();
                $image = $time.$imageName;
            
                if(move_uploaded_file($tmp_name, './assets/images/Customers/'.$image)) {//if the storage is created for the image
                    $status = 'Active';

                    //check if the phone number has been used by the admin and insert the logic if not used 
                    $phone_sql = "SELECT `phone` FROM admins WHERE phone = {$phone}"; 
                    $phone_check = $database->query($phone_sql);
       
                    //check if the phone number is in the farmers table
                    $check_sql = "SELECT `phone` FROM farmers WHERE phone = {$phone}";
                    $check = $database->query($check_sql);

                    //check if the phone number is in the customers table
                    $sql = "SELECT `phone` FROM customers WHERE phone = {$phone}"; 
                    $result = $database->query($sql);
                
                    if($phone_check->num_rows < 1 && $check->num_rows < 1 && $result->num_rows < 1) {
                        $sql = "INSERT INTO customers(`first_name`,`last_name`, `address`, `email`, `password`, `phone`, `gender`, `residence_state`, `residence_country`, `picture`, `status`, `modified_at`)
                            VALUES('{$firstname}', '{$lastname}', '{$address}', '{$email}', '{$password}', '{$phone}', '{$gender}', '{$residenceState}', '{$residenceCountry}', '{$image}', '{$status}', '{$created_at}')";    
                        $insert = $database->query($sql);
                        if($insert) { 
                            echo "success";
                        }
                    } else {
                        echo "This phone number is already registered with us!";
                    }
                } else {
                    echo "Please submit an image of yourself!";
                }
            
            } else {
                echo "All fields must be filled";
            }

        } else {
            echo "All fields must be filled!";
        }
    
    }

?>