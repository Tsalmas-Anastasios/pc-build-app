<?php
    
?>

<?php
    function not_user() {
    ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out the username field</p>
            <h1 class="title">Password recover</h1>
            <hr class="line">
            <form action="" method="post" name="forget" id="forget">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="user" id="user" class="username" placeholder="Username" value="" style="border: 1px solid red;">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="<?php echo $_POST["email"] ?>">
                </div>
            </form>
            <button class="submit" onclick="return submit_form_forget()">Continue</button>
        </div>
    <?php
    }
    function not_email() {
    ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out the e-mail field</p>
            <h1 class="title">Password recover</h1>
            <hr class="line">
            <form action="" method="post" name="forget" id="forget">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="user" id="user" class="username" placeholder="Username" value="<?php echo $_POST["user"] ?>">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" style="border: 1px solid red;" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit_form_forget()">Continue</button>
        </div>
    <?php
    }
    function not_user_email() {
    ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out the the fields</p>
            <h1 class="title">Password recover</h1>
            <hr class="line">
            <form action="" method="post" name="forget" id="forget">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="user" id="user" class="username" placeholder="Username" style="border: 1px solid red;" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" style="border: 1px solid red;" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit_form_forget()">Continue</button>
        </div>
    <?php
    }
    function no_account() {
        ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*There is no account with this username and e-mail. Please try again!</p>
            <h1 class="title">Password recover</h1>
            <hr class="line">
            <form action="" method="post" name="forget" id="forget">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="user" id="user" class="username" placeholder="Username" style="border: 1px solid red;" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" style="border: 1px solid red;" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit_form_forget()">Continue</button>
        </div>
    <?php
    }
    function not_activated() {
        ?>
        <div class="register">
            <p style="margin-top:-6px;color:red;font-size:12px;">*This account should be activated first!</p>
            <h1 class="title">Password recover</h1>
            <hr class="line">
            <form action="" method="post" name="forget" id="forget">
                <div class="user">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-text">
                    <input type="text" name="user" id="user" class="username" placeholder="Username" value="">
                </div><br>
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="mail-text">
                    <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail" value="">
                </div>
            </form>
            <button class="submit" onclick="return submit_form_forget()">Continue</button>
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
        <TITLE>PC Build App-Forget password</TITLE>
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
            function submit_form_forget() {
                var submitForm = document.getElementsByName('forget');
                var username = document.getElementById("user").value;
                var email = document.getElementById("email").value;
                if (username != "" && email != "") {
                    submitForm[0].submit();
                } else {
                    return false;
                }
            }
        </script>

        <?php
            if (isset($_POST["user"]) and isset($_POST["email"])) {
                $username = $_POST["user"];
                $email = $_POST["email"];
                $sql = "SELECT * FROM Accounts WHERE username='$username' AND email='$email' AND activate='DONE'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    //YES-WE FOUND THIS ACCOUNT
                    $rand = uniqid();
                    $sql = "UPDATE Accounts SET pass_f='$rand' WHERE username='$username' AND email='$email' AND activate='DONE'";
                    if ($conn->query($sql) === TRUE) {
                        //E-MAIL TO CHANGE PASSWORD
                        //SEND A VERIFICATION E-MAIL --- START
                        // The message
                        $message = '<p style="font-size:24px;"><font family="verdana">Click here to change your password:<br>http://pc-build-webapp.000webhostapp.com/sign-in/change-psswd?change='. $rand. '&user='. $username. '&email='. $email. '</font><p>';
                        // In case any of our lines are larger than 70 characters, we should use wordwrap()
                        $message = wordwrap($message, 70, "\r\n");
                        // Send
                        mail($email, 'Thank you for your registartion-PC BUILD App', $message);
                        //SEND A VERIFICATION E-MAIL --- END
                    } else {
                        echo "An unexpected server error occured! Please try again later!";
                    }
                ?>
                    <div class="information-message">
                        We send a link in your e-mail! Your request is in proccess! Please close this tab and see your e-mail inbox.
                        <center><h3>PC BUILD App</h3></center>
                    </div>
                <?php
                } else {
                    $sql = "SELECT * FROM Accounts WHERE username='$username' AND email='$email'";
                    if ($result->num_rows > 0) {
                        //THIS ACCOUNT SHOULD ACTIVATED FIRST
                        not_activated();
                        $conn->close();
                        die();
                    } else {
                        //THERE IS NO ACCOUNT
                        no_account();
                        $conn->close();
                        die();
                    }
                }
                
            ?>
                
            <?php
            } elseif (!isset($_POST["user"]) or !isset($_POST["email"])) {
                if (isset($_POST["user"]) and !isset($_POST["email"])) {
                    not_email();
                    $conn->close();
                    die();
                }
                if (!isset($_POST["user"]) and isset($_POST["email"])) {
                    not_user();
                    $conn->close();
                    die();
                }
                if (!isset($_POST["user"]) and !isset($_POST["email"])) {
                    not_user_email();
                    $conn->close();
                    die();
                }
            } else {
            ?>
                <div class="register">
                    <h1 class="title">Password recover</h1>
                    <hr class="line">
                    <form action="" method="post" name="forget" id="forget">
                        <div class="user">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-text">
                            <input type="text" name="user" id="user" class="username" placeholder="Username">
                        </div><br>
                        <div class="mail">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="mail-text">
                            <input type="email" name="email" id="email" class="mailbox" placeholder="E-Mail">
                        </div>
                    </form>
                    <button class="submit" onclick="return submit_form_forget()">Continue</button>
                </div>
            <?php
            }
        ?>      

    </body>
</html>