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
<title>Change Image</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.upload {
    border: 1px solid #04AA6D;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
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
			  <a  href="myCart.php"><img src="Resources/Images/other/cart.png" height="25px"></a>
			  <a href="myProfile.php"><img src="Resources/Images/other/user.png" height="25px"></a>
			  </div></div></td>
		</tr>
		<tr><td colspan="8">
			<form name="editProduct" action="updateUploadImage.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
      <table border="0" align="center">
		  <tr><td><br></td></tr>
		  <tr>
        <td class="tdmiddle"><input type="file" name="fileImage" id="fileImage" class="upload" /></td>
      </tr>
      
      <tr>
        <td colspan="2">
             <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Update Image"   /></td></tr><tr><td>
			<a href="editUploads.php?id=<?php echo $_GET["id"]; ?>"><button type='button' class="button">Cancel</button></a>
</td>
        </tr>
    </table>
			</form>
    </td>
  </tr>
</table>
</body>
</html>
