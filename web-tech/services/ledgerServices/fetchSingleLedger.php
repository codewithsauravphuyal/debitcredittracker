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

// Check if the ID parameter is provided
if (isset($_GET['ledger_id'])) {
    $ledger_id = intval($_GET['ledger_id']);

    // Prepare the SQL query to fetch the ledger entry
    $fetch_ledger_query = "SELECT * FROM `ledger` WHERE `id` = $ledger_id";
    $fetch_ledger_result = $conn->query($fetch_ledger_query);

    // Fetch the result
    if ($fetch_ledger_result->num_rows > 0) {
        $ledger = $fetch_ledger_result->fetch_assoc();
    } else {
        $ledger = null;
    }
}
// Close the database connection
$conn->close();
