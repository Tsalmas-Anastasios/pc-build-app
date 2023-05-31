//Function for search-bar
function submitSearchFunction() {
    var search = document.getElementById('search-bar').value;
    if (search == "") {
        return false;
    } else {
        return true;
    }
}
//Function for search-bar


//Hide the menu on body onclick
function hideMenuBodyClick() {
    document.getElementById('search_menu').style.display = "none";
}
//Hide the menu on body onclick