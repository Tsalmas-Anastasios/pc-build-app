<?php
    if (!isset($_GET["change"]) or !isset($_GET["user"]) or !isset($_GET["email"])) {
        header("Location: /Pages/you-made-a-mistake.html");
        die();
    }

    
?>
<?php
function empty_fields() {
?>
    <div class="register">
        <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out all fields!</p>
        <h1 class="title">New password</h1>
        <hr class="line"><br>
        <form action="" method="post" name="change" id="change">
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text">
                <input type="password" name="password" id="password" class="password" placeholder="New password">
            </div><br>
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text" style="margin-bottom: -10px;">
                <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="user" value="<?php echo $_GET["user"] ?>">
            <input type="hidden" name="email" value="<?php echo $_GET["email"] ?>">
            <input type="hidden" name="change" value="<?php echo $_GET["change"] ?>">
        </form><br>
        <button class="submit" onclick="submit_form_change()">Change</button>
    </div>
<?php
}
function passwords_match() {
?>
    <div class="register">
        <p style="margin-top:-6px;color:red;font-size:12px;">*Passwords don't match! Please try again.</p>
        <h1 class="title">New password</h1>
        <hr class="line"><br>
        <form action="" method="post" name="change" id="change">
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text">
                <input type="password" name="password" id="password" class="password" placeholder="New password">
            </div><br>
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text" style="margin-bottom: -10px;">
                <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="user" value="<?php echo $_GET["user"] ?>">
            <input type="hidden" name="email" value="<?php echo $_GET["email"] ?>">
            <input type="hidden" name="change" value="<?php echo $_GET["change"] ?>">
        </form><br>
        <button class="submit" onclick="submit_form_change()">Change</button>
    </div>
<?php
}
function invalid_password() {
    ?>
    <div class="register">
        <p style="margin-top:-6px;color:red;font-size:12px;">*Password must have 6 to 20 characters!</p>
        <h1 class="title">New password</h1>
        <hr class="line"><br>
        <form action="" method="post" name="change" id="change">
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text">
                <input type="password" name="password" id="password" class="password" placeholder="New password">
            </div><br>
            <div class="pass">
                <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="pass-text" style="margin-bottom: -10px;">
                <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="user" value="<?php echo $_GET["user"] ?>">
            <input type="hidden" name="email" value="<?php echo $_GET["email"] ?>">
            <input type="hidden" name="change" value="<?php echo $_GET["change"] ?>">
        </form><br>
        <button class="submit" onclick="submit_form_change()">Change</button>
    </div>
<?php
}
?>

<!doctype HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <link rel="stylesheet" href="see-this/register.css">
        <link rel="stylesheet" href="see-this/activate-message.css">
        <TITLE>PC Build App-Login</TITLE>
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
        
        <script>
            function submit_form_change() {
                var submitForm = document.getElementsByName('change');
                var password= document.getElementById("password").value;
                var c_pass= document.getElementById("cPassword").value;
                if (password != "" && c_pass != "") {
                    submitForm[0].submit();
                } else {
                    return false;
                }
            }
        </script>

        <?php
        if (isset($_POST["password"]) and isset($_POST["cPassword"]) and isset($_POST["user"]) and isset($_POST["email"]) and isset($_POST["change"])) {
            if ($_POST["password"] == "" or $_POST["cPassword"] == "") {
                //ONE FIELD IS EMPTY
                empty_fields();
                $conn->close();
                die();
            }
            $pass = $_POST["password"];
            $c_pass = $_POST["cPassword"];
            if ($pass != $c_pass) {
                //PASSWORDS DON'T MATCH
                passwords_match();
                $conn->close();
                die();
            }
            if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
                //PASSWORD IS NOT VALID
                invalid_password();
                $conn->close();
                die();
            }

            //OK PASSWORDS ARE OKEY THEN WE CAN CONTINUE
            //Now we should check if user, email, change there are into our database
            $username = $_POST["user"];
            $email = $_POST["email"];
            $change = $_POST["change"];
            $sql = "SELECT * FROM Accounts WHERE username='$username' AND email='$email' AND pass_f='$change'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $password = md5($_POST["password"]);
                $sql = "UPDATE Accounts SET password='$password' WHERE username='$username' AND email='$email' AND pass_f='$change'";
                if ($conn->query($sql) === TRUE) {
                    $sql = "UPDATE Accounts SET pass_f='' WHERE username='$username' AND email='$email'";
                    if ($conn->query($sql) === TRUE) {
                    ?>
                        <div class="information-message">
                            You succesfully change your password! Login <a href="login" style="color:red;">here</a>!
                            <center><h3>PC BUILD App</h3></center>
                        </div>
                    <?php
                    } else {
                        echo "An unexpected server error occured! Please try again later!";
                    }
                } else {
                    echo 'An unexpected server error occured! Please try again later!';
                }
            } else {
            ?>
                <div class="information-message">
                    We don't have any account with 'Change password' request in our system! Please try again from <a href="forget-psswd-user" style="color:red;">here</a>!
                    <center><h3>PC BUILD App</h3></center>
                </div>
            <?php
                $conn->close();
                die();
            }
        ?>
            
        <?php
        } else {
        ?>
            <div class="register">
                <h1 class="title">New password</h1>
                <hr class="line"><br>
                <form action="" method="post" name="change" id="change">
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text">
                        <input type="password" name="password" id="password" class="password" placeholder="New password">
                    </div><br>
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text" style="margin-bottom: -10px;">
                        <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                    </div>
                    <input type="hidden" name="user" value="<?php echo $_GET["user"] ?>">
                    <input type="hidden" name="email" value="<?php echo $_GET["email"] ?>">
                    <input type="hidden" name="change" value="<?php echo $_GET["change"] ?>">
                </form><br>
                <button class="submit" onclick="submit_form_change()">Change</button>
            </div>
        <?php
        }
        ?>

        <?php
            $conn->close();
        ?>
    </body>

</html>