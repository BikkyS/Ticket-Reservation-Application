<?php
session_start();
$from=$_POST['from'];
$to=$_POST['to'];
$busft=$_POST['bus'];
if(isset($_COOKIE['cseat'])){
    setcookie('cseat', false);
   }
if(isset($_COOKIE['camount'])){
    setcookie('camount', false);
   }
if($from=="Select From"){
    header("location:index.php");
}
else if($to=="Select To"){
    header("location:index.php");
}
else if(($busft=="No Bus Available")||($busft=="Select Bus")){
    header("location:index.php");
}
$_SESSION["busft"]=$busft;
$bus=$busft.$from.$to;
$bus=strtolower($bus);
$conn=mysqli_connect("localhost","root","","$bus");


$_SESSION['notfication']="ok";
if(isset($_POST["search"])){
    
  
    $month=$_POST['month'];
    $x;
    $months = array("Baishakh", "Jestha", "Ashadh", "Shrawan", "Bhadau", "Ashwin", "Kartik", "Mangsir", "Poush", "Magh", "Falgun", "Chaitra");
    for($x=0;$x<=11;$x++){
        if($month==$months[$x]){

            $_SESSION['month']=$months[$x];
            // echo $_SESSION['month'];
        }
    }
    $day=$_POST['day'];
    $_SESSION['day']=$day;
    $year=$_POST['year'];
    $_SESSION['year']=$year;
    $date=$day."_".$month."_".$year;
    
        $_SESSION["date"]=$date;
        $_SESSION["bus"]=$bus;
        $_SESSION["from"]=$from;
        $_SESSION["to"]=$to;
    try{
        if(!(mysqli_query($conn,"SELECT * FROM $date"))){
            
        throw new Exception('table not exists\n');
        }
    }
    catch(Exception $e){
                mysqli_query($conn,"CREATE TABLE `$bus`.`$date` (`Seatno` VARCHAR(500) NOT NULL ,`TicketID` varchar(255) NOT NULL,`Full Name` TEXT NOT NULL , `Gender` TEXT NOT NULL ,`Mobile Number` TEXT NOT NULL , `Boarding Address` TEXT NOT NULL , `Departure Address` TEXT NOT NULL ,`From` TEXT NOT NULL,`To` TEXT NOT NULL, `BookedBy` VARCHAR(255) NOT NULL,`Total Amount` INT(255) NOT NULL,`Advance Amount` INT(255) NOT NULL,`Due Amount` INT(255) NOT NULL ,`Status` TEXT NOT NULL, `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY (TicketID) REFERENCES allbooking(TicketID) ON UPDATE CASCADE)");
                // echo $to;
    }
    finally{
        $sql="SELECT * FROM $date";
        $result=mysqli_query($conn,$sql);
        $x=0;
        while($row= mysqli_fetch_assoc($result)){
            $_SESSION['row_counts_'.++$x]=$row['Seatno'];
        }
    }
    $_SESSION['num']=$x;
    header("location:index.php");
    mysqli_close($conn);
}
?>