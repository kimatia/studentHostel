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
     
     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     
    if (isset($_POST['upload'])) {

    $room = $_POST['rupdate'];

    $block=$_POST['block'];
    $roomno=$_POST['roomno'];
    $beds=$_POST['beds'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    

    $update = "UPDATE `room` SET `roomno`='$roomno',`block`='$block',`beds`='$beds',`description`='$description',`status`='$status' WHERE id='$room'";
    $sel =mysqli_query($conn,$update)or die(mysqli_connect_error());
    header('location:room_view.php');
 
 }
 else{
echo "room  not updated";

    }
   
   mysqli_close($conn);

?>
</body>

</html>