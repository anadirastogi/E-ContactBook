
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
$cpass= mysql_real_escape_string($_POST["newpassword"]);

$con=mysql_connect("127.0.0.1","root","");

if(! $con)

{

        die('Connection Failed'.mysql_error());

}

mysql_select_db("contactbook",$con);

$result=mysql_query("SELECT * FROM password WHERE username = '$user' ");
$rowcount= mysql_num_rows($result);



    if(!$rowcount)
	{
		
		
		
		if($pass!=$cpass) 
		{
    	  header ('Location: err2.php');
		}
		else
		{
			$sql=mysql_query("INSERT INTO password (username,password) values ('$user','$pass')"); 
    		
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
