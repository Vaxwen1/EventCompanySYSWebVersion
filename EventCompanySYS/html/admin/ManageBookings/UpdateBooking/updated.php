<?php
require_once("../../../pdo-conn.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['submitDetails'])) {

    $bookingID = $_GET['bBookingID'];
    $email = $_GET['bEmail'];
    $eventID = $_GET['bEventID'];
    $numberOfTickets = $_GET['bNumberOfTickets'];
    $price = $_GET['bPrice'];
    $status = $_GET['cStatus'];
    $bAvaliableTickets = $_GET['bAvaliableTickets'];

    $newAvaliableTickets = (int)$bAvaliableTickets - (int)$numberOfTickets;

    $sql = "UPDATE bookings 
            SET email = :email, eventID = :eventID, numberOfTickets = :numberOfTickets, 
                price = :price, status = :status 
            WHERE bookingID = :bookingID";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':eventID', $eventID, PDO::PARAM_INT);
    $stmt->bindValue(':numberOfTickets', $numberOfTickets, PDO::PARAM_INT);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':bookingID', $bookingID, PDO::PARAM_INT);

    $stmt->execute();

    $sql = "Update Events
        SET availableTickets = :bavaliableTickets
        WHERE eventID = :bEventID";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bEventID', $eventID);
    $stmt->bindValue(':bavaliableTickets', $newAvaliableTickets);


    $stmt->execute();


    echo "<div class='alert success'>
            <strong>Success!</strong> Booking ID $bookingID has been successfully updated.
            <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>
            </div>";

}
?>
