function toggleAnsBox(questionNo) {
    var questionBox = document.getElementsByClassName("question-box")[questionNo];
    var ansBox = document.getElementsByClassName("answer")[questionNo];
    var arrowDown = document.getElementsByClassName("fa-angle-down")[questionNo];
    var arrowUp = document.getElementsByClassName("fa-angle-up")[questionNo];

    var height = questionBox.offsetHeight;
    if (height == "50") {
        questionBox.style.height = "max-content";
        questionBox.style.transition = "2s ease-out";
        arrowDown.style.display = "none";
        arrowUp.style.display = "block";
    }
    else {
        questionBox.style.height = "50px";
        arrowDown.style.display = "block";
        arrowUp.style.display = "none";
    }

    return;
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