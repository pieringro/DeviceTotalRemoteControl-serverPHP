



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


var waitingAlert = null;
function HandlingWaitingAlert(toOpen, width=null){
    if(waitingAlert == null){
        waitingAlert = document.getElementById("waiting");
    }
    if(toOpen){
        waitingAlert.style.display = "block";
    }
    else{
        waitingAlert.style.display = "none";
    }
    if(width != null){
        waitingAlert.style.width = width+"px";
    }
}
