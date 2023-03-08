<?php  
session_start();
$conn=mysqli_connect("localhost","root","","allbooking");
$mainnumber=$_SESSION['number'];
$query="SELECT * FROM allbookings WHERE BookedBy='$mainnumber' ORDER BY ID DESC"; 
$result=mysqli_query($conn,$query); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Bookings</title>
  <style>
    <?php 
    include 'youbookings.css';
    include 'navigation.css';
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
<section>
<div class="table-container">
<h2 class="heading">Your Bookings</h2>
	<table class="table"> 
  <thead>
	<tr> 
			  <th> Name </th> 
			  <th> Bus </th> 
			  <th> Booking Date </th> 
			  <th> Seat Number  </th> 
			  <th> Ticket ID </th> 
			  <th> Boarding Address </th> 
			  <th> Departure Address </th> 
			  <th> Due Amount </th> 
			  <th> Cancel </th>  
			  
		</tr> 
</thead>
<tbody>
<?php while($rows=mysqli_fetch_assoc($result)) 
		{ $ticketid=$rows['TicketID'];
			$bookingdate=$rows['bookingdate'];
			$seatno=$rows['Seatno'];
			$bus=$rows['Bus'].$rows['From'].$rows['To'];
		?> 
		<tr> 
      <td data-label="Name"><?php echo $rows['Full Name'];?>
    </td> 
      <td data-label="Bus"><?php echo $rows['Bus'];?>
    </td> 
	    <td data-label="Journey Date"><?php echo $rows['bookingdate']; ?>
    </td> 
	    <td data-label="Seat Number"><?php echo $rows['Seatno']; ?>
    </td> 
		<td data-label="Ticket ID"><?php echo $rows['TicketID']; ?>
  </td> 
		<td data-label="Boarding From"><?php echo $rows['Boarding Address']; ?>
  </td> 
		<td data-label="Departure To"><?php echo $rows['Departure Address']; ?>
  </td> 
		<td data-label="Due Amount"><?php echo $rows['Due Amount']; ?>
  </td> 
 <td>
        <form action="cancel.php" method="POST">
			<input type="hidden" name="tktid" value="<?php echo $ticketid;?>">
			<input type="hidden" name="seatno" value="<?php echo $seatno;?>">
			<input type="hidden" name="bookingdate" value="<?php echo $bookingdate;?>">
			<input type="hidden" name="busdb" value="<?php echo $bus;?>">
			<button class="cnclbtn"  type="button" onclick="alertmessage()" name="delete">Cancel</button>
			<button class="cnclbtn" type="submit" id="delete" style="display:none" disabled="disabled" name="delete">Cancel</button>
      </form>
    </td>
		</tr> 
	<?php 
               } 
			   mysqli_close($conn);
          ?> 
  </tbody>
	</table> 
  </div>
  </section>
  <?php
if(isset($_SESSION["canceltkt"])){
  echo '<script>swal.fire("success!", "Ticked Cancelled", "success");</script>';
}
unset($_SESSION["canceltkt"]);
  ?>
  <script>
    function alertmessage(){
      Swal.fire({
  title: 'Are you sure want to cancel?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Cancel it!'
}).then((result) => {
  if (result.isConfirmed) {
    document.getElementById("delete").removeAttribute("disabled");
      document.getElementById("delete").click();
  }
})
    }
  </script>
</body>
</html>










