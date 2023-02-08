<?php
    //connecting to the database
    $database = new mysqli("localhost", "root", "", "ieka");
    //check connection

    if($database->connect_error) {
        die("error in connection". $database->connect_error);
    } else {
      // echo "connection successful";
    }
    

    //set all PHP error reporting in order to see every error in our script
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //get what was written in the search box from the database
    if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
      $search = $_GET['keyword'];          //get the name of the input field
      $search = htmlspecialchars($search);         //change html characters to their equivalent meanings

      $sql = "SELECT * FROM farmers WHERE agro_products LIKE '%{$search}%'";
      $result = $database->query($sql);

      if($result->num_rows > 0) {
        while($results = $result->fetch_array()) {
          echo "<li data-id='{$results['id']}'>
              <p class='farmer-name'><span>".$results['first_name']. " ".$results['last_name']. "</span><br>"
              .$results['agro_products']."</p> </li>";
        }
      } else {
        echo "<li>No results found</li>";
      }
    }

?>
