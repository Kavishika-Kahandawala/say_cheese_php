<?php
session_start();

$productID = $_GET["id"];

$image = "Products/" . basename( $_FILES[ "fileImage" ][ "name" ] );
move_uploaded_file( $_FILES[ "fileImage" ][ "tmp_name" ], $image );


$con = mysqli_connect( "localhost", "root", "", "saycheese_db" );

if ( !$con ) {
	die( "Cannot connect to DB Server" );
}

$sql = "UPDATE `products` SET `imgPath`='".$image."' WHERE `productID` = '".$productID."'";

if ( mysqli_query( $con, $sql ) ) {
	echo "File Updated Suceessfully";
} else {
	echo "Something went wrong";
}
header('Location:userAccount.php');

?>