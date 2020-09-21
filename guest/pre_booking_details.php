<?php
session_start();
include "../database/db_connect.php";

$uname = "";

if(isset($_SESSION['user_name']))
{
  $uname = $_SESSION['user_name'];
  $info=prebokinginfo();

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    //cancelprebooking();
  }
}
else{

    header("Location: ../login.php");
}

include "../rss/Dheader&navbarfor_user.php";

function prebokinginfo(){

  global $con,$uname;
      
      $sql = "select * from pre_booking  where user_name='$uname'";
      $result = mysqli_query($con,$sql);
      return $result;

}
//cancel booking 
function cancelprebooking()
{
  global $con,$sl;

      $sql = "delete from pre_booking  where serial='$sl'";
      if(mysqli_query($con,$sql))
      {
          echo "succesful";
      }  
      else 
      {   
          echo "error while deleting". mysqli_error($con);
      }   

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
                      <!-- <th>Sl.</th> -->
                        <th>Room No</th>
                      <th>Payment</th>
                      <th>Total Cost</th>
                      <th>Payment Due</th>

                  <th>Pre Checkin</th>
                  <th>Pre Checkout</th>

                  <th>------------------</th>
                    </thead>

                    <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <tbody>
                      <?php
                      $i=0;
                        foreach($info as $infos)
                        {
                          echo "<tr>";
                            //echo "<td>".$infos["serial"]."</td>";
                          // $sl[$i]=$infos["serial"];
                          // $i++;

                            echo "<td>".$infos["room_number"]."</td>";
                    echo "<td>".$infos["payment"]."</td>";
                      echo "<td>".$infos["Totalcost"]."</td>";
                              echo "<td>".$infos["Payment_due"]."</td>";
                            echo "<td>".$infos["pre_check_in"]."</td>";
                            echo "<td>".$infos["pre_check_out"]."</td>";

                  echo "";
                  echo '<td> <button name="  " class="btn" type="submit" i class="fa fa-trash">Remove</a></td>';
                                   
                          echo "</tr>";
                        }
                      ?>  
                    </tbody>


                    </form>





                  </table>




          </div>
        </div>
      </div>
    </section>


</body>

</html>
