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
        <li><a href="setting.php"> SETTINGS </a></li>
        <li><a href="prebook_request.php"> PREBOOK REQUESTS </a></li>
        <li><a href="prebooked_all.php"> PREBOOKED </a></li>
        <li><a href="offline_book.php"> OFFLINE BOOKING </a></li>
        <li><a href="booked_room.php"> BOOKED ROOM </a></li>
        <li><a href="chat_box.php"> CHAT BOX</a></li>
        <li><a href="report.php"> REPORT </a></li>

    </ul>
    <div>



</body>
</html>    