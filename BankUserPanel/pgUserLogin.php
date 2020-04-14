<?php session_start();

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
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Bank Authentication</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../BankAdminPanel/pgAdminLogin.php">Admin Login</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link" href="pgUserLogin.php">User Login</a>
            </li>
          </ul>
        </div>
      </div>
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
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

			<div class="control-group" id="abc">
				  <div class="form-group floating-label-form-group controls">
					<label id="lblun">Username</label>
					<input type="text" class="form-control" placeholder="Username" id="txtUsername" />
				  </div>
            </div>
			
			<div class="control-group" id="pqr">
				  <div class="form-group floating-label-form-group controls">
					<label id="lblpass">Password</label>
					<input type="password" class="form-control" placeholder="Password" id="txtPassword" >
					<p class="help-block text-danger"></p>
				  </div>
			</div><br>
			
			
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="checkUserLogin();">Login</button></center>
            </div>
		</div>
		<div class="col-lg-8 col-md-10 mx-auto" align="center" id="QR">
		<div class="control-group" id="display">
		</div>
		<div class="control-group">
		<div class="form-group floating-label-form-group controls">
					<label>Enter 3D Password</label>
					<input type="text" class="form-control" placeholder="3D Password" id="txtQR" /><br>
				  </div>
		</div><br>
		<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="verify();">Verify</button></center>
            </div>
		</div>
		</div>
		</div>
   

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
//var counter=0;
$(document).ready(function(){
$("#QR").hide();
});
	function checkUserLogin(){
		
				if($("#txtUserName").val()==""){
					alert("Please Enter Username");
				}
				else if($("#txtPassword").val()==""){
					alert("Please Enter Password");
				}
				else{
						$.ajax({
							type:"POST",
							url:"checkUserLogin.php",
							data:{username:$("#txtUsername").val(),password:$("#txtPassword").val()},
							success:function(response){
							if($.trim(response)=='Error'){
							alert("Cannot Login");
							$("txtUsername").val("");
							$("txtPassword").val("");
							}
							else
							{$("txtUsername").val("");
							$("txtPassword").val("");
							$("#display").html(response);
							$("#hdnn").val($("#hdnID"));
							//$("txtUsername").hide();
							//$("#txtPassword").hide();
							//$(location).attr('href','pgHome.php');
							 
							$("#QR").show();
							$("#btnSubmit").hide();
							$("#abc").hide();
							$("#pqr").hide(); 
							}
							}
						});
						
					}
				}
			function verify(){
				//alert($("#hdnID").val());
				if($("#txtUserName").val()==""){
					alert("Please Enter Username");
				}
				else if($("#txtPassword").val()==""){
					alert("Please Enter Password");
				}
				else{
						//
						$.ajax({
						type:"POST",
						url:"verifyqr.php",
						data:{userid:$("#hdnID").val(),qrcode:$("#txtQR").val()},
						success:function(response){
						console.log(response);
						if($.trim(response)=="Success"){
						$(location).attr('href','pgGoal.php');
						//alert("Login Successful");
						//$(location).attr('href','pgHome.php');
						}
						else{
						alert("Invalid");
						}
						}
						});
					}	
				}			
</script>	
	
  </body>
</html>