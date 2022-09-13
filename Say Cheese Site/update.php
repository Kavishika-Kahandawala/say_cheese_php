<?php
session_start();

$productID = $_GET["id"];
$title = $_POST[ "txtTitle" ];
$description = $_POST[ "txtDesc" ];
$price = $_POST["txtPrice"];

$category=$_POST["txtCat"];

if ( isset( $_POST[ "chkPublish" ] ) ) {
  $status = 1;
} else {
	$status = 0;
}

$con = mysqli_connect( "localhost", "root", "", "saycheese_db" );

if ( !$con ) {
	die( "Cannot connect to DB Server" );
}

$sql = "UPDATE `products` SET `title`='".$title."',`category`='".$category."',`description`='".$description."',`published`='".$status."',`price`='".$price."'  WHERE `productID` = '".$productID."'";

if ( mysqli_query( $con, $sql ) ) {
	echo "File Updated Suceessfully";
} else {
	echo "Something went wrong";
}
header('Location:myProfile.php');

?>