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
    $ledger_id = $_POST['ledger_id'];
    $is_credit_or_debit = $_POST['is_credit_or_debit'];
    $amount = $_POST['amount'];

    // Construct the SQL query
    $sql = "INSERT INTO transaction (ledger_id, is_credit_or_debit, amount) VALUES ('$ledger_id', '$is_credit_or_debit', '$amount')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header('Location: /web-tech/transaction.php');
        exit(); // Ensure no further code is executed
    } 
}

// Close the connection
$conn->close();