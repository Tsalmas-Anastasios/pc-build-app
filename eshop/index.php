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
        die("Connection with database failed: " . $conn->connect_error);
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
            die();
		}
	}
	//-----------------------------------------;
    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <meta name="keywords" content="pc, pc build, pc builder, pcbuild, pcbuilder, dreamingpc, pcbuildapp, pconly, pcbuy, pc eshop, pceshop, pc build app">
        <meta name="description" content="Make your dreaming PC Build">
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <TITLE>PC Build App | E-shop</TITLE>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--LINKS FOR STYLES-->
        <link rel="stylesheet" href="styles/topnav.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/cart-button.css">
        <link rel="stylesheet" href="styles/search-bar.css">
        <link rel="stylesheet" href="styles/search-menu.css">
        <link rel="stylesheet" href="styles/hide-000webhost.css">
        <!--LINKS FOR STYLES-->
    </head>

    <body onclick="displayMenuNone()">
        <script src="js/search-bar/display-none-body.js"></script>

        <!--TOPNAV-->
        <div class="topnav" id="myTopnav">
            <a href="../index" class="pc-build-app" style="padding: 0" title="Go to PC Build App Home Page">
                <img src="../logo/LogoRight.png" alt="Go to home page in the PC Build App" width="160px" height="43px" />
            </a>
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-microchip"></i> HardWare 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/hardware/cpu">CPU</a>
                    <a href="categories/hardware/motherboard">Motherboard</a>
                    <a href="categories/hardware/ram">Ram Memory</a>
                    <a href="categories/hardware/gpu">Graphics Card - GPU</a>
                    <a href="categories/hardware/psu">PSU</a>
                    <a href="categories/hardware/hard-drive">Hard Drive</a>
                    <a href="categories/hardware/pc-case">PC Case</a>
                    <a href="categories/hardware/modding-cooling-pc">Modding & Cooling PC</a>
                    <a href="categories/hardware/optical-drive">Optical Drives</a>
                    <a href="categories/hardware/sound-card">Sound Cards</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-keyboard"></i> Circumferentially
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/Circumferentially/printers">Printers & Accessories</a>
                    <a href="categories/Circumferentially/multimedia">Multimedia</a>
                    <a href="categories/Circumferentially/ups">UPS & Accessories</a>
                    <a href="categories/Circumferentially/usb-hub">USB Hub</a>
                    <a href="categories/Circumferentially/scanners">Scanners</a>
                    <a href="categories/Circumferentially/other">Other</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-wifi"></i> Networking 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/networking/access-points">WiFi Repeater</a>
                    <a href="categories/networking/dsl-modems">DSL Modems/Routers</a>
                    <a href="categories/networking/plc">Powerline Connection (PLC)</a>
                    <a href="categories/networking/usb-network-adapter">USB Network Adapter</a>
                    <a href="categories/networking/access-points">Access Points</a>
                    <a href="categories/networking/switches">Switches</a>
                    <a href="categories/networking/nas">File Servers/NAS</a>
                    <a href="categories/networking/network-cards">Network Cards</a>
                    <a href="categories/networking/poe">PoE Adapters</a>
                    <a href="categories/networking/print-server">Print Server</a>
                    <a href="categories/networking/other">Other</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-hdd"></i> Storage
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/storage/usb-flash">USB Flash</a>
                    <a href="categories/storage/sd-cards">SD Cards</a>
                    <a href="categories/storage/card-readers">Card Readers</a>
                    <a href="categories/storage/dvd-cd-blueray">DVD/CD/BLU-RAY Media</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-desktop"></i> Other
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/other/gadgets">Gadgets</a>
                    <a href="categories/other/accessories">Accessories for Circumferentially</a>
                    <a href="categories/other/bluetooth-adapters">Bluetooth Adapters</a>
                    <a href="categories/other/kvn">KVN & Data Switches</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><i class="fab fa-uncharted"></i> Software
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="categories/software/operating-systems">Operating Systems</a>
                    <a href="categories/software/office-apps">Office Apps</a>
                    <a href="categories/software/antivirus-security">Antivirus & Security</a>
                    <a href="categories/software/trading-apps">Trading Apps</a>
                    <a href="categories/software/sound-editors">Sound Editors</a>
                    <a href="categories/software/picture-video-editors">Picture & Video Editors</a>
                    <a href="categories/software/designing-apps">Designing Apps</a>
                </div>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <script src="js/topnav.js"></script>
        <!--TOPNAV-->

        <!--HEADER-->
        <div class="header">
            <div class="image">
                <img src="../Pictures/e-shop/001-header-picture.png" alt="PC Build App E-shop" class="img" />
            </div>
            <div class="text">
                e-Shop
            </div>
        </div>
        <!--HEADER-->

        <!--SEARCH BAR-->
        <div class="search-area">
            <div class="search-form">
                <form action="" name="searcher" id="searcher" method="post" autocomplete="off">
                    <input type="search" name="search" id="search-bar" placeholder="Search...">
                </form>
                <div class="m">
                    <div class="search-menu">
                        <div class="menu" id="search-menu" style="display: none;top: 28px;">
                            <div class="a-options" id="a-menu">
                                <!--AUTO FILL-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/search-bar/code.js"></script>
        <!--SEARCH BAR-->

        <!--CONTENT-->
        <div class="content">
            
        </div>
        <!--CONTENT-->

        <!--CART BUTTON-->
        <div class="more-options">
            <div class="shopping-cart">
                <div class="button">
                    <a href="
                        <?php
                            if (isset($_SESSION["username"]) and isset($_SESSION["email"])) {
                                echo '../sign-in/dashboard.php';
                            } else {
                                echo '../sign-in/login';
                            }
                        ?>
                    " style="margin-right: 15px;" title="
                        <?php
                            if (isset($_SESSION["username"]) and isset($_SESSION["email"])) {
                                echo $_SESSION["username"]. " - Account Dashboard";
                            } else {
                                echo "Login to your Account";
                            }
                        ?>
                    " target="_blank">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <a href="shopping-cart/index" title="Shopping cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                            $i = 0;
                            $user = $_SESSION["username"];
                            $sql = "SELECT * FROM  shopping_cart_products WHERE user_id='$user'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $i++;
                                }
                            }

                            if ($i > 0) {
                                echo '<sup class="sup">
                                    '. $i. '
                                </sup>';
                            }

                        ?>
                    </a>
                </div>
            </div>
        </div>
        <!--CART BUTTON-->
    </body>
</html>

<?php
    $conn->close();
?>