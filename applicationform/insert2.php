

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$TARGET_PATH = "store/";
$name= mysql_real_escape_string($_POST["name"]);

$m= mysql_real_escape_string($_POST["mobileno"]);
$a= mysql_real_escape_string($_POST["address"]);
$e= mysql_real_escape_string($_POST["emailid"]);

$con=mysql_connect("localhost","root","");

if(! $con)

{

        die('Connection Failed'.mysql_error());

}

mysql_select_db("contactbook",$con);
session_start();
$userdis=$_SESSION['user'];

$result=mysql_query("SELECT mobileno FROM contactlist WHERE mobileno ='$m'");
$rowcount= mysql_num_rows($result);


    if(empty($m) || empty($name) )
	{
		header ('Location: insertsorry.php');
    }
   	else
	{
		 
    		if(!$rowcount)
		{
			$sql=mysql_query("INSERT into contactlist (username,mobileno,name,emailid,address) values ('$userdis','$m','$name','$e','$a') ");
			header ('Location: insertdone.php');
		}
		else
		{
			 header ('Location: insertsorry.php');
		}
    		
   }
	

?>

</body>
</html>
