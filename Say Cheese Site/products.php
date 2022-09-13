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
</head>

<body>
<body>
<table border="1" align="center">
  		<tr>
			<td width=><img src="Resources/Images/aurora-logos_transparent.png" width="106" alt="Say Cheese Logo"/></td>
		  <td colspan="7"><div class="topnav">
			  <a class="active" href="#home">Home</a>
			  <a href="#news">News</a>
			  <a href="#contact">Contact</a>
			  <a href="#about">About</a>
			  <a href="#search">Search</a>
			  <a href="login.php">Log in</a>
			  <a href="register.php">Sign up</a>
			  </div></td>
		</tr>
  <tr>
    <td colspan="8">
		<table border="1"  align="center">
      <tr>
        <td><div class="imgcontainer"> <img src="images/shopping-bag-flat.png" alt=""  width="256" height="256" class="avatar" /> </div>
          <div class="container">
            <table border="1">
				<form name="discover" method="post" action="products.php">

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
						
						echo "<tr><label>
						<td><div class='imgcontainer'><img src='".$row["imgPath"]."' width='150' height='150' ></div></td>
						<td><p>By:</p>'".$row["username"]."'</td>
						<td><a href='editUploads.php?id=".$row["productID"]."'><i class='fa-solid fa-pen-to-square'></i></a></td>
						<td><a href='viewProduct.php?id=".$row["productID"]."'><img src='images/publish2.png' alt='' width='32' height='34'/>View Product</a></td>
						
						<!--
						
						<td><input name='addCart' type='submit' class='button' id='addCart' value='Add to cart'/></td>
						
						-->
						</label></tr>";
						
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
          </div>
          <div class="container" style="background-color:#f1f1f1"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
