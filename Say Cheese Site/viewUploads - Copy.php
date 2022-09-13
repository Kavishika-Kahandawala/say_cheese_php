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
<title>dddddd</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>

</head>
<body>
<table border="0" align="center">
  		<tr>
			<td ><img src="Resources/Images/aurora-logos_transparent.png" width="106" alt="Say Cheese Logo"/></td>
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
    <td colspan="8" rowspan="100">
		<table border="0"  align="left">
      <tr>
        <td>
			  
            <table border="0" width="800" align="center">
				<tr><td class="tdmiddle" colspan="8"><h2>View My Uploads</h2></td></tr>
				<?php
				
				$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
				
				$sql="SELECT * FROM `products` WHERE `username` = '".$_SESSION["userName"]."'; ";
				
				$result = mysqli_query($con,$sql);
				
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>
						<td rowspan='3' width='200'><a href='viewProduct.php?id=".$row["productID"]."'><img title='view image' src='".$row["imgPath"]."' class='cover' width='150' height='150' style='object-fit: cover;'></a></td>
						
						
						<td><a href='viewProduct.php?id=".$row["productID"]."' style='text-decoration:none'>".$row["title"]."</a></td></tr>
						
						
						<tr><td>".$row["description"]."</td></tr>
						
						<tr><td class='tdright'><a href='editUploads.php?id=".$row["productID"]."'><i title='edit' style='color:black'; class='fa-solid fa-pen-to-square'></i></a></td>
						<td class='tdmiddle'><a href='deleteProduct.php?id=".$row["productID"]."'><i title='delete' class='fa-solid fa-trash' style='color:black';></i></a></td>
						<tr><td colspan='8'><hr></td></tr>
						</tr>";
					}
				}
				  
				  ?>
				<tr><td><a href=""><button type='button' class="button">Leave Page</button></a></td></tr>
            </table>
			  
          </div>
          <div class="container" style="background-color:#f1f1f1"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
