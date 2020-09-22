<?php

session_start();
include('../rss/Dheader&navbarfor_manager.php');


include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{

  $info = attendance();

}
else{

    header("Location: ../login.php");
}



function attendance(){
     global $con;

      $sql = "select * from receptionist_timing";
      $result = mysqli_query($con,$sql);
      return $result;



}

?>
<style>
.dashbord {
    width: 62%;
    display: inline-block;
    color: #fff;
margin-top: 50px;
background: transparent;
}
	
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


            <center> <table  id="table" border='1'>
            <thead>       
                        <th>Receptionist Name</th>
                        <th>Date</th>
                        <th>Entry Time</th>
                        <th>Exit Time</th>              
                     </thead>

                     <tbody>
                       <?php
                         foreach($info as $infos)
                         {
                            echo "<tr>";
                            echo "<td>".$infos["user_name"]."</td>";
                            echo "<td>".$infos["date"]."</td>";
                            echo "<td>".$infos["entry_time"]."</td>";
                            echo "<td>".$infos["exit_time"]."</td>";
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
