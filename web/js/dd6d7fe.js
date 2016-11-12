function initTinymce(){
        tinymce.init({
        selector: 'textarea',
        height: 250,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_style: "* {font-size: 2em;}"
        });
}

function manageFormBreakdown(breakdown_ajax_searchExact,breakdown_ajax_searchAll,breakdown_ajax_addDescriptor,breakdown_ajax_getSequences){

    this.colors = {1:"#BB7777",2:'#77BB77',3:'#7777BB',4:'#BBBB77'}

    //$("#breakdown_descriptors").hide();
    //$("label[for=breakdown_descriptors]").hide();
    $("#start").hide();
    $("#stop").hide();


    oMnageFormBreakdown = this;
    newDescriptors = [];


    this.getFormDateValue = function(startStop){


        year = $("#breakdown_"+startStop+"_date_year option[selected=selected]").val();
        month = $("#breakdown_"+startStop+"_date_month option[selected=selected]").val();
        day = $("#breakdown_"+startStop+"_date_day option[selected=selected]").val();
        hour = $("#breakdown_"+startStop+"_time_hour [selected=selected]").val();
        minute = $("#breakdown_"+startStop+"_time_minute option[selected=selected]").val();

        myDate =  moment(year + "," + month + "," + day + "," + hour + "," + minute , 'YYYY,M,D,H,m');

        if(year == undefined){
            return "";
        }

        return moment(myDate).format('YYYY/MM/DD HH:mm');

    };


    $('<div id="dateTimePicker"><label for="date_timepicker_start">start:</label><input class="form-control" target="start" id="date_timepicker_start" value="'+this.getFormDateValue('start')+'" size="40"></div>').insertBefore($("#start"));
    $('<div id="dateTimePicker"><label for="date_timepicker_end">stop:</label><input class="form-control" target="stop" id="date_timepicker_end" value="'+this.getFormDateValue('stop')+'" size="40"></div>').insertBefore($("#stop"));

    var datetimepickerOptions = {

        step: 5,
        dayOfWeekStart: 1,      //week begins with monday
        onChangeDateTime: function(current,$input) {

            year =  moment(current).format("YYYY");
            month = moment(current).format("M");
            day = moment(current).format("D");
            hour = moment(current).format("H");
            minute = moment(current).format("m");

            var target =$input.attr('target');

            $("#breakdown_"+target+"_date_year option[selected=selected]").attr('selected',false);
            $("#breakdown_"+target+"_date_year option[value="+year+"]").attr('selected',true);
            $("#breakdown_"+target+"_date_year").val(year);

            $("#breakdown_"+target+"_date_month option[selected=selected]").attr('selected',false);
            $("#breakdown_"+target+"_date_month option[value="+month+"]").attr('selected',true);
            $("#breakdown_"+target+"_date_month").val(month);

            $("#breakdown_"+target+"_date_day option[selected=selected]").attr('selected',false);
            $("#breakdown_"+target+"_date_day option[value="+day+"]").attr('selected',true);
            $("#breakdown_"+target+"_date_day").val(day);


            $("#breakdown_"+target+"_time_hour option[selected=selected]").attr('selected',false);
            $("#breakdown_"+target+"_time_hour option[value="+hour+"]").attr('selected',true);
            $("#breakdown_"+target+"_time_hour").val(hour);

            $("#breakdown_"+target+"_time_minute option[selected=selected]").attr('selected',false);
            $("#breakdown_"+target+"_time_minute option[value="+minute+"]").attr('selected',true);
            $("#breakdown_"+target+"_time_minute").val(minute);
        }
    };


    jQuery('#date_timepicker_start').datetimepicker(datetimepickerOptions);
    jQuery('#date_timepicker_end').datetimepicker(datetimepickerOptions);


    /*
     * Rewrite submit
     */
    $('form[name=breakdown]').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $( 'form[name=breakdown]' ).submit(function( e ) {

        e.preventDefault();
        e.returnValue = false;
        var $form = $(this);
        q = [];
        $('#breakdown_descriptors option[state=new]').each(
            function(){
                tmpq = [];
                tmpq[0] = $(this).attr("category");
                tmpq[1] = $(this).text();
                tmpq[2] = $(this).attr("value");
                q.push(JSON.stringify(tmpq));

            }
        );

        $.ajax({
            type: 'post',
            url: breakdown_ajax_addDescriptor,
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(q),
            context: $form, // context will be "this" in your handlers

            success: function() { // your success handler
            },
            error: function() { // your error handler
            },
            complete: function(r) {
                json = (r.responseJSON);
                for(i=0;i< json.length;i++){
                    $("#breakdown_descriptors option[value="+json[i][0]+"]").attr("value",json[i][1]);
                }
                this.off('submit');
                this.submit();
            }
        });

    });

    /*
     * init boxes
     */
    this.initBoxes = function (category,catName){


        $("#descriptorBox_"+category).empty();

        htmlDescriptor = '<div  class="panel panel-default" id="descriptorInputs-'+category+'">' +
        '<div class="panel-heading" style="background-color:'+oMnageFormBreakdown.colors[category]+' ;" >add '+catName+' descriptor :</div>' +
        '<div class="panel-body"><input class="form-control" type="text" id="add_'+category+'" /></div>' +
        '</div>' ;
        $('#descriptorInputs').append(htmlDescriptor);

        htmlDescriptorBoxes = '<div class="descriptorBox"  id="descriptorBox_'+category+'" ></div>';
        $('#descriptorBoxes').append(htmlDescriptorBoxes);

        oMnageFormBreakdown.rewriteBoxes(category);


        var typingTimer;                //timer identifier
        var doneTypingInterval = 200;
        var $input = $( "#add_"+category );

        $input.on('keyup',   function (e) {

            //enter pressed
            if(e.which == 13) {
                oMnageFormBreakdown.manualInput(category,$(this).val());
                return true;
            }

            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });


        function doneTyping () {
            if($( "#add_"+category ).val().length <=0 ){
                return;
            }

            q = [];
            q[0] = '%'+$( "#add_"+category ).val()+'%';
            q[1] = category;

            var request = $.ajax({
                url:breakdown_ajax_searchAll,
                method: "POST",
                data: { q : q  },
                dataType: "html"
            });

            request.done( function( msg ) {
                var r = jQuery.parseJSON( msg );
                $('#searchResult-'+category).remove();

                if(r.length == 0){
                    $("#add_"+category).after('<ul class="list-inline" style="color:#884444;" id="searchResult-'+category+'">No Matching descriptors found for "<strong>'+$( "#add_"+category ).val()+'</strong>" : </ul>');
                }else{
                    $("#add_"+category).after('<ul class="list-inline" id="searchResult-'+category+'">Matching descriptors for "<strong>'+$( "#add_"+category ).val()+'</strong>" : </ul>');
                }
                htmlText = "";
                for(i=0;i<r.length;i++){
                    htmlText+= '<li class="searchResult-'+category+'" '+category+'_id="'+r[i].id+'"><button type="button" style="background-color:'+r[i].color+'" class="btn btn-default" ><i class="glyphicon glyphicon-plus"></i>'+r[i].label+'</button></li>';
                }
                $('#searchResult-'+category).append(htmlText);
                $('.searchResult-'+category).each(
                    function(){
                        $(this).click(
                            function(){
                                oMnageFormBreakdown.addDescriptor(category,$(this).attr(category+'_id'),$(this).text());
                            }
                        );
                    }
                );
            });

        }

        $("#descriptorBox_"+category)
            .appendTo("#descriptorInputs-"+category);


    }
    this.searchMatchingSequences = function (){
        sel = $("#breakdown_descriptors").val();

        var request = $.ajax({
            url:breakdown_ajax_getSequences,
            method: "POST",
            data: { q : sel  },
            dataType: "html"
        });
        request.done( function( msg ) {
            var r = jQuery.parseJSON( msg );
            $("#matchingBreakdown").empty();
            if(r.length > 0){

                $("#matchingBreakdown").append('<ul id="matchingSequenceListContainer">Matching sequences in breakdowns</ul>');
                $.each( r, function(i, n){

                    $("#matchingSequenceListContainer").append('<button type="button" id="sequence_'+i+'" style="font-weight:'+parseInt(parseFloat(n.score)*900)+';"><i class="glyphicon glyphicon-plus"></i>'+ n.sequence+'</button>');

                    $("#sequence_"+i).click(function(){

                        $("#breakdown_descriptors").val(n.descriptorList.split(','));
                        oMnageFormBreakdown.rewriteBoxes(1);
                        oMnageFormBreakdown.rewriteBoxes(2);
                        oMnageFormBreakdown.rewriteBoxes(3);
                        oMnageFormBreakdown.rewriteBoxes(4);
                    });
                });

            }

        });
    }
    this.addDescriptor = function (category,id,label){


        if(id){
            sel = $("#breakdown_descriptors").val();
            if(!sel){
                sel = [];
            }
            if( $.inArray(id,sel) < 0) {
                $("#breakdown_descriptors option[value="+id+"]").attr('selected',true);
                sel.push(id);
                $("#breakdown_descriptors").val(sel);
                $('#searchResult-'+category).empty();
                $('#add_'+category).val("");

                oMnageFormBreakdown.rewriteBoxes(category);
            }

        }else{
            if( $.inArray( label , newDescriptors ) == -1){
                newDescriptors.push(label);
                newId = $.inArray( label , newDescriptors );

                html = '<button type="button" class="btn btn-default newDescriptor"  selected="selected" category="'+category+'" id="new_'+newId+'"><i class="glyphicon glyphicon-trash"></i>'+label+'</button>';
                $("#descriptorBox_"+category).append(html);

                html = '<option selected="selected" state="new" category="'+category+'" value="new_'+newId+'">'+label+'</option>';
                $("#breakdown_descriptors").append(html);

                $("#descriptorBox_"+category+" button[id=new_"+newId+"]").click(
                    function(){


                        var idToRemoveTMP = this.id.split("_");
                        var idToRemoveTMP = idToRemoveTMP[1];

                        $("#breakdown_descriptors option[value="+this.id+"]").attr('selected',false);
                        $("#breakdown_descriptors option[value="+this.id+"]").remove();

                        var keyToRemove = $.inArray( this.id , newDescriptors );
                        newDescriptors.splice(keyToRemove,1);

                        $(this).remove();
                        oMnageFormBreakdown.searchMatchingSequences();
                    }
                );
            }

        }

        $('#searchResult-'+category).empty();
        $('#add_'+category).val("");



        this.searchMatchingSequences();
    }
    this.rewriteBoxes = function (category){

        $("#descriptorBox_"+category+" button").remove();
        $('#breakdown_descriptors option:selected[category='+category+']').each(
            function(){

                $(this).clone().appendTo($("#descriptorBox_"+category));
                if( $("#descriptorBox_"+category+" option[value="+$(this).val()+"]").attr("state") == "new" ){
                    className = "newDescriptor";
                }else{
                    className = "existingDescriptor";
                }


                $("#descriptorBox_"+category+" option[value="+$(this).val()+"]").replaceWith('<button style="background-color: '+oMnageFormBreakdown.colors[category]+';" id="'+$(this).val()+'" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-trash"></i>'+$("#descriptorBox_"+category+" option[value="+$(this).val()+"]").html()+'</button');

                $("#descriptorBox_"+category+" button[id="+$(this).val()+"]").click(
                    function(){
                        $(this).remove();
                        $("#breakdown_descriptors option[value="+this.id+"]").attr('selected',false);
                        oMnageFormBreakdown.searchMatchingSequences();
                    }
                );
            }
        );
        return true;
    }
    this.descriptorExist = function (category,val){
        return $('#breakdown_descriptors option[selected="selected"]').filter(function () { return $(this).html() == val; }).val() != undefined;
    }
    this.manualInput = function (category,val){

        if(oMnageFormBreakdown.descriptorExist(category,val) == true){
            return true;
        }

        q = [];
        q[0] = val;
        q[1] = category;
        var request = $.ajax({
            url:breakdown_ajax_searchExact,
            method: "POST",
            data: { q : q  },
            dataType: "html"
        });
        request.done( function( msg ) {
            var r = jQuery.parseJSON( msg );
            if(r.length == 0){
                oMnageFormBreakdown.addDescriptor(category,null,q[0]);
            }else{
                oMnageFormBreakdown.addDescriptor(category,r.id,r.label);
            }
        });
    }

    manageFormInterfero();


    htmlDescriptor = '<ul id="descriptorInputs"></ul>';
    htmlDescriptorBoxes = '<div id="descriptorBoxes"></div>';


    $('<div id="descriptorRewrited">'+htmlDescriptor+htmlDescriptorBoxes+'</div>').insertAfter($("#descriptors"))



    this.initBoxes(1,'element');
    this.initBoxes(2,'status');
    this.initBoxes(3,'action');
    this.initBoxes(4,'contributor');


    $("#descriptorInputs").before('<div id="sequenceMatching"></div>')


    initTinymce();
}
String.prototype.extractBraketedId = function(){
    var str = this;
    split = str.split('[');
    split2 = split[1].split(']');
    nbrId = split.length
    return split2[0];
}


