<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	$id=$_POST["ID"];
	$qry="Select * from BA_CustomerDetails where Creadted_by='".$_SESSION["bausername"]."'";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>SR.NO</th><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Gender</th><th>DOB</th><th>Adhar No.</th><th>IMIE No.</th><th>Goal Number</th><th>Status</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		
		$table.="<tr>";
		$table.="<td>".$i."</td>"; 
		$table.="<td id='Name".$row["ID"]."'>".$row["Name"]."</td>";
		$table.="<td id='Email".$row["ID"]."'>".$row["Email"]."</td>";
		$table.="<td id='Mobile".$row["ID"]."'>".$row["Mobile"]."</td>";
		$table.="<td id='Address".$row["ID"]."'>".$row["Address"]."</td>";
		$table.="<td id='Gender".$row["ID"]."'>".$row["Gender"]."</td>";
		$table.="<td id='DOB".$row["ID"]."'>".$row["DOB"]."</td>";
		$table.="<td id='Adhar".$row["ID"]."'>".$row["Adhar"]."</td>";
		$table.="<td id='IMIE".$row["ID"]."'>".$row["IMIE"]."</td>";
		$table.="<td id='Goal".$row["ID"]."'>".$row["goal"]."</td>";
		$table.="<td id='Status".$row["ID"]."'>".$row["Status"]."</td>";
		$table.="<td><a href='javascript:void(0)' onclick='editRecord(".$row["ID"].")'>Edit</a></td>";
		$table.="<td><a href='javascript:void(0)' onclick='deleteRecord(".$row["ID"].")'>Delete</a></td>";
		$i++;
		$table.="</tr>";
	}
	$table.="</tbody>";
	echo $table;
?>