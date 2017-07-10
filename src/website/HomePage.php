<?php
require_once('../php_func/constants.php');
require_once(ROOT_WEB . "/php_func/simple_html_dom.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");

$userLogged = false;
//controllo che sia loggato
@session_start();
if (isset($_SESSION['user'])) {
    $userTo = unserialize(@$_SESSION['user']);
    if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
        //loggato
        $userLogged = true;
        
        if (isset($_POST['idDevice'])) {
            $deviceId = $_POST['idDevice'];
            $_SESSION['idDevice'] = $deviceId;
            $deviceBO = new DeviceBO();
            $deviceTO = new DeviceTO();
            $deviceTO->device_id = $deviceId;
            $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
        } else {
            $userBO = new UserBO();
            $devicesTOList = $userBO->getDevicesToFromUser($userTo);
            $devicesIdsStringForHtml = "";
            foreach ($devicesTOList as $deviceTO) {
                if ($deviceTO instanceof DeviceTO) {
                    $devicesIdsStringForHtml .= "<option>" . $deviceTO->device_id . "</option> ";
                }
            }
        }
        
    }
}
?>



<?php
if ($userLogged) {
    ?>
    <!DOCTYPE html>
    <html>
        <title>DTRC HomePage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/homepage.js" type="text/javascript"></script>
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
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
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
                    <div class="w3-quarter" id="DevicesListLink" onclick="DeviceListOnClick()">
                        <div class="w3-container w3-blue w3-padding-16">
                            <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3></h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>Views</h4>
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
                    <table class="w3-table-all">
                        <tr>
                            <td>United States</td>
                        </tr>
                    </table>
                </div>

                <iframe id="IFramePage" src="" width="100%" height="300px" style="border : 0">

                </iframe>

                <!-- Footer -->
                <footer class="w3-container w3-padding-16 w3-light-grey">
                    <hr>
                    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
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
?>