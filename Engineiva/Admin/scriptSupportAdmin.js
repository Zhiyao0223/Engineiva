// Use to sort category
function filter(category) {
    var table = document.getElementsByTagName("tr");
    var className;
    var foundStatus = false;

    for (let i = 1; i < table.length; i++) {
        table[i].style.display = "none";
    }

    for (let j = 1; j < table.length; j++) {
        className = table[j].className;
        // alert(className + "," + category);

        if (className == category) {
            // alert('yeet');
            foundStatus = true;
            table[j].style.display = "table-row";
        }
    }

    if (!foundStatus) {
        alert("No result found.");

        for (let i = 1; i < table.length; i++) {
            table[i].style.display = "table-row";
        }
    }
}