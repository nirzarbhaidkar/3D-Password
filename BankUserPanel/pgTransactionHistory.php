<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	if(!isset($_SESSION["username"])){
		header("Location:pgUserLogin.php");
	}
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
			<div class="col-md-6">
			<label>Transaction Type</label>	
			<select id="seltype" onChange="showdata();" class="form-control">
				<option value="All">All</option>
				<option value="Credit">Credit</option>
				<option value="Debit">Debit</option>
			</select>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row">
			<table id="tableData" border="1" width="100%">
			</table>
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
$(document).ready(function(){
	showdata();
});
function showdata(){
	var type = $("#seltype").val();
	//alert(type);
		$.ajax({
			type:"POST",
			url:"getTransactionHistory.php",
			data:{type:type},
			success:function(response){
				//console.log(response);
				$("#tableData").html(response);
			}
		});
	}
</script>	
	
  </body>
</html>