<?php
if (!isset($_POST['BookingEmail']) || empty($_POST['BookingEmail'])) {
    $sql = 'SELECT * FROM Bookings';
    $stmt = $pdo->prepare($sql);
} else {
    $sql = "SELECT * FROM Bookings WHERE email LIKE :bBookingEmail";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bBookingEmail', '%' . $_POST['BookingEmail'] . '%', PDO::PARAM_STR);
}

$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
