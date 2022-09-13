<!DOCTYPE html>
<html>
<body>

<?php  
	/*$colors = array("red", "green", "blue", "yellow");*/
	$str = "Books.Games.Movies.";
	$colors = explode(".",$str);

foreach ($colors as $value) {
  echo "$value <br>";
}
?>  

</body>
</html>