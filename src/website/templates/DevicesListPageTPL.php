<?php
//caricamento variabili template
if (isset($inputTPL) && is_array($inputTPL)) {
    if (isset($inputTPL['userLogged'])) {
        $userLogged = $inputTPL['userLogged'];
    }

    if (isset($inputTPL['userTo'])) {
        $userTo = $inputTPL['userTo'];
    }

    if (isset($inputTPL['devicesTosList'])) {
        $devicesTosList = $inputTPL['devicesTosList'];
    }
}
?>




<!DOCTYPE html>
<html>

<?php
    if ($userLogged) {
        if (isset($devicesTosList)) {
?>
            <head>
                <title>DTRC - Devices list</title>
                <link href="css/w3.css" rel="stylesheet" type="text/css">
                <link href="css/devicesListPage.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                <div style="width:300px; margin:0 auto; margin-top: 20px">
                    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                        <thead>
                            <tr>
                                <td style="width:20px;"><!--Apri dettaglio--></td>
                                <td>
                                    ID
                                </td>
                                <!--
                                <td>
                                    Altri dati ottenibili dal dispositivo in fase di configurazione
                                </td>
                                -->
                            </tr>
                        </thead>
                        <tbody>
<?php
                                foreach ($devicesTosList as $deviceTo) {
                                    if ($deviceTo instanceof DeviceTO) {
                                        echo '<tr>';
                                        echo '<td class="dtrc-td">';
                                        echo '<a href="DevicesDetailsPage.php?idDevice=' . $deviceTo->device_id . '" >';
                                        echo '<img height=20 width=20 src="images/open_details_icon.png" />';
                                        echo '</a>';
                                        echo '</td>';

                                        echo '<td>';
                                        echo $deviceTo->device_id;
                                        echo '</td>';
                                        
                                        echo '</tr>';
                                    }
                                }
?>
                        </tbody>
                    </table>
                </div>
            </body>

<?php
        } else {
?>
            <head></head>
            <body>
                No devices.
            </body>
<?php
    }
} else {
?>
        <head></head>
        <body>User not logged in.</body>
<?php
    }
?>
</html>
