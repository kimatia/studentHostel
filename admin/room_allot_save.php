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

    $block=trim($_POST['block']);
    $name=trim($_POST['name']);
    $roomno=trim($_POST['room']);
    $beds=trim($_POST['beds']);
    $status=trim($_POST['status']);
    

    $query="INSERT INTO `room_allotment`(`id`, `block`, `name`, `roomno`, `beds`, `status`) VALUES ('','$block','$name','$roomno','$beds','$status')";
    
    $sel =mysqli_query($conn,$query)or die(mysqli_connect_error());

    header('location:room_allot.php');
 
 }
 else{
echo "room not alloted";

    }
   
   mysqli_close($conn);

?>
</body>

</html>