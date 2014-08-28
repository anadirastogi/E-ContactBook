


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
			header ('Location: deletesorry.php');
		}
		else
		{
			 
			 $sql=mysql_query("DELETE from contactlist WHERE mobileno ='$m' OR emailid='$e' OR name='$name'  ");
			header ('Location: deletedone.php');
		}
    }
   	else
	{
		 
    		header ('Location: deletesorry.php');
		
    		
   }
	

?>

</body>
</html>
