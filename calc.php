<?php

session_start();	
//$_SESSION["arr"]= array(2,2,2,2,0,0,0,0,0,0);


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_SESSION["tmup"]==1)
	{
		header("Location:result_page.php");
		exit;
	} 
	else if(isset($_POST["next"]))
	{
		$radio_val= $_POST["option"];
		$right_ans =$_SESSION["corr_opt"];

		if($radio_val == $right_ans)
		{
			$_SESSION["correct_ans"]++;
			//echo "yes you are right";
		}
		else if($radio_val=='A' ||$radio_val=='B'||$radio_val=='C'||$radio_val=='D' )
		{	$_SESSION["wrong_ans"]++;
			$index = $_SESSION["current_id"]-1;
			$_SESSION["arr"][$index]=1;
		}
		else 
			$_SESSION["un_attempted"]++;

		header("Location:try_qsn.php");
		exit;
	}
	else if(isset($_POST["submit"]))
	{
		$radio_val= $_POST["option"];
		$right_ans =$_SESSION["corr_opt"];

		if($radio_val == $right_ans)
		{
			$_SESSION["correct_ans"]++;
		}
		else if($radio_val=='A' ||$radio_val=='B'||$radio_val=='C'||$radio_val=='D' )
		{
			$_SESSION["wrong_ans"]++;
			$index = $_SESSION["current_id"]-1;
			$_SESSION["arr"][$index]=1;
		}
		else 
			$_SESSION["un_attempted"]++;

	}
	header("Location:result_page.php");
	exit;
}
?>