<?php
    $error_into = FALSE;
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
        if ($_POST["day"] != "" and $_POST["month"] != "" and $_POST["year"] != "" and isset($_POST["sex"])) {
            $error_into = FALSE;
            $find = FALSE;
            $day = $_POST["day"];
            $month = $_POST["month"];
            $year = $_POST["year"];
            $sex = $_POST["sex"];
            if (isset($_POST["code"])) {
                $code = $_POST["code"];
                $sql = "SELECT * FROM Personal_Information WHERE number='$code'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $find = TRUE;
                }
            }
            if ($find === TRUE) {
                //HERE SHOULD BE UPDATED
                $sql = "UPDATE Personal_Information SET day_birth='$day', month_birth='$month', year_birth='$year', sex='$sex' WHERE number='$code'";
                if ($conn->query($sql) === TRUE) {
                    unset($_POST["submit"]);
                    unset($_POST["day"]);
                    unset($_POST["month"]);
                    unset($_POST["year"]);
                    unset($_POST["sex"]);
                    header("Refresh:0");
                } else {
                    echo 'An interrupted server error has occured. Please try again later!';
                    die();
                }
            } else {
                //HERE SHOULD BE INSERTED
                $check = TRUE;
                do {
                    $rand = uniqid();
                    $x = 0;
                    $sql = "SELECT * FROM Personal_Information";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row["number"] == $rand) {
                                $x++;
                            }
                        }
                    }
                    if ($x == 0) {
                        //WE FOUND THE RAND NUMBER!!!
                        $check = FALSE;
                    } else {
                        $rand = uniqid();
                    }
                } while ($check === TRUE);

                $sql = "INSERT INTO Personal_Information (username, email, day_birth, month_birth, year_birth, sex, number)
                        VALUES ('$username', '$email', '$day', '$month', '$year', '$sex', '$rand')";
                if ($conn->query($sql) === TRUE) {
                    unset($_POST["submit"]);
                    unset($_POST["day"]);
                    unset($_POST["month"]);
                    unset($_POST["year"]);
                    unset($_POST["sex"]);
                } else {
                    echo 'An interrupted server error has occured. Please try again later!';
                    die();
                }
            }
        } else {
            $error_into = TRUE;
            //Here is the array with errors!
            $errors = array("", "", "", "");        //array("DAY", "MONTH", "YEAR", "SEX")
            if ($_POST["day"] == "") {
                $errors[0] = "DAY";
            }
            if ($_POST["month"] == "") {
                $errors[1] = "MONTH";
            }
            if ($_POST["year"] == "") {
                $errors[2] = "YEAR";
            }
            if (!isset($_POST["sex"])) {
                $errors[3] = "SEX";
            }
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
        <link rel="stylesheet" href="style/account-settings/personal-information/option-boxes.css">
        <link rel="stylesheet" href="style/account-settings/personal-information/style.css">
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
            <div class="information" style="text-align: left;">
                <form action="" method="post" autocomplete="off" onsubmit="return submit_fun()">
                    <button type="button" class="button-info" onclick="date_open()">Date of birth</button>
                    <div class="years" id="year" style="display:none;">
                        <?php
                            $day_birth = "";
                            $month_birth = "";
                            $year_birth = "";
                            $sex = "";
                            $code = "";
                            $sql = "SELECT * FROM Personal_Information WHERE username='$username' AND email='$email'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $day_birth = $row["day_birth"];
                                    $month_birth = $row["month_birth"];
                                    $year_birth = $row["year_birth"];
                                    $sex = $row["sex"];
                                    $code = $row["number"];
                                }
                            }
                            if ($code != "") {
                            ?>
                                <input type="hidden" name="code" value="<?php echo $code; ?>">
                            <?php
                            }
                        ?>
                        <input type="text" name="day" placeholder="DD" required class="text-day" maxlength="2" minlength="1"  id="day_text" onchange="change_values()" value="<?php echo $day_birth; ?>">
                        /
                        <input type="text" name="month" placeholder="MM" required class="text-month" maxlength="2" minlength="1" id="month_text" onchange="change_values()" value="<?php echo $month_birth; ?>">
                        /
                        <input type="text" name="year" placeholder="YYYY" required class="text-year" pattern="\d{4}" maxlength="4" id="year_text" onchange="change_values()" value="<?php echo $year_birth; ?>">
                        <span id="error_message1"></span>
                        <?php
                            if ($error_into == TRUE) {
                                if ($errors[0] != "") {
                                    //WE Don't have the day!
                                    echo '<span style="display: block;color: #ff0000;margin-top: 8px;font-size: 12px;">*Fill out the day field</span>';
                                }
                                if ($errors[1] != "") {
                                    //WE Don't have the month!
                                    echo '<span style="display: block;color: #ff0000;margin-top: 8px;font-size: 12px;">*Fill out the month field</span>';
                                }
                                if ($errors[2] != "") {
                                    //WE Don't have the year!
                                    echo '<span style="display: block;color: #ff0000;margin-top: 8px;font-size: 12px;">*Fill out the year field</span>';
                                }
                            }
                        ?>
                    </div>
                    <button type="button" class="button-info" onclick="sex_open()">Sex</button>
                    <div class="sex-element" id="sex_element" style="display:none;">
                        <!--Male or Female-->
                        <label class="sex-choose">Male
                            <input type="radio" name="sex" id="male" onclick="change_value_radio()" value="Male"
                            <?php
                                if ($sex == "Male") {
                                    echo ' checked="checked"';
                                }
                            ?>
                            >
                            <span class="sex-choose-checkmark"></span>
                        </label>
                        <label class="sex-choose">Female
                            <input type="radio" name="sex" id="female" onclick="change_value_radio()" value="Female"
                            <?php
                                if ($sex == "Female") {
                                    echo ' checked="checked"';
                                }
                            ?>
                            >
                            <span class="sex-choose-checkmark"></span>
                        </label>
                        <span id="message_error2"></span>
                        <?php
                            if ($error_into == TRUE) {
                                if ($errors[3] != "") {
                                    echo '<span style="display: block;color: #ff0000;margin-top: 8px;font-size: 12px;">*Please choose your sex</span>';
                                }
                            }
                        ?>
                    </div>
                    <div class="button-save" id="button_save" style="display:none;">
                        <button class="save-changes" name="submit" onclick="return submit_fun()">Save changes!</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="js/account-settings/personal-information/script.js"></script>
    </body>
</html>


<?php
    $conn->close();
?>