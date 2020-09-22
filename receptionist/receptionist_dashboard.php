<?php
include "../database/db_connect.php";
session_start();
$rn_booked = $room_available = [];
$economy = $premium = $basic = 0;
if(isset($_SESSION['user_name']))
{
    $local = date("Y-m-d");
    $i=0;

    $sql= "SELECT * FROM pre_booking";
    $result = mysqli_query($con , $sql);
    $row = mysqli_num_rows($result);
    if($row>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
          $d1 = $row['pre_check_in'];
          $d2 = $row['pre_check_out'];
  
          $local_date = date('Y-m-d', strtotime($local));
          $startDate = date('Y-m-d', strtotime($d1));
          $endDate = date('Y-m-d', strtotime($d2));
  
          if (($local_date >= $startDate) && ($local_date <= $endDate))
          {
            $rn_booked[$i] = $row["room_number"]; 
            $i++;
          }
                
        }
    }
    $sql1 = "SELECT * FROM room_booking";
    $result1 = mysqli_query($con , $sql1);     
    $row = mysqli_num_rows($result1);     
    if($row>0)
    {
        while($row = mysqli_fetch_assoc($result1))
        {
          $d1 = $row['check_in'];
          $d2 = $row['check_out'];
  
          $local_date = date('Y-m-d', strtotime($local));
          $startDate = date('Y-m-d', strtotime($d1));
          $endDate = date('Y-m-d', strtotime($d2));
  
          if (($local_date >= $startDate) && ($local_date <= $endDate))
          {
            $rn_booked[$i] = $row["room_number"]; 
            $i++; 
          }
          
        }
    }
        

    $rn_booked = array_unique($rn_booked);

    $sql2 = "SELECT * FROM room_details WHERE class= 'Premium' ";    
    $result2 = mysqli_query($con , $sql2);   
    $row = mysqli_num_rows($result2);
    if($row>0)
    {
      while($row = mysqli_fetch_assoc($result2))
      {
        array_push($room_available,$row['room_number']);
      }
      for($i=0;$i<count($rn_booked);$i++)
      {
        $index = array_search($rn_booked[$i],$room_available,true);
        unset($room_available[$index]);
      }
      $room_available = array_values ($room_available);
      $premium = count($room_available);
      $room_available = [];    
    }

    $sql3 = "SELECT * FROM room_details WHERE class= 'Economy' ";    
    $result3 = mysqli_query($con , $sql3);   
    $row1 = mysqli_num_rows($result3);
    if($row1>0)
    {
      while($row = mysqli_fetch_assoc($result3))
      {
        array_push($room_available,$row['room_number']);
      }
      for($i=0;$i<count($rn_booked);$i++)
      {
        $index = array_search($rn_booked[$i],$room_available,true);
        unset($room_available[$index]);
      }
      $room_available = array_values ($room_available);
      $economy = count($room_available);
      $room_available = [];      
    }

    $sql4 = "SELECT * FROM room_details WHERE class= 'Basic' ";    
    $result4 = mysqli_query($con , $sql4);   
    $row2 = mysqli_num_rows($result4);
    if($row2>0)
    {
      while($row = mysqli_fetch_assoc($result4))
      {
        array_push($room_available,$row['room_number']);
      }
      for($i=0;$i<count($rn_booked);$i++)
      {
        $index = array_search($rn_booked[$i],$room_available,true);
        unset($room_available[$index]);
      }
      $room_available = array_values ($room_available);
      $basic = count($room_available);
      $room_available = [];      
    }

    $sqlnew = "update room_booking set status='Old' where check_out='$local' ";
    if(mysqli_query($con , $sqlnew))
    {

    }
    else
    {
        echo "erro while updating checkout".mysqli_error($con);
    }
}
else{
    header("Location: ../login.php");
}

include "../rss/header_for_receptionist..php";

 
?>
<style>


.container{
	
   
   display: flex;
    justify-content: center;
    /* align-items: center; */
    font-family: consolas;
    margin-left: 372px;
    width: 1000px;
    position: relative;
    flex-direction: row-reverse;
    justify-content: space-between;
}

.container .card{
    position: relative;
    cursor: pointer;
}

.container .card .face{
    width: 300px;
    height: 200px;
    transition: 0.5s;
}

