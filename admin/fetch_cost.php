<?php 

$conn =mysqli_connect("localhost", "root", "kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db( $conn, 'hostel2')or die(mysqli_connect_error());

$fees_type = $_POST['get_option'];
     $sql="SELECT `cost` FROM `fees_structure` WHERE fees_type='$fees_type'";
     $find=mysqli_query($conn,$sql);
     $row=mysqli_fetch_array($find);
     
       echo $row['cost'];


?>