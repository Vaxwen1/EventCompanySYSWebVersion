<?php
    require_once("../../../pdo-conn.php");
    
    $sql = "SELECT * FROM events WHERE status = 'A' AND availableTickets != 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>