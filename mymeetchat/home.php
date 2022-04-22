<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$sql=mysqli_query($al,"SELECT * FROM users WHERE email='$email'");
$b=mysqli_fetch_array($sql);
$name=$b['name'];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MeetChat | HOME</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>
<!-- <style>
	body {
	background-image: url("../images/bg.jpg");
	background-repeat: repeat;
}
</style> -->

<body>
<span class="heading">Welcome <?php echo $name;?></span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />
<br /><div align="center">
<table class="table" cellpadding="20" cellspacing="20">
<tr><td align="center">
<span class="tableHead" style="text-decoration:underline;">User Commands</span><br /><br />
<a href="box.php"><img src="images/croom.jpg" height="65" width="95" style="border-radius:6px;" /></a><br><br>
<a href="conversation.php"><img src="images/conver.jpg" height="65" width="95" style="border-radius:6px;" /></a><br /><br>
<a href="changePassword.php"><img src="images/passs.jpg" height="65" width="95" style="border-radius:6px;" /></a>


</td></tr></table></div>
</body>
</html>