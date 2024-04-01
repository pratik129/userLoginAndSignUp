<?php
session_start();
$_SESSION['error'] = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $phone = $_POST['phone'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

   if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION["error"]["email"] = "Email is not a valid";
   }

   if (empty($name)) {
      $_SESSION["error"]["name"] = "Name is required";
   }

   if (empty($password)) {
      $_SESSION["error"]["password"] = "Password is required";
   }

   if (empty($cpassword)) {
      $_SESSION["error"]["cpassword"] = "Confirm password is required";
   } elseif ($password != $cpassword) {
      $_SESSION["error"]["cpassword"] = "Password and Confirm password did not match";
   }

   if (empty($phone)) {
      $_SESSION["error"]["phone"] = "Phone number required";
   } elseif (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
      $_SESSION["error"]["phone"] = "Phone number is not valid";
   }

   if (empty($_SESSION['error'])) {
      $final_passowrd = password_hash($password, PASSWORD_DEFAULT);
      echo $name;
      echo "<br>";
      echo $email;
      echo "<br>";
      echo $password;
      echo "<br>";
      echo $final_passowrd;
      echo "<br>";
      echo $phone;
      echo "<br>";
      echo "<h4><a href='login.php'>Login</a></h4>";
   } else {
      header("location: sign_up.php");
   }
}
