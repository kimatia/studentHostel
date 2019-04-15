<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php 
      $conn = mysqli_connect("localhost", "root", "kimatia7950")or die(mysqli_connect_errno());
      $db =mysqli_select_db($conn,'hostel2')or die(mysqli_connect_errno());
      if (isset($_POST['upload'])) {
        // for fetch fees structure for update
          $fees_structure=$_POST['fees_structure'];
          $fees =$_POST['fees'];
          $cost =$_POST['cost'];
  $update="UPDATE `fees_structure` SET `fees_type`='$fees',`cost`='$cost' WHERE id='$fees_structure'";
    $mess =mysqli_query($conn, $update)or die(mysqli_connect_error());
    // $fees_structure;
    header("location:fees_view_edit.php?id=$fees_structure");
      }
      else {
        echo "fees_structure is not added";
      }
      mysqli_close($conn);
       ?>
</body>
</html>