
<style>
    <?php 
    session_start();
    include 'navigation.css';
    include 'booking.css';
    ?>
    </style>


    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <title>Booking</title>
    </head>
    <body>


    <header class="header" id="header">
  <nav class="nav containernav">
  <a href="index.php" class="nav__logo"><img id="logo"src="images/logo.png" alt="LOGO"></a>
  <div class="nav__menu" id="nav-menu">
    <ul class="nav__list">
      <li class="nav__item">
        <a href="index.php" class="nav__link">
        <i class='bx bx-home-alt nav__icon'></i>
        <span class="nav__name">Home</span>
        </a>
      </li>
      <li class="nav__item">
        <a href="#" class="nav__link">
        <i class='bx bx-user nav__icon' ></i>
        <span class="nav__name">Profile</span>
        </a>
      </li>
      <li class="nav__item">
        <a href="chart.php" class="nav__link">
        <i class='bx bx-notepad nav__icon'></i>
        <span class="nav__name">Chart</span>
        </a>
      </li>
      <li class="nav__item">
        <a href="yourbookings.php" class="nav__link">
        <i class='bx bxs-plane-alt nav__icon'></i>
        <span class="nav__name">Bookings</span>
        </a>
      </li>
    </ul>
  </div>
  </nav>
</header>
    <Strong><?php if(!isset($_SESSION["day"])){
        echo "<div id='dt'>Select Date & Bus First!</div>";}
        else{
          echo "<div class='notf'>Chart Showing For Date: ".$_SESSION["day"]." ".$_SESSION['month'].", ".$_SESSION['year']." & Bus: ".$_SESSION["busft"]."<br>From: ".$_SESSION['from']." To: ".$_SESSION['to']."</div>";
        }?>
      </Strong>


    <?php
include 'booking_setting.php';
$bus=$_SESSION["bus"];
$conn=mysqli_connect("localhost","root","","$bus");

$date=$_SESSION["date"];
if(!isset($_COOKIE['cseat']) || !isset($_COOKIE['camount'])){
  echo '<script type="text/javascript">';  
  $_SESSION['seatselected']="notok";
  echo 'window.location.href = "index.php";';
  echo '</script>';
}
if(isset($_COOKIE['cseat']) && isset($_COOKIE['camount'])){
    $_SESSION['booking']="counter";
    $cookie=$_COOKIE["cseat"];
    $Final_amount=$_COOKIE["camount"];
    $seat = explode(",",$cookie);
    $len=sizeof($seat);
    echo "<form method='post' name='cusform' action='sucessbooking.php'>";
    for ($x = 0; $x < $len; $x++) {
      $y=$x;
      // echo `<html><body>`;
      echo  "<div class='formele'>";
      echo  "Passenger ".++$y."<br>";

      echo  "<div class='field'>";
  echo '<label for="Seat Number">Seat No:</label><br>';
  echo'<input type="text"  name="seat[]" value="' .$seat[$x]. '" readonly style="text-align: center;"><br>';
  echo  " </div>";

  echo  "<div class='field'>";
  echo'<label for="fname">Full Name:</label><br>';
  echo'<input type="text"  id="fname'.$x.'" name="fname[]" placeholder="Enter Full Name" required><br>';
  echo  " </div>";

  echo'<label for="gender">Gender</label><br>';
  echo' <select type="text" name="gender[]" class="gender"><option value="Male">Male</option><option value="Female">Female</option></select><br>';


  echo  "<div class='field'>";
  echo'<label for="number">Mobile Number:</label><br>';
  echo'<input type="text" id="number'.$x.'" name="number[]" placeholder="10 digit number starting with 9" maxlength="10" minlength="10" pattern="^(9)([0-9]{9})$"required><br>';
  echo  " </div>";

  echo  "<div class='field'>";
  echo'<label for="boaddress">Boarding Address(चढन॓ ठाउ)</label><br>';
  echo'<input type="text" id="boaddress'.$x.'" name="boaddress[]" placeholder="बस चढन॓ ठाउ" required><br>';
  echo  " </div>";

  echo  "<div class='field'>";
  echo'<label for="depaddress">Departure Address(झडन॓ ठाउ)</label><br>';
  echo'<input type="text" id="depaddress'.$x.'" name="depaddress[]" placeholder="झडन॓ ठाउ" required><br>';
  echo  " </div>";
  // echo'<br>';
  echo  "</div>";
      
}
echo'<div class="famt">';

      echo '<label id="finalprice">Final Amount: ';
      if(isset($_COOKIE['camount'])){echo $Final_amount;};
      echo '</label><br>';
      echo '<div class="discount">';
        echo '<label>Total Discount: </label><br> ';
        echo '<input type="number" id="discount" name="discount" value="0" placeholder="0">';
        echo '<label>Advance: </label><br>';
        echo '<input type="number" id ="advance" name="advance" value="0" placeholder="0">';
        echo '<button class="dic" id="apply" type="button" onclick="functionToExecute()">Apply</button>';
      echo '</div>';
      echo '</div>';
      echo '<div id="parent">';
      
           echo '<div class="lower">';
              echo '<input type="submit" id ="payment-button" name="ins" value="Pay '.$Final_amount.'">';
           echo '</div>';

           echo '<div class="upper">';
           echo '<input type="submit" disabled ="disabled" id ="payment-button1" name="ins" value="Pay '.$Final_amount.'">';

           echo '</div>';
      echo '</div>';
      // echo '<input type="submit" id ="sbtbtn" name="ins" value="Pay '.$Final_amount.'">';

echo'</form>'; 
mysqli_close($conn);
}
    ?>

    
    </body>
    <script>

       let  Total_amount_perperson;
       let Total_advance_perperson;
       let Due_amount_perperson;
       let num='<?= $len ?>';
       let people_count = parseInt(num);
        sessionStorage.setItem("num", people_count);
      function functionToExecute(){
       
        let Finalamt = "<?php echo $Final_amount; ?>";
        let people_count = parseInt(num);
        
        let discount=document.getElementById("discount").value;
        let advance=document.getElementById("advance").value;
        let Fdiscount = parseInt(discount);
        let Fadvance = parseInt(advance);
        let Famt = parseInt(Finalamt);
        let discounted_amt=Famt-Fdiscount;
        Total_amount_perperson=discounted_amt/people_count;
        
        Total_advance_perperson=Fadvance/people_count;

        Due_amount_perperson=(discounted_amt-Fadvance)/people_count;
        
        document.getElementById('finalprice').insertAdjacentHTML('beforeend', "-"+discount);
        document.getElementById('payment-button').value = "Pay "+discounted_amt;
        document.getElementById('payment-button1').value = "Pay "+discounted_amt;
        document.getElementById("discount").readOnly = true;
        document.getElementById("advance").readOnly = true;
        document.getElementById("apply").style.display = "none";
      }    
</script>
    <script type="text/javascript" src="booking.js"></script>
    </html>