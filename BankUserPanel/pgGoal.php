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
	$goal=$rowi["goal"];
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
<style type="text/css">

#gate {
cursor: pointer;
margin-bottom: 100px;
width: 100px;
height: 50px;
}

#ball {
cursor: pointer;
width: 40px;
height: 40px;
}
</style>

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
      	<center><h3>Put the ball in right Goal to proceed..</h3></center>
	<br><br>
	<div class="row">
		<table width="100%">
			<tr>
				<th><center><img src="images/Goal.svg" id="gate" <?php if($goal=="1"){ ?> class="droppable" <?php } ?>/></center></th>
				<th><center><img src="images/Goal.svg" id="gate" <?php if($goal=="2"){ ?> class="droppable" <?php } ?>/></center></th>
				<th><center><img src="images/Goal.svg" id="gate" <?php if($goal=="3"){ ?> class="droppable" <?php } ?> /></center></th>
				<th><center><img src="images/Goal.svg" id="gate" <?php if($goal=="4"){ ?> class="droppable" <?php } ?>/></center></th>
				<th><center><img src="images/Goal.svg" id="gate" <?php if($goal=="5"){ ?> class="droppable" <?php } ?>/></center></th>
			</tr>
		</table>
	</div>
	
	<br><br>
	<center>
    <img src="images/ball.svg" id="ball" />
	</center>
	<br><br>
	<input type="hidden" name="t1" id="t1" value="" />

	<div class="form-group">
	  <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="Check();">Check</button></center>
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
	function Check(){
		if($("#t1").val()=="Yes"){
			alert("Login Successful");
			window.location.replace("pgHome.php");	
		}else{
			alert("Please Re-Login");
			window.location.replace("pgUserLogin.php");	
		}
	} 
      let currentDroppable = null;

      ball.onmousedown = function(event) {
        let shiftX = event.clientX - ball.getBoundingClientRect().left;
        let shiftY = event.clientY - ball.getBoundingClientRect().top;

        ball.style.position = 'absolute';
        ball.style.zIndex = 1000;
        document.body.append(ball);

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
          ball.style.left = pageX - shiftX + 'px';
          ball.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
          moveAt(event.pageX, event.pageY);

          ball.hidden = true;
          let elemBelow = document.elementFromPoint(
            event.clientX,
            event.clientY
          );
          ball.hidden = false;

          if (!elemBelow) return;

          let droppableBelow = elemBelow.closest('.droppable');
          if (currentDroppable != droppableBelow) {
            if (currentDroppable) {
              leaveDroppable(currentDroppable);
            }
            currentDroppable = droppableBelow;
            if (currentDroppable) {
              enterDroppable(currentDroppable);
            }
          }
        }

        document.addEventListener('mousemove', onMouseMove);

        ball.onmouseup = function() {
          document.removeEventListener('mousemove', onMouseMove);
          ball.onmouseup = null;
        };
      };

      function enterDroppable(elem) {
		
		//elem.style.background = 'pink';
		document.getElementById("t1").value = "Yes"; 
		//window.open("pgHome.php");
		//alert("asd");
		
      }

      function leaveDroppable(elem) {
	  
        //elem.style.background = '';
		document.getElementById("t1").value = "No";
		//window.open("pgLogout.php");
		
   	  }

      ball.ondragstart = function() {
        return false;
      };
    </script>	
	
  </body>
</html>