    <?php
        require ("../../../../additionalHtml/adminHeader.php");
        include("loadForm.php");
    ?>
        <script src="../../../../JS/calculatePrice.js"></script>

    <h1>Add New Booking</h1>
    <div class="mainContainer">
        <div class="regForm">  
            <div id="formAlert" class="alert" style="display:none;">
                <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>      
            <form class="form" onsubmit="return validateBooking()" method="post">
    
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="email" name="bEmail">
                </div>

                <div class="form-group">
                    <label>Event</label>
                    <input type="text" id="eventName" readonly>
                    <input type="hidden" id="eventID" name="bEventID">
                </div>

                <div class="form-group">
                    <label>Number of tickets</label>
                    <input onchange = "calculatePrice()" type="number" id="eNumberOfTickets" name = "bNumberOfTickets">
                    <input type="hidden" id="avaliableTickets" name = "bAvaliableTickets" value="<?php ?>">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="hidden" id="ticketPrice">
                    <input type="text" id="priceInput"  name="bPrice" readonly>
                </div>

                <div class="form-group">
                    <input type="submit" name="submitDetails">
                </div>
            </form>
        </div>

        <div class="tableContainer">
        <h3>Events</h3>
        <div class="scrollableTable">
            <table class="scrollableTable">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Event Type</th>
                        <th>Description</th>
                        <th>Venue</th>
                        <th>Available Tickets</th>
                        <th>Ticket price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $row): ?>
                        <tr class="eventRow" data-eventID="<?php echo $row['eventID'] ?>" data-eventName="<?php echo $row['name']; ?>" data-eventAvaliableEvents="<?php echo $row['availableTickets']; ?>" data-eventPrice="<?php echo $row['price']; ?>">
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['eventType'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['venueid'] ?></td>
                            <td><?php echo $row['availableTickets'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="../../../../JS/validation.js"></script>
    <?php
        include("addBooking.php");
        include ("../../../../additionalHtml/footer.html");
    ?>
   
    
   <footer id="footer">
            
            </footer>
            </body>
            
        
        </html>
<!-- 
Reference: W3Schools - How To Create an Alert Box
https://www.w3schools.com/howto/howto_js_alert.asp 
-->