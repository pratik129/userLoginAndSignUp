<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    session_start();

    if (!empty($_SESSION["error"])) {

        foreach ($_SESSION["error"] as $key => $value) {
            echo "<h4 style='color:red'>" . $value . "</h4>";
        }
        session_unset("error");
    }
    ?>
    <form action="login.php" method="post">
        Email: <input type="text" name="email" id="email"><br>
        Password : <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit"><br>
        You don't have account then please <a href="sign_up.php">Sign up</a>
    </form>
</body>

</html>