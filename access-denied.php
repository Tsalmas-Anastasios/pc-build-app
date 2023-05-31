<?php
    //CONNECT WITH DATABASE
    $servername = "localhost";
    $username = "id16559427_products_user";
    $password = "o9n*65%Wy7(!f1VQ";
    $dbname = "id16559427_products";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection with databse failed: " . $conn->connect_error);
    }

    if (isset($_POST["email"])) {
        //NEW RECORD
        $email = $_POST["email"];
        $rand = uniqid();
        $insert = "INSERT INTO opening_emails (email, number) VALUES
        ('$email', '$rand')";
        if ($conn->query($insert) === TRUE) {
            //NEW RECORD INSERTED SUCCESSFULLY
        } else {
            echo 'An unexpected error has occured! Please try again later';
            $conn->close();
            die();
        }
        $conn->close();
        header("Location: https://pc-build-webapp.000webhostapp.com/opening-registration-complete?br=". $rand. "&email=". $email);
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->=
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <title>PC Build App</title>
        <link rel="stylesheet" href="access-d-styles/body.css">
        <link rel="stylesheet" href="access-d-styles/admin-login.css">
        <link rel="stylesheet" href="access-d-styles/content.css">
        <link rel="stylesheet" href="access-d-styles/content-image.css">
        <link rel="stylesheet" href="access-d-styles/content-text.css">
    </head>

    <body>
        <div class="admin-login">
            <a href="sign-in/login" class="text">Login as admin</a>
        </div>

        <div class="content">
            <div class="img">
                <img src="Pictures/coming-soon.png" alt="Coming soon image" class="image" />
            </div>
            <div class="text">
                No date has been set for the opening!<br>
                If you want to be informed for this then write bellow your email:<br><br>
                <form action="" method="post">
                    <input type="email" name="email" id="email" maxlength="200" placeholder="Email" required />
                    <button type="submit" id="submit">Send!</button>
                </form>
            </div>
        </div>
    </body>

</html>