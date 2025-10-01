<?php
    require_once("../../../pdo-conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['venueID']) && !empty($_POST['venueID'])) {
            $cClientID = $_POST['venueID'];

            $sql = "SELECT * FROM venues WHERE venueID = :cid";
            $result = $pdo->prepare($sql);
            $result->bindValue(':cid', $cClientID, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row)
            {
                $id = $row['venueID'];
                $name = $row['name'];
                $description = $row['description'];
                $capacity = $row['capacity'];
                $contactPerson = $row['contactPerson'];
                $telephone = $row['contactNumber'];
                $email = $row['email'];
                $building = $row['building'];
                $street = $row['street'];
                $city = $row['city'];
                $county = $row['county'];
                $eircode = $row['eircode'];
                $status = $row['status'];
            }
        }
    }
?>
