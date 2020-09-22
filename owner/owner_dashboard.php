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
	  
	  
	  if($query="SELECT count(user_name) AS total FROM login WHERE user_type='3'"){
      $result=mysqli_query($con,$query);
      $values=mysqli_fetch_assoc($result);
      $mc=$values["total"];


      }
	  
	  
	  if($query="SELECT count(user_name) AS total FROM login WHERE user_type='2'"){
      $result=mysqli_query($con,$query);
      $values=mysqli_fetch_assoc($result);
      $rc=$values["total"];


      }
	  
	  if($query="SELECT count(user_name) AS total FROM login WHERE user_type='4'"){
      $result=mysqli_query($con,$query);
      $values=mysqli_fetch_assoc($result);
      $uc=$values["total"];


      }
}
else{
    header("Location: ../login.php");
}

include('../rss/header_for_owner.php');
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
        				<a href="financial_report.php">Details</a>
        			</div>
        		</div>

            <div class="dashbord dashbord-green">
            			<div class="icon-section">
            				<i class="fa fa-money" aria-hidden="true"></i><br>
            				<small>Ofline Earning</small>
            				<p>Total Earning --<?php echo $pr ; ?>  TK  </p>
            			</div>
            			<div class="detail-section">
            				<a href="financial_report.php">Details</a>
            			</div>
            		</div>
					
					<div class="dashbord dashbord-red">
            <div class="icon-section">
              <i class="fa fa-users" aria-hidden="true"></i><br>
              <small>Total Manager</small><br><br>
              <p>You have Total -- <?php echo $mc ; ?> Managers</p>
			  <p>                                  </p>
			 
			  
            </div>
            <div class="detail-section">
              <a href="add_manager.php">Add manager </a>
            </div>
          </div>
          <div class="dashbord dashbord-orange">
            <div class="icon-section">
              <i class="fa fa-users" aria-hidden="true"></i><br>
              <small>Total Reciptionist</small>
              <p>You Have Total -- <?php echo $rc ; ?> Reciptionist</p>
			  <p>You Have Total -- <?php echo $uc ; ?> Owners</p>
            </div>
            <div class="detail-section">
              <a href="add_owner.php">Add Owner</a>
            </div>
          </div>


      </div>
    </section>



</body>
</html>    