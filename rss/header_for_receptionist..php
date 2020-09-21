<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PARADISE HOTEL & RESORT</title>

    <link rel="stylesheet" href="../css/blank.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
  </head>
  <body>
    <header class="header">
      <div class="bgimage">
        <div class="menu">
          <div class="leftmenu">
            <h3><a href="../home.html">OCEAN PARADISE</a></h3>
          </div>
          <div class="welcome">
            <h1>Welcome RECEPTIONIST</h1>
            <div class="rightmenu">
              <button id="buttonone" onclick="window.location.href='../logout.php';">
                Logout
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>RECEPTIONIST Area</header>
      <ul>
        <li>
        <a href="receptionist_dashboard.php"><i class="fas fa-qrcode"></i>Dashboard</a>
        </li>
        <li>
          <a href="changepass.php"><i class="fas fa-link"></i>CHANGE PASSWORD</a>
        </li>
        <li>
        <a href="prebook_request.php"><i class="fas fa-stream"></i>PAYMENT & CHECKOUT</a>
        </li>
        <li>
        <a href="prebooked_all.php"><i class="fas fa-stream"></i>PREBOOKED </a>
        </li>
        <li>
        <a href="offline_book.php"><i class="fas fa-stream"></i>OFFLINE BOOKING</a>
        </li>
		
		<li>
        <a href="booking.php"> <i class="fas fa-stream"></i>BOOK ROOM</a>
        </li>
		
        <li>
        <a href="bookinginfo.php"> <i class="fas fa-stream"></i>BOOKED ROOM INFO</a>
        </li>
        
        <li>
          
        <a href="chat_box.php"><i class="fas fa-stream"></i> CHAT BOX</a>
        </li>
       
      </ul>
    </div>
