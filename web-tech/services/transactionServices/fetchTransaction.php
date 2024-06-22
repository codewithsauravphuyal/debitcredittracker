<?php
include("./services/dbConfig/db.php");

$sql_query = "SELECT transaction.*, ledger.entity FROM `transaction` JOIN ledger ON transaction.ledger_id = ledger.id;";
$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
    $transaction_data = [];
    while ($row = $result->fetch_assoc()) {
        $transaction_data[] = $row;
    }
}

$conn->close();
