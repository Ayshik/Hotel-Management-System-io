<?php
session_start();
include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{



$info=bokinginfo();


}
else{
    header("Location: ../login.php");
}

include('../rss/header_for_owner.php');





      function bokinginfo(){

        global $con;
            $uname = $_SESSION['user_name'];
            $sql = "select * from room_booking";
            $result = mysqli_query($con,$sql);
            return $result;

}



?>




<style>
* {
box-sizing: border-box;
}
.dashbord {
  width: 104%;
  display: inline-block;
  background-color: transparent;
  color: #7d1818;
  margin-top: -115px;
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
#pre {
background-color: #4CAF50;
color: white;
padding: 12px 20px;
border: none;
border-radius: 11px;
cursor: pointer;
float: right;
margin-right: 47%;
}

#pre:hover {
background-color: #45a049;
}

#boo {
  background-color: #4CAF50;
      color: white;
      padding: 12px  25px;
      border: none;
      border-radius: 11px;
      cursor: pointer;
      /* padding-top: 10px; */
      float: right;
      margin-top: 10px;
      margin-right: 47%;
}

#boo:hover {
background-color: #45a049;
}
</style>


  <section>
       <div class="main-section">
         <div class="dashbord">
           <div class="icon-section">

             <form  method="post" action="" enctype="multipart/form-data">
               <div class="container">
               <center><h2 style="color:white">Booking Report</h2><br><br></center>
               <input type="hidden" name="sl" id="no">



               </div>



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

             //echo "<td>".$info["Totalcost"]."</td>";
             echo "<td>".$info["total_room_price"]."</td>";




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
