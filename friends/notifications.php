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

    $username = $_SESSION["username"];
    $email = $_SESSION["email"];

    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <title>Friends-Notifications</title>
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="js/search-bar/search-bar-menu-display.js"></script>
		<script src="js/search-bar/search-bar-menu.js"></script>
        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
        <!--STYLESHEET FOR NAVBAR-->
        <link rel="stylesheet" href="style/navbar.css">
		<link rel="stylesheet" href="style/header.css">
		<link rel="stylesheet" href="style/search-bar.css">
        <!--STYLESHEET FOR NAVBAR-->
        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }
        </style>
    </head>

    <body>

    </body>
</html>

<?php
    $conn->close();
?>