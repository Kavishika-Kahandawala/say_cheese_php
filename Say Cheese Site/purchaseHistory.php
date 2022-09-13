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
<title>Purchase history</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>
</head>

<body>
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
			  <a class="active" href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
  <tr>
    <td colspan="8">
		<table border="0"  align="center">
      <tr>
		  <td class="tdmiddle"><h2>Purchase History</h2></td>
          <div class="container">
            <table border="0" width="800" align="center">
				<?php
				
				$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
				
				$sql="SELECT * FROM `payements` WHERE `username` = '".$_SESSION["userName"]."'; ";
				
				$result = mysqli_query($con,$sql);
				
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$str = $row["products"];
						$colors = explode(",",$str);
						foreach ($colors as $value)
						{
							$st=(int)$value;
							
							$prodsql="SELECT * FROM `products` WHERE `productID` = '".$value."'; ";
							
							$prodresult = mysqli_query($con,$prodsql);
							if (mysqli_num_rows($prodresult)>0)
							{
								$prodrow = mysqli_fetch_assoc($prodresult);
								echo "<tr>
						<td rowspan='3' width='200'><a href='viewProduct.php?id=".$prodrow["productID"]."'><img title='view image' src='".$prodrow["imgPath"]."' class='cover' width='150' height='150' style='object-fit: cover;'></a></td>
						
						
						<td><a href='viewProduct.php?id=".$prodrow["productID"]."' style='text-decoration:none'>".$prodrow["title"]."</a></td></tr>
						
						
						<tr><td>".$prodrow["description"]."</td></tr>
						
						<tr><td>Rs. ".$prodrow["price"]."</td>
						<td class='tdright'>Purchased Date: ".$prodrow["date"]."</td></tr>
						<tr><td colspan='8'><hr></td></tr>
						</tr>";
							}
						}
						
							/*echo "<tr>
						<td><div class='imgcontainer'><img src='".$row["imgPath"]."' width='150' height='150' ></div></td>
						<td>'".$row["description"]."'</td>
						<td><a href='editUploads.php?id=".$row["productID"]."'><img src='images/edit2.png' alt='' width='32' height='34' />Edit</a></td>
						<td><a href='deleteProduct.php?id=".$row["productID"]."'><img src='images/delete.jpg' alt='' width='32' height='34' />Delete </a></td>
						<td><a href='viewProduct.php?id=".$row["productID"]."'><img src='images/delete.jpg' alt='' width='32' height='34' />View </a></td>
						</tr>";*/
						
					}
				}else
				{
					echo "#pic to show no payment history";
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
