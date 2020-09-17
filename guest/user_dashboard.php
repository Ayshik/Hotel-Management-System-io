<?php
session_start();

if(isset($_SESSION['user_name']))
{
    echo $_SESSION['user_name'];
}
else{
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>USER_DASHBOARD</title>
</head>
<body>
<div>
    <ul>
    <li><a href="user_dashboard.php"> DASHBOARD </a></li>
      <li><a href="../logout.php"> LOGOUT </a></li>
      <li><a href="update_user.php"> SETTING </a></li>
    </ul>
   



</body>

</html>