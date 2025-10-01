<?php
session_start();
$timeout_duration = 3600;
$userType = null;
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="../css/headerAndNav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/logIn.css">
    <title>Log in</title>
    <meta charset='utf-8'>
  </head>
    <body>
    <nav>
            <div class="navBar">

                <a href="../Index.php" class="dropdown-toggle">Events</a>
                <a href="LoginForm.php" class="dropdown-toggle">My Bookings</a>
                
            </div>

            <div class="login">
                <a href="LoginForm.php" class="dropdown-toggle">Log in</a>
            </div>
        </nav>
        <div class="loginForm">    
            <h2>Log In</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="uUsername" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="uPassword" required>
                </div>
                <button type="submit">Log In</button>
            </form>
        </div>

        <?php
            include("CheckUser.php");
            include("../additionalHtml/footer.html");
        ?>

    
    </body>
</html>