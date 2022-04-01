var filterPreviousBrand, filterCurrentBrand = "", originalTableContent;

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


// Filter
function filter(brand) {
    var carBox = document.getElementsByClassName("carBox");
    var brandBox = document.getElementsByClassName(brand);
    var filterTop = document.getElementsByClassName("brand-name");
    var filterBtm = document.getElementsByClassName("filter-brand");
    var topBrandClass, topBrandBox, btmBrandClass, btmBrandBox;
    var resetStatus = false, checkStatus = false;

    if (brand == filterPreviousBrand) {
        resetStatus = true;
    }
    else if (brand == "BMW") {
        topBrandClass = "brandTopBMW";
        btmBrandClass = "filterBtmBMW";
        checkStatus = true;
    }
    else if(brand == "Honda") {
        topBrandClass = "brandTopHonda";
        btmBrandClass = "filterBtmHonda";
        checkStatus = true;
    }
    else if (brand == "Mazda") {
        topBrandClass = "brandTopMazda";
        btmBrandClass = "filterBtmMazda";
        checkStatus = true;
    }
    else if (brand == "Mercedes") {
        topBrandClass = "brandTopMercedes";
        btmBrandClass = "filterBtmMercedes";
        checkStatus = true;
    }

    // Check if user want to unselect brand
    if (resetStatus) {
        filterCurrentBrand = "";
        for (let z = 0; j < carBox.length; z++) {
            carBox[z].style.display = "";
        }
        return;
    }
    else {
        filterCurrentBrand = brand;
    }
    
    // Reset border color
    for (let x = 0; x < filterTop.length; x++) {
        filterTop[x].style.border = "none";
    }
    for (let y = 0; y < filterBtm.length; y++) {
        filterBtm[y].style.border = "none";
    }

    if (checkStatus) {
        topBrandBox = document.getElementById(topBrandClass);
        btmBrandBox = document.getElementById(btmBrandClass);
        
        topBrandBox.style.border = "2px solid blue";
        btmBrandBox.style.border = "2px solid blue";


    }
    else {
        topBrandClass = "brandTop" + brand;
        document.getElementById(topBrandClass).border = "2px solid blue";
    }

    // First loop set all to none, second filter
    for (let i = 0; i < carBox.length; i++) {
        carBox[i].style.display = "none";
    }

    for (let j = 0; j < brandBox.length; j++) {
        brandBox[j].style.display = "";
    }
    filterPreviousBrand = brand;
}


// Sort table 
function sort(value) {
    var carBox = document.getElementsByClassName("carBox");
    // alert(filterCurrentBrand);
    if (filterCurrentBrand != "") {
        var brandBox = document.getElementsByClassName(filterCurrentBrand);
        // Reset all and filter again by brand
        for (let k = 0; k < carBox.length; k++) {
            carBox[k].style.display = "none";
        }
        for (let p = 0; p < brandBox.length; p++) {
            brandBox[p].style.display = "";
        }
    }
    else {
        for (let k = 0; k < carBox.length; k++) {
            carBox[k].style.display = "";
        }
    }

    if (value == "default") {
        document.getElementById("carTable").innerHTML = originalTableContent;
        // alert(filterCurrentBrand);
        if (filterCurrentBrand != "") {
            var brandBox = document.getElementsByClassName(filterCurrentBrand);
            // Reset all and filter again by brand
            for (let k = 0; k < carBox.length; k++) {
                carBox[k].style.display = "none";
            }
            for (let p = 0; p < brandBox.length; p++) {
                brandBox[p].style.display = "";
            }
        }
    }
    else if(value == "priceHigh") {
        var priceBox = document.getElementsByClassName("price");
        swap = true;

        while (swap) {
            swap = false;
            for (i = 0; i < (priceBox.length-1); i++) {
                shouldSwap = false;

                var price = priceBox[i].innerHTML.trim();
                newPrice = price.replace(/,\s/g, "");
                newPrice = parseInt(newPrice.slice(2));

                var priceNext = priceBox[i+1].innerHTML.trim();
                newPriceNext = priceNext.replace(/,\s/g, "");
                newPriceNext = parseInt(newPriceNext.slice(2));

                if (newPriceNext > newPrice) {
                    // alert('swapp');
                    shouldSwap = true;
                    break;
                }
            }

            if (shouldSwap == true) {
                carBox[i].parentNode.insertBefore(carBox[i + 1], carBox[i]);
                swap = true;
            }
        }
    }
    else if(value == "priceLow") {
        var priceBox = document.getElementsByClassName("price");
        swap = true;

        while (swap) {
            swap = false;
            for (i = 0; i < (priceBox.length-1); i++) {
                shouldSwap = false;

                var price = priceBox[i].innerHTML.trim();
                newPrice = price.replace(/,\s/g, "");
                newPrice = parseInt(newPrice.slice(2));

                var priceNext = priceBox[i+1].innerHTML.trim();
                newPriceNext = priceNext.replace(/,\s/g, "");
                newPriceNext = parseInt(newPriceNext.slice(2));

                if (newPriceNext < newPrice) {
                    // alert('swapp');
                    shouldSwap = true;
                    break;
                }
            }

            if (shouldSwap == true) {
                carBox[i].parentNode.insertBefore(carBox[i + 1], carBox[i]);
                swap = true;
            }
        }
    }
    else if(value == "auto") {
        var transmission = document.getElementsByClassName("Automatic");
        for (let i = 0; i < carBox.length; i++) {
            if (carBox[i].style.display != "none") {
                if (transmission[i].className == "Automatic") {
                    carBox[i].style.display = "";
                }
                else {
                    carBox[i].style.display = "none"
                }
            }

        }
    }
    else if(value == "manual") {
        var transmission = document.getElementsByClassName("transmission");
        for (let i = 0; i < carBox.length; i++) {
            if (transmission[i] == "Manual") {
                carBox[i].style.display = "";
            }
            else {
                carBox[i].style.display = "none"
            }
        }
    }
        // Sort from latest year to earliest
    else if(value == "yearHigh") {
        var yearBox = document.getElementsByClassName("year");
        swap = true;

        while (swap) {
            swap = false;
            for (i = 0; i < (yearBox.length-1); i++) {
                shouldSwap = false;

                var year = yearBox[i].innerHTML.trim();
                var yearNext = yearBox[i+1].innerHTML.trim();

                if (year < yearNext) {
                    // alert('swapp');
                    shouldSwap = true;
                    break;
                }
            }

            if (shouldSwap == true) {
                carBox[i].parentNode.insertBefore(carBox[i + 1], carBox[i]);
                swap = true;
            }
        }
    }
    // Sort from earliest year to latest
    else if (value == "yearLow") {
        var yearBox = document.getElementsByClassName("year");
        swap = true;

        while (swap) {
            swap = false;
            for (i = 0; i < (yearBox.length-1); i++) {
                shouldSwap = false;

                var year = yearBox[i].innerHTML.trim();
                var yearNext = yearBox[i+1].innerHTML.trim();

                if (year > yearNext) {
                    // alert('swapp');
                    shouldSwap = true;
                    break;
                }
            }

            if (shouldSwap == true) {
                carBox[i].parentNode.insertBefore(carBox[i + 1], carBox[i]);
                swap = true;
            }
        }
    }
    else {
        alert("Error occur ~ RIP ~");
        return;
    }
    previousSort = value;

}


// Backup original html content
function saveBodyContent() {
    originalTableContent = document.getElementById("carTable").innerHTML;
}
