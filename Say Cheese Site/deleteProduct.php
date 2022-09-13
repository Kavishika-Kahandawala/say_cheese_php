<?php
session_start();

$productID = $_GET["id"];

$con = mysqli_connect( "localhost", "root", "", "saycheese_db" );

if ( !$con ) {
	die( "Cannot connect to DB Server" );
}

$sql = "DELETE FROM `products` WHERE `productID` = '".$productID."'; ";

if ( mysqli_query( $con, $sql ) ) {
	echo "File Deleted Suceessfully";
} else {
	echo "Something went wrong";
}
header('Location:userAccount.php');

?>