<?php
// Include the ledger.php file to get $ledger_data
include './services/transactionServices/fetchTransaction.php';
include './services/ledgerServices/fetchLedger.php';

// Start output buffering to capture content for layout
ob_start();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="./services/transactionServices/addTransaction.php" method="post">
                <div class="form-group">
                    <label for="ledger">Ledger Name</label>
                    <select name="ledger_id" id="ledger" class="form-control">
                        <?php
                        foreach ($ledger_data as $row) {
                            echo '<option value="' . $row['id'] . '">' . $row['entity'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transactionType">Transaction Type</label>
                    <select name="is_credit_or_debit" id="transactionType" class="form-control">
                        <option value="DR">DR</option>
                        <option value="CR">CR</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" step="any" name="amount" class="form-control" id="amount">
                </div>
                <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                
            </form>
        </div>
    </div>
    <!-- Transaction List -->
    <div class="row">
        <div class="col-md-12">
            <h5 class="mt-5">All Transaction List</h5>
            <table class="table table-striped table-bordered table-hover mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ledger</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Transaction Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if $transaction_data is set and is an array
                    if (isset($transaction_data) && is_array($transaction_data)) {
                        // Loop through $transaction_data and display each row in the table
                        foreach ($transaction_data as $row) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row['id'] . "</th>";
                            echo "<td>" . $row['entity'] . "</td>";
                            echo "<td>" . $row['is_credit_or_debit'] . "</td>";
                            echo "<td>" . $row['Amount'] . "</td>";
                            echo "<td class='action-btn'>" .
                                "<a href='edit-transaction.php?ledger_id=" . $row['id'] . "'><button class='btn btn-sm btn-primary edit-btn'>Edit</button></a> " .
                                "<a href='./services/transactionServices/deleteTransaction.php?transaction_id=" . $row['id'] . "'><button class='btn btn-sm btn-danger delete-btn'>Delete</button></a>" .
                                "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No transactions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>
