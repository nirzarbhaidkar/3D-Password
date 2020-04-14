<?php
	session_start();
	if(!isset($_SESSION["userusername"])){
		header("Location:pgUserLogin.php");
	} 
	//echo "---------".$_SESSION["userusername"]."-----------";
	//$UserName=$_SESSION["userusername"];
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
              <center><h1>WELCOME</h1></center>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <!--<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Username</label>
					<input type="text" class="form-control" placeholder="Username" id="txtUsername" />
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Password</label>
					<input type="password" class="form-control" placeholder="Password" id="txtPassword" >
					<p class="help-block text-danger"></p>
				  </div>
			</div><br>
			
			<input type="hidden" id="hdnID">
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="checkUserLogin();">Login</button></center>
            </div>
			
			<table id="tableData" border="1" width="100%">
			</table>
			
         
        </div>
		</div>
		</div>-->
	
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
	/* function checkUserLogin(){
		
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
							console.log(response);
								if($.trim(response)=="Success"){
									alert("Login SuccessFull!!");
									$(location).attr("href","pgHome.php");
									$("#txtUserName").val("");
									$("#txtPassword").val(""); 
									
								}
								else{
									alert("Invalid Username/Password");
									 $("#txtUserName").val("");
									$("#txtPassword").val("");	 
								}
							}
						});
						
					}
				}
			 */
</script>	
	
  </body>
</html>