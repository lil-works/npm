$(document).ready(function() {
    $('#incfont').click(function(){
        curSize= parseInt($('#wrapper').css('font-size')) + 1;
        if(curSize<=32)
            $('#wrapper').css('font-size', curSize);
    });
    $('#decfont').click(function(){
        curSize= parseInt($('#wrapper').css('font-size')) - 1;
        if(curSize>=6)
            $('#wrapper').css('font-size', curSize);
    });
});