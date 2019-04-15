

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


    //$update =$_GET['id'];
  // echo $update;
  //  die();
     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     
    if (isset($_POST['upload'])) {
// for update 
    $name1 =$_POST['nameupdate'];
    
   
    $course=$_POST['course'];
    $name=$_POST['student_name'];
    $birthdate=$_POST['birthdate'];
    $join=$_POST['join'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $contact = $_POST['contact'];
    $pnumber=$_POST['pnumber'];
    $blood=$_POST['blood'];
    $status=$_POST['status'];
  $up1 = "UPDATE `student` SET `course`='$course',`student_name`='$name',`dob`='$birthdate',`joinn`='$join',`fname`='$fname',`mname`='$mname',`gender`='$gender',`address`='$address',`contact`='$contact',`pnumber`='$pnumber',`blood`='$blood',`status`='$status' WHERE `id`='$name1'";
//echo $up;die();
$result =mysqli_query($conn,$up1)or die(mysqli_connect_error());
$successMSG = "Student record succesfully edited ...";
 header("refresh:5;student_view.php"); // redirects image view page after 5 seconds.
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

</head>

<body>
<?php 
include 'header.php';
include 'left_side_bar.php';
$update =$_GET['id'];
//echo $update;
//die();
$conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
    $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
    
    $query = "SELECT * FROM `student` where id='$update'";
    
    $result = mysqli_query($conn,$query)or die(mysqli_connect_error());
    $row =mysqli_fetch_array($result)or die(mysqli_connect_error());
    $gender=$row['gender'];
?>
    <div id="wrapper" style="background-color: #800000">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Update
                        </div>
                        <div class="panel-body">
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- form for block -->
    <form role="form" method="POST">
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
    <input type="hidden" name="nameupdate" value="<?php echo $row['id']; ?>">
                            
           
            <div class="form-group">
                <label>Course</label>
                <input class="form-control" required="true" id="" type="text" name="course" value="<?php echo $row['course']; ?>">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" id="" required="true" type="text" name="student_name" value="<?php echo $row['student_name']; ?>">
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input name='birthdate' id="date" required="true" type='date' class="form-control" value="<?php echo $row['dob']; ?>">
            </div>
            <div class="form-group">
                <label>Date of Join</label>
                <input id="date" name='join' required="true" type='date' class="form-control" value="<?php echo $row['joinn']; ?>">
                </div>
            <div class="form-group">
                <label>Father's Name</label>
                <input class="form-control" id="" required="true" type="text" name="fname" value="<?php echo $row['fname']; ?>">
            </div>
            <div class="form-group">
                <label>Mother's Name</label>
            <input class="form-control" id="" required="true" type="text" name="mname" value="<?php echo $row['mname']; ?>">
            </div>

            <div class="form-group">
                <label>Gender</label>
            <div class="radio">
                <label>
                <input type="radio" name="gender" required="true" class="gender" id="optionsRadios1" <?php if ($gender=="male") echo "checked"; ?> value="male" checked>Male
                </label>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="gender" required="true" class="gender" id="optionsRadios2" <?php if ($gender=="female") echo "checked"; ?> value="female">Female
                </label>
            </div>
                                      
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" required="true"  name="address" id="description" rows="2" cols="15" ><?php echo $row['address']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Contact no</label>
                <input class="form-control" required="true" type="text" name="contact" value="<?php echo $row['contact'] ?>">
            </div>
            <div class="form-group">
            <label>Parents no</label>
            <input class="form-control" required="true" id="number" type="text" name="pnumber" value="<?php echo $row['pnumber'] ?>">
            </div>

            <div class="form-group">
                <label>Blood group</label>
            <select class="form-control" id="" required="true" name="blood">
                <option><?php echo $row['blood'] ?></option>
                <option value="A+">A+</option>
                <option value="B">B+</option>
                <option value="AB+">AB+</option>
                <option value="A+">A-</option>
                <option value="B">B-</option>
                <option value="AB+">AB-</option>
                <option value="O+">O-</option>
            </select>
                
            </div>

            <div class="form-group">
                    <label>Status</label>
                <select class="form-control" required="true" id="Status" name="status">
                        <option><?php echo $row['status']; ?></option>
                        
                </select>
            </div>
                                        


            <button type="submit" name="upload" class="btn btn-default">Update</button>
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
