<?php
    require_once("../../../pdo-conn.php");
    
    $sql = "SELECT * FROM eventTypes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $eventTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT clientID, orgName, contactPerson, building, street, city, county  FROM Clients";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT venueID, name, description, capacity, building, street, city, county FROM Venues WHERE status = 'A'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $venues = $stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>