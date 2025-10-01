<?php
require_once("../../../pdo-conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submitDetails'])) {
    $cClientID = $_GET['cClientID'];
    $cOrgName = $_GET['cOrgName'];
    $cContactPerson = $_GET['cContactPerson'];
    $cTelephone = $_GET['cTelephone'];
    $cEmail = $_GET['cEmail'];
    $cBuilding = $_GET['cBuilding'];
    $cStreet = $_GET['cStreet'];
    $cCity = $_GET['cCity'];
    $cCounty = $_GET['cCounty'];
    $cEircode = $_GET['cEircode'];
    $cStatus = $_GET['cStatus'];

    $sql = 'UPDATE clients 
            SET orgName = :cOrgName, contactPerson = :cContactPerson, telephone = :cTelephone, email = :cEmail, 
                building = :cBuilding, street = :cStreet, city = :cCity, county = :cCounty, eircode = :cEircode,
                status = :cStatus 
            WHERE clientID = :cClientID';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':cClientID', $cClientID, PDO::PARAM_INT);
    $stmt->bindValue(':cOrgName', $cOrgName);
    $stmt->bindValue(':cContactPerson', $cContactPerson);
    $stmt->bindValue(':cTelephone', $cTelephone);
    $stmt->bindValue(':cEmail', $cEmail);
    $stmt->bindValue(':cBuilding', $cBuilding);
    $stmt->bindValue(':cStreet', $cStreet);
    $stmt->bindValue(':cCity', $cCity);
    $stmt->bindValue(':cCounty', $cCounty);
    $stmt->bindValue(':cEircode', $cEircode);
    $stmt->bindValue(':cStatus', $cStatus);

    if ($stmt->execute()) {
        echo "<div class='alert success'>
            <strong>Success!</strong> The client with ID $cClientID was successfully updated.
            <span class='closebtn'>&times;</span>
        </div>";
    } else {
        echo "<div class='alert error'>
            <strong>Error!</strong> Failed to update client.
            <span class='closebtn'>&times;</span>
        </div>";
    }
}
?>
