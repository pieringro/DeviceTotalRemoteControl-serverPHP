<?php

require_once('../php_func/constants.php');
require_once(ROOT_WEB.'/engine/resources/ResourcesManager.class.php');


$userLogged = false;
//controllo che sia loggato
@session_start();
if(isset($_SESSION['user'])){
    $userLogged = true;
    header("Location: ButtonsRoom.php");
    die();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login e Registrazione</title>
        <link href="css/buttons.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body>
        
        <div class="login-page">
            <div class="form">
                <div>
                    <?php
                    if(isset($_GET['message'])){
                        $message = $_GET['message'];
                        echo "$message";
                    }
                    ?>
                </div>
                <form class="register-form" action="php_func/signUpFunction.php" method="POST">
                    <!-- Combobox for language, invio in post di "lang" -->
                    <div class="radio-buttons-form">
                        <input class="radio-button" type="radio" name="lang" value="Italian"/>
                        <img class="radio-button-label" src="images/flag_italy.png" width="15px" height="15px"
                             title="<?php echo ResourcesManager::getResource("italian"); ?>"/>
                        
                        <input class="radio-button" type="radio" name="lang" value="English" />
                        <img class="radio-button-label" src="images/flag_england.png" width="15px" height="15px" 
                             title="<?php echo ResourcesManager::getResource("english"); ?>"/>
                    </div>

                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>create</button>
                    <p class="message">
                        <?php echo ResourcesManager::getResource("already_registered"); ?>
                        <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="php_func/loginFunction.php" method="POST">
                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>login</button>
                    <p class="message">
                        <?php echo ResourcesManager::getResource("not_registered"); ?>
                        <a href="#">
                            <?php echo ResourcesManager::getResource("create_account"); ?>
                        </a></p>
                </form>
            </div>
        </div>
    </body>

</html>