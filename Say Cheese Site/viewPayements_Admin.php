<?php session_start(); 
if($_SESSION["userName"]!="admin")
{
	session_destroy();
	header('Location:login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View uploads | Admin</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
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
  <tr>
    <td colspan="8">
		<table border="0"  align="center">
			<tr><td class="tdmiddle"><h2>All Payments</h2></td></tr>
      <tr>
        <td>
			  
            <table border="0" width="800" align="center">
				<form name="discover" method="post" action="viewPayements_Admin.php">
					<tr>
					<td width="80">Pay ID</td>
					<td>Username</td>
					<td>Amount</td>
					<td>Product IDs</td>
					<td>Date</td>
					<td>Card Ending Digits</td>

					</tr>
				<tr><td></td></tr>
				<?php
				
				$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}

				$sql="SELECT * FROM `payements`; ";
				
				$result = mysqli_query($con,$sql);
				
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>
						<td width='20'>".$row["payID"]."</td>
						
						
						<td>".$row["username"]."</td>
						
						
						<td>".$row["amount"]."</td>
						<td>".$row["products"]."</td>
						<td>".$row["date"]."</td>
						<td>".$row["cdDigits"]."</td>
						
						</tr>";
					}
				}
				  
				  ?>
            </table>
			  
          </div>
          <div class="container" style="background-color:#f1f1f1"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
