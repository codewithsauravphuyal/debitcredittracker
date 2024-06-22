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
    $ledger_id = $_GET['ledger_id'];

    // Prepare the SQL query to delete the ledger entry
    $delete_ledger_query = "DELETE FROM `ledger` WHERE `id` = $ledger_id";
    $delete_ledger_result = $conn->query($delete_ledger_query);
    // Execute the query and check if it was successful
    if ($delete_ledger_result == true) {
        // echo 'data is deleted';
        header('Location: /web-tech/index.php');
    } else {
        echo "Error deleting ledger entry" ;
    }
} 

// Close the database connection
$conn->close();
