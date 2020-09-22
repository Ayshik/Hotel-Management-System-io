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
* {
box-sizing: border-box;
}

#myInput {
background-image: url('https://www.w3schools.com/css/searchicon.png');
background-position: 10px 10px;
background-repeat: no-repeat;
width: 50%;
font-size: 16px;
padding: 12px 20px 12px 40px;
border: 1px solid #ddd;
margin-bottom: 12px;

}

#myTable {
border-collapse: collapse;
  width: 50%;
  border: 1px solid #ddd;
  font-size: 18px;

  color: white;
}

#myTable th, #myTable td {
text-align: left;
padding: 12px;
}

#myTable tr {
border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
background-color: mediumseagreen;
}

.container {
border-radius: 5px;

padding: 84px;
}
input[type=submit] {
background-color: #4CAF50;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: right;
margin-right: 47%;
}

input[type=submit]:hover {
background-color: #45a049;
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
