function displayFooterButtonsAction() {
    document.getElementById("footer-buttons-action").style.display = "flex";
    document.getElementById("footer-buttons-action-collapsible").style.display = "none";
    document.getElementById("footer-buttons-action-collapsible-div-two").style.display = "block";
    document.getElementById("footer-buttons-action-collapsible-two").style.display = "block";
}

    function displayNoneFooterButtonsAction() {
    document.getElementById("footer-buttons-action").style.display = "none";
    document.getElementById("footer-buttons-action-collapsible").style.display = "block";
    document.getElementById("footer-buttons-action-collapsible-div-two").style.display = "none";
}

function windowResizeFitActionButtons() {
    var size = window.outerWidth;
    if (size <= 550) {
        document.getElementById("windowSizeFit").innerHTML = "B";
    } else {
        document.getElementById("windowSizeFit").innerHTML = "A";
    }
    if (document.getElementById("windowSizeFit").innerHTML == "B") {
        document.getElementById("footer-buttons-action").style.display = "none";
        document.getElementById("footer-buttons-action-collapsible-div").style.display = "block";
        document.getElementById("footer-buttons-action-collapsible").style.display = "block";
    } else if (document.getElementById("windowSizeFit").innerHTML == "A") {
        document.getElementById("footer-buttons-action").style.display = "flex";
        document.getElementById("footer-buttons-action-collapsible").style.display = "none";
        document.getElementById("footer-buttons-action-collapsible-two").style.display = "none";
    }
}