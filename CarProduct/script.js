// Global var for original car price and 10% deposit
var oriPrice = 0;
var oriDeposit = 0;

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
            document.getElementById("rates").value = "";
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

    if (option == 'open') {
        if (type == 'checkout') {
            checkoutModal.style.display = "block";
        }
        else if(type == 'image') {
            imageModal.style.display = "block";
        }
    }
    else if (option == 'close') {
        if (type == 'checkout') {
            checkoutModal.style.display = "none";
        }
        else if(type == 'image') {
            imageModal.style.display = "none";
        }
    }
    else {
        alert("An error has occured. Please try again")
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