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
	<title>USER_UPDATE</title>
</head>
<body>
    <div>
    <ul>
        <li><a href="owner_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="#"> SETTING </a></li>
        <li><a href="add_owner.php"> ADD OWNER </a></li>
        <li><a href="add_manager.php"> ADD MANAGER </a></li>

    </ul>
    <div>



</body>
</html>    