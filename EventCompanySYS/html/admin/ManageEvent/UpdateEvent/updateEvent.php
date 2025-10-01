<?php
    include ("../../../../additionalHtml/adminHeader.php");
    include("findEvent.php");
    include("loadForm.php");
?>

<h1>Update Event</h1>

<div class="mainContainer">


    <div class="regForm">

        <div id="formAlert" class="alert" style="display:none;">
            <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>    

        <form class="form" onsubmit="return validateEvent();" method="get">

            <div class="form-group">
                <label>Event ID</label>
                <input type="number" id="eventID" name="eEventID" value="<?php if (isset($id)) echo $id; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Event Name</label>
                <input type="text" id="name" name="eEventName" value="<?php if (isset($name)) echo $name; ?>">
            </div>

            <div class="form-group">
                <label>Event Type</label>
                <select name="eEventType" id="eventType">
                    <option value="<?php if (isset($eventType)) echo $eventType; ?>" id="eventType" selected hidden><?php if (isset($eventTypeMeaning)) echo $eventTypeMeaning; ?></option>
                    <?php foreach ($eventTypes as $row): ?>
                        <option value="<?php echo $row['typeID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label>Client</label>
                <input type="hidden" id="clientID" name="eClientID"  value="<?php if (isset($clientID)) echo $clientID; ?>">
                <input type="text" id="clientName" value="<?php if (isset($client)) echo $client; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" id = "description" name="eDescription" value="<?php if (isset($description)) echo $description; ?>">
            </div>

            <div class="form-group">
                <label>VenueID</label>
                <input type="hidden" id="venueID" name="eVenueID" value="<?php if (isset($venueID)) echo $venueID; ?>">
                <input type="text" id="venueName" value="<?php if (isset($venueName)) echo $venueName; ?>" readonly>
            </div>

            <div class="form-group">
                <label>EventDate</label>
                <input type="date" id="eventDate" name="eEventDate" value="<?php if (isset($eventDate)) echo $eventDate; ?>">
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input type="text" id="startTime" name="eStartTime" value="<?php if (isset($startTime)) echo $startTime; ?>">
            </div>

            <div class="form-group">
                <label>Duration</label>
                <input type="number" id="duration" name="eDuration" value="<?php if (isset($duration)) echo $duration; ?>">
            </div>

            <div class="form-group">
                <label>Capacity</label>
                <input type="number" id="capacity" name="eCapacity" value="<?php if (isset($capacity)) echo $capacity; ?>">
            </div>

            <div class="form-group">
                <label>Number Of Tickets</label>
                <input type="number" id="eNumberOfTickets" name="eNumberOfTickets" value="<?php if (isset($tickets)) echo $tickets; ?>">
            </div>

            <div class="form-group">
                <label>Avaliable Tickets</label>
                <input type="number" id="avaliableTickets" name="eAvailableTicket" value="<?php if (isset($availableTickets)) echo $availableTickets; ?>">
            </div>

            <div class="form-group">
                <label>Ticket Price</label>
                <input type="number" id="eTicketPrice" name="eTicketPrice" value="<?php if (isset($price)) echo $price; ?>">
            </div>
            
            <div class="form-group">
                <label>Filepath To File</label>
                <input type="text" id="filepath" name="eFilepath" value="<?php if (isset($filepath)) echo $filepath; ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="eStatus">
                    <option value="<?php if (isset($status)) echo $status; ?>" selected hidden><?php if (isset($status)) echo $status; ?></option>
                    <option value="A">A</option>
                    <option value="C">C</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="submitDetails">
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
    include("updated.php");
    include ("../../../../additionalHtml/footer.html");
?>
