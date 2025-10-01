<?php

    include_once("html/pdo-conn.php");
    
    $sql = "SELECT * FROM Events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['eCounty']) || isset($_POST['eDate']) || isset($_POST['eName'])))
    {

        $conditions = [];
        $params = [];

        if (!empty($_POST['eCounty'])) {
            $conditions[] = "v.county = :county";
            $params[':county'] = $_POST['eCounty'];
        }

        if (!empty($_POST['eDate'])) {
            $conditions[] = "e.eventDate = :eventDate";
            $params[':eventDate'] = $_POST['eDate'];
        }

        if (!empty($_POST['eName'])) {
            $conditions[] = "e.name LIKE :eventName";
            $params[':eventName'] = "%" . $_POST['eName'] . "%";
        }

        $sql = "SELECT e.*, v.name AS venue, v.street as street, v.city AS city, v.county as county 
        FROM Events e
        JOIN Venues v ON e.venueID = v.venueID";

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {

        $sql = "SELECT e.*, v.name AS venue, v.street as street, v.city AS city, v.county as county 
        FROM Events e
        JOIN Venues v ON e.venueID = v.venueID";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($events)
    {
        foreach ($events as $row) 
        { 
            ?>
                <div class="frame" id ="redirect">
                    <p id="optionName"><?php echo($row['name'])  ?></p>
                    <img id="banner" src="<?php echo($row['filepath']) ?>">
                    <div class= "description">
                        <p><?php echo("Date: " . $row['eventDate'] . " Time: " . $row['startTime'] ) ?></p>
                        <p><?php echo("Tickets Left: " . $row['availableTickets'] . " Price: " . $row['price'] . "€" ) ?></p>
                        <p><?php echo("Vanue: " . $row['venue']) ?></p>
                        <p><?php echo("Location: " . $row['street'] . ", ". $row['city'] .", " . $row['county']) ?></p>
                    </div>
                    <div class="buttons">
                        <button id="action" name="eventID" value="<?php echo($row['eventID']); ?>" type="submit">Book Tickets</button>
                    </div>
                </div>

            <?php
        
        }
    }


?>
