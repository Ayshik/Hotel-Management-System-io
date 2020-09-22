<?php
session_start();
include "database/db_connect.php";

if($_SESSION['user_type'] == 2)
{
    $uname = $_SESSION['user_name'];
    $exit_time = date(" h:i:sa ");
    $date = date(" Y-m-d");
   
    $uname = mysqli_real_escape_string($con , $uname);
    $exit_time = mysqli_real_escape_string($con , $exit_time);
    $date = mysqli_real_escape_string ($con , $date);

    $sql = "update receptionist_timing set exit_time = '$exit_time' where date = '$date' AND user_name ='$uname'";
    
    if(! mysqli_query($con , $sql))
    {
        echo "setting time error".mysql_error($con);
    }
    
    
}



session_unset();
session_destroy();

header("Location: login.php");

?>
