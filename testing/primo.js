
function postWithForm(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}

function executePostForm(){
    //var url = "https://fcm.googleapis.com/fcm/send";
    var url = "https://localhost/nonesiste";
    var params = {name: 'Johnny Bravo'};
    postWithForm(url, params);
}


// #####################################################################


function postRest(url, params){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.setRequestHeader("Authorization", 
        "key=AAAAgI9yyrY:APA91bHRL4YdMkXHserXEOBpQ0NMcxa09wgof3jd-mXoOVHWrd_Y0vvYoNYSPEHUzJHs6n1-FcxFiiUqz0wCspglnamexkO86pzC9r5i6QhGnu8_FWMp1OCF_zmzJHI_8VplMSVBcwas");
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

    //document.write(stringParams);
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
    
    postRest(url, params);
}

