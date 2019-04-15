<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
       <?php 
      // include 'header.php';
     //  include 'left_side_bar.php';
      $conn = mysqli_connect("localhost", "root", "kimatia7950")or die(mysqli_connect_errno());
      $db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_errno());
      if (isset($_POST['upload'])) {
      	// for update use mess id
      	$mess1 =$_POST['mess'];

          $name =$_POST['name'];
          $food =$_POST['food'];
          $messcard =$_POST['messcard'];
          $startdate =$_POST['startdate'];
          $enddate =$_POST['enddate'];
          $status =$_POST['status'];

$query ="UPDATE `messcard` SET `name`='$name',`food`='$food',`messcard`='$messcard',`startdate`='$startdate',`enddate`='$enddate',`status`='$status' WHERE `id`='$mess1'";
    $mess =mysqli_query($conn, $query)or die(mysqli_connect_error());
    header("location:messcard_edit.php?id=$mess1");


      }
      else {
        echo "messcard is not update";
      }
      mysqli_close($conn);

       ?>
</body>
</html>