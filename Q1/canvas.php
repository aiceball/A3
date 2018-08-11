<?php 
   include("functions.php");
   $emailPattern="/(\w)+@(\w)+\.(\w)+/";
   //since matching all the conditions in one pattern is rather complex
   //split into multiple patterns and run password matching through
   
   if ( isset($_POST['login']) && 
   			validateCustomPassword($_POST['pwd']) &&
   			preg_match($emailPattern,$_POST['email']))
   { 
     if(doesUserExistAndIsValid($_POST['email'],$_POST['pwd'])){
     	session_start();
     	$_SESSION["email"] = $_POST['email'];
		  echo "Session started for:".$_SESSION["email"]."<br />";
     }
   }else{
   	header('Location: A3Q1.html');
 	  exit();
   }
?>