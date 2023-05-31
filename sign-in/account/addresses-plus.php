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

    

    if (isset($_POST["add"])) {
        $title = $_POST["title"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $street = $_POST["street"];
        $street_number = $_POST["addressNumber"];
        $country = $_POST["country"];
        $city = $_POST["city"];
        $postal = $_POST["postalCode"];
        $law = $_POST["law"];
        $telephone = $_POST["telephone"];
        $mobile = $_POST["mobile"];
        $notes = $_POST["notes"];
        if (isset($_POST["code"])) {
            //HERE WE SHOULD UPDATE THE ADDRESS THAT WE HAVE
            $code = $_POST["code"];
            $update = "UPDATE Addresses SET title='$title', name='$name', surname='$surname', address='$street', address_number='$street_number', country='$country', city='$city', postal_code='$postal', law='$law', telephone='$telephone', mobile='$mobile', notes='$notes' WHERE address_code='$code'";
            if ($conn->query($update) === TRUE) {
                //RECORD UPDATE SUCCESSFULL!
            } else {
                echo 'An unexpected server error occured! Please try again later!';
                die();
            }
        } else {
            //HERE WE SHOULD ADD A NEW ADDRESS
            $check = TRUE;
            do {
                $code = uniqid();
                $x = 0;
                $sql = "SELECT phone_code FROM Telephones";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["phone_code"] == $code) {
                            $x++;
                        }
                    }
                }
                if ($x == 0) {
                    //WE FOUND THE RAND NUMBER
                    $check = FALSE;
                } else {
                    $code = uniqid();
                }
            } while ($check === TRUE);

            $sql = "INSERT INTO Addresses (username, email, title, name, surname, address, address_number, country, city, postal_code, law, telephone, mobile, notes, address_code)
                    VALUES ('$username', '$email', '$title', '$name', '$surname', '$street', '$street_number', '$country', '$city', '$postal', '$law', '$telephone', '$mobile', '$notes', '$code')";
            if ($conn->query($sql) === TRUE) {
                //RECORD INSERTED SUCCESFULLY
            } else {
                echo 'An unexpected server error has occured! Try again later!';
                die();
            }
        }
        header("Location: addresses.php?user=$username&email=$email");
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
        <link rel="stylesheet" href="style/account-settings/addresses/form-add.css">
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
        <div class="add">
            <div class="form">
                <div class="title">
                    Add a new address
                </div>
                <div class="title-explain">
                    Your address is used to improve your expirience in PC Build App and for your orders!
                </div>
                <form action="" method="post" id="new_address">
                    <?php
                        if (isset($_POST["code"])) {
                        ?>
                            <input type="hidden" name="code" value="<?php echo $_POST["code"]; ?>">
                        <?php
                        }
                    ?>
                    <!--HIDDEN INPUT FOR ADDING-->
                    <input type="hidden" name="add" value="add">
                    <!--HIDDEN INPUT FOR ADDING-->
                    <!--ADDRESS TITLE-->
                    <input type="text" name="title"
                        <?php
                            if (isset($_POST["title"])) {
                                echo ' value="'. $_POST["title"]. '"';
                            }
                        ?>
                    placeholder="Address title" maxlength="500" minlength="1" required class="text-title" autocomplete="rutjfkde">
                    <!--NAME-->
                    <input type="text" name="name"
                        <?php
                            if (isset($_POST["name"])) {
                                echo ' value="'. $_POST["name"]. '"';
                            }
                        ?>
                    placeholder="Name" maxlength="100" minlength="1" class="text-name" required>
                    <!--SURNAME-->
                    <input type="text" name="surname"
                        <?php
                            if (isset($_POST["surname"])) {
                                echo ' value="'. $_POST["surname"]. '"';
                            }
                        ?>
                    placeholder="Surname" maxlength="100" minlength="1" class="text-surname" required>
                    <!--STREET-->
                    <input type="text" name="street"
                        <?php
                            if (isset($_POST["street"])) {
                                echo ' value="'. $_POST["street"]. '"';
                            }
                        ?>
                    placeholder="Street" maxlength="100" minlength="1" class="text-street" required>
                    <!--STREET NUMBER-->
                    <input type="text" name="addressNumber"
                        <?php
                            if (isset($_POST["addressNumber"])) {
                                echo ' value="'. $_POST["addressNumber"]. '"';
                            }
                        ?>
                    placeholder="Street number" maxlength="5" minlength="1" class="text-number" required>
                    <!--COUNTRY SELECT-->
                    <select id="country" name="country" class="text-country" onchange="select()" required>
                        
                        <?php
                            if (isset($_POST["country"])) {
                                $country = $_POST["country"];
                            ?>
                                <option value="<?php echo $_POST["country"]; ?>"><?php echo $_POST["country"]; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="" disabled selected hidden>Choose country...</option>
                            <?php
                            }
                            
                            $sql = "SELECT * FROM Ship_countries";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    if ($row["country"] != $country) {
                                ?>
                                        <option value="<?php echo $row["country"]; ?>"><?php echo $row["country"]; ?></option>
                                <?php
                                    }
                                }
                            }
                        ?>
                    </select>
                    <!--CITY-->
                    <input type="text" name="city"
                        <?php
                            if (isset($_POST["city"])) {
                                echo ' value="'. $_POST["city"]. '"';
                            }
                        ?>
                    placeholder="City" maxlength="200" minlength="1" class="text-city" required>
                    <!--POSTAL CODE-->
                    <input type="text" name="postalCode"
                        <?php
                            if (isset($_POST["postalCode"])) {
                                echo ' value="'. $_POST["postalCode"]. '"';
                            }
                        ?>
                    placeholder="Postal Code" maxlength="15" minlength="1" class="text-postal" required>
                    <!--LAW SELECT-->
                    <?php
                        $sql = "SELECT * FROM Ship_countries";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $country = strtolower($row["country"]);
                            ?>
                                <select id="law<?php echo $country; ?>" name="law" class="text-law" required
                                <?php
                                    if (strtolower($row["country"]) == "greece") {
                                        echo ' style="display:block;"';
                                    } else {
                                        echo ' style="display:none;"';
                                    }
                                ?>
                                >
                                <?php
                                    if (isset($_POST["law"])) {
                                        $law = $_POST["law"];
                                    ?>
                                        <option value="<?php echo $_POST["law"]; ?>"><?php echo $_POST["law"]; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="" disabled selected hidden>Choose law...</option>
                                    <?php
                                    }
                                    
                                    $code = $row["country_id"];
                                    $sql2 = "SELECT * FROM Ship_laws WHERE country_id='$code' ORDER BY law";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                            if ($row2["law"] != $law) {   
                                        ?>
                                                <option value="<?php echo $row2["law"] ?>"><?php echo $row2["law"]; ?></option>
                                        <?php
                                            }
                                        }
                                    }
                            ?>
                                </select>
                            <?php
                            }
                        }
                    ?>
                    <!--TELEPHONE-->
                    <input type="tel" name="telephone"
                        <?php
                            if (isset($_POST["telephone"])) {
                                echo ' value="'. $_POST["telephone"]. '"';
                            }
                        ?>
                    placeholder="Telephone (optional)" maxlength="10" pattern="\d{10}" class="text-tele">
                    <!--MOBILE-->
                    <input type="tel" name="mobile"
                        <?php
                            if (isset($_POST["mobile"])) {
                                echo ' value="'. $_POST["mobile"]. '"';
                            }
                        ?>
                    placeholder="Mobile (optional)" maxlength="10" pattern="\d{10}" class="text-mobile">
                    <!--NOTES-->
                    <?php
                        if (isset($_POST["notes"])) {
                            echo '<textarea name="notes" rows="4" form="new_address" placeholder="Notes (optional)" class="text-notes">';
                            echo $_POST["notes"];
                            echo '</textarea>';
                        } else {
                            echo '<textarea name="notes" rows="4" form="new_address" placeholder="Notes (optional)" class="text-notes"></textarea>';
                        }
                    ?>
                    <!--<span id="error-message">*You made an error!</span>-->
                    
                    <?php
                        if (isset($_POST["code"])) {
                        ?>
                            <button name="submit" class="submit">Update!</button>
                        <?php
                        } else {
                        ?>
                            <button name="submit" class="submit">Create!</button>
                        <?php
                        }
                    ?>
                </form>
            </div>
        </div>

        <script>
            function select() {
                <?php
                    $sql = "SELECT * FROM Ship_countries";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 'var law'. strtolower($row["country"]). ' = "'. $row["country"]. '";';
                        }
                    }

                    $sql = "SELECT * FROM Ship_countries";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 'var '. strtolower($row["country"]). ' = "'. $row["country"]. '";';
                        ?>
                        if (document.getElementById("country").value == <?php echo strtolower($row["country"]); ?>) {
                            <?php
                                $sql2 = "SELECT * FROM Ship_countries";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    while($row2 = $result2->fetch_assoc()) {
                                        if (strtolower($row2["country"]) == strtolower($row["country"])) {
                                        ?>
                                            document.getElementById(<?php echo 'law'. strtolower($row["country"]); ?>).style.display = "block";
                                        <?php
                                        } else {
                                        ?>
                                            document.getElementById(<?php echo 'law'. strtolower($row["country"]); ?>).style.display = "none";
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        }
                        <?php
                        }
                    }
                ?>

                
            }
        </script>

    </body>
</html>

<?php
    $conn->close();
?>