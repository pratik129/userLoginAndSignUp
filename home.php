<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <?php
    session_start();

    if (!empty($_SESSION["email"])) {
        echo "<h1>Welcome " . $_SESSION['email'] . "</h1>";
    } else {
        header("location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_FILES["pic"])) {
            $file = $_FILES["pic"];

            $allowedTypes = array('jpg', 'jpeg', 'png');
            $fileExtensation = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!in_array($fileExtensation, $allowedTypes)) {
                echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            } else {
                $maxFileSize = 5 * 1024 * 1024;
                if ($file["size"] > $maxFileSize) {
                    echo "Error: File size exceeds the maximum limit (5MB).";
                } else {
                    $uploadDirectory = "uploads/";
                    $uploadPath = $uploadDirectory . basename($file["name"]);
                    if (file_exists($uploadPath)) {
                        echo "Error: File with the same name already exists.";
                    } else {
                        if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                            echo "File uploaded successfully.";
                        } else {
                            echo "Error uploading file.";
                        }
                    }
                }
            }
        } else {
            echo "File is not found or file upload error";
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        Upload your pic: <input type="file" name="pic" id="pic">
        <input type="submit" value="submit">
    </form>

    <br><br>
    <?php
    echo "<h4><a href='logout.php'>logout</a></h4>";
    ?>

</body>

</html>