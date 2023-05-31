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

    

    if (isset($_POST["deleteInput"])) {
        if ($_POST["deleteInput"] == "delete") {
            $code = $_POST["code"];
            $delete = "DELETE FROM Addresses WHERE address_code='$code'";
            if ($conn->query($delete) === TRUE) {
                //RECORD DELETED SUCCESSFULLY
            } else {
                echo 'An unexpected server error has occured! Please try again later!';
                die();
            }
            unset($_POST);
            header("Refresh:0");
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
        <link rel="stylesheet" href="style/account-settings/addresses/cards.css">
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
        <div class="main" style="text-align:left;">
            <div class="add">
                <div class="address">
                    <table class="table">
                        <tr class="row">
                            <td class="card-td1">
                            <div class="card-plus">
                                <div class="image-plus">
                                    <a href="addresses-plus.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>">
                                        <div class="img">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="text">
                                    <a href="addresses-plus.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" style="text-decoration:none;cursor:pointer;color:#a6a6a6;">
                                        Add new address to use it in your orders!
                                    </a>
                                </div>
                            </div>
                            </td>
                            <?php
                                $sql = "SELECT * FROM Addresses WHERE username='$username' AND email='$email'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $javascript = 0;
                                    while($row = $result->fetch_assoc()) {
                                        $javascript++;
                                    ?>
                                        <td class="card-td<?php echo $javascript; ?>">
                                            <form action="" method="post" name="form<?php echo $javascript; ?>" id="form<?php echo $javascript; ?>">
                                                <input type="hidden" name="code" value="<?php echo $row["address_code"]; ?>">
                                                <input type="hidden" name="deleteInput" id="deleteInput<?php echo $javascript; ?>" value="">
                                                <div class="card">
                                                    <div class="options" id="menu<?php echo $javascript; ?>" style="position: absolute;display: none;">
                                                        <div class="opt">
                                                            <a onclick="ela_menu<?php echo $javascript; ?>()" style="display:inline-block;">Elaboration</a>&nbsp;&nbsp;
                                                            <div style="text-align: right;display:inline-block;">
                                                                <a onclick="close_menu<?php echo $javascript; ?>()">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                            </div>
                                                            <a onclick="delete_menu<?php echo $javascript; ?>()">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="title">
                                                        <?php echo $row["title"]; ?>
                                                        <input type="hidden" name="title" value="<?php echo $row["title"]; ?>">
                                                        <a class="ellipsis" onclick="open_menu<?php echo $javascript; ?>()"><i class="fas fa-ellipsis-v"></i></a>
                                                        <hr>
                                                    </div>
                                                    <div class="text">
                                                        <a class="info"><?php echo $row["name"]. " ". $row["surname"]; ?></a>
                                                        <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
                                                        <input type="hidden" name="surname" value="<?php echo $row["surname"]; ?>">
                                                        <a class="info"><?php echo $row["address"]. " ". $row["address_number"]; ?></a>
                                                        <input type="hidden" name="street" value="<?php echo $row["address"]; ?>">
                                                        <input type="hidden" name="addressNumber" value="<?php echo $row["address_number"]; ?>">
                                                        <a class="info"><?php echo $row["country"]; ?></a>
                                                        <input type="hidden" name="country" value="<?php echo $row["country"]; ?>">
                                                        <a class="info"><?php echo $row["city"]. ", P.C. ". $row["postal_code"]; ?></a>
                                                        <input type="hidden" name="city" value="<?php echo $row["city"]; ?>">
                                                        <input type="hidden" name="postalCode" value="<?php echo $row["postal_code"]; ?>">
                                                        <a class="info"><?php echo $row["law"]. " 's law"; ?></a>
                                                        <input type="hidden" name="law" value="<?php echo $row["law"]; ?>">
                                                        <?php
                                                            if ($row["telephone"] != NULL) {
                                                            ?>
                                                                <a class="info"><?php echo $row["telephone"]; ?></a>
                                                                <input type="hidden" name="telephone" value="<?php echo $row["telephone"] ?>">
                                                            <?php
                                                            }

                                                            if ($row["mobile"] != NULL) {
                                                            ?>
                                                                <a class="info"><?php echo $row["mobile"]; ?></a>
                                                                <input type="hidden" name="mobile" value="<?php echo $row["mobile"]; ?>">
                                                            <?php
                                                            }
                                                            
                                                            if ($row["notes"] != NULL) {
                                                            ?>
                                                                <hr>
                                                                <a class="info" style="color: #737373;font-weight: bold;">Notes:</a>
                                                                <a class="info"><?php echo $row["notes"]; ?></a>
                                                                <input type="hidden" name="notes" value="<?php echo $row["notes"]; ?>">
                                                            <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    <?php
                                    }
                                }
                            ?>       
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script>
            <?php
                for($i = 1; $i <= $javascript; $i++) {
                ?>
                    function open_menu<?php echo $i; ?>() {
                        document.getElementById("menu<?php echo $i; ?>").style.display = "block";
                    }
                    function close_menu<?php echo $i; ?>() {
                        document.getElementById("menu<?php echo $i; ?>").style.display = "none";
                    }
                    function ela_menu<?php echo $i; ?>() {
                        document.getElementById("form<?php echo $i; ?>").action = "addresses-plus.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>";
                        var submitForm = document.getElementsByName("form<?php echo $i; ?>");
                        submitForm[0].submit();
                    }
                    function delete_menu<?php echo $i; ?>() {
                        document.getElementById("deleteInput<?php echo $i; ?>").value = "delete";
                        var submitForm = document.getElementsByName("form<?php echo $i; ?>");
                        submitForm[0].submit();
                    }
                <?php
                }
            ?>
        </script>
    </body>

</html>

<?php
    $conn->close();
?>