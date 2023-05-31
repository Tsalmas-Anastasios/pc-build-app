<?php
    if (!isset($_GET["active"]) or !isset($_GET["user"]) or !isset($_GET["email"])) {
        header("Location: /Pages/you-made-a-mistake.html");
        die();
    }
    
    

    
?>

<!doctype HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <link rel="stylesheet" href="see-this/activate-message.css">
        <TITLE>PC Build App-Register</TITLE>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>

        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }
        </style>
    </head>

    <body LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0">

        <?php
            $username = $_GET["user"];
            $email = $_GET["email"];
            $active = $_GET["active"];
            $sql = "SELECT * FROM Accounts WHERE username='$username' AND email='$email' AND activate='$active'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $sql = "UPDATE Accounts SET activate='DONE' WHERE username='$username' AND email='$email'";

                if ($conn->query($sql) === TRUE) {
                ?>
                    <div class="information-message">
                        Your account has been activated! You can now <a href="login" style="color:red;">login</a> and make your shops with security! Thank you!
                        <center><h3>PC BUILD App</h3></center>
                    </div>
                <?php
                } else {
                    echo "An unexpected server error occured! Please try again later!";
                }
            } else {
                $sql = "SELECT * FROM Accounts WHERE username='$username' AND email='$email' AND activate='DONE'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
                    <div class="information-message">
                        This account has already been activated! You can login to your account <a href="login" style="color:red;">here</a>!
                        <center><h3>PC BUILD App</h3></center>
                    </div>
                <?php
                } else {
                ?>
                    <div class="information-message">
                        There is no account with username: <?php echo $username; ?> and e-mail: <?php echo $email; ?> in our system<br>
                        You can create an account <a href="register" style="color:red;">here</a>
                        <center><h3>PC BUILD App</h3></center>
                    </div>
                <?php
                }
            }
        ?>

        <?php
            $conn->close();
        ?>
    </body>
</html>