<?php
session_start();
include "../database/db_connect.php";



if(isset($_SESSION['user_name']))
{
  $uname = $_SESSION['user_name'];
  $infos=prebokinginfo();

  
}
else{

    header("Location: ../login.php");
}

include "../rss/Dheader&navbarfor_user.php";

function prebokinginfo(){

  global $con,$uname;
      
      $sql = "select * from pre_booking  where user_Id='$uname'";
      $result = mysqli_query($con,$sql);
      return $result;

}


?>
<style>
  table {
    border-collapse: collapse;
  margin-left: 272px;
  color: white;
  border: transparent;
  }

  th, td {
    text-align: left;
    padding: 8px;
    background: black;
}
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
    background-color: #4CAF50;
    color: white;
  }

  table tr:not(:first-child){
                 cursor: pointer;transition: all .25s ease-in-out;
             }
             table tr:not(:first-child):hover{background-color: #ddd;}

             .btn {
     background-color: red;
     border: none;
     color: white;
     padding: 12px 16px;
     font-size: 16px;
     cursor: pointer;
  	 border-radius: 10px;
   }


   .btn:hover {
     background-color: RoyalBlue;
   }

   a:link{


     color: white;
     text-decoration: none;

   }
   a:visited{

  color: white;

   }

  </style>

 <section>
      <div class="main-section">
        <div class="dashbord">
          <div class="icon-section">


            <table id="table" style={border:1px>
                    <thead>
                      <th>Sl.</th>
                        <th>Room No</th>
                      <th>Payment</th>
                      <th>Total Cost</th>
                      <th>Payment Due</th>

                  <th>Pre Checkin</th>
                  <th>Pre Checkout</th>

                  <th>------------------</th>
                    </thead>

                   
				   <tbody>
                <?php
                  foreach($infos as $info)
                  {
                    echo "<tr>";
					echo "<td>".$info["serial"]."</td>";
					
                      echo "<td>".$info["room_number"]."</td>";
                        echo "<td>".$info["payment"]."</td>";
                      echo "<td>".$info["Totalcost"]."</td>";
              echo "<td>".$info["Payment_due"]."</td>";
                echo "<td>".$info["pre_check_in"]."</td>";
                echo "<td>".$info["pre_check_out"]."</td>";
                       

            echo '<td><button class="btn"><a href="deletprebook.php?id='.$info["serial"].'" i class="fa fa-trash">  Remove</a></td>';
                    echo "</tr>";
                  }
                ?>

              </tbody>
                    


                   





                  </table>




          </div>
        </div>
      </div>
    </section>


</body>

</html>
