<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
<style>
.error{ color:red; }
</style>
</head>
<body>

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

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["name"]))
      {  $ErrName ="Name can't be empty";}
    else
    {
        $name = test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$name))
    {    $ErrName ="Invalid Name";}
    }

    if(empty($_POST["email"]))
    {    $ErrEmail ="Email can't be empty";}
    else
    {
        $email=test_input($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {    $ErrEmail="Invalid email address";}
    }

    if(empty($_POST["roll"]))
    {    $ErrRoll ="Roll No can't be empty";}
    else
    {
        $roll = test_input($_POST["roll"]);
    if(!preg_match("/^[a-zA-Z0-9]*$/",$roll))
     {   $ErrRoll ="Invalid Roll NO";}
    }

    if(empty($_POST["passwd"]))
    {  $ErrPasswd ="Password can't be empty";}
    else
    {   $passwd= test_input($_POST["passwd"]);}
    
}


?>








	<h1 style="text-align:center color:white">REGISTRATION PAGE</h1>
    <p><span class="error">* required</span><br><br></p>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label class='txt'>Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $ErrName; ?></span><br><br>
    <label class='txt'>Roll No:</label>
    <input type="text" name="roll" value="<?php echo $roll; ?>">
    <span class="error">* <?php echo $ErrRoll; ?></span><br><br> 
    <label class='txt'>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $ErrEmail; ?></span><br><br>
    <label class='txt'>Branch:</label>
    <input type="text" name="branch"><br><br>
    <label class='txt'>College:</label>
    <input type="text" name="college"><br><br>
    <label class='txt'>CGPA:</label>
    <input type="text" name="cgpa"><br><br>
   <!-- 10th marks:
    <input type="text" name="10th"><br><br>
    12th marks:
    <input type=text name="12th"><br><br> 
-->
    <label class='txt'>Password:</label>
    <input type="text" name="passwd">
    <span class="error">* <?php echo $ErrPasswd; ?></span><br><br>
    <input type="button" class='but' name="submit" value="Submit"><br><br>
    </form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
?
>
</body>
</html>