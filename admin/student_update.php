<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once '../dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Entry</title>
</head>
<body>

<?php 
//include 'header.php';
//include 'left_side_bar.php';

//print_r($_POST);
//die();


    //$update =$_GET['id'];
  // echo $update;
  //  die();
     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     
    if (isset($_POST['upload'])) {
// for update 
    $name1 =$_POST['nameupdate'];
    
   
    $course=$_POST['course'];
    $name=$_POST['student_name'];
    $birthdate=$_POST['birthdate'];
    $join=$_POST['join'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $contact = $_POST['contact'];
    $pnumber=$_POST['pnumber'];
    $blood=$_POST['blood'];
    $status=$_POST['status'];
  $up1 = "UPDATE `student` SET `course`='$course',`student_name`='$name',`dob`='$birthdate',`join`='$join',`fname`='$fname',`mname`='$mname',`gender`='$gender',`address`='$address',`contact`='$contact',`pnumber`='$pnumber',`blood`='$blood',`status`='$status' WHERE `id`='$name1'";
//echo $up;die();
$result =mysqli_query($conn,$up1)or die(mysqli_connect_error());
header("location:student_view.php");
 }
 else{
echo "student record not updated";
header("location:student_edit.php");

    }
   
   mysqli_close($conn);

?>
</body>

</html>