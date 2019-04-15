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

        $block =$_POST['block'];
        $roomno =$_POST['roomno'];
        $beds =$_POST['beds'];
        $description =$_POST['description'];
        $status =$_POST['status'];

        $query = "INSERT INTO room (id, roomno, block, beds, description,status)
VALUES ('', '$roomno', '$block', '$beds', '$description', '$status')";    

    $set=mysqli_query($conn,$query);
     header('location:room_add.php');
 
 }
 else{
echo "room not create";

    }
   mysqli_close($conn);

?>
</body>

</html>