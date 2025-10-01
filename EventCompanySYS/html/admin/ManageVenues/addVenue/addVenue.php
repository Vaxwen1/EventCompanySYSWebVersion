<?php
    require_once("../../../pdo-conn.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $vVenueName = $_POST['vVenueName'];
        $vDescription = $_POST['vDescription'];
        $vCapacity = $_POST['vCapacity'];
        $vContactPerson = $_POST['vContactPerson'];
        $vContactNumber = $_POST['vContactNumber'];
        $vEmail = $_POST['vEmail'];
        $vBuilding = $_POST['vBuilding'];
        $vStreet = $_POST['vStreet'];
        $vCity = $_POST['vCity'];
        $vCounty = $_POST['vCounty'];
        $vEircode = $_POST['vEircode'];
        
        $sql = "INSERT INTO Venues (name, description, capacity, contactPerson, contactNumber, email, building, street, city, county, eircode, status)
        VALUES (:vVenueName, :vDescription, :vCapacity, :vContactPerson, :vContactNumber, :vEmail, :vBuilding, :vStreet, :vCity, :vCounty, :vEircode, 'A')";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':vVenueName', $vVenueName);
        $stmt->bindValue(':vDescription', $vDescription);
        $stmt->bindValue(':vCapacity', $vCapacity);
        $stmt->bindValue(':vContactPerson', $vContactPerson);
        $stmt->bindValue(':vContactNumber', $vContactNumber);
        $stmt->bindValue(':vEmail', $vEmail);
        $stmt->bindValue(':vBuilding', $vBuilding);
        $stmt->bindValue(':vStreet', $vStreet);
        $stmt->bindValue(':vCity', $vCity);
        $stmt->bindValue(':vCounty', $vCounty);
        $stmt->bindValue(':vEircode', $vEircode);

        $stmt->execute();
        echo '<div class="alert success">
            <strong>Success!</strong> The Venue was successfully added to the system.
            <span class="closebtn">&times;</span>  
            </div>';

    }
      
?>