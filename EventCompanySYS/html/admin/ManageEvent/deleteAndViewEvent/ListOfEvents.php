<link rel="stylesheet" href="../../../css/listOfClients.css">
<?php
require_once("../../../pdo-conn.php");
include ("../../../../additionalHtml/adminHeader.php");
   
    include "select.php";
    ?>
    <h1>List Of Events</h1>
    <form class="search" action="ListOfEvents.php" method="POST">
        <input id ="searchField" type="text" name="eventName" placeholder="Search Event">
        <button id="searchbtn" type="submit">Search</button>
    </form>
        <?php
        if (count($events) > 0) {
            ?>
            
            <table class = "list"> 
                    <thead>
                        <tr>
                            <th id ="top">EventID</th>
                            <th id ="top">Event Name</th>
                            <th id ="top">Event Type</th>
                            <th id ="top">Client ID</th>
                            <th id ="top">Description</th>
                            <th id ="top">VenueID</th>
                            <th id ="top">Event Date</th>
                            <th id ="top">Start Time</th>
                            <th id ="top">Duration</th>
                            <th id ="top">Capacity</th>
                            <th id ="top">Tickets</th>
                            <th id ="top">Avaliable Tickets</th>
                            <th id ="top">Price</th>
                            <th id ="top">File</th>
                            <th id ="top">Status</th>
                            <th id ="top">Action</th>
                        </tr>
                    </thead>
                <tbody>

            <?php

            
            foreach ($events as $row) 
            { 
                ?>
            
                <tr>
                    <?php
                        echo 
                        "<td>" . $row['eventID']."</td>" .
                        "<td>" . $row['name']."</td>" .
                        "<td>" . $row['eventType'] . "</td>" .
                        "<td>" . $row['clientID'] . "</td>" .
                        "<td>" . $row['description'] . "</td>" .  
                        "<td>" . $row['venueid'] . "</td>" . 
                        "<td>" . $row['eventDate'] . "</td>" . 
                        "<td>" . $row['startTime'] . "</td>" . 
                        "<td>" . $row['duration'] . "</td>" . 
                        "<td>" . $row['capacity'] . "</td>" . 
                        "<td>" . $row['tickets'] . "</td>" . 
                        "<td>" . $row['availableTickets'] . "</td>" . 
                        "<td>" . $row['price'] . "</td>" . 
                        "<td>" . $row['filepath'] . "</td>" . 
                        "<td>" . $row['status'] . "</td>" 
                    ?>

                <td>
                    <div class="action">
                        <form action="../UpdateEvent/updateEvent.php" method ="post">
                        <input type="hidden">
                        <button type="submit" name="eventID" value="<?php echo $row['eventID']; ?>">
                            <img id="icon" src="../../../../img/icons/update.png">
                        </button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="eventID" value="<?php echo $row['eventID']; ?>">
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
include "deleteEvent.php";
include ("../../../../additionalHtml/footer.html");

?>




