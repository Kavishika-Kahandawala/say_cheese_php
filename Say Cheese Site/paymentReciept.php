<?php session_start(); 
if(!isset($_SESSION["userName"]))
{
   header('Location:login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Receipt</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>
</head>

<body>
	
	<table border="0" align="center" width="100%">
		<tr>
		  <td colspan="7"><div class="topnav">
			  <div class="topnav-right">
			  <a href="Homepage.html">Home</a>
			  <a href="mailto:contact@saycheese.com">Contact</a>
			  <a href="#about">About</a>
			  <a href="discover.php">Discover</a>
			  <a href="myCart.php"><img src="Resources/Images/other/cart.png" height="25px"></a>
			  <a href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
		<tr><td colspan="8">
			<form name="editProduct" action="paymentReciept.php" method="post" enctype="multipart/form-data">
      <table border="0" align="center">
		  <tr><td class="tdmiddle" colspan="8"><span class="">
		  <h2>Payment Successful !</h2></span></td></tr>
      <tr><td class="tdmiddle" colspan="8">
        <i class="fa-regular fa-circle-check fa-9x" style="color: green"></i><br><br><br><br></td>
        </tr>
		  <?php
		  
		  $con = mysqli_connect( "localhost", "root", "", "saycheese_db" );
		  
		  if ( !$con ) {
			  die( "Cannot connect to DB Server" );
		  }
		  
		  $sql ="SELECT * FROM `payements` WHERE `username`='".$_SESSION["userName"]."' ORDER BY `payID` DESC LIMIT 1 ;";
		  $result = mysqli_query($con,$sql);
		  
		  if (mysqli_num_rows($result)>0)
				{
					$row = mysqli_fetch_assoc($result);
		  
		  ?>
		  
		  <tr>
		  <td colspan="3"><span class="">Transaction ID</td>
		  <td colspan="2"> </td>
		  <td colspan="3"><span class=""><?php echo $row["payID"]; ?> </span></td>
		  </tr>
		  <tr><td colspan="8"><hr></td></tr>
		  
      <tr>
		  <td colspan="3"><span class="">User Name</span></td>
		  <td colspan="2"> </td>
		  <td colspan="3"><span class=""><?php echo $_SESSION["userName"]; ?> </span></td>
		  </tr>
		  <tr><td colspan="8"><hr></td></tr>
		  
		  <tr>
		  <td colspan="3"><span class="">Date</span></td>
		  <td colspan="2"> </td>
		  <td colspan="3"><span class=""><?php echo $row["date"]; ?> </span></td>
		  </tr>
		  <tr><td colspan="8"><hr></td></tr>
		  
		  <tr>
		  <td colspan="3"><span class="">Payement Details</span></td>
		  <td colspan="2"> </td>
		  <td colspan="3"><span class="">**** **** **** <?php echo $row["cdDigits"]; ?> </span></td>
		  </tr>
		  <tr><td colspan="8"><hr></td></tr>
		  
		  <tr>
		  <td colspan="3"><span class="">Amount Paid</span></td>
		  <td colspan="2"> </td>
		  <td colspan="3"><span class="">Rs. <?php echo $row["amount"]; ?> </span></td>
		  </tr>
		  <tr><td colspan="8"><hr></td></tr>
		  
      <tr>
        <td colspan="8" class="tdmiddle"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <button type='button' class="button" onclick="window.print();">Print</button></blockquote>
			</td></tr><tr><td class="tdmiddle" colspan="8">
			
			<a href="myProfile.php"><button type='button' class="button">Leave Page</button></a>
         
        </td>
        </tr>
		  <?php
		  }
		  ?>
		  
    </table>
			</form>
    </td>
  </tr>
</table>
</body>
</html>
