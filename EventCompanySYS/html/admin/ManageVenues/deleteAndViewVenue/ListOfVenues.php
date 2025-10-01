<?php
require_once("../../../pdo-conn.php");
include ("../../../../additionalHtml/adminHeader.php");
   
    include "select.php";
    ?>
    <h1>List Of Venues</h1>
    <form class="search" action="ListOfVenues.php" method="POST">
        <input id ="searchField" type="text" name="venueName" placeholder="Search Venue">
        <button id="searchbtn" type="submit">Search</button>
    </form>
        <?php
        if (count($events) > 0) {
            ?>
            
            <table class = "list"> 
                    <thead>
                        <tr>
                            <th id ="top">VenueID</th>
                            <th id ="top">Venue Name</th>
                            <th id ="top">Description</th>
                            <th id ="top">Capacity</th>
                            <th id ="top">Contact Person</th>
                            <th id ="top">Coctact Number</th>
                            <th id ="top">Email</th>
                            <th id ="top">Address</th>
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
                        "<td>" . $row['venueID']."</td>" .
                        "<td>" . $row['name']."</td>" .
                        "<td>" . $row['description'] . "</td>" .
                        "<td>" . $row['capacity'] . "</td>" .
                        "<td>" . $row['contactPerson'] . "</td>" .  
                        "<td>" . $row['contactNumber'] . "</td>" . 
                        "<td>" . $row['email'] . "</td>" . 
                        "<td>" . $row['building'] . ", " . 
                        $row['street'] . ", " . 
                        $row['city'] . ", " . 
                        $row['county'] . ", " . 
                        $row['eircode'] . "</td>" 
                    ?>

                <td>
                    <div class="action">
                        <form action="../UpdateVenue/updateVenue.php" method ="post">
                        <input type="hidden">
                        <button type="submit" name="venueID" value="<?php echo $row['venueID']; ?>">
                            <img id="icon" src="../../../../img/icons/update.png">
                        </button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="venueID" value="<?php echo $row['venueID']; ?>">
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
include "deleteVenue.php";
include ("../../../../additionalHtml/footer.html");

?>




