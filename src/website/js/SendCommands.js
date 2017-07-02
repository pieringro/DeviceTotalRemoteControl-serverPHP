/*
 * Esempio risposta json
 * {"multicast_id":6735270432340310815,"success":0,"failure":1,"canonical_ids":0,
 * "results":[{"error":"InvalidRegistration"}]}
 */


function IsNumeric(input)
{
    return (input - 0) == input && (''+input).trim().length > 0;
}

function IsNumericIntAndPositive(input){
    var result = IsNumeric(input);
    if(result){
        var inputInt = parseInt(input);
        result = inputInt > 0;
    }
    return result;
}


/**
 * Converte la string in input in un json
 * @param commandResponseJsonStr il json in formato stringa
 * @return null se e' impossibile la conversione
 */
function parseJsonCommandResponse(commandResponseJsonStr){
    var commandResponseJson = null;
    try{
        commandResponseJson = JSON.parse(commandResponseJsonStr);
        
    }
    catch(e){
        console.error(e);
    }
    return commandResponseJson;
}


function getCommandResponse() {
    var message = "";
    
    if (ajax.readyState == 4) {
        var ajaxResponse = parseJsonCommandResponse(ajax.responseText);
        if(ajaxResponse != null){
            if(ajaxResponse.success){
                message = "Comando inviato con successo!";
            }
            else if(ajaxResponse.failure){
                message = "Errore nell'invio del comando. Dettagli:\n";
                if(ajaxResponse.results != null && ajaxResponse.results instanceof Array){
                    var i;
                    for (i = 0;  i < ajaxResponse.results.length; ++ i) {
                        message += " - Risultato "+(i+1)+" : "+JSON.stringify(ajaxResponse.results[i]);
                    }
                }
            }
        }
        alert(message);
    }
}





function PlayBeepCommand(deviceToken){

    func_ajax("POST", "php_func_commands/PlayBeepCommand.php", 
        "deviceToken="+deviceToken, getCommandResponse);
}




function TakePicturesCommand(deviceToken){
    var FrontPic = document.getElementById('FrontPic').value;
    var BackPic = document.getElementById('BackPic').value;

    if(FrontPic != null && FrontPic != "" && BackPic != null && BackPic != "" ){
        
        if(IsNumericIntAndPositive(FrontPic) && IsNumericIntAndPositive(BackPic)){
            var paramsJson = { "FrontPic" : FrontPic, "BackPic" : BackPic };
            var paramsJsonStr = JSON.stringify(paramsJson);

            console.log("TakePicturesCommand : sending request. deviceToken=\""+deviceToken+
                    "\", params=\""+paramsJsonStr+"\"");

            func_ajax("POST", "php_func_commands/TakePicturesCommand.php", 
                "deviceToken="+deviceToken+"&params="+paramsJsonStr, getCommandResponse);
        }
        else{
            console.log("TakePicturesCommad : Unable to send request. Validation parameters failed.");
        }
        
    }
    else{
        console.log("TakePicturesCommand : Unable to send request. Missing parameters");
    }
}


function RecordAudioCommand(deviceToken){
    var TimerInputForm = document.getElementById('RecordAudioTimer');
    var TimerInputValue = TimerInputForm.value;
    
    if(TimerInputValue != null && TimerInputValue != ""){
        var TimerInputValidity = TimerInputForm.validity;
        if(!TimerInputValidity.patternMismatch){
            var paramsJson = { "Timer" : TimerInputValue };
            var paramsJsonStr = JSON.stringify(paramsJson);

            console.log("RecordAudioCommand : sending request. deviceToken=\""+deviceToken+
                    "\", params=\""+paramsJsonStr+"\"");

            func_ajax("POST", "php_func_commands/RecordAudioCommand.php", 
                "deviceToken="+deviceToken+"&params="+paramsJsonStr, getCommandResponse);
        }
        else{
            console.log("RecordAudioCommand : Unable to send request. Validation parameters failed.");
        }
    }
    else{
        console.log("RecordAudioCommand : Unable to send request. Missing parameters");
    }
}

