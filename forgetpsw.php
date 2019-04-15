<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ace Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap Core CSS -->
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

<body style="background-image:url('img/canvas.jpg')">

    <div class="blog-masthead ">
      <div class="container">
      <CENTER>
      
     <div class="info_ban"> 
     <div class="pull-left">

     <img src="img/kmtclogo.png" height="150px;" width="150px;" style="border-radius:150px;position:relative; top:-10px; right:-100px; border-style:none;">
     </div> 
            <h1><strong style="position:relative; top:5px; color:#800000;">Kenya Medical Training College </strong></br><strong style="font-size:30px; position:relative; top:20px; font-family:times; color:#800000;">Training For Better Health</strong><h1>
     </div>
    <div class="container" style="position:absolute; top:100px; left: 150px;">
        <div class="row">>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Please Enter Your Information</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"  method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<input name="login" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                <a href="index.php" class="btn btn-lg btn-success btn-block">Back</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn, 'login')or die(mysqli_connect_error());
    if (isset($_POST['login'])){
      
       $username = $_POST['username'];
       $password = $_POST['password'];
         
    $query = "SELECT * FROM `acelogin` WHERE username='$username'&& password='$password'";
    $result = mysqli_query($conn, $query)or die(mysqli_connect_error());
    $num = mysqli_fetch_array($result);
   if ($num>0) {
     header("location:login.php");
   }
      
    else
  {
    header("location:index.php");
  }
}

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
