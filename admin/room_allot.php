




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

    $block=trim($_POST['block']);
    $name=trim($_POST['name']);
    $roomno=trim($_POST['room']);
    $beds=trim($_POST['beds']);
    $status=trim($_POST['status']);
    $price=trim($_POST['price']);
    $balance=5000-$price;
    
$stmt = $DB_con->prepare('INSERT INTO room_allotment(block,name,roomno,paid,balance,beds,status) VALUES(:ublock, :uname, :uroomno,:uprice,:ubal, :ubed, :ustatus)');
            $stmt->bindParam(':ublock',$block);
            $stmt->bindParam(':uname',$name);
            $stmt->bindParam(':uroomno',$roomno);
            $stmt->bindParam(':uprice',$price);
            $stmt->bindParam(':ubal',$balance);
            $stmt->bindParam(':ubed',$beds);
            $stmt->bindParam(':ustatus',$status);
   if($stmt->execute())
            {
                $successMSG = "Room succesfully alloted...";
    header("refresh:5;room_allot_view.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
    
 }


?>
<?php

$conn =mysqli_connect("localhost", "root", "kimatia7950");
$db =mysqli_select_db($conn,'hostel2');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rooms</title>

    <!-- Bootstrap Core CSS -->
    <script type= "text/javascript" src = "countries.js"></script>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script type="text/javascript">

function showUser(val)
{
 // alert(val); 
 $.ajax({
     type: 'post',
     url: 'get_student_bill.php',
     data: {
       get_option:val
     },
     success: function (response) {
   //    alert(response);
       document.getElementById("txtHint").innerHTML=response; 
     }
   });
}
</script>

<script type="text/javascript">

function getblock(val)
{
  //alert(val); 
 $.ajax({
     type: 'post',
     url: 'findblock.php',
     data: {
       get_option:val
     },
     success: function (response) {
       // alert(response);
       document.getElementById("room").innerHTML=response; 
     }
   });
}
</script>
<script type="text/javascript">

function getroom(val)
{
  //alert(val); 
 $.ajax({
     type: 'post',
     url: 'findblock.php',
     data: {
       
       get_option1:val
     },
     success: function (response) {
    //    alert(response);
       document.getElementById("beds").innerHTML=response; 
     }
   });
}
</script>


    
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
                    <h1 class="page-header">Rooms Allot </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rooms Allotment Details
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
            <div class="form-group">
                        <label>Block</label>
                <select name="block" id="block" required="true" class="form-control" onchange="getblock(this.value);">
                        <option value="">--select--</option>

                    <?php

                        $conn =mysqli_connect("localhost", "root", "kimatia7950");
                        $db =mysqli_select_db($conn, 'hostel2');
                        $sel=mysqli_query($conn,"SELECT DISTINCT  `block` FROM `block` WHERE status='enabled'") or die(mysqli_connect_error());
                        
                        while($row=mysqli_fetch_array($sel)){?>
                        <option value="<?php echo $row['block'];?>"><?php echo $row['block'];?></option>
                    
                        <?php } ?>
                            
                </select>
            </div>
            <div class="form-group">
                    <label>Room No</label>
               
                <select name="room" id="room" required="true"  class="form-control" onchange="getroom(this.value);">
                    <option value="">--select--</option>

                        <?php
                    
                        $conn =mysqli_connect("localhost", "root", "kimatia7950");
                         $db =mysqli_select_db($conn,'hostel2');
                        $sel=mysqli_query($conn,"SELECT DISTINCT  `roomno` FROM `room` WHERE status='enabled'") or die(mysqli_connect_error());
                        
                        while($row=mysqli_fetch_array($sel)){?>
                    <option value="<?php echo $row['roomno'];?>"><?php echo $row['roomno'];?></option>
                    
                        <?php }
                         ?>
                            
                </select>
                                            
            </div>
             <div class="form-group">
                    <label>Room Fee(5000)</label>
               
                <input name="price" id="price" required="true"  class="form-control" placeholder="Payed Room Fee Amount">
                                            
            </div>
        <div class="form-group">
                <label>No of Beds</label>
            
            <select name="beds" id="beds" required="true" class="form-control">
                <option value="">--select--</option>

                <?php
            
                    $conn =mysqli_connect("localhost", "root", "kimatia7950");
                    $db =mysqli_select_db($conn,'hostel2');
                   $sel=mysqli_query($conn,"SELECT DISTINCT  `beds` FROM `room` WHERE status='enabled'") or die(mysqli_connect_error());
                        
                    while($row=mysqli_fetch_array($sel)){?>
                    <option value="<?php echo $row['beds'];?>"><?php echo $row['beds'];?></option>
                    
                <?php }
                 ?>
                            
            </select>
                                            
        </div>
                                <div class="form-group">
                                        <label>Student Name</label>
                                    <select name="name" required="true" class="form-control">
                                            <option value="">--select--</option>

                                    <?php

                                        $conn =mysqli_connect("localhost", "root", "kimatia7950");
                                        $db =mysqli_select_db( $conn,'hostel2');
                                        $sel=mysqli_query($conn,"SELECT `student_name` FROM `student` WHERE status='enabled'") or die(mysqli_connect_error());
                        
                                        while($row=mysqli_fetch_array($sel)){?>
                                        <option value="<?php echo $row['student_name'];?>"><?php echo $row['student_name'];?></option>
                    
                                    <?php } ?>
                            
                                    </select>
                                </div>
    
   
                                        
                                        <div class="form-group">
                                            <label>Status</label>
                                <select class="form-control" id="Status" required="true" name="status">
                                                <option>--select--</option>
                                                <option value="disabled">Enabled</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </div>

                                        <button type="submit" style="background-color: #00FF00" class="btn btn-default" name="upload">Save</button>
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
