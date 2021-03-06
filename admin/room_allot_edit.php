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
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_errno());
$db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_errno());

if (isset($_POST['upload'])) {
    
    $allotup =$_POST['allotup'];
    $block =$_POST['block'];
    $roomno =$_POST['room'];
    $beds =$_POST['beds'];
    $name =$_POST['name'];
    $status =$_POST['status'];

    $up ="UPDATE `room_allotment` SET `block`='$block',`name`='$name',`roomno`='$roomno',`beds`='$beds',`status`='$status' WHERE id='$allotup'";
    $result=mysqli_query($conn,$up)or die(mysqli_connect_error());
    $successMSG = "Alloted succesfully edited...";
    header("refresh:5;room_allot_view.php"); // redirects image view page after 5 seconds.
   

}



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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>

<body>
<?php 
include 'header.php';
include 'left_side_bar.php';
$Update =$_GET['id'];
//echo $Update;
//die();
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
$select ="SELECT * FROM `room_allotment` where id='$Update'";
$result =mysqli_query($conn,$select)or die(mysqli_connect_error());
$row =mysqli_fetch_array($result)or die(mysqli_connect_error());

//echo $row;
//die();
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
        <form role="form" name="form1" method="post">
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
        <input type="hidden" name="allotup" value="<?php echo $row['id'] ?>">



<!-- ------------------------ block -------------------------------- -->
            <div class="form-group">
                        <label>Block</label>
                <select name="block" class="form-control">
                        <option><?php echo $row['block']; ?></option>
                </select>
            </div>
        <!-- ------------------------ room -------------------------------- -->
            <div class="form-group">
                    <label>Room No</label>
               
                <select name="room" class="form-control">
                    <option><?php echo $row['roomno']; ?></option>
                </select>
                                            
            </div>
<!-- ------------------------ no of beds -------------------------------- -->
        <div class="form-group">
                <label>No of Beds</label>
            
            <select name="beds" id="beds" class="form-control">
                <option><?php echo $row['beds'] ?></option>
            </select>
                                            
        </div>
<!-- ------------------------ close -------------------------------- -->
                <div class="form-group">
                    <label>Student Name</label>
                    <select name="name" class="form-control">
                        <option><?php echo $row['name'] ?></option>
                    </select>
                </div>
    
   
                     
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                    <option><?php echo $row['status'] ?></option>
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
