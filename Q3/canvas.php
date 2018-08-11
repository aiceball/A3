<?php
	session_start();
	if(!isset($_COOKIE["visit"])) $_COOKIE["visit"]=1;
	
	setcookie("visit",$_COOKIE["visit"]+1,time()+60);
	function onClick(){
	if(isset($_POST["submit"])){
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["fontSize"]=$_POST["fontSize"];
		$_SESSION["color"]=$_POST["color"];
		$_SESSION["visibility"]=$_POST["visibility"];
   		header('Location: canvasOut.php');
 	  	exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		header {background-color: gray; text-align: center; color: white}
		footer {background-color: gray; text-align: center; color: white}
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
	<div class="total">
	<header>Selector box</header>
	<form method="post" action="<?php onClick() ?>">
		<div class="name">
			<label>Enter your name here: </label>
			<input type="text" id="name" name="name" placeholder="Name here">
			<br><label id="greetName"></label>
		</div>
		<div class="slider">
			<label>Indicate your font size with the slider here: </label>
			<br>
			<input type="range" id="fontSize" name="fontSize" min="8" max="40">
			<br>
			Font Size: <label id="fontValue"></label>
		</div>
		<div class="color">
			<label>Select the color of your text:</label>
			<br>
			<input type="color" name="color" value="#ff0000">
		</div>
		<div class="checkbox">
			<label>Select what you want visible:</label>
			<br>
			<input type="checkbox" name="visibility[]" value="header"><label for="header">Header</label>
			<input type="checkbox" name="visibility[]" value="body"><label for="body">Body</label>
			<input type="checkbox" name="visibility[]" value="footer"><label for="footer">Footer</label>
		</div>
		<footer>Get your selection:
			<input type="submit" name="submit" value="Click!">
			<br>This is your visit # <?php echo $_COOKIE["visit"];?>
		</footer>
	</form>
	</div>
	<script type="text/javascript">
		var slider = document.getElementById("fontSize");
		var output = document.getElementById("fontValue");
		output.innerHTML = slider.value; // Display the default slider value

		// Update the current slider value (each time you drag the slider handle)
		slider.oninput = function() {
		    output.innerHTML = this.value;
		}
		var x = document.getElementById("name");
		x.addEventListener("focusout", onFocus, true);
		var greetName=document.getElementById("greetName");
		function onFocus(){
			greetName.innerHTML="Hello "+x.value+"!";
		}
	</script>
</body>
</html>