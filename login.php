<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>

    <script type= "text/javascript" src = "countries.js"></script>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

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

            </div>
            
            <div id= "myCarousel" class="carousel slide" data-ride="carousel" style="padding-left: 200px; padding-top: 100px">
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
    

    </div>
    <?php
    include 'footer.php' ;
    ?>

    <div class="container">
     
   
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>