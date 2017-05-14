
function postJsonFirebaseRest(url, params, keyAuth){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.setRequestHeader("Authorization", keyAuth);
    xmlhttp.onreadystatechange = 
        function () {
            if (xmlhttp.status == 200) {
                alert("Request successfull :\n"+xmlhttp.responseText);
            }
            else{
                alert("Request error :\n"+xmlhttp.responseText);
            }
        }

    var stringParams = JSON.stringify(params);
    xmlhttp.send(stringParams);
}

function executePostRest(){
    var url = "https://fcm.googleapis.com/fcm/send";

    var dataParam = {
        "CommandId": "TAKE_PICTURE",
        "FrontPic" : "3",
        "BackPic" : "1"
    };

    var params = {
        "data": dataParam,
        "to": "freCMa6J0IU:APA91bFmP-dfsO1wQ6pc1XGeCYJwcOCNU25nftlz75kwJSKLCSW11Vkz8lUkjBh9UI71AbGI77x44FYibrrkhBhqTmO6tobB6Z5WbrMufodxUBYcQvzVgoJ36-vezWLNsRZveuJokYnU"
    };

    var keyAuth = 
        "key=AAAAgI9yyrY:APA91bHRL4YdMkXHserXEOBpQ0NMcxa09wgof3jd-mXoOVHWrd_Y0vvYoNYSPEHUzJHs6n1-FcxFiiUqz0wCspglnamexkO86pzC9r5i6QhGnu8_FWMp1OCF_zmzJHI_8VplMSVBcwas";
    
    postJsonFirebaseRest(url, params, keyAuth);
}

