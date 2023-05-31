/*Function for display the search menu*/
$(document).ready(function(){
    $("#search-bar").on("input", function(){
        //DISPLAY BLOCK IF <> "" OR NONE IF === ""
        var display = $("#search-bar").val;
        if (display != "") {
            //NOT DISPLAY
            $("#search_menu").css("display","block");
        }
    });
});
/*Function for display the search menu*/