<?php
include("conn.php");
if($_POST['id'])
{
$id=mysqli_escape_String($_POST['id']);
$block=mysqli_escape_String($_POST['block']);
$gender=mysqi_escape_String($_POST['gender']);
$description=mysqli_escape_string($_POST['description']);
$status=mysqli_escape_string($_POST['status']);


$sql = "update block set `block`='$block',`gender`='$gender',`description`='$description',`status`='$status' where `id`='$id'";
mysqli_query($conn,$sql);
}
?>