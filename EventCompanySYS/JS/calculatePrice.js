function calculatePrice() {
    let numbOftickets = parseInt(document.getElementById("eNumberOfTickets").value);
    let pricePerTicket = parseFloat(document.getElementById("ticketPrice").value);

    let total = 0;
    if (Number.isInteger(numbOftickets) && !isNaN(pricePerTicket)) {
        total = (pricePerTicket * numbOftickets).toFixed(2);
    } else {
        total = "0.00";
    }

    document.getElementById("priceInput").value = total;
}
