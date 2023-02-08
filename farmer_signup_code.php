<?php 


    //connecting to the database
    $database = new mysqli("localhost", "root", "", "ieka");
    //check connection

    if($database->connect_error) {
        die("error in connection". $database->connect_error);
    } else {
      // echo "connection successful";
    }

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
    $firstErr = $lastErr = $addErr = $phErr = $emaErr = $picErr = $passErr = $stateErr = $resErr = $rescErr = $coErr = $genErr = $fasErr = $faaErr = $facErr = $agro = "";

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
        //check if the farm state field is empty
        if(empty($_POST['farm-state'])) {
            $fasErr = "Farm state is required";
        } else {
            $fasVal = validate($_POST['farm-state']);
        }
        //check if the phone number field is empty
        if(empty($_POST['phone'])) {
            $phErr = "Phone number is required";
        } else {
            $phVal = validate($_POST['phone']);
        }
        //check if the farm address field is empty
        if(empty($_POST['farm-address'])) {
            $faaErr = "Farm address is required";
        } else {
            $fasVal = validate($_POST['farm-address']);
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
            $stateVal = validate($_POST['state-of-origin']);
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
        //check if the farm country field is empty
        if(empty($_POST['farm-country'])) {
            $facErr = "Farm country is required";
        } else {
            $facVal = validate($_POST['farm-country']);
        }
        //check if the products field is empty
        if(empty($_POST['products'])) {
            $agro = "Agro products are required";
        } else {
            $agroVal = validate($_POST['products']);
        }
        //check if the password field is empty
        if(empty($_POST['password'])) {
            $passErr = "Password is required";
        } else {
            $passVal = validate($_POST['password']);
        }
        if(empty($_POST['picture'])) {
            $picErr = "File is required!";
        } else {
            $picVal = validate($_POST['picture']);
        }
    }

    //validate the register form and strip unnecessary backlashes and characters
    //set it to empty values
    $first = $last = $add = $number = $mail = $picture = $state = $passcode = $reside = $live = $origin = $farmS = $farmA = $farmC = $agric = $sex = "";
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
        $farmS = validate($_POST['farm-state']);
        $farmA = validate($_POST['farm-address']);
        $farmC = validate($_POST['farm-country']);
        $agric = validate($_POST['products']);
        $passcode = validate($_POST['password']);
    }
 
    //strip unnecessary characters and backlashes in the search form
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //get all the parameters in the form
    $firstname = mysqli_real_escape_string($database, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($database, $_POST['lastname']);
    $address = mysqli_real_escape_string($database, $_POST['address']);
    $phone = mysqli_real_escape_string($database, $_POST['phone']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['password']);
    $farmState = mysqli_real_escape_string($database, $_POST['farm-state']);
    $farmAddress = mysqli_real_escape_string($database, $_POST['farm-address']);
    $farmCountry = mysqli_real_escape_string($database, $_POST['farm-country']);
    $agro = mysqli_real_escape_string($database, $_POST['products']);
    $stateOfOrigin = mysqli_real_escape_string($database, $_POST['state-of-origin']);
    $residenceState = mysqli_real_escape_string($database, $_POST['residence-state']);
    $countryOfOrigin = mysqli_real_escape_string($database, $_POST['country-of-origin']);
    $residenceCountry = mysqli_real_escape_string($database,$_POST['residence-country']);
    $gender = mysqli_real_escape_string($database, $_POST['gender']);

    //set the database time to that of the user
    $datetime = new DateTime();
    $timezone = new DateTimeZone('Africa/Lagos');
    $datetime->setTimezone($timezone);
    $created_at = $datetime->format('Y-m-d h:i:s');

    if(!empty($firstname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($email) && !empty($passcode) && !empty($farmState) && !empty($farmAddress) && !empty($farmCountry) && !empty($agro) && !empty($stateOfOrigin) && !empty($countryOfOrigin) && !empty($residenceState) && !empty($residenceCountry) && !empty($gender)) {
       
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

                if(move_uploaded_file($tmp_name, './assets/images/Farmers/'.$image)) {//if the storage is created for the image
                    $status = 'Active';

                    //check if the phone number has been used and insert the logic if not used 
                    $phone_sql = "SELECT `phone` FROM admins WHERE phone = {$phone}";
                    $phone_check = $database->query($phone_sql); //var_dump($phone_check);die;

                    //check if the phone number is in the farmers table
                    $check_sql = "SELECT `phone` FROM farmers WHERE phone = {$phone}";
                    $check = $database->query($check_sql);

                    //check if the phone number is in the customers table
                    $sql = "SELECT `phone` FROM customers WHERE phone = {$phone}";
                    $result = $database->query($sql);

                    $randomId = rand(10, 1000);
                    $farmId = $randomId;

                    if($phone_check->num_rows < 1 && $check->num_rows < 1 && $result->num_rows < 1) {
                        $sql = "INSERT INTO farmers(`first_name`,`last_name`, `address`, `email`, `password`, `phone`, `gender`, `state_of_origin`, `residence_state`, `residence_country`, `country_of_origin`, `farm_state`, `farm_id`, `farm_country`, `farm_address`, `agro_products`, `picture`, `status`, `modified_at`)
                            VALUES('{$firstname}', '{$lastname}', '{$address}', '{$email}', '{$password}', '{$phone}', '{$gender}', '{$stateOfOrigin}', '{$residenceState}', '{$residenceCountry}', '{$countryOfOrigin}', '{$farmState}', '{$farmId}', '{$farmCountry}', '{$farmAddress}', '{$agro}', '{$image}', '{$status}', '{$created_at}')";    
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