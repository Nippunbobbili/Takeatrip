<?php
// Database connection details
$servername = "localhost";
$username = "u294900751_nippunbobbili";
$password = "Bobbilis@3";
$dbname = "u294900751_takeatrip";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$destination = $_POST['destination'];
$members = $_POST['members'];
$journeydate = $_POST['journeydate'];
$returndate = $_POST['returndate'];
$details = $_POST['details'];

// Insert data into the database
$sql = "INSERT INTO booking (destination, members, journeydate, returndate, details)
        VALUES ('$destination', '$members', '$journeydate', '$returndate', '$details')";

if ($conn->query($sql) === TRUE) {
    echo "Booking details inserted successfully!";
    echo '<a href="index.html">To Go Back to home page Click The Link </a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
