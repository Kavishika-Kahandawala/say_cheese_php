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
<title>Add Image</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <table border="0" align="center">
		  <form name="addProduct" action="addProduct.php" method="post" enctype="multipart/form-data">
      <tr>
        <td>
			<h2><span class="#">Add Stuff</span></h2></td>
        </tr>
      <tr>
		  <td colspan="4">Title</td>
				<tr>
        <td colspan="4"><input type="text" name="txtTitle" id="txtTitle" required min="5" title="Title should be at least 5 charcaters" placeholder="Enter Title"/></tr>
		  <tr>
		  <td colspan="4">Description</td>
				<tr>
        <td colspan="2"><input type="text" name="txtDesc" id="txtDesc" required min="10" title="Description should be at least 10 charcaters" placeholder="Enter Description"/></tr>
      <tr>
        <td height="35" colspan="2">Image</td>
        <td><input type="file" name="fileImage" id="fileImage"/></td>
      </tr>
      <tr>
		  
        <td height="79" colspan="2">Category</td>
        <td>
			<input type="checkbox" name="nature" id="nature" />Nature
            <input type="checkbox" name="architecture" id="architecture" />Architecture
			<input type="checkbox" name="fashion" id="fashion" />Fashion
			<input type="checkbox" name="fd" id="fd" />Food/Drink<br>
			<input type="checkbox" name="people" id="people" />People
			<input type="checkbox" name="travel" id="travel" />Travel
			<input type="checkbox" name="movie" id="movie" />Movie
			<input type="checkbox" name="animals" id="animals" />Animals
			<input type="checkbox" name="other" id="other" />Other
			
		  
		  </td>
      
			  </tr>
			  <tr>
		  <td colspan="4">Price</td>
				<tr>
        <td colspan="2"><input type="text" name="txtPrice" id="txtPrice" required min="2" title="Price should be at least 2 charcaters" placeholder="Enter Anount"/></tr>
      <tr>
        <td colspan="2"><br />
          <label for="chkBooks">
            <input type="checkbox" name="chkPublish" id="chkPublish" />
            Publish this<br />
            <br>
          </label>
			  
			  
			  <?php
			  if(isset($_POST["btnSubmit"]))
			   {
				  $title = $_POST["txtTitle"];
				  $description = $_POST["txtDesc"];
				  $price = $_POST["txtPrice"];
				  $date=date("Y/m/d");
				  $image = "Products/".basename($_FILES["fileImage"]["name"]);
				  move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
				  $category=""; 
				  

				  if(isset($_POST["nature"]))
				  { $category.="Nature,";}
				  
				  if(isset($_POST["architecture"]))
				  { $category.="Architecture,";}
				  
				  if(isset($_POST["fashion"]))
				  { $category.="Fashion,";}
				  
				  if(isset($_POST["fd"]))
				  { $category.="Food/Drink,";}
				  
				  if(isset($_POST["people"]))
				  { $category.="People,";}
				  
				  if(isset($_POST["travel"]))
				  { $category.="Movies,";}
				  
				  if(isset($_POST["movie"]))
				  { $category.="Movie,";}
				  
				  if(isset($_POST["animals"]))
				  { $category.="Animals,";}
				  
				  if(isset($_POST["other"]))
				  { $category.="Other,";}
				  
				  if(isset($_POST["chkPublish"]))
				  {
					  $status=1;
				  } else{
					  $status=0;
				  }
				  
				  $count=0;
				  while($count==3){
					  $newpid=$outerrow["productID"];
					  $var=",";
								
								$pid=$pid.$newpid.$var;
				  }
				  
				  $con = mysqli_connect("localhost","root","","saycheese_db"); 
				  
				  if(!$con)
				  {
					  die("Cannot connect to DB Server");
				  }
				  
				  $sql = "INSERT INTO `products` (`productID`, `username`, `title`, `category`, `description`, `imgPath`, `published`, `price`, `date`) VALUES (NULL, '".$_SESSION["userName"]."', '".$title."', '".$category."', '".$description."', '".$image."', '".$status."', '".$price."', '".$date."');";
					  
				  if(mysqli_query($con,$sql))
				  {
					  echo "File Uploaded";
				  } else {
					  echo "Something went wrong";
				  }
			  }
			  
			  ?>
			  
			  
            </td>
        </tr>
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
            <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
         
        </blockquote></td>
        </tr>
			  </form>
    </table>
    
    </td>
  </tr>
</table>
</body>
</html>