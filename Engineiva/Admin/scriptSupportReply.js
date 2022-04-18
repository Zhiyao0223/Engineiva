// Change box color if pending
function checkStatus(status) {
    var pendingBox = document.getElementById('pending');
    var doneBox = document.getElementById('done');
    var replyBox = document.getElementsByClassName("bottom-container")[0];

    if (status == "T") {
        pendingBox.style.color ='green';
        pendingBox.style.boxShadow = '1px 1px limegreen';
    }
    else if(status == 'F') {
        doneBox.style.color ='green';
        doneBox.style.boxShadow = '1px 1px limegreen';
        replyBox.style.display = "none";
        pendingBox.style.display ='none';
    }
    else {
        alert("You found another easter egg. Please consult IT technician immediately ><");
    }
}

// Disable pending box border when hover on done box
function doneHover(mouseStatus, ticketStatus) {
    var pendingBox = document.getElementById('pending');

    if (ticketStatus == "F") {
        return;
    }

    if (mouseStatus == "on") {
        pendingBox.style.color ='black';
        pendingBox.style.boxShadow = 'none';
    }
    else if(mouseStatus == "off") {
        pendingBox.style.color ='green';
        pendingBox.style.boxShadow = '1px 1px limegreen';
    }
    else {
        alert("OMG new bugs? Contact IT admin please");
    }
}

function toggleRefund(option) {
    if (option == "open") {
        document.getElementById('refundModal').style.visibility = "visible";
        document.getElementById('refundModal').style.opacity = "1";
    }
    else if (option == "close") {
        document.getElementById('refundModal').style.visibility = "hidden";
        document.getElementById('refundModal').style.opacity = "0";
    }
    else {
        alert("New bug bois");
    }

}