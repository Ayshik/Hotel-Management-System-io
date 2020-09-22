<?php
session_start();
include "../database/db_connect.php";

$error_message = $old_pass_db = $pass = $conf_pass =  $old_pass ="";
if(isset($_SESSION['user_name']))
{
  $user_name = $_SESSION['user_name'];
  $sql = "select * from login where  user_name='$user_name'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
      $old_pass_db= $row['password'];
    }
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST["btn_submit"]))
    {
      if(empty($_POST['pass']))
        {
          $error_message = "PASSWORD CAN NOT BE EMPTY";
        }
        else{
          $pass = $_POST['pass'];
        }
        if(empty($_POST['con_pass']))
        {
          $error_message = "CONFIRM PASSWORD CAN NOT BE EMPTY";
        }else{
          $conf_pass = $_POST['con_pass'];
        }
        if(empty($_POST['old_pass']))
        {
          $error_message = "OLD PASSWORD CAN NOT BE EMPTY";
        }else{
            $old_pass=$_POST['old_pass'];
        }

        if($pass != $conf_pass)
        {
          $error_message="PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
        }
        else
        {
          if(!password_verify($old_pass,$old_pass_db))
          {
              $error_message="PASSWORD DOES NOT MATCH";
          }
          else
          {        
            if(!password_verify($pass,$old_pass_db))
            {              
                $uname = $_SESSION['user_name'];
                $pass=mysqli_real_escape_string($con,$pass);                               
                $uname=mysqli_real_escape_string($con,$uname);                  
                $hash_pass=password_hash($pass,PASSWORD_DEFAULT);                                  

                $sql="update login  set password = '$hash_pass'  where user_name = '$uname' ";

                if(mysqli_query($con,$sql))
                {
                   $error_message = "Password changeed";       
                }
                else 
                {
                  echo "Error updating record: " . mysqli_error($con);
                }
          }
          else
          {
            $error_message = "OLD AND NEW PASSWORD CAN NOT BE SAME";
          }
        }
       }
    }
  }

}
else{
    header("Location: ../login.php");
}
include "../rss/header_for_receptionist..php";
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
  margin-bottom: -7px;
  line-height: 24px;
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
          <h2>Change Password</h2>
          <div id="error_message"> <?php echo $error_message; ?> </div>
<form name='update' method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">


         <div class="input_field">

<tr>
          <td><p>OLD PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="old_pass" id="old_pass" placeholder='OLD PASSWORD'></td>
        </tr>
       
          <td><p>NEW PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="pass" id="pass" placeholder='NEW PASSWORD'></td>
        </tr>
       

        <tr>
          <td><p>CONFIRM NEW PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="con_pass" id="con_pass" placeholder='CONFIRM NEW PASSWORD'></td>
        </tr>
        

</div>

  <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_submit" value="Change" id='btn_submit'></td>
       </tr>
    </div>
</form>
</div>
</div>
</div>
</div>
</section>
</body>
<script src ="../js/update_user.js"> </script>
</html>
