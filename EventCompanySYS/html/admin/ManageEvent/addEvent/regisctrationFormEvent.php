<?php
include("../../../../additionalHtml/adminHeader.php");
include("loadForm.php");
?>

<h1>Add New Event</h1>


<div class="mainContainer">

    <div class="regForm"> 
        <div id="formAlert" class="alert" style="display:none;">
            <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div> 

        <form class="form" onsubmit="return validateEvent();" method="post">
            <div class="form-group">
                <label>Event Name</label>
                <input type="text" id="name" name="eEventName">
            </div>

            <div class="form-group">
                <label>Event Type</label>
                <select name="eEventType" id="eventType">

                <?php foreach ($eventTypes as $row): ?>
                    <option value="<?php echo $row['typeID']; ?>"><?php echo $row['Name']; ?></option>
                <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label>Client</label>
                <input type="text" id="clientName" readonly>
                <input type="hidden" id="clientID" name="eClientID">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" id="description" name="eDescription">
            </div>

            <div class="form-group">
                <label>Venue</label>
                <input type="text" id="venueName" readonly>
                <input type="hidden" id="venueID" name="eVenueID">
            </div>

            <div class="form-group">
                <label>Event Date</label>
                <input type="date" id="eventDate" name="eEventDate">
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input type="text" id="startTime" value="12:00" name="eStartTime">
            </div>

            <div class="form-group">
                <label>Duration</label>
                <input type="text" id="duration" name="eDuration">
            </div>

            <div class="form-group">
                <label>Capacity</label>
                <input type="text" id="capacity" name="eCapacity">
            </div>

            <div class="form-group">
                <label>Number Of Tickets</label>
                <input type="text" id="eNumberOfTickets" name="eNumberOfTickets">
            </div>

            <div class="form-group">
                <label>Ticket Price</label>
                <input type="text" id="eTicketPrice" name="eTicketPrice">
            </div>

            <div class="form-group">
                <label>Filepath To File</label>
                <input type="text" id="filepath" name="eFilepath">
                <input type="hidden" id="status" name="eStatus" value="A">
            </div>

            <div class="form-group">
                <input type="submit" name="submitDetails" value="Submit">
            </div>
        </form>
    </div>

    <div class="tableContainer">
    
        <h3>Clients</h3>
        <div class="scrollableTable">
            <table class="scrollableTable">
                <thead>
                    <tr>
                        <th>Organization</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $row): ?>
                        <tr class="clientRow" data-clientID="<?php echo $row['clientID'] ?>" data-clientName="<?php echo $row['orgName']; ?>">
                            <td><?php echo $row['orgName'] ?></td>
                            <td><?php echo $row['contactPerson'] ?></td>
                            <td>
                                <?php echo $row['building'] ?>,
                                <?php echo $row['street'] ?>,
                                <?php echo $row['city'] ?>,
                                <?php echo $row['county']?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h3>Venues</h3>
        <div class="scrollableTable">
            <table class="scrollableTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Capacity</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($venues as $row): ?>
                        <tr class="venueRow" data-venueID="<?php echo $row['venueID'] ?>" data-venueName="<?php echo $row['name']?>">
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['capacity'] ?></td>
                        <td>
                            <?php echo $row['building'] ?>,
                            <?php echo $row['street'] ?>,
                            <?php echo $row['city'] ?>,
                            <?php echo $row['county']?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="../../../../JS/validation.js"></script>

<?php
include("addEvent.php");
include("../../../../additionalHtml/footer.html");
?>

<!-- 
Reference: W3Schools - How To Create an Alert Box
https://www.w3schools.com/howto/howto_js_alert.asp 
-->
<!--Reference: HTML Living Standard - Embedding custom non-visible data with the data-* attributes
https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes -->
