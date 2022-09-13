<?php session_start(); 
if(!isset($_SESSION["userName"]))
{
   header('Location:login.php');
}
if($_SESSION["userName"]=="admin")
{
   header('Location:adminProfile.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<?php
	
	$con = mysqli_connect("localhost","root","","saycheese_db");
	if(!$con)
	{
		die("Cannot connect to DB Server");
	}
	
	$sql="SELECT * FROM `user` WHERE `username` = '".$_SESSION["userName"]."'; ";
	
	$result = mysqli_query($con,$sql);
	
	if (mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
	
	?>
	
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
		<tr><td colspan="8">
      <table border="0" align="center">
		  <form name="addProduct" action="addProduct.php" method="post" enctype="multipart/form-data">
      <tr>
        <td colspan="4" bgcolor="#FFFFFF"><div align="center"><img src="Resources/Images/other/user.png"  height="200" readonly/></div>
          <h2><span class="#">My Profile</span></h2></td>
        </tr>
      <tr>
		  <td colspan="2">First Name</td>
		  <td width="325" colspan="2">Last Name</td></tr>
				<tr>
        <td colspan="2"><input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $row["firstName"]; ?>" readonly/>
      <td colspan="2"><input type="text" name="txtLastName" id="txtLastName" value="<?php echo $row["lastName"]; ?>" readonly/></td></tr>
		  <tr>
        <td>Email</td></tr><tr>
        <td><input type="text" name="txtEmail" id="txtEmail" value="<?php echo $row["email"]; ?>" readonly/></td>
      </tr>
		  <tr>
        <td>Username</td></tr><tr>
        <td><input type="text" name="txtuname" id="txtuname" value="<?php echo $row["username"]; ?>" readonly/></td>
      </tr>
		  <tr><td><a href="myCart.php"><button type='button' class="button">My Cart</button></a></td>
		  <td><a href="myWishlist.php"><button type='button' class="button">My Wishlist</button></a></td>
			  <td><a href="purchaseHistory.php"><button type='button' class="button">Purchases</button></a></td>
			  <td><a href="viewUploads.php"><button type='button' class="button">My Uploads</button></a></td>
			  <td><a href="addProduct.php"><button type='button' class="button">Add Image</button></a></td>
			  
		  <tr><td colspan="8"><a href="logout.php"><button type='button' class="button">Log Out</button></a></td>
		  </tr>
      
		  <?php
	}
	mysqli_close($con);
		  ?>
		  </form>
    </table>
    
    </td>
  </tr>
</table>
</body>
</html>
