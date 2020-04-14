<?php
	session_start();
	
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
	$pwd=$_REQUEST["pwd"];
	$password=$_REQUEST["oldpwd"];
	$UserName=$_REQUEST["username"];
	
	$qry="Update BA_CustomerDetails set Password='".$pwd."' where Email='".$_SESSION["username"]."'";
	//echo $qry;
	if(mysqli_query($con,$qry)){
		echo "success";
	}
	else{
		echo "error";
	}
?>

