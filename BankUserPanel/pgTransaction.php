<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	if(!isset($_SESSION["username"])){
		header("Location:pgUserLogin.php");
	}
	$qryi="select * from BA_CustomerDetails where Email='".$_SESSION["username"]."'";
	$runi=mysqli_query($con,$qryi);
	$rowi=mysqli_fetch_array($runi);
	
	
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bank Authentication</title>

  <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
<?php include_once "navigation.php"?>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>BANK Authentication</h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			
			<div class="control-group">
				  <center>Your Amount <h3><?php echo $rowi["Amount"].".00" ;?></h3></center>
			</div>
			<br>
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<input type="text" class="form-control" placeholder="Enter mobile number" id="number" required data-validation-required-message="Please enter your new password.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<input type="text" class="form-control" placeholder="Enter amount" id="amount" required data-validation-required-message="Please enter your Re-password.">
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			
					
					<center><button class="btn btn-primary" onclick="sendmoney();" style="width:auto" >Send</button></center><br>
					<!--<input type="hidden" id="hdnOldPassword" value="<?php echo $oldpassword ?>" />-->
         
          
          <!-- Pager -->
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
	<footer>
	<?php include_once "footer.php" ?>    
</footer>
   <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>

<script>
$("#number").keypress(function(key) {
	if(key.charCode<48 || key.charCode>57)return false;
});
$("#amount").keypress(function(key) {
	if(key.charCode<48 || key.charCode>57)return false;
});
	function sendmoney(){
	if($("#number").val()==""){
		alert("Please enter number");
	}else  if($("#amount").val()==""){
		alert("Please enter amount");
	}else{
		$.ajax({
			type:"POST",
			url:"saveTransactionDetails.php",
			data:{number:$("#number").val(),amount:$("#amount").val()},
			success:function(response){
			console.log(response);
				if($.trim(response)=="success"){
					alert("Money transfer successfully!");
					$("#amount").val("");
					$("#number").val("");
					window.location.reload();
				}else if($.trim(response)=="mobile"){
					alert("Wrong mobile number");
				}else if($.trim(response)=="lowamount"){
					alert("Low amount");
				}
				else{
					alert("Something Went Wrong!");
						
					}
				}
			});
		}
	}
</script>	
	
  </body>
</html>