<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log in | Aurora</title>
<?php
	$imgr="Products/alison-wang-mou0S7ViElQ-unsplash.jpg";
	$img="Products/fd.jpg";
	echo"
	
<style>.watermarked {
  position: relative;
}

.watermarked:after {
  content: '';
  display: block;
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0px;
  left: 0px;
  background-image: url('".$imgr."');
  background-size: 100px 100px;
  background-position: auto;
  background-repeat: no-repeat;
  opacity: 0.6;
}
	</style>"
		?>
<link rel="stylesheet" type="text/css" href="css/Base.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="watermarked">
		<?php
		echo
		
  "<img src='".$img."'alt='Photo' width='100px' height='100px'>"
		?>
</div>

</body>
</html>
