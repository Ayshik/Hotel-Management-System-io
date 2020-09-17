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

    </ul>
    <div>



</body>
</html>    