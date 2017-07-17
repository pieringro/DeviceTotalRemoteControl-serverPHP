var currentIdMenuVoiceHover = "menuOverview";
function HandlingHoverMenuVoice(idMenu){
    if(currentIdMenuVoiceHover != null){
        var menuHoverVoice = document.getElementById(currentIdMenuVoiceHover);
        menuHoverVoice.className = menuHoverVoice.className.replace("w3-blue", "");
    }
    
    var menuVoice = document.getElementById(idMenu);
    menuVoice.className += " w3-blue";
    currentIdMenuVoiceHover = idMenu;
}

var iframePage = null;
function HandlingChangeIframeSrc(iframeSrc){
    if(iframePage == null){
        iframePage = document.getElementById("IFramePage");
    }
    
    iframePage.contentWindow.document.open();
    iframePage.contentWindow.document.close();
    iframePage.src = iframeSrc;
}


function ButtonsRoomOnClick(){
    HandlingWaitingAlert(true);
    HandlingHoverMenuVoice("menuButtonsRoom");
    HandlingChangeIframeSrc("ButtonsRoom.php");
}

function DeviceFilesListOnClick(idDevice){
    HandlingWaitingAlert(true);
    HandlingChangeIframeSrc("FilesFromDevicePage.php?idDevice="+idDevice);
}


function DevicesListUserOnClick(){
    HandlingWaitingAlert(true);
    HandlingHoverMenuVoice("menuDevicesList");
    HandlingChangeIframeSrc("DevicesListPage.php");
}


function GetTokenThisDeviceAjaxCallback() {
    if (ajax.readyState == 4) {
        var ajaxResponse = parseJsonCommandResponse(ajax.responseText);
        if(ajaxResponse != null){
            if(ajaxResponse.deviceToken && ajaxResponse.deviceId){
                var devicesFieldSet = document.getElementById("devicesFieldSet");
                devicesFieldSet.setAttribute("disable", true);
                
                var devicesTd = document.getElementById("devicesTd");
                devicesTd.innerHTML = "<input disabled=\"disabled\" type=text name=\"idDevice\" value=\""+ajaxResponse.deviceId+"\" />";
                
                var buttonSelectIdDevice = document.getElementById("buttonSelectIdDevice");
                buttonSelectIdDevice.setAttribute("disabled", "disabled");
            }
            else{
                
            }
        }
    }
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


