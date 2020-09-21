<?php
session_start();
include "../database/db_connect.php";

$error_message = $class = $category = $room_number = $price = $sl = "";
if(isset($_SESSION['user_name']))
{
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST['class']))
		{
			$error_message = "class can not be empty";
		}
		else
		{
			$class = $_POST['class'];
			$class=mysqli_real_escape_string($con,$class);
		}

		if(empty($_POST['Category']))
		{
			$error_message = "Category can not be empty";
		}
		else
		{
			$category = $_POST['Category'];
			$category=mysqli_real_escape_string($con,$category);

		}

		if(empty($_POST['Price']))
		{
			$error_message = "Price can not be empty";
		}
		else
		{
			$price = $_POST['Price'];
			$price=mysqli_real_escape_string($con,$price);
		}

		$sql = "insert into room_details(class,category,room_number,price) values ('$class' , '$category' , '0' , '$price')";
		if (mysqli_query($con, $sql))
		{
			$sql1 = "select serial from room_details where class = '$class' and category = '$category' and room_number = '0' and price = '$price' ";

			$result = mysqli_query($con, $sql1);
			$row = mysqli_num_rows($result);
			if ($row > 0) {
				while ($row = mysqli_fetch_assoc($result))
				{
				$sl = $row['serial'];
				}			
				$room_number = $class[0].$category[0].$sl;

				$sql2 = " update room_details set room_number = '$room_number' where serial = '$sl' ";

				if(mysqli_query($con,$sql2))
				{

				}
				else
				{
					echo "room_details table Error while updating room number: " . $sql . "<br>" . mysqli_error($con);
				}
			} else {
			  echo "room_details table Error while fetching serial: " . $sql . "<br>" . mysqli_error($con);
			}

		}
		else {
		  echo "room_details table Error while inserting: " . $sql . "<br>" . mysqli_error($con);
		}


	}
}
else{
    header("Location: ../login.php");
}
include('../rss/Dheader&navbarfor_manager.php');
?>
<style>
*{
  margin: 0;  /*this margin break the design */
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
    top: 48%;
    left: 52%;
    transform: translate(-47%,-50%);
    max-width: 322px;
    width: 109%;
    background: #fff;
    padding: 26px;
    border-radius: 5px;
    box-shadow: 4px 4px 2px rgba(254,236,164,1);
    flex: 23px;
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


.item-image{
  width: 347px;
      height: 144px;
	border-radius: 5px;
}


</style>


<section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">
            <div class="wrapper">


          <h2>Room Customize</h2>
            <div id="error_message" > <?php echo $error_message; ?> </div>
              <form id="myform" onsubmit="return validate();" method="post" action=<?php htmlspecialchars($_SERVER['PHP_SELF'])?> >
                <div class="input_field">
            			<label for="Class">Select Class :</label>
                  <select  name="class"><br><br>

                    <option value="Premium" selected>Premium</option>
                    <option value="Economy" >Economy</option>
                    <option value="Basic">Basic</option>

                  </select>

            		</div>

                <div class="input_field">

            		<label for="Class">Select Catagory :</label>

                    <select  name="Category"><br><br>

                       <option value="Single" selected>Single</option>
                       <option value="Double">Double</option>
                       <option value="Family">Family</option>
                       

                    </select>

            	</div>

                <div class="input_field">
            			<label for="Price">Room Price :</label >

                    <input type="number" placeholder="Give Room Price" name="Price" value="" id="bal" >
                </div>




                <div class="btn">
                    <input type="submit" name="insertreport" value="Done">
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




   function validate(){

     var Price = document.getElementById("bal").value;


     var error_message = document.getElementById("error_message");

     error_message.style.padding = "10px";

     var text;

     if(Price.length < 3){
       text = "Please Carefull about Price !!";
       error_message.innerHTML = text;
       return false;
     }


     return true;
   }
</script>
