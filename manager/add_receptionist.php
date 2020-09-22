<?php
session_start();
include "../database/db_connect.php";

$uname = $pass = $con_pass = "";
$uname_err = $pass_err = $con_pass_err = "";
$flag = 0;

if(isset($_SESSION['user_name']))
{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
        if(empty($_POST['uname']))
	    {
	    	$uname_err="user name can not be empty";
	    	$flag=1;
	    }
	    else{
            $uname=validate($_POST['uname']);
            $uname = strtoupper($uname);

            $name=mysqli_real_escape_string($con,$uname);
            $sql="select * from login where user_name='$uname'";
            $result=mysqli_query($con,$sql);
            $row = mysqli_num_rows($result);

            if($row>0)
            {
              $uname_err = "USERNAME ALREADY EXISTS";
            }
	    }
	    if(empty($_POST['pass']))
	    {
	    	$pass_err="Password can not be empty";
	    	$flag=1;
	    }
	    else{
	    	$pass=$_POST['pass'];
        }
        if(empty($_POST['con_pass']))
        {
            $con_pass_err="CONFIRM PASSWORD CAN NOT BE EMPTY";
            $flag=1;
        }else{
          $con_pass=$_POST['con_pass'];
        }

        if($pass != $con_pass)
        {
          $pass_err="PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
          $flag=1;
        }

        if(isset($_POST["btn_manager"]))
        {
            add_by_owner();
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

function add_by_owner()
{
    global $uname , $pass , $flag , $con;
    if($flag == 0)
        {
        $uname=mysqli_real_escape_string($con,$uname);
        $pass=mysqli_real_escape_string($con,$pass);

        $hash_pass=password_hash($pass,PASSWORD_DEFAULT);

        $sql1="insert into login(user_name,password,user_type) values('$uname','$hash_pass',2)";
        if(mysqli_query($con,$sql1)){
        }
        else{
          echo "log in table Error: " . $sql1. "<br>" . mysqli_error($con);
        }
      mysqli_close($con);
    }
}

include('../rss/Dheader&navbarfor_manager.php');
?>


<style>
*{
  margin: 0px;
  color: black;
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
    max-width: 250px;
    width: 100%;
    background: #fff;
    padding: 24px;
    border-radius: 11px;

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
      line-height: 27px;
      text-align: center;
  }
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
      

        <div class="wrapper">
          <h2>Add Receptionist</h2>
<!-- reuse the add_by_owner.js file with form name  -->
<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" name="add_by_owner">


 <div class="input_field">
    <table>
        <tr>
            <td><p>USERNAME</p></td>
        </tr>
        <tr>
            <td><input type="text" name="uname" id = "uname"></td>
        </tr>

        <tr>
            <td id = "uname_err"> <?php echo $uname_err ; ?> </td>
        </tr>

        <tr>
            <td><p>PASSWORD</p></td>
        </tr>
        <tr>
            <td><input type="password" name="pass"></td>
        </tr>

        <tr>
            <td> <?php echo $pass_err ; ?> </td>
        </tr>

        <tr>
            <td><p>CONFIRM PASSWORD</p></td>
        </tr>
        <tr>
            <td><input type="password" name="con_pass"></td>
        </tr>

        <tr>
            <td> <?php echo $con_pass_err ; ?> </td>
        </tr>


    </table>



  </div>

<div class="btn">

  <tr>
      <td><input type="submit" name="btn_manager"></td>
  </tr>


</div>

</form>
</div>
</div>
</div>

</section>
</body>
<script src="../js/add_by_owner.js"></script>
</html>
