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

    
</head>

<body>


<?php  
 
include 'header.php';
include 'left_side_bar.php';

    $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
    $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
    
    $query = "SELECT * FROM `fees_structure`";
    
    $result = mysqli_query($conn,$query)or die(mysqli_connect_error());
    
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
                            Fee Structure View
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <div  style="overflow:scroll;height:500px;width:1000px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        
                                            <th>ID</th>
                                            <th>Fees Type</th>
                                            <th>Cost</th>                                            
                                            <th>Action</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    
                            <?php 
                            
                            while ($row=mysqli_fetch_array($result)) {?>                            
                            
                            <tr class="odd gradeX">
                            
                                <td><?php echo $row['id']; ?></td>
                            
                                <td><?php echo $row['fees_type']; ?></td>                                            
                                <td><?php echo $row['cost']; ?></td>
                                
                                                                                    
                                <td align="center"><a title="Delete" href='fees_delete.php?id=<?php echo $row["id"];?>' onclick="return confirm('are you sure want to delete')"><i class="glyphicon glyphicon-trash"></a></td>
                                <td align="center"><a title="Update" href='fees_view_edit.php?id=<?php echo $row["id"];?>'><i class="glyphicon glyphicon-pencil"></i></a></td>
                            </tr>
                                        
                                <?php }?>

                                    
                                </table>
                                </div>
                            </div>
                            <!-- /.table-responsive -->
                           
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
