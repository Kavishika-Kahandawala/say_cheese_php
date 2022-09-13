<?php
session_start();

$productID = $_GET["id"];

$con = mysqli_connect( "localhost", "root", "", "saycheese_db" );

if ( !$con ) {
	die( "Cannot connect to DB Server" );
}


$addtoWishql = "INSERT INTO `userwishlist`( `username`, `productID`) VALUES ('".$_SESSION["userName"]."','".$productID."');";

mysqli_query( $con, $addtoWishql);


header('Location:viewProduct.php?id='.$_GET["id"].'');

?>