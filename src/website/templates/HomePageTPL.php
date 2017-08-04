<?php
//caricamento variabili template
if(isset($inputTPL) && is_array($inputTPL)){
    if(isset($inputTPL['userLogged'])){
        $userLogged = $inputTPL['userLogged'];
    }
    
    if(isset($inputTPL['userTo'])){
        $userTo = $inputTPL['userTo'];
    }
    
    if(isset($inputTPL['deviceId'])){
        $deviceId = $inputTPL['deviceId'];
    }
    
    if(isset($inputTPL['devicesIdsStringForHtml'])){
        $devicesIdsStringForHtml = $inputTPL['devicesIdsStringForHtml'];
    }
}
?>


<!DOCTYPE html>
<html>

<?php
    if (isset($userLogged) && $userLogged && isset($userTo)) {
?>
    <head>
        <title>DTRC - HomePage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/home.css">
        
        <script type="text/javascript" src="js/Utility.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
    </head>
    <body class="w3-light-grey">

        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
                <i class="fa fa-bars"></i> <?php echo ResourcesManager::getResource("menu"); ?>
            </button>
            <span class="w3-bar-item w3-right"></span>
        </div>

        <!-- Sidebar/menu -->
        <nav id="mySidebar" class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <img src="images/avatar_male_user.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s8 w3-bar">
                    <span>
                        <?php echo ResourcesManager::getResource("welcome"); ?> 
                        <strong><?php echo $userTo->email; ?></strong>
                    </span>
                    <br>
                    <span style="font-size: 11px">
                        <a href='#' 
                           onclick='Logout("<?php echo ResourcesManager::getResource("are_you_sure_logout"); ?>")'>
                           <?php echo ResourcesManager::getResource("logout"); ?>
                        </a>
                    </span>
                    <!--
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                    -->
                </div>
            </div>
            <hr>
            <div class="w3-container">
                <h5><?php echo ResourcesManager::getResource("dashboard"); ?></h5>
            </div>
            <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                    <i class="fa fa-remove fa-fw"></i><?php echo ResourcesManager::getResource("close_menu"); ?>
                </a>
                <a id="menuOverview" href="#" class="w3-bar-item w3-button w3-padding w3-blue">
                    <i class="fa fa-eye fa-fw"></i><?php echo ResourcesManager::getResource("overview"); ?>
                </a>
                <a id="menuDevicesList" href="#" class="w3-bar-item w3-button w3-padding" onclick="DevicesListUserOnClick()">
                    <i class="fa fa-mobile fa-fw"></i><?php echo ResourcesManager::getResource("devices"); ?>
                </a>
                <a id="menuButtonsRoom" href="#" class="w3-bar-item w3-button w3-padding" onclick="ButtonsRoomOnClick()">
                    <i class="fa fa-keyboard-o fa-fw"></i><?php echo ResourcesManager::getResource("buttons_room"); ?>
                </a>
            </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div id="myOverlay" class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" title="close side menu" >
        </div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i> <?php echo ResourcesManager::getResource("my_dashboard"); ?></b></h5>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter" id="ButtonsRoomLink" onclick="ButtonsRoomOnClick()">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fa fa-keyboard-o w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4><?php echo ResourcesManager::getResource("buttons_room"); ?></h4>
                    </div>
                </div>

                <div class="w3-quarter" id="DevicesListLink" onclick="DevicesListUserOnClick()">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><i class="fa fa-mobile w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4><?php echo ResourcesManager::getResource("devices"); ?></h4>
                    </div>
                </div>
            </div>

            <div class="w3-container">
                <h5><?php echo ResourcesManager::getResource("select_a_device_to_control"); ?></h5>

                <fieldset id="devicesFieldSet" >
                    <table class="w3-table-all" style="">
                        <tr>
<?php
                        if (isset($deviceId)) {
?>
                            <td>
                                <input disabled type=text name="idDevice" value="<?php echo $deviceId; ?>" />
                            </td>
                            <td>
                                <input type=button 
                                       value="<?php echo ResourcesManager::getResource("change_device_selected"); ?>" 
                                       onclick="RemoveDeviceSelected()">
                            </td>
<?php
                        }
                        else {
?>
                            <td id="devicesTd">
                                <select id="selectIdDevice" name="idDevice">
                                    <?php echo (isset($devicesIdsStringForHtml)) ? $devicesIdsStringForHtml : ""; ?>
                                </select>
                            </td>
                            <td>
                                <input id="buttonSelectIdDevice" type="button"
                                       value="<?php echo ResourcesManager::getResource("select"); ?>"
                                       onclick="GetTokenThisDevice(null)">
                            </td>
<?php
                        }
?>
                        </tr>
                    </table>
                </fieldset>

            </div>

            <div id="waiting" style="display: none; position: absolute; z-index: 999999; background-color: #FFFFFF; width:100%; height:300px;">
                <div style="position: relative; text-align: center; top:20px" >
                    <img src="images/loading_icon.gif" width="80px" height="80px" />
                </div>
            </div>

            <!-- IFrame in cui verranno caricate i contenuti delle pagine -->
            <div id="DivIFramePage" class="normal-div">
                <button id="ButtonIFramePage" class="iframe-button" type="button" value="" onclick="GoIFrameFullScreen()">
                </button>
                <iframe id="IFramePage" class="iframe-page" onload="HandlingWaitingAlert(false)" src=""></iframe>
            </div>
            
            <!-- Footer -->
            <footer class="w3-container w3-padding-16 w3-light-grey">
                <hr>
                <p>Powered by pierprogramm, 
                    Graphic template by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
                </p>
            </footer>

            <!-- End page content -->
        </div>

        <!-- Javascript -->
        <script type="text/javascript">
            // Get the Sidebar
            var mySidebar = document.getElementById("mySidebar");

            // Get the DIV with overlay effect
            var overlayBg = document.getElementById("myOverlay");

            // Toggle between showing and hiding the sidebar, and add overlay effect
            function w3_open() {
                if (mySidebar.style.display === 'block') {
                    mySidebar.style.display = 'none';
                    overlayBg.style.display = "none";
                } else {
                    mySidebar.style.display = 'block';
                    overlayBg.style.display = "block";
                }
            }

            // Close the sidebar with the close button
            function w3_close() {
                mySidebar.style.display = "none";
                overlayBg.style.display = "none";
            }
            //w3_open();
        </script>
    </body>
</html>
<?php
}
else{
?>
    <head>
        <meta http-equiv="refresh" content="3;url=LoginPage.php" />
    </head>
    <body>
        <div style="width:300px; margin:0 auto;">
            <?php echo ResourcesManager::getResource("user_not_logged_in"); ?>
        </div>
    </body>
    </html>
<?php
}
?>