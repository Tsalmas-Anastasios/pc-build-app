<?php
    if (!isset($_GET["br"]) and !isset($_GET["email"])) {
        header("Location: https://pc-build-webapp.000webhostapp.com/access-denied");
    }

    

    if ($_GET["br"] == "DONE") {
        $br = "NOT NOT NOT";
    } else {
        $br = $_GET["br"];
    }
    $email = $_GET["email"];

    $sql = "SELECT * FROM opening_emails WHERE email='$email' AND number='$br'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($br == $row["number"] and $email == $row["email"]) {
                $id = $row["id"];
            }
        }
        $sql = "UPDATE opening_emails SET number='DONE' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            //////////OKKKKKKKKKK
        } else {
            echo "An unexpected server error has occured! Please try again later";
            $conn->close();
            die();
        }
        $conn->close();
    } else {
        header("Location: https://pc-build-webapp.000webhostapp.com/access-denied");
        $conn->close();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <title>PC Build App</title>
        <link rel="stylesheet" href="./access-d-styles/registration-complete/body.css">
        <link rel="stylesheet" href="./access-d-styles/registration-complete/text.css">
        <link rel="stylesheet" href="./access-d-styles/registration-complete/image.css">
        <link rel="stylesheet" href="./access-d-styles/registration-complete/footer.css">
    </head>

    <body>

        <div class="text">
            <p>Thank you for your registration for our opening!</p>
            <p>You will be updated 5 days before the opening!<p>
        </div>

        <div class="image">
            <img src="./logo/pictureForTabs.png" alt="PC Build App - Logo" class="img" />
        </div>

        <div class="footer">
            PC Build App ©
        </div>

    </body>
</html>