<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
    header("Location: home.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
    $first = strip_tags($_POST['firstname']);
    $last = strip_tags($_POST['lastname']);
    $uname = strip_tags($_POST['username']);
    $uphone = strip_tags($_POST['phonenumber']);
    $email = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);
    
    $first = $DBcon->real_escape_string($first);
    $last = $DBcon->real_escape_string($last);
    $uname = $DBcon->real_escape_string($uname);
    $uphone = $DBcon->real_escape_string($uphone);
    $email = $DBcon->real_escape_string($email);
    $upass = $DBcon->real_escape_string($upass);

    
    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
    // check if fields are empty
    if(empty($first&&$last&&$uname&&$uphone&&$email&&$upass)){
            $errMSG = "Please Input All the fields.";
        }
          else  if(empty($first)){
            $errMSG = "Please Fill In First Name..";
        }
        else if(empty($last)){
            $errMSG = "Please Fill In LastName..";
        }
        else if(empty($uname)){
            $errMSG = "Please Fill In Username..";
        }
        else if(empty($uphone)){
            $errMSG = "Please Input Phone Number";
        } else if(empty($email)){
            $errMSG = "Please Input Email.";
        } else if(empty($upass)){
            $errMSG = "Please Input Password.";
        }
        
        else
        {
    $check_email = $DBcon->query("SELECT * FROM tbl_users WHERE email='$email'");
    $rowUser=$check_email->fetch_array();
    $count=$check_email->num_rows;
    
    if ($count==0) {
        $query = "INSERT INTO tbl_users(firstname,lastname,username,phonenumber,email,password) VALUES('$first' , '$last' ,'$uname', '$uphone' ,'$email','$hashed_password')";
        

        if ($DBcon->query($query)) {
        $successMSG1 = "Registered succesfully...";
            header("refresh:5;index.php");
        }else {
             $errMSG1 = "Error while registering.";
                    
        }
        
    } else {
        
        
         $errMSG1 = "Sorry email already taken.";
            
    }
    
    $DBcon->close();
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

</head>

<body style="background-image:url('img/canvas.jpg')">

   
    
    <div class="blog-masthead ">
      <div class="container">
      <CENTER>
      
     <div class="info_ban"> 
     <div class="pull-left">

     <img src="img/kmtclogo.png" height="150px;" width="150px;" style="border-radius:150px;position:relative; top:-10px; right:-10px; border-style:none;">
     </div> 
            <h1><strong style="position:relative; top:5px; color:#800000;">Kenya Medical Training College </strong></br><strong style="font-size:30px; position:relative; top:20px; font-family:times; color:#800000;">Training For Better Health</strong><h1>
     </div>

    <div class="container" style="position:absolute; top:100px; left: 10px;">
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <center><strong>SIGNUP</strong></center>
                <?php
    if(isset($errMSG1)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG1; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG1)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG1; ?></strong>
        </div>
        <?php
    }
    ?>   
            </div>
            <div class="panel-body">
       
       <form class="form-signin" method="post" id="register-form">
  <fieldset>
            <div class="form-group ">
                 <input class="form-control" required="true" type="text" name="firstname" placeholder="Firstname">
             </div>
             <div class="form-group ">
                 <input class="form-control" required="true" type="text" name="lastname" placeholder="Lastname">
             </div>
             <div class="form-group ">
                 <input class="form-control" required="true" type="text" name="username" placeholder="Username">
             </div>
              <div class="form-group ">
                 <input class="form-control" required="true" type="text" name="phonenumber" placeholder="Phone No.">
             </div>
              <div class="form-group ">
                 <input class="form-control" required="true" type="email"   name="email" placeholder="Email">
             </div>
             <div class="form-group ">  
                 <input class="form-control" required="true" type="password" name="password" placeholder="Password">
             </div>
            
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="btn-signup" class="btn btn-primary btn-round" value="POST">Signup.</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a class="btn btn-primary btn-round" href="index.php">Login</a>
             </fieldset>
             </form>
              </div>
            <div class="panel-footer">
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
            </div>
                </div>
            </div>
        </div>
    </div>

  

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
