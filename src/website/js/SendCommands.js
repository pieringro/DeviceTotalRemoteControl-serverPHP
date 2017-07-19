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

var isBusy = false;

function WaitingGraphicsCallback(idCallbackContainer){
    var callbackContainer = document.getElementById(idCallbackContainer);
    callbackContainer.innerHTML = "<img class=\"img-commandCallback\" src=\"images/loading_icon2.gif\" />";
    callbackContainer.style.display = "block";
    isBusy = true;
}

function SuccessGraphicsCallback(idCallbackContainer){
    var callbackContainer = document.getElementById(idCallbackContainer);
    callbackContainer.innerHTML = "<img class=\"img-commandCallback\" src=\"images/success_icon.png\" />";
    callbackContainer.style.display = "block";
}

function FailGraphicsCallback(idCallbackContainer, message="Unknow error."){
    var callbackContainer = document.getElementById(idCallbackContainer);
    message = message.replace(/"/gi, "");//sostituisco tutte le "
    callbackContainer.innerHTML = "<img class=\"img-commandCallback\" src=\"images/error_icon.png\" title=\""+message+"\"/>";
    callbackContainer.style.display = "block";
}


function GenericCommandCallback(currentIdCallbackContainer){
    if (ajax.readyState == 4) {
        var ajaxResponse = parseJsonCommandResponse(ajax.responseText);
        if(ajaxResponse != null){
            //console.log("Called GenericCommandCallback("+currentIdCallbackContainer+")");
            if(ajaxResponse.success){
                //Comando inviato con successo!
                SuccessGraphicsCallback(currentIdCallbackContainer);
            }
            else{
                //Errore nell'invio del comando
                //i dettagli si trovano in ajaxResponse.results (array di json)
                var message = "Error:\n";
                if(ajaxResponse.results != null && ajaxResponse.results instanceof Array){
                    var i;
                    for (i = 0;  i < ajaxResponse.results.length; ++ i) {
                        message += (i+1)+". "+JSON.stringify(ajaxResponse.results[i]);
                    }
                }
                FailGraphicsCallback(currentIdCallbackContainer, message);
            }
        }
        else{
            FailGraphicsCallback(currentIdCallbackContainer);
        }
        isBusy = false;
    }
}

function PlayBeepCommand(deviceToken){
    if(isBusy){
        return;
    }
    
    var playBeepIdCallbackContainer = "PlayBeepCommandCallback";
    WaitingGraphicsCallback(playBeepIdCallbackContainer);
    func_ajax("POST", "php_func_commands/PlayBeepCommand.php", 
        "deviceToken="+deviceToken, function(){
            GenericCommandCallback(playBeepIdCallbackContainer); 
        });
}

function TakePicturesCommand(deviceToken){
    if(isBusy){
        return;
    }
    
    var FrontPic = document.getElementById('FrontPic').value;
    var BackPic = document.getElementById('BackPic').value;

    if(FrontPic != null && FrontPic != "" && BackPic != null && BackPic != "" ){
        
        if(IsNumericIntAndPositive(FrontPic) && IsNumericIntAndPositive(BackPic)){
            var paramsJson = { "FrontPic" : FrontPic, "BackPic" : BackPic };
            var paramsJsonStr = JSON.stringify(paramsJson);

            console.log("TakePicturesCommand : sending request. deviceToken=\""+deviceToken+
                    "\", params=\""+paramsJsonStr+"\"");
            
            var takePicturesIdCallbackContainer = "TakePicturesCommandCallback";
            WaitingGraphicsCallback(takePicturesIdCallbackContainer);
            func_ajax("POST", "php_func_commands/TakePicturesCommand.php", 
                "deviceToken="+deviceToken+"&params="+paramsJsonStr, function(){
                    GenericCommandCallback(takePicturesIdCallbackContainer);
                });
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
    if(isBusy){
        return;
    }
    
    var TimerInputForm = document.getElementById('RecordAudioTimer');
    var TimerInputValue = TimerInputForm.value;
    
    if(TimerInputValue != null && TimerInputValue != ""){
        var TimerInputValidity = TimerInputForm.validity;
        if(!TimerInputValidity.patternMismatch){
            var paramsJson = { "Timer" : TimerInputValue };
            var paramsJsonStr = JSON.stringify(paramsJson);

            console.log("RecordAudioCommand : sending request. deviceToken=\""+deviceToken+
                    "\", params=\""+paramsJsonStr+"\"");
            
            var recordAudioIdCallbackContainer = "RecordAudioCommandCallback";
            WaitingGraphicsCallback(recordAudioIdCallbackContainer);
            func_ajax("POST", "php_func_commands/RecordAudioCommand.php", 
                "deviceToken="+deviceToken+"&params="+paramsJsonStr, function(){
                    GenericCommandCallback(recordAudioIdCallbackContainer);
                });
        }
        else{
            console.log("RecordAudioCommand : Unable to send request. Validation parameters failed.");
        }
    }
    else{
        console.log("RecordAudioCommand : Unable to send request. Missing parameters");
    }
}

