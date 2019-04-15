<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Entry</title>
</head>


<body>

<?php 
//include 'header.php';
//include 'left_side_bar.php';


     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     
    if (isset($_POST['upload'])) {

    
    $course=$_POST['course'];
    $name=$_POST['student_name'];
    $birthdate=$_POST['birthdate'];
    $join=$_POST['join'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $number=$_POST['number'];
    $pnumber=$_POST['pnumber'];
    $blood=$_POST['blood'];
    $status=$_POST['status'];

    $query="INSERT INTO `student`(`id`, `course`, `student_name`, `dob`, `join`, `fname`, `mname`, `gender`, `address`, `contact`, `pnumber`, `blood`, `status`) VALUES ('','$course','$name','$birthdate','$join','$fname','$mname','$gender','$address','$number','$pnumber','$blood','$status')";    

    
    $sel =mysqli_query($conn,$query)or die(mysqli_connect_error());
    header('location:student_add.php');
 
 }
 else{
echo "student record not saved";

    }
   
   mysqli_close($conn);

?>
</body>

</html>