<?php
  session_start();
  require("../pdo-conn.php");
  $timeout_duration = 3600; 

  if (isset($_SESSION['username'])){$userName = $_SESSION['username']; $userType = $_SESSION['userType'];} 

  else{$userName = null; $userType = null;}

  

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout')
  {
    session_unset();
    session_destroy();
    header("Location: ../../Index.php");
    exit;
  }

  if(isset($_SESSION['userEmail'])){$email = $_SESSION['userEmail'];}

  else { $email = null;}
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="../../css/headerAndNav.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/bookTicket.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/errors.css">
    <title>Booking Form</title>
    <meta charset='utf-8'>
  </head>
<body>
  <nav>
    <div class="navBar">

      <a href="../../Index.php" class="dropdown-toggle">Events</a>

      <?php
        if($userType == 'Client'){
            ?>
                <a href="../guest/MyBookings.php" class="dropdown-toggle">My Bookings</a>
            <?php
        }
        else if ($userType == 'Admin' || $userType == 'Staff')
        {
            ?>
                <a href="../admin/ManageBookings/deleteAndViewBookings/ListOfBookings.php" class="dropdown-toggle">Manage Bookings</a>
            <?php
        }
        else
        {
            echo '<a href="../LoginForm.php" class="dropdown-toggle">My Bookings</a>';
        }
      ?>

    </div>
    <div class="login">
      <div class="dropdown-container">
        <?php
          if (empty($userName))
          {
            echo '<p><a href="../LoginForm.php">Log in</a></p>';
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

<script>


  function calculatePrice() {
    let numbOftickets = parseInt(document.getElementById("eNumberOfTickets").value);
    let pricePerTicket = parseFloat(document.getElementById("ticketPrice").textContent);

    let total = 0;
    if (Number.isInteger(numbOftickets)) {
      total = pricePerTicket * numbOftickets;
      total = parseFloat(total).toFixed(2);
      document.getElementById("price").textContent = total;
    } else {
      document.getElementById("price").textContent = "0.00";
    }

    document.getElementById("priceInput").value = total;
  }

  document.addEventListener("DOMContentLoaded", function () {

    let closeBtns = document.getElementsByClassName("closebtn");
    for (let i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function () {
            let div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () { 
                div.style.display = "none"; 
                div.style.opacity = "1"; 
            }, 600);
        }
    }

  });


  </script>
  
<h1>Book Ticket<h1>

<div id="formAlert" class="alert" style="display:none;">
  <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div> 

<form id="eventInfo" onsubmit="return validateBooking()" method="get">
  <?php
    include("selectEvent.php");
    if($event)
    {
      echo("<h3>" . $event['name'] . "</h3>");
      ?>
        <div id="eventContainer">
          <img id="eventBanner" src="<?php echo('../../' . $event['filepath']); ?>">
          <div class="description">
            <?php

              $location = $event['street'] . "," . $event['city'] . ", " . $event['county'];
              echo(
                "<p>Desctiption:<br>{$event['description']}</p><br>" . 
                "<p>Date and Time:<br>{$event['eventDate']} {$event['startTime']}</p><br>" .
                "<p>Duration: {$event['duration']} minutes</p><br>" .
                "<p>Tickets Left: {$event['availableTickets']}</p><br>" .
                "<p>Ticket Price: €<span id='ticketPrice'>{$event['price']}</span></p><br>" .
                "<p>Venue: {$event['venue']}</p><br>" .
                "<p>Location: $location</p>"
                )
            
            ?>
          </div>
        </div>
        <div class="bookingDetails">
          <div>
            <label>Email:<label>
            <input type="text" id="email" name="bEmail" value="<?php echo($email); ?>">
            <br>
            <label>Number of Tickets:<label>
            <input id="eNumberOfTickets" name="bNumberOfTickets" onchange = "calculatePrice()" type="number">
            <input type="hidden" id="avaliableTickets" name="bNumberOfAvaliableTickets" value="<?php echo($event['availableTickets'])?>">
          </div>
          <p>Amount to pay: €<span id="price">0.00</span></p>
          <input type="hidden" name="bPrice" id="priceInput">
          <input type="hidden" name="bEventID" value="<?php echo($event['eventID']); ?>">
        </div>
        <button type="submit" id="confirm">Confirm</button>
      <?php
    }
    else
    {
      echo "You do not have any bookings!";
    }
   ?>
  
  </form>

  <script src="../../JS/validation.js"></script>

<?php
  include("addBooking.php");
  require("../../additionalHtml/footer.html") 
?>

