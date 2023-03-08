<?php
      session_start();
      $y=$_SESSION['number'];
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@400;500;600;700&display=swap");
        

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Work Sans", sans-serif;
}

html {
  font-size: 62.5%;
  /* 1rem = 10px */
  overflow-x: hidden;
}

body {
  overflow-x: hidden;
}
        .dropdown{
  display: flex;
    flex-direction: column;
    align-items: center;
}
.selectbtn{
  background-color: #e7f5ff;
  border: none;
  color: black;
  padding: 5px ;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 5px 0px 15px 0px;
  cursor: pointer;
  font-weight: 500;
}
.bus{
  font-size: 16px;

}

.dat{
  display: flex;
  justify-content: center;
  margin-top: 50px;i
}

.searchbtn{
  display: flex;
  justify-content: center;
}
#amtdtls{
  text-align: center;
  margin-top: 20px;
}
#month{
  margin-right: 23px;
}
#day{
  margin-right: 25px;
}
.notf{
  text-align: center;
  color: green;
  font-size: 15px;
  background-color:#e7f5ff ;
}
#dt{
  color: red;
  text-align: center;
  font-size: 15px;
}
.seatno{
  text-align: center;
}
#abc17{
  display: grid;
  margin-left: 10px;
  margin-top: 497%;
  margin-right: 10px;
}

#ticket-no{
  color: green;
  font-size: medium;
  font-weight: 100;
}
#ticket-amount{
  color: green;
  font-size: medium;
  font-weight: 100;
}
.book{
  display: flex;
  justify-content: center;
}
.button3 {background-color: #008CBA;
  border: none;
  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
} 
.button3 a{
  text-decoration: none;
  color: black;
}
.button2 {background-color: #008CBA;
  border: none;
  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
} 
.button2 a{
  text-decoration: none;
  color: black;
}
.place{
  display: flex;
}
#from{
  margin-right: 42px;
}
#submitbtn{
  border-radius: 6px;
  font-size: 14px;
    background-color: #e693d2;
}
    </style>
    <title>Chart</title>
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
<div class="dat">
      <form  method="post" action="preparechart.php" id="ttt">
      <div><pre class="bus">       From                       To</pre></div>
      <div class="place">
          
      <div>
  <select name="chartfrom" id="from" class="selectbtn" required>
  </select>
</div>

      <div>
  <select name="chartto" id="to" class="selectbtn" required>
  </select>

</div>
</div>
      <div class="dropdown">
          <div><label class="bus">Select Bus</label></div>
      <div>
  <select name="chartbus" id="bus" class="selectbtn" required>
  </select>
</div>
</div>
      <div><pre class="bus">     Month          Day         Year</pre></div>
      <select type="text" name="chartmonth" id="month" class="selectbtn" required></select>
      

      <select type="text" name="chartday" id="day" class="selectbtn" value="day" required></select>
     
      <select type="text" name="chartyear" id="year" class="selectbtn">
        <option value="2079">2079</option>
      </select>
   
      <div class="searchbtn">
          <a id="preparecrt" style="display:none;"><button style="background-color: green;"type="submit" name="chartchart" value="search" id="submitbtn" class="selectbtn">
            Chart Prepared Download
          </button></a>
      <a id="rrrrr" onclick="alertmessage()"><button type="button" name="chart" value="search" id="submitbtn" class="selectbtn">Prepare chart</button></a>
      </div>
      
    </form>
  </div>
      
      <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript" src="jquery-3.6.1.min.js"></script> 
    <script>
  function alertmessage(){
  let numbook='<?= $y ?>';
  let busselected=sessionStorage.getItem('bus');
  console.log(typeof(busselected));
  var s=['9815842010']
  var ifbook = [
  { bus: "Sangrila", number:s},
];
ifbook.forEach(function(value,index){
  if(busselected===value.bus){
    numbersarr=value.number;
    console.log(numbersarr)
    numbersarr.forEach(function checknumber(item, index, arr){
      if(numbook==arr[index]){
        document.getElementById("preparecrt").style.display="block";
        document.getElementById("rrrrr").style.display="none";
        document.getElementById("preparecrt").setAttribute("href", "preparechart.php");
        document.getElementById('preparecrt').addEventListener("click",function(){
          document.getElementById("preparecrt").style.display="none";
        });
      }
      else{
        swal.fire("You are not allowed to prepare Chart");
      }
    })
  }
})
};
alertmessage()
</script>
<style>
    <?php 
    include 'navigation.css';
    ?>
    </style>
</body>
</html>