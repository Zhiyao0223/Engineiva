// Global var for original car price and 10% deposit
var oriPrice = 0;
var oriDeposit = 0;
var currentImgPosition = 0;
var loginStatus = false;

// Auto put deposit amount
function getDeposit() {
    var htmlLine = document.getElementsByClassName("price")[0].innerHTML;
    var nospaceLine = htmlLine.trim();
    var perfectLine = nospaceLine.replace(/[,RM ]/g, "" )
    
    oriPrice = parseInt(perfectLine);
    oriDeposit = parseInt(perfectLine) * 10 / 100;
    document.getElementById("deposit").value = oriDeposit;

    // Get monthly installment
    calculateRates(perfectLine);
}


// Validation for Bank Rates
function checkRates() {
    var input = document.getElementById("rates").value;
    if (input.length > 2) {
        document.getElementById("rates").value = input.slice(0,2);
    }

    // Check for zero rates
    if (input.length == 1) {
        if (input == 0) {
            alert("Bank rates cannot be zero");
            document.getElementById("rates").value = "1";
            exit(0);
        }
    }
    else if (input.length == 2) {
        // Prevent negative rates
        if (input < 0) {
            alert("Invalid Rates. Please dont troll the system");
            document.getElementById("rates").value = "";
            exit(0);
        }

        // Prevent double zero in rates
        else if (input == 0) {
            document.getElementById("rates").value = "0";
            exit(0);
        }
    }
    calculateRates();
}

// Validate Deposit 
function validateDeposit() {
    var deposit = document.getElementById("deposit").value;
    
   if (deposit < oriDeposit) {
       alert("Minimum deposit is 10% of total vehicle price.");
       document.getElementById("deposit").value = oriDeposit;
   }
   else if (deposit > oriPrice) {
       alert("Deposit cannot more than vehicle price.");
       document.getElementById("deposit").value = oriDeposit;
   }
   else {
       calculateRates();
   }
}


// Calculate Rates
function calculateRates() {
    // var price = 
    var deposit = document.getElementById("deposit").value;
    var rates = document.getElementById('rates').value;
    var period = document.getElementsByClassName("repayment")[0].value;

    if (rates == "") {
        rates = 1;
    }

    
    // Calculate Loan: (Total Price - Deposit) * (100 + Rates) / (Period * 12)
    var loan = oriPrice - parseInt(deposit);
    var rates = (parseInt(rates) / 100) + 1;
    var totalLoan = loan;
    for (let i = 0; i < period; i++) {
        totalLoan  = Math.floor(totalLoan * rates);
    }

    var totalMonth = parseInt(period) * 12;
    var price = "RM" + Math.round(totalLoan / totalMonth);
    document.getElementById("calculator-price").innerHTML = price;
}

// Toggle modal box
function verification(option, type) {
    var imageModal = document.getElementById("imageModal");
    var checkoutModal = document.getElementById("checkoutModal");
    var testDriveModal = document.getElementById("testDriveModal");

    if (option == 'open') {
        if (type == 'checkout') {
            checkoutModal.style.visibility = "visible";
            checkoutModal.style.opacity = "1";
        }
        else if(type == 'image') {
            imageModal.style.display = "block";
        }
        else if(type == 'testDrive') {
            checkoutModal.style.visibility = "hidden";
            checkoutModal.style.opacity = "0";

            testDriveModal.style.visibility = "visible";
            testDriveModal.style.opacity = "1";

        }
    }
    else if (option == 'close') {
        if (type == 'checkout') {
            checkoutModal.style.visibility = "hidden";
            checkoutModal.style.opacity = "0";
        }
        else if(type == 'image') {
            imageModal.style.display = "none";
        }
        else if(type == "testDrive") {
            testDriveModal.style.opacity = "0";
            testDriveModal.style.visibility = "hidden";
            // testDriveModal.style.display = "none";
        }
    }
    else {
        alert("An error has occured. Please try again")
    }
}


// Change Image 
function changeImage(position) {
    var modalBoxStatus = document.getElementById("imageModal").style.display;
    if (modalBoxStatus == "" || modalBoxStatus == "none") {
        document.getElementById("imageModal").style.display = "block";
    } 

    var bottomImage = document.getElementsByClassName("bottom-image")[position];

    document.getElementById("currentImg").src = bottomImage.src;
    
    document.getElementsByClassName("bottom-image")[currentImgPosition].style.border = "";
    document.getElementsByClassName("bottom-image")[position].style.border = "5px solid darkblue";
    currentImgPosition = parseInt(position);
}


