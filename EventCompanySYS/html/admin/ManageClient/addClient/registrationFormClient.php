<?php
 require ("../../../../additionalHtml/adminHeader.php");?>
    <h1>Add New Client</h1>
    <div class="regForm">
        
        <div id="formAlert" class="alert" style="display:none;">
            <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>    
    
        <form class="form" method="post" onsubmit="return validateClient();">

            <div class="form-group">
                <label>Organization name</label>
                <input type="text" name="cOrgName" id="name">
            </div>

            <p id='groupName'>Contact person</p>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="cContactPerson" id="contactPerson">
            </div>

            <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="cTelephone" id="phone">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="cEmail" id="email">
            </div>

            <p id='groupName'>Address</p>

            <div class="form-group">
                <label>Building</label>
                <input type="text" name="cBuilding" id="building">
            </div>

            <div class="form-group">
                <label>Street</label>
                <input type="text" name="cStreet" id="street">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" name="cCity" id="city">
            </div>

            <div class="form-group">
                <label>County</label>
                <input type="text" name="cCountry" id="county">
            </div>

            <div class="form-group">
                <label>Eircode</label>
                <input type="text" name="cEircode" id="eircode">
                <input type="hidden" id ="status" value="A">
            </div>

            <div class="form-group">
                <input type="submit" name="submitDetails">
            </div>
        </form>
    </div>
    <script src="../../../../JS/validation.js"></script>
    <?php
        include("addClient.php");
        include ("../../../../additionalHtml/footer.html");
    ?>