.container .card .face.face1{
   position: relative;
    
    background-image: url(../css/image/Premium.jpg);
    background-size: cover;
    /* background: #333; */
    border: 1px solid rebeccapurple;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.container .card:hover .face.face1{
   
    background-image: url(../css/image/pre2.jpg);
    background-size: cover;
    transform: translateY(0);
}

.container .card .face.face1 .content{
   
    transition: 0.5s;
}

.container .card:hover .face.face1 .content{
    opacity: 1;
}

.container .card .face.face1 .content img{
    max-width: 100px;
}

.container .card .face.face1 .content h3{
    margin: 10px 0 0;
    padding: 0;
    color: #fff;
    text-align: center;
    font-size: 1.5em;
}

.container .card .face.face2{
    position: relative;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-100px);
}

.container .card:hover .face.face2{
    transform: translateY(0);
}

.container .card .face.face2 .content p{
    margin: 0;
    padding: 0;
}

.container .card .face.face2 .content a{
    margin: 15px 0 0;
    display:  inline-block;
    text-decoration: none;
    font-weight: 900;
    color: #333;
    padding: 5px;
    border: 1px solid #333;
}

.container .card .face.face2 .content a:hover{
    background: #333;
    color: #fff;
}






.container .card2{
    position: relative;
    cursor: pointer;
}

.container .card2 .face{
    width: 300px;
    height: 200px;
    transition: 0.5s;
}

.container .card2 .face.face1{
   position: relative;
    
    background-image: url(../css/image/Economy.jpg);
    background-size: cover;
    /* background: #333; */
    border: 1px solid rebeccapurple;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.container .card2:hover .face.face1{
    
    background-image: url(../css/image/eco2.jpg);
    background-size: cover;
    transform: translateY(0);
}

.container .card2 .face.face1 .content{
   
    transition: 0.5s;
}

.container .card2:hover .face.face1 .content{
    opacity: 1;
}

.container .card2 .face.face1 .content img{
    max-width: 100px;
}

.container .card2 .face.face1 .content h3{
    margin: 10px 0 0;
    padding: 0;
    color: #fff;
    text-align: center;
    font-size: 1.5em;
}

.container .card2 .face.face2{
    position: relative;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-100px);
}

.container .card2:hover .face.face2{
    transform: translateY(0);
}

.container .card2 .face.face2 .content p{
    margin: 0;
    padding: 0;
}

.container .card2 .face.face2 .content a{
    margin: 15px 0 0;
    display:  inline-block;
    text-decoration: none;
    font-weight: 900;
    color: #333;
    padding: 5px;
    border: 1px solid #333;
}

.container .card2 .face.face2 .content a:hover{
    background: #333;
    color: #fff;
}





.container .card3{
    position: relative;
    cursor: pointer;
}

.container .card3 .face{
    width: 300px;
    height: 200px;
    transition: 0.5s;
}

.container .card3 .face.face1{
   position: relative;
    
    background-image: url(../css/image/Basic.jpg);
    background-size: cover;
    /* background: #333; */
    border: 1px solid rebeccapurple;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.container .card3:hover .face.face1{
     
    background-image: url(../css/image/nor2.jpg);
    background-size: cover;
    transform: translateY(0);
}

.container .card3 .face.face1 .content{
   
    transition: 0.5s;
}

.container .card3:hover .face.face1 .content{
    opacity: 1;
}

.container .card3 .face.face1 .content img{
    max-width: 100px;
}

.container .card3 .face.face1 .content h3{
    margin: 10px 0 0;
    padding: 0;
    color: #fff;
    text-align: center;
    font-size: 1.5em;
}

.container .card3 .face.face2{
    position: relative;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-100px);
}

.container .card3:hover .face.face2{
    transform: translateY(0);
}

.container .card3 .face.face2 .content p{
    margin: 0;
    padding: 0;
}

.container .card3 .face.face2 .content a{
    margin: 15px 0 0;
    display:  inline-block;
    text-decoration: none;
    font-weight: 900;
    color: #333;
    padding: 5px;
    border: 1px solid #333;
}

.container .card3 .face.face2 .content a:hover{
    background: #333;
    color: #fff;
}



</style>


<div class="container">
        <div class="card3">
            <div class="face face1">
                <div class="content">
                    <img src="../css/image/trans.png">
                    <h3>Normal Room</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>We Have <?php echo $basic ; ?> Unbooked Basic Rooms.</p>
                        
                </div>
            </div>
        </div>
        <div class="card2">
            <div class="face face1">
                <div class="content">
                    <img src="../css/image/trans.png">
                    <h3>Economy Room</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>We Have <?php echo $economy ; ?> Unbooked Economy Rooms.</p>
                        
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img src="../css/image/trans.png">
                    <h3>Premium Room</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>We Have <?php echo $premium ; ?> Unbooked Premium Rooms.</p>
                        
                </div>
            </div>
        </div>
    </div>
</body>
</html>    