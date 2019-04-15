<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
       <?php 
       
      $conn = mysqli_connect("localhost", "root", "kimatia7950")or die(mysqli_connect_errno());
      $db =mysqli_select_db( $conn,'hostel2')or die(mysqli_connect_errno());
      if (isset($_POST['upload'])) {

          $updatefees =$_POST['updatefees'];
          $student_name =$_POST['student_name'];
          $fees_type =$_POST['fees_type'];
          $month =$_POST['month'];
          $payment_date =$_POST['payment_date'];
          $cost =$_POST['cost'];
          $status =$_POST['status'];

          $cost =$_POST['cost'];
          $paidcost =$_POST['paidcost'];
          $duebalance = $cost-$paidcost;

        $update="UPDATE `fees_monthly` SET `student_name`='$student_name',`fees_type`='$fees_type',`cost`='$cost',`paid_amount`='$paidcost',`due_balance`='$duebalance',`month`='$month',`payment_date`='$payment_date',`status`='$status' WHERE id='$updatefees'";
      
       $fees =mysqli_query($conn, $update)or die(mysqli_connect_error());
       header("location:fees_monthly.php");


      }
      else {
        echo "Record update  is not successfull";
      }
      mysqli_close($conn);

       ?>
</body>
</html>