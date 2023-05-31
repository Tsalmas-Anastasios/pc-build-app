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

    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <TITLE>PC Build App | <?php echo $_SESSION["username"]; ?> - Account Dashboard</TITLE>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="account/style/sidebar.css">
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>

        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }
        </style>
    </head>

    <body LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0">
        <div class="icon-open-sidebar" id="icon_open_sidebar"><a onclick="sidebar_block()">&#9776; Choices</a></a></div>
            <div class="sidebar" id="sidebar">
                <div><a id="close_sidebar" class="close-sidebar" onclick="close_sidebar_fun()"><i class="fas fa-times"></i></a></div>
                <div id="br-after-close-button" style="visibility: hidden;"><br>br<br></div>
                <div class="account">
                    <table>
                        <tr>
                            <td><img src="../Pictures/user.png" class="image"></td>
                            <td><a class="username"><?php echo $_SESSION["username"]; ?></a></td>
                        </tr>
                    </table>
                </div><hr class="account-hr">

                <!--USER INFO-->
                <?php
                    $username = $_SESSION["username"];
                    $email = $_SESSION["email"];
                ?>
                <!--USER INFO-->

                <!--ORDERS-->
                <?php
                    $sql = "SELECT * FROM Orders WHERE username='$username' AND email='$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <a class="category link-iframe" onclick="orders();sidebar_block()" href="account/orders.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame"><i class='fas fa-caret-down'></i> Orders</a>
                    <?php
                        $sql = "SELECT * FROM Orders WHERE username='$username' AND email='$email' AND order_condition='Saved'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <a class="sub-category link-iframe" onclick="sidebar_block()" id="saved_orders" style="display:none;" href="account/saved-orders.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Saved Orders</a>
                        <?php
                        } else {
                        ?>
                            <a class="sub-category link-iframe" id="saved_orders" style="display:none;color: #b3b3b3;">- Saved Orders</a>
                        <?php
                        }
                        $sql = "SELECT * FROM Orders WHERE username='$username' AND email='$email' AND order_condition='Placed'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <a class="sub-category link-iframe" onclick="sidebar_block()" id="placed_orders" style="display:none;" href="account/placed-orders.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Placed Orders</a>
                        <?php
                        } else {
                        ?>
                            <a class="sub-category link-iframe" id="placed_orders" style="display:none;color: #b3b3b3;">- Placed Orders</a>
                        <?php
                        }
                        $sql = "SELECT * FROM Orders WHERE username='$username' AND email='$email' AND order_condition='Completed'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <a class="sub-category link-iframe" onclick="sidebar_block()" id="completed_orders"  style="display:none;" href="account/completed-orders.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Completed Orders</a>
                        <?php
                        } else {
                        ?>
                            <a class="sub-category link-iframe" id="completed_orders"  style="display:none;color: #b3b3b3;">- Completed Orders</a>
                        <?php
                        }
                    } else {
                    ?>
                        <a class="category link-iframe" style="color: #b3b3b3;"><i class='fas fa-caret-down'></i> Orders</a>
                    <?php
                    }
                ?>
                <!--ORDERS-->
                
                <!--PC BUILDS-->
                <?php
                    $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <a class="category link-iframe" onclick="pc_builds();sidebar_block()" href="account/pc-builds.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame"><i class='fas fa-caret-down'></i> PC BUILDS</a>
                    <?php
                        $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <a class="sub-category link-iframe" onclick="sidebar_block()" id="amd" style="display:none;" onclick="amd_fun()" href="account/pc-builds-amd.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame"><i class='fas fa-caret-down'></i> AMD</a>
                        <?php
                        } else {
                        ?>
                            <a class="sub-category link-iframe" id="amd" style="display:none;color: #b3b3b3;"><i class='fas fa-caret-down'></i> AMD</a>
                        <?php
                        }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Internet, Office, Simple Gaming, Movies'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" onclick="sidebar_block()" id="internet_AMD" style="display:none;" href="account/pc-builds-amd-internet.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Internet, Office, Simple Gaming, Movies</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="internet_AMD" style="display:none;color: #b3b3b3;">- Internet, Office, Simple Gaming, Movies</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Simple Edit'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" onclick="sidebar_block()" id="simpleEdit_AMD" style="display:none;" href="account/pc-builds-amd-simpleEdit.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Simple Edit</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="simpleEdit_AMD" style="display:none;color: #b3b3b3;">- Simple Edit</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Moderate Gaming'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="moderate_AMD" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-amd-moderate.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Moderate Gaming</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="moderate_AMD" style="display:none;color: #b3b3b3;">- Moderate Gaming</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Hard Gaming in 1080p'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1080p_AMD" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-amd-1080p.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Hard Gaming in 1080p</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1080p_AMD" style="display:none;color: #b3b3b3;">- Hard Gaming in 1080p</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Hard Gaming in 1440p'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1440p_AMD" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-amd-1440p.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Hard Gaming in 1440p</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1440p_AMD" style="display:none;color: #b3b3b3;">- Hard Gaming in 1440p</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='AMD' AND category='Heavy Professional Use'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="prof_AMD" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-amd-prof.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Heavy Professional Use</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="prof_AMD" style="display:none;color: #b3b3b3;">- Heavy Professional Use</a>
                            <?php
                            }
                        $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <a class="sub-category link-iframe" id="INTEL" style="display:none;" onclick="intel_fun();sidebar_block()" href="account/pc-builds-INTEL.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame"><i class='fas fa-caret-down'></i> INTEL</a>
                        <?php
                        } else {
                        ?>
                            <a class="sub-category link-iframe" id="INTEL" style="display:none;color: #b3b3b3;"><i class='fas fa-caret-down'></i> INTEL</a>
                        <?php
                        }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Internet, Office, Simple Gaming, Movies'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="internet_INTEL" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-INTEL-internet.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Internet, Office, Simple Gaming, Movies</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="internet_INTEL" style="display:none;color: #b3b3b3;">- Internet, Office, Simple Gaming, Movies</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Simple Edit'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="simpleEdit_INTEL" onclick="sidebar_block()" style="display:none;" href="account/pc-builds-INTEL-simpleEdit.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Simple Edit</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="simpleEdit_INTEL" style="display:none;color: #b3b3b3;">- Simple Edit</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category=''Moderate Gaming";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="moderate_INTEL" style="display:none;" onclick="sidebar_block()" href="account/pc-builds-INTEL-moderate.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Moderate Gaming</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="moderate_INTEL" style="display:none;color: #b3b3b3;">- Moderate Gaming</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Hard Gaming in 1080p'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1080p_INTEL" style="display:none;" onclick="sidebar_block()" href="account/pc-builds-INTEL-1080p.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Hard Gaming in 1080p</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1080p_INTEL" style="display:none;color: #b3b3b3;">- Hard Gaming in 1080p</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Hard Gaming in 1440p'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1440p_INTEL" style="display:none;" onclick="sidebar_block()" href="account/pc-builds-INTEL-1440p.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Hard Gaming in 1440p</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="gaming1440p_INTEL" style="display:none;color: #b3b3b3;">- Hard Gaming in 1440p</a>
                            <?php
                            }
                            $sql = "SELECT * FROM PC_Builds WHERE username='$username' AND email='$email' AND cpu_brand='INTEL' AND category='Heavy Professional Use'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-sub-category link-iframe" id="prof_INTEL" style="display:none;" onclick="sidebar_block()" href="account/pc-builds-INTEL-prof.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Heavy Professional Use</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-sub-category link-iframe" id="prof_INTEL" style="display:none;color: #b3b3b3;">- Heavy Professional Use</a>
                            <?php
                            }
                    } else {
                    ?>
                        <a class="category link-iframe" style="color: #b3b3b3;"><i class='fas fa-caret-down'></i> PC BUILDS</a>
                    <?php
                    }
                ?>
                <!--PC BUILDS-->

                <!--FAVORITES-->
                <?php
                    $sql = "SELECT * FROM Favorites WHERE username='$username' AND email='$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <a class="category link-iframe" onclick="fave()sidebar_block()" href="account/favorites.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame"><i class='fas fa-caret-down'></i> Favorites</a>
                            <a class="sub-category link-iframe" id="favorites" style="display:none;" onclick="sidebar_block()" href="account/favorites-fav.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Favorites</a>
                    <?php
                            $sql = "SELECT * FROM Favorites WHERE  username='$username' AND email='$email' AND have='Yes'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <a class="sub-category link-iframe" id="have_prod" style="display:none;" onclick="sidebar_block()" href="account/prod-have.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Products that I have</a>
                            <?php
                            } else {
                            ?>
                                <a class="sub-category link-iframe" id="have_prod" style="display:none;color: #b3b3b3;">- Products that I have</a>
                            <?php
                            }
                    } else {
                    ?>
                        <a class="category link-iframe" style="color: #b3b3b3;"><i class='fas fa-caret-down'></i> Favorites</a>
                    <?php
                    }
                ?>
                <!--FAVORITES-->
                
                <!--FRIENDS-->
                <a class="category link-iframe" onclick="sidebar_block()" href="../friends/index" target="_blank">- Friends</a>
                <!--FRIENDS-->
                    
                <a class="category link-iframe" onclick="settings_fun();sidebar_block()"><i class='fas fa-caret-down'></i> Account settings</a>
                    <a class="sub-category link-iframe" id="personal" style="display:none;" onclick="sidebar_block()" href="account/personal-information.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Personal information</a>
                    <a class="sub-category link-iframe" id="username" style="display:none;" onclick="sidebar_block()" href="account/username.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Username/E-mail</a>
                    <a class="sub-category link-iframe" id="tele" style="display:none;" onclick="sidebar_block()" href="account/telephones.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Telephones</a>
                    <a class="sub-category link-iframe" id="address" style="display:none;" onclick="sidebar_block()" href="account/addresses.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Addresses</a>
                    <a class="sub-category link-iframe" id="security" style="display:none;" onclick="sidebar_block()" href="account/account-security.php?user=<?php echo $_SESSION["username"]; ?>&email=<?php echo $_SESSION["email"]; ?>" target="dashboard_frame">- Account security</a>
                <a class="category link-iframe" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
                <a href="../index" class="link home">Home</a>
                <a href="../eshop/index" class="link e-shop">E-shop</a><br><br><br>
                <span style="font-size: 8px;">*This page is encrypted and security. With a refresh you maybe will be redirected to the home-dashboard page. Be careful and save your work!</span>
            <br><br></div>

        <script src="account/js/sidebar.js"></script>

        <iframe src="account/home.html" width="100%" height="100%" style="position:absolute;height:100%;" allowfullscreen frameborder=0 name="dashboard_frame" id="dashboard_frame">
            Your browser doesn't support iframes! Thank you for visiting us!
        </iframe>
        
    </body>
</html>

<?php
    $conn->close();
?>