function manageFormInterfero(){

    $("#breakdowns_interferos-list").hide();

    idTable = Array();
    antenna = Array();
    band = Array();

    $("#breakdowns_interferos-list").find('select').each(function (e) {
        var splitedSymfonyValue = this.id.split('_');
        var symfonyId = parseInt(splitedSymfonyValue[3]);
        var splitedAntennaBand = $("#breakdown_breakdowns_interferos_"+symfonyId+"_id").val().split("_");
        idTable[symfonyId] = Array(symfonyId,$("#breakdown_breakdowns_interferos_"+symfonyId+"_id").val(),parseInt(splitedAntennaBand[0]),parseInt(splitedAntennaBand[1]));
        antenna.push(splitedAntennaBand[0]);
        band.push(splitedAntennaBand[1]);
    });
    nbrAntenna = Math.max.apply(Math,antenna);
    nbrBand = Math.max.apply(Math,band);


    htmlForArray = '<table id="interfero">'+
    '<tr>'+
    '<td id="interfero-reverseSelection"><button type="button" class="btn btn-default">reverse selection</button></td>'+
    '</tr>'+
    '<tr>'+
    '<td id="interfero-toggleAll"><button type="button" class="btn btn-default">Antenna</button></td>';
    for(col=1;col<=nbrBand;col++) { htmlForArray+='<td class="interfero-toggleBand" id="interfero-toggleBand['+col+']"><button type="button" class="btn btn-default">band '+col+'</button></td>'; }
    htmlForArray+='</tr>';



    for(line=1;line<=nbrAntenna;line++){
        htmlForArray+='<tr id="interfero-'+line+'">'+
        '<td class="interfero-toggleAntenna"  id="interfero-toggleAntenna['+line+']"><button type="button" class="btn btn-default">'+line+'</button></td>';
        for(col=1;col<=nbrBand;col++){
            htmlForArray+='<td id="interfero-'+line+'_'+col+'"></td>';
        }
        htmlForArray+='</tr>';
    }
    htmlForArray+='</table>';



    $('<div id="interferoRewrited"></div>').insertAfter($('#breakdowns_interferos-list'));
    $('#interferoRewrited').append(htmlForArray);



    for(var i in idTable){
        $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").appendTo($("#interfero-"+idTable[i][1]));
    }

    //Reverse selection
    $("#interfero-reverseSelection").click(
        function(){
            $('#interfero').find('select').each(
                function(){
                    if($(this).val() == 0){
                        $(this).val(1);
                    }else{
                        $(this).val(0);
                    }

                }
            );
        }
    );
    $("#interfero-toggleAll").click(
        function(){
            first = $("#breakdown_breakdowns_interferos_"+idTable[0][0]+"_status").val();
            if(first == 0){val = 1;}else{val=0;}
            for(var i in idTable){
                $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").val(val);
            }
        }
    );
    $(".interfero-toggleBand").each(function(){
        $(this).click(
          function(){
              first = null;
              for(var i in idTable){
                  if(idTable[i][3] == +this.id.extractBraketedId()){
                      first = $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").val();
                  break;
                  }
              }
              if(first == 0){val = 1;}else{val=0;}
              for(var i in idTable){
                  if(idTable[i][3] == +this.id.extractBraketedId()){
                      $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").val(val);
                  }
              }

          }
        );
    })

    $(".interfero-toggleAntenna").each(function(){
        $(this).click(
            function(){
                first = null;
                for(var i in idTable){
                    if(idTable[i][2] == +this.id.extractBraketedId()){
                        first = $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").val();
                        break;
                    }
                }
                if(first == 0){val = 1;}else{val=0;}
                for(var i in idTable){
                    if(idTable[i][2] == +this.id.extractBraketedId()){
                        $("#breakdown_breakdowns_interferos_"+idTable[i][0]+"_status").val(val);
                    }
                }

            }
        );
    })


}