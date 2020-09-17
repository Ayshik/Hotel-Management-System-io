<?php
include "database/db_connect.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
        $name=mysqli_real_escape_string($con,$name);
        $sql="select * from login where user_name='$name'";
        $result=mysqli_query($con,$sql);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            echo "USERNAME ALREADY EXISTS";
        }
    }
    else{
        echo "USERNAME CAN NOT BE EMPTY";
    }
}
else{
    header("location:registration.php");
}
?>