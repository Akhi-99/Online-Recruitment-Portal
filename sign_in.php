<?php

session_start();
if(!isset($_SESSION["flag"]))
{
    $_SESSION["flag"]=0;
}
if(!isset($_SESSION["already"]))
{
    $_SESSION["already"]=0;
}

?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<h1 style="text-align:center">PLEASE SIGN IN TO PROCEED</h1>
    <div align="center">
    <form  method="post" action="check_login.php">
   
    <label class ='txt'>Email   :</label>
    <input type="email"  name="email" required><br><br>
    
    <label class ='txt'>Password:</label>
    <input type="password" name="passwd" required><br><br>
    <input type="submit" class='but' name="submit"  value="Submit"><br><br>
    </form>
    </div>
</body>
<script type="text/javascript">
   localStorage.removeItem("currentTime");
    localStorage.removeItem("targetTime");
    let currentTime = localStorage.getItem('currentTime');
let targetTime = localStorage.getItem('targetTime');
    console.log(currentTime);
    console.log(targetTime);
</script>
</html>


<?php

if($_SESSION["flag"]==1) 
{       echo '<script language="javascript">';
        echo 'alert("Successfully registered")';
        echo '</script>';
        //$_SESSION["flag"]=3;
        //echo "<script>alert("Invalid login");</script>";
}

if($_SESSION["flag"]==2) 
{		echo '<script language="javascript">';
		echo 'alert("Invalid Login")';
		echo '</script>';
		//echo "<script>alert("Invalid login");</script>";
}
if($_SESSION["already"]==1) 
{       echo '<script language="javascript">';
        echo 'alert("Already Registered.Please login to Proceed")';
        echo '</script>';
        //echo "<script>alert("Invalid login");</script>";
}
?>


<?php
session_unset();
session_destroy();

?>

