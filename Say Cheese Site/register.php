<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register | Say Cheese</title>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
function validatePass()
	{
		var pass1=document.getElementById("txtPassword").value;
		var pass2=document.getElementById("txtConfirmPassword").value;
		if (pass1==pass2){
			return true;
		}else{
			alert("Passwords should match");
			return false;
		}
	}
</script>
</head>

<body>
<table border="0" align="center" width="100%">
	<tr>
			<td colspan="7"><div class="topnav">
				<div class="topnav-right">
				<a  href="Homepage.html">Home</a>
				<a href="mailto:contact@saycheese.com">Contact</a>
				<a href="discover.php">Discover</a>
				<a  href="login.php">Log in</a>
					<a class="active" href="register.php">Sign up</a></div></div></td>
		</tr>
	<tr>
		<td colspan="8">
			<table border="0"  align="center">
				<form name="register" action="register.php" method="post">
					<tr><td colspan="4" bgcolor="#FFFFFF"><h1>Create Profile</h1></td>
					</tr>
					<tr>
						<td colspan="2">First Name</td>
						<td width="325" colspan="2">Last Name</td></tr>
					<tr>
						<td colspan="2"><input type="text" name="txtFirstName" id="txtFirstName" required pattern=".{2,15}" title="First name should be 2-15 charcaters" placeholder="Enter First Name"/>
						<td colspan="2"><input type="text" name="txtLastName" id="txtLastName" required pattern=".{2,25}" title="Last name should be 2-25 charcaters" placeholder="Enter Last Name"/></td></tr>
					<tr>
						<td>Username</td></tr><tr>
					<td><input type="text" name="txtuname" id="txtuname" required pattern=".{2,20}" title="Username should be 2-20 charcaters" placeholder="Enter Username"/></td>
					</tr>
					<tr>
						<td>Email</td>
					</tr>
					<tr>
						<td><input type="email" name="txtEmail" id="txtEmail" required placeholder="Enter E-mail"/></td>
					</tr>
					<tr>
						<td colspan="2">Password</td>
						<td colspan="2">Confirm Password</td>
					</tr>
					<tr>
						<td colspan="2"><input type="password" name="txtPassword" id="txtPassword" class="txtPassword" required pattern=".{6,16}" title="Password should be 6-16 charcaters" placeholder="Enter Password"/>
						<td colspan="2"><input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="txtConfirmPassword" required pattern=".{6,16}" title="Password should be 6-16 charcaters" placeholder="Re-enter Password"/></td>
					</tr>
      <!--<tr>
        <td>Interest</td>
        <td width="45" colspan="4"><br />
          <input type="checkbox" name="chkBooks" id="chkBooks" />
          <label for="chkBooks">Books
            <input type="checkbox" name="chkGames" id="chkGames" />
            Games
            <input type="checkbox" name="chkMovies" id="chkMovies" />
            Movies<br />
            <br />
          </label></td>
      </tr>-->
					<tr>
						<td class="tdmiddle" colspan="5">
							<input name="btnregister" type="submit" class="button" id="btnregister" value="Sign Up" onclick="validatePass()"/>
							<span class="nwAcc"><br>Already have an account? <a href="login.php">Sign in</a></span>
							<p>&nbsp; </p>
						</td>
					</tr>
				</form>
			</table>
		</td>
	</tr>
	</table>
	</body>
	
	<?php
	if(isset($_POST["btnregister"]))
	{
		$firstName = $_POST["txtFirstName"];
		$lastName = $_POST["txtLastName"];
		$username = $_POST["txtuname"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];


			/*   if(isset($_POST["chkBooks"]))
			   	{ $in[]="Books";
				}
			   if(isset($_POST["chkGames"]))
			   	{ $in[]="Games";
				}
			   if(isset($_POST["chkMovies"]))
			   	{ $in[]="Movies";
				}
				 */
		$con = mysqli_connect("localhost","root","","saycheese_db"); 
				   
		if(!$con)
		{
			die("Cannot connect to DB Server");
		}
		
		$sql = "INSERT INTO `user` (`username`, `firstName`, `lastName`, `email`, `password`, `level`) VALUES ('".$username."', '".$firstName."', '".$lastName."', '".$email."', '".$password."', '0');";
				   
		mysqli_query($con,$sql);
				   
				/*foreach($in as $i)
				{
					$sql_interest="INSERT INTO 'interest' ('email','interest') VALUES ('".$email."','".$i."');";
					mysqli_query($con,$sql_interst);
				}*/
		header('Location:login.php');
	}
	
	?>
</html>
