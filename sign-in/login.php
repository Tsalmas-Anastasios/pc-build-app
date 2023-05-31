<?php
    session_start();

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
	
	//GIVE A RANDOM NUMBER IN NON-ACCOUNT USERS
	if (!isset($_SESSION["username"])) {
		$i = 0;
		$sql = "SELECT * FROM account_sessions";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$i++;
			}
		}
		$new_name = "user000{$i}";
		$_SESSION["username"] = $new_name;

		//Make a new record for this user
		$sql = "INSERT INTO account_sessions (rnd_num)
		VALUES ('$new_name')";
		if ($conn->query($sql) === TRUE) {
			//INSERTED
		} else {
			echo 'An unexpected server error has occurred! Please try again later!';
		}
	}
	//-----------------------------------------;
    
    if (isset($_SESSION["username"]) and isset($_SESSION["email"])) {
        header("Location: ../index");
    }
    
?>
<?php
    if (isset($_POST["username"]) and isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "") {
            username_not_fill();
            die();
        } elseif ($password = "") {
            password_not_fill();
            die();
        }

        $password = md5($_POST["password"]);
        $mail = 0;
        $found = 0;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM Accounts WHERE email='$username' AND password='$password' AND activate='DONE'";
            $mail = 1;
        } else {
            $sql = "SELECT * FROM Accounts WHERE username='$username' AND password='$password' AND activate='DONE'";
            $mail = 2;
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($mail == 1) {
                    if ($row["email"] == $username and $row["password"] == $password) {
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["email"] = $row["email"];
                        $found = 1;
                    }
                } elseif ($mail == 2) {
                    if ($row["username"] == $username and $row["password"] == $password) {
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["email"] = $row["email"];
                        $found = 1;
                    }
                }
            }
        } else {
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $sql = "SELECT * FROM Accounts WHERE email='$username' AND password='$password'";
            } else {
                $sql = "SELECT * FROM Accounts WHERE username='$username' AND password='$password'";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                not_active();
                die();
            } else {
                no_account();
            }
        }
        if ($found == 1) {
            header("Location: ../index");
            die();
        }
    }
?>

