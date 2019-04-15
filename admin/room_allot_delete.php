<?php 
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db( $conn,'hostel2')or die(mysqli_connect_error());

   if (isset($_GET['id'])) {
        $id =$_GET['id'];
    

$selectall ="SELECT * FROM `room_allotment` WHERE id='$id'";
$result =mysqli_query($conn,$selectall)or die(mysqli_connect_error());
$row =mysqli_fetch_array($result)or die(mysqli_connect_error());
   
       $block =$row['block'];
       $roomno =$row['roomno'];
       $beds =$row['beds'];
   
   
 $del = mysqli_query($conn,"DELETE FROM `room_allotment` WHERE id='$id'")or die(mysqli_connect_error());
$del_student =mysqli_query($conn,"DELETE FROM `student` WHERE id='$'")or die(mysqli_connect_error());
$update = "UPDATE `room` SET `status`='enabled' WHERE block='$block' && roomno='$roomno' && beds='$beds'";
$result =mysqli_query($conn,$update)or die(mysqli_connect_error());
header("location:room_allot_view.php");
}

?>