<?php

session_start();

$servername ="localhost";
$user_name="root";
$password="";
$db= "exam_portal";

//$_SESSION["arr"]= array(2,2,2,2,0,0,0,0,0,0);

$flag=0;

$conn = mysqli_connect($servername,$user_name,$password,$db);

if(!$conn)
	die("Connection Failed".mysqli_connect_error());
else ;
	//echo "Connection Successful"."<br>";




if(!isset($_SESSION["current_id"]))	//first question
{
	$sql = "SELECT * FROM Question ORDER BY Id ASC LIMIT 1";
	$result = mysqli_query($conn,$sql);
	if($result) ;
		//echo "query Successful";
	else
		echo "query unsuccessful";

	$row = mysqli_fetch_assoc($result);

	$_SESSION["correct_ans"]=0;
	$_SESSION["wrong_ans"]=0;
	$_SESSION["un_attempted"]=0;
	//$_SESSION["noob"]=$_SESSION["timer"];
	//$_SESSION["timer"]=1;

	$sql = "SELECT * FROM Question ORDER BY Id DESC LIMIT 1";
	$result2 = mysqli_query($conn,$sql);

	if($result2) ;
		//echo "query Successful";
	else
		echo "query unsuccessful";

	$row2 = mysqli_fetch_assoc($result2);

	$_SESSION["current_id"]=$row["Id"];
	$_SESSION["last_id"]=$row2["Id"];
	$_SESSION["corr_opt"]=$row["Ans"];
	$_SESSION["curr_opt"]="";
}
else
{	
	
	//$_SESSION["noob"]=1;
	$sql = "SELECT * FROM Question
			WHERE Id > {$_SESSION['current_id']}
			ORDER BY Id ASC LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if($result) ;
		//echo "query Successful";
	else
		echo "query unsuccessful";
	$row = mysqli_fetch_assoc($result);

	$_SESSION["current_id"]=$row["Id"];
	$_SESSION["corr_opt"]=$row["Ans"];
	if($_SESSION["current_id"]==$_SESSION["last_id"])
		$flag=1;


}

?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body onload="f1()">



<script>

	

		//if(z==0){ 
		var tim;
        var hour= 0;
        var min = 0;
        var sec = <?php echo $_SESSION["timer"]; ?>;
        //document.getElementById("demo").innerHTML = z;
        var f = new Date();
       // z=1;
   // }
    
    
  

	function fun()
	{
		window.location.href="result_page.php";

	}
	function f1() {
            f2();
            document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();
        }
	function f2() {
			

            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                 <?php echo $_SESSION["timer"]--; ?>; 
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                	//if(parseInt(min)>0)
                    if(parseInt(min)>0) {
                    	min = parseInt(min) - 1;
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                        //document.getElementById("demo").innerHTML = z;
                    }
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        var tt = <?php echo $_SESSION["current_id"]; ?>;
                        if(tt<4)
                        window.location.href ="try_qsn.php";
                    	else
                    	window.location.href ="result_page.php";
                    }

                }
            }
}
   
</script>
	<form method="post" action="calc.php">
		<div id="timer" class='txt' align="right"></div><br>
		<!--<label class ='txt' id="demo"></label><br>
		<label class ='txt' id="starttime"></label><br>
		<label class ='txt' id="showtime"></label><br> -->
		
 		<label class='txt'>Question <?php echo $_SESSION["current_id"].": ".$row["Qsn"];?></label><br>

      <label class='txt'>  A: <input type="radio" name="option" class='txt' value="A"><?php echo $row["op_A"]; ?><br></label>
       <label class='txt'> B: <input type="radio" name="option" class='txt' value="B"> <?php echo $row["op_B"]; ?><br></label>
       <label class='txt'> C: <input type="radio" name="option" class='txt' value="C"> <?php echo $row["op_C"]; ?><br></label>
       <label class='txt'> D: <input type="radio" name="option" class='txt' value="D"> <?php echo $row["op_D"]; ?><br></label>

        <br><br>
        <?php if($flag==1){ echo "<input type='submit' class='but' name='submit' value='Submit'><br>"; }
              else{ echo"<input type='submit' class='but' name='next' value='Next'>    <input type='submit' class='but' name='submit' value='Submit'><br> "; }?>
              	<!--echo "<input type='submit' class='but' name='submit' value='Submit'><br>"; }? -->

     </form>
     
</body>
<script type="text/javascript">
   
 var interval;
let minutes = 1;
let currentTime = localStorage.getItem('currentTime');
let targetTime = localStorage.getItem('targetTime');
console.log(currentTime);
console.log(targetTime);
if (targetTime == null && currentTime == null) {
  currentTime = new Date();
  targetTime = new Date(currentTime.getTime() + (minutes * 60000));
  localStorage.setItem('currentTime', currentTime);
  localStorage.setItem('targetTime', targetTime);
  console.log(currentTime);
console.log(targetTime);
}
else{
  currentTime = new Date(currentTime);
  targetTime = new Date(targetTime);
}

if(!checkComplete()){
  interval = setInterval(checkComplete, 1000);
}
function checkComplete() {
  if (currentTime > targetTime) {
    clearInterval(interval);
    localStorage.removeItem("currentTime");
    localStorage.removeItem("currentTime");

    alert("Time is up");
    window.location.href="result_page.php";
    //$_SESSION["tmup"]=1;
    //header("Location:calc.php");
    //exit;
  } else {
    currentTime = new Date();
    s=(targetTime - currentTime) / 1000;
    m=s/60;
    m=m-1;

    document.getElementById("timer").innerHTML = " Time Remaining:" +Math.ceil(m%60)+":m"+Math.ceil(s%60)+"s";
  
  }
}

document.onbeforeunload = function(){
  localStorage.setItem('currentTime', currentTime);
}
</script>

</html>
