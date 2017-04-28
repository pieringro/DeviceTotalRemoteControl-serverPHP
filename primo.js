
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
        "key=AAAACo3OP88:APA91bEUy9u0BbHMmbGkPKb0HCn7Tk4ldeQ0qi8sSMJHGKDk6gOxC_sczqrJKdrRrtbGZiUnDBdozRstKRpaEL1Y_OJ6l2kkSvJp7ZnI5j0b2kEyqjcA3-Xw1oxgNEp3jD-3t8fyYLf4");
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
    //var url = "https://localhost/nonesiste";

    var dataParam = {"CommandId": "PLAY_BEEP"};

    var params = {
        "data": dataParam,
        "to": "cQ6yaPuFf2g:APA91bE4i8zqiB6-0Sz4z7zyUm_chJ6N_mdzwKRBF6wXJS3R4j-e3AlPzH9M0_2fH4YfEY379BzqmWwO_3lz9PE4KR-B4s_rKkuvZcPfKHmld_PTsj9Ao7JVoEWKF3fVd3qn0oaNQ8jQ"
    };
    
    postRest(url, params);
}

