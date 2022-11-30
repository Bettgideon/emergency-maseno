 <?php
include 'server.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student | Login</title>
  <?php
include './components/header.php';
?>
  </head>

<body style="background-color: #d2d6de;">
    <div class="container">

        <div class="row mt-5 login-page-row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5 login-page">

                <div class="col-md-12 mb-2 login-page-header">
                    <h2 class="text-center" style="color: #fff">Maseno University Emergency System</h2>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <img src="./static/img/logo.png" class="img-fluid" height="100" width="100" />
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>


                <form method="post" action="server.php" enctype="multipart/form-data" class="login-form">
                    <div class="form-group row">
                        <?php
            include 'errors.php';
            ?>
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="e.g BA/00025/013" name="regno"
                                required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                name="password" required />
                        </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-sm-4 mb-2">
                            <a name="forgot_password_btn" class="btn-block p-2 text-success" href="forgot-password.php" style="text-decoration:none ;">
                               Forgot Password ?
                            </a>
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" name="login_btn" class="btn btn-primary btn-block p-2">
                              <strong>  Sign In</strong>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
  <?php 
  include 'components/scripts.php';
  ?>

</body>

</html>