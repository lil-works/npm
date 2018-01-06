var T = {
    init: function(tabsId){

        $( "#"+tabsId ).tabs();
        $( "#"+tabsId+" ul li").click(function(){
            $( "#tabs").find('.active').each(function(){
                $(this).removeClass('active');
            });
            $(this).find('a').addClass('active');
        });



    }

};