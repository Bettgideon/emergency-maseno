<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Moderators</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
    <?php include './includes/navbar.php'; ?>
<div class="container-fluid">
  <div class="row m-3">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!--Modal-->
      <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#moderatorRegistration" data-whatever="@mdo">Add Moderator</button>


<div class="modal fade" id="moderatorRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Moderator Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Moderator ID:</label>
            <input type="text" class="form-control" id="moderator-id" name="moderator_id" placeholder="Moderator ID">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="moderator-fname" name="moderator_fname" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="moderator-lname" name="moderator_lname" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="moderator-email" name="moderator_email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="number" class="form-control" id="moderator-phonenumber" name="moderator_phonenumber" placeholder="0700.......">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rank:</label>
            <select class="form-control" name='adminrank' required>
            <option selected value=''>Select Rank</option>
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="moderator-password" name="moderator_password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="moderator-confirm-password" name="moderator_confirm_password" placeholder="Confirm Password">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="moderator-reg-btn" class="btn btn-success">Register User</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
      <!--End of Modal-->
<div class="table-responsive-lg">
    <table class="table" style='color:black; font-weight:normal'>
        <thead>
          <h4  style='color:blue; font-weight:normal'>
          Moderators (Admins)
</h4>
            <tr >
              <th scope="col" class="table-primary">S.NO</th>
              <th scope="col" class="table-primary">Admin ID</th>
              <th scope="col" class="table-primary">First Name</th>
              <th scope="col" class="table-primary">LastName</th>
              <th scope="col" class="table-primary">Email</th>
              <th scope="col" class="table-primary">Phone</th>
              <th scope="col" class="table-primary">Rank</th>
<?php
 if($_SESSION['admin_id'] && $_SESSION['admin_rank'] =='super_admin'){
   echo  ' <th scope="col" class="table-primary">Action</th>';
 }
 else{
   //Display Nothing, no column named action if not super admin
 }
?>
              
</tr>
</thead>
<tbody>
        
    <?php
    if($_SESSION['admin_id'] && $_SESSION['admin_rank'] =='super_admin'){
        $data_fetch_query = "SELECT * FROM `admin_details`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $admin_sno = $row['id'];
                $admin_ID = $row['admin_id'];
                $admin_fname = $row['admin_firstname'];
                $admin_lname = $row['admin_lastname'];
                $admin_mail = $row['admin_email'];
                $admin_number = $row['admin_phone'];
                $admin_power = $row['admin_rank'];

        echo "<tr> <td>".$row['id']."</td>";
        echo "<td>".$admin_ID."</td>";
        echo "<td>".$admin_fname."</td>";
        echo "<td>".$admin_lname."</td>";
        echo "<td>".$admin_mail."</td>";
        echo "<td>".$admin_number."</td>";
        echo "<td>".$admin_power."</td>";

        echo "<td>
        <form method='POST' action='server.php'>
        <input  type='text'  hidden name='admin_unique_id' value='$admin_ID'>
        <input type='submit'data-rank='$admin_power' data-value='$admin_ID' data-fname='$admin_fname' data-lname='$admin_lname' data-mail='$admin_mail' data-number='$admin_number' value='Edit'  class='btn btn-success m-2 update_admin_btn'>
        <input type='submit' value='Delete' data-delid='$admin_ID'   class='btn btn-danger m-2 adminDeleteBtn'>
        <input type='submit' value='Change Password' data-data='$admin_ID'   class='btn btn-info m-2 adminChangePass'>
 </form>
        </td> </tr>";
        }
        
        }else{
        echo "<td>"."No Requests Found"."</td>";
        }
        
        } elseif ($_SESSION['admin_id']) {
            $data_fetch_query = "SELECT * FROM `admin_details`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
            
               

        echo "<tr> <td>" .$row["id"].  "</td>";
        echo "<td>" .$row["admin_id"]."</td>";
        echo "<td>" .$row["admin_firstname"]."</td>";
        echo "<td>" .$row["admin_lastname"]."</td>";
        echo "<td>" .$row["admin_email"]."</td>";
        echo "<td>" .$row["admin_phone"]."</td>";
        echo "<td>" .$row["admin_rank"]."</td> </tr>";
               }
        
        }else{
        echo "<td>"."No Requests Found"."</td>";
        }
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
<!-- Modal -->
<div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="passwordChangeTitle" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="server.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Moderator ID:</label>
            <input type="text" readonly class="form-control" id="moderator_data" name="admin_identity">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="password" class="form-control" id="new-password" name="admin_password">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm-password" name="admin_confirm_password">
          </div>
         
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name='admin_password_update_btn' class="btn btn-success">Update and Exit</button>
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
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 
<div class="modal fade" id="editAdminDetailsModal" tabindex="-1" role="dialog" aria-labelledby="editAdminDetailsModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAdminDetailsModalLabel">Edit Admin Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="server.php"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Admin ID:</label>
            <input type="text" class="form-control" readonly id="admin-specialid" name="admin_unique_id" required>
          </div>
          <div class="form-group">
            <label for="admin" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="admin-fname" name="admin_unique_fname" required>
          </div>
          <div class="form-group">
            <label for="admin" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="admin-lname" name="admin_unique_lname" required>
          </div>
          <div class="form-group">
            <label for="admin" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="admin-mail" name="admin_unique_mail" required>
          </div>
          <div class="form-group">
            <label for="admin" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="admin-tel" name="admin_unique_phone" required>
          </div>
          <div class="form-group">
            <label for="admin" class="col-form-label">Rank:</label>
            <input type="text" class="form-control" id="admin-rank" name="admin_unique_rank" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit"name='edit-admin-btn' class="btn btn-success">Update Details</button>
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
 
  <div class="modal" id='deleteAdminModal' tabindex="-1" role="dialog" style="color:black;font-weight:normal;">
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
            <input type="text" hidden class="form-control" id="adminIdentityNumber" required readonly name='admin_unique_id'>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
        <button type="submit" name='delete-admin-btn' class="btn btn-danger">Yes Delete!</button>
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
</div><!--End of container-->



    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->

