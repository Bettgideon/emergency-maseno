<div class="container-fluid" id="mynav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
      <?php
     if($_SESSION['admin_id']){ ?>
    <li class="nav-item">
        <a class="nav-link active" href="dashboard.php">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link active" href="inqueue.php">In-Queue</a>
      </li>
     <li class="nav-item">
        <a class="nav-link active" href="assigned.php">Assigned</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="successful.php">Successful</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="failed.php">Failed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="team.php">Rescue Teams</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="moderators.php">Moderators</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="paramedics.php">Paramedics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="drivers.php">Drivers</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="javascript:void(0)">
      <?php echo "Welcome ". "<strong style='color:white;'>".$_SESSION['admin_firstname']." ".$_SESSION['admin_lastname'];  ?> </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn btn-danger" href="logout.php">Logout </a>
      </li>
         <?php
  }
 ?>
    </ul>
  </div>
</nav>
</div>