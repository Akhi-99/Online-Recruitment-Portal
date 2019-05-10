<?php

session_start();
//echo $_SESSION["vishnu"];
//echo $_SESSION["correct_ans"]."="."correctly answered"."<br>" ;
//echo $_SESSION["wrong_ans"]."="."wrongly answered"."<br>" ;
//echo $_SESSION["un_attempted"]."="."Not answered"."<br>" ;

//for($j=0;$j<4;$j++)
//{
  //  echo $_SESSION["arr"][$j]."<br>";

//}

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
            //header("Location:title_page.php");
            window.location.href="title_page.php";
        }
    </script>

    <div align="center">
	<h1 style="text-align:center">YOUR RESULT</h1>
    <br>
    <table>
        
    	<tr>
        	<td><label class='txt'><b>Total Marks :</b></label></td>
        	<td><label class='txt'><?php echo $_SESSION["correct_ans"]; ?>/5</label></td>
        </tr>
        <tr>
        	<td><label class='txt'><b>Attempted  :</b></label></td>
        	<td><label class='txt'><?php echo $_SESSION["correct_ans"]+$_SESSION["wrong_ans"];?></label><td>
        </tr>
        <tr>
        	<td><label class='txt'><b>Correct  :</b></label></td>
        	<td><label class='txt'><?php echo $_SESSION["correct_ans"];?></label><td>
        </tr>
        <tr>
        	<td><label class='txt'><b>Wrong  :</b></label></td>
        	<td><label class='txt'><?php echo $_SESSION["wrong_ans"];?></label><td>
        </tr>
        <tr>
        	<!--<td><label class='txt'><b>Unattempted  :</b></label></td>
        	<td><label class='txt'><?php echo $_SESSION["un_attempted"];?></label></td> -->
        </tr>
    </label>
      </table>  

       <br><br>
   <!-- <input type="button" align="middle" name="logout" value="Logout" onclick="fun()"><br> -->
    <form method="post" action="view.php">
    <input type="submit" align="middle" class='but' name="view" value="view_wrong"><br>
    </form>
</div>
</body>
</html>

<?php
/*if($_SESSION["tmup"]==1)
//{?>  echo "<script>alert("Time is up");</script>";     <?php}
//session_unset();
//session_destroy();
*/
if($_SESSION["tmup"]==1) 
{       echo '<script language="javascript">';
        echo 'alert("Time is UP")';
        echo '</script>';
        //$_SESSION["flag"]=3;
        //echo "<script>alert("Invalid login");</script>";
}

?>