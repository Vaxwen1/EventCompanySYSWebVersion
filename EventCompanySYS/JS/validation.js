let vname = document.getElementById("name");
let contactPerson = document.getElementById("contactPerson");
let phone = document.getElementById("phone");
let email = document.getElementById("email");
let building = document.getElementById("building");
let street = document.getElementById("street");
let city = document.getElementById("city");
let county = document.getElementById("county");
let eircode = document.getElementById("eircode");
let vstatus = document.getElementById("status");
let eventType = document.getElementById("eventType");
let clientID = document.getElementById("clientID");
let eventID = document.getElementById("eventID");
let description = document.getElementById("description");
let venueID = document.getElementById("venueID");
let eventDate = document.getElementById("eventDate");
let startTime = document.getElementById("startTime");
let duration = document.getElementById("duration");
let capacity = document.getElementById("capacity");
let eNumberOfTickets = document.getElementById("eNumberOfTickets");
let avaliableTickets = document.getElementById("avaliableTickets");
let eTicketPrice = document.getElementById("eTicketPrice");
let filepath = document.getElementById("filepath");


let alertBox = document.getElementById("formAlert");
let alertMessage = document.getElementById("alertMessage");


function showAlert(message) {
    alertMessage.innerHTML = message;
    alertBox.style.display = "block";
}

function validatePhone(phoneElement) {
    const phoneValue = phoneElement.value.trim();
    const phoneRegex = /^\+353\d{9}$/;
    return phoneRegex.test(phoneValue);
}


function validateClient() {
    // Validate organization name
    if (!vname.value.trim()) {
        showAlert("Organization name is required.");
        return false;
    }

    // Validate contact person
    if (!contactPerson.value.trim()) {
        showAlert("Contact person is required.");
        return false;
    }

    // Validate phone number
    if (!phone.value.trim()) {
        showAlert("Phone number is required.");
        return false;
    }
    if (!validatePhone(phone)) {
        showAlert("Phone number must be in the format +353 followed by 9 digits.");
        return false;
    }

    // Validate email
    if (!email.value.trim() || !email.value.includes("@")) {
        showAlert("Valid email is required.");
        return false;
    }

    // Validate building address
    if (!building.value.trim()) {
        showAlert("Building is required.");
        return false;
    }

    // Validate street address
    if (!street.value.trim()) {
        showAlert("Street is required.");
        return false;
    }

    // Validate city
    if (!city.value.trim()) {
        showAlert("City is required.");
        return false;
    }

    // Validate county
    if (!county.value.trim()) {
        showAlert("County is required.");
        return false;
    }

    // Validate eircode
    if (!eircode.value.trim()) {
        showAlert("Eircode is required.");
        return false;
    }

    // Validate status
    if (!vstatus.value.trim()) {
        showAlert("Status is required.");
        return false;
    }

    return true;
}


function validateEvent() {
    // Validate event name
    if (!vname.value.trim()) {
        showAlert("Event name is required.");
        return false;
    }

    // Validate eventType
    if (!eventType.value.trim()) {
        showAlert("Event type is required");
        return false;
    }

    // Validate description
    if (!description.value.trim()) {
        showAlert("Description is required.");
        return false;
    }

    // Validate event date
    if (!eventDate.value.trim()) {
        showAlert("Date is required.");
        return false;
    }

    const eventDateObj = new Date(eventDate.value);
    const today = new Date();
    const oneMonthFromToday = new Date();
    oneMonthFromToday.setMonth(today.getMonth() + 1);

    eventDateObj.setHours(0, 0, 0, 0);
    oneMonthFromToday.setHours(0, 0, 0, 0);

    if (eventDateObj < oneMonthFromToday) {
        showAlert("Event date must be at least one month from today.");
        return false;
    }

    // Validate Start Time
    const timePattern = /^([01]\d|2[0-3]):([0-5]\d)$/;

    if (!startTime.value.trim()) {
        showAlert("Start time is required.");
        return false;
    }

    if (!timePattern.test(startTime.value)) {
        showAlert("Start time must be in HH:MM 24-hour format.");
        return false;
    }
    
    // Validate duration
    const durationValue = parseInt(duration.value.trim(), 10);

    if (!duration.value.trim()) {
        showAlert("Duration is required.");
        return false;
    }
    if (isNaN(durationValue) || durationValue < 15 || durationValue > 1380) {
        showAlert("Duration must be between 15 and 1380 minutes (15 minutes to 23 hours).");
        return false;
    }

    // Validate capacity
    const capacityValue = parseInt(capacity.value, 10);
    if (!capacity.value.trim()) {
        showAlert("Capacity is required.");
        return false;
    }
    if (isNaN(capacityValue) || capacityValue <= 0) {
        showAlert("Capacity must be a number and more than 0.");
        return false;
    }

    // Validate numberOfTickets
    if (!eNumberOfTickets.value.trim()) {
        showAlert("Number of tickets is required.");
        return false;
    }

    // Validate ticketPrice
    const pricePattern = /^\d+(\.\d{2})$/;
    if (!eTicketPrice.value.trim()) {
        showAlert("Ticket price is required.");
        return false;
    }
    if (!pricePattern.test(eTicketPrice.value.trim())) {
        showAlert("Ticket price must be a number with exactly two decimal places.");
        return false;
    }

    // Validate filepath
    if (!filepath.value.trim()) {
        showAlert("Filepath is required.");
        return false;
    }

    // Validate status
    if (!vstatus.value.trim()) {
        showAlert("Status is required.");
        return false;
    }

    return true;
}



