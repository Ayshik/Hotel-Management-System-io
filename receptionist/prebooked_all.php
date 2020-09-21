<?php


include "../rss/header_for_receptionist..php";

session_start();
include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{

  $info=prebokinginfo();

}
else{

    header("Location: ../login.php");
}



function prebokinginfo(){

  global $con;
      $uname = $_SESSION['user_name'];
      $sql = "select * from pre_booking";
      $result = mysqli_query($con,$sql);
      return $result;



}

?>
<style>
  table {
    border-collapse: collapse;

  color: white;
  border: transparent;
  }

  th, td {
    text-align: center;
      padding: 8px;
      font-family: cursive;
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


            <center> <table id="table" border='1'>
                     <thead>
                       <th>Sl.</th>
                       <th>User Name</th>

                         <th>Room No</th>
                       <th>Payment</th>
                       <th>Total Cost</th>
                       <th>Payment Due</th>

                   <th>Pre Checkin</th>
                   <th>Pre Checkout</th>

                   <th>Checkin</th>
                   <th>Checkout</th>


                     </thead>


                     <tbody>
                       <?php
                         foreach($info as $infos)
                         {
                           echo "<tr>";
                             echo "<td>".$infos["serial"]."</td>";
                             echo "<td>".$infos["user_name"]."</td>";

                             echo "<td>".$infos["room_number"]."</td>";
                     echo "<td>".$infos["payment"]."</td>";
                       echo "<td>".$infos["Totalcost"]."</td>";
                               echo "<td>".$infos["Payment_due"]."</td>";
                             echo "<td>".$infos["pre_check_in"]."</td>";
                             echo "<td>".$infos["pre_check_out"]."</td>";
                             echo "<td>".$infos["check_in"]."</td>";
                             echo "<td>".$infos["check_out"]."</td>";


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
