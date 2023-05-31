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
    if (!isset($_SESSION["username"]) or !isset($_SESSION["email"])) {
        header("Location: https://pc-build-webapp.000webhostapp.com/sign-in/login");
        die();
    }

    if (!isset($_GET["user"]) or !isset($_GET["email"])) {
        header("Location: ../dashboard.php");
        die();
    }

    $username = $_SESSION["username"];
    $email = $_SESSION["email"];

    

    if (isset($_POST["submit"])) {
        $errors = "";

        $old_psswd = md5($_POST["oldPassword"]);
        $new_psswd = md5($_POST["newPassword"]);
        $confirm_psswd = md5($_POST["confirmPassword"]);

        $sql = "SELECT password FROM Accounts WHERE username='$username' AND email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["password"] != $old_psswd) {
                    $errors = "old";
                }
            }
        }

        if ($new_psswd != $confirm_psswd and $errors == "") {
            $errors = "not same";
        }

        if ($errors == "") {
            $update = "UPDATE Accounts SET password='$new_psswd' WHERE username='$username' AND email='$email'";
            if ($conn->query($update) === TRUE) {
                //PASSWORD UPDATE SUCCESSFULL
                header("Location: home.html");
            } else {
                echo 'An unexpected server error has occured! Please try again later';
                die();
            }
        }
    }


    if (isset($_POST["delete"])) {
        $delete = "DELETE FROM Accounts WHERE username='$username' AND email='$email'";
        if ($conn->query($delete) === TRUE) {
            echo 'Your account had successfully deleted!';
            unset($_SESSION["username"]);
            unset($_SESSION["email"]);
            echo "<script>window.top.location.href = \"https://pc-build-webapp.000webhostapp.com/sign-in/register\";</script>";
            die();
        } else {
            echo 'An unexpected server error has occured! Please try again later';
            die();
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <TITLE>PC Build App-Account Dashboard-Orders</TITLE>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="style/account-settings/account-security/form.css">
        <link rel="stylesheet" href="style/error-message.css">
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>

        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }

            body {
                background-color: #f3f3f3;
            }
        </style>
    </head>

    <body LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0">
            
        <div class="main" style="text-align: left;">
            <div class="security">
                <div class="password-change">
                    <div class="title">
                        Change your password
                    </div>
                    <form action="" method="post" name="change-password" id="change-password">
                        <div class="password">
                            <label for="old_password">Old password</label>
                            <input type="password" placeholder="Old password" maxlength="20" minlength="5" id="old_password"  name="oldPassword" required>
                        </div>
                        <div class="password">
                            <label for="new_password">New password</label>
                            <input type="password" placeholder="New password" maxlength="20" minlength="5" id="new_password" name="newPassword" required>
                        </div>
                        <div class="password">
                            <label for="confirm_password">Confirm password</label>
                            <input type="password" placeholder="Confirm password" maxlength="20" minlength="5" id="confirm_password" name="confirmPassword" required>
                        </div>
                        <!--<div class="error-message" style="display: block;">*Error message</div>-->
                        <?php
                            if (isset($errors)) {
                                if ($errors == "old") {
                                ?>
                                    <div class="error-message" style="display: block;">*Your old password is incorrect! Please try again!</div>
                                <?php
                                } elseif ($errors == "not same") {
                                ?>
                                    <div class="error-message" style="display: block;">*New password is not the same with confirm! Please try again!</div>
                                <?php
                                }
                            }
                        ?>
                        <div class="submit" style="display: block;">
                            <button type="submit" name="submit" style="display: block;">Submit</button>
                        </div>
                    </form>
                </div>
                
                <div class="delete-acc">
                    <div class="title">Delete your account</div>
                    <div class="text">
                        <p class="text-1">The process of deleting the account is performed immediately and can not be undone!</p>
                        <p class="text-2">In case there is an order in progress, you will no longer be able to be informed about its progress</p>
                        <form action="" method="post" name="delete-account" id="delete_account">
                            <input type="hidden" name="delete-ver" id="delete_ver" value="delete">
                            <button type="button" class="delete" onclick="deleteAccount()">Delete account</button>
                            <div class="sure" id="sure" style="display: none;">
                                <div class="text">
                                    Are you sure that you want to delete your account?
                                </div>
                                <div class="yes-no">
                                    <button type="submit" name="delete" class="yes-btn">Yes!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function deleteAccount() {
                document.getElementById("sure").style.display = "block";
            }
        </script>
    </body>

</html>

<?php
    $conn->close();
?>