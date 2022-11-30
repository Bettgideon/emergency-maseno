<?php
include 'server.php';
$admin_identity = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assigned Tasks | Maseno</title>
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
              <p style='color:black; font-weight:normal'>
              Requests that have been assigned a Rescue Team
      </p>
                <tr >
                  <!-- <th scope="col" class="table-info">S.NO</th> -->
               
                  <th scope="col" class="table-danger">Student Name</th>
                  <th scope="col" class="table-danger">Help Code</th>
                  <th scope="col" class="table-danger">Team Assigned</th>
                  <th scope="col" class="table-danger">Time of Assignment</th>
                  <th scope="col" class="table-danger">Action</th>
                </tr>
              </thead>
              <tbody>
            
        <?php
        if($admin_identity){
          $data_fetch_query = "SELECT request_status.id, request_status.helpID,request_status.status,
          request_status.admNo,request_status.timestamp,student_details.regNum,student_details.regNum,
          student_details.firstname,student_details.lastname,student_details.phonenumber, rescue_team_tasks.*
          FROM request_status
          INNER JOIN student_details ON request_status.admNo = student_details.regNum
          INNER JOIN rescue_team_tasks ON request_status.helpID = rescue_team_tasks.task_help_code
          WHERE request_status.status ='Assigned' order by  rescue_team_tasks.assignment_time DESC;";
            $data_result = mysqli_query($db, $data_fetch_query);
            if ($data_result->num_rows > 0){
                while($row = $data_result->fetch_assoc()) {
    
                $fName=$row["firstname"];
                $lName=$row["lastname"];
                $help_code=$row["helpID"];
                $request_status=$row["status"];
                $team_id=$row["rescue_team_id"];
                $request_time=$row["assignment_time"];
                // $admin_identity=$row["assigning_admin_id"];

                $team_fetch = "SELECT * FROM `rescue_team` WHERE `team_id` = '$team_id' ";
                $rslt = mysqli_query($db,  $team_fetch);
                if ($rslt->num_rows > 0){
                  while($row = $rslt->fetch_assoc()) {
                    $team_name = $row["team_name"];
                  }
                }
    
          
            echo "<tr style='font-weight:normal'> <td>" .$fName. " ".$lName. "</td>";
       
            echo "<td>" .$help_code."</td>";
            echo "<td>" .$team_name."</td>";
            echo "<td>" .$request_time."</td>";
            echo "<td>
            
            <form method ='POST' action='server.php'>
            <input hidden type='text' name='help_code_2' value='$help_code'>
            <input type='submit' data-adminidentity= '$admin_identity' data-previous_team='$team_name' data-helpcode ='$help_code' name='reassign-btn' value='Change Team' class='btn btn-info team_change_button'>
            </form>
            </td> </tr>";
            }
            
            }else{
            echo "<td>"."No Data is available"."</td>";
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

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="modal fade" id="teamUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team Update Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Help Code:</label>
            <input type="text" readonly class="form-control" name="helpCode" id="request_helpcode" value=''>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Previously Assigned Team</label>
            <input type="text" readonly class="form-control" id="previous_team" value=''>
          </div>
          <div class="form-group">
            <label for="recipient-name"hidden class="col-form-label">Moderator ID</label>
            <input type="text" readonly hidden name="adminIdentity" class="form-control" id="admin_identity_no" value=''>
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
        <button type="submit" name='reassign-team-btn' class="btn btn-primary">Update Details</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<?php include './includes/footer.php';?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/modal.js"></script>
  </body>
</html>
