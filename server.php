<?php 
ob_start();
session_start();
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
// connect to the database
try{
$db = mysqli_connect('localhost', 'gideon', 'gideon', 'maseno_emergency');
//echo 'Database Connected Successfully';
}
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  echo 'Database Connection Failed.';
}
// generate random alphanumeric character
function random_string($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'));
  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }
  return $key;
}

// REGISTER USER
if (isset($_POST['register_btn'])) {
  // receive all input values from the form
  $registrationNumber=strtoupper($_POST['regno']);
  $string = str_replace( '', ' &amp; ', $string );
  $firstName =  $_POST['firstname'];
  $lastName =  $_POST['lastname'];
  $emailAddress =  $_POST['emailaddress'];
  $phoneNumber =  $_POST['phone'];
  $password =  $_POST['password'];
  $confirmPassword =  $_POST['confirmpassword'];
  // form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($firstName)) { array_push($errors, "Firstname is required"); }
if (empty($lastName)) { array_push($errors, "LastName is required"); }
if (empty($registrationNumber)) { array_push($errors, "Registration Number is required"); }
if (empty($emailAddress)) { array_push($errors, "Email Address is required"); }
if (empty($phoneNumber)) { array_push($errors, "Phone Number is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }
if (empty($confirmPassword)) { array_push($errors, "Please Confirm Password"); }
if ($password != $confirmPassword) {
array_push($errors, "The two passwords do not match");
}
// first check the database to make sure
// a user does not already exist with the same username and/or email
$registrationNumber= preg_replace('~[\@!`%&().;:*?"<>|]~', '/',  $registrationNumber);

$user_check_query = "SELECT * FROM student_details WHERE regNum='$registrationNumber' OR emailaddress='$emailAddress' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['regNum'] === $registrationNumber) {
    array_push($errors, "Registration number already exists");
  }
  if ($user['emailaddress'] === $emailAddress) {
    array_push($errors, "Email already exists");
  }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
  $password = md5($confirmPassword);//encrypt the password before saving in the database

  $register_query = "INSERT INTO student_details(`regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`) 
            VALUES('$registrationNumber','$firstName','$lastName','$emailAddress','$phoneNumber','$password')";
  mysqli_query($db, $register_query);
  header('location: index.php');
  }else{
    header('location: register.php');
  }
}

  // LOGIN USER
    if (isset($_POST['login_btn'])) {
      $helpCode= strtoupper(random_string(7));
      $username = strtoupper($_POST['regno']);
      $password = $_POST['password'];
      if (empty($username)) {
        array_push($errors, "Username is required");
      }
      if (empty($password)) {
        array_push($errors, "Password is required");
      }

      if (count($errors) == 0) {
        $encrypted_password = md5($password);
        $login_query = "SELECT * FROM student_details WHERE `regNum`='$username' AND `password`='$encrypted_password'";
        $results = mysqli_query($db, $login_query);

        if (mysqli_num_rows($results) == 1) {
          
          $row = mysqli_fetch_assoc($results);
      
        // end generate random alphanumeric character
          //row data
          $regNumber=$row['regNum'];
          $firstName=$row['firstname'];
          $lastName=$row['lastname'];
          $Email=$row['emailaddress'];
          $Phone=$row['phonenumber'];
        
          //sessions
          $_SESSION['username'] = $regNumber;
          $_SESSION['helpcode'] = $helpCode;
          $_SESSION['firstname'] = $firstName;
          $_SESSION['lastname'] =$lastName;
          $_SESSION['emailaddress'] =$Email;
          $_SESSION['phonenumber'] =$Phone;
        
          $_SESSION['success'] = "You are now logged in";
    
      
          header('location: dashboard.php');
        }else{
          array_push($errors, "Incorrect Username or Password");
          header('location: index.php');
        }
      }
    }

    // Update Location Details
