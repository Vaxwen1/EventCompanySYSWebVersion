<?php
    require_once("../../../pdo-conn.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $cOrgName = $_POST['cOrgName'];
        $cContactPerson = $_POST['cContactPerson'];
        $cTelephone = $_POST['cTelephone'];
        $cEmail = $_POST['cEmail'];
        $cBuilding = $_POST['cBuilding'];
        $cStreet = $_POST['cStreet'];
        $cCity = $_POST['cCity'];
        $cCountry = $_POST['cCountry'];
        $cEircode = $_POST['cEircode'];
        
      
        $sql = "INSERT INTO Clients (orgName, contactPerson, telephone, email, building, street, city, county, eircode, status) 
                VALUES (:cOrgName, :cContactPerson, :cTelephone, :cEmail, :cBuilding, :cStreet, :cCity, :cCountry, :cEircode, 'A')";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':cOrgName', $cOrgName);
        $stmt->bindValue(':cContactPerson', $cContactPerson);
        $stmt->bindValue(':cTelephone', $cTelephone);
        $stmt->bindValue(':cEmail', $cEmail);
        $stmt->bindValue(':cBuilding', $cBuilding);
        $stmt->bindValue(':cStreet', $cStreet);
        $stmt->bindValue(':cCity', $cCity);
        $stmt->bindValue(':cCountry', $cCountry);
        $stmt->bindValue(':cEircode', $cEircode);

        $stmt->execute();
        echo '<div class="alert success">
            <strong>Success!</strong> The Client was successfully added to the system.
            <span class="closebtn">&times;</span>  
            </div>';
    }
?>
