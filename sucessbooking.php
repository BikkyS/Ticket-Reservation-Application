<?php
session_start();

if($_SESSION['booking']=="counter"){
$bus=$_SESSION["bus"];
$_SESSION["booked"]="ok";
$db=mysqli_connect("localhost","root","","allbooking");
$conn=mysqli_connect("localhost","root","","$bus");
$date=$_SESSION["date"];
$busftt=$_SESSION["busft"];
$cookie=$_COOKIE["cseat"];
$Final_amount=$_COOKIE["camount"];
$seat = explode(",",$cookie);
$len=sizeof($seat);
$mainnumber=$_SESSION['number'];
$from=$_SESSION['from'];
$to=$_SESSION['to'];

$Final_amount=(int)$Final_amount;
  $discount=$_POST['discount'];
  $discount=(int)$discount;
  $advance=$_POST['advance'];
  $advance=(int)$advance;
  $status=$_SESSION['booking'];
  $total_amount_per_person=($Final_amount-$discount)/$len;
  $advance_amount_perperson=$advance/$len;
  $due_amount=$total_amount_per_person-$advance_amount_perperson;


if(isset($_SESSION['date'])){
  $seat=$_POST['seat'];
  $fname=$_POST['fname'];
  $gender=$_POST['gender'];
  $number=$_POST['number'];
  $boaddress=$_POST['boaddress'];
  $depaddress=$_POST['depaddress'];
  
 foreach($seat as $index=>$seats){
  $last=rand(11111,99999);
 $uniqticketno=uniqid("T").$last;
 $sql="INSERT INTO `allbookings`(`Bus`,`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`bookingdate`,`Status`) VALUES ('$busftt','$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$date','$status')";
    $stmt=mysqli_prepare($db,$sql);
    mysqli_stmt_execute($stmt);

        $sql="INSERT INTO `allbooking`(`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`Status`) VALUES ('$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$status')";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_execute($stmt);


    $sql="INSERT INTO `$date`(`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`Status`) VALUES ('$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$status')";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_execute($stmt);
 }}
}
elseif($_SESSION['booking']=="online"){
  echo $_SESSION['status'];
    echo $_SESSION['booking'];
  $bus=$_SESSION["bus"];
$_SESSION["booked"]="ok";
$db=mysqli_connect("localhost","root","","allbooking");
$conn=mysqli_connect("localhost","root","","$bus");
$date=$_SESSION["date"];
$busftt=$_SESSION["busft"];
$cookie=$_COOKIE["cseat"];
$Final_amount=$_COOKIE["camount"];
$status=$_SESSION['booking'];
$seat = explode(",",$cookie);
$len=sizeof($seat);
$mainnumber=$_SESSION['number'];
$from=$_SESSION['from'];
$to=$_SESSION['to'];
$total_amount_per_person=($Final_amount)/$len;
$Final_amount=(int)$Final_amount;
  $discount=$_POST['discount'];
  if($discount==='yatri100' || $discount==='YATRI100'){
  $total_amount_per_person=($Final_amount-100)/$len;
  }
  $advance_amount_perperson=0;
  $due_amount=0;


if(isset($_SESSION['date'])){
  $seat=$_POST['seat'];
  $fname=$_POST['fname'];
  $gender=$_POST['gender'];
  $number=$_POST['number'];
  $boaddress=$_POST['boaddress'];
  $depaddress=$_POST['depaddress'];
  
  foreach($seat as $index=>$seats){
    $last=rand(11111,99999);
   $uniqticketno=uniqid("T").$last;
   $sql="INSERT INTO `allbookings`(`Bus`,`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`bookingdate`,`Status`) VALUES ('$busftt','$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$date','$status')";
      $stmt=mysqli_prepare($db,$sql);
      mysqli_stmt_execute($stmt);
  
          $sql="INSERT INTO `allbooking`(`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`Status`) VALUES ('$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$status')";
      $stmt=mysqli_prepare($conn,$sql);
      mysqli_stmt_execute($stmt);
  
  
      $sql="INSERT INTO `$date`(`Seatno`,`TicketID`,`Full Name`,`Gender`,`Mobile Number`,`Boarding Address`,`Departure Address`,`From`,`To`,`BookedBy`,`Total Amount`,`Advance Amount`,`Due Amount`,`Status`) VALUES ('$seats','$uniqticketno','$fname[$index]','$gender[$index]','$number[$index]','$boaddress[$index]','$depaddress[$index]','$from','$to','$mainnumber','$total_amount_per_person','$advance_amount_perperson','$due_amount','$status')";
      $stmt=mysqli_prepare($conn,$sql);
      mysqli_stmt_execute($stmt);
   }}
}
 header("location:index.php");

 ?>


