<?php
session_start();
include "../database/db_connect.php";

$error_message1 = $error_message2 = $error_message3 ="";

if(isset($_SESSION['user_name']))
{
  if($_SERVER['REQUEST_METHOD']== "POST")
{

  if(isset($_POST['room_submit']))  
  {
    $class1 = $_POST['class_room'];

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
                  $file_name_real = $class1 .'.'."jpg";
                  $loc = '../css/image/'.$file_name_real;
                  move_uploaded_file($file_tmp_name , $loc);
                  
              }
              else
              {
                 $error_message1 = "file size large";
              }
      }
      else
      {
        $error_message1 = "file is not a image type";
      }
    }
    else
    {
      $error_message1 = "image  upload system is down!";
    }
  }

// if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['dashboard_submit']))
// {
  if(isset($_POST['dashboard_submit']))
  {
    $class2 = $_POST['class_dashboard'];

    $file_name = $_FILES['all_user_image'] ['name'];
    $file_tmp_name = $_FILES['all_user_image'] ['tmp_name'];
    $file_err = $_FILES['all_user_image'] ['error'];
    $file_size = $_FILES['all_user_image'] ['size'];

    $file_name_ex = explode('.',$file_name);
    $file_ext = $file_name_ex[1];
    $file_ext=strtolower($file_ext);
    if($file_err == 0)
    {
      if($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png' )
      {
              if($file_size < 3000000) //3000000 ->3 mb
              {
                  $file_name_real = $class2 .'.'."jpg";
                  $loc = '../css/image/'.$file_name_real;
                  move_uploaded_file($file_tmp_name , $loc);
                  
              }
              else
              {
                 $error_message2 = "file size large";
              }
      }
      else
      {
        $error_message2 = "file is not a image type";
      }
    }
    else
    {
      $error_message2 = "image  upload system is down!";
    }
  }

// if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['galary_submit']))
// {
    
  if(isset($_POST['galary_submit']))
  {
    $class = $_POST['class'];

    $file_name = $_FILES['galary_image'] ['name'];
    $file_tmp_name = $_FILES['galary_image'] ['tmp_name'];
    $file_err = $_FILES['galary_image'] ['error'];
    $file_size = $_FILES['galary_image'] ['size'];

    $file_name_ex = explode('.',$file_name);
    $file_ext = $file_name_ex[1];
    $file_ext=strtolower($file_ext);
    if($file_err == 0)
    {
      if($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png' )
      {
              if($file_size < 3000000) //3000000 ->3 mb
              {
                  $file_name_real = 'galary'.$class .'.'."jpg";
                  $loc = '../css/image/'.$file_name_real;
                  move_uploaded_file($file_tmp_name , $loc);
                
              }
              else
              {
                 $error_message3 = "file size large";
              }
      }
      else
      {
        $error_message3 = "file is not a image type";
      }
    }
    else
    {
      $error_message3 = "image  upload system is down!";
    }


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
  left: 58%;
    transform: translate(-47%,-50%);
    max-width: 243px;
    width: 109%;
    background: #fff;
    padding: 26px;
    border-radius: 5px;

    flex: 23px;
}
.cpic{

	margin: 0; 
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

/*2nd////////////////////////////////////////////////////////////////////////////////*/

.wrapper2{
  position: absolute;
  top: 49%;
  left: 160%;
      transform: translate(-47%,-50%);
      max-width: 244px;
      width: 109%;
      background: #fff;
      padding: 26px;
      border-radius: 5px;
      flex: 23px;
}
.cpic{

	margin: 0;  
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;



}
.wrapper2 h2{
  text-align: center;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: #332902;
}

.wrapper2 .input_field{
  margin-bottom: 10px;
}

.wrapper2 .input_field input[type="text"],.input_field input[type="number"],
.wrapper2 textarea{
  border: 1px solid #e0e0e0;
  width: 100%;
  padding: 10px;
}

.wrapper2 textarea{
  resize: none;
  height: 80px;
}

.wrapper2 .btn input[type="submit"]{
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


.wrapper3{
  position: absolute;
    top: 51%;
    /* left: 160%; */
    right: 175%;
    transform: translate(-47%,-50%);
    max-width: 244px;
    width: 109%;
    background: #fff;
    padding: 36px;
    border-radius: 5px;
    flex: 23px;
}
.cpic{

	margin: 0;  
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;



}
.wrapper3 h2{
  text-align: center;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: #332902;
}

.wrapper3 .input_field{
  margin-bottom: 10px;
}

.wrapper3 .input_field input[type="text"],.input_field input[type="number"],
.wrapper3 textarea{
  border: 1px solid #e0e0e0;
  width: 100%;
  padding: 10px;
}

.wrapper3 textarea{
  resize: none;
  height: 80px;
}

.wrapper3 .btn input[type="submit"]{
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

</style>


<section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">



<!--wrapper1------------------------------------------------------------------>

            <div class="wrapper">

  <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype ="multipart/form-data">
  
<div class="cpic">
          <h2>Room Picture Customize</h2>
            <div id="error_message" > <?php echo $error_message1; ?> </div>


                <div class="input_field">
            			<label for="Class">Select Class :</label>
                  <select  name="class_room"><br><br>

                    <option value="Premium">Premium</option>
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



<!--wrapper2------------------------------------------------------------------>




              <div class="wrapper2">

              <div class="cpic">
              <h2>Dashboard Picture Customize</h2>
              <div id="error_message" > <?php echo $error_message2; ?> </div>


                  <div class="input_field">
                    <label for="Class">Select Dashboard :</label>
                    <select  name="class_dashboard"><br><br>

                      <option value="Owner" selected>Owner</option>
                      <option value="Manager" >Manager</option>
                      <option value="Receptionist">Receptionist</option>

                      <option value="User">User</option>

                    </select>

                  </div>



                  <div class="input_field">

                      <label for="pic">Picture :</label >
                      <input type="file" id="dur" name="all_user_image">

                  </div>




                  <div class="btn">
                      <input type="submit" name="dashboard_submit" value="Done">
                  </div>

                </div>



<!--wrapper3------------------------------------------------------------------>


                <div class="wrapper3">

                <div class="cpic">
                <h2>Galary Picture Customize</h2>
                <div id="error_message" > <?php echo $error_message3; ?> </div>


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
                        <input type="file" id="dur" name="galary_image">

                    </div>




                    <div class="btn">
                        <input type="submit" name="galary_submit" value="Done">
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
