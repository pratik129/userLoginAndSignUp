<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <h1> Sign up:</h1>
    <form action="sign_up_submission.php" method="post">
        Name : <input type="text" name="name" id="name"><br>
        Email : <input type="email" name="email" id="email"><br>
        Phone number : <input type="text" name="phone" id="phone"><br>
        Password : <input type="password" name="password" id="password"><br>
        Confirm Password : <input type="password" name="cpassword" id="cpassword"><br>
        Submit <input type="submit" name="submit" value="submit"><br>

    </form>
    <?php
    session_start();
    if (!empty($_SESSION["error"])) {

        foreach ($_SESSION["error"] as $key => $value) {
            echo "<h4 style='color:red'>" . $value . "</h4>";
        }
        session_unset("error");
    }

    ?>

</body>

</html>




<?php
