<?php


include "../rss/header_for_receptionist..php";
session_start();

if(isset($_SESSION['user_name']))
{



}
else{

    header("Location: ../login.php");
}






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
    top: 57%;
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
  margin-bottom: 10px;
    line-height: 36px;
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
              <h2>Booking</h2>
              <div id="error_message"></div>
    <form name='update'  method="POST" action="">




    				<div class="input_field">


              <label for="Name">Room No:</label >
                <td><input type="text" name="roomno" placeholder='' value="<?php echo $_SESSION["roomno"];?>"></td>



    				<label for="Name">Name:</label >
              <td><input type="text" name="name" placeholder='NAME' value=""></td>







            <tr>
              <td><p>Room Price</p></td>
            </tr>
            <tr>
              <td><input type="email" name="roomp" placeholder='Room price' value="<?php echo $_SESSION["price"];?>"></td>
            </tr>






            <tr>
              <td><p>NATIONAL ID NUMBER:</p></td>
            </tr>
            <tr>
             <td><input type="number" name="nid" placeholder='NATIONAL ID NUMBER' value="" readonly></td>
            </tr>


           <tr>
              <td><p>PHONE NUMBER</p></td>
            </tr>
           <tr>
             <td><input type="number" name="phone" placeholder='PHONE NUMBER' value=""></td>
            </tr>


           <tr>
              <td><p>Check in</p></td>
            </tr>
           <tr>
             <td>
               <input type="text" placeholder='Check in time'value="<?php echo $_SESSION["cin"];?>" name="cin"></td>
            </tr>

            <tr>
               <td><p>Check out</p></td>
             </tr>
            <tr>
              <td>
                <input type="text" placeholder='Check out time'value="<?php echo $_SESSION["cout"];?>" name="cout"></td>
             </tr>
             <tr>
                  <td><p>Total Cost</p></td>
                </tr>
               <tr>
                 <td><input type="number" name="tc" id="tk" value="Room price * (cout-cin)"></td>
                </tr>

    		 <tr>
              <td><p>Payment</p></td>
            </tr>
           <tr>
             <td><input type="number" name="payment" id="tk" value=""></td>
            </tr>


        <div class="btn">
           <tr>
             <td colspan=2><input type="submit" name="btn_submit" value="Book" id='btn_submit'></td>
           </tr>
        </div>

    	</div>


    </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>