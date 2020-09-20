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
            <h1>Welcome OWNER</h1>
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
      <header>Manager's Area</header>
      <ul>
        <li>
          <a href="owner_dashboard.php"><i class="fas fa-qrcode"></i>Dashboard</a>
        </li>
        <li>
          <a href="setting.php"><i class="fas fa-link"></i>Profile</a>
        </li>
        <li>
          <a href="add_owner.php"><i class="fas fa-stream"></i>ADD OWNER</a>
        </li>
        <li>
          <a href="add_manager.php"><i class="fas fa-stream"></i>ADD MANAGER</a>
        </li>
        
        <li>
          <a href="financial_report.php"><i class="fas fa-stream"></i>FINANCIAL REPORT</a>
        </li>
        <li>
          <a href="report.php"
            ><i class="fas fa-calendar-week"></i>FEEDBACK FROM CUSTOMER</a
          >
        </li>
      </ul>
    </div>
