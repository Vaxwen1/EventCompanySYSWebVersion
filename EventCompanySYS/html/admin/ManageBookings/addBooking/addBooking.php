<?php
    require_once("../../../pdo-conn.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $bEmail = $_POST['bEmail'];
        $bEventID = $_POST['bEventID'];
        $bNumberOfTickets = $_POST['bNumberOfTickets'];
        $bPrice = $_POST['bPrice'];
        $bAvaliableTickets = $_POST['bAvaliableTickets'];
        
        $sql = "INSERT INTO Bookings (email, eventid, numberOfTickets, price, status)
        VALUES (:bEmail, :bEventID, :bNumberOfTickets, :bPrice, 'A')";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':bEmail', $bEmail);
        $stmt->bindValue(':bEventID', $bEventID);
        $stmt->bindValue(':bNumberOfTickets', $bNumberOfTickets);
        $stmt->bindValue(':bPrice', $bPrice);

        $stmt->execute();

        $sql = "Update Events
        SET availableTickets = :bavaliableTickets
        WHERE eventID = :bEventID";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':bEventID', $bEventID);
        $stmt->bindValue(':bavaliableTickets', ($bAvaliableTickets - $bNumberOfTickets));


        $stmt->execute();


        echo '<div class="alert success">
            <strong>Success!</strong> The Booking was successfully added to the system.
            <span class="closebtn">&times;</span>  
            </div>';
        
}
    
      
?>