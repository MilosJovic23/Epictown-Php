



<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <div>
            <form method="POST" action="../models/login.php">
                <input type="email" placeholder="email" name="email" >
                <input type="password" placeholder="password" name="password">
                <button type="submit">login</button>
            </form>
            <div>
                <p>Dont have account?</p>
                <a href="registerForm.php">Register</a>
            </div>
        </div>
    </body>
</html>