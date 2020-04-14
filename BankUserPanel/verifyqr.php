<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
	$qry="select count(*) as count from BA_QRCODE where UserID='".$_POST["userid"]."' and Status='".$_POST["qrcode"]."'";
	//echo $qry;
	$result=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($result);
	//echo $count;
	if($row[0]==1){
	$query="delete from BA_QRCODE where UserID='".$_POST["userid"]."'";
	$res=mysqli_query($con,$query);
	echo "Success";
	}
	else{
	echo "Error";
	}
?>