<!-- 
Reference: W3Schools - How To Create an Alert Box
https://www.w3schools.com/howto/howto_js_alert.asp 
-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $bEmail = $_GET['bEmail'];
    $bNumberOfTickets = (int) $_GET['bNumberOfTickets'];
    $bPrice = $_GET['bPrice'];
    $bEventID = $_GET['bEventID'];

    $avaliableTickets = ((int)$_GET['bNumberOfAvaliableTickets']);

    if(!$bNumberOfTickets > $avaliableTickets){
        
        $avaliableTickets = ((int)$_GET['bNumberOfAvaliableTickets']) - $bNumberOfTickets;

        $sql = "INSERT INTO Bookings (email, eventid, numberOfTickets, price, status)
                VALUES (:bEmail, :bEventID, :bNumberOfTickets, :bPrice, 'A')";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':bEmail', $bEmail);
        $stmt->bindValue(':bNumberOfTickets', $bNumberOfTickets);
        $stmt->bindValue(':bPrice', $bPrice);
        $stmt->bindValue(':bEventID', $bEventID);

        $stmt->execute();


        $sql = "UPDATE Events SET availableTickets = :bAvaliableTickets WHERE eventID = :beventID";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':bAvaliableTickets', $avaliableTickets);
        $stmt->bindValue(':beventID', $bEventID);

        $stmt->execute();

        echo '<div class="alert success">
                <strong>Success!</strong> Your booking was successfully saved.
                <span class="closebtn">&times;</span>  
                </div>';
    }
    else
    {
        echo '<div class="alert error">
        <strong>Error!</strong> The number of tickets should be less the avaliable tickets.
        <span class="closebtn">&times;</span>  
        </div>';
    }
}
?>

<script>
  var close = document.getElementsByClassName("closebtn");
  for (var i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }
</script>
