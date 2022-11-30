<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student | Registration</title>
  <?php
include './components/header.php';
?>
  </head>
  <body style="background-color: #d2d6de">
    <div class="container register-page-section">
      <div class="row mt-2 register-page-row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 register-page">
          <div class="col-md-12 mb-2 register-page-header">
            <h2 class="text-center" style="color: #fff">
              Maseno E-Health Student Registration Form
            </h2>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6 text-center">
                <img
                  src="./static/img/logo.png"
                  class="img-fluid"
                  height="100"
                  width="100"
                />
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
          <form
            method="post"
            action="server.php"
            enctype="multipart/form-data"
            class="register-form"
          >
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label"
                >Username</label
              >
              <div class="col-sm-7">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail4"
                  placeholder="e.g BA/00020/012"
                  name="regno"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail5" class="col-sm-3 col-form-label"
                >First Name</label
              >
              <div class="col-sm-7">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="First Name"
                  name="firstname"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail6" class="col-sm-3 col-form-label"
                >Last name</label
              >
              <div class="col-sm-7">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail7"
                  placeholder="Last Name"
                  name="lastname"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail8" class="col-sm-3 col-form-label"
                >Email</label
              >
              <div class="col-sm-7">
                <input
                  type="email"
                  class="form-control"
                  id="inputEmail9"
                  placeholder="Email Address"
                  name="emailaddress"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail10" class="col-sm-3 col-form-label"
                >Phone</label
              >
              <div class="col-sm-7">
                <input
                  type="number"
                  class="form-control"
                  id="inputEmail11"
                  placeholder="071234...."
                  name="phone"
                  required
                />
              </div>
            </div>

            <div class="form-group row ">
              <label for="inputPassword3" class="col-sm-3 col-form-label"
                >Password</label
              >
              <div class="col-sm-7">
                <input
                  type="password"
                  class="form-control"
                  id="txtPassword"
                  onkeyup="CheckPasswordStrength(this.value)"
                  placeholder="Password"
                  name="password"
                  required
                />
         
              </div>
              <span id="password_strength"></span>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label pr-0"
                >Confirm Password</label
              >
              <div class="col-sm-7">
                <input
                  type="password"
                  class="form-control"
                  id="txtPassword2"
                  placeholder="Confirm Password"
                  onkeyup="CheckPasswordStrength2(this.value)"
                  name="confirmpassword"
                  required
                />
              </div>
              <span id="password_strength_confirm"></span>
            </div>
            
            <div class="form-group row">
              <div class="col-sm-3"></div>
              <div class="col-sm-7">
                <button
                  type="submit"
                  class="btn btn-success btn-block"
                  name="register_btn"
                  id="regBtn"
                >
                  Register
                </button>
              </div>
            </div>

            <hr />
            <!--Login-->
            <div class="row">
              <div class="col-sm-12 login-col">
                <p class="lead">
                  Already have an account ?
                  <a href="./index.php" class="btn btn-primary ">Login Here</a>
                </p>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event) {
        event.preventDefault;
        document.getElementById("regBtn").classList.add('disabled');
  });
  function CheckPasswordStrength(password) {
   let password_strength = document.getElementById("password_strength");


    //TextBox left blank.
    if (password.length == 0) {
      password_strength.innerHTML = "";
      return;
    }

    //Regular Expressions.
    let regex = new Array();
    regex.push("[A-Z]"); //Uppercase Alphabet.
    regex.push("[a-z]"); //Lowercase Alphabet.
    regex.push("[0-9]"); //Digit.
    regex.push("[$@$!%*#?&]"); //Special Character.

    let passed = 0;

    //Validate for each Regular Expression.
    for (let i = 0; i < regex.length; i++) {
      if (new RegExp(regex[i]).test(password)) {
        passed++;
      }
    }

    //Validate for length of Password.
    if (passed > 2 && password.length > 8) {
      passed++;
    }

    //Display status.
    let color = "";
    let strength = "";
    switch (passed) {
      case 0:
      case 1:
        strength = "Weak";
        color = "red";
        break;
      case 2:
        strength = "Good";
        color = "darkorange";
        break;
      case 3:
      case 4:
        strength = "Strong";
        color = "green";
        break;
      case 5:
        strength = "Very Strong";
        color = "darkgreen";
        break;
    }
    password_strength.innerHTML = strength;
    password_strength.style.color = color;

    if(strength != 'Very Strong'){
      document.getElementById("regBtn").classList.add('disabled');
    }if (strength == 'Very Strong') {
      document.getElementById("regBtn").classList.remove('disabled');
    }
  }
  // second password Input
  function CheckPasswordStrength2(password) {
   let password_strength_2 = document.getElementById("password_strength_confirm");


    //TextBox left blank.
    if (password.length == 0) {
      password_strength_2.innerHTML = "";
      return;
    }

    //Regular Expressions.
    let regex = new Array();
    regex.push("[A-Z]"); //Uppercase Alphabet.
    regex.push("[a-z]"); //Lowercase Alphabet.
    regex.push("[0-9]"); //Digit.
    regex.push("[$@$!%*#?&]"); //Special Character.

    let passed = 0;

    //Validate for each Regular Expression.
    for (let i = 0; i < regex.length; i++) {
      if (new RegExp(regex[i]).test(password)) {
        passed++;
      }
    }

    //Validate for length of Password.
    if (passed > 2 && password.length > 8) {
      passed++;
    }

    //Display status.
    let color = "";
    let strength = "";
    switch (passed) {
      case 0:
      case 1:
        strength = "Weak";
        color = "red";
        break;
      case 2:
        strength = "Good";
        color = "darkorange";
        break;
      case 3:
      case 4:
        strength = "Strong";
        color = "green";
        break;
      case 5:
        strength = "Very Strong";
        color = "darkgreen";
        break;
    }
    password_strength_2.innerHTML = strength;
    password_strength_2.style.color = color;

    if(strength != 'Very Strong'){
      document.getElementById("regBtn").classList.add('disabled');
    }if (strength == 'Very Strong') {
      document.getElementById("regBtn").classList.remove('disabled');
    }


  }

document.getElementById('regBtn').addEventListener('click',function(e){
 
let pass1 = document.getElementById('txtPassword').value;
let pass2 = document.getElementById('txtPassword2').value;

if(pass1 !== pass2){
  e.preventDefault();
  Toastify({
  text: "Passwords Do Not Match! ⚠ ",
  className: "warning",
  style: {
    background: "#ffc107",
    color: 'black',
  }
}).showToast();
}else if (pass1 === pass2) {
  Toastify({
  text: "Passwords Matched",
  className: "success",
  style: {
    background: "#28a745",
    color: 'white',
  }
}).showToast();
} 

});
</script>
<?php
include 'components/scripts.php';
?>
  </body>
</html>
