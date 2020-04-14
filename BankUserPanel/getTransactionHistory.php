<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$type=$_POST["type"];
	if($type=="Credit"){
		$qry="Select * from BA_Transaction where to_user='".$_SESSION["username"]."' and type='Credit'";
	}else if($type=="Debit"){
		$qry="Select * from BA_Transaction where from_user='".$_SESSION["username"]."'  and type='Debit'";
	}else{
		$qry="Select * from BA_Transaction where (to_user='".$_SESSION["username"]."' and type='Credit') or (from_user='".$_SESSION["username"]."'  and type='Debit')";	
	}
	
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>SR.NO</th><th>From user</th><th>To user</th><th>Type</th><th>Amount</th><th>Date</th></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		$table.="<tr>";
		$table.="<td>".$i."</td>"; 
		$table.="<td id='Question".$row["id"]."'>".$row["from_user"]."</td>";
		$table.="<td id='OpOne".$row["id"]."'>".$row["to_user"]."</td>";
		$table.="<td id='OpTwo".$row["id"]."'>".$row["type"]."</td>";
		$table.="<td id='OpThree".$row["id"]."'>".$row["amount"]."</td>";
		$table.="<td id='OpFour".$row["id"]."'>".$row["date"]."</td>";
		$i++;
		$table.="</tr>";
	}
	$table.="</tbody>";
	echo $table;
?>