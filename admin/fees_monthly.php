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
<html lang="en">
<?php

//PDO db connection1

  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = 'kimatia7950';
  $DB_NAME = 'hostel2';
  
  try{
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
 if (isset($_POST['upload'])) {
    
          $student_name =$_POST['student_name'];
          $fees_type =$_POST['fees_type'];
          $month =$_POST['month'];
          $payment_date =$_POST['payment_date'];
          $cost =$_POST['cost'];
          $status =$_POST['status'];
          $paidcost =$_POST['paidcost'];
          $duebalance = $cost-$paidcost;
          
      $stmt = $DB_con->prepare('INSERT INTO fees_monthly(student_name, fees_type,cost,paid_amount,due_balance,month,payment_date, status) VALUES(:usn,:uft,:ucos,:ufee,:ucost,:umon,:udate,:ust)');
            $stmt->bindParam(':usn',$student_name);
            $stmt->bindParam(':uft',$fees_type);
            $stmt->bindParam(':ucos',$cost);
            $stmt->bindParam(':ufee',$paidcost);
            $stmt->bindParam(':ucost',$duebalance);
            $stmt->bindParam(':umon',$month);
            $stmt->bindParam(':udate',$payment_date);
            $stmt->bindParam(':ust',$status); 

            if($stmt->execute())
            {
                
                $successMSG = "Monthly Fee record succesfully inserted ...";
                header("refresh:5;fees_monthly_view.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
      }
?>
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fees Monthly</title>

   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
    <!-- Load jQuery JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Load jQuery UI Main JS  -->

    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
 
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  });
  </script>

<script type="text/javascript">

function feestype(val)
{
 // alert(val); 
 $.ajax({
     type: 'post',
     url: 'fetch_cost.php',
     data: {
       get_option:val
     },
     success: function (response) {
        //alert(response);
       document.getElementById("cost").value=response; 
     }
   });
}
</script>
<!-- =====/fetch cost ---------------- -->
 
</head>

<body>
<?php 
include 'header.php';
include 'left_side_bar.php';

?>
    
    <div id="wrapper"  style="background-color: #800000" >
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fees</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fees create
                        </div>
                        <div class="panel-body">
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                

<form role="form" method="post">
<?php
    if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>   

    <div class="form-group">
        <label>Student Name</label>
            <select class="form-control" required="true" name = student_name >
            <option value="" >--select--</option>

            <?php

                $conn =mysqli_connect("localhost", "root", "kimatia7950");
                $db =mysqli_select_db( $conn,'hostel2');
                $sel=mysqli_query($conn,"SELECT `student_name` FROM `student`") or die(mysqli_connect_error());
                        
                while($row=mysqli_fetch_array($sel)){?>
            <option value="<?php echo $row['student_name'];?>"><?php echo $row['student_name'];?></option>
                    
            <?php } ?>
                            
            </select>
    </div>
                            
    <div class="form-group">
        <label>Fees Type</label>
            <select name="fees_type" required="true" class="form-control" onchange="feestype(this.value);">
            <option value="">--select--</option>

        <?php

            $conn =mysqli_connect("localhost", "root", "kimatia7950");
            $db =mysqli_select_db($conn,'hostel2');
            $sel=mysqli_query($conn,"SELECT `fees_type` FROM `fees_structure`") or die(mysqli_connect_error());
                        
            while($row=mysqli_fetch_array($sel)){?>
            <option value="<?php echo $row['fees_type'];?>"><?php echo $row['fees_type'];?></option>
                    
        <?php } ?>
                            
        </select>
    </div>
    
    <div class="form-group">
        <label>Cost</label>
        <input type="text" name="cost" required="true" id="cost" class="form-control" placeholder="Monthly Fee">                                            
    </div>
                                
    <div class="form-group">
        <label>Paid Amount</label>
        <input type="text" name="paidcost" required="true" class="form-control">                                            
    </div>

    <div class="form-group">
            <label>Month</label>
            <select class="form-control" required="true" id="" name="month">
                <option value="">--select--</option>
                <option value="Jan">January</option>
                <option value="Feb">February</option>
                <option value="Mar">March</option>
                <option value="Apr">April</option>
                <option value="May">May</option>
                <option value="Jun">June</option>
                <option value="Jul">July</option>
                <option value="Aug">August</option>
                <option value="Sep">September</option>
                <option value="Oct">October</option>
                <option value="Nov">November</option>
                <option value="Dec">December</option>
                </select>
          
    </div>
    
    <div class="form-group">
            <label>Payment Date</label>
            <input type="date" required="true" name="payment_date" id="datepicker1" class="form-control">                                            
    </div>
    <div class="form-group">
            <label>Status</label>
            <select class="form-control" required="true" id="" name="status">
                <option value="">--select--</option>
                <option value="Jan">Enable</option>
                <option value="Feb">Disable</option>
                </select>
          
    </div>
    <button type="submit" class="btn btn-default" name="upload">Add</button>
    <button type="reset" class="btn btn-default">Reset</button>
    </form>  
        </div>                        
        </div>
                                <!-- /col-lg-6 -->

                            </div>
                            <!-- /panel body row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     <?php
    include 'footer.php' ;
    ?>

     </body>

</html>
