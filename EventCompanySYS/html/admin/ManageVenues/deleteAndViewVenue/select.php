<?php
if (!isset($_POST['venueName']) || empty($_POST['venueName'])) {
    $sql = 'SELECT * FROM Venues';
    $stmt = $pdo->prepare($sql);
} else {
    $sql = "SELECT * FROM Venues WHERE name LIKE :cVenueName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cVenueName', '%' . $_POST['venueName'] . '%', PDO::PARAM_STR);
}

$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
