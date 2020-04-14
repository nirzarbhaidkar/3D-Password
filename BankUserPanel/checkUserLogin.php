<?php
	session_start();
	include("db_connect.php");
	include('phpqrcode/qrlib.php'); 
	$db=new DB_connect();
	$con=$db->connect();
	
	$UserName=$_POST["username"];
	$Password=$_POST["password"];
	$_SESSION["userusername"]="";
	$_SESSION["userpassword"]="";
	
	$text= str_pad(rand(0,99999999),8);
	 $folder="images/";
	 $file_name="qr.png";
	 $file_name=$folder.$file_name;
	
	$qry="select count(*) as count from BA_CustomerDetails where Email='".$UserName."' and Password='".$Password."' and Status='On'";
	//echo $qry;
	$result=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($result);
	//echo $row[0];

	if($row[0]>0){	
		$qryy="select * from BA_CustomerDetails where Email='".$UserName."' and Password='".$Password."'";
		//echo $qry;
		$resulty=mysqli_query($con,$qryy);
		$rowy=mysqli_fetch_array($resulty);
		$_SESSION["username"]=$rowy["Email"];
	/* //$_SESSION["userpassword"]=$Password;
		$_SESSION["ERROR"]=0; */
		echo "<input type='hidden' id='hdnID' value='".$rowy["ID"]."'>";
		
		$queryd="delete from BA_QRCODE where UserID='".$rowy["ID"]."'";
		$resd=mysqli_query($con,$queryd);
		 QRcode::png($text,$file_name);
		echo"<center><img src='images/qr.png' height='300px !important' width='300px !important'></center>";
		$query="insert into BA_QRCODE(UserID,QRCODE) values('".$rowy["ID"]."','".$text."')";
		$res=mysqli_query($con,$query);
		//$_SESSION["id"]=$rowy["ID"];
		//echo "Success";
	}
		
	else{
		/* $_SESSION["ERROR"]=$_SESSION["ERROR"]+1;
		if($_SESSION["ERROR"]==3){
			mysqli_query($con,"Update BA_CustomerDetails SEt Status='OFF' where Mobile='".$UserName."'");
		}
		echo "Error".$_SESSION["ERROR"]; */
		echo "Error";
	}
	
?>