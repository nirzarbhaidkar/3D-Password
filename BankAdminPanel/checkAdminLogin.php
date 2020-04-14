<?php 
	session_start();
	include "db_connect.php";
	$db=new DB_connect();
	$con=$db->connect();
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$qry="select count(*) as Cnt from BA_Admin where Username='".$username."' and Password='".$password."'";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	if($row["Cnt"]==1){
			$_SESSION["bausername"]=$username;
			echo "Success";
		}
	else{
		echo "Error";
	}
	
	
?>