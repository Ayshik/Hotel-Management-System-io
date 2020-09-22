<?php
session_start();
include "../database/db_connect.php";

if(isset($_SESSION['user_name']))
{
  if($query="SELECT sum(payment) AS total FROM room_booking"){
    $result=mysqli_query($con,$query);
    $values=mysqli_fetch_assoc($result);
    $pr=$values["total"];


    }

    if($query="SELECT sum(Totalcost) AS total FROM pre_booking"){
      $result=mysqli_query($con,$query);
      $values=mysqli_fetch_assoc($result);
      $pb=$values["total"];


      }
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
        				<i class="fa fa-money" aria-hidden="true"></i><br>
        				<small>Online Earning</small>
        				<p>Total Earning -- <?php echo $pb ; ?> TK </p>
        			</div>
        			<div class="detail-section">
        				<a href="olist.php">Details</a>
        			</div>
        		</div>

            <div class="dashbord dashbord-green">
            			<div class="icon-section">
            				<i class="fa fa-tasks" aria-hidden="true"></i><br>
            				<small>Ofline Earning</small>
            				<p>Total Earning -- <?php echo $pr ; ?> TK  </p>
            			</div>
            			<div class="detail-section">
            				<a href="release.php">Details</a>
            			</div>
            		</div>


      </div>
    </section>
  </body>
</html>
