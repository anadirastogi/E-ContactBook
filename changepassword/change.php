
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$user= mysql_real_escape_string($_POST["login"]);

$pass= mysql_real_escape_string($_POST["oldpassword"]);
$newpass= mysql_real_escape_string($_POST["newpassword"]);
$confirmnewpass= mysql_real_escape_string($_POST["confirmnewpassword"]);
$con=mysql_connect("localhost","root","");

if(! $con)

{

        die('Connection Failed'.mysql_error());

}

mysql_select_db("contactbook",$con);

$result=mysql_query("SELECT * FROM PASSWORD WHERE username = '$user' && password ='$pass'");
$rowcount= mysql_num_rows($result);


    if($rowcount)
	{
		if($newpass!=$confirmnewpass) 
		{
    	  header ('Location: err2.php');
		}
		else
		{
			$sql=mysql_query("UPDATE password SET password='$newpass' where username='$user'"); 
    		
    		echo header ('Location: success.php');
    		
		}
    }
   	else
	{
		
		 header ('Location: err1.php');
    }
	

?>

</body>
</html>
