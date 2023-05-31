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

    //IF USER WANT TO DELETE HIS PC BUILD THEN HERE SHOULD BE THERE IS THE "DISMISS" VALUE
    if (isset($_POST["dismiss"])) {
        $code = $_POST["code"];
        $sql = "DELETE FROM PC_Builds WHERE number='$code'";
        if ($conn->query($sql) === TRUE) {
            unset($_POST);
            header("Refresh:0");
        } else {
            echo 'An unexpected error occured! Please try again later!';
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
<link rel="stylesheet" href="style/error-message.css">
        <link rel="stylesheet" href="style/pc-builds/cards.css">
<link rel="stylesheet" href="style/pc-builds/modal-share.css">
<link rel="stylesheet" href="style/pc-builds/checkboxes-share.css">
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
            <?php
                $username = $_SESSION["username"];
                $email = $_SESSION["email"];
                $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Hard Gaming in 1440p'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $number_card = 0;
                    while($row = $result->fetch_assoc()) {
                        $number_card++;
                        ?>
                        <form action="" method="post" name="pcBuild<?php echo $number_card; ?>" id="pcBuild<?php echo $number_card; ?>">
                            <center><div class="pc-build-card">
                                <table class="table-structure">
                                    <tr>
                                        <td class="image-td">
                                            <div class="image-area">
                                                <img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-build-image.png" alt="Logo" class="image">
                                            </div>
                                        </td>

                                        <td class="other-td">
                                            <table class="table-general-informations">
                                            <tr>
                                                <td><b>CPU Brand:</b></td>
                                                <td><?php echo $row["cpu_brand"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Category:</b></td>
                                                <td><?php echo $row["category"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Code:</b></td>
                                                <td><?php echo $row["number"]; ?></td>
                                                <input type="hidden" name="code" value="<?php echo $row["number"]; ?>">
                                            </tr>
                                            </table>
                                            <table class="table-specs">
                                                <tr>
                                                    <th>Piece</th>
                                                    <th>Product</th>
                                                    <th>Product code</th>
                                                    <th>Price</th>
                                                </tr>
                                                <?php
                                                    $number = $row["number"];
                                                    $sql2 = "SELECT * FROM PC_Builds_part1 WHERE number='$number'";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
                                                        while($row2 = $result2->fetch_assoc()) {
                                                        ?>
                                                             <tr>
                                                                <td><?php echo $row2["cpu_piece"]; ?></td>
                                                                <td><?php echo $row2["cpu_name"]; ?></td>
                                                                <td><?php echo $row2["cpu_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["cpu_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="CPUpiece" value="<?php echo $row2["cpu_piece"]; ?>">
                                                                <input type="hidden" name="brandModelCPU" value="<?php echo $row2["cpu_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeCPU" value="<?php echo $row2["cpu_code"]; ?>">
                                                                <input type="hidden" name="PriceCPU" value="<?php echo $row2["cpu_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["cpu_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["cpu_name"];
                                                                    $code = $row2["cpu_code"];
                                                                    $sql3 = "SELECT * FROM CPU WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCPU" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="Ekptwshcpu" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categorycpu" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["mother_piece"]; ?></td>
                                                                <td><?php echo $row2["mother_name"]; ?></td>
                                                                <td><?php echo $row2["mother_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["mother_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="MotherPiece" value="<?php echo $row2["mother_piece"]; ?>">
                                                                <input type="hidden" name="brandModelMOTHER" value="<?php echo $row2["mother_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeMOTHER" value="<?php echo $row2["mother_code"]; ?>">
                                                                <input type="hidden" name="PriceMOTHER" value="<?php echo $row2["mother_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["mother_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["mother_name"];
                                                                    $code = $row2["mother_code"];
                                                                    $sql3 = "SELECT * FROM MOTHERBOARD WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMOTHER" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMOTHER" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryMOTHER" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["mother_piece"]; ?></td>
                                                                <td><?php echo $row2["mother_name"]; ?></td>
                                                                <td><?php echo $row2["mother_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["mother_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="RamPiece" value="<?php echo $row2["ram_piece"]; ?>">
                                                                <input type="hidden" name="brandModelRAM" value="<?php echo $row2["ram_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeRAM" value="<?php echo $row2["ram_code"]; ?>">
                                                                <input type="hidden" name="PriceRAM" value="<?php echo $row2["ram_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["ram_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["ram_name"];
                                                                    $code = $row2["ram_code"];
                                                                    $sql3 = "SELECT * FROM RAM WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshRAM" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshRAM" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryRAM" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["ram_piece"]; ?></td>
                                                                <td><?php echo $row2["ram_name"]; ?></td>
                                                                <td><?php echo $row2["ram_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["ram_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="GPUPiece" value="<?php echo $row2["gpu_piece"]; ?>">
                                                                <input type="hidden" name="brandModelGPU" value="<?php echo $row2["gpu_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeGPU" value="<?php echo $row2["gpu_code"]; ?>">
                                                                <input type="hidden" name="PriceGPU" value="<?php echo $row2["gpu_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["gpu_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["gpu_name"];
                                                                    $code = $row2["gpu_code"];
                                                                    $sql3 = "SELECT * FROM GPU WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshGPU" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshGPU" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryGPU" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["gpu_piece"]; ?></td>
                                                                <td><?php echo $row2["gpu_name"]; ?></td>
                                                                <td><?php echo $row2["gpu_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["gpu_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="GPUPiece" value="<?php echo $row2["gpu_piece"]; ?>">
                                                                <input type="hidden" name="brandModelGPU" value="<?php echo $row2["gpu_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeGPU" value="<?php echo $row2["gpu_code"]; ?>">
                                                                <input type="hidden" name="PriceGPU" value="<?php echo $row2["gpu_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["gpu_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["gpu_name"];
                                                                    $code = $row2["gpu_code"];
                                                                    $sql3 = "SELECT * FROM GPU WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshPGPU" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshGPU" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryGPU" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["psu_piece"]; ?></td>
                                                                <td><?php echo $row2["psu_name"]; ?></td>
                                                                <td><?php echo $row2["psu_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["psu_price"]; ?></td>
                                                            </tr>
                                                                <input type="hidden" name="PSUPiece" value="<?php echo $row2["psu_piece"]; ?>">
                                                                <input type="hidden" name="brandModelPSU" value="<?php echo $row2["psu_name"]; ?>">
                                                                <input type="hidden" name="ProductCodePSU" value="<?php echo $row2["psu_code"]; ?>">
                                                                <input type="hidden" name="PricePSU" value="<?php echo $row2["psu_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["psu_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["psu_name"];
                                                                    $code = $row2["psu_code"];
                                                                    $sql3 = "SELECT * FROM PSU WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshPSU" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshPSU" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryPSU" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["hard_piece"]; ?></td>
                                                                <td><?php echo $row2["hard_name"]; ?></td>
                                                                <td><?php echo $row2["hard_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["hard_price"]; ?></td>
                                                            </tr>
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["hard_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["hard_name"];
                                                                    $code = $row2["hard_code"];
                                                                    $sql3 = "SELECT * FROM SSD_HDD WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            $table = $row3["type"];
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <input type="hidden" name="HARDPiece" value="<?php echo $row2["hard_piece"]; ?>">
                                                                    <input type="hidden" name="brandModelHARD" value="<?php echo $row2["hard_name"]; ?>">
                                                                    <input type="hidden" name="ProductCodeHARD" value="<?php echo $row2["hard_code"]; ?>">
                                                                    <input type="hidden" name="PriceHARD" value="<?php echo $row2["hard_price"]; ?>">
                                                                    <?php
                                                                    $sql3 = "SELECT * FROM $table WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHARD" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHARD" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryHARD" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?> 
                                                            <tr class="remove-line"><td></td></tr>
                                                            <tr>
                                                                <td><?php echo $row2["case_piece"]; ?></td>
                                                                <td><?php echo $row2["case_name"]; ?></td>
                                                                <td><?php echo $row2["case_code"]; ?></td>
                                                                <td class="price"><?php echo $row2["case_price"]; ?></td>
                                                            </tr>
                                                            <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="CASEPiece" value="<?php echo $row2["case_piece"]; ?>">
                                                                <input type="hidden" name="brandModelCASE" value="<?php echo $row2["case_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeCASE" value="<?php echo $row2["case_code"]; ?>">
                                                                <input type="hidden" name="PriceCASE" value="<?php echo $row2["case_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["case_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["case_name"];
                                                                    $code = $row2["case_code"];
                                                                    $sql3 = "SELECT * FROM PCCase WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCASE" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCASE" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryCASE" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                        <?php
                                                        }
                                                    }
                                                    $sql2 = "SELECT * FROM PC_Builds_moreHardware WHERE number='$number'";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
                                                        while($row2 = $result2->fetch_assoc()) {
                                                            if ($row2["ram2_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["ram2_piece"]; ?></td>
                                                                    <td><?php echo $row2["ram2_name"]; ?></td>
                                                                    <td><?php echo $row2["ram2_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["ram2_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="RAM2Piece" value="<?php echo $row2["ram2_piece"]; ?>">
                                                                <input type="hidden" name="brandModelRAM2" value="<?php echo $row2["ram2_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeRAM2" value="<?php echo $row2["ram2_code"]; ?>">
                                                                <input type="hidden" name="PriceRAM2" value="<?php echo $row2["ram2_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["ram2_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["_name"];
                                                                    $code = $row2["_code"];
                                                                    $sql3 = "SELECT * FROM RAM WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshRAM2" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshRAM2" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryRAM2" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["hard2_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["hard2_piece"]; ?></td>
                                                                    <td><?php echo $row2["hard2_name"]; ?></td>
                                                                    <td><?php echo $row2["hard2_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["hard2_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["hard2_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["hard2_name"];
                                                                    $code = $row2["hard2_code"];
                                                                    $sql3 = "SELECT * FROM SSD_HDD WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            $table = $row3["type"];
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <input type="hidden" name="HARD2Piece" value="<?php echo $row2["hard2_piece"]; ?>">
                                                                    <input type="hidden" name="brandModelHARD2" value="<?php echo $row2["hard2_name"]; ?>">
                                                                    <input type="hidden" name="ProductCodeHARD2" value="<?php echo $row2["hard2_code"]; ?>">
                                                                    <input type="hidden" name="PriceHARD2" value="<?php echo $row2["hard2_price"]; ?>">
                                                                    <?php
                                                                    $sql3 = "SELECT * FROM $table WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHARD2" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHARD2" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryHARD2" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?> 
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                    $sql2 = "SELECT * FROM PC_Builds_part2 WHERE number='$number'";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
                                                        while($row2 = $result2->fetch_assoc()) {
                                                            if ($row2["soft_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["soft_piece"]; ?></td>
                                                                    <td><?php echo $row2["soft_name"]; ?></td>
                                                                    <td><?php echo $row2["soft_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["soft_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="SOFTPiece" value="<?php echo $row2["soft_piece"]; ?>">
                                                                <input type="hidden" name="brandModelSOFT" value="<?php echo $row2["soft_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeSOFT" value="<?php echo $row2["soft_code"]; ?>">
                                                                <input type="hidden" name="PriceSOFT" value="<?php echo $row2["soft_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["soft_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["soft_name"];
                                                                    $code = $row2["soft_code"];
                                                                    $sql3 = "SELECT * FROM TABLE WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSOFT" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSOFT" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categorySOFT" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["cooler_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["cooler_piece"]; ?></td>
                                                                    <td><?php echo $row2["cooler_name"]; ?></td>
                                                                    <td><?php echo $row2["cooler_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["cooler_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="COOLERPiece" value="<?php echo $row2["cooler_piece"]; ?>">
                                                                <input type="hidden" name="brandModelCOOLER" value="<?php echo $row2["cooler_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeCOOLER" value="<?php echo $row2["cooler_code"]; ?>">
                                                                <input type="hidden" name="PriceCOOLER" value="<?php echo $row2["cooler_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["cooler_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["cooler_name"];
                                                                    $code = $row2["cooler_code"];
                                                                    $sql3 = "SELECT * FROM CPU_COOLER WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCOOLER" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCOOLER" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryCOOLER" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["cooler_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["fan_piece"]; ?></td>
                                                                    <td><?php echo $row2["fan_name"]; ?></td>
                                                                    <td><?php echo $row2["fan_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["fan_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="FANPiece" value="<?php echo $row2["fan_piece"]; ?>">
                                                                <input type="hidden" name="brandModelFAN" value="<?php echo $row2["fan_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeFAN" value="<?php echo $row2["fan_code"]; ?>">
                                                                <input type="hidden" name="PriceFAN" value="<?php echo $row2["fan_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["fan_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["fan_name"];
                                                                    $code = $row2["fan_code"];
                                                                    $sql3 = "SELECT * FROM Fans_PCCase WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshFAN" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshFAN" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryFAN" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["monitor_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["monitor_piece"]; ?></td>
                                                                    <td><?php echo $row2["monitor_name"]; ?></td>
                                                                    <td><?php echo $row2["monitor_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["monitor_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="MONITORPiece" value="<?php echo $row2["monitor_piece"]; ?>">
                                                                <input type="hidden" name="brandModelMONITOR" value="<?php echo $row2["monitor_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeMONITOR" value="<?php echo $row2["monitor_code"]; ?>">
                                                                <input type="hidden" name="PriceMONITOR" value="<?php echo $row2["monitor_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["monitor_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["monitor_name"];
                                                                    $code = $row2["monitor_code"];
                                                                    $sql3 = "SELECT * FROM Monitor WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMONITOR" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMONITOR" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryMONITOR" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["keyb_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["keyb_piece"]; ?></td>
                                                                    <td><?php echo $row2["keyb_name"]; ?></td>
                                                                    <td><?php echo $row2["keyb_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["keyb_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="KEYBPiece" value="<?php echo $row2["keyb_piece"]; ?>">
                                                                <input type="hidden" name="brandModelKEYB" value="<?php echo $row2["keyb_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeKEYB" value="<?php echo $row2["keyb_code"]; ?>">
                                                                <input type="hidden" name="PriceKEYB" value="<?php echo $row2["keyb_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["keyb_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["keyb_name"];
                                                                    $code = $row2["keyb_code"];
                                                                    $sql3 = "SELECT * FROM Keyboard_Mouse WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshKEYB" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshKEYB" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryKEYB" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["mouse_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["mouse_piece"]; ?></td>
                                                                    <td><?php echo $row2["mouse_name"]; ?></td>
                                                                    <td><?php echo $row2["mouse_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["mouse_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="MOUSEPiece" value="<?php echo $row2["mouse_piece"]; ?>">
                                                                <input type="hidden" name="brandModelMOUSE" value="<?php echo $row2["mouse_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeMOUSE" value="<?php echo $row2["mouse_code"]; ?>">
                                                                <input type="hidden" name="PriceMOUSE" value="<?php echo $row2["mouse_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["mouse_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["mouse_name"];
                                                                    $code = $row2["mouse_code"];
                                                                    $sql3 = "SELECT * FROM Keyboard_Mouse WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMOUSE" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMOUSE" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryMOUSE" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            <?php
                                                            if ($row2["chair_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["chair_piece"]; ?></td>
                                                                    <td><?php echo $row2["chair_name"]; ?></td>
                                                                    <td><?php echo $row2["chair_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["chair_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="CHAIRPiece" value="<?php echo $row2["chair_piece"]; ?>">
                                                                <input type="hidden" name="brandModelCHAIR" value="<?php echo $row2["chair_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeCHAIR" value="<?php echo $row2["chair_code"]; ?>">
                                                                <input type="hidden" name="PriceCHAIR" value="<?php echo $row2["chair_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["chair_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["chair_name"];
                                                                    $code = $row2["chair_code"];
                                                                    $sql3 = "SELECT * FROM Chair WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCHAIR" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshCHAIR" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryCHAIR" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["speaker_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["speaker_piece"]; ?></td>
                                                                    <td><?php echo $row2["speaker_name"]; ?></td>
                                                                    <td><?php echo $row2["speaker_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["speaker_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="SPEAKERPiece" value="<?php echo $row2["speaker_piece"]; ?>">
                                                                <input type="hidden" name="brandModelSPEAKER" value="<?php echo $row2["speaker_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeSPEAKER" value="<?php echo $row2["speaker_code"]; ?>">
                                                                <input type="hidden" name="PriceSPEAKER" value="<?php echo $row2["speaker_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["speaker_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["speaker_name"];
                                                                    $code = $row2["speaker_code"];
                                                                    $sql3 = "SELECT * FROM Speakers_PC WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSPEAKER" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSPEAKER" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categorySPEAKER" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["micro_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["micro_piece"]; ?></td>
                                                                    <td><?php echo $row2["micro_name"]; ?></td>
                                                                    <td><?php echo $row2["micro_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["micro_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="MICROPiece" value="<?php echo $row2["micro_piece"]; ?>">
                                                                <input type="hidden" name="brandModelMICRO" value="<?php echo $row2["micro_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeMICRO" value="<?php echo $row2["micro_code"]; ?>">
                                                                <input type="hidden" name="PriceMICRO" value="<?php echo $row2["micro_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["micro_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["micro_name"];
                                                                    $code = $row2["micro_code"];
                                                                    $sql3 = "SELECT * FROM Microphone_PC WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMICRO" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshMICRO" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryMICRO" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["header_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["header_piece"]; ?></td>
                                                                    <td><?php echo $row2["header_name"]; ?></td>
                                                                    <td><?php echo $row2["header_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["header_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="HEADERPiece" value="<?php echo $row2["header_piece"]; ?>">
                                                                <input type="hidden" name="brandModelHEADER" value="<?php echo $row2["header_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeHEADER" value="<?php echo $row2["header_code"]; ?>">
                                                                <input type="hidden" name="PriceHEADER" value="<?php echo $row2["header_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["header_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["header_name"];
                                                                    $code = $row2["header_code"];
                                                                    $sql3 = "SELECT * FROM Gaming_Headset WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHEADER" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshHEADER" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryHEADER" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["ups_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["ups_piece"]; ?></td>
                                                                    <td><?php echo $row2["ups_name"]; ?></td>
                                                                    <td><?php echo $row2["ups_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["ups_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="UPSPiece" value="<?php echo $row2["ups_piece"]; ?>">
                                                                <input type="hidden" name="brandModelUPS" value="<?php echo $row2["ups_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeUPS" value="<?php echo $row2["ups_code"]; ?>">
                                                                <input type="hidden" name="PriceUPS" value="<?php echo $row2["ups_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["ups_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["ups_name"];
                                                                    $code = $row2["ups_code"];
                                                                    $sql3 = "SELECT * FROM UPS WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshUPS" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshUPS" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryUPS" value="---">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                    $sql2 = "SELECT * FROM PC_Builds_part3 WHERE number='$number'";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
                                                        while($row2 = $result2->fetch_assoc()) {
                                                            if ($row2["ledPC_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["ledPC_piece"]; ?></td>
                                                                    <td><?php echo $row2["ledPC_name"]; ?></td>
                                                                    <td><?php echo $row2["ledPC_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["ledPC_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="LEDPCPiece" value="<?php echo $row2["ledPC_piece"]; ?>">
                                                                <input type="hidden" name="brandModelLEDPC" value="<?php echo $row2["ledPC_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeLEDPC" value="<?php echo $row2["ledPC_code"]; ?>">
                                                                <input type="hidden" name="PriceLEDPC" value="<?php echo $row2["ledPC_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["ledPC_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["ledPC_name"];
                                                                    $code = $row2["ledPC_code"];
                                                                    $sql3 = "SELECT * FROM Led_PC WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshLEDPC" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshLEDPC" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryLEDPC" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["ledDESK_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["ledDesk_piece"]; ?></td>
                                                                    <td><?php echo $row2["ledDesk_name"]; ?></td>
                                                                    <td><?php echo $row2["ledDesk_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["ledDesk_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="LEDDESKPiece" value="<?php echo $row2["ledDesk_piece"]; ?>">
                                                                <input type="hidden" name="brandModelLEDDESK" value="<?php echo $row2["ledDesk_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeLEDDESK" value="<?php echo $row2["ledDesk_code"]; ?>">
                                                                <input type="hidden" name="PriceLEDDESK" value="<?php echo $row2["ledDesk_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["ledDesk_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["ledDesk_name"];
                                                                    $code = $row2["ledDesk_code"];
                                                                    $sql3 = "SELECT * FROM Led_Desk WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshLEDDESK" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshLEDDESK" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryLEDDESK" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["optical_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["optical_piece"]; ?></td>
                                                                    <td><?php echo $row2["optical_name"]; ?></td>
                                                                    <td><?php echo $row2["optical_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["optical_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="OPTICALPiece" value="<?php echo $row2["optical_piece"]; ?>">
                                                                <input type="hidden" name="brandModelOPTICAL" value="<?php echo $row2["optical_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeOPTICAL" value="<?php echo $row2["optical_code"]; ?>">
                                                                <input type="hidden" name="PriceOPTICAL" value="<?php echo $row2["optical_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["optical_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["optical_name"];
                                                                    $code = $row2["optical_code"];
                                                                    $sql3 = "SELECT * FROM Optical_drives WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshOPTICAL" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshOPTICAL" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryOPTICAL" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["sound_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["sound_piece"]; ?></td>
                                                                    <td><?php echo $row2["sound_name"]; ?></td>
                                                                    <td><?php echo $row2["sound_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["sound_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="SOUNDPiece" value="<?php echo $row2["sound_piece"]; ?>">
                                                                <input type="hidden" name="brandModelSOUND" value="<?php echo $row2["sound_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeSOUND" value="<?php echo $row2["sound_code"]; ?>">
                                                                <input type="hidden" name="PriceSOUND" value="<?php echo $row2["sound_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["sound_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["sound_name"];
                                                                    $code = $row2["sound_code"];
                                                                    $sql3 = "SELECT * FROM Sound_Cards WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSOUND" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSOUND" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categorySOUND" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["print_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["print_piece"]; ?></td>
                                                                    <td><?php echo $row2["print_name"]; ?></td>
                                                                    <td><?php echo $row2["print_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["print_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="PRINTPiece" value="<?php echo $row2["print_piece"]; ?>">
                                                                <input type="hidden" name="brandModelPRINT" value="<?php echo $row2["print_name"]; ?>">
                                                                <input type="hidden" name="ProductCodePRINT" value="<?php echo $row2["print_code"]; ?>">
                                                                <input type="hidden" name="PricePRINT" value="<?php echo $row2["print_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["print_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["print_name"];
                                                                    $code = $row2["print_code"];
                                                                    $sql3 = "SELECT * FROM Printers WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshPRINT" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshPRINT" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryPRINT" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["scan_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["scan_piece"]; ?></td>
                                                                    <td><?php echo $row2["scan_name"]; ?></td>
                                                                    <td><?php echo $row2["scan_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["scan_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="SCANPiece" value="<?php echo $row2["scan_piece"]; ?>">
                                                                <input type="hidden" name="brandModelSCAN" value="<?php echo $row2["scan_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeSCAN" value="<?php echo $row2["scan_code"]; ?>">
                                                                <input type="hidden" name="PriceSCAN" value="<?php echo $row2["scan_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["scan_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["scan_name"];
                                                                    $code = $row2["scan_code"];
                                                                    $sql3 = "SELECT * FROM TABLE WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSCAN" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshSCAN" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categorySCAN" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                            if ($row2["blue_name"] != NULL) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2["blue_piece"]; ?></td>
                                                                    <td><?php echo $row2["blue_name"]; ?></td>
                                                                    <td><?php echo $row2["blue_code"]; ?></td>
                                                                    <td class="price"><?php echo $row2["blue_price"] ?></td>
                                                                </tr>
                                                                <tr class="remove-line"><td></td></tr>
                                                                <input type="hidden" name="BLUEPiece" value="<?php echo $row2["blue_piece"]; ?>">
                                                                <input type="hidden" name="brandModelBLUE" value="<?php echo $row2["blue_name"]; ?>">
                                                                <input type="hidden" name="ProductCodeBLUE" value="<?php echo $row2["blue_code"]; ?>">
                                                                <input type="hidden" name="PriceBLUE" value="<?php echo $row2["blue_price"]; ?>">
                                                                <?php
                                                                    $x = 0;
                                                                    $explode = explode(' ', $row2["blue_name"]);
                                                                    foreach($explode as $explode) {
                                                                        if ($x = 0) {
                                                                            $x++;
                                                                            $brand = $explode;
                                                                        }
                                                                    }
                                                                    $model = $row2["blue_name"];
                                                                    $code = $row2["blue_code"];
                                                                    $sql3 = "SELECT * FROM Bluetooth_Adapters WHERE Brand='$brand' AND Model LIKE '%$model%' AND ProductCode='$code'";
                                                                    $result3 = $conn->query($sql3);
                                                                    if ($result3->num_rows > 0) {
                                                                        while($row3 = $result3->fetch_assoc()) {
                                                                            if ($row3["PriceEkptwsh"] == "" or $row3["PriceEkptwsh"] == 0 or $row3["PriceEkptwsh"] == NULL) {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshBLUE" value="">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <input type="hidden" name="EkptwshBLUE" value="<?php echo $row3["PriceEkptwsh"]; ?>">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" name="categoryBLUE" value="<?php echo $row3["category"] ?>">
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </table>
                                            <div class="button-area">
                                                <button class="dismiss" name="dismiss">Dismiss</button>
                                                <button class="buy-it" name="buyIt">Buy it!</button>
                                                <button type="button" class="buy-it" onclick="change_action<?php echo $number_card; ?>()">Change</button>
                                                <button type="button" class="buy-it" onclick="openModal_share<?php echo $number_card; ?>()"><i class="fas fa-share-alt"></i> Share</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div></center>
                        </form>
                        
                        <div class="modal-share" id="modal_share<?php echo $number_card; ?>" style="display: none;">
                            <div class="content" id="content<?php echo $number_card; ?>" style="display: block;"> 
                                <div class="apps-share">
                                    <a onclick="choose_a_friend<?php echo $number_card; ?>()"><img src="../Pictures/send-to-friends-icon.png" title="Share with your PC Build App friends" alt="share with friends" class="friends"></a>
                                    <a title="Copy PC Build link" onclick="copy_link<?php echo $number_card; ?>_fun()"><img src="../Pictures/copy-icon.png" alt="copy link" class="copy"></a>
                                    <center><input type="text" id="copy_link<?php echo $number_card; ?>" class="copied-link" value="<?php echo 'https://pc-build-webapp.000webhostapp.com/share/pc-builds-share.php?pcbuild='. $row["number"]; ?>"></center>
                                </div>
                                <button onclick="openModal_share<?php echo $number_card; ?>()" class="close"><i class="fas fa-times"></i> Close share</button>
                            </div>
                            <div class="choose-friends" id="choose_friends<?php echo $number_card; ?>" style="display: none;">
                                <a class="back" onclick="back_to_main<?php echo $number_card; ?>()"><i class="fas fa-arrow-left"></i></a>
                                <div class="friends">
                                    <!--FRIENDS LIST-->
                                    <?php
                                        $sql2 = "SELECT *  FROM Friends WHERE username='$username' AND email='$email'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            $friends = 1;
                                            while($row2 = $result2->fetch_assoc()) {
                                            ?>
                                                <label class="friend"><?php echo $row2["f_username"]; ?>
                                                    <input type="checkbox">
                                                    <span class="friend-check"></span>
                                                </label>
                                            <?php
                                            }
                                        } else {
                                            $friends = 0;
                                            echo '<div style="text-align: center;"><a style="font-size: 22px;text-align:center;color:#1a0033fa;margin-bottom:20px;">Find your friends to share your PC Build!</a></div>';
                                        }
                                    ?>
                                    <!--FRIENDS LIST-->
                                </div>
                                <?php
                                    if ($friends == 1) {
                                        echo '<button class="send">Send it! <i class="fas fa-paper-plane"></i></button>';
                                    } else {
                                        echo '<a href="friends.php"><button class="send">Find friends! <i class="fas fa-user-friends"></i></button></a>';
                                    }
                                ?>
                            </div>
                        </div>

                        <script>
                            function change_action<?php echo $number_card; ?>() {
                                document.getElementById("pcBuild<?php echo $number_card; ?>").action = "../../Pages/PCBuilderPCBuild";
                                var submitForm = document.getElementsByName('pcBuild<?php echo $number_card; ?>');
                                submitForm[0].submit();
                            }
                            function openModal_share<?php echo $number_card; ?>() {
                                if (document.getElementById("modal_share<?php echo $number_card; ?>").style.display == "none") {
                                    document.getElementById("modal_share<?php echo $number_card; ?>").style.display = "block";
                                    document.documentElement.style.visibility = "hidden";
                                    document.getElementById("modal_share<?php echo $number_card; ?>").style.visibility = "visible";
                                    document.documentElement.style.background = "#f3f3f3";
                                } else {
                                    document.getElementById("modal_share<?php echo $number_card; ?>").style.display = "none";
                                    document.documentElement.style.visibility = "visible";
                                    document.getElementById("modal_share<?php echo $number_card; ?>").style.visibility = "hidden";
                                    document.documentElement.style.background = "#fff";
                                }
                            }
                            
                            function copy_link<?php echo $number_card; ?>_fun() {
                                var copyText = document.getElementById("copy_link<?php echo $number_card; ?>");
                                copyText.select();
                                copyText.setSelectionRange(0, 99999);
                                document.execCommand("copy");
                            }
                            
                            function choose_a_friend<?php echo $number_card; ?>() {
                                document.getElementById("content<?php echo $number_card; ?>").style.display = "none";
                                document.getElementById("choose_friends<?php echo $number_card; ?>").style.display = "block";
                            }
                            
                            function back_to_main<?php echo $number_card; ?>() {
                                document.getElementById("content<?php echo $number_card; ?>").style.display = "block";
                                document.getElementById("choose_friends<?php echo $number_card; ?>").style.display = "none";
                            }
                        </script>
                        <?php
                    }
                }
            ?>
        </div>
        <?php
            $conn->close();
        ?>
    </body>
</html>