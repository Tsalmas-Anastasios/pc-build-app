$(document).ready(function(){
    $("#search-bar").keyup(function(){
        $("#search_menu").css("display","block");
        
        var searchText = $(this).val();
        if(searchText!='') {
            $.ajax({
                url:'menu-autocomplete.php',
                method:'post',
                data:{query:searchText},
                success:function(response){
                    $("#search_menu").html(response);
                }
            });
        }
        else {
            $("#search_menu").html('')
        }
    });
    $(document).on('click', 'a', function(){
        $("#search-bar").val($(this).text());
        $("#search_menu").html('');
    });
});