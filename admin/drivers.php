<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Drivers</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
    <?php include './includes/navbar.php'; ?>

<div class="container-fluid">



<div class="row m-3">
  <div class="col-md-1"></div>
  <div class="col-md-10">
<div class="table-responsive-lg">
  <table class="table mt-3" style='color:black; font-weight:normal'>
      <thead>
       <h3 style='color:blue'>Drivers</h3>
          <tr >
            <th scope="col" class="table-primary">Member ID</th>
            <th scope="col" class="table-primary">First Name</th>
            <th scope="col" class="table-primary">Last Name</th>
            <th scope="col" class="table-primary">Email Address</th>
            <th scope="col" class="table-primary">Phone Number</th>
            <th scope="col" class="table-primary">Team Name</th>
            <th scope="col" class="table-primary">Action</th>
           
          </tr>
        </thead>
        <tbody>
      
  <?php
  if($_SESSION['admin_id']){
      $data_fetch_query = "SELECT * FROM `rescue_team_members` WHERE role_id='MSU/001A/022'";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
              $role_id = $row['role_id'];
              $driver_member_id = $row['member_id'];
              $driverFname= $row["fname"];
              $driverLname= $row["lname"];
              $driverMail= $row["email"];
              $driverPhone= $row["phone"];
              $teamid= $row["rescue_team_id"];

              $data_fetch = "SELECT * FROM `rescue_team` WHERE `team_id` ='$teamid'";
              $result = mysqli_query($db, $data_fetch);
              if ($result->num_rows > 0){
                while($rw = $result->fetch_assoc()) {
                  $teamname= $rw["team_name"];
                }}

      echo "<tr> <td>" .$row["member_id"].  "</td>";
      echo "<td>" .$driverFname."</td>";
      echo "<td>" .$driverLname."</td>";
      echo "<td>" .$driverMail."</td>";
      echo "<td>" .$driverPhone."</td>";
      echo "<td>" .$teamname."</td>";
      echo "<td>
        
      <form method ='POST' action='server.php'>
      <input  type='text' hidden name='driver_member_id' value='$driver_member_id'>
      <input type='submit' data-id= '$driver_member_id' data-phone='$driverPhone' data-fname='$driverFname' data-lname='$driverLname' data-mail='$driverMail' value='Edit' name='edit-driver-btn' class='btn btn-success editDriverButton'>
      <input type='submit' data-id= '$driver_member_id' value='Delete'  class='btn btn-danger deleteDriveBtn'>
      </form>
      </td> </tr>";
      }
      
      }else{
      echo "<td>"."No Requests Found"."</td>";
      }
      
      } else{
          echo "<td>"."No Data Found"."</td>";
      }

?>
        </tbody>
  </table>
</div>
  
</div>
<div class="col-md-1"></div>
</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 <div class="modal fade" id="editDriverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Driver Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Member ID:</label>
            <input type="text" class="form-control" readonly id="driver-id" name="driver_member_id" placeholder="Member ID">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="driver-fname" name="driver_fname" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="driver-lname" name="driver_lname" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="driver-email" name="driver_email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="number" class="form-control" id="driver-phone" name="driver_phone" placeholder="07000......">
          </div>
        
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Name:</label>
            <select name="driver_team_id" class="form-control form-control-sm" required="required">
<option selected value="">Select Team</option>
<?php $sql=mysqli_query($db,"select * from rescue_team ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['team_id']);?>"><?php echo htmlentities($rw['team_name']);?></option>
<?php
}
?>
</select>
          </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name='update-driver-details' class="btn btn-primary">Update Driver Details</button>
      </div>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
  
  <div class="col-md-3"></div>
  </div>
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 
  <div class="modal" id='deleteDriverModal' tabindex="-1" role="dialog" style="color:black;font-weight:normal;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:red">⚠ Warning!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="modal-body">
        <p>Are you sure you want to delete this user?</p>
        <form method="POST" action="server.php">
        <div class="form-group">
            <input type="text"  hidden class="form-control" id="driverID" required readonly name='driver_member_id'>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
        <button type="submit" name='delete-driver-btn' class="btn btn-danger">Yes Delete!</button>
      </div>
        </form>
      </div>
      
      </div>
     
    </div>
  </div>
</div>
  </div>
  <div class="col-md-3"></div>
</div>
</div>
</div><!--end of container-->
 <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
<script>
  function editDriverModal() {
  $("#editDriverModal").modal("show");
}
let editButtons = document.querySelectorAll(".editDriverButton");
editButtons.forEach(function (editButton) {
  editButton.addEventListener("click", function (e) {
    e.preventDefault();

    let driverid = editButton.dataset.id;
    let driverfname = editButton.dataset.fname;
    let driverlname = editButton.dataset.lname;
    let drivermail = editButton.dataset.mail;
    let driverphone = editButton.dataset.phone;
    document.getElementById("driver-id").value = driverid;
    document.getElementById("driver-fname").value = driverfname;
    document.getElementById("driver-lname").value = driverlname;

    document.getElementById("driver-phone").value = driverphone;
    document.getElementById("driver-email").value = drivermail;

    editDriverModal();
  });
});

function deleteDriverModal() {
  $("#deleteDriverModal").modal("show");
}
let deleteBtns = document.querySelectorAll(".deleteDriveBtn");
deleteBtns.forEach(function (deleteBtn) {
  deleteBtn.addEventListener("click", function (e) {
    e.preventDefault();

    let driverid = deleteBtn.dataset.id;

    document.getElementById("driverID").value = driverid;
 

    deleteDriverModal();
  });
});
</script>
  </body>
</html>
