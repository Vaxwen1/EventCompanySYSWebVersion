<?php
require_once("../../../pdo-conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookingID']))
 {
    $bookingID = $_POST['bookingID'];

    $sql = 'DELETE FROM Bookings WHERE bookingID = :bid';

    $result = $pdo->prepare($sql);
    
    $result->bindValue(':bid', $bookingID, PDO::PARAM_INT);

    $result->execute();


    
    
    echo "<div class='alert success'>
                <strong>Success!</strong> Booking no.$bookingID was deleted.
                <span class='closebtn'>&times;</span>
            </div>";


}
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var close = document.getElementsByClassName("closebtn");
        for (var i = 0; i < close.length; i++) {
            close[i].onclick = function () {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function () { div.style.display = "none"; div.style.opacity = "1"; }, 600);
            }
        }
    });
</script>