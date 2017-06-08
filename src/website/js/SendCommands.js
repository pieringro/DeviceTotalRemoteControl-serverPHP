
/*
func_ajax("POST", "urlfilephp_che_riceve_la_richiesta_ajax_asincrona.php",
        "dato1=true&dato2=valore2", HandlerFunction);
 */

function PlayBeepCommand(deviceToken){

    func_ajax("POST", "website/php_func_commands/PlayBeepCommand", 
        "deviceToken="+deviceToken, getResponseUpdate);
    
    
}