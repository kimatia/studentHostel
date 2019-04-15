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
          $name =$_POST['name'];
          $food =$_POST['food'];
          $messcard =$_POST['messcard'];
          $startdate =$_POST['startdate'];
          $enddate =$_POST['enddate'];
          $status =$_POST['status'];

          $query ="INSERT INTO `messcard`(`id`, `name`, `food`, `messcard`, `startdate`, `enddate`, `status`) VALUES ('','$name','$food','$messcard','$startdate','$enddate','$status')";
    $mess =mysqli_query($conn, $query)or die(mysqli_connect_error());
    header("location:messcard.php");


      }
      else {
        echo "messcard is not add";
      }
      mysqli_close($conn);

       ?>
</body>
</html>