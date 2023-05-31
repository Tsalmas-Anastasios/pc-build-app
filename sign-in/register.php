<?php
    
?>


<?php
    function username_already_exists() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*This username already exists</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" style="border: 1px solid red;" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"]; ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function invalid_username_char() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Username should contain 1-100 characters</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" style="border: 1px solid red;" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"]; ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function email_already_exists() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*This email already exists</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" style="border: 1px solid red;" value="<?php echo $_POST["username"]; ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function invalid_email_char() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*E-mail should contain 1-200 characters</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" style="border: 1px solid red;" value="<?php echo $_POST["username"]; ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function password_match() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Passwords don't match</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" value="<?php echo $_POST["username"]; ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"]; ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password" style="border: 1px solid red;" value="">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password" style="border: 1px solid red;" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function invalid_email() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Invalid e-mail</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" value="<?php echo $_POST["username"]; ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" style="border: 1px solid red;" value="">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function fill_all_fields() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out all fields</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" value="
                    <?php
                        if (isset($_POST["username"])) {
                            echo $_POST["username"]; 
                        }
                    ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="
                    <?php
                        if (isset($_POST["email"])) {
                            echo $_POST["enail"];
                        }
                    ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password"value="
                    <?php
                        if (isset($_POST["password"])) {
                            echo $_POST["password"]; 
                        }
                    ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password" value="
                    <?php 
                        if (isset($_POST["cPassword"])) {
                            echo $_POST["cPassword"]; 
                        }
                    ?>">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function invalid_username() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Username must contain characters A-Z, a-z, 0-9</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" style="border: 1px solid red;" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"]; ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
    function invalid_password() { ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Password must have 6 to 20 characters!</p>
            <h1 class="title">Register</h1>
            <hr class="line">
            <div class="tabs">
                <a href="login">Login</a>
                <a class="active" style="cursor:pointer;">Register</a>
            </div>
            <form action="" method="post" name="register" id="register">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="username" id="username" class="username" placeholder="Username" value="<?php echo $_POST["username"]; ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"]; ?>">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text">
                    <input type="password" name="password" id="password" class="password" placeholder="Password" style="border: 1px solid red;" value="">
                </div><br>
                <div class="pass">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div class="pass-text" style="margin-bottom: -10px;">
                    <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password" style="border: 1px solid red;" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit()">Register</button>
        </div>
    <?php }
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
        <script>
            function submit() {
                var submitForm = document.getElementsByName("register");
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
                var mail = document.getElementById("email").value;
                if (username != "" && password != "" && mail != "") {
                    submitForm[0].submit()
                } else {
                    return false;
                }
            }
        </script>

        <?php
            if (isset($_POST["username"]) and isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["cPassword"])) {
                if ($_POST["username"] != "" and $_POST["email"] != "" and $_POST["password"] != "" and $_POST["cPassword"] != "") {
                    $username = $_POST["username"];
                    $sql = "SELECT * FROM Accounts WHERE username LIKE '$username'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        username_already_exists();
                        $conn->close();
                        die();
                    }

                    if (strlen($username) > 100 or strlen($username) < 1) {
                        invalid_username_char();
                        $conn->close();
                        die();
                    }

                    if (strlen($_POST["email"]) > 200) {
                        invalid_email_char();
                        $conn->close();
                        die();
                    }

                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        invalid_email();
                        $conn->close();
                        die();
                    }

                    $email = $_POST["email"];
                    $sql = "SELECT * FROM Accounts WHERE email LIKE '$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        email_already_exists();
                        $conn->close();
                        die();
                    }

                    $password = $_POST["password"];
                    $c_password = $_POST["cPassword"];
                    if ($password != $c_password) {
                        password_match();
                        $conn->close();
                        die();
                    }

                    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
                        invalid_username();
                        $conn->close();
                        die();
                    }

                    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
                        invalid_password();
                        $conn->close();
                        die();
                    }

                    $username = $_POST["username"];
                    $password = md5($_POST["password"]);
                    $email = $_POST["email"];
                    $activate = uniqid();
                    $sql = "INSERT INTO Accounts (username, email, password, activate)
                    VALUES ('$username', '$email', '$password', '$activate')";

                    if ($conn->query($sql) === TRUE) {
                        //NEW CUSTOMER!!!

                        //SEND A VERIFICATION E-MAIL --- START
                        // The message
                        $message = '<p style="font-size:24px;"><font family="verdana">Please activate your account from this url:<br>http://pc-build-webapp.000webhostapp.com/sign-in/activate?active='. $activate. '&user='. $username. '&email='. $email. '</font><p>';

                        // In case any of our lines are larger than 70 characters, we should use wordwrap()
                        $message = wordwrap($message, 70, "\r\n");

                        // Send
                        mail($email, 'Thank you for your registartion-PC BUILD App', $message);

                        //SEND A VERIFICATION E-MAIL --- END
                        ?>
                        <div class="information-message">
                            Thank you for your registration in our site! Please see into your e-mail inbox or spam to activate your account!
                            <center><h3>PC BUILD App</h3></center>
                        </div>
                    <?php
                        $conn->close();
                    } else {
                        echo 'An unexpected server error occured! Please try again later!';
                        $conn->close();
                        die();
                    }
                } else {
                    fill_all_fields();
                    $conn->close();
                    die();
                }
            } else {?>
                <div class="register">
                    <h1 class="title">Register</h1>
                    <hr class="line">
                    <div class="tabs">
                        <a href="login">Login</a>
                        <a class="active" style="cursor:pointer;">Register</a>
                    </div>
                    <form action="" method="post" name="register" id="register">
                        <div class="user">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-text">
                            <input type="text" name="username" id="username" class="username" placeholder="Username">
                        </div><br>
                        <div class="mail">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="mail-text">
                            <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail">
                        </div><br>
                        <div class="pass">
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <div class="pass-text">
                            <input type="password" name="password" id="password" class="password" placeholder="Password">
                        </div><br>
                        <div class="pass">
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <div class="pass-text" style="margin-bottom: -10px;">
                            <input type="password" name="cPassword" id="cPassword" class="password" placeholder="Confirm Password">
                        </div>
                    </form>
                    <button class="submit" onclick="return submit()">Register</button>
                </div>
            <?php } ?>
    </body>

</html>