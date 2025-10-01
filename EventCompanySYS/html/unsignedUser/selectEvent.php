<?php
if (!empty($_POST['eventID']))
{
    $_SESSION['eventID'] = $_POST['eventID'];
}
    $sql = "SELECT e.*, v.name AS venue, v.street as street, v.city AS city, v.county as county 
    FROM Events e
    JOIN Venues v ON e.venueID = v.venueID 
    WHERE eventID = :eEventID";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':eEventID', $_SESSION['eventID']);
    $stmt->execute();
    $event = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>