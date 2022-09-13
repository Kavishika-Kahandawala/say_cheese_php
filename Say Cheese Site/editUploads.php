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
<title>Edit Uploads</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style> 
textarea {
  width: 100%;
  height: 50px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 2px solid #ccc;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus{
  background-color: #ddd;
  outline: none;
}
</style>
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
		<tr><td colspan="8">
			<form name="editProduct" action="update.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
      <table border="0" align="center">
      <tr>
        <td colspan="4" ><div align="center"><a href="editUploadImage.php?id=<?php echo $_GET["id"]; ?>"><img src="<?php echo $row["imgPath"]; ?>" height="300" /></a></div>
          <h2>Edit Uploads</h2></td>
        </tr>
      <tr>
		  <td colspan="4">Title</td>
				<tr>
        <td colspan="4"><input type="text" name="txtTitle" id="txtTitle" value="<?php echo $row["title"]; ?>"/></tr>
		  <tr>
		  <td colspan="4">Description</td>
				<tr>
        <td colspan="4"><textarea name="txtDesc" id="txtDesc"><?php echo $row["description"]; ?></textarea></tr>
      </td>
      </tr>
      <tr>
        <td colspan="2" height="79">Category</td>
        <td><input type="text" name="txtCat" id="txtCat" value="<?php echo $row["category"]; ?>"/></td>
      </tr>
			<tr>
		  <td colspan="4">Price</td>
				<tr>
        <td colspan="2"><input type="text" name="txtPrice" id="txtPrice" value="<?php echo $row["price"]; ?>"/></tr>
      <tr>
        <td colspan="2"><br />
          <label for="chkBooks">
            <input type="checkbox" name="chkPublish" id="chkPublish" <?php if($row["published"] == 1) { echo "checked";};?>/>
			  
            Publish this<br />
            <br />
			  
			  
			  
			  
			  
            <br />
          </label></td>
        </tr>
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
            <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
         
        </blockquote></td>
        </tr>
		  <?php
	}
	mysqli_close($con);
		  ?>
    </table>
			</form>
    </td>
  </tr>
</table>
</body>
</html>
