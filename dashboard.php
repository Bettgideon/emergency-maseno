<?php
include 'server.php';

$username = $_SESSION['username'];
$request_helpcode = $_SESSION['helpcode'];
$studentAdm = $_SESSION['username'];
// Get Location from IP Address using PHP
// Use the IP Geolocation API to get the user’s location from IP using PHP.

// Call API via HTTP GET request using cURL in PHP.
// Convert API JSON response to array using json_decode() function.
// Retrieve IP data from API response.

// IP address 
// $userIP = $_SERVER['REMOTE_ADDR'];
 
//static ip address
$ip = "165.105.70.4"; 

//Get IP Address of User in PHP
//$ip = $_SERVER['REMOTE_ADDR']; 

//call api
$url = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);

//decode json data
$getInfo = json_decode($url); 



?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Student | Dashboard</title>
  <?php
include './components/header.php';

?>
  </head>

  <body>
    <?php
    include './components/navbar.php';
    ?>

<div class="container mt-3" >
<div
          class="alert alert-warning alert-dismissible fade show font-14"
          role="alert"
          id="alert-section" style="text-align: center"
        >
          <span class="btn btn-danger"style="font-weight:bold"> WARNING!</span> Please <strong>DO NOT</strong> request for Emergency Response if you do not have the need, else YOU will be answerable to the <strong style="color:red">Senate</strong>.
         
          
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<!--Cards-->
<div class="row " style="text-align: center;">
<!--start of one Card -->

<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Your IP Address</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ip ; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-wifi fa-2x text-gray-300" style="color:#e83e8c"></i>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!--end of one Card -->
                        <!--start of one Card -->
<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Your Longitude</div>
                      <!-- <input type="text" id="js-longitude" value="10"> -->

                  <div class="h5 mb-0 font-weight-bold text-gray-800" id="js-longitude">0</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-location-crosshairs fa-2x text-gray-300" style="color:#007bff"></i>
              </div>
          </div>
      </div>
  </div>
</div>
                        <!--end of one Card -->
                                      <!--start of one Card -->
<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Your Latitude</div>
                        <!-- <input type="text" id="js-latitude" value="10"> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="js-latitude">0</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-location-dot fa-2x text-gray-300" style="color:#ffaa00"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of one Card -->
<!--end of Cards-->
</div>


<!--Request Help Section-->
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 text-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Do you need Help?</h5>
        <p class="card-text">Please fill the form below and submit.</p>
        <form method="post" action="server.php">
          <?php include 'errors.php';?>
  <div class="row">
  
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control" required readonly hidden name="ipaddress" value="<?php echo $ip ; ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control student-longitude" required readonly hidden  name="longitude" value="0">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control student-latitude"  required readonly  hidden name="latitude" value="0">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control"   name="username" readonly  required hidden value="<?php echo $username;  ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control"   name="helpcode" readonly  required hidden value="<?php echo $request_helpcode;  ?>">
    </div>


   <div class="col-md-12">
   <div class="form-row">
   <div class="form-group col-md-12">
      <label for="inputEmergency">Choose the Type of Emergency</label>
      <select id="inputState" name="emergency_type" required class="form-control">
        <option value="">Choose...</option>
        <option value="sickness">Sickness</option>
        <option value="accident">Accident / Injury</option>
        <option value="fire">Fire</option>
        <option value="other">Other</option>
      </select>
    </div>
   <div class="form-group col-md-12">
   <label for="inputAddress2">Description (Note: Requests <strong>WITHOUT</strong> a description have the <strong style="color: red;">Lowest Priority</strong>)</label>
    <textarea type="text"  name="emergency_description"class="form-control" id="inputAddress2" placeholder="Optional: A Short Description of What Happened"></textarea>
    
    </div>
  </div>
   </div>

  </div>
  
  <button type="submit" class="btn btn-danger btn-block mb-2" id="help-btn" name="help-btn">I Need Help</button>
  <!--#############################################-->


</form>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->


<div class="modal fade mt-3" id="manualLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="row">
    <div class="col-md-12">
    <div class="alert alert-danger" role="alert">
  We are unable to fetch your location. Turn on location services on your devices and reload the page. If the problem persists, you will be needed to manually describe your location. <strong style="color:red">NOTE:</strong> Using manual directions gives the <span style='color:red;'>Lowest Priority</span> for emergency response. 
</div>
    </div>
  </div>
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">
        Fill and Submit the form below for manual directions. </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action="server.php">
          <div class="form-group">
            <input type="text" name="adm" hidden required readonly class="form-control" readonly id="student_adm" value="<?php echo $studentAdm; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="code" hidden required readonly class="form-control" readonly id="help-code" value="<?php echo $request_helpcode; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="ip" hidden required readonly class="form-control" readonly  value="<?php echo $ip ; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="lat" hidden required readonly class="form-control" readonly  value="0">
          </div>
          <div class="form-group">
            <input type="text" name="lng" hidden  required readonly class="form-control" readonly  value="0">
          </div>
          <div class="form-group">
          <label for="inputEmergency">Choose the Type of Emergency</label>
      <select id="inputState" name="emergency_type" required class="form-control">
        <option value="">Choose...</option>
        <option value="sickness">Sickness</option>
        <option value="accident">Accident / Injury</option>
        <option value="fire">Fire</option>
        <option value="other">Other</option>
      </select>
          </div>
          <div class="form-group">
          <label for="inputAddress2">Description (Note: Requests <strong>WITHOUT</strong> a description have the <strong style="color: red;">Lowest Priority</strong>)</label>
            <textarea class="form-control"  name='student_emergency_description' id="message-text" placeholder='Optional: Briefly explain what happened! '></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style="text-align: left !important;">Manual Directions:</label>
            
            <textarea class="form-control" required id="student-direction" name='student_manual_direction' rows="4" placeholder="Type your directions here as clearly and precisely as possible." required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" name='manual-direction-btn' class="btn btn-primary">Send and Exit</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
  </div>
  <div class="col-md-3"></div>
</div>
<?php

     if($_SESSION['user']){ ?>
     <div class="row">
  <div class="col-sm-12">
      <div class="card">
  <div class="card-body">
  <div class="alert alert-success" role="alert">
   <span style="color:#e83e8c;font-weight:bold">Help Is On The Way.</span> <br><span class="btn btn-warning">Note: </span> Please Do not move away from this location. A team will be dispatched to help you. Keep Calm!!!
</div>
  <p><?php echo "Your Help Code is  ". "<strong style='color:blue;'>". $_SESSION['helpcode']."</strong>  <br>";  ?> </a></p>
  
</div>
</div>
  </div>
     </div>
 <?php
  }
 ?>

      </div>
    </div>
  </div>
  <div class="col-sm-3 mb-5"></div>
</div>


</div>
<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer -->


<!--End of Tawk.to Script-->
<?php include 'components/scripts.php';?>
<!-- modal script -->

  </body>
</html>
