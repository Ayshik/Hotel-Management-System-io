<?php
session_start();
include "../database/db_connect.php";

$error_message = $class = "";

if(isset($_SESSION['user_name']))
{
  if($_SERVER['REQUEST_METHOD']== "POST")
{
    
    $class = $_POST['class'];

    $file_name = $_FILES['room_image'] ['name'];
    $file_tmp_name = $_FILES['room_image'] ['tmp_name'];
    $file_err = $_FILES['room_image'] ['error'];
    $file_size = $_FILES['room_image'] ['size'];
   
    $file_name_ex = explode('.',$file_name);
    $file_ext = $file_name_ex[1];
    $file_ext=strtolower($file_ext);
    if($file_err == 0)
    {
      if($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png' )
      {
              if($file_size < 3000000) //3000000 ->3 mb
              {
                  $file_name_real = $class .'.'."jpg";
                  $loc = '../css/image/'.$file_name_real;
                  move_uploaded_file($file_tmp_name , $loc);
              }
              else
              {
                 $error_message = "file size large";
              }
      }
      else
      {
        $error_message = "file is not a image type";
      }
    }
    else
    {
      $error_message = "image  upload system is down!";
    }
    

}
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
              <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype ="multipart/form-data">
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
                    <input type="file" id="dur" name="room_image">

				        </div>




                <div class="btn">
                    <input type="submit" name="room_submit" value="Done">
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
