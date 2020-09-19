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

<section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">
            <h4>







            </h4>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