<!-- modal script -->
<script>
  function editAdminDetails() {
  $("#editAdminDetailsModal").modal("show");
}
let updateButtons = document.querySelectorAll(".update_admin_btn");
updateButtons.forEach(function (updateButton) {
  updateButton.addEventListener("click", function (e) {
    e.preventDefault();

    let adminid = updateButton.dataset.value;
    let adminrank = updateButton.dataset.rank;
    let adminfname = updateButton.dataset.fname;
    let adminlname = updateButton.dataset.lname;
    let admintel = updateButton.dataset.number;
    let adminmail = updateButton.dataset.mail;

    document.getElementById("admin-specialid").value = adminid;
    document.getElementById("admin-rank").value = adminrank;
    document.getElementById("admin-fname").value = adminfname;
    document.getElementById("admin-lname").value = adminlname;
    document.getElementById("admin-tel").value = admintel;
    document.getElementById("admin-mail").value = adminmail;
    editAdminDetails();
  });
});

function deleteAdminModal() {
  $("#deleteAdminModal").modal("show");
}
let deleteBtns = document.querySelectorAll(".adminDeleteBtn");
deleteBtns.forEach(function (deleteBtn) {
  deleteBtn.addEventListener("click", function (e) {
    e.preventDefault();

    let adminval = deleteBtn.dataset.delid;
  console.log(adminval);

    document.getElementById("adminIdentityNumber").value = adminval;

    deleteAdminModal();
  });
});
function updateAdminPassword() {
  $("#passwordChange").modal("show");
}
let updatePassBtns = document.querySelectorAll(".adminChangePass");
updatePassBtns.forEach(function (updatePassBtn) {
  updatePassBtn.addEventListener("click", function (e) {
    e.preventDefault();

    let adminData = updatePassBtn.dataset.data;
  // console.log(adminData);

    document.getElementById("moderator_data").value = adminData;

    updateAdminPassword();
  });
});
</script>
<!-- <script defer src="./static/js/app.js"></script> -->
<!-- <script src="./static/js/modal.js"></script> -->
  </body>
</html>
