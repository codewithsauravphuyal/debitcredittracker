<?php
include './services/ledgerServices/fetchSingleLedger.php';
// Start output buffering to capture content for layout
ob_start();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="./services/ledgerServices/editLedger.php<?php echo '?ledger_id=' . $ledger_id; ?>" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="entity" class="form-control" placeholder="Ledger Name" value="<?php echo $ledger['entity']; ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- content ends -->
<?php
// Get the content and clean the output buffer
$content = ob_get_clean();
// Include the layout file with the content
include 'layout.php';
?>
