<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Failed Tasks</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
    <?php include './includes/navbar.php'; ?>

  <div class="row m-3">
  <div class="col-md-1"></div>
    <div class="col-md-10">
<div class="table-responsive-lg p-4">
    <table class="table p-4" style='color:black; font-weight:normal'>
        <thead>
          <h6  style='color:blue; font-weight:normal'>
         Failed Responses </h6>
            <tr >
              <!-- <th scope="col" class="table-primary">S.NO</th> -->
              <th scope="col" class="table-primary">Help Code</th>
              <th scope="col" class="table-primary">Student Name</th>

              <th scope="col" class="table-primary">Time of Request</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($_SESSION['admin_id']){
        $data_fetch_query = "SELECT request_status.id, request_status.helpID,request_status.status,request_status.emergency_description,
        request_status.admNo,request_status.timestamp,student_details.regNum,student_details.regNum,
        student_details.firstname,student_details.lastname,student_details.phonenumber, failed_list.student_helpcode, failed_list.incident_description
        FROM ((request_status
        INNER JOIN student_details ON request_status.admNo = student_details.regNum )
        INNER JOIN  failed_list ON request_status.helpID = failed_list.student_helpcode)
         WHERE request_status.status ='Failed' order by request_status.timestamp DESC;";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {

            $help_code=$row["helpID"];
            $request_status=$row["status"];
            $incident_info=$row["incident_description"];
            $request_status=$row["status"];
            $fname=$row["firstname"];
            $lname=$row["lastname"];
            $name = $fname." ".$lname;
            $tel=$row["phonenumber"];
            $request_info=$row["emergency_description"];
            $request_report=$row["incident_description"];

       
            echo "<tr> <td>" .$row["helpID"]."</td>";
            echo " <td>" .$row["firstname"]. " ".$row["lastname"]. "</td>";

            echo "<td>" .$row["timestamp"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='help_code' value='$help_code'>
        <input type='submit' data-report='$request_report' data-info='$request_info' data-status ='$request_status' data-phonenumber='$tel' data-name='$name' data-helpcode='$help_code' value='View More Details' name='view-requests-being-attended-btn' class='btn btn-info view-failed-tasks-btn'>
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

<div class="modal fade" id="failureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;font-weight:normal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Failed Task Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Help Code:</label>
            <input type="text" class="form-control" readonly id="student_HelpId">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Student Name:</label>
            <input type="text" class="form-control"readonly id="student-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number:</label>
            <input type="text" class="form-control" readonly id="student-phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Request Status:</label>
            <input type="text" class="form-control" readonly id="request-status">
          </div>
     
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Task Description:</label>
            <textarea class="form-control" id="request_details" readonly ></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Rescue Report:</label>
            <textarea class="form-control" id="incident-report" readonly></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success">Send message</button> -->
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

  </div>
  <div class="col-md-3"></div>
</div>

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
