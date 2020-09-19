<?php
session_start();
if(isset($_SESSION['user_name']))
{
    
}
else{
    header("Location: ../login.php");
}
include('../rss/header_for_owner.php');
?>




</body>
</html>    