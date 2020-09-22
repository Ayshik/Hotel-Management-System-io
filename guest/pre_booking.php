<?php
session_start();
include "../database/db_connect.php";

$class = $category = $check_in = $check_out = $total_cost =  $price = $error_message = $payment = "";
$rn_booked = $room_available = [];
$available = 0;

if(isset($_SESSION['user_name']))
{
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

    if(empty($_POST['checkin']))
    {

    }
    else
    {
        $check_in = $_POST['checkin'];
    }

    if(empty($_POST['checkout']))
    {
      
    }
    else
    {
        $check_out = $_POST['checkout'];
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
    }

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

    if(count($room_available)>0)
      {
      $available = 1;
      $sql3 = "select price from room_details where room_number = '$room_available[0]' ";
      $result3 = mysqli_query($con, $sql3);
      while($row = mysqli_fetch_assoc($result3) )
      {
         $price = $row['price'];
      }
      $date1=date_create($check_in);
      $date2=date_create($check_out);
      $diff=date_diff($date1,$date2);
      $total_days = $diff->format("%a");
      
      $total_cost = $total_days * $price ;
      $payment = $total_cost/5;

      $_SESSION['room'] = $room_available[0];
      $_SESSION['payment'] = $payment;
      $_SESSION['total_cost'] = $total_cost;
      $_SESSION['pre_checkin'] = $check_in;
      $_SESSION['pre_checkout'] = $check_out;
    }
    else 
    {
      $error_message = "room not available ";
    }

    }
    else
    {
        $error_message = "room not available";
    }
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_book']))
  {
    //must unset this values
    $room = $_SESSION['room'] ;
    $payment = $_SESSION['payment'] ;
    $total_cost = $_SESSION['total_cost'];
    $payment_due = $total_cost - $payment ;
    $pre_check_in = $_SESSION['pre_checkin'] ;
    $pre_check_out = $_SESSION['pre_checkout'] ;


    $uname = $_SESSION['user_name'];

    $sql = "insert into pre_booking(user_name , room_number , payment , Totalcost , Payment_due , check_in , check_out , pre_check_in , pre_check_out , status) values('$uname' , '$room' ,'$payment' , '$total_cost' , '$payment_due' , 'N' , 'N' , '$pre_check_in','$pre_check_out', 'New') ";

    if(mysqli_query($con,$sql))
    {
      $error_message = "BOOKING CONFIRMED";
    }
    else
    {
      echo "log in table Error: " . $sql. "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
    unset($_SESSION['room'] );
    unset($_SESSION['payment'] );
    unset($_SESSION['total_cost'] );
    unset($_SESSION['pre_checkin'] );
    unset($_SESSION['pre_checkout'] );

  }

}
else
{
    header("Location: ../login.php");
}


include "../rss/Dheader&navbarfor_user.php";
?>

<style>
*{
  margin: 0px;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: 'Josefin Sans', sans-serif;
      font-weight: bold;
}

body{

}

.wrapper{
  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    max-width: 350px;
    width: 100%;
    background: #fff;
    padding: 25px;
    border-radius: 5px;

}

.wrapper h2{
  text-align: center;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: #332902;
}

.wrapper .input_field{
  margin-bottom: 36px;
    line-height: 53px;
}

.wrapper .input_field input[type="text"],
.wrapper textarea{
  border: 1px solid #e0e0e0;
  width: 100%;
  padding: 10px;
}

.wrapper textarea{
  resize: none;
  height: 64px;
}

.wrapper .btn input[type="submit"]{
  border: 0px;
  margin-top: 15px;
  padding: 10px;
  text-align: center;
  width: 100%;
  background: #fece0c;
  color: #332902;
  text-transform: uppercase;
  letter-spacing: 5px;
  font-weight: bold;
  border-radius: 25px;
  cursor: pointer;
}

#error_message{
  margin-bottom: 20px;
  background: #fe8b8e;
  padding: 0px;
  text-align: center;
  font-size: 14px;
  transition: all 0.5s ease;
}




</style>
<section>
  <div class="main-section">
    <div class="dashbord">
      <div class="icon-section">

        <div class="wrapper">
          <h2>Update Profile</h2>
          <div id="error_message"><?php echo $error_message; ?></div>
<form name='update' method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">

                 <div class="input_field">
            			<label for="Class">Select Class :</label>
                  <select  name="class"><br><br>

                    <option value="Premium" selected>Premium</option>
                    <option value="Economy" >Economy</option>
                    <option value="Basic">Basic</option>

                  </select>

            		</div>
				

				<div class="input_field">
            			<label for="Class">Select Catagory :</label>
                  <select  name="category"><br><br>

                    <option value="Single" selected>Single</option>
                    <option value="Double" >Double</option>
                    <option value="Family">Family</option>

                  </select>

            		</div>
					
					<div class="input_field">
                    <label for="checkin">Checkin :</label >
                    <input type="date" id="in" name="checkin">

				</div>
				
				<div class="input_field">
                    <label for="checkin">Checkout :</label >
                    <input type="date" id="out" name="checkout">

				</div>
    <?php if ($available == 0) {?>

    <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_check" value="Check" id='btn_submit'></td>
       </tr>
    </div>
    <?php } ?>

    <?php if ($available == 1) {?>
      
      <tr>
          <td><p>TOTAL COST</p></td>
        </tr>
       <tr>
         <td><label> <?php echo $total_cost; ?> </label> </td>
    </tr>

    <tr>
          <td><p>Payment</p></td>
        </tr>
       <tr>
         <td><label><?php echo $payment; ?></label></td>
    </tr>

      <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_book" value="Book" id='btn_submit'></td>
       </tr>
      </div>
    <?php } ?>
       
	</div>

  
</form>
</body>
</html>
