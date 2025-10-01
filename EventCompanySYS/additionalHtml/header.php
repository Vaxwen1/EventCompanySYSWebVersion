<?php
session_start();
$timeout_duration = 3600;
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="../css/headerAndNav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/logIn.css">
    <title>Bookings</title>
    <meta charset='utf-8'>
  </head>
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
                                <a class="dropdown-toggle"><?php echo "$userName"; ?></a>
                                <div class="dropdown">
                                    <a id="link" href="../../../Index/php">Log Out</a>
                                </div>
                            </div>
                        <?php
                    }
                     ?>
            </div>
        </nav>
