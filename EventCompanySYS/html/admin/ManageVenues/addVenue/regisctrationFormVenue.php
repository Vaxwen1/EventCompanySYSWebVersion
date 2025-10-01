    <?php
        include ("../../../../additionalHtml/adminHeader.php");?>
    <h1>Add New Venue</h1>
    <div class="regForm">    

        <div id="formAlert" class="alert" style="display:none;">
            <strong>Error!</strong> <span id="alertMessage">All fields must be entered!</span>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>    
        <form class="form" onsubmit="return validateVenue()" method="post">
  
            <div class="form-group">
                <label>Venue Name</label>
                <input type="text" name="vVenueName" id="name">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="vDescription" id="description">
            </div>

            <div class="form-group">
                <label>Capacity</label>
                <input type="text" name="vCapacity" id="capacity">
            </div>

            <p id='groupName'>Contact Person</p>

            <div class="form-group">
                <label>Contact Person</label>
                <input type="text" name="vContactPerson" id="contactPerson">
            </div>

            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="vContactNumber" id="phone">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="vEmail" id="email">
            </div>

            <p id='groupName'>Address</p>

            <div class="form-group">
                <label>Building</label>
                <input type="text" name="vBuilding" id="building">
            </div>

            <div class="form-group">
                <label>Street</label>
                <input type="text" name="vStreet" id="street">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" name="vCity" id="city">
            </div>

            <div class="form-group">
                <label>County</label>
                <input type="text" name="vCounty" id="county" >
            </div>

            <div class="form-group">
                <label>Eircode</label>
                <input type="text" name="vEircode" id="eircode">
                <input type="hidden" id="status" value="A">
            </div>

            <div class="form-group">
                <input type="submit" name="submitDetails">
            </div>
        </form>
    </div>
    <script src="../../../../JS/validation.js"></script>
    <?php
        include("addVenue.php");
        include ("../../../../additionalHtml/footer.html");
        
    ?>
   
</body>
</html>
