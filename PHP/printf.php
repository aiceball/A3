<!DOCTYPE html>
<html>
<head>
    <title> PHP-printf </title>
    <meta charset = "utf-8" />
</head>
<body>

<h1>printf PHP page</h1>

<?php
	$price = 100;
	$item = "desk";
	printf("The price of %4s is %4d", $item, $price);

?>
</body>
</html>