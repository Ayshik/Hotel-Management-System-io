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
    padding-left: 67px;
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


            <center><table id="table" border='1'>
                     <thead>
                       <th>--------</th>
                       <th>--------</th>
                       <th>--------</th>
                       <th>--------</th>
                       <th>table e value dile thik hoye jabe</th>



                     </thead>


                     <tbody>
                       <?php
                      //  foreach($info as $infos)
                         {
                          /* echo "<tr>";
                             echo "<td>".$infos[""]."</td>";
                             echo "<td>".$infos[""]."</td>";

                             echo "<td>".$infos[""]."</td>";
                     echo "<td>".$infos[""]."</td>";
                       echo "<td>".$infos[""]."</td>";
                               echo "<td>".$infos[""]."</td>";
                             echo "<td>".$infos[""]."</td>";
                             echo "<td>".$infos[""]."</td>";
                             echo "<td>".$infos[""]."</td>";
                             echo "<td>".$infos[""]."</td>";*/


                           echo "</tr>";
                         }
                       ?>

                     </tbody>








                   </table></center>




           </div>
         </div>
       </div>
     </section>







</body>
</html>
