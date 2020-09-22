<?php
session_start();
include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{
$info=reports();
}
else{
    header("Location: ../login.php");
}

include('../rss/Dheader&navbarfor_manager.php');


function reports(){

  global $con;
      $uname = $_SESSION['user_name'];
      $sql = "select * from reportbox where receiver='Manager'";
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
      padding: 19px;
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
         
           <div class="icon-section">


            <center> <table id="table" border='1'>
                     <thead>
                       <th>sl.</th>
                       <th>User Name</th>
                       <th>Subject</th>
                       <th>Massage</th>
                       <th>Date</th>




                     </thead>


                     <tbody>
                       <?php
                       foreach($info as $infos)
                         {
                           echo "<tr>";
                             echo "<td>".$infos["sl"]."</td>";
                             echo "<td>".$infos["name"]."</td>";


                     echo "<td>".$infos["subject"]."</td>";
                       echo "<td>".$infos["massage"]."</td>";
                               echo "<td>".$infos["date"]."</td>";



                           echo "</tr>";
                         }
                       ?>

                     </tbody>








                   </table></center>




           </div>
         </div>
       
     </section>







</body>
</html>
