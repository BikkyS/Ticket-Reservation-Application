
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
      <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
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
$_SESSION["booking"]="online";
$conn=mysqli_connect("localhost","root","","$bus");

$date=$_SESSION["date"];
if(!isset($_COOKIE['cseat']) || !isset($_COOKIE['camount'])){
  echo '<script type="text/javascript">';  
  $_SESSION['seatselected']="notok";
  echo 'window.location.href = "index.php";';
  echo '</script>';
}
if(isset($_COOKIE['cseat']) && isset($_COOKIE['camount'])){
    $cookie=$_COOKIE["cseat"];
    $Final_amount=$_COOKIE["camount"];
    $seat = explode(",",$cookie);
    $len=sizeof($seat);
    echo "<form method='post' id='cusform' name='cusform' action='sucessbooking.php'>";
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
         echo '<div class="discount1">';
        echo '<label>Coupon Code: </label><br> ';
        echo '<input type="text" id="discount1" name="discount"  placeholder="Coupon Code">';

        echo '<button class="dic" id="apply1" type="button" onclick="functionToExecute()">Apply</button>';
      echo '</div>';
      echo '</div>';
      echo '<button type="submit" disabled="disabled" id ="btnclass" name="ins" style="display:none">Pay With Khalti</button>';

      echo '<div id="parent">';
      
           echo '<div class="lower">';
              echo '<button type="button" id ="payment-button" >Pay With Khalti<br>';
              echo "$Final_amount</button>";
           echo '</div>';

           echo '<div class="upper">';
              echo '<button type="submit" id ="payment-button1" name="ins">Pay With Khalti<br>';
              echo "$Final_amount</button>";
           echo '</div>';
      echo '</div>';
      



echo'</form>'; 
mysqli_close($conn);
}
    ?>
    </body>
    <script>
       let  Total_amount_perperson;
       let Finalamt = "<?php echo $Final_amount; ?>";
       let num='<?= $len ?>';
       let people_count = parseInt(num);
       let disctamt;
       sessionStorage.setItem("num", people_count);
      function functionToExecute(){
      
        let code=document.getElementById("discount1").value;
        if(code=="YATRI100" || code=="yatri100"){
             disctamt=100;
             Finalamt=Finalamt-disctamt;
             console.log(Finalamt);
        }
        else{
            swal.fire('Invalid Coupon Code');
        } 
        document.getElementById('finalprice').insertAdjacentHTML('beforeend', "-"+disctamt+"="+Finalamt);
        document.getElementById('payment-button').innerHTML = "Pay with Khalti<br>"+Finalamt;
        document.getElementById('payment-button1').innerHTML = "Pay with Khalti<br>"+Finalamt;
        document.getElementById("discount1").readOnly = true;
        // document.getElementById("advance").readOnly = true;
        document.getElementById("apply1").style.display = "none";
      }


 
      var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_68ed870d2f2749d1afdf822c24afef4d",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "https://sgfxjgc.tech",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    // window.location = "khaltiverify.php";
                    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Confirming Payment!',
  showConfirmButton: false,
  timer: 5000
})
                    $.ajax({
                      url:"khaltiverify.php",
                      method:"post",
                      data: payload,
                      success: function(res){
                        document.getElementById("btnclass").removeAttribute("disabled");
                        document.getElementById("btnclass").click();
                      }
                    });
                    
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }

      
       
</script>
<script type="text/javascript" src="booking.js"></script>
    </html>


