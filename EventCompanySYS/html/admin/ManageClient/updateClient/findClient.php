<?php
    require_once("../../../pdo-conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['clientID']) && !empty($_POST['clientID'])) {
            $cClientID = $_POST['clientID'];

            $sql = "SELECT * FROM clients WHERE clientID = :cid";
            $result = $pdo->prepare($sql);
            $result->bindValue(':cid', $cClientID, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                $id = $row['clientID'];
                $name = $row['orgName'];
                $contactPerson = $row['contactPerson'];
                $telephone = $row['telephone'];
                $email = $row['email'];
                $building = $row['building'];
                $street = $row['street'];
                $city = $row['city'];
                $county = $row['county'];
                $eircode = $row['eircode'];
                $status = $row['status'];
            } else {
                echo "<br>No client found with ID: " . htmlspecialchars($cClientID);
            }
        } else {
            echo "Error: Client ID is missing.";
        }
    }
?>
