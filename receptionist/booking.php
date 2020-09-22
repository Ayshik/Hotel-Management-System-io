<?php
session_start();
include "../rss/header_for_receptionist..php";
include "../database/db_connect.php";

$class = $category = $check_in = $check_out = $total_cost =  $price = $error_message = $payment = "";
$rn_booked = $room_available = $first_result = [];
$avialable = 0;

if(isset($_SESSION['user_name']))
{
  $first = "SELECT * FROM room_details";
  $first_result = mysqli_query($con , $first);
    

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_check']))
	{
		if(empty($_POST['class']))
		{
			$error_message = "class can not be empty";
		}
		else
		{
			$class = $_POST['class'];
      $class=mysqli_real_escape_string($con,$class);
		}

		if(empty($_POST['category']))
		{
			$error_message = "Category can not be empty";
		}
		else
		{
			$category = $_POST['category'];
			$category=mysqli_real_escape_string($con,$category);
    }

    if(empty($_POST['cin']))
    {

    }
    else
    {
        $check_in = $_POST['cin'];
    }

    if(empty($_POST['cout']))
    {
      
    }
    else
    {
        $check_out = $_POST['cout'];
        //validation for check the date
    }
  
    $i=0;

    $sql= "SELECT * FROM pre_booking";
    $result = mysqli_query($con , $sql);
    $row = mysqli_num_rows($result);
    
    if($row>0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $d1 = $row['pre_check_in'];
        $d2 = $row['pre_check_out'];

        $check_in_input = date('Y-m-d', strtotime($check_in));
        $check_out_input = date('Y-m-d', strtotime($check_out));
        $startDate = date('Y-m-d', strtotime($d1));
        $endDate = date('Y-m-d', strtotime($d2));

        if (($check_in_input >= $startDate) && ($check_in_input <= $endDate) ||  ($check_out_input >= $startDate) && ($check_out_input <= $endDate))
        {
          $rn_booked[$i] = $row["room_number"]; 
          $i++;
        }
        elseif(($startDate>= $check_in_input) && ($startDate <= $check_out_input) ||  ($endDate >= $check_in_input) && ($endDate <= $check_out_input))
        {
          $rn_booked[$i] = $row["room_number"]; 
          $i++;
        }
    
      }
    }

    $sql1 = "SELECT * FROM room_booking";

    $result1 = mysqli_query($con , $sql1);
    
    $row = mysqli_num_rows($result1);
    
    if($row>0)
    {
      while($row = mysqli_fetch_assoc($result1))
      {
        $d1 = $row['check_in'];
        $d2 = $row['check_out'];

        $check_in_input = date('Y-m-d', strtotime($check_in));
        $check_out_input = date('Y-m-d', strtotime($check_out));
        $startDate = date('Y-m-d', strtotime($d1));
        $endDate = date('Y-m-d', strtotime($d2));

        if (($check_in_input >= $startDate) && ($check_in_input <= $endDate) ||  ($check_out_input >= $startDate) && ($check_out_input <= $endDate))
        {
          $rn_booked[$i] = $row["room_number"]; 
          $i++; 
        }
        elseif(($startDate>= $check_in_input) && ($startDate <= $check_out_input) ||  ($endDate >= $check_in_input) && ($endDate <= $check_out_input))
        {
          $rn_booked[$i] = $row["room_number"]; 
          $i++;
        }
      }
      $avialable = 1;
    }
    else
    {
        $error_message = "room not available";
    }
     
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_next']))
	{
        if(empty($_POST['room_number']))
        {
          $error_message = "PLEASE SELECT A ROOM NUMBER FROM TABLE";
        }
        else
        {
			
          $room = $_POST['room_number'];
          $rn = mysqli_escape_string($con,$room);
          $_SESSION['room'] = $rn; 
		      $price = $_POST['price'];
		      $_SESSION['price'] = $price; 
		  
          header("location:booking_final.php");
        }
  }

  
    
}

else{

    header("Location: ../login.php");
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
      <form name='update' method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div class="container">
      <center>  <h2 style="color:black;">Select Class
                  
                  <select  name="class"><br><br>

                  <option value="Premium" >Premium</option>
                  <option value="Economy" >Economy</option>
                  <option value="Basic">Basic</option>

                  </select></h2><br>
      
      <center>  <h2 style="color:black;">Select Room Catagory
                  <select  name="category"><br><br>

                  <option value="Single"  >Single</option>
                  <option value="Double"  >Double</option>
                  <option value="Family" >Family</option>

                  </select></h2><br>

      <center>  <h2 style="color:black">Check in :<input type="date" name="cin" id="cin"               placeholder="please select a Room" value = "<?php echo $check_in; ?>" > <>||<> <style="color:black">Check out :<input type="date" name="cout" id="cout" placeholder="please select a Room" value = "<?php echo $check_out; ?>" ></h2></center><br>

                <div class="row">
                <input type="submit" name="btn_check" value="Check">

                  </div><br><br><br>
<!-- label is more suitable here -->
        <center><h2 style="color:white">Room No</h2><input type="text" name="room_number" id="fname" placeholder="please select a Room" readonly required><br><br></center>
     <input type="hidden" name="price" id="no">
	 
	 <!--ei hidden input e price load hosse-->
          <div class="row">
            <input type="submit" name="btn_next" value="Next">
          </div>
        <?php echo $error_message;?>
        </div>

      <center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for roomno or roomtag.." title="Type in a name"></center>

<center><table id="myTable">
<tr class="header">

<th style="color:black">Room No</th>

<th style="color:black">Price</th>



</tr>
<tbody>
<?php
if($avialable == 0)
{
  while($row = mysqli_fetch_assoc($first_result))
  {
    echo "<tr>";
    echo "<td>".$row["room_number"]."</td>";
    echo "<td>".$row["price"]."</td>";
    echo "</tr>";
  }
}
else
{
  $rn_booked = array_unique($rn_booked);

  $sql2 = "SELECT * FROM room_details WHERE class= '$class' AND category ='$category'";
    
    $result2 = mysqli_query($con , $sql2);
    
    $row = mysqli_num_rows($result2);

    if($row>0)
    {
      while($row = mysqli_fetch_assoc($result2))
      {
        array_push($room_available,$row['room_number']);
      }
      for($i=0;$i<count($rn_booked);$i++)
      {
        $index = array_search($rn_booked[$i],$room_available,true);
        unset($room_available[$index]);
      }
      $room_available = array_values ($room_available);
    
      $room_list=[];
      $sql3 = "select * from room_details where class='$class' AND category='$category'";
      $result3 = mysqli_query($con, $sql3);
      while($row = mysqli_fetch_assoc($result3) )
       {
            $room_list[$row['room_number']] = $row['price'];
       }

       foreach ($room_available as $key => $value) {
         if(array_key_exists($value,$room_list))
         {
          $room_number = $value;
          $price = $room_list[$value];
          echo "<tr>";
          echo "<td>".$room_number."</td>";
          echo "<td>".$price."</td>";
          echo "</tr>";
         }
       }
       $date1=date_create($check_in);
       $date2=date_create($check_out);
       $diff=date_diff($date1,$date2);
       $total_days = $diff->format("%a");
       
       // $total_cost = $total_days * $price ;
       // $payment = $total_cost/5;
			
      $_SESSION['pre_checkin'] = $check_in;
      $_SESSION['pre_checkout'] = $check_out;
	  
	 
	  

    }
    else
    {
        $error_message = "room not available";
    }

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

                        document.getElementById("fname").value = this.cells[0].innerHTML;
												document.getElementById("no").value = this.cells[1].innerHTML;

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
