<?php
    $error = array("", "");
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
        $user = $_POST["username"];
        $mail_new = $_POST["email"];

        //HERE WE CHECK IF THE USERNAME OR EMAIL ALREADY EXISTS
        $sql = "SELECT username, email FROM Accounts WHERE username<>'$username' AND email<>'$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["username"] == $user) {
                    $error[0] = "USER-EXISTS";
                } elseif ($row["email"] == $mail_new) {
                    $error[1] = "MAIL-EXISTS";
                }
            }
        }
        if ($error[0] == "" and $error[1] == "") {
            $sql = "UPDATE Accounts SET username='$user', email='$mail_new' WHERE username='$username' AND email='$email'";
            if ($conn->query($sql) === TRUE) {
                //RECORD UPDATE SUCCESSFULLY
            } else {
                echo 'An unexpected server error has occured! Please try again later! ';
                die();
            }
            /*
                TABLES SHOULD BE UPDATE:
                    -Orders
                    -PC_Builds
                    -Favorites
                    -Friends
                    -Personal_Information
                    -Telephones
                    -Addresses
                    ...more...
            */

            //UPDATE THE ORDERS TABLE
            $sql = "SELECT username, email, number FROM Orders WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $order = $row["number"];
                    $update = "UPDATE Orders SET username='$user',  email='$mail_new' WHERE number='$order'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }
            
            //UPDATE THE PC BUILD TABLE
            $sql = "SELECT username, email, number FROM Orders WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $build = $row["number"];
                    $update = "UPDATE PC_Builds SET username='$user',  email='$mail_new' WHERE number='$build'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //UPDATE THE FAVORITES TABLE
            $sql = "SELECT username, email, product_code FROM Favorites WHERE username='$user' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $code = $row["product_code"];
                    $update = "UPDATE Favorites SET username='$user',  email='$mail_new' WHERE product_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //UPDATE THE FRIENDS TABLE
            $sql = "SELECT username, email, friends_code FROM Friends WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $code = $row["friends_code"];
                    $update = "UPDATE Friends SET username='$user',  email='$mail_new' WHERE friends_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //UPDATE THE PERSONAL_INFORMATION TABLE
            $sql = "SELECT username, email, number FROM Personal_Information WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $number = $row["number"];
                    $update = "UPDATE Personal_Information SET username='$user',  email='$mail_new' WHERE number='$number'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //UPDATE TELEPHONES TABLE
            $sql = "SELECT username, email, phone_code FROM Telephones WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $code = $row["phone_code"];
                    $update = "UPDATE Telephones SET username='$user',  email='$mail_new' WHERE phone_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //UPDATE ADDRESSES TABLE
            $sql = "SELECT username, email, address_code FROM Addresses WHERE username='$username' AND email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $code = $row["address_code"];
                    $update = "UPDATE Addresses SET username='$user', email='$email' WHERE address_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //RECORD UPDATE SUCCESSFULLY
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }

            //WE SUCCESSFULY CHANGE ALL THE 'username, email' VALUES IN ALL OF THE TABLES!
            //NOW WE SHOULD unset() THE $_POST VALUES
            unset($_POST);
            //NOW WE SHOULD CHANGE THE $_SESSION["username"] and the $_SESSION["email"] values
            $_SESSION["username"] = $user;
            $_SESSION["email"] = $mail_new;
            $_POST["change"] = "change";
            //GOOD!
            //NOW WE SHOULD REFRESH THE PAGE AGAIN!
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
        <link rel="stylesheet" href="style/account-settings/username-email/form.css">
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
        <div class="main">
            <form action="" method="post" class="form" autocomplete="off">
                <div class="username">
                    <label for="username"><i class="fas fa-user"></i></label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="textbox" id="username" placeholder="Username" minlength="1" maxlength="100">
                </div>
                <div class="email">
                    <label for="email"><i class="fas fa-envelope"></i></label>
                    <input type="text" name="email" value="<?php echo $email; ?>" class="textbox" id="email" placeholder="E-mail" minlength="1" maxlength="200">
                </div>
                <?php
                    /*2 ERRORS:
                        -USER-EXISTS: *This username already exists!
                        -MAIL-EXISTS: *This email already exists!
                    */
                    if ($error[0] == "USER-EXISTS" or $error[1] == "MAIL-EXISTS") {
                        if ($error[0] == "USER-EXISTS") {
                            echo '<span id="error-message">*This username already exists!</span>';
                        } elseif ($error[1] == "MAIL-EXISTS") {
                            echo '<span id="error-message">*This e-mail already exists!</span>';
                        }
                    }
                    if (isset($_POST["change"])) {
                        unset($_POST);
                        echo '<span id="error-message">*Please refresh the page to activate the changes you have made!</span>';
                    }
                ?>
                <div class="submit-btn">
                    <button name="submit" id="submit">Change!</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    $conn->close();
?>