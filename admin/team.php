<?php
include 'server.php';
$teamName = $_SESSION['team_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rescue Teams</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
    <?php include './includes/navbar.php'; ?>
<div class="container-fluid">
  <div class="row m-3">
    <div class="col-md-12">
<div class="table-responsive-lg">
<div class="row">
  <div class="col-md-4">
  <button type="type" class='btn btn-primary addNewTeam'>Add New Team</button>
  </div>
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
  
  </div>
  
</div>

    <table class="table" style='color:black; font-weight:normal'>
        <thead>
          <h4  class='mt-3' style='color:blue; font-weight:normal'>
          Rescue Teams </h4>
            <tr >
              <th scope="col" class="table-primary">S.NO</th>
              <th scope="col" class="table-primary">Team ID</th>
              <th scope="col" class="table-primary">Team Name</th>
              <th scope="col" class="table-primary">Team Username</th>
              <th scope="col" class="table-primary">Phone Number</th>
              <th scope="col" class="table-primary">Team Email</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($_SESSION['admin_id']){
        $data_fetch_query = "SELECT * FROM `rescue_team`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $team_ID = $row['team_id'];
                $team_name = $row["team_name"];
                $team_username = $row["team_username"];
                $team_phone = $row["team_phone"];
                $team_mail = $row["team_email"];
                $team_password = $row["team_password"];

        echo "<tr> <td>" .$row["id"].  "</td>";
        echo "<td>" .$row["team_id"]."</td>";
        echo "<td>" .$row["team_name"]."</td>";
        echo "<td>" .$row["team_username"]."</td>";
        echo "<td>" .$row["team_phone"]."</td>";
        echo "<td>" .$row["team_email"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input type='submit' value='Edit' data-password='$team_password ' data-teammail='$team_mail' data-teamphone='$team_phone' data-username='$team_username' data-tname='$team_name' data-team='$team_ID' name='edit-team-btn' class='btn btn-success team-edit-btn m-2'>
        <input type='button' id='team_delete_btn' data-rescueteamid='$team_ID' value='Delete' name='delete-team-btn' class='btn btn-danger team_delete-btn m-2'>

        <button class='btn btn-outline-info m-2 team_member_button' data-teamid='$team_ID' >Add Team Member</button>
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

</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<div class="modal fade" id="teamRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rescue Team Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team ID:</label>
            <input type="text" class="form-control" name='team_id' id="team-id" placeholder="Team ID" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Name:</label>
            <input type="text" class="form-control" name='team_name' id="team-name"placeholder="Team Name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Username:</label>
            <input type="text" class="form-control" name='team_username' id="team-username" placeholder="Team Username" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" name='team_email' id="team-email" placeholder="Email Address" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="text" class="form-control" name='team_phone' id="team-phone" placeholder="0700000000" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name='team_password1' id="team-password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" name='team_password2' id="team-confirm-password" placeholder="Confirm Password" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-success" name="register_team_btn">Register Team</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

  </div>
  <div class="col-md-3"></div>
</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<div class="modal fade" id="addTeamMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team Member Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team ID:</label>
            <input type="text" class="form-control" readonly name="member_team" id='member-teamid' required placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id='member-fname' name="member_fname" required placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id='member-lname' name="member_lname" required placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id='member-email' name="member_email" required placeholder="Email Address">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="number" class="form-control" id='member-phone'name="member_phone" required placeholder="0700000000">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Member ID:</label>
            <input type="text" class="form-control" id='member-id' name="member_id" required placeholder="Member ID">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Member Role:</label>
            <select name="member_role" class="form-control form-control-sm" required="required">
<option value="">Select Role</option>
<?php $sql=mysqli_query($db,"select * from role_details ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['role_id']);?>"><?php echo htmlentities($rw['role_name']);?></option>
<?php
}
?>
</select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="register_team_member" class="btn btn-success">Register Team Member</button>
      </div>
        </form>
      </div>
   
    </div>
  </div>
</div>
  </div>
  <div class="col-md-3"></div>
</div>



<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 
<div class="modal fade" id="editRescueTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Team Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team ID:</label>
            <input type="text" class="form-control" id="teamid" name='team_identifier' readonly required >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Name:</label>
            <input type="text" class="form-control" id="teamname" name='teamName' required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Username:</label>
            <input type="text" class="form-control" id="teamusername" name='team_username' required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Phone:</label>
            <input type="text" class="form-control" id="teamphone" name='team_phone' required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="teammail" required  name='team_email'>
          </div>
     
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name='update-team-details' class="btn btn-success">Update Team Details</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 
  <div class="modal" id='deleteConfirmModal' tabindex="-1" role="dialog" style="color:black;font-weight:normal;">
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
        <p>Are you sure you want to delete this team?</p>
        <form method="POST" action="server.php">
        <div class="form-group">
            <input type="text" hidden class="form-control" id="teamIdentityNumber" required readonly name='teamID'>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
        <button type="submit" name='delete-team-btn' class="btn btn-danger">Yes Delete!</button>
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
</div><!--Container-->
    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
<script src="./static/js/modal.js"></script>
  </body>
</html>
