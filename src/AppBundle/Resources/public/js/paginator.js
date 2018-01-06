function toggleInPaginator(){
    if($(".myPaginator :input").first().is(':checked')){
        $(".myPaginatorRow :input").prop('checked', true);
    }else{
        $(".myPaginatorRow :input").prop('checked', false);
    }
    initMyPaginator();
}
function deleteSelection(route){

    var routeGenerated = Routing.generate(route);

    var ids = [];

    $(".myPaginatorRow :input").each(
        function(){
            if($(this).is(':checked')){
                var id = this.id.split("_");
                ids.push(id[1]);
            }
        }
    );

    var request = $.ajax({
        url: routeGenerated,
        method: "POST",
        data: { ids:ids },
        dataType: "html",
        async: false
    });

    request.done(function (msg) {
        window.location.reload();
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

function initMyPaginator(){
    $("#myPaginatorDelete").hide();
    $(".myPaginatorRow :input").each(
        function(){
            $(this).click(function(){initMyPaginator();});
            if($(this).is(':checked')){
                $("#myPaginatorDelete").show();
                return ;
            }
        }
    );
}