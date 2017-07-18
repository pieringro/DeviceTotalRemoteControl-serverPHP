
var divAudioControl = null;
function AudioFileClicked(audioFilePath){
    if(divAudioControl == null){
        divAudioControl = document.getElementById("audioControl");
    }
    divAudioControl.style.display = "block";
    var audioControl = divAudioControl.children[0];
    var audioLink = divAudioControl.children[1];
    audioLink.href = audioFilePath;
    audioControl.src = audioFilePath;
    disableScrolling();
    
}

function disableScrolling(){
    $(document).unbind('mousemove');
    $(document).scrollTop(0);
}

function hideAudioControl(){
    if(divAudioControl == null){
        divAudioControl = document.getElementById("audioControl");
    }
    divAudioControl.style.display = 'none';
}
