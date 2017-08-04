<?php


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
                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="php_func/loginFunction.php" method="POST">
                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>

</html>