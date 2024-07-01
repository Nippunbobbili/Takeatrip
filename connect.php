<?php
    $destination = $_POST['destination'];
    $members = $_POST['members'];
    $date = $_POST['journeydate'];
    $returndate = $_POST['returndate'];
    $details = $_POST['details'];

    if(!empty($destination) || !empty($members) || !empty($journeydate) || !empty($returndate) || !empty($returndate)){
        $host = "localhost";
        $dbUsername = "u294900751_nippunbobbili";
        $dbPassword = "Bobbilis@3";
        $dbname = "u294900751_takeatrip";
    

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_errno().')' .mysqli_connect_error());
    }
  }   else {
        $INSERT = "INSERT Into booking (destination, members, journeydate, returndate, details) values(?, ?, ?, ?, ?)";

         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssiis", $destination, $members, $journeydate, $returndate, $details);
         $stmt->execute(); 
         echo "New record Inserted Sucessfully";
    
    $stmt->close();
    $conn->close();
  } else {
    echo "All fields are required";
    die();
  }

?>