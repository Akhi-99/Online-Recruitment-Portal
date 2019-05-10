<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<style>
	body {
  		background-image: url("bg1.jpg");
	}
	h1{
 	 margin-top: 100px;
 	 margin-bottom: 100px;
  	margin-right: 150px;
  	margin-left: 80px;
  	color:white;
  	text-align:center;
	}
	</style>
</head>

<script>
	function sign_in()
	{
		window.location.href="sign_in.php";
	}
	function register()
	{
		window.location.href="reg_page.html";
	}

</script>


<body>
	<!--<div class="w3-container w3-teal"> -->
	<div align="center">
	<h1>WELCOME TO ONLINE EXAMINATION PORTAL</h1>
    <br><br><br><br><br><br>
    <label class ='txt'>Already Registered?</label><br>
    <button type="button" class='but' onclick="sign_in()" style="align:middle" >SIGN_IN</button>
    <br><br><br>
    <label class ='txt'>Not Registered?</label><br>
    <button type="button" class='but' onclick="register()">REGISTER</button>
	</div>
</body>
</html>