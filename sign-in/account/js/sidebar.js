function close_sidebar_fun() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("icon_open_sidebar").style.display = "block";
}
function sidebar_block() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("icon_open_sidebar").style.display = "none";
}



function orders() {
    var block = document.getElementById("saved_orders").style.display;
    if (block === "none") {
        document.getElementById("saved_orders").style.display = "block";
        document.getElementById("placed_orders").style.display = "block";
        document.getElementById("completed_orders").style.display = "block";
    } else {
        document.getElementById("saved_orders").style.display = "none";
        document.getElementById("placed_orders").style.display = "none";
        document.getElementById("completed_orders").style.display = "none";
    }
}
function pc_builds() {
    var block = document.getElementById("amd").style.display;
    if (block === "none") {
        document.getElementById("amd").style.display = "block";
        document.getElementById("INTEL").style.display = "block";
    } else {
        document.getElementById("amd").style.display = "none";
        document.getElementById("INTEL").style.display = "none";
        //ALL CATEGORIES SHOULD BE HIDDE
        document.getElementById("internet_AMD").style.display = "none";
        document.getElementById("simpleEdit_AMD").style.display = "none";
        document.getElementById("moderate_AMD").style.display = "none";
        document.getElementById("gaming1080p_AMD").style.display = "none";
        document.getElementById("gaming1440p_AMD").style.display = "none";
        document.getElementById("prof_AMD").style.display = "none";
        document.getElementById("internet_INTEL").style.display = "none";
        document.getElementById("simpleEdit_INTEL").style.display = "none";
        document.getElementById("moderate_INTEL").style.display = "none";
        document.getElementById("gaming1080p_INTEL").style.display = "none";
        document.getElementById("gaming1440p_INTEL").style.display = "none";
        document.getElementById("prof_INTEL").style.display = "none";
    }
}
function amd_fun() {
    var block = document.getElementById("internet_AMD").style.display;
    if (block === "none") {
        document.getElementById("internet_AMD").style.display = "block";
        document.getElementById("simpleEdit_AMD").style.display = "block";
        document.getElementById("moderate_AMD").style.display = "block";
        document.getElementById("gaming1080p_AMD").style.display = "block";
        document.getElementById("gaming1440p_AMD").style.display = "block";
        document.getElementById("prof_AMD").style.display = "block";
    } else {
        document.getElementById("internet_AMD").style.display = "none";
        document.getElementById("simpleEdit_AMD").style.display = "none";
        document.getElementById("moderate_AMD").style.display = "none";
        document.getElementById("gaming1080p_AMD").style.display = "none";
        document.getElementById("gaming1440p_AMD").style.display = "none";
        document.getElementById("prof_AMD").style.display = "none";
    }
}
function intel_fun() {
    var block = document.getElementById("internet_INTEL").style.display;
    if (block === "none") {
        document.getElementById("internet_INTEL").style.display = "block";
        document.getElementById("simpleEdit_INTEL").style.display = "block";
        document.getElementById("moderate_INTEL").style.display = "block";
        document.getElementById("gaming1080p_INTEL").style.display = "block";
        document.getElementById("gaming1440p_INTEL").style.display = "block";
        document.getElementById("prof_INTEL").style.display = "block";
    } else {
        document.getElementById("internet_INTEL").style.display = "none";
        document.getElementById("simpleEdit_INTEL").style.display = "none";
        document.getElementById("moderate_INTEL").style.display = "none";
        document.getElementById("gaming1080p_INTEL").style.display = "none";
        document.getElementById("gaming1440p_INTEL").style.display = "none";
        document.getElementById("prof_INTEL").style.display = "none";
    }
}
function fave() {
    var block = document.getElementById("favorites").style.display;
    if (block === "none") {
        document.getElementById("favorites").style.display = "block";
        document.getElementById("have_prod").style.display = "block";
    } else {
        document.getElementById("favorites").style.display = "none";
        document.getElementById("have_prod").style.display = "none";
    }
}
function settings_fun() {
    var block = document.getElementById("personal").style.display;
    if (block === "none") {
        document.getElementById("personal").style.display = "block";
        document.getElementById("username").style.display = "block";
        document.getElementById("tele").style.display = "block";
        document.getElementById("address").style.display = "block";
        document.getElementById("security").style.display = "block";
    } else {
        document.getElementById("personal").style.display = "none";
        document.getElementById("username").style.display = "none";
        document.getElementById("tele").style.display = "none";
        document.getElementById("address").style.display = "none";
        document.getElementById("security").style.display = "none";
    }
}