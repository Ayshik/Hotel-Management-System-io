<?php
session_start();
include "database/db_connect.php";
$pass_db = "";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    // if(!empty($_POST['name']) && !empty($_POST['pass']))
    if(!empty($_POST['pass']))
    {
        // $name = $_POST['name'];
        $name=$_SESSION['user_name'];   
        $pass = $_POST['pass'];
        $name = mysqli_real_escape_string($con,$name);
        $pass = mysqli_real_escape_string($con,$pass);

        $sql = "select * from login where user_name='$name'";
        $result = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_assoc($result))
        {
            $pass_db = $row['password'];
        }
        if( ! password_verify($pass,$pass_db))
        {
            echo "PASSWORD DOESNOT MATCH";
        }
    }
}
else{
    header("location:registration.php");
}
?>