<?php
session_start();
if(isset($_SESSION['user_name']))
{
    
}
else{
    header("Location: ../login.php");
}

include('../rss/Dheader&navbarfor_manager.php');
?>




</body>
</html>    