



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


