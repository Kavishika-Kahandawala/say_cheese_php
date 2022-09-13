<?php
session_start();

$cardNum = $_POST["txtCnum"];
$pid='';
/*$noc = $_POST["txtName"];

$expMonth = $_POST["chkExMonth"];
$expYear = $_POST["chkExYear"];
$cvn = $_POST["txtCvn"];*/
$con = mysqli_connect( "localhost", "root", "", "saycheese_db" );

$total=0;
$outersql="SELECT `productID` FROM `usercart` WHERE `username` = '".$_SESSION["userName"]."'; ";
				
$outerresult = mysqli_query($con,$outersql);
$date=date("Y/m/d");
				
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
								$newpid=$outerrow["productID"];
								$var=",";
								
								$pid=$pid.$newpid.$var;
								
								$prodprice=$innerrow["price"];
								$ueearn=$prodprice*60/100;
								$coearn=$prodprice*40/100;
								
								$uearnsql="INSERT INTO `userearnings`(`ueID`, `username`, `productID`, `Amount`, `date`) VALUES (NULL ,'".$innerrow["username"]."','".$innerrow["productID"]."','".$ueearn."','".$date."');";
								
								$uearnresult = mysqli_query($con,$uearnsql);
								
								$coearnsql="INSERT INTO `profit`(`profID`, `productID`, `amount`, `date`) VALUES (NULL ,'".$innerrow["productID"]."','".$coearn."','".$date."');";
								$coearnresult = mysqli_query($con,$coearnsql);
							}
						}
	}
}


$lastdigits = substr($cardNum, -4);

if ( !$con ) {
	die( "Cannot connect to DB Server" );
}
$sql = "INSERT INTO `payements`(`payID`, `username`, `amount`, `products`, `date`, `cdDigits`) VALUES (NULL,'".$_SESSION["userName"]."','".$total."','".$pid."','".$date."','".$lastdigits."');";

if ( mysqli_query( $con, $sql ) ) {
	echo "File Updated Suceessfully";
} else {
	echo "Something went wrong";
}
header('Location:paymentReciept.php');

?>