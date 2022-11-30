<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paramedics</title>
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
         <h3 style='color:blue'>Paramedics</h3>
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
        $data_fetch_query = "SELECT * FROM `rescue_team_members` WHERE role_id='MSU/001B/022'";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
            $role_id = $row['role_id'];
            $user_email = $row["email"];
            $member_id = $row["member_id"];
            $member_fname = $row["fname"];
            $member_lname = $row["lname"];
            $member_phone = $row["phone"];
            $member_team_id = $row["rescue_team_id"];

            $data_fetch = "SELECT * FROM `rescue_team` WHERE team_id='$member_team_id'";
            $result = mysqli_query($db, $data_fetch);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
                $team_id = $row['team_id'];
                $teamName = $row["team_name"];
              }
            }

      echo "<tr> <td>" .$member_id.  "</td>";
      echo "<td>" .$member_fname."</td>";
      echo "<td>" .$member_lname."</td>";
      echo "<td>" .$user_email."</td>";
      echo "<td>" .$member_phone."</td>";
      echo "<td>" .$teamName."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='member_id' value='$member_id'>
        <input type='submit'data-prevteam='$teamName' data-fname='$member_fname' data-lname='$member_lname' data-tel='$member_phone' data-teamid = '$member_team_id' data-mail ='$user_email' data-memberid ='$member_id' value='Edit' name='edit-paramedic-btn' class='btn btn-success paramedicEdit'>
        <input type='submit' data-id= '$member_id' value='Delete' name='delete-paramedic-btn' class='btn btn-danger deleteParamedic'>
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

<div class="row m-3">
  <div class="col-md-1"></div>
  <div class="col-md-10">
<div class="table-responsive-lg">
  <table class="table mt-3" style='color:black; font-weight:normal'>
      <thead>
       <h3 style='color:blue'>Nurses</h3>
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
      $data_fetch_query = "SELECT * FROM `rescue_team_members` WHERE role_id='MSU/001C/022'";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
            $role_id = $row['role_id'];
            $user_email = $row["email"];
            $member_id = $row["member_id"];
            $member_fname = $row["fname"];
            $member_lname = $row["lname"];
            $member_phone = $row["phone"];
            $member_team_id = $row["rescue_team_id"];

            $data_fetch = "SELECT * FROM `rescue_team` WHERE team_id='$member_team_id'";
            $result = mysqli_query($db, $data_fetch);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
                $team_id = $row['team_id'];
                $teamName = $row["team_name"];
              }
            }

      echo "<tr> <td>" .$member_id.  "</td>";
      echo "<td>" .$member_fname."</td>";
      echo "<td>" .$member_lname."</td>";
      echo "<td>" .$user_email."</td>";
      echo "<td>" .$member_phone."</td>";
      echo "<td>" .$teamName."</td>";
      echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='nurse_member_id' value='$member_id'>
        <input type='submit' data-prevteam='$teamName' data-fname='$member_fname' data-lname='$member_lname' data-tel='$member_phone' data-teamid = '$member_team_id' data-mail ='$user_email' data-memberid ='$member_id' value='Edit' name='edit-nurse-btn' class='btn btn-success paramedicEdit'>
        <input type='submit' data-id= '$member_id' value='Delete'  class='btn btn-danger deleteParamedic'>
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
<!--edit paramedic modal-->
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<div class="modal fade" id="paramedicEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Member ID:</label>
            <input type="text" class="form-control" readonly id="member-id" name='paramedic_member_id'  placeholder="Member ID" required>
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="member-fname" name='paramedic_fname' placeholder="Member First Name"required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="member-lname" name='paramedic_lname' placeholder="Member Last Name"required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="member-email" name='paramedic_email' placeholder="Member Email"required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="number" class="form-control" id="member-phone" name='paramedic_phone' placeholder="0700........"required>
          </div>
         
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team Name:</label>
            <select name='paramedic_team_id' class="form-control form-control-sm" required="required">
              <option selected value="">Select Team</option>
              <?php $sql=mysqli_query($db,"select * from rescue_team");
              while ($rw=mysqli_fetch_array($sql)) {
                ?>
                <option value="<?php echo htmlentities($rw['team_id']);?>"><?php echo htmlentities($rw['team_name']);?></option>
              <?php
              }
              ?>
              </select>
                        </div>
                        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name='update-paramedic-details' class="btn btn-success">Update Details</button>
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
 
  <div class="modal" id='deleteParamedicModal' tabindex="-1" role="dialog" style="color:black;font-weight:normal;">
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
            <input type="text"  hidden class="form-control" id="IdentityNumber" required readonly name='member_id'>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
        <button type="submit" name='delete-paramedic-btn' class="btn btn-danger">Yes Delete!</button>
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

</div><!--Ensd of container-->


<!--Footer-->
<?php include './includes/footer.php';?>

    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
<script>
function openParamedicModal() {
  $("#paramedicEditModal").modal("show");
}
let openButtons = document.querySelectorAll(".paramedicEdit");
openButtons.forEach(function (openButton) {
  openButton.addEventListener("click", function (e) {
    e.preventDefault();

    let memberid = openButton.dataset.memberid;
    let memberfname = openButton.dataset.fname;
    let memberlname = openButton.dataset.lname;
    let membermail = openButton.dataset.mail;
    let memberphone = openButton.dataset.tel;

    document.getElementById("member-id").value = memberid;
    document.getElementById("member-fname").value = memberfname;
    document.getElementById("member-lname").value = memberlname;
    document.getElementById("member-email").value = membermail;
    document.getElementById("member-phone").value = memberphone;
    openParamedicModal();
  });
});

function paramedicDeleteConfirmation() {
  $("#deleteParamedicModal").modal("show");
}
let deleteButtons = document.querySelectorAll(".deleteParamedic");
deleteButtons.forEach(function (deleteButton) {
  deleteButton.addEventListener("click", function (e) {
    e.preventDefault();
    let memberid = deleteButton.dataset.id;

    document.getElementById("IdentityNumber").value = memberid;
    paramedicDeleteConfirmation();
  });
});

</script>
  </body>
</html>
