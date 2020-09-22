<?php
session_start();
include "../database/db_connect.php";

$name = $email = $uname = $pass = $conf_pass = $phone = $nid = $address = $old_pass_db = $old_pass =  $uname_db = $hash_pass = "";

$name_err = $email_err = $pass_err = $uname_err = $nid_err= $phn_err = $add_err = $conf_pass_err = $geder_err = $old_pass_err = "";

if(isset($_SESSION['user_name']))
{
    $user_name = $_SESSION['user_name'];
    //populate textfield from db value
    $sql = "select * from user where user_name='$user_name'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $name  = $row['name'];
        $email = $row['email'];
        $nid = $row['national_id'];
        $phone = $row['phone'];
        $address = $row['address'];
        $old_pass_db= $row['password'];
    }

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["btn_submit"]))
    {
        if(empty($_POST['name']))
        {
            $name_err="NAME CAN NOT BE EMPTY";
        }else
        {
          $name=validate($_POST['name']);
        }
        if(empty($_POST['Email']))
        {
            $email_err="EMAIL CAN NOT BE EMPTY";
        }else{
          $email=validate($_POST['Email']);
        }
        // if(empty($_POST['uname']))
        // {
        //     $uname_err = "USERNAME CAN NOT BE EMPTY";
        // }else{
        //   $uname=validate($_POST['uname']);
        //   $uname = strtoupper($uname);


          // $name=mysqli_real_escape_string($con,$uname);
          // $sql="select * from login where user_name='$uname'";
          // $result=mysqli_query($con,$sql);
          // $row = mysqli_num_rows($result);

          // if($row>0)
          // {
          //   $uname_err = "USERNAME ALREADY EXISTS";
          // }
        // }
        if(empty($_POST['pass']))
        {
            $pass_err="PASSWORD CAN NOT BE EMPTY";
        }
        else{
          $pass=$_POST['pass'];
        }
        if(empty($_POST['con_pass']))
        {
            $conf_pass_err="CONFIRM PASSWORD CAN NOT BE EMPTY";
        }else{
          $conf_pass=$_POST['con_pass'];
        }
        if(empty($_POST['phone']))
        {
          $phn_err="PHONE NUMBER CAN NOT BE EMPTY";
        }else{
          $phone=validate($_POST['phone']);
        }
        if(empty($_POST['address']))
        {
          $add_err="ADDRESS CAN NOT BE EMPTY";
        }else{
          $address=validate($_POST['address']);
        }
        if(empty($_POST['old_pass']))
        {
            $old_pass_err="OLD PASSWORD CAN NOT BE EMPTY";
        }else{
            $old_pass=$_POST['old_pass'];
        }

        if($pass != $conf_pass)
        {
          $pass_err="PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
        }

        if(!password_verify($old_pass,$old_pass_db))
        {
            $old_pass_err="PASSWORD DOES NOT MATCH";
        }
        else
        {
        
            if(!password_verify($pass,$old_pass_db))
            {
               
                $name=mysqli_real_escape_string($con,$name);
                $pass=mysqli_real_escape_string($con,$pass);
                $email=mysqli_real_escape_string($con,$email);
                $uname = $_SESSION['user_name'];
                $uname=mysqli_real_escape_string($con,$uname);
                $nid=mysqli_real_escape_string($con,$nid);
                $phone=mysqli_real_escape_string($con,$phone);
                $address=mysqli_real_escape_string($con,$address);

                $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
                   
               

                $sql="update user set name='$name' ,  email = '$email' , password = '$hash_pass' , phone = '$phone' , address = '$address' where user_name = '$uname' ";

                if(mysqli_query($con,$sql))
                {

                }
                else {
                    echo "Error updating record: " . mysqli_error($con);
                  }

                //update login table
               update_login();
            }
            else
            {
                $pass_err="OLD AND NEW PASSWORD CAN NOT BE SAME";
            }
        
      }

    }
}
}
else
{
    header("Location: ../login.php");
}

function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function update_login()
{
    global  $hash_pass , $con;

    $uname = $_SESSION['user_name'];
    $uname=mysqli_real_escape_string($con,$uname);

    $sql = "update login set  password = '$hash_pass' where user_name = '$uname' ";
        if(mysqli_query($con,$sql))
        {

        }
        else
        {
           echo "Error updating record of login table: " . mysqli_error($con);
        }

    mysqli_close($con);
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
          <h2>Update Profile</h2>
          <div id="error_message"></div>
<form name='update' method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">


         <div class="input_field">
      	<label for="Name">Name:</label >
          <td><input type="text" name="name" placeholder='NAME' value="<?php echo $name;?>"></td>





               <tr>
          <td id="name_err"><?php echo $name_err;?></td>
        </tr>

        <tr>
          <td><p>EMAIL</p></td>
        </tr>
        <tr>
          <td><input type="email" name="Email" placeholder='EMAIL' value="<?php echo $email;?>"></td>
        </tr>
        <tr>
          <td id="email_err"><?php echo $email_err;?></td>
        </tr>

        <tr>
          <td><p>USERNAME</p></td>
        </tr>
        <tr>
              <td><input type="text" name="uname" id="uname" placeholder='USERNAME' value="<?php echo $_SESSION['user_name'];?>"readonly></td>
        </tr>
        <tr>
              <td id="uname_err"><?php echo $uname_err;?></td>
        </tr>

        <tr>
          <td><p>OLD PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="old_pass" id="old_pass" placeholder='OLD PASSWORD'></td>
        </tr>
        <tr>
              <td id="old_pass_err"><?php echo  $old_pass_err;?></td>

        <tr>
          <td><p>NEW PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="pass" id="pass" placeholder='NEW PASSWORD'></td>
        </tr>
        <tr>
              <td id="pass_err"><?php echo  $pass_err;?></td>
        </tr>

        <tr>
          <td><p>CONFIRM NEW PASSWORD</p></td>
        </tr>
        <tr>
              <td><input type="Password" name="con_pass" id="con_pass" placeholder='CONFIRM NEW PASSWORD'></td>
        </tr>
        <tr>
              <td id="conf_pass_err"><?php echo  $conf_pass_err;?></td>
        </tr>

        <tr>
          <td><p>NATIONAL ID NUMBER:</p></td>
        </tr>
        <tr>
         <td><input type="number" name="nid" placeholder='NATIONAL ID NUMBER' value="<?php echo $nid;?>" readonly></td>
        </tr>
        <tr>
         <td id="nid_err"><?php echo  $nid_err;?></td>
       </tr>

       <tr>
          <td><p>PHONE NUMBER</p></td>
        </tr>
       <tr>
         <td><input type="number" name="phone" placeholder='PHONE NUMBER' value="<?php echo $phone ; ?>"></td>
        </tr>
        <tr>
         <td id="phn_err"><?php echo  $phn_err;?></td>
       </tr>

       <tr>
          <td><p>ADDRESS</p></td>
        </tr>
       <tr>
         <td>
           <textarea placeholder='ADDRESS' name="address"><?php echo $address;?></textarea></td>
        </tr>
        <tr>
         <td id="add_err"><?php echo  $add_err;?></td>
       </tr>
	</div>

  <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_submit" value="UPDATE" id='btn_submit'></td>
       </tr>
    </div>
</form>
</div>
</div>
</div>
</div>
</section>
</body>
<script src="../js/update_user.js"></script>
</html>
