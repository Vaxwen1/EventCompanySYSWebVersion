<?php
    include ("../../../../additionalHtml/adminHeader.php");
    include("findClient.php");
?>
<h1>Update Client</h1>
<div class="regForm">
    <h1>List Of Clients</h1>
    <div id="formAlert" class="alert" style="display:none;">
        <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>    

    <form class="form" method="get" onsubmit="return validateClient();">

        <div class="form-group">
            <label>Client ID</label>
            <input type="text" name="cClientID" value="<?php if (isset($id)) echo $id; ?>" disabled>
            <input type="hidden" name="cClientID" value="<?php if (isset($id)) echo $id; ?>">
        </div>

        <div class="form-group">
            <label>Organization name</label>
            <input type="text" name="cOrgName" id="name" value="<?php if (isset($name)) echo $name; ?>">
        </div>

        <p id='groupName'>Contact person</p>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="cContactPerson" id="contactPerson" value="<?php if (isset($contactPerson)) echo $contactPerson; ?>">
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="text" name="cTelephone" id="phone" value="<?php if (isset($telephone)) echo $telephone; ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="cEmail" id="email" value="<?php if (isset($email)) echo $email; ?>">
        </div>

        <p id='groupName'>Address</p>

        <div class="form-group">
            <label>Building</label>
            <input type="text" name="cBuilding" id="building" value="<?php if (isset($building)) echo $building; ?>">
        </div>

        <div class="form-group">
            <label>Street</label>
            <input type="text" name="cStreet" id="street" value="<?php if (isset($street)) echo $street; ?>">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="cCity" id="city" value="<?php if (isset($city)) echo $city; ?>">
        </div>

        <div class="form-group">
            <label>County</label>
            <input type="text" name="cCounty" id="county" value="<?php if (isset($county)) echo $county; ?>">
        </div>

        <div class="form-group">
            <label>Eircode</label>
            <input type="text" name="cEircode" id="eircode" value="<?php if (isset($eircode)) echo $eircode; ?>">
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="cStatus">
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
