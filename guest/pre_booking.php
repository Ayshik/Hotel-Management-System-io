<?php
session_start();
include "../database/db_connect.php";

$class = $category = $check_in = $check_out = "";

if(isset($_SESSION['user_name']))
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
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

    $sql = "SELECT * FROM room_details WHERE book_check_in not BETWEEN '$check_in' and '$check_out' AND book_check_out not BETWEEN '$check_in' and '$check_out' AND pre_check_in not BETWEEN '$check_in' and '$check_out' AND pre_check_out NOT BETWEEN '$check_in' and '$check_out' AND class = '$class' AND category = '$category' ";

    $result = mysqli_query($con , $sql);
    
    $row = mysqli_num_rows($result);
    
    if($row>0)
    {
      header ("location:pre_booking_final.php");
    }
    else 
    {
      echo "ROOM NOT AVAILABLE";
    }
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
          <div id="error_message"></div>
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
    <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_submit" value="Check" id='btn_submit'></td>
       </tr>
    </div>
       
	</div>

  
</form>
</body>
<script src="../js/update_user.js"></script>
</html>
