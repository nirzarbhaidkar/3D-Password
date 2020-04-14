<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	if($_POST["name"]==""){
		echo "Name";
	}else if($_POST["address"]==""){
		echo "Address";
	}else if($_POST["mobile"]==""){
		echo "Mobile";
	}else if($_POST["email"]==""){
		echo "Email";
	}
	else{
		$qry="update BA_CustomerDetails set Name='".$_POST["name"]."',Email='".$_POST["email"]."',Mobile='".$_POST["mobile"]."',Address='".$_POST["address"]."',Gender='".$_POST["gender"]."',DOB='".$_POST["dob"]."',Adhar='".$_POST["adharcard"]."',IMIE='".$_POST["imie"]."',Status='".$_POST["status"]."',goal='".$_POST["goal"]."' where ID='".$_POST["id"]."'";
		//echo $qry;
		if(mysqli_query($con,$qry)){
			echo "Success";
		}
		else{
			echo "Error";
		}
	}
?>