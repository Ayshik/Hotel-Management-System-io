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
	<title> ROOM CUSTOMIZATION </title>
</head>
<body>
    <div>
    <ul>
        <li><a href="manager_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="setting.php"> SETTING </a></li>
        <li><a href="add_receptionist.php"> ADD RECEPTIONIST </a></li>
        <li><a href="receptionist_attendance.php"> RECEPTIONIST ATTENDANCE </a></li>
        <li><a href="room_customize.php"> ROOM CUSTOMIZATION </a></li>
        <li><a href="pricing_view.php"> VIEW AND PRICE CUSTOMIZATION </a></li>
        <li><a href="report_by_customer.php"> FEEDBACK FROM CUSTOMER </a></li>
        <li><a href="financial_report.php"> FINANCIAL REPORT </a></li>       
    </ul>
    <div>



</body>
</html>    