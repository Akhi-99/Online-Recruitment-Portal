<?php

session_start();

$servername ="localhost";
$user_name="root";
$password="";
$db= "exam_portal";

//$_SESSION['arr']= array(0,0,0,0,0,0,0,0,0,0);
for($j=0;$j<4;$j++)
{
	//echo $_SESSION["arr"][$j]."<br>";
	;

}

$end=0;

$conn = mysqli_connect($servername,$user_name,$password,$db);

if(!$conn)
	die("Connection Failed".mysqli_connect_error());
else
	echo "Connection Successful"."<br>";


if(!isset($_SESSION["i"]))	//first question
{	
	$_SESSION["i"]=1;
	$index = $_SESSION["i"]-1;
	if($_SESSION["arr"][$index]==1)
	{
		$sql = "SELECT * FROM Question WHERE Id = $index+1";
		$result = mysqli_query($conn,$sql);
		if($result)
			echo "query Successful";
		else
			echo "query unsuccessful";

		$row = mysqli_fetch_assoc($result);
		$num=$_SESSION["i"];
		$_SESSION["i"]++;
	}
	else
	{
		$_SESSION["i"]++;
		header("Location:view.php");
		exit;
	}

}
else
{	
	if($_SESSION["i"]>=6)
	{
		header("Location:thank_page.php");
		exit;
	}
	$index = $_SESSION["i"]-1;
	if($_SESSION["arr"][$index]==1)
	{
		$sql = "SELECT * FROM Question WHERE Id = $index+1";
		$result = mysqli_query($conn,$sql);
		if($result)
			echo "query Successful";
		else
			echo "query unsuccessful";

		$row = mysqli_fetch_assoc($result);
		$num=$_SESSION["i"];
		$_SESSION["i"]++;
	}
	else
	{
		$_SESSION["i"]++;
		header("Location:view.php");
		exit;
	}

	//$_SESSION["current_id"]=$row["Id"];
	//$_SESSION["corr_opt"]=$row["Ans"];
	if($_SESSION["i"]==6)
		$end=1;


}

?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<script>
	function fun()
	{
		window.location.href="result_page.php";

	}
</script>
	<form method="post" action="view.php">
 		<label class='txt'>Question <?php echo $num.": ".$row["Qsn"];?></label><br>

       <label class='txt'> A: <input type="radio" name="option" class='txt' value="A"> <?php echo $row["op_A"]; ?><br></label>
       <label class='txt'> B: <input type="radio" name="option" class='txt' value="B"> <?php echo $row["op_B"]; ?><br></label>
       <label class='txt'> C: <input type="radio" name="option" class='txt' value="C"> <?php echo $row["op_C"]; ?><br></label>
       <label class='txt'> D: <input type="radio" name="option" class='txt' value="D"> <?php echo $row["op_D"]; ?><br></label>

        <label class='txt'>Answer: Option 	<?php echo $row["Ans"]; ?><br><br></label>
        <br><br>
        <?php if($end==1){ echo "<input type='submit'class='but' name='submit' value='Done'><br>"; }
              else echo"<input type='submit' class='but' name='next' value='Next'><br> " ;?>

     </form>
</body>
</html>
