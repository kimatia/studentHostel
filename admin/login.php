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

    <title>Home Page</title>

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
                    <div class="pull-left">

     <img src="img/kmtclogo.png" height="100px;" width="100px;" style="border-radius:170px;position:relative; top:10px; right:-300px; border-style:none;">
     </div>
                     <h1><strong style="font-size:25px;padding-left: 350px; position:relative; top:5px; color:#800000;">Kenya Medical Training College </strong></br><strong style="font-size:20px; position:relative; top:10px; padding-left: 400px; font-style: italic; font-family:times; color:#800000;">Training For Better Health</strong><h1>
                	 </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
      <div class="col-md-3">
          <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                <img src="images/project_2.jpg" class="img-rounded" width="90px" height="125px" />
              </div>
              <div class="col-md-6">
                  We nurture great talents that ultimately fit in the society at any disposal.
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <img src="images/project_4.jpg" class="img-rounded" width="90px" height="125px" />
              </div>
              <div class="col-md-6">
                  Our esteemed staff is ready to offer quality education and service.
              </div>
          </div>
          </div>
      </div>
      <div class="col-md-6">
          <div id= "myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 10px">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/pic1.png" alt="Picture1" style=" height: 250px; width: 500px;">
                    </div>
                    <div class="item">
                         <img src="img/pic2.png" alt="Picture2" style=" height: 250px; width: 500px;">
                    </div>
                    <div class="item">
                         <img src="img/pic3.png" alt="Picture3" style=" height: 250px; width: 500px;">
                    </div>
                     <div class="item">
                         <img src="img/pic4.png" alt="Picture4" style=" height: 250px; width: 500px;">
                    </div>
                </div> 

                <a class= "left-carousel-control" href="#myCarousel" data-slide="prev" title="Previous">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                 </a> 
                 <a class= "right-carousel-control" href="#myCarousel" data-slide="next" title="Next">
                     <span class="glyphicon glyphicon-chevron-right"></span>
                     <span class="sr-only">Next</span> 
                     </a>
                     </div>
      </div>
      <div class="col-md-3">
         <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                 Our students are proactive in coming up with real life solutions to all.
              </div>
              <div class="col-md-6">
              <img src="images/2page-img.jpg" class="img-rounded" width="90px" height="125px" />
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  The facilities offered are tailored to meet student needs for better study.
              </div>
              <div class="col-md-6">
              <img src="images/project_1.jpg" class="img-rounded" width="90px" height="125px" />
              </div>
          </div>
          </div>
      </div>
        </div>
        <!-- /#page-wrapper -->
        <div class="row">
            <div class="panel panel-default">
                <div class="panel heading">
                    <h3 style="color: brown;"><center>KMTC</center></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                        <h5 style="color: brown;"><center>Motto</center></h5> 
                        <p>To Nurture talent for future scociety.</p>   
                        </div>
                         <div class="col-md-4">
                          <h5 style="color: brown;"><center>Mission</center></h5>  
                          <p>To be the best in all areas of society.</p>
                        </div>
                         <div class="col-md-4">
                          <h5 style="color: brown;"><center>Vission</center></h5>  
                          <p>To provide extra quality education to all.</p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                  <p style="color: green;"><center>Your school of choice.</center></p>  
                </div>
            </div>
        </div>

    </div>
    <?php
    include 'footer.php' ;
    ?>

    <div class="container">
     
    <!-- /#wrapper -->
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