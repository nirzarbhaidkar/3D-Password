<?php
	session_start();
	//$pd=$_SESSION["userpassword"];
	//echo $pd;
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	//$_SESSION["ecasusername"]=$username;
	
	$pwd=$_REQUEST["pwd"];
	$password=$_REQUEST["oldpwd"];
	
	$qry="Update BA_Admin set Password='".$pwd."' where Password='".$password."' AND Username='admin'";
	//echo $qry;
	if(mysqli_query($con,$qry)){
		echo "success";
	}
	else{
		echo "error";
	}
?>

