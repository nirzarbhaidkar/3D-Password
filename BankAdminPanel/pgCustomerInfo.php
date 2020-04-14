<?php
	session_start();
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
<style>
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
              <a class="nav-link" href="pgAdminPanel.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgCustomerInfo.php">Customer Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgChangePassword.php">Change Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgLogout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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

			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Name</label>
					<input type="text" class="form-control" placeholder="Name" id="txtName" required data-validation-required-message="Please enter your name."/>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email Address" id="txtEmail" required data-validation-required-message="Please enter your email address.">
					<p class="help-block text-danger"></p>
				  </div>
			</div>
			
            <div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Mobile Number</label>
					<input type="tel" class="form-control" placeholder="Mobile Number" id="txtMobile" required data-validation-required-message="Please enter your mobile number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Adress</label>
					<textarea rows="3" class="form-control" placeholder="Address" id="txtAddress" required data-validation-required-message="Please enter a message."></textarea>
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			
			<label>Gender</label>
			<input type="radio" name="Gender" id="male" value="Male">Male &nbsp;&nbsp;
			<input type="radio" name="Gender" id="female" value="Female">Female<br>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Date Of Birth</label>
					<input type="date" class="form-control" placeholder="Date Of Birth" id="txtDOB" required data-validation-required-message="Please enter your phone number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
          
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Adhar Card Number</label>
					<input type="tel" class="form-control" placeholder="Adhar Number" id="txtAdhar" required data-validation-required-message="Please enter your adhar number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>IMIE Number</label>
					<input type="tel" class="form-control" placeholder="IMIE Number" id="txtIMIE" required data-validation-required-message="Please enter your IMIE number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Amount</label>
					<input type="tel" class="form-control" placeholder="Amount" id="txtAmount" required data-validation-required-message="Please enter amount.">
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
				
			<label>Status</label>	
			<select id="selStatus" class="form-control">
				<option value="On">On</option>
				<option value="Off">Off</option>
			</select>
			<br>
			<center>Select Goal Number For Security</center>
			<table width="100%">
				<tr>
					<th>
						<center>Goal 1</center>
						<center><img src="images/Goal.svg" id="1" onclick="goalstatus(1);" /></center>
					</th>
					<th>
						<center>Goal 2</center>
						<center><img src="images/Goal.svg" id="2" onclick="goalstatus(2);" /></center>
					</th>
					<th>
						<center>Goal 3</center>
						<center><img src="images/Goal.svg" id="3" onclick="goalstatus(3);" /></center>
					</th>
					<th>
						<center>Goal 4</center>
						<center><img src="images/Goal.svg" id="4" onclick="goalstatus(4);" /></center>
					</th>
					<th>
						<center>Goal 5</center>
						<center><img src="images/Goal.svg" id="5" onclick="goalstatus(5);" /></center>
					</th>
				</tr>
			</table><br><br>
		</div>
</div>
			
			
			<input type="hidden" id="hdnID">
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="saveCustomerInfo();">Save</button></center>
            </div>
			
			<table id="tableData" border="1" width="100%">
			</table>
			
          <!-- Pager -->
        </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- 	Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

<script>
$(document).ready(function(){
	showData();
});
var goal="";
function goalstatus(id){
	
	goal=id;
	if(id==1){
		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(2).style.backgroundColor = "";	
		document.getElementById(3).style.backgroundColor = "";	
		document.getElementById(4).style.backgroundColor = "";	
		document.getElementById(5).style.backgroundColor = "";	
	}if(id==2){
		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(1).style.backgroundColor = "";	
		document.getElementById(3).style.backgroundColor = "";	
		document.getElementById(4).style.backgroundColor = "";	
		document.getElementById(5).style.backgroundColor = "";	
	}if(id==3){
		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(2).style.backgroundColor = "";	
		document.getElementById(1).style.backgroundColor = "";	
		document.getElementById(4).style.backgroundColor = "";	
		document.getElementById(5).style.backgroundColor = "";	
	}if(id==4){
		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(2).style.backgroundColor = "";	
		document.getElementById(3).style.backgroundColor = "";	
		document.getElementById(1).style.backgroundColor = "";	
		document.getElementById(5).style.backgroundColor = "";	
	}if(id==5){
		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(2).style.backgroundColor = "";	
		document.getElementById(3).style.backgroundColor = "";	
		document.getElementById(4).style.backgroundColor = "";	
		document.getElementById(1).style.backgroundColor = "";	
	}
}

