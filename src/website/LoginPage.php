
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/buttons.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="register-form">
                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="loginFunction.php" method="POST">
                    <input type="text" name="email" placeholder="email"/>
                    <input type="password" name="pass" placeholder="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>

</html>