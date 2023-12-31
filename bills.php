<?php
include('connection.php');
session_start();
$error = "";
$active = "";
?>
<?php
$stmt = $conn->query("SELECT * FROM usertable");
?>
  <div class="container">
    <h2>List of users</h2>            
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email Address</th>
          <th>Date Registered</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $stmt->fetch()) {
          ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
              <button type="button" class="btn btn-success" id="<?php echo $row['userid']; ?>" data-toggle="modal" data-target="#recordbill" onclick="getid()">Record Bill</button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="recordbill" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3>Record Bills:</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="text" name="user" value="<?php echo $_SESSION['name']; ?>">
            <div class="form-group">
              <label for="exampleFormControlInput1">Amount of Waste</label>
              <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success" value="billnow" align="right">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <div class="alert alert-warning" role="alert" align="left">
            <b>Confirm before you submit</b>
          </div>
        </div>
      </div>
    </div>
  </div>
