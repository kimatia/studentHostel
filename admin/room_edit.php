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
//include 'header.php';
//include 'left_side_bar.php';

//print_r($_POST);
//die();
     
     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     
    if (isset($_POST['upload'])) {

    $room = $_POST['rupdate'];

    $block=$_POST['block'];
    $roomno=$_POST['roomno'];
    $beds=$_POST['beds'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    

    $update = "UPDATE `room` SET `roomno`='$roomno',`block`='$block',`beds`='$beds',`description`='$description',`status`='$status' WHERE id='$room'";
    $sel =mysqli_query($conn,$update)or die(mysqli_connect_error());
    $successMSG = "Record succesfully updated ...";
                header("refresh:5;room_view.php"); // redirects image view page after 5 seconds.
 
 }   
   mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Entry</title>

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
$update =$_GET['id'];

$conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
    $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
    
    $query = "SELECT * FROM `room` where id='$update'";
    
    $result = mysqli_query($conn,$query)or die(mysqli_connect_error());
    $row =mysqli_fetch_array($result)or die(mysqli_connect_error());
 //   echo $room =$row['roomno'];
 //   die();
    
?>
    <div id="wrapper" style="background-color: #800000">


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rooms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rooms Entry Details
                        </div>
<div class="panel-body">
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
            <input type="hidden" name="rupdate" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label>Block</label>
                    <select name="block" required="true" class="form-control">
                    <option><?php echo $row['block'] ?></option>
                    </select>
                </div>
                        
                <div class="form-group">
                    <label>Room No</label>
                    <input value="<?php echo $row['roomno'] ?>" required="true" class="form-control" type="text" name="roomno">
                </div>
                <div class="form-group">
                    <label>No of Beds</label>
                    <input value="<?php echo $row['beds'] ?>" required="true" class="form-control" type="text" name="beds">
                </div>
                                        
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" required="true" name="description" rows="2" cols="15" ><?php echo $row['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                <select class="form-control" id="Status" required="true" name="status">
                    <option><?php echo $row['status'] ?></option>
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                </select>
                </div>

                <button type="submit" class="btn btn-default" name="upload">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
        </form>
                            </div>
                                <!-- /.col-lg-6 (nested) -->
                
                            </div>
                            <!-- /.row (nested) -->
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
