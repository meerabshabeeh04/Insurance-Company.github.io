<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SignUp</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/signupstyles.css">
  
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<header>
    <nav id="header-nav" class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="images/insurance.jpg" alt="Logo" width="150" height="100" class="d-inline-block align-text-top">
          
        </a>
        <button id="collapsable-btn1 "class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="index.html">Home</a>
            <a class="nav-link" href="products.html">Products</a>
            <a class="nav-link" href="about.html">About Us</a>
            <a class="nav-link"href="contact.html">Contact</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <?php
if(isset($_POST["submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $_username = $_POST["username"];
  $_password = $_POST["password"];
  $ph_no = $_POST["mobilenumber"];
  $postaladdress = $_POST["postaladdress"];
  $nic = $_POST["nic"];
  $dob = $_POST["dob"];
  $gender = $_POST["gender"];
  $query4 = "INSERT INTO `customers_account`(`username`, `password`) VALUES ('$_username','$_password')";
  $result4 = mysqli_query($con,$query4);
  $query5 = "INSERT INTO `customer`(`NIC`, `FirstName`, `LastName`, `Email`, `Ph_No`, `PostalAddress`, `DOB`, `Gender`, `username`) VALUES ('$nic','$firstname','$lastname','$email','$ph_no','$postaladdress','$dob','$gender','$_username')";
  $result5 = mysqli_query($con,$query5);  
  ?><h2 style="margin-left:50px;text-align:center">You have successfully signed in</h2><?php
};
?>

<h1 id="signup">Sign Up</h1>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="inputFirstName" class="form-label">First Name</label>
    <input type="text" name="firstname" class="form-control" id="inputFirstName" required>
  </div>
  <div class="col-md-6">
    <label for="inputSecondName" class="form-label">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="inputSecondName" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="inputUsername" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword4" required>
  </div>
    <div class="col-md-6">
    <label for="inputMobile" class="form-label">Mobile Number</label>
    <input type="tel" name="mobilenumber" class="form-control" id="inputMobile" required>
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Postal Address</label>
    <input type="text" name="postaladdress" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
  </div>
  <div class="col-md-6">
    <label for="inputNic" class="form-label">NIC</label>
    <input type="text" name="nic" class="form-control" id="inputNIC" placeholder="*****-*******-*" required>
  </div>
  
  <div class="col-md-6">
    <label for="inputDOB" class="form-label">Date Of Birth</label>
    <input type="Date" name="dob" class="form-control" id="inputDOB" required>
  </div>
  <fieldset id="radiobtn" class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked required>
        <label class="form-check-label" for="gridRadios1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" required>
        <label class="form-check-label" for="gridRadios2">
          Female
        </label>
      </div>

    </div>
  </fieldset>
  
  <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
  </div>
</form>

<footer class="panel-footer">
    <div class="container">
      <div class="row text-center">
        <section id="sms" class="col-sm-4">
          <span>SMS</span><br>
          Your Query to <span>8858</span>
          <hr class="d-sm-none">
        </section>
        
        <section id="call" class="col-sm-4">
          <span>CALL US</span><br>
          Call our Contact Center<br>
          <span>(021) 111 111 111</span>
          <hr class="d-sm-none">
        </section>
        
        <section id="testimonials" class="col-sm-4">
          <span>FEEDBACK & COMPLAINTS</span><br>
          info@elitechoiceinsurance.com<br>
          complaints@elitechoiceinsurance.com
        </section>
      </div>
      <div id="copyright" class="text-center">&copy; 2023 Elite Choice Insurance. All rights reserved.</div>
    </div>
  </footer>
</body>
</html>