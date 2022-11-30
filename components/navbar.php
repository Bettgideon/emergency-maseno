<div class="container-fluid" id="mynav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php
     if($_SESSION['username']){ ?>
     <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="track.php">Track Requests </a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="javascript:void(0)">
      <?php echo "Welcome  ". "<strong style='color:white;'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</strong>  <br>";  ?> </a>
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