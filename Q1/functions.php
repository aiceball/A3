<?php 
function validateCustomPassword($password){
   	$digitPattern="/(\d)+/";
   	$uppercasePattern="/([A-Z])+/";
   	$lowercasePattern="/([a-z])+/";
   	$lengthPattern="/.{8,}/";
   	$speccharPattern="/([!@#$%^&*()])+/";
   	if(	preg_match($digitPattern, $password) &&
   		preg_match($uppercasePattern, $password) &&
   		preg_match($lowercasePattern, $password) &&
   		preg_match($lengthPattern, $password) &&
   		preg_match($speccharPattern, $password)){
   		return true;
   	}
   	return false;
   }

function doesUserExistAndIsValid($email,$password){
   	if(!file_exists("key.txt")) return false;
   	$fileOutput = file_get_contents("key.txt");
   	$strArray=explode("\n",$fileOutput);
   	foreach ($strArray as $value) {
   		$em=trim(explode(" ",$value)[0]);
   		$pwd=trim(explode(" ",$value)[1]);
   		if($em===$email && $pwd===$password) return true;
   	}
   	return false;
   }
 ?>