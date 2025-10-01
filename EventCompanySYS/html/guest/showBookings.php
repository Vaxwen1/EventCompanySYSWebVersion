<?php
    include_once("../pdo-conn.php");
    
    $sql = "SELECT Events.name, Events.eventType, Events.description, Events.eventDate, Events.startTime, Events.duration, Events.filepath, Bookings.*
            FROM Bookings
            JOIN Events ON Bookings.eventid = Events.eventID
            WHERE Bookings.email = :bEmail";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bEmail', $email);
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($bookings)
    {
        foreach ($bookings as $row) 
        { 
            ?>
                <div class="frame" id ="redirect">
                    <p id="optionName"><?php echo($row['name'])  ?></p>
                    <img id="banner" src="<?php echo("../../" . $row['filepath']) ?>">
                    <div class= "description">
                        <p><?php echo("Date: " . $row['eventDate'] . " Time: " .substr($row['startTime'], 0, 5)) ?></p>
                        <p><?php echo("Number of tickets: " . $row['numberOfTickets'] . " Paid amount:" . $row['price'] . "€" ) ?></p>
                    </div>
                    <div class="buttons">
                        <button id="action">Change Booking</button>
                    </div>
                </div>

            <?php
        
        }
    }


?>
