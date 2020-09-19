<?php
session_start();

if(isset($_SESSION['user_name']))
{
    // echo $_SESSION['user_name'];
}
else{

    header("Location: ../login.php");
}

include "../rss/Dheader&navbarfor_user.php";

?>

 <section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">
            
			
			
			
			
			
			
          </div>
        </div>
      </div>
    </section>


</body>

</html>
