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
require_once 'conn.php';

 if (isset($_POST['upload'])) {

           $fees =$_POST['fees'];
          $cost =$_POST['cost'];
          $status =$_POST['status'];
$stmt = $DB_con->prepare('INSERT INTO fees_structure(fees_type, cost,status) VALUES(:ufee, :ucost, :ust)');
            $stmt->bindParam(':ufee',$fees);
            $stmt->bindParam(':ucost',$cost);
            $stmt->bindParam(':ust',$status);
            
            if($stmt->execute())
            {
                $successMSG = "New fee record succesfully inserted ...";
                header("refresh:5;fees_view.php"); // redirects image view page after 5 seconds.
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

    <title>Fees</title>

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
                            Fees Structure
                        </div>
                        <div class="panel-body">
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
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- form for block -->
                                    <form role="form" method="post">
                            
                                        <div class="form-group">
                                            <label>Fees Type</label>
                <select  class="form-control" id="fees" required="true" type="text" name="fees">
                                              <option value="">--select--</option>
                                                <option value="Room Rent">Room Rent</option>
                                                <option value="Mess Bill">Mess Bill</option> 
                                                <option value="Damages Bill">Damages</option>
                                                <option value="Clearance Fee">Clearance Fee</option> 
                                            </select>
                                        </div>
        <div class="form-group">
     <label>Cost</label>
    <input class="form-control" id="fees" required="true" type="text" name="cost">
    </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select  class="form-control" required="true" id="fees" type="text" name="status">
                                              <option value="">--select--</option>
                                                <option value="enabled">Enabled</option>
                                                <option value="disabled">Disabled</option> 
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="upload">Add</button>
                                        <button type="reset" class="btn btn-default">Reset</button>

                                   

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
