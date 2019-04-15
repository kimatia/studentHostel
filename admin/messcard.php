


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
          $name =$_POST['name'];
          $food =$_POST['food'];
          $messcard =$_POST['messcard'];
          $startdate =$_POST['startdate'];
          $enddate =$_POST['enddate'];
          $status =$_POST['status'];
$stmt = $DB_con->prepare('INSERT INTO messcard(name,food,messcard, startdate,enddate,status) VALUES(:uname,:ufood,:umesscard,:ustartdate,:uenddate,:ustatus)');
            $stmt->bindParam(':uname',$name);
            $stmt->bindParam(':ufood',$food);
            $stmt->bindParam(':umesscard',$messcard);
            $stmt->bindParam(':ustartdate',$startdate);
            $stmt->bindParam(':uenddate',$enddate);
            $stmt->bindParam(':ustatus',$status);
        if($stmt->execute())
            {
    $successMSG = "Mess Card succesfully saved ...";
    header("refresh:5;messcard_view.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting messcard....";
            }
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

    <title>Mess</title>

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
?>
    <div id="wrapper" style="background-color: #800000">


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mess</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mess Card Entry Details
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
                                    <div class="form-group">
                                        <label>Student Name</label>
                                    <select name="name" required="true" class="form-control">
                                            <option value="">--select--</option>

                                    <?php

                                        $conn =mysqli_connect("localhost", "root", "kimatia7950");
                                        $db =mysqli_select_db( $conn, 'hostel2');
                                        $sel=mysqli_query($conn, "SELECT `student_name` FROM `student`") or die(mysqli_connect_error());
                        
                                        while($row=mysqli_fetch_array($sel)){?>
                                        <option value="<?php echo $row['student_name'];?>"><?php echo $row['student_name'];?></option>
                    
                                    <?php } ?>
                            
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                            <label>Food Type</label>
                                            <select class="form-control" id="Status" required="true" name="food">
                                                <option value="">--select--</option>
                                                <option value="vegeterian">Vegeterian</option>
                                                <option value="nonvegeterian">Non-Vegeterian</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Messcard Type</label>
                                            <select class="form-control" id="Status" required="true" name="messcard">
                                                <option value="">--select--</option>
                                                <option value="permanent">Permanent</option>
                                                <option value="temporary">Temporary</option>
                                            </select>
                                        </div>
                        
                                    <div class="form-group">
                                            <label>Start Date</label>
                                            <input class="form-control" type="date" required="true" name="startdate">
                                        </div>
                                    <div class="form-group">
                                            <label>End Date</label>
                                            <input class="form-control" type="date" name="enddate">
                                        </div>                                        
                                        
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" id="Status" required="true" name="status">
                                                <option value="">--select--</option>
                                                <option value="enabled">Enabled</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-default" name="upload">Save</button>
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
