<?php
session_start();
include "../database/db_connect.php";
include "../rss/header_for_receptionist..php";
$room = $error_message ="";
$info = [];
$fill = 0;

if(isset($_SESSION['user_name']))
{
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_fill']))
  {
    if(empty($_POST["room"]))
    {
    
    }
    else
    {
      $room=$_POST['room'];
      $room = mysqli_escape_string($con , $room);
      $sql = "select * from room_booking where room_number='$room' ";
      $result = mysqli_query($con,$sql);
      $info = mysqli_fetch_assoc($result);
      $fill = 1;

      $_SESSION['room'] = $_POST['room'];
      $_SESSION['total'] =$info['total_room_price'];
      $_SESSION['pay']=$info['payment'];
      $_SESSION['due']=$info['payment_due'];
    }
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit']))
  {
     //update for room_booking
    $new_payment = $_POST['new_payment'];
    $total = $_SESSION['total'];
    $pay = $_SESSION['pay'];
    $due = $_SESSION['due'];
    $room = $_SESSION['room'];

    unset($_SESSION['room']);
    unset($_SESSION['total']);
    unset($_SESSION['pay']);
    unset($_SESSION['due']);

    if(empty($_POST['new_payment']))
    {

    }
    else
    {
      $pay =$pay + $new_payment;
      $due = $total - $pay;
      $pay = mysqli_escape_string($con,$pay);
      $due = mysqli_real_escape_string($con, $due);

    }
     $check_out = $_POST['cout'];
     $check_out = mysqli_real_escape_string($con,$check_out);
     
     $sql = "update room_booking SET payment = '$pay' , payment_due = '$due' , check_out = '$check_out' where room_number = '$room' and status='New'";
     if(mysqli_query($con , $sql))
     {
        $error_message = "PAYMENT SUCCESSFUL";
     }
     else
     {
        echo "Error while updating in room value: " . $sql . "<br>" . mysqli_error($con);
     }

  }

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
    top: 51%;
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
  margin-bottom: -2px;
      line-height: 32px;
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
              <h2>PAYMENT && CHECKOUT UPDATE</h2>
              <div id="error_message"></div>
    <form name='update'  method="POST" action="">




    				<div class="input_field">


              <label for="Name">Room No:</label >

              <select  name="room"><br><br>

                <?php
                if($fill == 0)
                {    $sql = "select room_number from room_booking";
                      $result = mysqli_query($con,$sql);
                      while($row = mysqli_fetch_assoc($result))
                      {
                        $Broomnumbers=$row['room_number'];
                        echo "<option value='$Broomnumbers'>$Broomnumbers</option>";
                      }
                }
                else
                {
                  echo "<option>$room</option>";
                }
                ?>
              </select><br>

            <div class="btn">
              <tr>
                <td colspan=2><input type="submit" name="btn_fill" value="fill the table" id='btn_submit'></td>
              </tr>
            </div>

    				<label for="Name">Name:</label >
              <td><input type="text" name="name" placeholder='NAME' value="<?php if($fill == 1){echo $info['user_name'];}?>"></td>

           <tr>
              <td><p>Check in</p></td>
            </tr>
           <tr>
             <td>
               <input type="text" placeholder='Check in time'value="<?php if($fill == 1) {echo $info["check_in"]; }?>" name="cin"></td>
            </tr>

            <tr>
               <td><p>Check out</p></td>
             </tr>
            <tr>
              <td>
                <input type="text" placeholder='Check out time'value="<?php if($fill == 1) {echo $info["check_out"]; } ?>" name="cout"></td>
             </tr>
             <tr>
                  <td><p>Total Cost</p></td>
                </tr>
               <tr>
                 <td><input type="number" name="tc" id="tk" value="<?php if($fill == 1){echo $info["total_room_price"]; } ?>"></td>
                </tr>


                <tr>
                     <td><p>Payment Done</p></td>
                   </tr>
                  <tr>
                    <td><input type="number" name="payment" value="<?php if($fill == 1) {echo $info["payment"]; }?>"></td>
                   </tr>





                <tr>
                  <td><p>Payment Due</p></td>
                </tr>
                <tr>
                  <td><input type='text' value = "<?php if($fill == 1){echo $info["payment_due"];} ?>"> </td>
                </tr>

                <tr>
                     <td><p>New Payment</p></td>
                   </tr>
                  <tr>
                    <td><input type="number" name="new_payment" id="tk" value=""></td>
                   </tr>




        <div class="btn">
           <tr>
             <td colspan=2><input type="submit" name="btn_submit" value="update" id='btn_submit'></td>
           </tr>
        </div>

    	</div>


    </form>
      </div>
    </div>
  </div>
</section>
</body>
<script>
//ajax for the option
</script>
</html>
