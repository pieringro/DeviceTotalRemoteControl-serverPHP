<?php
//caricamento variabili template
if(isset($inputTPL) && is_array($inputTPL)){
    if(isset($inputTPL['userLogged'])){
        $userLogged = $inputTPL['userLogged'];
    }
    
    if(isset($inputTPL['deviceId'])){
        $deviceId = $inputTPL['deviceId'];
    }
    
    if(isset($inputTPL['deviceToken'])){
        $deviceToken = $inputTPL['deviceToken'];
    }
}
?>


<!DOCTYPE html>
<html>

<?php
if ($userLogged) {
    if(isset($deviceId)) {
?>
        <head>
            <title>La stanza dei bottoni</title>
            <link href="css/buttonsRoom.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="js/Utility.js"></script>
        </head>
        <body>
            <script type="text/javascript" src="js/ajax.js"></script>
            <script type="text/javascript" src="js/SendCommands.js"></script>
            
            <div style="width:300px; margin:0 auto;">
                <table class="table-parent">
                    <tr>
                        <td colspan="999">
                            <u>
<?php
                                if (isset($deviceId)) {
                                    echo ResourcesManager::getResource("device_selected");
                                    echo "$deviceId";
                                }
?>
                            </u>
                        </td>
                    </tr>

<?php
        if (isset($deviceToken) && $deviceToken != "") {
?>
                    <tr>
                        <td colspan="999" style="text-align: center; font-weight: bold">
                            <?php echo ResourcesManager::getResource("commands"); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="100">
                        </td>
                        <td class="td-commandButton">
                            <input class="button-beep" type="button" 
                                   value='<?php echo ResourcesManager::getResource("beep"); ?>' 
                                   onclick="PlayBeepCommand('<?php echo $deviceToken; ?>')" />
                        </td>
                        <td id="PlayBeepCommandCallback" class="td-commandCallback">
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="100">
                            <table class="table-firstson">
                                <tr>
                                    <td>
                                        <input id="FrontPic" type="number" style="width: 40px"  min="1" 
                                               title='<?php echo ResourcesManager::getResource("pic_front_camera"); ?>' />
                                    </td>
                                    <td>
                                        <input id="BackPic" type="number" style="width: 40px" min="1" 
                                               title='<?php echo ResourcesManager::getResource("pic_back_camera"); ?>' />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="td-commandButton">
                            <input class="button-photo" type="button" 
                                   value='<?php echo ResourcesManager::getResource("take_pic"); ?>' 
                                   onclick="TakePicturesCommand('<?php echo $deviceToken; ?>')" />
                        </td>
                        <td id="TakePicturesCommandCallback" class="td-commandCallback">
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="100">
                            <table class="table-firstson">
                                <tr>
                                    <td>
                                        <input id="RecordAudioTimer" name="RecordAudioTimer" type="time" 
                                               placeholder="hrs:mins" value="" 
                                               pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="td-commandButton">
                            <input class="button-audio" type="button" 
                                   value='<?php echo ResourcesManager::getResource("record_audio"); ?>'
                                               onclick="RecordAudioCommand('<?php echo $deviceToken; ?>')" />
                        </td>
                        <td id="RecordAudioCommandCallback" class="td-commandCallback">
                            
                        </td>
                    </tr>
<?php
        }
        else{
?>
                    <tr>
                        <td>
                            <?php echo ResourcesManager::getResource("cant_send_to_device"); ?>
                        </td>
                    </tr>           
<?php
        }
?>
                </table>
            </div>
        </body>
<?php
    }
    else{
?>
        <head></head>
        <body>
            <div style="width:300px; margin:0 auto;">
                <?php echo ResourcesManager::getResource("before_select_a_device_to_control"); ?>
            </div>
        </body>
<?php
    }
}
else {
?>
        <head></head>
        <body>
            <div style="width:300px; margin:0 auto;">
                <?php echo ResourcesManager::getResource("user_not_logged_in"); ?>
            </div>
        </body>
<?php
}
?>

</html>
