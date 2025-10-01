<?php
 session_start();
 $timeout_duration = 3600;
 if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['username'];
} else {
    $userType = null;
    $userName = "";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: Index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="css/headerAndNav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Events</title>
    <meta charset='utf-8'>
  </head>
        <body>

            <nav>
                <div class="navBar">

                    <a href="Index.php" class="dropdown-toggle">Events</a>

                    <?php
                        if($userType == 'Client'){
                            ?>
                                <a href="html/guest/MyBookings.php" class="dropdown-toggle">My Bookings</a>
                            <?php
                        }
                        else if ($userType == 'Admin' || $userType == 'Staff')
                        {
                            ?>
                                <a href="html/admin/ManageBookings/deleteAndViewBookings/ListOfBookings.php" class="dropdown-toggle">Manage Bookings</a>
                            <?php
                        }
                        else
                        {
                            echo '<a href="html/LoginForm.php" class="dropdown-toggle">My Bookings</a>';
                        }
                    ?>
                    

                </div>

                <div class="login">
                    <?php
                        if (empty($userName))
                        {
                            echo '<p><a href="html/LoginForm.php">Log in</a></p>';
                        }
                        else
                        {
                            ?>
                                <div class="dropdown-container">
                                    <a class="dropdown-toggle"><?php echo htmlspecialchars($userName); ?></a>
                                    <div id="logout" class="dropdown">
                                        <form id="logoutForm" method="POST" style="display:none;">
                                            <input type="hidden" name="action" value="logout">
                                        </form>
                                        <a href="#" onclick="document.getElementById('logoutForm').submit();">Log Out</a>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                </div>
            </nav>
            <h1>Events</h1>
            <div>
                <form class="filter" action="Index.php" method="POST">
                    <div class="location">
                        <img id="icon" src="img/icons/navigationArr.png">
                        <select name="eCounty">
                            <option></option>
                            <option>Antrim</option>
                            <option>Armagh</option>
                            <option>Carlow</option>
                            <option>Cavan</option>
                            <option>Clare</option>
                            <option>Cork</option>
                            <option>Donegal</option>
                            <option>Down</option>
                            <option>Dublin</option>
                            <option>Dún Laoghaire–Rathdown</option>
                            <option>Fingal</option>
                            <option>South Dublin</option>
                            <option>Fermanagh</option>
                            <option>Galway</option>
                            <option>Kerry</option>
                            <option>Kildare</option>
                            <option>Kilkenny</option>
                            <option>Laois</option>
                            <option>Leitrim</option>
                            <option>Limerick</option>
                            <option>Londonderry</option>
                            <option>Longford</option>
                            <option>Louth</option>
                            <option>Mayo</option>
                            <option>Meath</option>
                            <option>Monaghan</option>
                            <option>Offaly</option>
                            <option>Roscommon</option>
                            <option>Sligo</option>
                            <option>Tipperary</option>
                            <option>Tyrone</option>
                            <option>Waterford</option>
                            <option>Westmeath</option>
                            <option>Wexford</option>
                            <option>Wicklow</option>
                        </select>
                    </div>
                    <div class="date">
                        <img id="icon" src="img/icons/calendar.png">

                        <input type="date" id="date" name="eDate">
                    </div>

                    <div class="eventName">
                        <img id="icon" src="img/icons/search.png">
                        
                        <input type="text" name="eName">
                    </div>
                    
                    <button id="search">Search</button>
                </form>

                <form class="listOfEvents" method="post" action="html/unsignedUser/bookTicket.php">
                    <?php
                        include("html/unsignedUser/showEvents.php");
                    ?>
                </form>
        
            </div>

        <footer id="footer">
                
        </footer>
    </body>
</html>

<!-- 
References:

1. Ticketmaster (Events Page)
   https://www.ticketmaster.ie/?region=608

Image Sources:

2. NYIT Events Page
   https://www.nyit.edu/events/

3. Cloud Computing Illustration by FLY:D on Unsplash
   https://unsplash.com/photos/a-computer-screen-with-a-cloud-shaped-object-on-top-of-it-FocSgUZ10JM

4. Woman Playing Chess Against a Robot – Photo by Pavel Danilyuk on Pexels
   https://www.pexels.com/photo/woman-in-white-shirt-playing-chess-against-a-robot-8438951/

5. Businessman Exiting Office – Photo by Andrea Piacquadio on Pexels
   https://www.pexels.com/photo/marketing-businessman-exit-office-7414274/

6. Concert Crowd – Photo by Wendy Wei on Pexels
   https://www.pexels.com/photo/photo-of-crowd-in-front-of-stage-2747450/
-->

