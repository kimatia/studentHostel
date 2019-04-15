  <?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
    header("Location: home.php");
    exit;
}

if (isset($_POST['btn-login'])) {
    
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    
    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);
    if(empty($email&&$password)){
        $errMSG="Please fill in all the fields!";
    }else{
    $query = $DBcon->query("SELECT * FROM tbl_users WHERE email='$email'");
    $row=$query->fetch_array();
    
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    
    if (password_verify($password, $row['password']) && $count==1) {
           if($row['logintype']==1){
$_SESSION['userSession'] = $row['user_id'];
        $successMSG1="Successfuly signed in...";
        header("refresh:2;admin/login.php");
        }
        elseif($row['logintype']==0){
        $_SESSION['userSession'] = $row['user_id'];
        $successMSG1="Successfuly signed in...";
        header("refresh:2;student/login.php");    
        } 
        
    } else {
        $errMSG1="Invalid email address or paword.";
    }
    $DBcon->close();
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KMTC Portal</title>

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
<body  style="background-image:url('img/canvas.jpg')">

 
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
        <center><strong>LOGIN</strong></center>
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
        <div class="form-group">
        <input type="email" required="true" class="form-control" placeholder="Email address" name="email" />
       
        </div>
        
        <div class="form-group">
        <input type="password" required="true" class="form-control" placeholder="Password" name="password" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-round" name="btn-login" id="btn-login">
        <span class="glyphicon glyphicon-log-in"></span> &nbsp;Login
      </button>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <a href="register.php" class="btn btn-primary btn-round">Signup</a>
           
        </div>  
        
        
      
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
                    
   
</body>
</html>

   