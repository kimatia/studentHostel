<?php

//connect the database
$conn =mysqli_connect("localhost","root","kimatia7950")or die(mysqli_connect_error());
$db =mysqli_select_db($conn, 'hostel2')or die(mysqli_connect_error());

//Enter the headings of the excel columns
$contents="ID,Student Name,Fees Type,Cost,Paid Amount,due_balance,month,payment_date\n";

//Mysql query to get records from database
$user_query = mysqli_query($conn,"SELECT `id`, `student_name`, `fees_type`, `cost`, `paid_amount`, `due_balance`, `month`, `payment_date`, `status` FROM `fees_monthly`")or die(mysqli_connect_error());

//While loop to fetch the records
while($row = mysqli_fetch_array($user_query))
{
$contents.=$row['id'].",";
$contents.=$row['student_name'].",";
$contents.=$row['fees_type'].",";
$contents.=$row['cost'].",";
$contents.=$row['paid_amount'].",";
$contents.=$row['due_balance'].",";
$contents.=$row['month'].",";
$contents.=$row['payment_date']."\n";

}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=Monthly Report.xls".date('d-m-Y').".csv");
print $contents;


?>