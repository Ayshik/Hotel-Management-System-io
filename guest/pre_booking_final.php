<?php
session_start();


if(isset($_SESSION['user_name']))
{
    $user_name = $_SESSION['user_name'];
}
else
{
    header("Location: ../login.php");
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
  margin-bottom: 10px;
    line-height: 36px;
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
<form name='update' onsubmit="return validate();" method="POST" action="">

                
				

				<div class="input_field">
				
				
				<label for="Name">Name:</label >
          <td><input type="text" name="name" placeholder='NAME' value=""></td>





             

        <tr>
          <td><p>EMAIL</p></td>
        </tr>
        <tr>
          <td><input type="email" name="Email" placeholder='EMAIL' value=""></td>
        </tr>
        

        

      

        <tr>
          <td><p>NATIONAL ID NUMBER:</p></td>
        </tr>
        <tr>
         <td><input type="number" name="nid" placeholder='NATIONAL ID NUMBER' value="" readonly></td>
        </tr>
       

       <tr>
          <td><p>PHONE NUMBER</p></td>
        </tr>
       <tr>
         <td><input type="number" name="phone" placeholder='PHONE NUMBER' value=""></td>
        </tr>
        

       <tr>
          <td><p>ADDRESS</p></td>
        </tr>
       <tr>
         <td>
           <textarea placeholder='ADDRESS' name="address"></textarea></td>
        </tr>
		
		
		 <tr>
          <td><p>Payment</p></td>
        </tr>
       <tr>
         <td><input type="number" name="payment" id="tk" value="500"></td>
        </tr>
        
            			
    <div class="btn">
       <tr>
         <td colspan=2><input type="submit" name="btn_submit" value="Book" id='btn_submit'></td>
       </tr>
    </div>
       
	</div>

  
</form>
</body>

</html>
<script>
function validate(){

  var pay = document.getElementById("tk").value;
  

  var error_message = document.getElementById("error_message");

  error_message.style.padding = "10px";

  var text;

  if(pay < 500){
    text = "You must pay Atleast 500 TK";
    error_message.innerHTML = text;
    return false;
  }

  
  alert("Booked Successfully!");
  return true;
}
</script>
