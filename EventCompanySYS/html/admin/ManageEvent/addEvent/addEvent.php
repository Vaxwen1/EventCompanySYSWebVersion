<?php
    require_once("../../../pdo-conn.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $eEventName = $_POST['eEventName'];
        $eEventType = $_POST['eEventType'];
        $eClientID = $_POST['eClientID'];
        $eDescription = $_POST['eDescription'];
        $eVenueID = $_POST['eVenueID'];
        $eEventDate = $_POST['eEventDate'];
        $eStartTime = $_POST['eStartTime'];
        $eDuration = $_POST['eDuration'];
        $eCapacity = $_POST['eCapacity'];
        $eNumberOfTickets = $_POST['eNumberOfTickets'];
        $eTicketPrice = $_POST['eTicketPrice'];
        $eFilepath = $_POST['eFilepath'];
    
        
        $sql = "INSERT INTO Events (name, eventType, clientID, description, venueid, eventDate, startTime, duration,
            capacity, tickets, availableTickets, price, filepath, status)
            VALUES (:eEventName, :eEventType, :eClientID, :eDescription, :eVenueID, :eEventDate, :eStartTime, :eDuration, :eCapacity, :eNumberOfTickets, :eNumberOfTickets, :eTicketPrice, :eFilepath, 'A')";

        $stmt = $pdo->prepare($sql);
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
        $stmt->bindValue(':eTicketPrice', $eTicketPrice);
        $stmt->bindValue(':eFilepath', $eFilepath);
        
        $stmt->execute();
        echo '<div class="alert success">
        <strong>Success!</strong> The Event was successfully added to the system.
        <span class="closebtn">&times;</span>  
        </div>';
    }
?>