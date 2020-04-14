<?php
include_once 'db_connect.php';
$db=new DB_Connect();
$con=$db->connect();

	
	// array for JSON response
$response = array();
	
	if (isset($_REQUEST['username']) && isset($_REQUEST['result']) && isset($_REQUEST['imei']) && isset($_REQUEST['rno'])) {
	
	$username=$_REQUEST['username'];
	$imei=$_REQUEST['imei'];
	$rno=$_REQUEST['rno'];
	$result=$_REQUEST['result'];
	$count = 0;
	$qryz = "select count(*) from BA_QRCODE where QRCODE='".$result."' and UserID=(select ID from BA_CustomerDetails where Email='".$username."' and IMIE='".$imei."') ";
	//echo $qryz;
		$resul = mysqli_query($con,$qryz);
		$row= mysqli_fetch_array($resul);
	$count = $row[0];
	if ($count==0){	
			$response["success"] = 0;
        	$response["message"] = "Can not Login.Please Contact Admin";
			echo json_encode($response);
		}	
		
	 else{
	 $qry="update BA_QRCODE set Status='".$rno."' where QRCODE='".$result."' and UserID=(select ID from BA_CustomerDetails where Email='".$username."' and IMIE='".$imei."')";
	  $res = mysqli_query($con,$qry);
		//echo $qry;
		 if ($res) {
 	   // check if row inserted or not
	   $response["success"] = 1;
	   
        	$response["message"] = "Scan Successfull Please Enter 3D Password !!";
 
        	// echoing JSON response
        	echo json_encode($response);
    	
		}
	
		else {
        	// failed to insert row
        	$response["success"] = 0;
        	$response["message"] = "Oops! An error occurred.";
 
        	// echoing JSON response
        	echo json_encode($response);
    		}
		}
	}
	else {
        	// failed to insert row
        	$response["success"] = 0;
        	$response["message"] = "Field Missing";
 
        	// echoing JSON response
        	echo json_encode($response);
    		}
 ?>