<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log in | Aurora</title>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  /*background-color: black;*/
}

/** {
  box-sizing: border-box;
}*/

/* Add padding to containers */
/*.container {
  padding: 16px;
  background-color: white;
}*/

/* Full-width input fields */
/*input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}*/

/* Overwrite default styles of hr */
/*hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}*/

/* Set a style for the submit button */
.btnlogin {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btnlogin:hover {
  opacity: 1;
}

/* Add a blue text color to links */
/*a {
  color: dodgerblue;
}
*/
/* Set a grey background color and center the text of the "sign in" section */
/*.signin {
  background-color: #f1f1f1;
  text-align: center;
}*/
</style>
</head>

<body>
	<table border="0" align="center" width="100%">
		<tr>
			<td colspan="7"><div class="topnav">
				<div class="topnav-right">
				<a  href="Homepage.html">Home</a>
				<a href="mailto:contact@saycheese.com">Contact</a>
				<a href="discover.php">Discover</a>
				<a class="active" href="login.php">Log in</a>
					<a href="register.php">Sign up</a></div></div></td>
		</tr>
		<tr>
			<td colspan="8">
				<table border="0"  align="center">
					<form name="login" method="post" action="login.php">
						<tr>
							<td>
								<img src="images/Totebag/tb.png" alt="Avatar" width="250%" height="250" class="avatar"/>
							</td>
						</tr>
						<tr>
							<td>
								<div class="container"><span class=""><label for="txtuname">Username</label></span>
									</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="txtuname" id="txtuname" required pattern=".{2,20}" title="Username should be 2-20 charcaters" placeholder="Enter Username"><br>
							</td></tr>
						<tr>
							<td>
								<label for="txtpassword">Password</label> </td>
					</tr>
						<tr>
							<td>
								<input type="password"  name="txtpassword" id="txtpassword" required pattern=".{6,16}" title="Password should be 6-16 charcaters" placeholder="Enter Password">
								<span class="txtFogPsw"> <a href="mailto:contact@saycheese.com">Forgot password?</a></span><br><br><br>
							</td>
						</tr>
						<tr><td colspan="4"><hr></td></tr>
									<?php
									if(isset($_POST["btnlogin"]))
									{
										$username = $_POST["txtuname"];
										$password = $_POST["txtpassword"];
										$valid = false;
										
										$con = mysqli_connect("localhost","root","","saycheese_db"); 
										if(!$con)
										{
											die("Cannot connect to DB Server");
										}
										
										$sql = "SELECT * FROM `user` WHERE `username` = '".$username."' and `password` ='".$password."'";
										
										$result=mysqli_query($con,$sql);
										
										if(mysqli_num_rows($result) > 0)
										{
											$valid = true;
										}
										else
										{
											$valid = false;
										}
										
										if($valid)
										{
											$_SESSION["userName"] = $username;
											header('Location:discover.php');
										}
										else
										{
											echo "Please enter correct username & Password" ;
										}
									}	
									?>
						<tr>
							<td class="tdmiddle">
	<button type="submit" id="btnlogin" name="btnlogin" class="btnlogin" >Login</button></td></tr>
								<tr><td  class="tdmiddle">

		<span class="nwAcc">Don't have an account? <a href="register.php">Sign up</a></span></td>
      </tr></form>
    </table></td>
  </tr>
</table>
</body>
</html>
