<?php
	session_start();
	
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	$amount=$_REQUEST["amount"];
	$number=$_REQUEST["number"];
	$date=date("d/m/Y");
	//$q="select Password from BA_CustomerDetails where Email='".$_SESSION["username"]."'";
	$qry="select count(*) as count from BA_CustomerDetails where Mobile='".$number."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	$qryi="select * from BA_CustomerDetails where Email='".$_SESSION["username"]."'";
	$runi=mysqli_query($con,$qryi);
	$rowi=mysqli_fetch_array($runi);
	if($row["count"]!=1){
		echo "mobile";	
	}else if($rowi["Amount"]<$amount){
		echo "lowamount";
	}else{
		$qryii="select * from BA_CustomerDetails where Mobile='".$number."'";
		$runii=mysqli_query($con,$qryii);
		$rowii=mysqli_fetch_array($runii);
		$credit=$rowii["Amount"]+$amount;
		$qryiii="Update BA_CustomerDetails set Amount='".$credit."' where Mobile='".$number."'";
		if(mysqli_query($con,$qryiii)){
			$qryv="insert into BA_Transaction(from_user,to_user,type,amount,date)values('".$_SESSION["username"]."','".$rowii["Email"]."','Credit','".$amount."','".$date."')";
			if(mysqli_query($con,$qryv)){
				
			}
			else{
				echo "error";
			}
		}
		else{
			echo "error";
		}
		$debit=$rowi["Amount"]-$amount;
		$qryiv="Update BA_CustomerDetails set Amount='".$debit."' where Email='".$_SESSION["username"]."'";
		if(mysqli_query($con,$qryiv)){
			$qryvi="insert into BA_Transaction(from_user,to_user,type,amount,date)values('".$_SESSION["username"]."','".$rowii["Email"]."','Debit','".$amount."','".$date."')";
			if(mysqli_query($con,$qryvi)){
				echo "success";
			}
			else{
				echo "error";
			}
		}
		else{
			echo "error";
		}	
	}
?>

