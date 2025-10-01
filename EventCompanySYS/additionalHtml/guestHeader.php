<?php
  session_start();
  $timeout_duration = 3600; 
  if (isset($_SESSION['username'])){$userName = $_SESSION['username'];} 
  else{$userName = null;}
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../../Index.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="../../css/headerAndNav.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/bookTicket.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="css/index.css">
    <title>My Bookings</title>
    <meta charset='utf-8'>
  </head>
<body>
  <nav>
    <div class="navBar">

      <a href="../../Index.php" class="dropdown-toggle">Events</a>

      <a href="MyBookings.php" class="dropdown-toggle">My Bookings</a>

    </div>
    <div class="login">
      <div class="dropdown-container">
        <?php
          if (empty($userName))
          {
            echo '<p><a href="html/LoginForm.php">Log in</a></p>';
          }
          else
          {
        ?>
          <a class="dropdown-toggle"><?php echo htmlspecialchars($userName); ?></a>
          <div id="logout" class="dropdown">
          <form id="logoutForm" method="POST" style="display:none;">
            <input type="hidden" name="action" value="logout">
          </form>
          <a href="#" onclick="document.getElementById('logoutForm').submit();">Log Out</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </nav>