<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['id']))
{
	header("location:adminLogin.php");
}
$sql=mysqli_query($al,"SELECT * FROM users");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
<title>Manage Users</title>
</head>

<body>
<span class="heading">Manage Users</span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />

<div align="center">
<table class="table" cellpadding="4" cellspacing="4">
<tr class="tableHead" style="font-size:15px;"><th>Name</th><th>Nick Name</th><th>Date of Birth</th><th>Email</th><th>Contact</th><th>Date</th>
<th>Delete</th></tr>
<?php
while($b=mysqli_fetch_array($sql))
{
	?>
<tr class="msg"><td><?php echo $b['name'];?></td>
<td><?php echo $b['nick'];?></td>
<td><?php echo $b['dob'];?></td>
<td><?php echo $b['email'];?></td>
<td><?php echo $b['contact'];?></td>
<td><?php echo $b['date'];?></td>
<td><a href="deleteUser.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');">Delete</a></td></tr>
<?php } ?>
</table>	
<br />
<br />
<a href="adminHome.php">BACK</a>
</body>
</html>