var originalTableContent;
var filterTopPreviousMark;

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


// Filter brands (Top section)
function filterBrandTop(brand, classNames) {
    var resetStatus = false;
    var relatedClass = classNames.className;
    var thisID = classNames.id;
    var loopID;

    var filterBrandArray = document.getElementsByClassName(relatedClass);
    for (let i = 0; i < filterBrandArray.length; i++) {
        if (filterBrandArray[i].style.border == "2px solid blue") {
            loopID = filterBrandArray[i].id;       
            filterBrandArray[i].style.border = "";

            // Check if user change brand to filter
            if (loopID == thisID) {
                resetStatus = true;
            }
            else {
                classNames.style.border = "2px solid blue";
            }
            break;

        }
    }

    // If unselect brand, reset table
    if (resetStatus) {
        document.getElementById("carTable").innerHTML = originalTableContent;
        return;
    }
    else {
        classNames.style.border = "2px solid blue";
    }
    
    // First loop reset all display none, second loops filter
    var carBox = document.getElementsByTagName("td");
    var newTableContent = "";
    var brand, carID;
    var tdCounter = 0;

    for (let i = 0; i < carBox.length; i++) {
        if (carBox[i].className == brand) {
            // carBox[i].style.display = "";
            brand = carBox[i].className;
            carID = i+1;
            newTableContent = newTableContent + "<td class='" + brand + "' id='" + carID + "' onclick=\"window.location.href = '../CarProduct/CarProduct.php?carID=" + carID + "'\">" + carBox[i].innerHTML  + "</td>";
            if ((tdCounter+1) % 3 == 0) {
                newTableContent += "</tr><tr>";
            }
            tdCounter++;
        }
    }
    document.getElementById("carTable").innerHTML = newTableContent;

}


// Filter brands (Bottom section)
function filterBrand(brand, classNames) {
    var resetStatus = false;
    var relatedClass = classNames.className;
    var thisID = classNames.id;
    
    var loopBtmID, loopTopID;
    var newBtmID = parseInt(thisID.slice(11)) - 1;

    // Get top section if has border
    var filterTopSection = document.getElementsByClassName("brand-name");
    for (let z = 0; z < filterTopSection.length; z++) {
        if (filterTopSection[z].style.display == "2px solid blue") {
            loopTopID = z+1;
            alert(loopTopID);
            break;
        }
    }

    var filterBrandArray = document.getElementsByClassName(relatedClass);
    var topFilterBrand = document.getElementsByClassName("brand-name");
    for (let i = 0; i < filterBrandArray.length; i++) {
        if (filterBrandArray[i].style.border == "2px solid blue") {
            loopBtmID = filterBrandArray[i].id;       
            filterBrandArray[i].style.border = "";
            topFilterBrand[filterTopPreviousMark].style.border = "";


            // Check if user change brand to filter
            if (loopBtmID == thisID) {
                resetStatus = true;
            }
            else {
                classNames.style.border = "2px solid blue";
                document.getElementsByClassName("brand-name")[newBtmID].style.border = "2px solid blue";
                topClass = loopBtmID;
            }
            document.getElementById("carTable").innerHTML = originalTableContent;
            break;

        }
    }

    // If unselect brand, reset table
    if (resetStatus) {
        return;
    }
    else {
        classNames.style.border = "2px solid blue";
        document.getElementsByClassName("brand-name")[newBtmID].style.border = "2px solid blue";
    }
    
    // First loop reset all display none, second loops filter
    var carBox = document.getElementsByTagName("td");
    var newTableContent = "";
    var brand, carID;
    var tdCounter = 0;

    for (let i = 0; i < carBox.length; i++) {
        if (carBox[i].className == brand) {
            // carBox[i].style.display = "";
            brand = carBox[i].className;
            carID = i+1;
            newTableContent = newTableContent + "<td class='" + brand + "' id='" + carID + "' onclick=\"window.location.href = '../CarProduct/CarProduct.php?carID=" + carID + "'\">" + carBox[i].innerHTML  + "</td>";
            if ((tdCounter+1) % 3 == 0) {
                newTableContent += "</tr><tr>";
            }
            tdCounter++;
        }
    }
    document.getElementById("carTable").innerHTML = newTableContent;

    // Record previous filter top border box and use it for next filter
    filterTopPreviousMark = newBtmID;
}   


// Add <tr> tag to table
function defaultAddTr() {
    var tdContent = document.getElementsByTagName("td");
    var tableContent = "";
    var brand, carID;
    
    // Loop until end of <td>
    // Add <tr> tag upon third <td>
    for (let i = 0; i < tdContent.length; i++) {
        brand = tdContent[i].className;
        carID = i+1;
        tableContent = tableContent + "<td class='" + brand + "' id='" + carID + "' onclick=\"window.location.href = '../CarProduct/CarProduct.php?carID=" + carID + "'\">" + tdContent[i].innerHTML + "</td>";

        if ((i+1) % 3 == 0) {
            tableContent += "</tr><tr>";
        }
    }
    // alert(tableContent);
    document.getElementById("carTable").innerHTML = tableContent;
    originalTableContent = tableContent;
}