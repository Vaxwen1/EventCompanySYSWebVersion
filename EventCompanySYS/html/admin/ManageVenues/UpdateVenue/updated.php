<?php
require_once("../../../pdo-conn.php");
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submitDetails'])) {
    $vVenueID = $_GET['vVenueID'];
    $vName = $_GET['vName'];
    $vDescription = $_GET['vDescription'];
    $vCapacity = $_GET['vCapacity'];
    $vContactPerson = $_GET['vContactPerson'];
    $vTelephone = $_GET['vTelephone'];
    $vEmail = $_GET['vEmail'];
    $vBuilding = $_GET['vBuilding'];
    $vStreet = $_GET['vStreet'];
    $vCity = $_GET['vCity'];
    $vCounty = $_GET['vCounty'];
    $vEircode = $_GET['vEircode'];
    $vStatus = $_GET['vStatus'];

    $sql = 'UPDATE Venues 
            SET name = :vName,
                description = :vDescription,
                capacity = :vCapacity,
                contactPerson = :vContactPerson,
                contactNumber = :vTelephone,
                email = :vEmail,
                building = :vBuilding,
                street = :vStreet,
                city = :vCity,
                county = :vCounty,
                eircode = :vEircode,
                status = :vStatus
            WHERE venueID = :vVenueID';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':vName', $vName);
    $stmt->bindValue(':vDescription', $vDescription);
    $stmt->bindValue(':vCapacity', $vCapacity, PDO::PARAM_INT);
    $stmt->bindValue(':vContactPerson', $vContactPerson);
    $stmt->bindValue(':vTelephone', $vTelephone);
    $stmt->bindValue(':vEmail', $vEmail);
    $stmt->bindValue(':vBuilding', $vBuilding);
    $stmt->bindValue(':vStreet', $vStreet);
    $stmt->bindValue(':vCity', $vCity);
    $stmt->bindValue(':vCounty', $vCounty);
    $stmt->bindValue(':vEircode', $vEircode);
    $stmt->bindValue(':vStatus', $vStatus);
    $stmt->bindValue(':vVenueID', $vVenueID, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<div class='alert success'>
            <strong>Success!</strong> Venue updated successfully.
            <span class='closebtn'>&times;</span>
        </div>";
    } else {
        echo "<div class='alert error'>
            <strong>Error!</strong> Failed to update venue.
            <span class='closebtn'>&times;</span>
        </div>";
    }
}

?>
