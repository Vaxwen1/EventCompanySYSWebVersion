<?php
if (!isset($_POST['orgName']) || empty($_POST['orgName'])) {
    $sql = 'SELECT * FROM Clients';
    $stmt = $pdo->prepare($sql);
} else {
    $sql = "SELECT * FROM Clients WHERE orgName LIKE :cOrgName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cOrgName', '%' . $_POST['orgName'] . '%', PDO::PARAM_STR);
}

$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
