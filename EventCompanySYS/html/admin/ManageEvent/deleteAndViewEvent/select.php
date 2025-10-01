<?php
if (!isset($_POST['eventName']) || empty($_POST['eventName'])) {
    $sql = 'SELECT * FROM Events';
    $stmt = $pdo->prepare($sql);
} else {
    $sql = "SELECT * FROM Events WHERE name LIKE :cEventName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cEventName', '%' . $_POST['eventName'] . '%', PDO::PARAM_STR);
}

$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
