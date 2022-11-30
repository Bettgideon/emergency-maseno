<?php
include 'server.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
<?php include './includes/header.php'; ?>
</head>
  <body>
  <?php include './includes/navbar.php'; ?>

<div class="container mt-3" >
<!--Cards-->
<div class="row " style="text-align: center;">
<!--start of one Card -->

<div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       <a href="./inqueue.php"> Requests In Queue </div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-arrows-rotate fa-2x"style="color:#e83e8c"></i>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--end of one Card -->
  <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./attending.php">Requests Being Attended</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-truck-medical fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
  <!--end of one Card -->
  <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./successful.php">Successful Requests</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-check-double fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
<!--end of one Card -->
 <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./failed.php">Failed Requests</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-triangle-exclamation fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
<!--end of one Card -->
<!--end of Cards-->
</div>

<!--Second Row-->
<div class="row " style="text-align: center;">
  <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="./team.php"> Rescue Teams</div>
                  </div>
                  <div class="col-auto">
                      <!-- <i class="fa-solid fa-wifi fa-2x text-gray-300" style="color:#e83e8c"></i> -->
                      <i class="fa-solid fa-person fa-2x"style="color:#e83e8c"></i>
                  </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!--end of one Card -->

    <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <a href="./moderators.php"> Moderators (Admins)</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user-ninja fa-2x"style="color:#e83e8c"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--end of one Card -->
   <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <a href="./paramedics.php"> Paramedics & Nurses</div>
                        
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user-doctor fa-2x"style="color:#e83e8c"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--end of one Card -->
   <!--start of one Card -->
   <div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <a href="drivers.php">Drivers</div>
                        
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user fa-2x"style="color:#e83e8c"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--end of one Card -->
  <!--end of Cards-->
  </div>
</div>



    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
  </body>
</html>
