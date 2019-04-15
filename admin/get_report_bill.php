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
<?php 
require_once("excelwriter.class.php");
    $excel=new ExcelWriter("report.xls");
    if($excel==false)
echo $excel->error;

// this will create heading of each column in excel file

$myArr=array("id","student_name","fees_type","cost","paid_amount","due_balance","month","payment_date","status");
$excel->writeLine($myArr);
// now fetch data from database table, there is a new line create each time loop runs
$qry=mysqli_query("select * from fees_monthly");
if($qry!=false)
{
$i=1;
while($res=mysqli_fetch_array($qry))
{
     $myArr=array($i,$res['student_name'],$res['fees_type'],$res['cost'],$res['paid_amount'],$res['due_balance'],$res['month'],$res['payment_date'],$res['status']);

     $excel->writeLine($myArr);

     $i++;

     }

    }
?>
<html>
<head>
    <title>Bill Show</title>
</head>

<body>


<div  style="overflow:scroll;height:500px;width:1000px;" class="pull-left">
      <br>
      $file="report"                    
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                                        
                <th>ID</th>
                <th>Student Name</th>
                <th>Fees Type</th>
                <th>Cost</th>
                <th>Paid Amount</th>
                <th>Due Balance</th>
                <th>Name of Month</th>
                <th>Payment Date</th>                                            
                <th>Status</th>
                
            </tr>
        </thead>
                                    
                <?php 

                $fees_type = ($_POST['get_option']); 

                

                $conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_errno());
                $db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_error()); 
                $sql ="select * from fees_monthly where fees_type='$fees_type'";

                $query=mysqli_query($conn,$sql)or die(mysqli_connect_error());          
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
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php } ?>                                
    </table>
    <a href="javascript:void(0);" onClick="download();">Download Excel Report</a>
    <script language="javascript">
    function download()
    {

     window.location='report.xls';

    }

    </script>

</div>
</body>
</html>
