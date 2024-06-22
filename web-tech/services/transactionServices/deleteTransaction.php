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
if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    // Prepare the SQL query to delete the ledger entry
    $delete_transaction_query = "DELETE FROM `transaction` WHERE `id` = $transaction_id";
    $stmt = $conn->query($delete_transaction_query);

    // Execute the query and check if it was successful
    if ($stmt == True) {
        header('Location: /web-tech/transaction.php');
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID provided.";
}

// Close the database connection
$conn->close();
