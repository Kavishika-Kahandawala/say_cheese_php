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
<title>#Add Images</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

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
		<tr><td colspan="8">
      <table border="1" align="center">
		  <form name="addProduct" action="test.php" method="post" enctype="multipart/form-data">
      <tr>
        <td colspan="4" bgcolor="#FFFFFF"><div align="center"><img src="images/add.png" width="165" height="166" /></div>
          <span class="#">Add Stuff</span></td>
        </tr>
      <tr>
		  <td colspan="4">Title</td>
				<tr>
        <td colspan="4"><input type="text" name="txtTitle" id="txtTitle"/></tr>
		  <tr>
		  <td colspan="4">Description</td>
				<tr>
        <td colspan="2"><input type="text" name="txtDesc" id="txtDesc"/></tr>
      <tr>
        <td colspan="2">Image</td>
        <td><input type="file" name="fileImage" id="fileImage"/></td>
      </tr>
      <tr>
        <td colspan="2">Category</td>
        <td><input type="checkbox" name="chkBooks" id="chkBooks" />
          <label for="chkBooks">Books
            <input type="checkbox" name="chkGames" id="chkGames" />
            Games
  <input type="checkbox" name="chkMovies" id="chkMovies" />
            Movies</label></td>
      </tr>
      <tr>
        <td colspan="2"><br />
          <label for="chkBooks">
            <input type="checkbox" name="chkPublish" id="chkPublish" />
            Publish this<br />
            <br />
			  
			  
			  <?php
			  if(isset($_POST["btnSubmit"]))
			   {
				  $title = $_POST["txtTitle"];
				  $description = $_POST["txtDesc"];
				  $image = "Products/".basename($_FILES["fileImage"]["name"]);
				  move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
				  $category='';
				  
				  if(isset($_POST["chkBooks"]))
				  { $category.="Books.";}
				  
				  if(isset($_POST["chkGames"]))
				  { $category.="Games.";}
				  
				  if(isset($_POST["chkMovies"]))
				  { $category.="Movies.";}
				  
				  if(isset($_POST["chkPublish"]))
				  {
					  $status=1;
				  } else{
					  $status=0;
				  }
				  
				  $con = mysqli_connect("localhost","root","","saycheese_db"); 
				  
				  if(!$con)
				  {
					  die("Cannot connect to DB Server");
				  }
				  
				  $sql = "INSERT INTO `products` (`productID`, `username`, `title`, `category`, `description`, `imgPath`, `published`) VALUES (NULL, '".$_SESSION["userName"]."', '".$title."', '".$category."', '".$description."', '".$image."', '".$status."');";
					  
				  if(mysqli_query($con,$sql))
				  {
					  echo "File Uploaded";
				  } else {
					  echo "Something went wrong";
				  }
			  } else {
				  echo "Select a cat";
			  }
			  
			  ?>
			  
			  
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
			  </form>
    </table>
    
    </td>
  </tr>
</table>
</body>
</html>
