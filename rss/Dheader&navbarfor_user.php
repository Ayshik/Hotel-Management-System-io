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
            <h1>Welcome User</h1>
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
      <header>Users's Area</header>
      <ul>
        <li>
          <a href="../guest/user_dashboard.php"><i class="fas fa-qrcode"></i>Dashboard</a>
        </li>
        <li>
          <a href="../guest/update_user.php"><i class="fas fa-link"></i>Profile Update</a>
        </li>
        <li>
          <a href="../guest/pre_booking.php"><i class="fas fa-stream"></i>BOOKING</a>
        </li>
        <li>
          <a href="../guest/cancel_booking.php"><i class="fas fa-stream"></i>CANCEL BOOKING</a>
        </li>
        <li>
          <a href="../guest/history.php"><i class="fas fa-stream"></i>HISTORY</a>
        </li>
        <li>
          <a href="../guest/pre_booking_details.php"><i class="fas fa-stream"></i>PREBOOKED DETAILS</a>
        </li>

        <li>
          <a href="../guest/chat_box.php"><i class="fas fa-stream"></i>CHAT BOX</a>
        </li>
        <li>
          <a href="../guest/report.php"><i class="fas fa-calendar-week"></i>REPORT</a>
        </li>
      </ul>
    </div>
