
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
    <script>
        if( window.history.replaceState ){
            window.history.replaceState(null,null,window.location.href);
        };
    </script>
    <?php
    require_once('signup.php');
    ?>
     <style>
    <?php 
    include 'signup.css';
    ?>
    </style>
    
</head>
<body>
<div class="bg-signup-modal">
        <div class="modal-signup-content">
          <div class="close1">+</div>
            <h2>SIGNUP</h2>
            <form id="contactForm" method="post" onsubmit="return validateForm()" name="myForm">
                <label>First Name</label>
                <input type="text" placeholder="FirstName" name="fname" maxlength="20">

                <label>Last Name</label>
                <input type="text" placeholder="Last Name" name="lname" maxlength="20">

                <label>Mobile Number</label>
                <select>
                    <option>+977</option>
                </select>
                <input type="text" placeholder="10 digit number" name="number" maxlength="10">

                <label>Password</label>
                <input type="password" placeholder="Password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" required="">
                <div id="message">
                Password must contain the following:
  <span id="letter" class="invalid">lowercase letter</span>
  <span id="capital" class="invalid">uppercase letter</span>
  <span id="number" class="invalid">number</span>
  <span id="characters" class="invalid">Special Character</span>
  <span id="length" class="invalid">Minimum 8 characters</span>
</div>

                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm Password" id="confirm_pass" name="confirm_password" required onkeyup="validate_password()">
                <span id = "wrong_pass_alert"></span>
                <button type="submit"  id="create" onclick="wrong_pass_alert()" class="submit_btn">Signup</button>
            </form>
            <div>Already Registered?<a href="login.php"><b> Login Here</b></a></div>
        </div>
    </div>
    <script type="text/javascript" src="signup.js"></script>
<?php
if(isset($_SESSION["signupsucess"])){
    echo '<script>swal.fire("hurray!", "Signup Sucessfull", "success");</script>';
  }
  unset($_SESSION["signupsucess"]);
if(isset($_SESSION["signupfailed"])){
    echo '<script>swal.fire("Oops!", "This Number is Already Registered", "failed");</script>';
  }
  unset($_SESSION["signupfailed"]);
?>
</body>
</html>