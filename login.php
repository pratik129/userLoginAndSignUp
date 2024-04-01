<?php
session_start();
$_SESSION['error'] = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        empty(trim($_POST["email"])) ||
        empty(trim($_POST["password"]))
    ) {
        empty(trim($_POST["email"])) ?  $_SESSION["error"]["email"] = "Email is required." : "";
        empty(trim($_POST["password"])) ?  $_SESSION["error"]["password"] = "Password is required." : "";
        header("location: index.php");
    } else {

        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        // Pratik@123
        // echo "<br>";
        //  echo $password;
        // echo "<br>";
        $password_old = '$2y$10$9CYN4c74D6aasp2u47cOdumGS58/F92/YBQx.pNna0ESw0HMjc9HO';
        // $current_password = password_hash($password, PASSWORD_BCRYPT);
        // echo "<br>";
        // echo $current_password;
        // echo "<br>";
        $old_email = "pratikchavan800@gmail.com";
        if ($email != $old_email) {
            $_SESSION['error']['email'] = "Email didn't match";
        }

        if (!password_verify($password, $password_old)) {
            $_SESSION["error"]["fail"] = "Password didn't match";
            header("location: index.php");
            // echo "password didn't match";
            echo "Password match";
        }

        if (empty($_SESSION["error"])) {
            $_SESSION['email'] = $email;
            header("location: home.php");
        }
    }
} else {
    $_SESSION["error"]["redirect"] = "Please Fill all details";
    header("location: index.php");
}
