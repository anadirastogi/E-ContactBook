<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display</title>
<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Custom Login Form Styling</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(images/wood_pattern.jpg);
			}
		</style>
</head>

<body>
<section class="main"><div class="form-3"> <p><h2>Hi!  
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
if(empty($_SESSION['user']))
					{    
						header ('Location: ../sorry1.php');
					
					}
					else
					{
						echo  $_SESSION['user'];
					}
echo "   &nbsp;&nbsp;&nbsp;your contacts";
if (!empty($name) && !empty($m) && !empty($e) )
{
$qu = "select * from contactlist where username='$userdis' && emailid='$e' && name='$name' && mobileno='$m'";
}
else if (!empty($name) && !empty($m))
{
$qu = "select * from contactlist where username='$userdis' && name='$name' && mobileno='$m'";
}
else if (!empty($name) && !empty($e))
{
$qu = "select * from contactlist where username='$userdis' && emailid='$e' && name='$name'";
}
else if (!empty($e) && !empty($m))
{
$qu = "select * from contactlist where username='$userdis' && emailid='$e' && mobileno='$m'";
}
else if (!empty($e))
{
$qu = "select * from contactlist where username='$userdis' && emailid='$e'";
}
else if (!empty($name))
{
$qu = "select * from contactlist where username='$userdis' && name='$name'";
}
else if (!empty($m))
{
$qu = "select * from contactlist where username='$userdis' && mobileno='$m'";
}
else
{
$qu = "select * from contactlist where username='$userdis'";
}

$result = mysql_query($qu) or die("no contacts in list " .mysql_error());
//print_r(mysql_fetch_array($result));
echo "<table border='5' space>
<tr>
<th>Sys gen ID&nbsp;</th>
<th>NAME&nbsp;&nbsp;&nbsp;</th>
<th>ADDRESS&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>CELL NO&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>EMAIL ID&nbsp;&nbsp;&nbsp;</th>

</tr>";
while($row=mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	
	echo "<td>" . $row['address'] . "</td>";
	
	echo "<td>" . $row['mobileno'] . "</td>";
	
	echo "<td>" . $row['emailid'] . "</td>";
	$id = $row['address'];
	
	
	echo "<br>";
	
	
}
echo "</table>";
	?>
    </h2></p>
    <p class="clearfix">
                     <br/>
                     <br/>
                     
          
						<a href="select1.php" class="changepassword1" name="select">BACK
                      </a>    
						</p>
                        </div>
</section>
</body>

</html>
