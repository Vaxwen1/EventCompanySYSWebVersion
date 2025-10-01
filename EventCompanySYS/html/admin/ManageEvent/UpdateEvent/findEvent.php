<?php
    require_once("../../../pdo-conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['eventID']) && !empty($_POST['eventID'])) {
            $eEventID = $_POST['eventID'];

            $sql = "SELECT e.*, et.Name AS eventTypeMeaning, c.orgName AS client, v.name AS venueName
                FROM Events e
                JOIN EventTypes et ON e.eventType = et.typeID
                JOIN Clients c ON e.clientID = c.clientID
                JOIN Venues v ON e.venueid = v.venueid
                WHERE e.eventID = :cid";

            $result = $pdo->prepare($sql);
            $result->bindValue(':cid', $eEventID, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                $id = $row['eventID'];
                $name = $row['name'];
                $eventType = $row['eventType'];
                $clientID = $row['clientID'];
                $description = $row['description'];
                $venueID = $row['venueid'];
                $eventDate = $row['eventDate'];
                $startTime = $row['startTime'];
                $duration = $row['duration'];
                $capacity = $row['capacity'];
                $tickets = $row['tickets'];
                $availableTickets = $row['availableTickets'];
                $price = $row['price'];
                $filepath = $row['filepath'];
                $status = $row['status'];
                $eventTypeMeaning = $row['eventTypeMeaning'];
                $client = $row['client'];
                $venueName = $row['venueName'];

            } else {
                echo "<br>No event found with ID: " . htmlspecialchars($cClientID);
            }
        }
    }
?>
