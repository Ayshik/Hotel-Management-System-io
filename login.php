<?php
session_start();

include "database/db_connect.php";
$uname_err=$pass_err="";
$flag=0;
$uname=$pass="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['uname']))
	{
		$uname_err="user name can not be empty";
		$flag=1;
	}
	else{
		$uname=validate($_POST['uname']);
		$uname = strtoupper($uname); 
		$uname=mysqli_real_escape_string($con,$uname);
	}
	if(empty($_POST['pass']))
	{
		$pass_err="Password can not be empty";
		$flag=1;
	}
	else{
		$pass=$_POST['pass'];
		$pass=mysqli_real_escape_string($con,$pass);
	}

	login_validation();
	
}
function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function login_validation()
{ 
	global $flag,$uname,$pass,$con;
	$pass_db = "";
	$u_type=0;
	if($flag==0)
	{
	   $query="select * from login where user_name='$uname'"; 
	   $result=mysqli_query($con,$query);
	   $row=mysqli_num_rows($result);
	   if($row>0){
		   while($row = mysqli_fetch_assoc($result)){
				$u_type=$row['user_type'];
				$pass_db=$row['password'];				
		   }
		   
		   if(password_verify($pass, $pass_db)){
				if($u_type==1){
					$_SESSION['user_name']=$uname;					
					header("location:guest/user_dashboard.php");
				}
				elseif($u_type==2)
				{
					$_SESSION['user_name']=$uname;
					$_SESSION['user_type']=2;
					$entry_time = date(" h:i:sa ");
					$date = date(" Y-m-d");
					
					$uname = strtoupper($uname); 
                    $uname = mysqli_real_escape_string($con , $uname);
                    $entry_time = mysqli_real_escape_string($con , $entry_time);
					$date = mysqli_real_escape_string ($con , $date);
										                
					$sql = "select * from receptionist_timing where user_name = ' $uname ' AND date = ' $date'";
					$r = mysqli_query($con, $sql);
					$row1 = mysqli_num_rows($r);
					echo $row1; 
				    if($row1<1)
				    {
				    	$sql1 = "insert into receptionist_timing(user_name , date , entry_time , exit_time ) values('$uname' , '$date' , '$entry_time' , 'n' )";
                        if(mysqli_query($con , $sql1))
                        {
                            header("location:receptionist/receptionist_dashboard.php");
						}
						else
						{
							echo "setting time error".mysql_error($con);
						}
				    	
				    }
				    else
				    {
						header("location:receptionist/receptionist_dashboard.php");
				    }
				}

				elseif($u_type==3){
					$_SESSION['user_name']=$uname;
					header("location:manager/manager_dashboard.php");
				}
				elseif($u_type==4){
					$_SESSION['user_name']=$uname;
					header("location:owner/owner_dashboard.php");
				}
		   }
		   else{
			    echo "password doesnot match";
		   }
	   }
	   else{
		   echo "USername doesnot exist";
	   }

       
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css">
</head>
  <body>
  <!-- header -->
  <div class="menu">
        <div class="leftmenu">
          <h3><a href="index.php">

            <div class="logo">
                 <img src= "css/image/LOGO.png" class="img" style="width: 100%; padding-top: 10px; height: 110px">
                </div>

          </a></h3>
        </div>
        <div class="rightmenu">
          <ul>
            <li> <a href="index.php">HOME</a></li>
            <li> <a href="">Services</a></li>
            <li> <a href="">Nuru massage</a></li>
            <li> <a href="aboutus.html">About Us</a></li>
			<li> <a href="contact.html">Contact</a></li>
			<li> <a href="login.php">LOGIN</a></li>
          </ul>
        </div>
      </div>
<!-- header -->

<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
	<div>
<fieldset class='field'>
<legend>WELCOME TO LOGIN</legend>
	<table class='table'>
	<tr>
		<td><p>USERNAME</p></td>
	</tr>
	<tr>
        <td><input type="text" name="uname" id="uname" value="<?php echo $uname;?>" placeholder="USERNAME"></td>      
    </tr>
    <tr class='error'>
    	<td><div style="color:red;"><?php echo $uname_err;?></div></td>
    </tr>        
    <tr>
		<td><p>PASSWORD</p></td>		
    </tr>
    <tr>
        <td><input type="Password" name="pass" id="pass" placeholder='PASSWORD'></td>
    </tr>

     <tr class='error'>
    	<td><div style="color:red;"><?php echo  $pass_err;?></div></td>
	</tr> 
	
	<tr>
		<td><input type="submit" name="submit" value="LOGIN"></td>
	</tr>
</table>
   <p> DON'T HAVE ACCOUNT <a href='guest/registration.php'>REGISTER NOW!</a>
</fieldset>
</div>
</form>
</body>
</html>
