<?php
include('conn.php');
if(isset($_POST['name']))
{
	$username = mysqli_real_escape_string(trim($_POST['name']));
	$sql = "SELECT `name` FROM `student` WHERE `name` = '$username'";
	$myquery = mysqli_query($sql) or die(mysqli_connect_error());
	if(mysqli_num_rows($myquery) !=0)
	{
		$row = mysqli_fetch_array($myquery);
		echo 'exist';
	}
	else
	{
		echo 'does not exist';
	}
}
?>