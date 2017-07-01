<?php
require_once('../php_func/constants.php');
require_once('../php_func/simple_html_dom.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(ROOT_WEB . "/php_classes/BO/DeviceBO.class.php");

$userLogged = false;
//controllo che sia loggato
@session_start();
if(isset($_SESSION['user'])){
    $userTo = unserialize(@$_SESSION['user']);
    
    if(isset($_POST['idDevice'])){
        $deviceId = $_POST['idDevice'];
        $deviceBO = new DeviceBO();
        $deviceTO = new DeviceTO();
        $deviceTO->device_id = $deviceId;
        $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
    }
    else{
        $userBO = new UserBO();
        $devicesTOList = $userBO->getDevicesToFromUser($userTo);
        $devicesIdsStringForHtml = "";
        foreach($devicesTOList as $deviceTO){
            if($deviceTO instanceof DeviceTO){
                $devicesIdsStringForHtml .= "<option>".$deviceTO->device_id."</option> ";
            }
        }
    }
    
    if(isset($userTo) && $userTo != false && $userTo instanceof UserTO){
        //loggato
        $userLogged = true;
    }

}
?>

<!DOCTYPE html>
<html>

<?php
if($userLogged){
?>
    <head>
        <title>La stanza dei bottoni</title>
        <link href="css/buttons.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/SendCommands.js"></script>
        
        <div style="width:300px; margin:0 auto;">
             <table style="width:100%">
                <tr>
                    <td colspan="100">
                        <form method="POST" action="#">
                            <fieldset <?php echo (isset($deviceToken)) ? "disabled" : "" ?> >
                                
                                <?php
                                if(isset($deviceId)){
                                    echo "<input type=text name=\"idDevice\" value=\"$deviceId\" />";
                                }
                                else{
                                    echo "<select name=\"idDevice\">";
                                    echo (isset($devicesIdsStringForHtml)) ? $devicesIdsStringForHtml : "";
                                    echo "</select>";
                                }
                                ?>
                                
                                <input type="submit" value="Select">
                            </fieldset>
                        </form>
                    </td>
                </tr>
                
<?php
    if(isset($deviceToken)){
?>
                <tr>
                    <td colspan="100">
                        <input type="button" value="Send beep" 
                               onclick="PlayBeepCommand('<?php echo $deviceToken; ?>')" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="FrontPic" style="width: 40px" type="number" min="1" title="Foto camera frontale" />
                    </td>
                    <td>
                        <input id="BackPic" style="width: 40px" type="number" min="1" title="Foto camera posteriore" />
                    </td>
                    <td>
                        <input type="button" value="Take Picture" 
                               onclick="TakePicturesCommand('<?php echo $deviceToken; ?>')" />
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
            Utente non loggato
        </div>
    </body>
<?php
}
?>

</html>
