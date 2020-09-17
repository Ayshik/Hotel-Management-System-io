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
	<title>MANAGER DASHBOARD</title>
</head>
<body>
    <div>
    <ul>
        <li><a href="manager_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="#"> SETTING </a></li>
        <li><a href="add_receptionist.php"> ADD RECEPTIONIST </a></li>

    </ul>
    <div>



</body>
</html>    