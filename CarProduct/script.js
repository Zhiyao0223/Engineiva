// Auto put deposit amount
function getDeposit() {
    var htmlLine = document.getElementsByClassName("price")[0].innerHTML;
    var nospaceLine = htmlLine.trim();
    var perfectLine = nospaceLine.replace(/[,RM ]/g, "" )
    
    var deposit = parseInt(perfectLine) * 10 / 100;
    document.getElementById("deposit").value = deposit;
}


// Validation for Bank Rates
function checkRates() {
    var input = document.getElementById("rates").value;
    if (input.length > 2) {
        document.getElementById("rates").value = input.slice(0,2);
    }
    if (input.length == 2) {
        // Prevent negative rates
        if (input < 0) {
            alert("Invalid Rates. Please dont troll the system");
            document.getElementById("rates").value = "";
        }

        // Prevent double zero in rates
        if (input == 0) {
            document.getElementById("rates").value = "0";
        }
    }
}