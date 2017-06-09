<?php
require_once('../php_func/constants.php');
require_once('../php_func/simple_html_dom.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");

$userLogged = false;
//controllo che sia loggato
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['idDevicesList'])){
    $userTo = unserialize(@$_SESSION['user']);
    //inserira in session anche una variabile che identifica i diversi token dei dispositivi di quest'utente
    $deviceToken = "Valore preso dalla sessione";
    
    $userBO = new UserBO();
    $devicesTOList = $userBO->getDevicesToFromUser($userTo);
    $devicesIdsStringForHtml = "";
    foreach($devicesTO as $devicesTOList){
        $devicesIdsStringForHtml .= "<option>".$devicesTO->Id."</option>";
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
        <script language="text/javascript" src="js/SendCommands.js"></script>
    </head>
    <body>
        <div style="width:300px; margin:0 auto;">
            <!-- Pulsanti, form su script che legge dai cookie i token. da ButtonsRoom.php verranno passati gli id dei device
            cosi da generare una combobox e definire il device a cui dare ordini -->

             <table style="width:100%">
                <tr>
                    <td>
                        <input type=text list=iddevices >
                        <datalist id=iddevices >
                            <?php echo $devicesIdsStringForHtml; ?>
                            <option> Test 1 </option>
                            <option> Test 2 </option>
                        </datalist>
                    </td>
                    <td>
                        <input type="button" value="Send beep" onclick="PlayBeepCommand(<?php echo $deviceToken; ?>)" />
                    </td>
                    <td>
                        <input type="button" value="Send beep" onclick="(<?php echo $deviceToken; ?>)" />
                    </td>
                </tr>
             </table> 
        </div>
    </body>
    </html>
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
