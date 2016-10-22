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
    '<td id="interfero-reverseSelection">reverse selection</td>'+
    '</tr>'+
    '<tr>'+
    '<td id="interfero-toggleAll">Antenna</td>';
    for(col=1;col<=nbrBand;col++) { htmlForArray+='<td class="interfero-toggleBand" id="interfero-toggleBand['+col+']">band '+col+'</td>'; }
    htmlForArray+='</tr>';



    for(line=1;line<=nbrAntenna;line++){
        htmlForArray+='<tr id="interfero-'+line+'">'+
        '<td class="interfero-toggleAntenna"  id="interfero-toggleAntenna['+line+']">'+line+'</td>';
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