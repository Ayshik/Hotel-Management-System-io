<?php


include "../rss/header_for_receptionist..php";
session_start();
include "../database/db_connect.php";
if(isset($_SESSION['user_name']))
{

  $info=bokinginfo();

}
else{

    header("Location: ../login.php");
}



function bokinginfo(){

  global $con;
      $uname = $_SESSION['user_name'];
      //$sql = "select a.serial,a.room_number,a.price,a.pre_check_in,a.pre_check_out form room_details a,pre_booking b where a.room_number=b.room_number";

 $sql = "select * from room_details where status='Free'";
      $result = mysqli_query($con,$sql);
      return $result;



}


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
        <center><h2 style="color:white">Room No</h2><input type="text" name="fnamee" id="fname" placeholder="please select a Room" required ><br><br></center>
        <input type="hidden" name="sl" id="no">

          <div class="row">
            <input type="submit" name="passingid" value="Next">
          </div>

        </div>

      <center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for roomno or roomtag.." title="Type in a name"></center>

<center><table id="myTable">
<tr class="header">

<th style="color:black">Sl </th>
<th style="color:black">Room No</th>

<th style="color:black">Price</th>
<th style="color:black">Pre Checkedin</th>
<th style="color:black">Pre Checkedout</th>


</tr>
<tbody>
<?php
  foreach($info as $info)
  {
    echo "<tr>";

    echo "<td>".$info["serial"]."</td>";
    echo "<td>".$info["room_number"]."</td>";
echo "<td>".$info["price"]."</td>";

echo "<td>".$info["pre_check_in"]."</td>";

        echo "<td>".$info["pre_check_out"]."</td>";


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


<script>

               var table = document.getElementById('myTable');

               for(var i = 1; i < table.rows.length; i++)
               {
                   table.rows[i].onclick = function()
                   {

                        document.getElementById("fname").value = this.cells[1].innerHTML;
												document.getElementById("no").value = this.cells[0].innerHTML;

                   };
               }


               function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

        </script>
