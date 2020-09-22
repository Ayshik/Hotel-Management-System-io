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

             <form  method="post" action="" enctype="multipart/form-data">
               <div class="container">
               <center><h2 style="color:white">Prebooked & Booking Report</h2><input type="text" name="fnamee" id="fname" placeholder="please select a Place" required ><br><br></center>
               <input type="hidden" name="sl" id="no">

                 <div class="row">
                   <input type="submit" name="passingid" value="Prebooke">
                 </div>
                 <div class="row">
                   <input type="submit" name="passingid" value="Booked">
                 </div>

               </div>

             <center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"></center>

             <center><table id="myTable">
             <tr class="header">

             <th style="color:black">User Name </th>
             <th style="color:black">Room Number</th>

             <th style="color:black">Earnings</th>



             </tr>
             <tbody>
             <?php
             foreach($info as $info)
             {
             echo "<tr>";


             echo "<td>".$info["user_name"]."</td>";
             echo "<td>".$info["room_number"]."</td>";

             echo "<td>".$info["Totalcost"]."</td>";

              


             echo "</tr>";
             }
             ?>

             </tbody>

             </table></center>



               </form>





           </div>
         </div>
       </div>
     </section>







</body>
</html>
