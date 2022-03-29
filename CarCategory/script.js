// Header
function mouseOverToggle() {
    var dropDownContent = document.getElementById('buy_content');
    dropDownContent.style.display = "block";
}
function mouseOutToggle() {
    var dropDownContent = document.getElementById('buy_content');
    dropDownContent.style.display = "none";
}


// Close Brand Popup Box
function verification(option) {
    var brandBox = document.getElementById("brand");

    if (option == "open") {
        brandBox.style.visibility = "visible";
        brandBox.style.opacity = "1";
    }
    else if (option == "close") {
        brandBox.style.visibility = "hidden";
        brandBox.style.opacity = "0";
    }
} 


// Filter brands
function filterBrand(brand) {
    var carBox = document.getElementsByTagName("td");

    // First loop reset all brands, second loops filter
    for (let j = 0; j < 2; j++) {
        for (let i = 0; i < carBox.length; i++) {
            if (carBox[i].className == brand) {
                carBox[i].style.display = "";
            }
            else if (j == 0) {
                carBox[i].style.display = "none";
            }
        }
    }
}


function addTr() {
    
    var trBox = document.getElementsByClassName("trPlacement");
    var trID, trElement;
    for (let i = 0; i < trBox.length; i++) {
        tmp = parseInt(i) + parseInt(1);
        trElement = "tr" + tmp;
        trElement.toString();
        // alert(trElement);
        trID = document.getElementById(trElement).innerHTML;
        // alert(trElement + " " + trID);/
        if (parseInt(tmp) % 3 == 0) {
            document.getElementById(trElement).innerHTML = '</tr><tr>';
            // alert(trID);
        }
        
        // alert(document.getElementsByClassName("trPlacement")[i].innerHTMLL);
    }
}