function validateVenue() {
    // Validate venue name
    if (!vname.value.trim()) {
        showAlert("Venue name is required.");
        return false;
    }

    // Validate description
    if (!description.value.trim()) {
        showAlert("Description is required.");
        return false;
    }

    // Validate capacity
    if (!capacity.value.trim()) {
        showAlert("Capacity is required.");
        return false;
    }
    
    const capacityValue = parseInt(capacity.value, 10);

    if (isNaN(capacityValue) || capacityValue <= 0) {
        showAlert("Capacity must be a number and more than 0.");
        return false;
    }

    // Validate contact person
    if (!contactPerson.value.trim()) {
        showAlert("Contact person is required.");
        return false;
    }

    // Validate phone number
    if (!phone.value.trim()) {
        showAlert("Phone number is required.");
        return false;
    }
    if (!validatePhone(phone)) {
        showAlert("Phone number must be in the format +353 followed by 9 digits.");
        return false;
    }

    // Validate email
    if (!email.value.trim() || !email.value.includes("@")) {
        showAlert("Valid email is required.");
        return false;
    }

    // Validate building address
    if (!building.value.trim()) {
        showAlert("Building is required.");
        return false;
    }

    // Validate street address
    if (!street.value.trim()) {
        showAlert("Street is required.");
        return false;
    }

    // Validate city
    if (!city.value.trim()) {
        showAlert("City is required.");
        return false;
    }

    // Validate county
    if (!county.value.trim()) {
        showAlert("County is required.");
        return false;
    }

    // Validate eircode
    if (!eircode.value.trim()) {
        showAlert("Eircode is required.");
        return false;
    }

    // Validate status
    if (!vstatus.value.trim()) {
        showAlert("Status is required.");
        return false;
    }

    return true;
}


function validateBooking() {


    // Validate email
    if (!email.value.trim() || !email.value.includes("@")) {
        showAlert("Valid email is required.");
        return false;
    }

    //Validate Event
    if (!eventID.value.trim()) {
        showAlert("Select Event is required.");
        alert(eNumberOfTickets.value.trim());
        return false;
    }


    // Validate numberOfTickets
    if (!eNumberOfTickets.value.trim()) {
        showAlert("Number of tickets is required.");
        return false;
    }

    if (parseInt(eNumberOfTickets.value) > parseInt(avaliableTickets.value)) {
        showAlert("Number of tickets must be less then avaliable tickets.");
        return false;
    }

    return true;
}


document.addEventListener("DOMContentLoaded", function () {

    const crows = document.querySelectorAll('.clientRow');
    const cinputName = document.getElementById('clientName');
    const cinputID = document.getElementById('clientID');
    
    const vrows = document.querySelectorAll('.venueRow');
    const vinputID = document.getElementById('venueID');
    const vinputName = document.getElementById('venueName');

    const erows = document.querySelectorAll('.eventRow');
    const einputID = document.getElementById('eventID');
    const einputName = document.getElementById('eventName');
    const eprice = document.getElementById('ticketPrice');
    const eAvaliableTickets = document.getElementById('avaliableTickets');
    

    crows.forEach(row => {
        row.addEventListener('click', function () {
            const clientName = this.getAttribute('data-clientName');
            const clientID = this.getAttribute('data-clientID');
            cinputName.value = clientName;
            cinputID.value = clientID;
        });
    });


    vrows.forEach(row => {
        row.addEventListener('click', function () {
            const venueName = this.getAttribute('data-venueName');
            const venueID = this.getAttribute('data-venueID');
            vinputName.value = venueName;
            vinputID.value = venueID;
        });
    });

    erows.forEach(row => {
        row.addEventListener('click', function () {
            const eventName = this.getAttribute('data-eventName');
            const eventID = this.getAttribute('data-eventID');
            const eventPrice = this.getAttribute('data-eventPrice');
            const eventAvaliableTickets = this.getAttribute('data-eventAvaliableEvents');

            einputName.value = eventName;
            einputID.value = eventID;
            eprice.value = eventPrice;
            eAvaliableTickets.value = eventAvaliableTickets;

            calculatePrice();
        });
    });


    

    let closeBtns = document.getElementsByClassName("closebtn");
    for (let i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function () {
            let div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () { 
                div.style.display = "none"; 
                div.style.opacity = "1"; 
            }, 600);
        }
    }
});




