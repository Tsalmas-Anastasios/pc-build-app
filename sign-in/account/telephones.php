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

    

    //SUBMIT THE FORM BELLOW
    if (isset($_POST["submit"])) {
        $else = TRUE;
        $mobile = $_POST["mobile"];
        $tele = $_POST["tele"];
        if ($tele == "") {
            $tele = NULL;
        }
        $sql = "SELECT * FROM Telephones WHERE username='$username' AND email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //WE FOUND SOME RECORDS! LETS UPDATE ALL OF THEM!
            while($row = $result->fetch_assoc()) {
                if ($row["tele_type"] == "Mobile") {
                    //UPDATE THE MOBILE STATE
                    $code = $row["phone_code"];
                    $update = "UPDATE Telephones SET phone='$mobile' WHERE phone_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //OK. CONTINUE!
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                } elseif ($row["tele_type"] == "Telephone") {
                    //UPDATE THE TELEPHONE STATE
                    $code = $row["phone_code"];
                    $update = "UPDATE Telephones SET phone='$tele' WHERE phone_code='$code'";
                    if ($conn->query($update) === TRUE) {
                        //OK. CONTINUE!
                    } else {
                        echo 'An unexpected server error has occured! Please try again later!';
                        die();
                    }
                }
            }
        } else {
            //WE DON'T FOUND ANY RECORD! LETS INSERT ALL DATA INTO THE TABLE
            $check = TRUE;
            do {
                $rand = uniqid();
                $x = 0;
                $sql = "SELECT phone_code FROM Telephones";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["phone_code"] == $rand) {
                            $x++;
                        }
                    }
                }
                if ($x == 0) {
                    //WE FOUND THE RAND NUMBER
                    $check = FALSE;
                } else {
                    $rand = uniqid();
                }
            } while ($check === TRUE);

            $sql = "INSERT INTO Telephones (username, email, tele_type, phone, phone_code)
                    VALUES ('$username', '$email', 'Mobile', '$mobile', '$rand')";
            if ($conn->query($sql) === TRUE) {
                //NEW MOBILE PHONE INSERTED SUCCESSFULLY
            } else {
                echo 'An unexpected server error has occured! Please try again later!';
                die();
            }

            if ($tele != NULL) {
                //WE HAVE TELEPHONE! LETS INSERT IT!
                $else = FALSE;
                $check = TRUE;
                do {
                    $rand = uniqid();
                    $x = 0;
                    $sql = "SELECT phone_code FROM Telephones";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row["phone_code"] == $rand) {
                                $x++;
                            }
                        }
                    }
                    if ($x == 0) {
                        //WE FOUND THE RAND NUMBER
                        $check = FALSE;
                    } else {
                        $rand = uniqid();
                    }
                } while ($check === TRUE);

                $sql = "INSERT INTO Telephones (username, email, tele_type, phone, phone_code)
                        VALUES ('$username', '$email', 'Telephone', '$tele', '$rand')";
                if ($conn->query($sql) === TRUE) {
                    //NEW MOBILE PHONE INSERTED SUCCESSFULLY
                } else {
                    echo 'An unexpected server error has occured! Please try again later!';
                    die();
                }
            }
        }
        if ($else == TRUE and $tele != NULL) {
            //HERE WE SHOULD INSTERT THE TELEPHONE 'CAUSE WE HAVE IT AND IT ISN'T INSERTED IN YET!
            $else = FALSE;
            $check = TRUE;
            do {
                $rand = uniqid();
                $x = 0;
                $sql = "SELECT phone_code FROM Telephones";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["phone_code"] == $rand) {
                            $x++;
                        }
                    }
                }
                if ($x == 0) {
                    //WE FOUND THE RAND NUMBER
                    $check = FALSE;
                } else {
                    $rand = uniqid();
                }
            } while ($check === TRUE);

            $sql = "INSERT INTO Telephones (username, email, tele_type, phone, phone_code)
                    VALUES ('$username', '$email', 'Telephone', '$tele', '$rand')";
            if ($conn->query($sql) === TRUE) {
                //NEW MOBILE PHONE INSERTED SUCCESSFULLY
            } else {
                echo 'An unexpected server error has occured! Please try again later!';
                die();
            }
        }
        unset($_POST);
        header("Refresh:0");
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
        <link rel="stylesheet" href="style/account-settings/telephones/form.css">
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
        <form action="" method="post" class="form" autocomplete="off">
            <div class="mobile">
                <label for="mobile" class="label"><i class="fas fa-mobile"></i></label>
                <input type="tel" name="mobile" id="mobile" class="text-box" required placeholder="69********" pattern="\d{10}" maxlength="10" 
                    <?php
                        $sql = "SELECT phone FROM Telephones WHERE username='$username' AND email='$email' AND tele_type='Mobile'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo 'value="'. $row["phone"]. '"';
                            }
                        }
                    ?>
                >
            </div>
            <div class="tele">
                <label for="tele" class="label"><i class="fas fa-phone-alt"></i></label>
                <input type="tel" name="tele" id="tele" class="text-box" pattern="\d{10}" placeholder="Telephone" maxlength="10"
                    <?php
                        $sql = "SELECT phone FROM Telephones WHERE username='$username' AND email='$email' AND tele_type='Telephone'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo 'value="'. $row["phone"]. '"';
                            }
                        }
                    ?>
                >
            </div>
            <div class="submit-btn">
                <button class="submit" name="submit" id="submit">Save</button>
            </div>
        </form>
    </body>

</html>
<?php
    $conn->close();
?>