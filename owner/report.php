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
	<title> FEEDBACK FROM CUSTOMER </title>
</head>
<body>
    <div>
    <ul>
        <li><a href="owner_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="setting.php"> SETTINGS </a></li>
        <li><a href="add_owner.php"> ADD OWNER </a></li>
        <li><a href="add_manager.php"> ADD MANAGER </a></li>
        <li><a href="financial_report.php"> FINANCIAL REPORT </a></li>
        <li><a href="report.php"> FEEDBACK FROM CUSTOMER </a></li>

    </ul>
    <div>



</body>
</html>    