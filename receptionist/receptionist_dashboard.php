<?php
session_start();
if(isset($_SESSION['user_name']))
{
    
}
else{
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECEIPTIONIST DASHBOARD</title>
</head>
<body>
    <div>
    <ul>
        <li><a href="receptionist_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="#"> SETTING </a></li>
        <li><a href=".php"> PREBOOK REQUESTS </a></li>
        <li><a href=".php"> PREBOOKED </a></li>
        <li><a href=".php"> OFFLINE BOOKING </a></li>
        <li><a href=".php"> BOOKED ROOM </a></li>
        <li><a href=".php"> REPORT </a></li>

    </ul>
    <div>



</body>
</html>    