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
<title>Discover | Say Cheese</title>
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>
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
			  <a class="active" href="discover.php">Discover</a>
			  <a href="myCart.php"><img src="Resources/Images/other/cart.png" height="25px"></a>
			  <a href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
  <tr>
    <td colspan="8">
		<table border="0"  align="center">
      <tr>
        <td>
			
          <div class="container">
            <table border="0" width="800" align="center">
				<form name="discover" method="post" action="search.php">
					<tr><td colspan="8"><br><input type="text" name="txtSearch" id="txtSearch" placeholder="Type anything to search"/></td><td width="147">
						<input name="btnSearch" type="submit" class="button" id="btnSearch" value="Search"/>
						</td></tr>

				<?php
				
				$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
				
				$sql="SELECT * FROM `products` WHERE `published`='1'" ;
				
				$result = mysqli_query($con,$sql);
				
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>
						<td rowspan='3' width='200'><a href='viewProduct.php?id=".$row["productID"]."'><img title='view image' src='".$row["imgPath"]."' class='cover' width='150' height='150' style='object-fit: cover;'></a></td>
						
						
						<td><a href='viewProduct.php?id=".$row["productID"]."' style='text-decoration:none'>".$row["title"]."</a></td></tr>
						
						
						<tr><td>".$row["description"]."</td></tr>
						
						<tr><td></td></tr>
						
						<tr><td colspan='10'><hr></td>
						";
						
						/*if(isset($_POST["addCart"]))
						{
							
							$sqlcart = "INSERT INTO `cart`(`username`, `productID`) VALUES ('".$_SESSION["userName"]."','".$row["productID"]."');";
							
							mysqli_query($con,$sqlcart);
						}*/
					}
				}
				  
				  ?>
				</form>
            </table>
			  </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
