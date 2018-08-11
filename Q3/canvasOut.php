<!DOCTYPE html>
<html>
<head>
	<title>canvasOut</title>
	<style type="text/css">
		header {background-color: #ffc266; text-align: center; color: white}
		footer {background-color: #e6e600; text-align: center; color: white}
		.total {display: inline-block;}
		div {	border-radius: 5px;
				border: 2px solid #800000;
    			width: auto;
    			height: auto;
    			margin: auto;
    			text-align: center;
    			}
		.name {border: 2px solid #0000ff;}
		.slider {border: 2px solid #9966ff;}
		.color {border: 2px solid #ff00ff;}
		.checkbox {border: 2px solid #990099;}
	</style>
</head>
<body>
<?php
	session_start();
	print_r($_SESSION);
	$header=$body=$footer=False;
	$style="style=\"color:".$_SESSION["color"].";font-size:".$_SESSION["fontSize"]."px;\"";
	function chooseDisplaySelection($selections){
		global $header,$body,$footer;
		if(isset($selections))
		foreach ($selections as $value) {
			if(trim($value)==="header") $header=True;
			if(trim($value)==="body") $body=True;
			if(trim($value)==="footer") $footer=True;
		}
	}
	chooseDisplaySelection($_SESSION["visibility"]);
	echo $style;
	if($header) echo "<header ".$style.">You have selected to see a header!</header>";
	if($body) echo "<div ".$style."> Hello ".$_SESSION["name"].", this is the body of the project</div>";
	if($footer) echo "<footer ".$style.">You have selected to see a footer!</footer>";
	session_destroy();
  ?>

</body>
</html>
