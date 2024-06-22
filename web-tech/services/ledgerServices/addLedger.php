<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'debit_credit_tracker';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entity = $_POST['entity'];

    // Construct the SQL query
    $sql = "INSERT INTO ledger (entity) VALUES ('$entity')";
    $result = $conn->query($sql);

    if($result == true){
        header('Location: /web-tech/index.php');
    }
}

// Close the connection
$conn->close();