if (isset($_POST['help-btn'])) {
  // receive all input values from the form
  $ipAddress= $_POST['ipaddress'];
  $Longitude=  $_POST['longitude'];
  $Latitude =  $_POST['latitude'];
  $regno =  $_POST['username'];
  $helpCode=  $_POST['helpcode'];
  $type_emergency=  $_POST['emergency_type'];
  $emergency_description=  $_POST['emergency_description'];
  // form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($ipAddress)) { array_push($errors, "Unable to Track your Ip Address"); }
if (empty($Longitude)) { array_push($errors, "Unable to Track your Longitude"); }
if (empty($Latitude)) { array_push($errors, "Unable to Track your Latitude"); }
if (empty($regno)) { array_push($errors, "Unable to Track your Registration Number"); }
if (empty($helpCode)) { array_push($errors, "Unable to Track your Help Code"); }
if (empty($type_emergency)) { array_push($errors, "Please Select the Type of Emergency"); }
// Finally, register user location
if (count($errors) == 0) {
  $status_query ="INSERT INTO `request_status`(`helpID`, `admNo`,`ip_address`, `request_latitude`, `request_longitude`,`emergency_type`, `emergency_description`) 
  VALUES ('$helpCode','$regno','$ipAddress','$Latitude','$Longitude','$type_emergency','$emergency_description')";
  mysqli_query($db, $status_query);
//Select data from location table
              $location_Select_query = "SELECT * FROM request_status WHERE `helpID`='$helpCode'";
                  $results = mysqli_query($db, $location_Select_query);
                  if (mysqli_num_rows($results) == 1) {
                    $row = mysqli_fetch_assoc($results);
                    //row data
                    $regNumber=$row['admNo'];
                    $long=$row['request_longitude'];
                    //sessions
                    $_SESSION['user'] = $regNumber;
                    $_SESSION['longitude'] = $long;

                    //Get Admin Emails
                    $admin_email = "SELECT * FROM SELECT * FROM `admin_details`";
                    $admin_mail_results = mysqli_query($db, $admin_email);
                    if (mysqli_num_rows($admin_mail_results) == 1) {
                      $row = mysqli_fetch_assoc($admin_mail_results);
                      $adminName=$row['admin_firstname']. " ".$row['admin_lastname'];
                      $adminMail=$row['admin_email'];
                      $adminTel=$row['admin_phone'];
                      
                    }
                    // send_sms_toadmin();
                    // send_notification_email($helpCode,$adminName,$adminMail);
                    header('location: dashboard.php');
                  }else{
                    array_push($errors, "Unable to process your request. Contact The System Administrator");
                    header('location: dashboard.php');
                  }
}else{
                  header('location: dashboard.php');
                  array_push($errors, "Unable to update data in the database");
  }

}


//Manual Directions Update
if(isset($_POST['manual-direction-btn'])){
  $adm= $_POST['adm'];
  $helpcode= $_POST['code'];
  $lat= 0;
  $long= 0;
  $ip= $_POST['ip'];
  $emergencyType= $_POST['emergency_type'];
  $incident_directions= $_POST['student_manual_direction'];
  $incident_description= $_POST['student_emergency_description'];


  if (empty($adm)) { array_push($errors, "Reg Number is missing"); }
  if (empty($helpcode)) { array_push($errors, "Helpcode is required"); }
  // if (empty($lat)) { array_push($errors, "Latitude is needed"); }
  // if (empty($long)) { array_push($errors, "Longitude is required"); }
  if (empty($ip)) { array_push($errors, "IP Address is needed"); }
  if (empty($emergencyType)) { array_push($errors, "Emergency Type is needed"); }
  if (empty($incident_directions)) { array_push($errors, "Directions are needed"); }

  if (count($errors) == 0) {
    $data_update= "INSERT INTO `request_status`(`helpID`, `ip_address`, `request_latitude`, `request_longitude`, `emergency_type`, `manual_directions`, `emergency_description`, `admNo`)
     VALUES ('$helpcode','$ip','$lat','$long','$emergencyType','$incident_directions','$incident_description','$adm')";
    $result = mysqli_query($db, $data_update);
//Select data from location table
$location_Select_query = "SELECT * FROM request_status WHERE `helpID`='$helpcode' ";
$results = mysqli_query($db, $location_Select_query);
if (mysqli_num_rows($results) == 1) {
  $row = mysqli_fetch_assoc($results);
  //row data
  $regNumber=$row['admNo'];

  //sessions
  $_SESSION['user'] = $regNumber;
  // send_sms_toadmin();
  // send_notification_email($helpcode,$adminName,$adminMail);
  header("Location: dashboard.php");
}else{
  array_push($errors, "Unable to process your request. Contact The System Administrator");
  header("Location: dashboard.php");
}
    header("Location: dashboard.php");
  }else{
    echo '<script>alert("Unable to submit this request, Contact the System Administrator!")</script>';
    header("Location: dashboard.php");
  }
}

ob_end_flush();
?>