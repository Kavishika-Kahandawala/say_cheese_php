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
<title>View Image</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	
	$con = mysqli_connect("localhost","root","","saycheese_db");
	if(!$con)
	{
		die("Cannot connect to DB Server");
	}
	
	$sql="SELECT * FROM `products` WHERE `productID` = '".$_GET["id"]."'; ";
	
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
			  <a href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
		<tr><td colspan="9">
			<form name="addto" action="viewProduct.php" method="post" enctype="multipart/form-data">
      <table border="0" align="center">
		  <tr>
			  <td colspan="9"><?php echo "<span class='prdTitle'><h2>".$row["title"]."</h2></span>"; ?></td>
		  </tr>
      <tr>
        <td colspan="4" rowspan="3"><div align="center"><img src="<?php echo $row["imgPath"]; ?>" height="400"/></div>
		  </td>
		  
        </tr>
		  
      <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td colspan="4" class="tdmiddle">
			<?php
		$chkCartSql="SELECT * FROM `usercart` WHERE `productID`='".$_GET["id"]."' AND `username`='".$_SESSION["userName"]."';";
		
		$chkCartResult = mysqli_query($con,$chkCartSql);
		
		if (mysqli_num_rows($chkCartResult)>0)
		{
			echo "<a href='mycart.php'><button type='button' class='button'>View in Cart &nbsp;&nbsp;<i class='fa-solid fa-cart-shopping'></i></button></a>";
		
		}else{
			echo "<a href='addtoCart.php?id=".$row["productID"]."'><button type='button' class='button'>Add to Cart&nbsp;&nbsp;<i class='fa-solid fa-cart-arrow-down'></i></button></a>";
			
		}
			?>	
		  </td></tr><tr><td></td>
         <td colspan="4" class="tdmiddle">
			<?php
		$chkWishSql="SELECT * FROM `userwishlist` WHERE `productID`='".$_GET["id"]."' AND `username`='".$_SESSION["userName"]."';";
		
		$chkWishResult = mysqli_query($con,$chkWishSql);
		
		if (mysqli_num_rows($chkWishResult)>0)
		{
			echo "<a href='removeFromWishlist.php?id=".$row["productID"]."'><button type='button' class='button'>Added to Wishlist&nbsp;
&nbsp;
<i class='fa-solid fa-heart'></i></button></a>";
		
		}else{
			echo "<a href='addtoWishlist.php?id=".$row["productID"]."'><button type='button' class='button'>Add to Wishlist &nbsp;
&nbsp;
<i class='fa-regular fa-heart';></i></button></a>";
			
		}
			?>	
			    </td>
		  <tr><td colspan="4"><br><?php echo "Category: <span class='prdCat'>".$row["category"]."</span>"; ?></td></tr>
		  <tr><td colspan="8"><br><?php echo "<span class='desctext'>".$row["description"]."</span>"; ?></td></tr>
		  <tr><td><br><span class="">By:</span>
			  <?php echo "<span class='greytext'>".$row["username"]."</span>"; ?></span></td>
				</tr>
		  

		  <?php
	}
	mysqli_close($con);
		  ?>
    </table>
			</form>

  </tr>
</table>
</body>
</html>
