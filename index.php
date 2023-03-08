<?php
session_start();
$y=$_SESSION['number'];
if(isset($_COOKIE['cseat'])){
  setcookie('cseat', false);
 }
if(isset($_SESSION["busft"])){
  $z=$_SESSION["busft"];
}
if(!isset($_COOKIE["number"])){
  header("location:login.php");
}
?>
<script>
  window.history.forward();
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
    <title>Bus Booking</title>
    
    <style>
    <?php 
    include 'navigation.css';
    include 'main.css';
    ?>
    </style>
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
    <div class="section">

    <div class="dat">
      <form  method="post" action="date_fetch_store_database.php" id="ttt">
      <div><pre class="bus">       From                       To</pre></div>
      <div class="place">
          
      <div>
  <select name="from" id="from" class="selectbtn" required>
  </select>
</div>

      <div>
  <select name="to" id="to" class="selectbtn" required>
  </select>

</div>
</div>
      <div class="dropdown">
          <div><label class="bus">Select Bus</label></div>
      <div>
  <select name="bus" id="bus" class="selectbtn" required>
  </select>
</div>
</div>
      <div><pre class="bus">     Month          Day         Year</pre></div>
      <select type="text" name="month" id="month" class="selectbtn" required></select>
      

      <select type="text" name="day" id="day" class="selectbtn" value="day" required></select>
     
      <select type="text" name="year" id="year" class="selectbtn">
        <option value="2079">2079</option>
      </select>
      <div class="searchbtn">
              <button type="submit" name="search" value="search" id="submitbtn" class="selectbtn">search</button>
      </div>
    </form>
  </div>
      <Strong><?php if(!isset($_SESSION['notfication'])){
        echo "<div id='dt'>Search the CHART first!</div>";}
        elseif($_SESSION['notfication']=="ok"){
          echo "<div class='notf'>Chart Showing For Date: ".$_SESSION["day"]." ".$_SESSION['month'].", ".$_SESSION['year']." & Bus: ".$_SESSION["busft"]."<br>From: ".$_SESSION['from']." To: ".$_SESSION['to']."</div>";
        }?>
      </Strong>
      <div class="availability">
      <div class="available">.</div>
      <div>Available</div>
      <div class="booked">.</div>
      <div class="">Booked</div>
    </div>


      <div class="container">
          <div class="row" id="main">
          </div>
          <div class="row" id="main3">
          </div>
          <div class="row" id="main4">
          </div>
          <div class="row" id="main2">
          </div>
</div>
<div id="amtdtls"><pre>Ticket Number: </pre><span id="ticket-no"></span><br/>
      <pre>Total Amount: </pre><span id="ticket-amount"></span></div>
      <div class="book" id="button2"><button class="button2" onclick="alertFunction()"><a href="#.php">Book</a></button></div>
      <script>function alertFunction(){Swal.fire("Search the CHART first!")};</script>
      <?php
if(isset($_SESSION['notfication'])){
echo '<script>document.getElementById("button2").style.display="none";</script>';
        echo '<div class="book">';
          echo '<a id="button3" onclick="alertmessage()"><button class="button3" >Book</button></a>';
        echo '</div>';
unset($_SESSION['notfication']);
}

?> 
<script>
  function alertmessage(){
  let numbook='<?= $y ?>';
  let busselected='<?= $z ?>';
  let booking="counter";
  let booking1="online";
  var sangrila=['9815842010']
  var Shivparvati=['9849487445']
  var ifbook = [
  { bus: "Sangrila", number:sangrila},
  { bus: "Shivparvati", number:Shivparvati},
];
ifbook.forEach(function(value,index){
  if(busselected===value.bus){
    numbersarr=value.number;
    console.log(numbersarr)
    numbersarr.forEach(function checknumber(item, index, arr){
      if(numbook==arr[index]){
        document.getElementById("button3").setAttribute("href", "booking.php");
      }
      else{
        document.getElementById("button3").setAttribute("href", "booking1.php");
      }
    })
  }
})
};
</script>
   
    
    <script type="text/javascript" src="bus.js"></script>

    <?php
    $x;
   if(isset($_SESSION['num'])){
    $x=$_SESSION['num'];
    if($x>0){
    for($i=1;$i<=$x;$i++){
      $jscpt[$i]=$_SESSION['row_counts_'.$i];
    }
    $result=implode(",",$jscpt);
  }
}

    ?>
    
    <script>
      let num='<?= $x ?>';
      let result='<?= $result ?>';
      console.log(num);
      var arr=result.split(',');
      console.log(arr);
      console.log(result);
      for(let i=0;i<arr.length;i++){
        let text1 = "abc";
        let text2 = arr[i];
        let result = text1.concat(text2);
        if(result.length>6){
        console.log(result.length)
        }
        else{
        var mysct=document.getElementById(result);
        mysct.style.backgroundColor='red';
      }
     
      }
    </script>
    <?php
    unset($_SESSION['num']);
    ?>
   
    <?php
    if(isset($_SESSION['busft'])){
    if(($_SESSION['busft']=="No Bus Available")||($_SESSION['busft']=="Select Bus")){
      echo '<script>Swal.fire("Select Bus!");</script>';
    }
  }
  if(isset($_SESSION["booked"])){
    echo '<script>swal.fire("success!", "Ticked Booked", "success");</script>';
  }
  unset($_SESSION["booked"]);
  if(isset($_SESSION["login"])){
    echo '<script>swal.fire("Login Sucessfull");</script>';
  }
  unset($_SESSION["login"]);
  if(isset($_SESSION['seatselected'])){
    echo '<script>swal.fire("Select Seat Number");</script>';
    unset($_SESSION['seatselected']);
   }
    ?>
  </div>
</body>
</html>




 
      
