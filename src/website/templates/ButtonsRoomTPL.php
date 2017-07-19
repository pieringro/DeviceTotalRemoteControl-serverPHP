
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
                                    echo "Device : $deviceId";
                                }
?>
                            </u>
                        </td>
                    </tr>

<?php
        if (isset($deviceToken)) {
?>
                    <tr>
                        <td colspan="999" style="text-align: center; font-weight: bold">
                            Commands
                        </td>
                    </tr>
                    <tr>
                        <td colspan="100">
                        </td>
                        <td class="td-commandButton">
                            <input class="button-beep" type="button" value="Beep" 
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
                                        <input id="FrontPic" type="number" style="width: 40px"  min="1" title="Foto camera frontale" />
                                    </td>
                                    <td>
                                        <input id="BackPic" type="number" style="width: 40px" min="1" title="Foto camera posteriore" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="td-commandButton">
                            <input class="button-photo" type="button" value="Take Picture" 
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
                            <input class="button-audio" type="button" value="Record audio" 
                                               onclick="RecordAudioCommand('<?php echo $deviceToken; ?>')" />
                        </td>
                        <td id="RecordAudioCommandCallback" class="td-commandCallback">
                            
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
                Before, select a device to control.
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
                User is not logged in.
            </div>
        </body>
<?php
}
?>

</html>
