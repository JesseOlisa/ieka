<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title id="title">Login into your account</title>
        <!--Links to the stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link href="/ieka/assets/css/logins.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="front-line-header">
                <div class="ieka-logo">
                    <h1 class="name">ieka</h1>
                </div>
                <div class="go-back-to-home">
                    <button><a href="index.php">Home</a></button>
                </div>
            </div>
        </header>
        <div class="form-body">
            <form action="admin_login.php" id="login" method="POST">
                <p>IEKA Enterprises Inc. </p>
                <div id="prompt" style="display:none;"></div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="phone" required> 
                </div>
                <div>
                    <label for="password">Passcode</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input type="submit" value="Sign in" name="submit">
                </div>
                <div class="new_account">
                    <p>New to Ieka?<a href="admin-signup.php"> Create a new account with us</a></p>
                </div>
            </form>
        </div>
    </body>
</html>