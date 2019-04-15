


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

    
    $course=$_POST['course'];
    $name=$_POST['student_name'];
    $birthdate=$_POST['birthdate'];
    $join=$_POST['join'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $number=$_POST['number'];
    $pnumber=$_POST['pnumber'];
    $blood=$_POST['blood'];
    $status=$_POST['status'];
   

   $stmt = $DB_con->prepare('INSERT INTO student(course, student_name, dob,joinn, fname, mname, gender, address, contact, pnumber, blood, status) VALUES(:course,:name,:birthdate,:joinn,:fname,:mname,:gender,:address,:numberr,:pnumber,:blood,:status)');
            $stmt->bindParam(':course',$course);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':birthdate',$birthdate);
            $stmt->bindParam(':joinn',$join);
            $stmt->bindParam(':fname',$fname);
            $stmt->bindParam(':mname',$mname);
            $stmt->bindParam(':gender',$gender);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':numberr',$number);
            $stmt->bindParam(':pnumber',$pnumber);
            $stmt->bindParam(':blood',$blood);
            $stmt->bindParam(':status',$status);
    
    if($stmt->execute())
            {
                 $successMSG = "New student record succesfully inserted ...";
                header("refresh:5;student_view.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
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

    <title>Student</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
    <!-- Load jQuery JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Load jQuery UI Main JS  -->

    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
     
    <script type="text/javascript" src="js1/usernamevalid.js"></script>
    <!-- =======================/use for user check avaibility -->
    
    <link rel="stylesheet" href="runnable.css" />

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
<script>
  $(function() {
    //alert('ok');
    $( "#datepicker" ).datepicker();
  });
  </script>
<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  });
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
                    <h1 class="page-header">Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <!-- /.row -->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Student
                        </div>
                        <div class="panel-body">
                        <!-- panel body row -->
                            <div class="row">
                                <div class="col-lg-6">
                                <!-- form for block -->
        <form role="form" method="post" name="form1" onsubmit="return validation()">
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
                <label>Course</label>
                <input class="form-control" id="" required="true" type="text" name="course">
            </div>
            <div class="form-group">
            <label for="username">Student Name</label>
            <?php
    $stmtSelect = $DB_con->prepare('SELECT * FROM tbl_users');
    $stmtSelect->execute();
         ?>
<select class="form-control" name="student_name" type="text" onchange="fetch_select_gender(this.value)";>
<?php while($rowSelect=$stmtSelect->fetch(PDO::FETCH_ASSOC)){?>
<option value="<?php echo $rowSelect['username']; ?>"> <?php echo $rowSelect['username']; ?>
</option>
<?php } ?>
</select>
            </div>
            
            <div class="form-group">
                <label>Date of Birth</label>
                <input name='birthdate' id="datepicker" required="true" type='date' class="form-control">
            </div>
            <div class="form-group">
                <label>Date of Join</label>
                <input id="datepicker1" name='join' type='date' required="true" class="form-control">
                </div>
            <div class="form-group">
                <label>Father's Name</label>
                <input class="form-control" id="" required="true" type="text" name="fname">
            </div>
            <div class="form-group">
                <label>Mother's Name</label>
            <input class="form-control" id="" required="true" type="text" name="mname">
            </div>

            <div class="form-group">
                <label>Gender</label>
            <div class="radio">
                <label>
                <input type="radio" name="gender" required="true" class="gender" id="optionsRadios1" value="male" checked>Male
                </label>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="gender" required="true" class="gender" id="optionsRadios2" value="female">Female
                </label>
            </div>
                                      
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" required="true"  name="address" id="description" rows="2" cols="15" ></textarea>
            </div>
            <div class="form-group">
                <label>Contact no</label>
                <input class="form-control" id="" required="true" type="text" name="number">
            </div>
            <div class="form-group">
            <label>Parents no</label>
            <input class="form-control" id="number" required="true" type="text" name="pnumber">
            </div>

            <div class="form-group">
                <label>Blood group</label>
                <select class="form-control" required="true" id="" name="blood">
                <option value="">--select--</option>
                <option value="A+">A+</option>
                <option value="B">B+</option>
                <option value="AB+">AB+</option>
                <option value="O+">O+</option>
                <option value="A+">A-</option>
                <option value="B">B-</option>
                <option value="AB+">AB-</option>
                <option value="O+">O-</option>
                </select>
            </div>

            <div class="form-group">
                    <label>Status</label>
                <select class="form-control" required="true" id="Status" name="status">
                        <option value="">--select--</option>
                        <option value="enabled">Enabled</option>
                        <option value="disabled">Disabled</option>
                </select>
            </div>
                                        

        <p class="submit-button">
            <button type="submit" name="upload" class="btn btn-default" id="login-submit">Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </p>    
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
    

</body>

</html>
