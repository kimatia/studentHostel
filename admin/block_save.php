
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Entry</title>
</head>


<body>

<?php 
//include 'header.php';
//include 'left_side_bar.php';

     $conn=mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
     $db=mysqli_select_db($conn,'hostel2')or die(mysqli_connect_error());
     if (isset($_POST['upload'])) {

        
        $block =$_POST['block'];
        $gender =$_POST['gender'];
        $description =$_POST['description'];
        $status =$_POST['status'];

        $query = "INSERT INTO block (block, gender, description,status)
VALUES ('$block', '$gender', '$description', '$status')";    

    $set=mysqli_query($conn, $query);
    header("location:block_view.php"); 
 
 }
 else{
echo "block not created";

    }


    
    
   
   mysqli_close($conn);

?>
</body>

</html>