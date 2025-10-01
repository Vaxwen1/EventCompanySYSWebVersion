<!--Reference: HTML Living Standard - Embedding custom non-visible data with the data-* attributes
https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes -->

<?php
require_once("../../../pdo-conn.php");
require ("../../../../additionalHtml/adminHeader.php");
   
    include "select.php";
    ?>
    <h1>List Of Bookings</h1>
    <form class="search" action="ListOfBookings.php" method="POST">
        <input id ="searchField" type="text" name="BookingEmail" placeholder="Search Booking">
        <button id="searchbtn" type="submit">Search</button>
    </form>
        <?php
        if (count($bookings) > 0) {
            ?>
            
            <table class = "list"> 
                    <thead>
                        <tr>
                            <th id ="top">Booking Number</th>
                            <th id ="top">Email</th>
                            <th id ="top">Event</th>
                            <th id ="top">Number Of Tickets</th>
                            <th id ="top">Price</th>
                            <th id ="top">Status</th>
                            <th id ="top">Email</th>
                            <th id ="top">Action</th>
                        </tr>
                    </thead>
                <tbody>

            <?php

            
            foreach ($bookings as $row) 
            { 
                ?>
            
                <tr>
                    <?php
                        echo 
                        "<td>" . $row['bookingID']."</td>" .
                        "<td>" . $row['email']."</td>" .
                        "<td>" . $row['eventid'] . "</td>" .
                        "<td>" . $row['numberOfTickets'] . "</td>" .  
                        "<td>" . $row['price'] . "</td>" . 
                        "<td>" . $row['email'] . "</td>" . 
                        "<td>" . $row['status'] . "</td>";      
                    ?>

                <td>
                    <div class="action">
                        <form action="../UpdateBooking/updateBooking.php" method ="post">
                        <input type="hidden">
                        <button type="submit" name="bookingID" value="<?php echo $row['bookingID']; ?>">
                            <img id="icon" src="../../../../img/icons/update.png">
                        </button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="bookingID" value="<?php echo $row['bookingID']; ?>">
                            <button type="submit">
                                <img id ="icon" src="../../../../img/icons/binIcon.png">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

<?php 
include "deleteBooking.php";
include ("../../../../additionalHtml/footer.html");

?>




