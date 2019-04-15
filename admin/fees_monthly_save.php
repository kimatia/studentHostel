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

          $student_name =$_POST['student_name'];
          $fees_type =$_POST['fees_type'];
          $month =$_POST['month'];
          
          $payment_date =$_POST['payment_date'];
          $cost =$_POST['cost'];
          $status =$_POST['status'];

          $cost =$_POST['cost'];
          $paidcost =$_POST['paidcost'];
          $duebalance = $cost-$paidcost;

    $query ="INSERT INTO `fees_monthly`(`id`, `student_name`, `fees_type`, `cost`, `paid_amount`, `due_balance`, `month`, `payment_date`, `status`) VALUES ('','$student_name','$fees_type','$cost','$paidcost','$duebalance','$month','$payment_date','$status')";
    
    $mess =mysqli_query($conn,$query)or die(mysqli_connect_error());
    header("location:fees_monthly.php");


      }
      else {
        echo "fees_monthly is not add";
      }
      mysqli_close($conn);

       ?>
</body>
</html>