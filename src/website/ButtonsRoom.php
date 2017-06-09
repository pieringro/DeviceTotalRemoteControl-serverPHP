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
        //in realta' in deviceToken c'e' l'id del device, qua devo fare la query per
        //ottenere il token e metterlo in $deviceToken
        $deviceBO = new DeviceBO();
        $deviceTO = new DeviceTO();
        $deviceTO->device_id = $_POST['idDevice'];
        $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
    }
    else{
        $userBO = new UserBO();
        $devicesTOList = $userBO->getDevicesToFromUser($userTo);
        $devicesIdsStringForHtml = "";
        foreach($devicesTOList as $deviceTO){
            if($deviceTO instanceof DeviceTO){
                $devicesIdsStringForHtml .= "<option>".$deviceTO->device_id."</option>";
            }
        }
    }
    
    if(isset($userTo) && $userTo != false && $userTo instanceof UserTO){
        //loggato
        $userLogged = true;
    }

//    $htmlString = file_get_contents('ButtonsRoom.htm');
//    $htmlString = str_replace("@dato@", "Dato sostituito con una stringa da codice php!!!", $htmlString);
//    $htmlString = str_replace("@iddevices@", $devicesIdsStringForHtml, $htmlString);
//    echo $htmlString;
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
                    <td>
                        <form method="POST" action="#">
                            <fieldset <?php echo (isset($deviceToken)) ? "disabled" : "" ?> >
                                <input type=text list=iddevices name="idDevice">
                                <datalist id=iddevices >
                                    <?php echo (isset($devicesIdsStringForHtml)) ? $devicesIdsStringForHtml : "" ?>
                                    <option> Test 1 </option>
                                    <option> Test 2 </option>
                                </datalist>
                                <input type="submit" value="Select">
                            </fieldset>
                        </form>
                    </td>
                </tr>
                <tr>
<?php
    if(isset($deviceToken)){
?>
                    <td>
                        <input type="button" value="Send beep" 
                               onclick="PlayBeepCommand('<?php echo $deviceToken; ?>')" />
                    </td>
<?php
    }
?>
                </tr>
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
