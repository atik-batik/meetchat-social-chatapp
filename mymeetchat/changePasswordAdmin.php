<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['id']))
{
	header("location:adminLogin.php");
}
$id=$_SESSION['id'];
$sql=mysqli_query($al,"SELECT * FROM admin WHERE id='$id'");

$b=mysqli_fetch_array($sql);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
}else
{
if($old!=$pass)
{
	$info="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$info="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al,"UPDATE admin SET password='$p2' WHERE id='$id'");
		$info="Successfully Changed your Password";
	}

}

?>
<html>
<head>

<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
<title>Change Password</title>
</head>

<body>
<span class="heading">Change Password</span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />
<br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="table">

<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Enter Old Password :</td><td><input type="password" name="old" size="25" class="fields" required="required" /></td></tr>
<tr><td class="labels">Enter New Password :</td><td><input type="password" name="p1" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Re-Type New Password :</td><td><input type="password" name="p2" size="25"  class="fields" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="commandButton" /></td></tr>
</table>
</form>
<br />
<br />
<a href="adminHome.php">BACK</a>
</div>

</body>

</html>