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
<title>Payment Acceptance</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<script src="Js/font-awesome.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<table><tr><td><table width="574" height="265" border="0" align="left">
		<form name="addto" action="payementProcess.php" method="post">

		<tr>
			<td colspan="2">
				<h1>Billing Details</h1>
			</td>
		</tr>
			<tr>
        <td width="136"><label for="txtnoc">Name on card</label></td><td width="201"></td></tr><tr><td><input type="text" name="txtnoc" id="txtnoc" placeholder="John Williams" required title="Enter Name printed on card"/>
      </tr>
      <tr>
        <td width="136"><label for="txtCnum">Card Number</label></td></tr><tr><td width="201"><input type="text" name="txtCnum" id="txtCnum" placeholder="1111-2222-3333-4444" required pattern=".{15,16}" title="Card should have 15-16 charcaters"/>
		  </td>
      </tr>
			<tr>
				<td><label for="txtCvn">CVN</label></td></tr><tr>
		  <td>
			<input type="text" name="txtCvn" id="txtCvn" placeholder="123" required pattern=".{3}" title="CVN should be 3 charcaters"/></label>
		  </td>
      </tr>
      <tr>
        <td><label for="chkExMonth">Expiry Month</label></td>
		  <td><select name="chkExMonth" id="chkExMonth" required>
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
		  <td width="91"><label for="chkExYear">Expiry Year</label></td>		
		  <td width="128"><select name="chkExYear" id="chkExYear" required>
						  <option selected="selected" disabled="disabled" value="">Year</option>
						  <option value="2022">2022</option>
						  <option value="2023">2023</option>
						  <option value="2024">2024</option>
						  <option value="2025">2025</option>
						  <option value="2026">2026</option>
						  <option value="2027">2027</option>
						  <option value="2028">2028</option>
						  <option value="2029">2029</option>
						  <option value="2030">2030</option>
						  <option value="2031">2031</option>
						  <option value="2032">2032</option>
						  <option value="2033">2033</option>
						  <option value="2034">2034</option>
						  <option value="2035">2035</option>
						  <option value="2036">2036</option>
						  <option value="2037">2037</option>
						  <option value="2038">2038</option>
						  <option value="2039">2039</option>
						  <option value="2040">2040</option>
						  <option value="2041">2041</option>
						  <option value="2042">2042</option>
						  <option value="2043">2043</option></select>
		  </td>
      </tr>
		<tr><td><br></td></tr>
      
      <tr>
        <td >
             <input name="btnPay" type="submit" class="button" id="btnPay" value="Pay"/></td><td>
            <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"/>
		  </td>
		</tr></form>
    </table>
		</td><td width="128"></td>
	
		<td>
			<table border="0">
				
				<tr><td><h2><span class="">Your Cart</span></h2></td></tr>
				
					<?php
					
					$con = mysqli_connect("localhost","root","","saycheese_db");
				
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
				$total=0;
				$outersql="SELECT `productID` FROM `usercart` WHERE `username` = '".$_SESSION["userName"]."'; ";
				
				$outerresult = mysqli_query($con,$outersql);
				
				if (mysqli_num_rows($outerresult)>0)
				{
					while($outerrow = mysqli_fetch_assoc($outerresult))
					{
						$innersql="SELECT * FROM `products` WHERE `productID` = '".$outerrow["productID"]."'; ";
						$innerresult = mysqli_query($con,$innersql);
						if (mysqli_num_rows($innerresult)>0)
						{
							while($innerrow = mysqli_fetch_assoc($innerresult))
							{
								$total=$total+$innerrow["price"];
								echo "<tr>
								<td class=tdmiddle ><div class='imgcontainer'><img src='".$innerrow["imgPath"]."' height='100' ></div></td><td width='20'></td>
								<td width='200'>".$innerrow["title"]."</td>
								<td><a href='removeFromCart.php?id=".$innerrow["productID"]."'><i class='fa-solid fa-x'></i></a></td>
								</tr>
								<tr><td colspan='5'><hr></td></tr>";
							}
							
						}
						
					}
					echo "<tr><td colspan='4'><span class='totalhd'>Total: </span></td><td colspan='1'><span class='Total'>Rs: ".$total."</span></td></tr>";
				}else{
					echo "Nothing On Cart. Add to continue";
				}
				
				?>
	

            </table>
 
    </td>
  </tr>

</table>


</body>
</html>
