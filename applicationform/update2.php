



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$name= mysql_real_escape_string($_POST["name"]);

$m= mysql_real_escape_string($_POST["mobileno"]);

$e= mysql_real_escape_string($_POST["emailid"]);

$name1= mysql_real_escape_string($_POST["name1"]);

$m1= mysql_real_escape_string($_POST["mobileno1"]);

$e1= mysql_real_escape_string($_POST["emailid1"]);

$a1= mysql_real_escape_string($_POST["address"]);

$con=mysql_connect("localhost","root","");

if(! $con)

{

        die('Connection Failed'.mysql_error());

}

mysql_select_db("contactbook",$con);
session_start();
$userdis=$_SESSION['user'];

$result=mysql_query("SELECT mobileno FROM contactlist WHERE username='$userdis' AND (mobileno ='$m' OR emailid='$e' OR name='$name') ");


$rowcount= mysql_num_rows($result);


    if(isset($m) || isset($name) || isset($e))
	{
		if(!$rowcount)
		{
			header ('Location: updatesorry.php');
		}
		else
		{
			if(!empty($name1))
			 {
			 $sql=mysql_query("UPDATE contactlist SET name='$name1' WHERE username='$userdis' AND (mobileno ='$m' OR emailid='$e' OR name='$name')  ");
			header ('Location: updatedone.php');
			}
			 if(!empty($a1))
			 {
			 $sql=mysql_query("UPDATE contactlist SET address='$a1' WHERE username='$userdis' AND (mobileno ='$m' OR emailid='$e' OR name='$name') ");
			header ('Location: updatedone.php');
			}
		  if(!empty($e1))
			 {
			 $sql=mysql_query("UPDATE contactlist SET emailid='$e1' WHERE username='$userdis' AND (mobileno ='$m' OR emailid='$e' OR name='$name') ");
			header ('Location: updatedone.php');
			}
			if(!empty($m1))
			 {
			 $sql=mysql_query("UPDATE contactlist SET mobileno='$m1' WHERE username='$userdis' AND (mobileno ='$m' OR emailid='$e' OR name='$name') ");
			header ('Location: updatedone.php');
			}
		
		}
    }
   	else
	{
		 
    		header ('Location: updatesorry.php');
		
    		
   }
	

?>

</body>
</html>
