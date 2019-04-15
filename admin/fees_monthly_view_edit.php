<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
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

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Block</title>

    <!-- Bootstrap Core CSS -->
    <script type= "text/javascript" src = "countries.js"></script>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
</head>

<body>
<?php 
include 'header.php';
include 'left_side_bar.php';
$update = $_GET['id'];

$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
$select =mysqli_query($conn, "select * from fees_monthly where id='$update'")or die(mysqli_connect_error());
$row =mysqli_fetch_array($select)or die(mysqli_connect_error());

?>
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
        $successMSG = "New room succesfully edited ...";
                header("refresh:5;fees_monthly_view.php"); // redirects image view page after 5 seconds.
       
      }
      mysqli_close($conn);

       ?>
    <div id="wrapper" style="background-color: #800000">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fees Update Form
                        </div>
                        <div class="panel-body">
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- form for block -->
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
            <input type="hidden" name="updatefees" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label>Student Name</label>
            <select name="student_name" class="form-control">
                <option><?php echo $row['student_name']; ?></option>
                            
            </select>
            </div>
                            
            <div class="form-group">
                <label>Fees Type</label>
            <select name="fees_type" class="form-control">
                <option><?php echo $row['fees_type']; ?></option>

            </select>
            </div>
            <div class="form-group">
                <label>Cost</label>
                <input type="text" name="cost" value="<?php echo $row['cost'];?>" class="form-control">                                            
            </div>

            <div class="form-group">
                <label>Paid Amount</label>
                <input type="text" name="paidcost" value="<?php echo $row['paid_amount'];?>" class="form-control">                                            
            </div>

            <div class="form-group">
                <label>Month</label>
                <input type="text" name="month" value="<?php echo $row['month']; ?>" class="form-control">                                            
            </div>

            <div class="form-group">
                <label>Payment Date</label>
                <input type="text" name="payment_date" value="<?php echo $row['payment_date'];?>" class="form-control">                                            
            </div>

            <div class="form-group">
                <label>Status</label>
            <select class="form-control" id="Status" name="status">
                <option><?php echo $row['status'];?></option>
                
            </select>
            </div>
            <button type="submit" class="btn btn-default" name="upload">Update</button>
            <button type="reset" class="btn btn-default">Cancel</button>

            </form>
                            <!-- /form close -->        
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

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
