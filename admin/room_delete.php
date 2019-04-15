<?php 
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_error());
$delete =$_GET['id'];
$del ="DELETE FROM `room` WHERE id='$delete'";
$result =mysqli_query($conn,$del)or die(mysqli_connect_error());
header("location:room_view.php");


?>