<?php
session_start();

if(isset($_SESSION['user_name']))
{
    // echo $_SESSION['user_name'];
}
else{
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> HISTORY </title>
</head>
<body>
<div>
    <ul>
        <li><a href="user_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="update_user.php"> SETTING </a></li>
        <li><a href="pre_booking.php"> BOOKING </a></li>
        <li><a href="cancel_booking.php"> CANCEL BOOKING </a></li>
        <li><a href="history.php">  HISTORY   </a></li>
        <li><a href="pre_booking_details.php"> PREBOOKED DETAILS</a></li>
        <li><a href="chat_box.php"> CHAT BOX</a></li>
        <li><a href="report.php"> REPORT </a></li>        
    </ul>
   



</body>

</html>