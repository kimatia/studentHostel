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
      $db =mysqli_select_db($conn,'hostel2')or die(mysqli_connect_errno());
      if (isset($_POST['upload'])) {

          $fees =$_POST['fees'];
          $cost =$_POST['cost'];
          $status =$_POST['status'];

          $query ="INSERT INTO `fees_structure`(`id`, `fees_type`, `cost`, `status`) VALUES ('','$fees','$cost','$status')";
    $mess =mysqli_query($conn, $query)or die(mysqli_connect_error());
    header("location:fees.php");


      }
      else {
        echo "fees_structure is not add";
      }
      mysqli_close($conn);

       ?>
</body>
</html>