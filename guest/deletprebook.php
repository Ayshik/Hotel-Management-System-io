<?php

  require_once '../database/db_connect.php';

$query ="Delete from pre_booking where serial='$_GET[id]'";
 if(mysqli_query($con,$query))
                {
header("Location:pre_booking_details.php");
                }
	
  ?>
