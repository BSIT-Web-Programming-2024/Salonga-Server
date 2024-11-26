<?php
$servername = "localhost"; // Replace with your MySQL server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "userdb";        // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$contact = $_POST['contact'];

// Validate input
if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9]+$/', $contact)) {
    // Insert data into database
    $sql = "INSERT INTO user_info (email, contact) VALUES ('$email', '$contact')";
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid email or contact number.";
}

$conn->close();