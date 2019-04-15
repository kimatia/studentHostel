<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
       <?php 
       
      $conn = mysqli_connect("localhost", "root", "kimatia7950")or die(mysqli_connect_errno());
      $db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_errno());
      if (isset($_POST['upload'])) {

          $blockupdate =$_POST['blockupdate'];
          $block =$_POST['block'];
          $gender =$_POST['gender'];
          $description =$_POST['description'];
          $status =$_POST['status'];
      
          
        $update="UPDATE `block` SET `block`='$block',`gender`='$gender',`description`='$description',`status`='$status' WHERE id='$blockupdate'";
     
       $fees =mysqli_query($conn, $update)or die(mysqli_connect_error());
       header("location:block_view.php");


      }
      else {
        echo "Record update  is not successfull";
      }
      mysqli_close($conn);

       ?>
</body>
</html>