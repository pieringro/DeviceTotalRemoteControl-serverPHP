function ButtonsRoomOnClick(){
    var iframePage = document.getElementById("IFramePage");
    iframePage.src = "ButtonsRoom.php";
}

function DeviceFilesListOnClick(idDevice){
    var iframePage = document.getElementById("IFramePage");
    iframePage.src = "FilesFromDevicePage.php?idDevice="+idDevice;
}


function DevicesListUserOnClick(emailUser){
    var iframePage = document.getElementById("IFramePage");
    iframePage.src = "DevicesListUser.php?emailUser="+emailUser;
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


