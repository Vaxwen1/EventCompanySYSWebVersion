<?php
require_once("../../../pdo-conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clientID'])) {
    $clientID = $_POST['clientID'];

    try {
        $sql = 'DELETE FROM Clients WHERE clientID = :cid';
        $result = $pdo->prepare($sql);
        $result->bindValue(':cid', $clientID, PDO::PARAM_INT);
        $result->execute();

        echo "<div class='alert success'>
                <strong>Success!</strong> Client no. $clientID was deleted.
                <span class='closebtn'>&times;</span>
              </div>";

    } catch (PDOException $e) {
        
        $sql = 'UPDATE Clients SET status = "D" WHERE clientID = :cid';
        $result = $pdo->prepare($sql);
        $result->bindValue(':cid', $clientID, PDO::PARAM_INT);
        $result->execute();

        echo "<div class='alert info'>
                <strong>Info!</strong> Could not delete client $clientID. Client status set to \"D\" instead.
                <span class='closebtn'>&times;</span>
              </div>";
    }
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