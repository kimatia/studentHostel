<script type="text/javascript">
    function fetch_select_gender(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option_name:val
 },
 success: function (response) {
  document.getElementById("new_select_ID").innerHTML=response; 
 }
 });
}
</script>
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

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fees</title>
 

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
<!-- =================/for get student details======================= -->
</head>
<body>
<?php  
 
include 'header.php';
include 'left_side_bar.php';
?>
    
    <div id="wrapper" style="background-color: #800000">
    <div id="page-wrapper" >
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
                           Monthly Fees View
                        </div>
                        <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <div class="form-group">
                                <form action="get_databy_date.php" method="post">

                                        <label>Student Name</label>
                                   <?php
        $stmtSelect = $DB_con->prepare('SELECT * FROM fees_monthly ORDER BY id ASC');
    $stmtSelect->execute();
         ?>
<select class="form-control" name="name" type="text" onchange="fetch_select_gender(this.value)";>
<?php while($rowSelect=$stmtSelect->fetch(PDO::FETCH_ASSOC)){?>
<option value="<?php echo $rowSelect['student_name']; ?>"> <?php echo $rowSelect['student_name']; ?>
</option>
<?php } ?>
</select>
                           
            <br>
                        
                <button type="submit" class="btn btn-default" name="upload">Submit</button> 
                   
            </form>
       

                            <div id="txtHint" class="pull-left">
                            <br><br><br><br>
                        <?php /*        <b style="margin-left:-283px">Student Bill will be listed here.....</b> */ ?>
                            </div>


                    </div>
                            <!-- /<div class="dataTable_wrapper"> -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
