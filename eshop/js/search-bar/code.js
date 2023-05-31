$(document).ready(function(){
    $("#search-bar").keyup(function(){
        $("#search-menu").css("display","block");
        var searchText = $(this).val();
        if(searchText!='') {
            $.ajax({
                url:'menu-autocomplete.php',
                method:'post',
                data:{query:searchText},
                success:function(response){
                    $("#a-menu").html(response);
                }
            });
        }
        else {
            $("#a-menu").html('')
        }
    });
    $(document).on('click', 'a', function(){
        $("#search-bar").val($(this).text());
        $("#a-menu").html('');
    });
});