<?php
function username_not_fill() {
?>
    <!doctype HTML>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
            <link rel="stylesheet" href="see-this/login.css">
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
                function submit() {
                    var submitForm = document.getElementsByName('login');
                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    if (username != "" && password != "") {
                        submitForm[0].submit();
                    } else {
                        return false;
                    }
                }
            </script>
            <div class="login">
                <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out the username</p>
                <h1 class="title">Login</h1>
                <hr class="line">
                <div class="tabs">
                    <a class="active" style="cursor:pointer;">Login</a>
                    <a href="register">Register</a>
                </div>
                <form action="" method="post" name="login" id="login">
                    <div class="user">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-text">
                        <input type="text" name="username" id="username" class="username" placeholder="Username/E-mail" style="border: 1px solid red;">
                    </div><br>
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text">
                        <input type="password" name="password" id="password" class="password" placeholder="Password">
                    </div>
                </form>
                <div class="forget-psswd"><a href="forget-psswd-user">Forgot password?</a></div>
                <button class="submit" onclick="return submit()">Login</button>
            </div>
        </body>
    </html>
<?php
}
function password_not_fill() {
?>
    <!doctype HTML>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
            <link rel="stylesheet" href="see-this/login.css">
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
                function submit() {
                    var submitForm = document.getElementsByName('login');
                    var username= document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    if (username != "" && password != "") {
                        submitForm[0].submit();
                    } else {
                        return false;
                    }
                }
            </script>
            <div class="login">
                <p style="margin-top:-6px;color:red;font-size:12px;">*Please fill out the password</p>
                <h1 class="title">Login</h1>
                <hr class="line">
                <div class="tabs">
                    <a class="active" style="cursor:pointer;">Login</a>
                    <a href="register">Register</a>
                </div>
                <form action="" method="post" name="login" id="login">
                    <div class="user">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-text">
                        <input type="text" name="username" id="username" class="username" placeholder="Username/E-mail" value="<?php echo $_POST["username"]; ?>">
                    </div><br>
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text">
                        <input type="password" name="password" id="password" class="password" placeholder="Password" style="border: 1px solid red;">
                    </div>
                </form>
                <div class="forget-psswd"><a href="forget-psswd-user">Forgot password?</a></div>
                <button class="submit" onclick="return submit()">Login</button>
            </div>
        </body>
    </html>
<?php
}
function not_active() {
?>
    <!doctype HTML>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
            <link rel="stylesheet" href="see-this/login.css">
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
                function submit() {
                    var submitForm = document.getElementsByName('login');
                    var username= document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    if (username != "" && password != "") {
                        submitForm[0].submit();
                    } else {
                        return false;
                    }
                }
            </script>
            <div class="login">
                <p style="margin-top:-6px;color:red;font-size:12px;">*This account isn't activated in our system. Please activate your account and try again!</p>
                <h1 class="title">Login</h1>
                <hr class="line">
                <div class="tabs">
                    <a class="active" style="cursor:pointer;">Login</a>
                    <a href="register">Register</a>
                </div>
                <form action="" method="post" name="login" id="login">
                    <div class="user">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-text">
                        <input type="text" name="username" id="username" class="username" placeholder="Username/E-mail">
                    </div><br>
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text">
                        <input type="password" name="password" id="password" class="password" placeholder="Password">
                    </div>
                </form>
                <div class="forget-psswd"><a href="forget-psswd-user">Forgot password?</a></div>
                <button class="submit" onclick="return submit()">Login</button>
            </div>
        </body>
    </html>    
<?php
}
function no_account() {
?>
    <!doctype HTML>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta content="text/html; charset=utf-8" />
            <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
            <link rel="stylesheet" href="see-this/login.css">
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
                function submit() {
                    var submitForm = document.getElementsByName('login');
                    var username= document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    if (username != "" && password != "") {
                        submitForm[0].submit();
                    } else {
                        return false;
                    }
                }
            </script>
            <div class="login">
                <p style="margin-top:-6px;color:red;font-size:12px;">*We don't have any account with this username/password. Create an account from <a href="register" style="text-decoration: underline;color: #1a0033;">here</a></p>
                <h1 class="title">Login</h1>
                <hr class="line">
                <div class="tabs">
                    <a class="active" style="cursor:pointer;">Login</a>
                    <a href="register">Register</a>
                </div>
                <form action="" method="post" name="login" id="login">
                    <div class="user">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-text">
                        <input type="text" name="username" id="username" class="username" placeholder="Username/E-mail">
                    </div><br>
                    <div class="pass">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="pass-text">
                        <input type="password" name="password" id="password" class="password" placeholder="Password">
                    </div>
                </form>
                <div class="forget-psswd"><a href="forget-psswd-user">Forgot password?</a></div>
                <button class="submit" onclick="return submit()">Login</button>
            </div>
        </body>
    </html>
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
        <link rel="stylesheet" href="see-this/login.css">
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
            function submit() {
                var submitForm = document.getElementsByName('login');
                var username= document.getElementById("username").value;
                var password = document.getElementById("password").value;
                if (username != "" && password != "") {
                    submitForm[0].submit();
                } else {
                    return false;
                }
            }
        </script>

        <!--IF NOT EXIST ANEY FIELD THEN SHOULD GIVE BACK THE LOGIN FORM-->
        <?php
            if (!isset($_POST["username"]) or !isset($_POST["password"])) {
        ?>
                <div class="login">
                    <h1 class="title">Login</h1>
                    <hr class="line">
                    <div class="tabs">
                        <a class="active" style="cursor:pointer;">Login</a>
                        <a href="register">Register</a>
                    </div>
                    <form action="" method="post" name="login" id="login">
                        <div class="user">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-text">
                            <input type="text" name="username" id="username" class="username" placeholder="Username/E-mail">
                        </div><br>
                        <div class="pass">
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <div class="pass-text">
                            <input type="password" name="password" id="password" class="password" placeholder="Password">
                        </div>
                    </form>
                    <div class="forget-psswd"><a href="forget-psswd-user">Forgot password?</a></div>
                    <button class="submit" onclick="return submit()">Login</button>
                </div>
        <?php
                $conn->close();
                die();
            }

            
        ?>

        <?php
            $conn->close();
        ?>
    </body>
</html>