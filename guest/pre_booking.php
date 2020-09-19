<?php
session_start();


if(isset($_SESSION['user_name']))
{
    $user_name = $_SESSION['user_name'];
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
<form name='update' method="POST" action="pre_booking_final.php">

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
                  <select  name="class"><br><br>

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
