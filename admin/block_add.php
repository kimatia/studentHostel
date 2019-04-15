

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

     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     if (isset($_POST['upload'])) {

        
        $block =$_POST['block'];
        $gender =$_POST['gender'];
        $description =$_POST['description'];
        $status =$_POST['status'];

        $query = "INSERT INTO block (block, gender, description,status)
VALUES ('$block', '$gender', '$description', '$status')";    

    $set=mysqli_query($conn, $query);
   $successMSG = "New Block succesfully inserted ..."; 
    header("refresh:5;block_view.php");
 
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

?>
    <div id="wrapper" style="background-color: #800000">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Block</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Block create
                        </div>
                        <div class="panel-body">
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- form for block -->
        <form role="form"  method="post">
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
                                <label>ID</label>
                                <?php 
                                include 'conn.php';
                                $selectid =mysqli_query($conn,"SELECT * FROM `block` ORDER BY id DESC;")or die(mysqli_connect_error());
                               // $sql =mysql_query($select)or die(mysql_error());
                                if(mysqli_num_rows($selectid)>0) 
                                {
                                    $row =mysqli_fetch_array($selectid);
                                    $a=$row['id']+1;
                                } else 
                                {
                                    $a =1;
                                }

                               ?> 
                            <input class="form-control" required="true" name="id" value="<?php echo $a; ?>" readonly>
                       
                                
                            </div>
                                        <div class="form-group">
                                            <label>Block</label>
                                            <input class="form-control" required="true" id="block" type="text" name="block" placeholder="block name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="radio">
                                                <label>
                        <input type="radio" name="gender" class="gender" id="optionsRadios1" value="male" checked>Male
                                                </label>
                                            </div>
                             <div class="radio">
                                <label>
                            <input type="radio" name="gender" class="gender" id="optionsRadios2" value="female">Female
                                                </label>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" required="true"  name="description" id="description" rows="2" cols="15" ></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" required="true" id="Status" name="status">
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
