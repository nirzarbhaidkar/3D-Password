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
	}else if($_POST["amount"]==""){
		echo "Amount";
	}else if($_POST["goal"]==""){
		echo "Goal";
	}else if($_POST["amount"]<=999){
		echo "Amount";
	}
	else{
		 $qry="Select count(*) as cnt from BA_CustomerDetails where Mobile='".$_POST["mobile"]."' or Email='".$_POST["email"]."'";
		//echo $qry;
		$result=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($result);
		if($row["cnt"]>0){
			echo "Exist";
		}
		else{	
			$qry="insert into BA_CustomerDetails(Name,Email,Mobile,Password,Address,Gender,DOB,Adhar,IMIE,Status,Creadted_by,Amount,goal) values('".$_POST["name"]."','".$_POST["email"]."','".$_POST["mobile"]."','".$_POST["mobile"]."','".$_POST["address"]."','".$_POST["gen"]."','".$_POST["dob" ]."','".$_POST["adharcard"]."','".$_POST["imie"]."','".$_POST["status"]."','".$_SESSION["bausername"]."','".$_POST["amount"]."','".$_POST["goal"]."')";
			//echo $qry;
			if(mysqli_query($con,$qry)){
				echo "Success";
			}
			else{
				echo "Error";
			}
		}
	}
?>