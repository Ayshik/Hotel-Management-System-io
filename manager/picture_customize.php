<?php
session_start();
include "../database/db_connect.php";

$error_message = $class = $category = $room_number = $price = $sl = "";
if(isset($_SESSION['user_name']))
{


//write


		}


else{
    header("Location: ../login.php");
}
include('../rss/Dheader&navbarfor_manager.php');
?>

<style>


body{

}

.wrapper{
  position: absolute;
    top: 48%;
    left: 52%;
    transform: translate(-47%,-50%);
    max-width: 322px;
    width: 109%;
    background: #fff;
    padding: 26px;
    border-radius: 5px;

    flex: 23px;
}
.cpic{

	margin: 0;  /*this margin break the design */
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;



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
}

.wrapper .input_field input[type="text"],.input_field input[type="number"],
.wrapper textarea{
  border: 1px solid #e0e0e0;
  width: 100%;
  padding: 10px;
}

.wrapper textarea{
  resize: none;
  height: 80px;
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

<div class="cpic">
          <h2>Room Picturre Customize</h2>
            <div id="error_message" > <?php echo $error_message; ?> </div>
              <form id="myform" method="post" action="" >
                <div class="input_field">
            			<label for="Class">Select Class :</label>
                  <select  name="class"><br><br>

                    <option value="Premium" selected>Premium</option>
                    <option value="Economy" >Economy</option>
                    <option value="Basic">Basic</option>

                  </select>

            		</div>



								<div class="input_field">
                    <label for="pic">Picture :</label >
                    <input type="file" id="dur" name="location">

				</div>




                <div class="btn">
                    <input type="submit" name="insertreport" value="Done">
                </div>

							</div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>
  </body>
</html>

<script>
