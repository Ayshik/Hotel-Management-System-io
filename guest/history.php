<?php
session_start();
include "../database/db_connect.php";



if(isset($_SESSION['user_name']))
{
  $uname = $_SESSION['user_name'];
  $infos=history();

  
}
else{

    header("Location: ../login.php");
}

include "../rss/Dheader&navbarfor_user.php";

function history(){

  global $con,$uname;
      
      $sql = "select * from pre_booking  where user_name='$uname' and status='Old'";
      $result = mysqli_query($con,$sql);
      return $result;

}


?>
<style>
  table {
    border-collapse: collapse;
  margin-left: 272px;
  color: white;
  border: transparent;
  }

  th, td {
    text-align: left;
    padding: 8px;
    background: black;
}
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
    background-color: #4CAF50;
    color: white;
  }

  table tr:not(:first-child){
                 cursor: pointer;transition: all .25s ease-in-out;
             }
             table tr:not(:first-child):hover{background-color: #ddd;}

             .btn {
     background-color: red;
     border: none;
     color: white;
     padding: 12px 16px;
     font-size: 16px;
     cursor: pointer;
  	 border-radius: 10px;
   }


   .btn:hover {
     background-color: RoyalBlue;
   }

   a:link{


     color: white;
     text-decoration: none;

   }
   a:visited{

  color: white;

   }

  </style>

 <section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">


            <table id="table" style={border:1px>
                    <thead>
                   
                        <th>Room No</th>

                  <th>Pre Checkin</th>
                  <th>Pre Checkout</th>

                  <th>Hotel Checkin</th>
                  <th>Hotel Checkout</th>

               
                    </thead>

                   
				   <tbody>
                <?php
                  foreach($infos as $info)
                  {
                    echo "<tr>";

					
              echo "<td>".$info["room_number"]."</td>";
                echo "<td>".$info["pre_check_in"]."</td>";
                echo "<td>".$info["pre_check_out"]."</td>";

                echo "<td>".$info["check_in"]."</td>";
                echo "<td>".$info["check_out"]."</td>";
                       

           
                    echo "</tr>";
                  }
                ?>

              </tbody>
                    
         </table>




          </div>
        </div>
      </div>
    </section>


</body>

</html>
