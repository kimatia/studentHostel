<?php 
$delete =$_GET['id'];
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());

$delete ="DELETE FROM `student` WHERE id='$delete'";
$result =mysqli_query($conn,$delete);
header("location:student_view.php");


?>