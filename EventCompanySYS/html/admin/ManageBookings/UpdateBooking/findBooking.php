<?php
    require_once("../../../pdo-conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        if (isset($_POST['bookingID']) && !empty($_POST['bookingID'])) {
            $bBookingID = $_POST['bookingID'];

            $sql = "SELECT Bookings.*, Events.name AS EventName
            FROM Bookings
            JOIN Events ON Bookings.eventID = Events.eventID
            WHERE Bookings.bookingID = :cid";
            $result = $pdo->prepare($sql);
            $result->bindValue(':cid', $bBookingID, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                $id = $row['bookingID'];
                $email = $row['email'];
                $eventid = $row['eventid'];
                $eventName = $row['EventName'];
                $numberOfTickets = $row['numberOfTickets'];
                $price = $row['price'];
                $status = $row['status'];
            }
    }
}
?>