// Next and previous button
function arrowChangeImage(option) {
    var maxImage = document.getElementsByClassName("bottom-image").length;
    var imagePosition = 0;
    var foundStatus = false;
    var border;

    for (let i = 0; i < maxImage; i++) {
        border = document.getElementsByClassName("bottom-image")[i].style.border;
        
        // Check border
        if (border == "5px solid darkblue") {
            imagePosition = i;
            foundStatus = true;
            break;
        }
    }

    if(!foundStatus || imagePosition == 0 || imagePosition == (maxImage-1)) {
        if(option == "prev" && imagePosition == 0) {
            document.getElementsByClassName("bottom-image")[0].style.border = "5px solid darkblue";
            return;
        }
        else if (option == "next" && imagePosition == (maxImage - 1)) {
            return;
        }
    }

    if (option == "prev") {
        changeImage(imagePosition - 1);
    }
    else if (option == "next") {
        changeImage(imagePosition + 1);
    }
    else {
        alert("An error has occured. Please try again");
        return -1;
    }
}

// Display location question box
function displayLocationBox() {
    var appointmentMode = document.getElementById("appointmentType").value;

    if (appointmentMode == "physical") {
        document.getElementsByClassName("form-table")[0].rows[1].style.display = "contents";
        document.getElementById("location").required = true;
    }
    else if (appointmentMode == "virtual") {
        document.getElementsByClassName("form-table")[0].rows[1].style.display = "none";
        document.getElementById("location").required = false;
    }
}



// Check valid hours 
function checkHour() {
    var inputTime = document.getElementById("time").value;
    const time = inputTime.split(":");

    if (parseInt(time[0]) < 10 || parseInt(time[0]) >= 18) {
        alert("Invalid Hour. \nOur operating hour are from 10am - 6pm from Monday to Saturday");
        document.getElementById("time").value = "";
    }
}


// Check appointment date 
function checkDate() {
    // Get today date information
    var today = new Date();
    var currentYear =  today.getFullYear();
    var currentMonth = today.getMonth() + 1;
    var currentDay =   today.getDate();

    // Get input date and convert into object
    var input = document.getElementById("date").value;
    const dateArray = input.split("-");
    var inputDate = new Date(dateArray[0], (dateArray[1] - 1), dateArray[2]);
    var inputDay = inputDate.getDay();

    // Last day of month
    var lastDayOfMonth = new Date(currentYear, currentMonth, 0).getDate();
    var diff = parseInt(lastDayOfMonth) - parseInt(today.getDate());

    // Earliest 7 days
    var earliestDate = today;
    
    // Check if date
    if (dateArray[0] >= currentYear) {
        if (parseInt(dateArray[1]) < currentMonth) {
            alert("Invalid Month");
            document.getElementById("date").value = "";
            return;
        }
        else if (parseInt(dateArray[1]) == currentMonth) {
            if (dateArray[2] < currentDay) {
                alert("Invalid day.");
                document.getElementById("date").value = "";
                return;
            }
        }
    }
    else {
        alert("Invalid Year");
        document.getElementById("date").value = "";
        return;
    }

    // Difference in day with last day of month (At least 7 days prior notice)
    // If near end of month
    if (diff < 7) {
        diff = 7 - diff;
        earliestDate = new Date(today.getFullYear(), today.getMonth()+1);
        earliestDate.setDate(diff);
        
    }
    else {
        earliestDate.setDate(today.getDate() + 6);
    }
    
    // Check if 7 days
    if (inputDate < earliestDate) {
        alert("Appointment need 7 days prior notice. Please select another date.");
        document.getElementById("date").value = "";
    }
    // Check if Sunday
    if (inputDay == "0") {
        alert("Sorry, our inspection centres are close on Sunday");
        document.getElementById("date").value = "";
        return;
    }
}


// Disable test drive form button
function disableBtn(id) {
    if (id == undefined) { 
        document.getElementById("feeHalf").disabled = true;
        document.getElementById('feeHalf').style.cursor = 'not-allowed';
        document.getElementById('feeHalf').innerHTML = "Please login"
    
        document.getElementById("feeFull").disabled = true;
        document.getElementById('feeFull').style.cursor = 'not-allowed';
        document.getElementById('feeFull').innerHTML = "Please login";
    }
    else {
        loginStatus = true;
    }
}




// Header
function mouseOverToggle() {
    var dropDownContent = document.getElementById('buy_content');
    dropDownContent.style.display = "block";
}
function mouseOutToggle() {
    var dropDownContent = document.getElementById('buy_content');
    dropDownContent.style.display = "none";
}