


function PlayBeepCommand(deviceToken){

    func_ajax("POST", "php_func_commands/PlayBeepCommand.php", 
        "deviceToken="+deviceToken, getResponseUpdate);
}