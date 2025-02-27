
var iframePage = null;
var buttonIframe = null;
var divIframe = null;

function InitIframePage(){
    if(iframePage == null){
        iframePage = document.getElementById("IFramePage");
    }
}

function InitDivIframe(){
    if(divIframe == null){
        divIframe = document.getElementById("DivIFramePage");
    }
}

function InitButtonIframe(){
    if(buttonIframe == null){
        buttonIframe = document.getElementById("ButtonIFramePage");
    }
}


var currentIdMenuVoiceHover = "menuOverview";
/**
 * Evidenzia la voce del menu specificata
 */
function HandlingHoverMenuVoice(idMenu){
    if(currentIdMenuVoiceHover != null){
        var menuHoverVoice = document.getElementById(currentIdMenuVoiceHover);
        menuHoverVoice.className = menuHoverVoice.className.replace("w3-blue", "");
    }
    
    var menuVoice = document.getElementById(idMenu);
    menuVoice.className += " w3-blue";
    currentIdMenuVoiceHover = idMenu;
}

/**
 * Cambia pagina nell'iframe
 */
function HandlingChangeIframeSrc(iframeSrc){
    InitIframePage();
    iframePage.contentWindow.document.open();
    iframePage.contentWindow.document.close();
    iframePage.src = iframeSrc;
}

// ---------------------------

function GoIFrameFullScreen(){
    InitDivIframe();
    divIframe.setAttribute("class", "overlap-everything-div");
    
    InitButtonIframe();
    buttonIframe.onclick = RestoreIFrameNormal;
    //buttonIframe.value = "Reduce";
}

function RestoreIFrameNormal(){
    InitDivIframe();
    divIframe.setAttribute("class", "normal-div");
    
    InitButtonIframe();
    buttonIframe.onclick = GoIFrameFullScreen;
    //buttonIframe.value = "Fullscreen";
}
// ---------------------------

function ButtonsRoomOnClick(){
    var width = null;
    InitDivIframe();
    width = divIframe.scrollWidth;
    
    HandlingWaitingAlert(true, width);
    HandlingHoverMenuVoice("menuButtonsRoom");
    HandlingChangeIframeSrc("ButtonsRoom.php");
}

function DeviceFilesListOnClick(idDevice){
    HandlingWaitingAlert(true);
    HandlingChangeIframeSrc("FilesFromDevicePage.php?idDevice="+idDevice);
}


function DevicesListUserOnClick(){
    InitDivIframe();
    width = divIframe.scrollWidth;
    
    HandlingWaitingAlert(true, width);
    HandlingHoverMenuVoice("menuDevicesList");
    HandlingChangeIframeSrc("DevicesListPage.php");
}


function HelpPageOnClick(){
    InitDivIframe();
    width = divIframe.scrollWidth;
    
    HandlingWaitingAlert(true, width);
    HandlingHoverMenuVoice("menuHelpPage");
    HandlingChangeIframeSrc("HelpPage.php");
}


function GetTokenThisDevice(deviceId){
    if(deviceId == null){
        var selectComboDevice = document.getElementById("selectIdDevice");
        if(selectComboDevice != null && selectComboDevice.selectedOptions != null
                && selectComboDevice.selectedOptions.length != null){
            deviceId = selectComboDevice.selectedOptions[0].innerText;
        }
    }
    func_ajax("POST", "php_func/getTokenThisDevice.php", 
        "deviceId="+deviceId, GetTokenThisDeviceAjaxCallback);
}
function GetTokenThisDeviceAjaxCallback() {
    if (ajax.readyState == 4) {
        var ajaxResponse = parseJsonCommandResponse(ajax.responseText);
        if(ajaxResponse != null){
            if(typeof ajaxResponse.deviceToken !== 'undefined' && 
                    typeof ajaxResponse.deviceId !== 'undefined'){
                location.reload();
            }
        }
    }
}



function RemoveDeviceSelected(){
    func_ajax("POST", "php_func/removeDeviceSelected.php", 
        "", RemoveDeviceSelectedCallback);
}
function RemoveDeviceSelectedCallback(){
    if (ajax.readyState == 4) {
        location.reload();
    }
}



function Logout(msg){
    var answer = confirm(msg);
    if (answer) {
       func_ajax("POST", "php_func/logoutFunction.php", 
        "", LogoutCallback);
    }
}
function LogoutCallback(){
    if (ajax.readyState == 4) {
        //location.reload();
        location.href = "LoginPage.php";
    }
}
