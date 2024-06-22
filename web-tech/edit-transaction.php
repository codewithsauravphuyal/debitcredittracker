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
            <form action="./services/transactionServices/editLedger.php<?php echo '?transaction_id=' . $transaction_id ; ?>" method="post">
                <div class="form-group">
                    <label for="ledger">Ledger Name</label>
                    <select name="ledger_id" id="ledger" class="form-control">
                        <?php foreach ($ledger_data as $row): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['entity']; ?></option>
                        <?php endforeach; ?>
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
</div>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>
