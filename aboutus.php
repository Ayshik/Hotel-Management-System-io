<?php
include('rss/header.php');
?>


<style type="text/css">
 
.about{
    background: url(css/image/pre.jpg) no-repeat left;
    background-size: 55%;
    background-color: #fdfdfd;
    overflow: hidden;
    display: inline-table;
}
.inner-section1{
    width: 55%;
    float: right;
    background-color: #fdfdfd;
    padding: 140px;
    box-shadow: 10px 10px 8px rgba(0,0,0,0.3);
}
.inner-section1 h1{
    margin-bottom: 30px;
    font-size: 30px;
    font-weight: 900;
}
.text1{
    font-size: 13px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;
}
.skills button{
    font-size: 22px;
    text-align: center;
    letter-spacing: 2px;
    border: none;
    border-radius: 20px;
    padding: 8px;
    width: 200px;
    background-color: #00999c;
    color: white;
    cursor: pointer;
}
.skills button:hover{
    transition: 1s;
    background-color: #ecf5f5;
    color: #00999c;
}
@media screen and (max-width:1200px){
    .inner-section{
        padding: 80px;
    }
}
@media screen and (max-width:1000px){
    .about{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-section{
        width: 100%;
    }
}

@media screen and (max-width:600px){
    .about{
        padding: 0;
    }
    .inner-section{
        padding: 60px;
    }
    .skills button{
        font-size: 19px;
        padding: 5px;
        width: 160px;
    }
}
 
</style>








<div class="about">
        <div class="inner-section1">
            <h1>About Us</h1>
            <p class="text1">
                American International University-Bangladesh, commonly known by its acronym AIUB, is an accredited private university in Dhaka, Bangladesh. The university is an independent organization with own Board of Trustees. 
            </p>
            <div class="skills">
                <button>Contact Us</button>
            </div>
        </div>
    </div>


   
  


</body>
</html>
