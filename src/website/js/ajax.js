/**
 * Esegue una richiesta ajax e restituisce l'oggetto XMLHttpRequest
 * @param method il metodo di invio GET o POST
 * @param url l'indirizzo della pagina php a cui inviare i dati
 * @param varVal una stringa delle variabili da inviare, sintassi var1=val1&var2=val2
 * @param myHandler la funzione che si occupa della gestione del risultato della 
 * richiesta
 */
function func_ajax(method, url, varVal, myHandler) {
    ajax = getXMLHttpRequest(myHandler);
    if (method == 'GET' || method == 'get') {
        ajax.open(method, url + "?" + varVal, true);
        ajax.send(null);//effettuo la richiesta
    }
    else if (method == "POST" || method == "post") {
        ajax.open(method, url, true);
        // imposto il giusto header
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send(varVal);//effettuo la richiesta passando variabile e valore
    }
    return ajax;
}


//ciccio = ajax("GET", "ajax.php", "var=val", gestoreEvento);


/* 
 * Funzione per ottenere lâ€™oggetto XMLHttpRequest
 * @param handler la funzione che gestira' quando la richiesta avra' successo
 **/
function getXMLHttpRequest(handler) {
    var XHR = null, // variabile di ritorno, nulla di default
            browserUtente = navigator.userAgent.toUpperCase();//informazioni sul nome del browser

    if (typeof (XMLHttpRequest) === "function" || typeof (XMLHttpRequest) === "object") {
        // browser standard con supporto nativo
        // non importa il tipo di browser
        XHR = new XMLHttpRequest();
    }
    else if (window.ActiveXObject && browserUtente.indexOf("MSIE 4") < 0) {
        // browser Internet Explorer
        // Ã¨ necessario filtrare la versione 4

        if (browserUtente.indexOf("MSIE 5") < 0) {
            // la versione 6 di IE ha un nome differente
            // per il tipo di oggetto ActiveX
            XHR = new ActiveXObject("Msxml2.XMLHTTP");
        }
        else {
            //le versioni 5 e 5.5 invece sfruttano lo stesso nome
            XHR = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    XHR.onreadystatechange = handler;
    return XHR;
}



//-------------------------- GESTORI AJAX ---------------------------------
// Non sono tutti i gestori, per praticita' alcuni sono stati introdotti nei file script
//stessi dove vengono chiamati.

/**
 * Funzione che cattura il risultato di una chiamata AJAX di invio.
 * Chiamata di invio, cioe' abbiamo comunicato allo script php
 * Non fa praticamente nulla.
 */
function getResponseUpdate() {
    if (ajax.readyState == 4) {
        alert('ajax.js: getResponseUpdate: Richiesta AJAX Ricevuto: ' + ajax.responseText);
    }
}


/*
func_ajax("POST", "urlfilephp_che_riceve_la_richiesta_ajax_asincrona.php",
        "dato1=true&dato2=valore2", HandlerFunction);
*/

//-------------------------------------------------------------
