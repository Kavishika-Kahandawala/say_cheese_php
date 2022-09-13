<?php session_start(); 
if(!isset($_SESSION["userName"]))
{
   header('Location:login.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Payement Acceptance</title>
<link rel="stylesheet" type="text/css" href="css/Base.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<table width="574" height="265" border="0" align="left">
		<tr>
			<td colspan="2">
				<h1>Billing Address</h1>
			</td>
		</tr>
      <tr>
        <td width="136"><label for="txtCnum">Card Number</label></td><td width="201"><input type="text" name="txtCnum" id="txtCnum" placeholder="1111-2222-3333-4444"/>
		  </td>
      </tr>
      <tr>
        <td><label for="chkExMonth">Expiry Month</label></td>
		  <td><select name="chkExMonth" id="chkExMonth">
			  <option selected="selected" disabled="disabled" value="">Month</option>
			  <option value="jan">January</option>
			  <option value="feb">February</option>
			  <option value="mar">March</option>
			  <option value="apr">April</option>
			  <option value="may">May</option>
			  <option value="jun">June</option>
			  <option value="jul">July</option>
			  <option value="aug">August</option>
			  <option value="sep">September</option>
			  <option value="oct">October</option>
			  <option value="nov">November</option>
			  <option value="dec">December</option>
			</select>
		  </td>
  </tr>
		<?php
		if(isset($_POST["chkSaveCard"]))
		{
			$ExpMonth = $_POST["chkExMonth"];
			echo $ExpMonth;
		}
		?>
</table>

</body>
</html>
