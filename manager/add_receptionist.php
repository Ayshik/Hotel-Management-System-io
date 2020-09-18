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
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD  RECEPTIONIST</title>
</head>
<body>
    <div>
    <ul>
    <li><a href="manager_dashboard.php"> DASHBOARD </a></li>
        <li><a href="../logout.php"> LOGOUT </a></li>
        <li><a href="setting.php"> SETTING </a></li>
        <li><a href="add_receptionist.php"> ADD RECEPTIONIST </a></li>
        <li><a href="receptionist_attendance.php"> RECEPTIONIST ATTENDANCE </a></li>
        <li><a href="room_customize.php"> ROOM CUSTOMIZATION </a></li>
        <li><a href="pricing_view.php"> VIEW AND PRICE CUSTOMIZATION </a></li>
        <li><a href="report_by_customer.php"> FEEDBACK FROM CUSTOMER </a></li>
        <li><a href="financial_report.php"> FINANCIAL REPORT </a></li>      
    </ul>
    <div>
<!-- reuse the add_by_owner.js file with form name  -->
<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" name="add_by_owner">

<h1>ADD RECEPTIONIST</h1>

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

        <tr>
            <td><input type="submit" name="btn_manager"></td>
        </tr>
    </table>
</form>
</body>
<script src="../js/add_by_owner.js"></script>
</html>    