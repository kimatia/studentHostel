<?php 
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_errno());
$db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_errno());

if (isset($_POST['upload'])) {
    
    $allotup =$_POST['allotup'];
    $block =$_POST['block'];
    $roomno =$_POST['room'];
    $beds =$_POST['beds'];
    $name =$_POST['name'];
    $status =$_POST['status'];

    $up ="UPDATE `room_allotment` SET `block`='$block',`name`='$name',`roomno`='$roomno',`beds`='$beds',`status`='$status' WHERE id='$allotup'";
    $result=mysqli_query($conn,$up)or die(mysqli_connect_error());
    header("location:room_allot_view.php");

}



?>