<?php
include 'server.php';
$admin_id = $_SESSION['admin_id'];
$admin_fname = $_SESSION['admin_firstname'];
$admin_lname = $_SESSION['admin_lastname'];
$admin_name = $admin_fname. " ".$admin_lname;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasks In-Queue</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
    <?php include './includes/navbar.php'; ?>

  <div class="row m-3">
<div class="col-md-2"></div>
    <div class="col-md-8">
<div class="table-responsive-lg">
    <table class="table" style='color:black'>
        <thead>
          <p  style='color:blue; font-weight:bold'>
          Requests In Queue
</p>
            <tr >
              <!-- <th scope="col" class="table-primary">S.NO</th> -->
              <th scope="col" class="table-primary">Student Name</th>
              <th scope="col" class="table-primary">Phone</th>
              <th scope="col" class="table-primary">Help Code</th>
              <th scope="col" class="table-primary">Time of Request</th>
              <th scope="col" class="table-primary">Manual Directions(if any)</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($admin_id){
        $data_fetch_query = "SELECT request_status.id, request_status.helpID,request_status.manual_directions,request_status.status,request_status.emergency_description,
        request_status.admNo,request_status.timestamp,student_details.regNum,student_details.regNum,
        student_details.firstname,student_details.lastname,student_details.phonenumber
        FROM request_status
        INNER JOIN student_details ON request_status.admNo = student_details.regNum  WHERE request_status.status ='Pending' order by request_status.timestamp DESC;";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {

            $help_code=$row["helpID"];
            $request_status=$row["status"];
            $name=$row["firstname"] ." ".$row["lastname"];
            $phone=$row["phonenumber"];
            $description=$row["emergency_description"];
            $directions=$row["manual_directions"];

       
        echo "<tr style='font-weight:normal'> <td>" .$row["firstname"]." ".$row["lastname"]. "</td>";
        echo "<td>" .$row["phonenumber"]."</td>";
        echo "<td>" .$row["helpID"]."</td>";
        echo "<td>" .$row["timestamp"]."</td>";
        echo "<td>" .$row["manual_directions"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='help_code' value='$help_code'>
        <input type='submit'  data-description ='$description' data-adminname='$admin_name' data-adminid='$admin_id' data-helpcode='$help_code' data-name='$name' data-phone='$phone' data-status='$request_status' value='View Task' id='view_task_button' class='btn btn-info taskViewButton'>
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
  <div class="col-md-2"></div>
</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
     <!--View Task -->
  <div class="modal fade" id="taskViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
     
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Student Name</label>
            <input type="text" name='studentName' readonly required class="form-control" id="sName" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Phone Number</label>
            <input type="text" name='studentPhone' readonly required class="form-control" id="sPhone" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Help Code</label>
            <input type="text" name='studentHelpCode' readonly required class="form-control" id="sHelpCode" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Request Status</label>
            <input type="text" name='studentRequestStatus' readonly required class="form-control" id="sRequestStatus" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name"hidden class="col-form-label">Moderator ID</label>
            <input type="text"hidden name='moderatorID' readonly required class="form-control" id="adminID" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name" hidden class="col-form-label">Moderator Name</label>
            <input type="text" hidden name='moderatorName' readonly required class="form-control" id="adminName" value="">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Description</label>
            <input type="text" name='requestDescription' readonly required class="form-control" id="rDescription" value="">
          </div>
      
          <div class="form-group">
          <label for="student_name">Rescue Team</label>
        <select class="form-control form-control-sm" name='team'>
        <option value="">Select Rescue Team</option>
<?php $sql=mysqli_query($db,"select * FROM rescue_team");

while ($row=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($row['team_id']);?>"><?php echo htmlentities($row['team_name']);?></option>
<?php
}
?>
        </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name='update-team-btn' class="btn btn-success">Update and Exit</button>
      </div>
        </form>
      </div>
   
    </div>
  </div>
</div>
<!--End of Modal-->
  </div>
  <div class="col-md-3"></div>
</div>

    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/modal.js"></script>
  </body>
</html>
