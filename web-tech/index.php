<?php
include './services/ledgerServices/fetchLedger.php';
// Start output buffering to capture content for layout
ob_start();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action="./services/ledgerServices/addLedger.php" method="post">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="entity" class="form-control" placeholder="Ledger Name">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- content -->
  <div class="row">
    <div class="col-md-12">
      <h5 class="mt-5">All Ledger List</h5>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ledger Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          // Loop through $ledger_data and display each row in the table
          foreach ($ledger_data as $row) {
            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['entity'] . "</td>";
            echo "<td class='action-btn'>";
            echo "<a href='edit-ledger.php?ledger_id=" . $row['id'] . "'><button class='btn btn-sm btn-primary edit-btn'>Edit</button></a>";
            echo "<a href='./services/ledgerServices/deleteLedger.php?ledger_id=" . $row['id'] . "'><button class='btn btn-sm btn-danger delete-btn'>Delete</button></a>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- content ends -->
</div>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>
