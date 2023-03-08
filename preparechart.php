
<?php
// header("Content-type: application/vnd.ms-word");
// header("Content-Disposition:attachment; Filename=prepchart.doc");
session_start();
$from=$_POST['chartfrom'];
$to=$_POST['chartto'];
$busft=$_POST['chartbus'];
$z=$busft;
$bus=$busft.$from.$to;
$bus=strtolower($bus);
$conn=mysqli_connect("localhost","root","","$bus");
if(isset($_POST["chartchart"])){
    $day=$_POST['chartday'];
    $year=$_POST['chartyear'];
    $month=$_POST['chartmonth'];
    $date=$day."_".$month."_".$year;
    $res=mysqli_query($conn,"SELECT * FROM $date");
    $html;
    if(mysqli_num_rows($res)>0){
        $html='<html>
        <table align="center"  border="1"  width="100%" cellspacing="0" style="text-align: center;"> 
	<tr> 
		<th colspan="11"><h5 style="font-size: 15px;">'.$busft.'   Bookings ('.$date.')</h5></th> 
		<tr> 
			  <th style="font-size: 9px;">Seat Number</th> 
			  <th style="font-size: 9px;">Name</th> 
			  <th style="font-size: 9px;">Ticket ID</th> 
			  <th style="font-size: 9px;">Mobile Number</th> 
			  <th style="font-size: 9px;">Boarding Address</th> 
			  <th style="font-size: 9px;">Departure Address</th> 
			  <th style="font-size: 9px;">Booked By</th> 
			  <th style="font-size: 9px;">Total Amount</th> 
			  <th style="font-size: 9px;">Advance Amount</th> 
			  <th style="font-size: 9px;">Due Amount</th> 
			  <th style="font-size: 9px;">Status</th> 
			  
		</tr><tbody>';
		
		while($rows=mysqli_fetch_assoc($res)) 
		{ 
            $html.='<tr>
            <td style="font-size: 9px;">  '.$rows['Seatno'].'</td> 
		 <td style="font-size: 9px;"><pre>'.$rows['Full Name'].'</pre></td>
	    <td style="font-size: 9px;">'.$rows['TicketID'].'</td> 
		<td style="font-size: 9px;">'.$rows['Mobile Number'].'</td> 
		<td style="font-size: 9px;">'.$rows['Boarding Address'].'</td> 
		<td style="font-size: 9px;">'.$rows['Departure Address'].'</td> 
		<td style="font-size: 9px;">'.$rows['BookedBy'].'</td> 
		<td style="font-size: 9px;">'.$rows['Total Amount'].'</td> 
		<td style="font-size: 9px;">'.$rows['Advance Amount'].'</td> 
		<td style="font-size: 9px;">'.$rows['Due Amount'].'</td> 
		<td style="font-size: 9px;">'.$rows['Status'].'</td> 
		</tr>'; 
    } 
    $html.='</tbody></table></html>';
            }
               
    }
    
    else{
            echo "no record found";
    }
	echo $html;
?>

