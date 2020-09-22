<?php
include('rss/header.php');
?>
<style>


 <style>
          * {box-sizing: border-box}
          body {font-family: Verdana, sans-serif; margin:0}
          .mySlides {display: none}
          img {vertical-align: middle;}

          /* Slideshow container */
          .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;

          }
          .quets{
            border:7px solid MediumSeaGreen;

            background-color:rgb(255,87,87);
            width:100%;
          }

          /* Next & previous buttons */
          .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
          }

          /* Position the "next button" to the right */
          .next {
            right: 0;
            border-radius: 3px 0 0 3px;
          }

          /* On hover, add a black background color with a little bit see-through */
          .prev:hover, .next:hover {
            background-color:rgba(0,0,0,0.8);
          }

          /* Caption text */
          .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
          }

          /* Number text (1/3 etc) */
          .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
          }

          /* The dots/bullets/indicators */
          .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
          }

          .active, .dot:hover {
            background-color: #717171;
          }

          /* Fading animation */
          .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
          }

          @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
          }

          @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
          }

          /* On smaller screens, decrease text size */
          @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
          }
		  
		  #slider {
	overflow: hidden;
}
#slider figure {
	position: relative;
	width: 500%;
	margin:0px;
	left: 0;
	animation: 30s slider infinite;
}
#slider figure img {
	width: 20%;
	float: left;
}

@keyframes slider {
	0% {
		left: 0;
	}
	20% {
		left: 0;
	}
	30% {
		left: -100%;
	}
	45% {
		left: -100%;
	}
	50% {
		left: -200%;
	}
	70% {
		left: -200%;
	}
	80% {
		left: -300%;
	}
	95% {
		left: -300%;
	}
	100% {
		left: -400%;
	}
}
          </style>
</style>
<div class="container">

<section >
                        <div class="pic">
                        <div id="slider">
                            <figure>
                                <img src="css/image/slider1.png">
                                <img src="css/image/slider2.png">
                                <img src="css/image/slider3.png">
                                <img src="css/image/slider4.png">
                                <img src="css/image/slider5.png">
								
								
								
                            </figure>
                       </div>
                     </div>
                </section>


   
  </div>


</body>
</html>
