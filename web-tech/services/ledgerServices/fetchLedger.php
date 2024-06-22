<?php
include("./services/dbConfig/db.php");

// Fetch data
$sql_query = "SELECT * FROM ledger";
$result = $conn->query($sql_query);
// Store the fetched data in an array
$ledger_data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ledger_data[] = $row;
    }
}
$conn->close();
