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
        $uname = $row['user_name'];  
        $nid = $row['national_id'];
        $phone = $row['phone']; 
        $address = $row['address']; 
        $old_pass_db= $row['password'];
    }
    $uname_db = $uname;

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
        if(empty($_POST['uname']))
        {
            $uname_err="USERNAME CAN NOT BE EMPTY";
        }else{
          $uname=validate($_POST['uname']);
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
                //update query
                $name=mysqli_real_escape_string($con,$name);
                $pass=mysqli_real_escape_string($con,$pass);
                $email=mysqli_real_escape_string($con,$email);
                $uname=mysqli_real_escape_string($con,$uname);
                $nid=mysqli_real_escape_string($con,$nid);
                $phone=mysqli_real_escape_string($con,$phone);
                $address=mysqli_real_escape_string($con,$address);
              
                $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
                
                
                echo $uname_db;
              
                $sql="update user set name='$name' , user_name='$uname' , email = '$email' , password = '$hash_pass' , phone = '$phone' , address = '$address' where user_name = '$uname_db' ";

                if(mysqli_query($con,$sql))
                {
                    echo "successful";
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
    global $uname_db , $uname , $hash_pass , $con;

    $sql = "update login set user_name = '$uname' , password = '$hash_pass' where user_name = '$uname_db' "; 
        if(mysqli_query($con,$sql))
        {
            echo "successful login table";
        }
        else
        {
           echo "Error updating record of login table: " . mysqli_error($con);
        }
                  
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>USER_UPDATE</title>
</head>
<body>

    <ul>
        <li><a href="user_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="update_user.php"> SETTING </a></li>
    </ul>
   
<form name='update' method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <table>
        <tr>
          <td><p>NAME</p></td>
        </tr>
        <tr>
          <td><input type="text" name="name" placeholder='NAME' value="<?php echo $name;?>"></td>
        </tr>
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
              <td><input type="text" name="uname" id="uname" placeholder='USERNAME' value="<?php echo $uname;?>"></td>
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

       <tr>
         <td colspan=2><input type="submit" name="btn_submit" value="UPDATE" id='btn_submit'></td>
       </tr>           
    </table>   
</form>
</body>
<script src="../js/update_user.js"></script>
</html>