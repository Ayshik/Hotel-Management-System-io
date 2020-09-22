<?php
session_start();
include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{

  if(isset($_POST["prebooking"]))
  {
header("Location:prebooked_report.php");
  }
else if(isset($_POST["booking"]))
  {
header("Location:booked_report.php");
  }

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
      margin-left: 20px;
      margin-left: 39%;
      margin-top: 80px;
      border-radius: 11px;
      cursor: pointer;
      font-size: xxx-large;
      /* float: right; */
      margin-right: 47%;
}

#pre:hover {
background-color: #45a049;
}

#boo {
  background-color: #4CAF50;
    color: white;
    padding: 13px 44px;
    font-size: -webkit-xxx-large;
    border: none;
    border-radius: 11px;
    margin-left: 10px;
    cursor: pointer;
    /* padding-top: 10px; */
    float: right;
    margin-top: 28px;
    margin-right: 38%;
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
               <center><h2 style="color:white">Prebooked & Booking Report</h2><br><br></center>
               <input type="hidden" name="sl" id="no">

                 <div class="row">
                   <input id="pre" type="submit" name="prebooking" value="Prebooked">
                 </div>

                <div class="row">
                   <input id="boo" type="submit" name="booking" value="Booked">
                 </div><br><br>

               </div>







               </form>





           </div>
         </div>
       </div>
     </section>







</body>
</html>
