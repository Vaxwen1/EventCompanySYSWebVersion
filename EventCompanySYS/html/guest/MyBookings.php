<?php
    require("../../additionalhtml/guestHeader.php");
    if(isset($_SESSION['userEmail']))
    {
        $email = $_SESSION['userEmail'];
    }
    else{$email = "";}
    ?>
    <h1>My Bookings</h1>
        <div>
            <div class= "listOfEvents">
                
                <?php
                    include("showBookings.php");
                ?>
    
            </div>
        </div>
    </body>
    <?php include "../../additionalhtml/footer.html"; ?>
</html>

