<?php
session_start();
$timeout_duration = 3600;  
$userName = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
  session_unset();
  session_destroy();
  header("Location: ../../../../Index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <link rel="stylesheet" href="../../../../css/headerAndNav.css">
  <link rel="stylesheet" href="../../../../css/listOfSomething.css">
  <link rel="stylesheet" href="../../../../css/addForm.css">
  <link rel="stylesheet" href="../../../../css/errors.css">
  <title>Admin Management</title>
  <meta charset='utf-8'>
</head>
<body>
  <nav>
    <div class="navBar">

      <!-- Clients Dropdown -->
      <div class="dropdown-container">
        <a class="dropdown-toggle">Clients</a>
        <div class="dropdown">
          <a id="link" href="../../ManageClient/addClient/registrationFormClient.php">Add Client</a>
          <a id="link" href="../../ManageClient/deleteAndViewClients/ListOfClients.php">List Of Clients</a>
        </div>
      </div>

      <!-- Events Dropdown -->
      <div class="dropdown-container">
        <a class="dropdown-toggle">Events</a>
        <div class="dropdown">
          <a id="link" href="../../ManageEvent/addEvent/regisctrationFormEvent.php">Add Event</a>
          <a id="link" href="../../ManageEvent/deleteAndViewEvent/ListOfEvents.php">List Of Events</a>
        </div>
      </div>

      <!-- Venues Dropdown -->
      <div class="dropdown-container">
        <a class="dropdown-toggle">Venues</a>
        <div class="dropdown">
          <a id="link" href="../../ManageVenues/addVenue/regisctrationFormVenue.php">Add Venue</a>
          <a id="link" href="../../ManageVenues/deleteAndViewVenue/ListOfVenues.php">List Of Venues</a>
        </div>
      </div>

      <!-- Bookings Dropdown -->
      <div class="dropdown-container">
        <a class="dropdown-toggle">Bookings</a>
        <div class="dropdown">
          <a id="link" href="../../ManageBookings/addBooking/regisctrationFormBooking.php">Add Booking</a>
          <a id="link" href="../../ManageBookings/deleteAndViewBookings/ListOfBookings.php">List Of Bookings</a>
        </div>
      </div>

    </div>

    <!-- Logged-in user + Log Out -->
    <div class="login">
      <div class="dropdown-container">
        <a class="dropdown-toggle"><?php echo htmlspecialchars($userName); ?></a>
        <div id="logout" class="dropdown">
        <form id="logoutForm" method="POST" style="display:none;">
          <input type="hidden" name="action" value="logout">
        </form>
        <a href="#" onclick="document.getElementById('logoutForm').submit();">Log Out</a>
        </div>
      </div>
    </div>
  </nav>

<!-- 
Reference: W3Schools - How To Create a Dropdown Navbar
https://www.w3schools.com/howto/howto_css_dropdown_navbar.asp 
-->