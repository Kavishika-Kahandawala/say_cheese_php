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
<title>My cart</title>
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
			  <a class="active" href="myCart.php"><img src="Resources/Images/other/cart.png" height="25px"></a>
			  <a href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
  <tr>
    <td colspan="8">
		<table border="0"  align="center">
      <tr>
        <td>
            <table border="0">
				<?php
				
				$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
				
				$outersql="SELECT `productID` FROM `usercart` WHERE `username` = '".$_SESSION["userName"]."'; ";
				
				$outerresult = mysqli_query($con,$outersql);
				
				if (mysqli_num_rows($outerresult)>0)
				{
					while($outerrow = mysqli_fetch_assoc($outerresult))
					{
						$innersql="SELECT * FROM `products` WHERE `productID` = '".$outerrow["productID"]."'; ";
						$innerresult = mysqli_query($con,$innersql);
						if (mysqli_num_rows($innerresult)>0)
						{
							while($innerrow = mysqli_fetch_assoc($innerresult))
							{
								echo "<tr>
								<td><div class='imgcontainer'><img src='".$innerrow["imgPath"]."' width='150' height='150' ></div></td><td width='20'></td>
								<td width='200'>".$innerrow["title"]."</td>
								<td><a href='removeFromCart.php?id=".$innerrow["productID"]."'><i class='fa-solid fa-x'></i> </a></td>
								</tr>
								<tr><td colspan='5'><hr></td></tr>";
							}
						}
					}
				}else{
					echo "<h2>Nothing Here. Why waiting? Add some stuff</h2>";
				}
				  
				  ?>
            </table>
			  <tr><td class="tdmiddle"><a href='payementGateway.php'><button type='button' class="button">Go to checkout</button></a></td></tr>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
