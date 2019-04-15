

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
    $successMSG = "Fee record succesfully updated...";
     header("refresh:5;fees_view.php"); // redirects image view page after 5 seconds.
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
$update =$_GET['id'];

$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db( $conn,'hostel2')or die(mysqli_connect_error());
$select =mysqli_query($conn,"SELECT * FROM fees_structure where id='$update'")or die(mysqli_connect_error());
$row =mysqli_fetch_array($select)or die(mysqli_connect_error());

?>
    <div id="wrapper" style="background-color: #800000">

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
    <input type="hidden" name="fees_structure" value="<?php echo $row['id'];?>">
    <div class="form-group">
    <label>Fees Type</label>
    <input class="form-control" required="true" type="text" name="fees" value="<?php echo $row['fees_type'];?>">
                                        </div>
    <div class="form-group">
    <label>Cost</label>
   <input class="form-control" type="text" required="true" name="cost" value="<?php echo $row['cost'];?>">
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