$("#txtAmount").keypress(function(key) {
	if(key.charCode<48 || key.charCode>57)return false;
});	
	$("#txtName").blur(function(){
	var val=$("#txtName").val();
	if(val!=""){
		if (/^[a-zA-Z ]{2,30}$/.test(val)) {

		} 
		else {
		$("#txtName").val("");
		alert("name must have alphabates");
		console.log("Wrong");
		$("#txtName").focus();

	}
}
});//name validate

// email valid
$("#txtEmail").blur(function(){
	var val=$("#txtEmail").val();
	if(val!=""){
		if (							/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)) {

		} else {
			$("#txtEmail").val("");
			alert("email must be proper");
			console.log("Wrong");
			$("#txtEmail").focus();

		}
	}
});// email valid

//
$("#txtMobile").blur(function(){
	var val=$("#txtMobile").val();
	if(val!=""){
		if (/^\d{10}$/.test(val)) {

		} else{
			$("#txtMobile").val("");
			alert("Mobile must be 10 digits");
			console.log("Wrong");
			$("#txtContact").focus();

		}
	}
});// Mobile validate
	
	$("#txtAdhar").blur(function(){
	var val=$("#txtAdhar").val();
	if(val!=""){
		if (/^\d{12}$/.test(val)) {

		} else{
			$("#txtAdhar").val("");
			alert("Aadhar must be 12 digits");
			console.log("Wrong");
			$("#txtAdhar").focus();

		}
	}
});

	$("#txtIMIE").blur(function(){
	var val=$("#txtIMIE").val();
	if(val!=""){
		if (/^\d{15}$/.test(val)) {

		} else{
			$("#txtIMIE").val("");
			alert("IMIE must be 16 digits");
			console.log("Wrong");
			$("#txtIMIE").focus();

		}
	}
});

	function saveCustomerInfo(){
	var gen=$('input[name=Gender]:checked').val();
		if($("#btnSubmit").html()=="Save"){
		//console.log(Umesh);
			$.ajax({
				type:"POST",
				url:"saveCustomerDetails.php",
				data:{name:$("#txtName").val(),email:$("#txtEmail").val(),mobile:$("#txtMobile").val(),address:$("#txtAddress").val(),gen:gen,dob:$("#txtDOB").val(),adharcard:$("#txtAdhar").val(),imie:$("#txtIMIE").val(),status:$("#selStatus").val(),goal:goal,amount:$("#txtAmount").val()},
				success:function(response){
				},
				complete:function(response){
					console.log(response);
					var resp=response.responseText;
					console.log(resp);
					if($.trim(resp)=="Success"){
						alert("Details Saved Successfully");
						$("#txtName").val("");
						$("#txtAddress").val("");
						$("#txtMobile").val("");
						$("#txtEmail").val("");
						$("#txtAdhar").val("");
						$("#txtDOB").val("");
						$("#txtAmount").val("");
						$('input[name=Gender]:checked').val("");
						$("#txtIMIE").val("");
						document.getElementById(1).style.backgroundColor = "";
						document.getElementById(2).style.backgroundColor = "";	
						document.getElementById(3).style.backgroundColor = "";	
						document.getElementById(4).style.backgroundColor = "";	
						document.getElementById(5).style.backgroundColor = "";
						showData();
					}else if($.trim(resp)=="Name"){
							alert("Enter name");
							
					}else if($.trim(resp)=="Address"){
							alert("Enter Address");
							
					}else if($.trim(resp)=="Mobile"){
							alert("Enter Mobile");
							
					}else if($.trim(resp)=="Email"){
							alert("Enter Email");
							
					}else if($.trim(resp)=="Amount"){
							alert("Minimum amount 1000");
							
					}else if($.trim(resp)=="Goal"){
							alert("Select Goal");
							
					}else if($.trim(resp)=="Exist"){
						alert("this entry is already exist");
						
					}
					else{
						alert("Details Not Saved");
						$("#txtName").val("");
						$("#txtAddress").val("");
						$("#txtMobile").val("");
						$("#txtEmail").val("");
						$("#txtAdhar").val("");
						$("#txtDOB").val("");
						$('input[name=Gender]:checked').val("");
						$("#txtIMIE").val("");
					}
				}
			});
		}
		else{
			$.ajax({
				type:"POST",
				url:"editCustomerDetails.php",
				data:{id:$("#hdnID").val(),name:$("#txtName").val(),email:$("#txtEmail").val(),mobile:$("#txtMobile").val(),address:$("#txtAddress").val(),gender:gen,dob:$("#txtDOB").val(),adharcard:$("#txtAdhar").val(),imie:$("#txtIMIE").val(),status:$("#selStatus").val(),goal:goal},
				success:function(response){
				},
				complete:function(response){
					console.log(response);
					var resp=response.responseText;
					console.log(resp);
					if($.trim(resp)=="Success"){
						alert("Details Updated Successfully");
						$("#txtName").val("");
						$("#txtAddress").val("");
						$("#txtMobile").val("");
						$("#txtEmail").val("");
						$("#txtAdhar").val("");
						$("#txtDOB").val("");
						$("#txtAmount").val("");
						document.getElementById(1).style.backgroundColor = "";
						document.getElementById(2).style.backgroundColor = "";	
						document.getElementById(3).style.backgroundColor = "";	
						document.getElementById(4).style.backgroundColor = "";	
						document.getElementById(5).style.backgroundColor = "";
						$('input[name=Gender]:checked').val("");
						$("#txtIMIE").val("");
						$("#btnSubmit").html("Save");
						showData();
					}else if($.trim(resp)=="Name"){
							alert("Enter name");
							
					}else if($.trim(resp)=="Address"){
							alert("Enter Address");
							
					}else if($.trim(resp)=="Mobile"){
							alert("Enter Mobile");
							
					}else if($.trim(resp)=="Email"){
							alert("Enter Email");
							
					}else if($.trim(resp)=="Amount"){
							alert("Minimum amount 1000");
							
					}else if($.trim(resp)=="Goal"){
							alert("Select Goal");
							
					}
					else if($.trim(resp)=="Exist"){
						alert("this entry is already exist");
						$("#btnSubmit").html("Save");
					}
					else{
						alert("Details Not Saved");
						
						$("#btnSubmit").html("Save");
					}
				}
			});
		}
	} 
	
	// Read a page's GET URL variables and return them as an associative array.
	function getUrlVars()
	{
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}

	
	function showData(){
	var id = getUrlVars()["id"];
		$.ajax({
			type:"POST",
			url:"getCustomerDetails.php",
			data:{ID:id},
			success:function(response){
				$("#tableData").html(response);
			}
		});
	}
	
	function editRecord(id){
		$("#hdnID").val(id);
		$("#txtName").val($("#Name"+id).html());
		$("#txtMobile").val($("#Mobile"+id).html());
		$("#txtEmail").val($("#Email"+id).html());
		$("#txtAddress").val($("#Address"+id).html());
		
		
		$("#txtAdhar").val($("#Adhar"+id).html());
		$("#txtIMIE").val($("#IMIE"+id).html());
		$("#selStatus").val($("#Status"+id).html());
		$("#txtDOB").val($("#DOB"+id).html());
		$("#btnSubmit").html("Edit");
		if($("#Goal"+id).html()==1){document.getElementById(1).style.backgroundColor = "lightblue"; goal=1;}
		else if($("#Goal"+id).html()==2){document.getElementById(2).style.backgroundColor = "lightblue"; goal=2;}
		else if($("#Goal"+id).html()==3){document.getElementById(3).style.backgroundColor = "lightblue"; goal=3;}
		else if($("#Goal"+id).html()==4){document.getElementById(4).style.backgroundColor = "lightblue"; goal=4;}
		else {document.getElementById(5).style.backgroundColor = "lightblue"; goal=5;}
		$("input[name=Gender][value=" + $("#Gender"+id).html()+ "]").attr('checked', 'checked');
		
	}
	function deleteRecord(id){
		var ans= confirm("Are you sure to delete selected record?");
		if(ans==true){
		$.ajax({
			type:"POST",
			url:"deleteCustomerDetails.php",
			data:{id:id},
			success:function(response){
			if($.trim(response)=="Success"){
				alert("delete successfully");
				showData();
			}
			}
		});
	}
	}
</script>	
	
  </body>
</html>