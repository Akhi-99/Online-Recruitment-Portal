<?php

$name=$email=$roll=$passwd="";
$ErrName= $ErrEmail = $ErrRoll = $ErrPasswd="";

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if($_SERVER["REQUEST_METHOD"] =="POST")
{
	if(empty($_POST["name"]))
		$ErrName ="Name can't be empty";
	else
	{
		$name = test_input($_POST["name"]);
	if(!preg_match("/^[a-zA-Z ]*$/",$name))
		$ErrName ="Invalid Name";
	}

	if(empty($_POST["email"]))
		$ErrEmail ="Email can't be empty";
	else
	{
		$email=test_input($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			$ErrEmail="Invalid email address";
	}

	if(empty($_POST["roll"]))
		$ErrRoll ="Roll No can't be empty";
	else
	{
		$roll = test_input($_POST["roll"]);
	if(!preg_match("/^[a-zA-Z0-9]*$/",$roll))
		$ErrRoll ="Invalid Roll NO";
	}

	if(empty($_POST["passwd"]))
		$ErrPasswd ="Password can't be empty";
	else
		$passwd= test_input($_POST["passwd"]);
	
}


?>