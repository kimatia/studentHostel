<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once '../dbconnect.php';


if (!isset($_SESSION['userSession'])) {
    header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bill Show</title>
</head>

<body>


<div  style="overflow:scroll;height:500px;width:1000px;" class="pull-left">
      <br>                    
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                                        
                <th>ID</th>
                <th>Student Name</th>
                <th>Fees Type</th>
                <th>Cost</th>
                <th>Paid Amount</th>
                <th>Due Balance</th>
                <th>Month</th>
                <th>Payment Date</th>                                            
                <th>Action</th>
                <th>Update</th>
            </tr>
        </thead>
                                    
                <?php 

                $name = ($_POST['get_option']); 

                

                $conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_errno());
                $db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_error()); 
                $sql ="select * from fees_monthly where student_name='$name'";

                $query=mysqli_query($conn, $sql)or die(mysqli_connect_error());          
                while ($row=mysqli_fetch_array($query)){?>                            
                              
            <tr class="odd gradeX">

                          
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['fees_type']; ?></td>                                            
                <td><?php echo $row['cost']; ?></td>
                <td><?php echo $row['paid_amount']; ?></td>
                <td><?php echo $row['due_balance']; ?></td>
                <td><?php echo $row['month']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                
                                                                                    
                <td align="center"><a title="Delete" href='fees_monthly_delete.php?id=<?php echo $row["id"];?>' onclick="return confirm('are you sure want to delete')"><i class="glyphicon glyphicon-trash"></a></td>
                <td align="center"><a title="Update" href='fees_monthly_view_edit.php?id=<?php echo $row["id"];?>'><i class="glyphicon glyphicon-pencil"></i></a></td>
            </tr>
            <?php } ?>

                                        
                


<?php 

  $add=mysqli_query($conn,'SELECT SUM(paid_amount) AS  value_sum from `fees_monthly`')or die(mysqli_connect_error());

  while($row1=mysqli_fetch_array($add)){
  
     $sum = $row1['value_sum'];
 ?>    
    <tfoot>
        <tr>
            <td id="total" colspan="4" style="text-align:right;">Total :</td>
            <td><?php echo $sum ?></td>
        </tr>
    </tfoot> 
     
 <?php }?>
             
    

                                    
    </table>
</div>



</body>
</html>