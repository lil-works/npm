var FF = {
    init: function(){


        FF.$openFilterButton = $('<a href="#" role="button" class="btn btn-sm btn-secondary"><i class="fa fa-filter" aria-hidden="true"></i> open filter</a>');
        FF.$closeFilterButton = $('<a href="#" role="button" class="btn btn-sm  btn-secondary"><i class="fa fa-window-close" aria-hidden="true"></i> close filter</a>');
        FF.$formFilter = $(".formFilter");



        FF.formFilterHtml = $(".formFilter").html();

        FF.$formFilter.html(this.$openFilterButton);
        FF.setClick();


    },

    setClick: function(){
        FF.$openFilterButton.click(function(){
            FF.$formFilter.html(FF.formFilterHtml);
            FF.$formFilter.prepend(FF.$closeFilterButton);
            FF.$closeFilterButton.click(function(){
                $(this).remove();
                FF.init();
            });
        });
    }

};