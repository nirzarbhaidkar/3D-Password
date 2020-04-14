<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	//echo "---------".$_SESSION["userusername"]."-----------";
	if(!isset($_SESSION["userusername"])){
		header("Location:pgUserLogin.php");
	}
	//echo "---------".$_SESSION["userusername"]."-----------";
	//$UserName=$_SESSION["userusername"];
	//Query To Get Old PASSWORD
	$query="Select Password From BA_CustomerDetails Where Email='".$_SESSION["username"]."'";
	//echo $query;
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$oldpassword=$row["Password"];
	
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
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<input type="password" class="form-control" placeholder="Old Password" id="txtOldPassword" required data-validation-required-message="Please enter your old password.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<input type="password" class="form-control" placeholder="New Password" id="txtNewPassword" required data-validation-required-message="Please enter your new password.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<input type="password" class="form-control" placeholder="Re Password" id="txtRePassword" required data-validation-required-message="Please enter your Re-password.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
					
					<center><button   onclick="changeAdminPassword();" style="width:auto" >CHANGE PASSWORD</button></center><br>
					<input type="hidden" id="hdnOldPassword" value="<?php echo $oldpassword ?>" />
         
          
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
	function changeAdminPassword(){
	if($("#txtOldPassword").val()==""){
		alert("Please Enter Password");
	}
	else if($("#hdnOldPassword").val()!=$("#txtOldPassword").val()){
		alert("Invalid Old Password");
	}
	else if($("#txtNewPassword").val()==""){
		alert("Please Retype your Password");
	}
	else if($("#txtNewPassword").val()!=$("#txtRePassword").val()){
		alert("Please make sure to repeat same password!");
	}
	else if($("#txtNewPassword").val()==$("#txtOldPassword").val()){
		alert("Old and New Password Cannot Be same");
	}
	else{
		$.ajax({
			type:"POST",
			url:"changeUserPassword.php",
			data:{pwd:$("#txtNewPassword").val(),oldpwd:$("#txtOldPassword").val()},
			success:function(response){
			console.log(response);
				if($.trim(response)=="success"){
					alert("Password Changed Successfully!");
					$("#txtOldPassword").val("");
					$("#txtNewPassword").val("");
					$("#txtRePassword").val("");
					$(location).attr('href','pgUserLogin.php');
				}
				else{
					alert("Something Went Wrong!");
						$("#txtOldPassword").val("");
						$("#txtNewPassword").val("");
						$("#txtRePassword").val("");
					}
				}
			});
		}
	}
</script>	
	
  </body>
</html>