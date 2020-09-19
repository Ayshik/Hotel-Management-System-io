<?php
include "../database/db_connect.php";
$name=$email=$uname=$pass=$conf_pass=$phone=$nid=$address="";
$name_err=$email_err=$pass_err=$uname_err=$nid_err=$phn_err=$add_err=$conf_pass_err=$geder_err="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submit']))
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
    if(empty($_POST['uname']))
    {
        $uname_err="USERNAME CAN NOT BE EMPTY";
    }else{
      $uname=validate($_POST['uname']);
      $uname = strtoupper($uname); 
    }
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
    if(empty($_POST['nid']))
    {
      $nid_err="NATIONAL ID NUMBER CAN NOT BE EMPTY";
    }else{
      $nid=validate($_POST['nid']);
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
    if($pass != $conf_pass)
    {
      $pass_err="PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
    }
    add_guest();
  }
  
} 
  
function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function add_guest()
{
  global $name,$email,$uname,$pass,$nid,$phone,$address,$con;
  
  $name=mysqli_real_escape_string($con,$name);
  $pass=mysqli_real_escape_string($con,$pass);
  $email=mysqli_real_escape_string($con,$email);
  $uname=mysqli_real_escape_string($con,$uname);
  $nid=mysqli_real_escape_string($con,$nid);
  $phone=mysqli_real_escape_string($con,$phone);
  $address=mysqli_real_escape_string($con,$address);

  $hash_pass=password_hash($pass,PASSWORD_DEFAULT);

  $sql="insert into user(name,email,user_name,password,national_id,phone,address) values('$name','$email','$uname','$hash_pass','$nid','$phone','$address')";

  if (mysqli_query($con, $sql)) {
  } else {
    echo "user table Error: " . $sql . "<br>" . mysqli_error($con);
  }
  // adding in login table 
  $sql1="insert into login(user_name,password,user_type) values('$uname','$hash_pass',1)";
  if(mysqli_query($con,$sql1)){
  }
  else{
    echo "log in table Error: " . $sql1. "<br>" . mysqli_error($con);
  }
mysqli_close($con);

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" href="../css/registration.css">
</head>
<body>
  <!-- header -->
<div class="menu">
        <div class="leftmenu">
          <h3><a href="index.php">

            <div class="logo">
                 <img src= "../css/image/LOGO.png" class="img" style="width: 100%; padding-top: 10px; height: 110px">
                </div>

          </a></h3>
        </div>
        <div class="rightmenu">
          <ul>
            <li><a href="../index.php">HOME</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Nuru massage</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li> <a href="contact.html">Contact</a> </li>
            <li> <a href="../login.php">LOGIN</a></li>
          </ul>
        </div>
      </div>
<!-- header -->
<!-- error must be in red -->
<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" name="registration">
<div class='full_form'>
      <h4>REGISTRATION</h2>
      <table class='table_reg'>
        <tr>
          <td><input type="text" name="name" placeholder='NAME' value="<?php echo $name;?>"></td>
        </tr>
        <tr>
          <td id="name_err"><?php echo $name_err;?></td>
        </tr>

        <tr>
          <td><input type="email" name="Email" placeholder='EMAIL' value="<?php echo $email;?>"></td>
        </tr>

        <tr>
          <td id="email_err"><?php echo $email_err;?></td>
        </tr>
            
        <tr>
              <td><input type="text" name="uname" id="uname" placeholder='USERNAME' value="<?php echo $uname;?>"></td>
        </tr>
        <tr>
              <td id="uname_err"><?php echo $uname_err;?></td>
        </tr>
            
        <tr>
              <td><input type="Password" name="pass" id="pass" placeholder='PASSWORD'></td>
        </tr>
        <tr>
              <td id="pass_err"><?php echo  $pass_err;?></td>
        </tr>
            
        <tr>          
              <td><input type="Password" name="con_pass" id="con_pass" placeholder='CONFIRM PASSWORD'></td>
        </tr>
        <tr>
              <td id="conf_pass_err"><?php echo  $conf_pass_err;?></td>
        </tr>
       <tr>
         <td><input type="number" name="nid" placeholder='NATIONAL ID NUMBER' value="<?php echo $nid;?>"></td>
        </tr>
        <tr>
         <td id="nid_err"><?php echo  $nid_err;?></td>
       </tr>

       <tr>
         <td><input type="number" name="phone" placeholder='PHONE NUMBER' value="<?php echo $phone;?>"></td>
        </tr>
        <tr>
         <td id="phn_err"><?php echo  $phn_err;?></td>    
       </tr> 

       <tr> 
         <td>
           <textarea placeholder='ADDRESS' name="address" value="<?php echo $address;?>" ></textarea></td>
        </tr>
        <tr>
         <td id="add_err"><?php echo  $add_err;?></td>
       </tr> 

       <tr>
         <td colspan=2><input type="submit" name="submit" value="REGISTER" id='btn'></td>
       </tr>           
   </table>   
</div>
   </form>
   
</body>
<script src="../js/registration_validation.js"></script>
</html>