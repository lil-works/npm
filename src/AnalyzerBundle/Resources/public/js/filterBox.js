

function dpPreset(dpId,presetName,d1Id,d2Id){
    if(presetName == "forever"){
        $('#'+dpId).val(
            "null ~ null"
        );
    }else if(presetName == "pastYear"){

        $('#'+dpId).val(
            moment().subtract(1, 'years').format('DD.MM.YYYY HH:mm')+
            " ~ "+
            moment().format('DD.MM.YYYY HH:mm')
        );
    }else if(presetName == "pastMonth"){

        $('#'+dpId).val(
            moment().subtract(1, 'months').format('DD.MM.YYYY HH:mm')+
            " ~ "+
            moment().format('DD.MM.YYYY HH:mm')
        );
    }else if(presetName == "pastWeek"){

        $('#'+dpId).val(
            moment().subtract(1, 'weeks').format('DD.MM.YYYY HH:mm')+
            " ~ "+
            moment().format('DD.MM.YYYY HH:mm')
        );

    }else if(presetName == "pastDay"){

        $('#'+dpId).val(
            moment().subtract(1, 'days').format('DD.MM.YYYY HH:mm')+
            " ~ "+
            moment().format('DD.MM.YYYY HH:mm')
        );

    }

}
function durationPreset(way,value,unity){

    if(!way){
        $("#duration-min").val("");
        $("#duration-max").val("");
        return;
    }

    $("#duration-unity").val(unity)
    if(way == ">"){
        $("#duration-min").val("1");
        $("#duration-max").val("");
    }else{
        $("#duration-min").val("0");
        $("#duration-max").val("1");
    }

}
function pickerToForm(dpId,d1Id,d2Id){


    exploded =  $('#'+dpId).dateRangePicker().val().split('~');


    if (exploded[0].toLowerCase().indexOf("null") >= 0){
        $("#"+d1Id+"_date_year option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_date_month option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_date_day option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_time_hour option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_time_minute option[selected=selected]").attr('selected',false);
    }else{
        d1 = moment(exploded[0],'DD.MM.YYYY HH:mm');
        startYear =  moment(d1).format("YYYY");
        startMonth = moment(d1).format("M");
        startDay = moment(d1).format("D");
        startHour = moment(d1).format("H");
        startMinute = moment(d1).format("m");
        $("#"+d1Id+"_date_year option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_date_year option[value="+startYear+"]").attr('selected',true);
        $("#"+d1Id+"_date_year").val(startYear);

        $("#"+d1Id+"_date_month option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_date_month option[value="+startMonth+"]").attr('selected',true);
        $("#"+d1Id+"_date_month").val(startMonth);

        $("#"+d1Id+"_date_day option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_date_day option[value="+startDay+"]").attr('selected',true);
        $("#"+d1Id+"_date_day").val(startDay);


        $("#"+d1Id+"_time_hour option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_time_hour option[value="+startHour+"]").attr('selected',true);
        $("#"+d1Id+"_time_hour").val(startHour);

        $("#"+d1Id+"_time_minute option[selected=selected]").attr('selected',false);
        $("#"+d1Id+"_time_minute option[value="+startMinute+"]").attr('selected',true);
        $("#"+d1Id+"_time_minute").val(startMinute);
    }

    if (exploded[1].toLowerCase().indexOf("null") >= 0){
        $("#"+d2Id+"_date_year option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_date_month option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_date_day option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_time_hour option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_time_minute option[selected=selected]").attr('selected',false);
    }else{
        d2 = moment(exploded[1],'DD.MM.YYYY HH:mm');
        stopYear =  moment(d2).format("YYYY");
        stopMonth = moment(d2).format("M");
        stopDay = moment(d2).format("D");
        stopHour = moment(d2).format("H");
        stopMinute = moment(d2).format("m");

        $("#"+d2Id+"_date_year option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_date_year option[value="+stopYear+"]").attr('selected',true);
        $("#"+d2Id+"_date_year").val(stopYear);

        $("#"+d2Id+"_date_month option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_date_month option[value="+stopMonth+"]").attr('selected',true);
        $("#"+d2Id+"_date_month").val(stopMonth);

        $("#"+d2Id+"_date_day option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_date_day option[value="+stopDay+"]").attr('selected',true);
        $("#"+d2Id+"_date_day").val(stopDay);


        $("#"+d2Id+"_time_hour option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_time_hour option[value="+stopHour+"]").attr('selected',true);
        $("#"+d2Id+"_time_hour").val(stopHour);

        $("#"+d2Id+"_time_minute option[selected=selected]").attr('selected',false);
        $("#"+d2Id+"_time_minute option[value="+stopMinute+"]").attr('selected',true);
        $("#"+d2Id+"_time_minute").val(stopMinute);
    }








}
function durationToForm(){

    unity = $("#duration-unity").val();
    min = $("#duration-min").val();
    max = $("#duration-max").val();

    $("#descriptorTree_filter_durationUnity").val(unity);

    if(unity == "minute"){
        min = min * 60;
        max = max * 60;
    }else if(unity == "hour"){
        min = min * 60 * 60;
        max = max * 60 * 60;
    }else if(unity == "day"){
        min = min * 60 * 60 * 24;
        max = max * 60 * 60 * 24;
    }else if(unity == "week"){
        min = min * 60 * 60 * 24 * 7;
        max = max * 60 * 60 * 24 * 7;
    }
    if($("#duration-max").val() == ""){
        max="";
    }
    if($("#duration-min").val() == ""){
        min="";
    }


    $("#descriptorTree_filter_minDuration").val(min);
    $("#descriptorTree_filter_maxDuration").val(max);

}
function formToDuration(){

    unity = $("#descriptorTree_filter_durationUnity").val();
    min = $("#descriptorTree_filter_minDuration").val();
    max = $("#descriptorTree_filter_maxDuration").val();

    if(unity == "minute"){
        min = min / 60;
        max = max / 60;
    }else if(unity == "hour"){
        min = min / 60 / 60;
        max = max / 60 / 60;
    }else if(unity == "day"){
        min = min / 60 / 60 / 24;
        max = max / 60 / 60 / 24;
    }else if(unity == "week"){
        min = min / 60 / 60 / 24 / 7;
        max = max / 60 / 60 / 24 / 7;
    }
    if($("#descriptorTree_filter_maxDuration").val() == ""){
        max = "";
    }
    if($("#descriptorTree_filter_minDuration").val() == ""){
        min = "";
    }

    $("#duration-min").val(min);
    $("#duration-max").val(max);
    $("#duration-unity").val(unity)


}
function setDateRangePicker(formId,dpId,d1Id,d2Id){

    $("#filterBoxField-start").hide();
    $("#filterBoxField-stop").hide();
    $("#filterBoxField-duration").hide();


    $('#'+formId).submit(function( e ) {


        e.preventDefault();
        e.returnValue = false;
        var $form = $(this);
        pickerToForm(dpId,d1Id,d2Id);
        durationToForm();
        this.submit();
    });

    //create picker field
    $('<div class="filterBoxField"><label for="'+dpId+'">date picker</label><input class="form-control" id="'+dpId+'" value="" size="40"></div>').insertBefore($("#filterBoxField-start"));

    pickerPresetHtml = '<ul class="filterPresets list list-inline">' +
    '<li id="dpPreset-forever" onclick="dpPreset(\''+dpId+'\',\'forever\')"><button type="button" class="btn btn-primary">forever</button></li>' +
    '<li id="dpPreset-pastYear" onclick="dpPreset(\''+dpId+'\',\'pastYear\')"><button type="button" class="btn btn-secondary">past year</button></li>' +
    '<li id="dpPreset-pastMonth" onclick="dpPreset(\''+dpId+'\',\'pastMonth\')"><button type="button" class="btn btn-secondary">past month</button></li>' +
    '<li id="dpPreset-pastWeek" onclick="dpPreset(\''+dpId+'\',\'pastWeek\')"><button type="button" class="btn btn-secondary">past week</button></li>' +
    '<li id="dpPreset-pastDay" onclick="dpPreset(\''+dpId+'\',\'pastDay\')"><button type="button" class="btn btn-secondary">past day</button></li>' +
    '</ul>';


    $(pickerPresetHtml).insertAfter($("#"+dpId));

    //create duration field
    $('<div class="row filterBoxField form-group" id="filterBoxField-duration-rewrited">' +
    '<div class="col-lg-4">'+
    '<label for="duration-unity">time unity</label>' +
    '<select class="form-control" name="duration-unity" id="duration-unity"> '+
    '<option value="minute">minute</option>'+
    '<option value="hour">hour</option>'+
    '<option value="day">day</option>'+
    '<option value="week">week</option>'+
    '</select>'+
    '</div>'+
    '<div class="col-lg-4">'+
    '<label for="duration-min">min duration</label>' +
    '<input class="form-control" id="duration-min" value="" size="10">' +
    '</div>'+
    '<div class="col-lg-4">'+
    '<label for="duration-max">max duration</label>' +
    '<input class="form-control" id="duration-max" value="" size="10">' +
    '</div>'+

    '</div>').insertBefore($("#filterBoxField-duration"));


    formToDuration();



    pickerPresetHtml = '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">' +
    '<div class="btn-group mr-2" role="group" aria-label="init group">'+
    '<button onclick="durationPreset()" type="button" class="btn btn-primary">dont\'care</button>' +
    '</div>'+
    '<div class="btn-group mr-2" role="group" aria-label="< group">'+
    '<button onclick="durationPreset(\'<\',1,\'hour\')" type="button" class="btn btn-secondary">< 1 hour</button>' +
    '<button onclick="durationPreset(\'<\',1,\'day\')" type="button" class="btn btn-secondary">< 1 day</button>' +
    '<button onclick="durationPreset(\'<\',1,\'week\')" type="button" class="btn btn-secondary">< 1 week</button>' +
    '</div>'+
    '<div class="btn-group mr-2" role="group" aria-label="> group">'+
    '<button onclick="durationPreset(\'>\',1,\'hour\')" type="button" class="btn btn-secondary">> 1 hour</button>' +
    '<button onclick="durationPreset(\'>\',1,\'day\')" type="button" class="btn btn-secondary">> 1 day</button>' +
    '<button onclick="durationPreset(\'>\',1,\'week\')" type="button" class="btn btn-secondary">> 1 week</button>' +
    '</div>'+
    '</div>';

    $(pickerPresetHtml).appendTo($("#filterBoxField-duration-rewrited"));




    $('#'+dpId).dateRangePicker(
        {
            startOfWeek: 'monday',
            separator : ' ~ ',
            format: 'DD.MM.YYYY HH:mm',
            autoClose: false,
            time: {
                enabled: true
            },
            getValue: function()
            {
                return $(this).val();
            },
            setValue: function(s)
            {
                if(!$(this).attr('readonly') && !$(this).is(':disabled') && s != $(this).val())
                {
                    $(this).val(s);
                }
            },

        }).bind('datepicker-apply', function(event, obj)
        {

        });
    startYear = $("#"+d1Id+"_date_year option[selected=selected]").val();
    startMonth = $("#"+d1Id+"_date_month option[selected=selected]").val();
    startDay = $("#"+d1Id+"_date_day option[selected=selected]").val();
    startHour = $("#"+d1Id+"_time_hour [selected=selected]").val();
    startMinute = $("#"+d1Id+"_time_minute option[selected=selected]").val();

    stopYear = $("#"+d2Id+"_date_year option[selected=selected]").val();
    stopMonth = $("#"+d2Id+"_date_month option[selected=selected]").val();
    stopDay = $("#"+d2Id+"_date_day option[selected=selected]").val();
    stopHour = $("#"+d2Id+"_time_hour [selected=selected]").val();
    stopMinute = $("#"+d2Id+"_time_minute option[selected=selected]").val();


    if(startYear == undefined){
        startDate = "null";
    }else{
        startDate =  moment(startYear + "," + startMonth + "," + startDay + "," + startHour + "," + startMinute , 'YYYY,M,D,H,m').format('DD.MM.YYYY HH:mm');
    }
    if(stopYear == undefined){
        stopDate = "null";
    }else{
        stopDate =  moment(stopYear + "," + stopMonth + "," + stopDay + "," + stopHour + "," + stopMinute , 'YYYY,M,D,H,m').format('DD.MM.YYYY HH:mm');
    }




    $('#'+dpId).val(startDate+" ~ "+stopDate);

}



function draw(nodes,edges) {

    // Instantiate our network object.
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        interaction:{
            dragNodes:true,
            dragView: true,
            hideEdgesOnDrag: false,
            hideNodesOnDrag: false,
            hover: false,
            hoverConnectedEdges: true,
            keyboard: {
                enabled: true,
                speed: {x: 10, y: 10, zoom: 0.02},
                bindToWindow: true
            },
            multiselect: false,
            navigationButtons: true,
            selectable: true,
            selectConnectedEdges: true,
            tooltipDelay: 300,
            zoomView: true
        },
        autoResize: true,
        height: '500px',
        width: '100%',

        nodes : {
            shape: 'dot',
            size: 10
        },
        groups: {
            1: {color:'rgb(255,140,140)'},
            2: {color:'rgb(140,255,140)'},
            3: {color:'rgb(140,255,255)'},
            4: {color:'rgb(255,255,140)'}
        }
    };
    network = new vis.Network(container, data, options);
}

