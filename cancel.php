<?php
session_start();
   $buscn=$_POST['busdb'];
   $bookingdate=$_POST['bookingdate'];
   $seatno=$_POST['seatno'];
   $cancelid=$_POST['tktid'];
   $canceli=strtolower($cancelid);
    $db=mysqli_connect("localhost","root","","allbooking");
    $sql="DELETE FROM `allbookings` WHERE `allbookings`.`TicketID` = ?";
    $stmt=mysqli_prepare($db,$sql);
    mysqli_stmt_bind_param($stmt,"s",$param_tktid);
    $param_tktid=$canceli;
    mysqli_stmt_execute($stmt);
    echo "Deleted";
    mysqli_close($db);


   $busdd=strtolower($buscn);
echo $busdd;
echo $canceli;
$conni=mysqli_connect("localhost","root","","$busdd");
 $sql="UPDATE `allbooking` SET `Seatno` = '$seatno(canceled)' WHERE `allbooking`.`TicketID`=?";
 $stmt=mysqli_prepare($conni,$sql);
 mysqli_stmt_bind_param($stmt,"s",$param_tktid);
 $param_tktid=$canceli;
 mysqli_stmt_execute($stmt);


 $sql="UPDATE `$bookingdate` SET `Seatno` = '$seatno(canceled)' WHERE `$bookingdate`.`TicketID`=?";
 $stmt=mysqli_prepare($conni,$sql);
 mysqli_stmt_bind_param($stmt,"s",$param_tktid);
 $param_tktid=$canceli;
 mysqli_stmt_execute($stmt);
 mysqli_close($conni);


header("location:yourbookings.php");
$_SESSION["canceltkt"]="ok";
?>



