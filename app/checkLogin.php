<?php
include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
	// array for JSON response
$response = array();
 
// check for required fields
if (isset($_REQUEST['Mobile']) && isset($_REQUEST['Password'])) {
 
    
    $Mobile = $_REQUEST['Mobile'];
	$Password = $_REQUEST['Password'];
	$count = 0;
		$qry="select count(*) from BA_CustomerDetails where Email='".$Mobile."' and Password='".$Password."' and Status='On'";
		//echo $qry;
		$result = mysqli_query($con,$qry);
		$row = mysqli_fetch_array($result);
		$count = $row[0];
		//echo $count;
		if ($count==0){	
			$response["success"] = 0;
        	$response["message"] = "Can not Login.Please Contact Admin";
			echo json_encode($response);
		}
		else if($count==1) {
        	// failed to insert row
        	$response["success"] = 1;
        	$response["message"] = "Login Successfully!!!";
 
        	// echoing JSON response
        	echo json_encode($response);
    		}
			
		else {
			// required field is missing
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred";
 
			// echoing JSON response
			echo json_encode($response);
		}
	}
		else {
			// required field is missing
			$response["success"] = 0;
			$response["message"] = "Required field(s) is missing.";
 
			// echoing JSON response
			echo json_encode($response);
		}
		

 
?>