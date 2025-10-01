<?php
require_once("../../../pdo-conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submitDetails'])) {
    $eEventID = $_GET['eEventID'];
    $eEventName = $_GET['eEventName'];
    $eEventType = $_GET['eEventType'];
    $eClientID = $_GET['eClientID'];
    $eDescription = $_GET['eDescription'];
    $eVenueID = $_GET['eVenueID'];
    $eEventDate = $_GET['eEventDate'];
    $eStartTime = $_GET['eStartTime'];
    $eDuration = $_GET['eDuration'];
    $eCapacity = $_GET['eCapacity'];
    $eNumberOfTickets = $_GET['eNumberOfTickets'];
    $eAvailableTicket = $_GET['eAvailableTicket'];
    $eTicketPrice = $_GET['eTicketPrice'];
    $eFilepath = $_GET['eFilepath'];
    $eStatus = $_GET['eStatus'];

    $sql = 'UPDATE Events 
        SET name = :eEventName,
            eventType = :eEventType,
            clientID = :eClientID,
            description = :eDescription,
            venueid = :eVenueID,
            eventDate = :eEventDate,
            startTime = :eStartTime,
            duration = :eDuration,
            capacity = :eCapacity,
            tickets = :eNumberOfTickets,
            availableTickets = :eAvailableTicket,
            price = :eTicketPrice,
            filepath = :eFilepath,
            status = :eStatus
        WHERE eventID = :eEventID';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':eEventID', $eEventID, PDO::PARAM_INT);
    $stmt->bindValue(':eEventName', $eEventName);
    $stmt->bindValue(':eEventType', $eEventType);
    $stmt->bindValue(':eClientID', $eClientID);
    $stmt->bindValue(':eDescription', $eDescription);
    $stmt->bindValue(':eVenueID', $eVenueID);
    $stmt->bindValue(':eEventDate', $eEventDate);
    $stmt->bindValue(':eStartTime', $eStartTime);
    $stmt->bindValue(':eDuration', $eDuration);
    $stmt->bindValue(':eCapacity', $eCapacity);
    $stmt->bindValue(':eNumberOfTickets', $eNumberOfTickets);
    $stmt->bindValue(':eAvailableTicket', $eAvailableTicket);
    $stmt->bindValue(':eTicketPrice', $eTicketPrice);
    $stmt->bindValue(':eFilepath', $eFilepath);
    $stmt->bindValue(':eStatus', $eStatus);

    if ($stmt->execute()) {
        echo "<div class='alert success'>
            <strong>Success!</strong> The event with ID $eEventID was successfully updated.
            <span class='closebtn'>&times;</span>
        </div>";
    } else {
        echo "<div class='alert error'>
            <strong>Error!</strong> Failed to update event.
            <span class='closebtn'>&times;</span>
        </div>";
    }
}
?>
