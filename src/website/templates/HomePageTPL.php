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
        <title>DTRC HomePage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script type="text/javascript" src="js/Utility.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
        <body class="w3-light-grey">

            <!-- Top container -->
            <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
                <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
                <span class="w3-bar-item w3-right"></span>
            </div>

            <!-- Sidebar/menu -->
            <nav id="mySidebar" class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;"><br>
                <div class="w3-container w3-row">
                    <div class="w3-col s4">
                        <img src="images/avatar_male_user.png" class="w3-circle w3-margin-right" style="width:46px">
                    </div>
                    <div class="w3-col s8 w3-bar">
                        <span>Welcome, <strong><?php echo $userTo->email; ?></strong></span><br>
                        <!--
                        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                        -->
                    </div>
                </div>
                <hr>
                <div class="w3-container">
                    <h5>Dashboard</h5>
                </div>
                <div class="w3-bar-block">
                    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Devices</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Buttons Room</a>
                </div>
            </nav>


            <!-- Overlay effect when opening sidebar on small screens -->
            <div id="myOverlay" class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" title="close side menu" ></div>

            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="margin-left:300px;margin-top:43px;">

                <!-- Header -->
                <header class="w3-container" style="padding-top:22px">
                    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
                </header>

                <div class="w3-row-padding w3-margin-bottom">
                    <div class="w3-quarter" id="ButtonsRoomLink" onclick="ButtonsRoomOnClick()">
                        <div class="w3-container w3-red w3-padding-16">
                            <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3></h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>Buttons room</h4>
                        </div>
                    </div>

                    <div class="w3-quarter" id="DevicesListLink" onclick="DeviceListOnClick('<?php echo $userTo->email; ?>')">
                        <div class="w3-container w3-blue w3-padding-16">
                            <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3></h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>Devices</h4>
                        </div>
                    </div>


                    <div class="w3-quarter">
                        <div class="w3-container w3-teal w3-padding-16">
                            <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3></h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>Shares</h4>
                        </div>
                    </div>
                    <div class="w3-quarter">
                        <div class="w3-container w3-orange w3-text-white w3-padding-16">
                            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3></h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>Users</h4>
                        </div>
                    </div>
                </div>

                <div class="w3-container">
                    <h5>Select Devices</h5>
                    
                        <fieldset id="devicesFieldSet" <?php echo (isset($deviceToken)) ? "disabled" : "" ?> >
                            <table class="w3-table-all" style="">
                                <tr>
                                    <td id="devicesTd">
<?php
                                        if (isset($deviceId)) {
                                            echo "<input type=text name=\"idDevice\" value=\"$deviceId\" />";
                                        } else {
                                            echo "<select id=\"selectIdDevice\" name=\"idDevice\">";
                                            echo (isset($devicesIdsStringForHtml)) ? $devicesIdsStringForHtml : "";
                                            echo "</select>";
                                        }
?>
                                    </td>
                                    <td>
                                        <input id="buttonSelectIdDevice" type="button" value="Select" onclick="GetTokenThisDevice(null)">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    
                </div>

                <!-- IFrame in cui verranno caricate i contenuti delle pagine -->
                <iframe id="IFramePage" src="" width="100%" height="300px" style="border : 0"></iframe>

                <!-- Footer -->
                <footer class="w3-container w3-padding-16 w3-light-grey">
                    <hr>
                    <p>Powered by pierprogramm, 
                        Graphic template by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
                    </p>
                </footer>

                <!-- End page content -->
            </div>

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
                w3_open();
            </script>
        </body>
    </html>
<?php
}
else{
?>
<head>

</head>
<body>
    Utente non loggato.
</body>
</html>
<?php
}
?>