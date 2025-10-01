<?php
    include ("../../../../additionalHtml/adminHeader.php");
    include("findVenue.php");
?>
    <h1>Update Venue</h1>
<div class="regForm">

    <div id="formAlert" class="alert" style="display:none;">
        <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>    

    <form class="form" method="get" onsubmit="return validateVenue();">

        <div class="form-group">
            <label>Veneu ID</label>
            <input type="text" name="vVenueID" value="<?php if (isset($id)) echo $id; ?>" readonly>
        </div>

        <div class="form-group">
            <label>Venue Name</label>
            <input type="text" name="vName" id="name" value="<?php if (isset($name)) echo $name; ?>">
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" name="vDescription" id="description" value="<?php if (isset($description)) echo $description; ?>">
        </div>

        <div class="form-group">
            <label>Capacity</label>
            <input type="text" name="vCapacity" id="capacity" value="<?php if (isset($capacity)) echo $capacity; ?>">
        </div>

        <p id='groupName'>Contact person</p>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="vContactPerson" id="contactPerson" value="<?php if (isset($contactPerson)) echo $contactPerson; ?>">
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="text" name="vTelephone" id="phone" value="<?php if (isset($telephone)) echo $telephone; ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="vEmail" id="email" value="<?php if (isset($email)) echo $email; ?>">
        </div>

        <p id='groupName'>Address</p>

        <div class="form-group">
            <label>Building</label>
            <input type="text" name="vBuilding" id="building" value="<?php if (isset($building)) echo $building; ?>">
        </div>

        <div class="form-group">
            <label>Street</label>
            <input type="text" name="vStreet" id="street" value="<?php if (isset($street)) echo $street; ?>">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="vCity" id="city" value="<?php if (isset($city)) echo $city; ?>">
        </div>

        <div class="form-group">
            <label>County</label>
            <input type="text" name="vCounty" id="county" value="<?php if (isset($county)) echo $county; ?>">
        </div>

        <div class="form-group">
            <label>Eircode</label>
            <input type="text" name="vEircode" id="eircode" value="<?php if (isset($eircode)) echo $eircode; ?>">
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="vStatus">
                <option value="<?php if (isset($status)) echo $status; ?>" selected hidden><?php if (isset($status)) echo $status; ?></option>
                <option value="A">A</option>
                <option value="C">D</option>
                <option value="P">P</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submitDetails">
        </div>
    </form>
</div>

<script src="../../../../JS/validation.js"></script>

<?php
    include("updated.php");
    include ("../../../../additionalHtml/footer.html");
?>
