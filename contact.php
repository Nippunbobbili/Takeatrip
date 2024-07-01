<?php
$fullname = $_POST['fullname'];
$phnumber = $_POST['phnumber'];
$query = $_POST['query'];

if (!empty($fullname) && !empty($phnumber) && !empty($query)) {
    $host = "localhost";
    $dbUsername = "u294900751_nippunbobbili";
    $dbPassword = "Bobbilis@3";
    $dbname = "u294900751_takeatrip";

    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $INSERT = "INSERT INTO contact (fullname, phnumber,query) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $fullname, $phnumber, $query);
        
        if ($stmt->execute()) {
            echo "Your message has received Successfully";
            echo '<a href="index.html">   To Go back click the link </a>';
            
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
}
?>
