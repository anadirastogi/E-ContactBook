<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$f_usr= mysql_real_escape_string($_POST["login"]);

$f_pswd= mysql_real_escape_string($_POST["password"]);

$con=mysql_connect("localhost","root","");

if(! $con)

{

        die('Connection Failed'.mysql_error());

}

mysql_select_db("contactbook",$con);

$result=mysql_query("SELECT * FROM PASSWORD WHERE username = '$f_usr' AND password ='$f_pswd'");
$rowcount= mysql_num_rows($result);


    if($rowcount)
	{
		session_start();
		$_SESSION['user']=$f_usr;
        header ('Location: applicationform/applicationform.php');
	
	}
    else
	{
        
		header ('Location: sorry.php');
	}
	

?>

</body>
</html>
