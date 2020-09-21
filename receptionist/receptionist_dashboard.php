<?php
include "../database/db_connect.php";
session_start();
if(isset($_SESSION['user_name']))
{
   if($query="SELECT count(serial) AS total FROM room_details WHERE class='Premium' "){
  $result=mysqli_query($con,$query);
  $values=mysqli_fetch_assoc($result);
  $pr=$values["total"];

  if($pr==0)
  {$pr='no';}
  else {
    $pr=$values["total"];
  }

}


if($query="SELECT count(serial) AS total FROM room_details WHERE class='Economy' "){
  $result=mysqli_query($con,$query);
  $values=mysqli_fetch_assoc($result);
  $er=$values["total"];

  if($er==0)
  {$er='no';}
  else {
    $er=$values["total"];
  }

}




if($query="SELECT count(serial) AS total FROM room_details WHERE class='Basic' "){
  $result=mysqli_query($con,$query);
  $values=mysqli_fetch_assoc($result);
  $br=$values["total"];

  if($br==0)
  {$br='no';}
  else {
    $br=$values["total"];
  }

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
    
    background-image: url(../css/image/pre.jpg);
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
    
    background-image: url(../css/image/eco.jpg);
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
    
    background-image: url(../css/image/nor.jpg);
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
                    <p>We Have <?php echo $br ; ?> Unbooked Basic Rooms.</p>
                        
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
                    <p>We Have <?php echo $er ; ?> Unbooked Economy Rooms.</p>
                        
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
                    <p>We Have <?php echo $pr ; ?> Unbooked Premium Rooms.</p>
                        
                </div>
            </div>
        </div>
    </div>
</body>
</html>    