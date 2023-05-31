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
        <title>PC Build App | Friends - Home</title>
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="js/search-bar/search-bar-menu-display.js"></script>
		<script src="js/search-bar/search-bar-menu.js"></script>
        <!--STYLESHEET FOR NAVBAR-->
        <link rel="stylesheet" href="style/navbar.css">
		<!--STYLESHEET FOR NAVBAR-->
        <link rel="stylesheet" href="style/header.css">
		<link rel="stylesheet" href="style/search-bar.css">
        <link rel="stylesheet" href="style/index/button-space.css">
        
        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }
        </style>
    </head>
    
    <body onclick="hideMenuBodyClick()">
    
        <!--NAVBAR-->
        <script src="js/navbar.js"></script>
        <div class="topnav" id="myTopnav" style="z-index: 999999999999999999999">
            <a class="active"><i class="fas fa-home"></i> Home</a>
            <a href="chat"><i class="fas fa-comments"></i> Chat</a>
            <a href="shared-pc-builds"><i class="fas fa-desktop"></i> Shared PC Builds</a>
            <a href="other"><i class="fas fa-plus-square"></i> Other</a>
            <a href="notifications" class="notifications">
                <!--WHAT SVG?-->
                <?php
                    $sql = "SELECT * FROM notifications WHERE username='$username' AND email='$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        //THIS ACCOUNT HAS NOTIFICATIONS --- PUT HERE THE ICON FOR -HAS NOTIFICATIONS-
                    ?>
                        <svg
                            xmlns:dc="http://purl.org/dc/elements/1.1/"
                            xmlns:cc="http://creativecommons.org/ns#"
                            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                            xmlns:svg="http://www.w3.org/2000/svg"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            id="Capa_1"
                            enable-background="new 0 0 512 512"
                            height="512"
                            viewBox="0 0 512 512"
                            width="512"
                            version="1.1"
                            sodipodi:docname="comments-have.svg"
                            inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)">
                            <metadata
                                id="metadata35">
                                <rdf:RDF>
                                <cc:Work
                                    rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type
                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                    <dc:title></dc:title>
                                </cc:Work>
                                </rdf:RDF>
                            </metadata>
                            <defs
                                id="defs33" />
                            <sodipodi:namedview
                                pagecolor="#ffffff"
                                bordercolor="#666666"
                                borderopacity="1"
                                objecttolerance="10"
                                gridtolerance="10"
                                guidetolerance="10"
                                inkscape:pageopacity="0"
                                inkscape:pageshadow="2"
                                inkscape:window-width="1920"
                                inkscape:window-height="1027"
                                id="namedview31"
                                showgrid="false"
                                inkscape:zoom="0.59385921"
                                inkscape:cx="273.04216"
                                inkscape:cy="371.34957"
                                inkscape:window-x="1912"
                                inkscape:window-y="760"
                                inkscape:window-maximized="1"
                                inkscape:current-layer="Capa_1" />
                            <path
                                d="m444.394 3.996h-285.072c-37.183 0-67.606 30.423-67.606 67.606v23.004h257.871c37.183 0 67.606 30.423 67.606 67.606v168.547h27.201c37.183 0 67.606-30.423 67.606-67.606v-191.551c0-37.184-30.423-67.606-67.606-67.606z"
                                fill="#6c7ed6"
                                id="path2" />
                            <path
                                d="m396.461 91.515h-285.072c-6.836 0-13.441 1.036-19.673 2.946v.145h257.871c37.183 0 67.606 30.423 67.606 67.606v168.547h27.2c6.836 0 13.441-1.036 19.673-2.946v-168.692c.001-37.183-30.422-67.606-67.605-67.606z"
                                fill="#4f67d2"
                                id="path4" />
                            <path
                                d="m352.678 91.515h-285.072c-37.183 0-67.606 30.423-67.606 67.606v191.55c0 37.183 30.423 67.606 67.606 67.606h171.096c7.335 0 12.811 6.826 11.133 13.966-4.537 19.317-11.48 39.745-21.744 60.686-4.609 9.405 5.876 18.966 14.782 13.454 25.751-15.937 62.389-42.61 93.244-80.317 4.056-4.957 10.156-7.79 16.561-7.79 37.183 0 67.606-30.423 67.606-67.606v-191.55c0-37.182-30.423-67.605-67.606-67.605z"
                                fill="#60b8fe"
                                id="path6" />
                            <path
                                d="m293.618 432.243c1.677-7.141-3.798-13.966-11.133-13.966h-43.783c7.335 0 12.81 6.825 11.133 13.966-4.537 19.317-11.48 39.745-21.744 60.686-4.609 9.405 5.876 18.966 14.782 13.454 9.88-6.115 21.365-13.816 33.509-23.108 7.832-17.563 13.399-34.696 17.236-51.032z"
                                fill="#23a8fe"
                                id="path8" />
                            <path
                                d="m43.783 350.671v-191.55c0-37.183 30.423-67.606 67.606-67.606h-43.783c-37.183 0-67.606 30.423-67.606 67.606v191.55c0 37.183 30.423 67.606 67.606 67.606h43.783c-37.184 0-67.606-30.422-67.606-67.606z"
                                fill="#23a8fe"
                                id="path10" />
                            <g
                                fill="#dfebfa"
                                id="g20">
                                <circle
                                cx="93.714"
                                cy="260.397"
                                r="22.434"
                                id="circle12" />
                                <circle
                                cx="166.174"
                                cy="260.397"
                                r="22.434"
                                id="circle14" />
                                <circle
                                cx="238.633"
                                cy="260.397"
                                r="22.434"
                                id="circle16" />
                                <circle
                                cx="311.093"
                                cy="260.397"
                                r="22.434"
                                id="circle18" />
                            </g>
                            <path
                                d="m93.714 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.129-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z"
                                fill="#b1dbfc"
                                id="path22" />
                            <path
                                d="m166.174 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.129-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.916-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z"
                                fill="#b1dbfc"
                                id="path24" />
                            <path
                                d="m238.633 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.13-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.703-3.879-11.217-11.123-11.217-19.425z"
                                fill="#b1dbfc"
                                id="path26" />
                            <path
                                d="m311.093 260.397c0-8.302 4.513-15.546 11.217-19.425-3.301-1.91-7.13-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z"
                                fill="#b1dbfc"
                                id="path28" />
                            <ellipse
                                style="opacity:0.92;fill:#ff7e2b;fill-opacity:1;stroke:#db011a;stroke-width:0;stroke-opacity:0.475806"
                                id="path860"
                                cx="407.73758"
                                cy="354.08331"
                                rx="100.91163"
                                ry="104.78139" />
                        </svg>
                    <?php
                    } else {
                        //THIS ACCOUNT HAS NOT NOTIFICATIONS --- PUT HERE THE ICON FOR -HAS NOT NOTIFICATIONS-
                    ?>
                        <svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="m444.394 3.996h-285.072c-37.183 0-67.606 30.423-67.606 67.606v23.004h257.871c37.183 0 67.606 30.423 67.606 67.606v168.547h27.201c37.183 0 67.606-30.423 67.606-67.606v-191.551c0-37.184-30.423-67.606-67.606-67.606z" fill="#6c7ed6"/>
                            <path d="m396.461 91.515h-285.072c-6.836 0-13.441 1.036-19.673 2.946v.145h257.871c37.183 0 67.606 30.423 67.606 67.606v168.547h27.2c6.836 0 13.441-1.036 19.673-2.946v-168.692c.001-37.183-30.422-67.606-67.605-67.606z" fill="#4f67d2"/>
                            <path d="m352.678 91.515h-285.072c-37.183 0-67.606 30.423-67.606 67.606v191.55c0 37.183 30.423 67.606 67.606 67.606h171.096c7.335 0 12.811 6.826 11.133 13.966-4.537 19.317-11.48 39.745-21.744 60.686-4.609 9.405 5.876 18.966 14.782 13.454 25.751-15.937 62.389-42.61 93.244-80.317 4.056-4.957 10.156-7.79 16.561-7.79 37.183 0 67.606-30.423 67.606-67.606v-191.55c0-37.182-30.423-67.605-67.606-67.605z" fill="#60b8fe"/>
                            <path d="m293.618 432.243c1.677-7.141-3.798-13.966-11.133-13.966h-43.783c7.335 0 12.81 6.825 11.133 13.966-4.537 19.317-11.48 39.745-21.744 60.686-4.609 9.405 5.876 18.966 14.782 13.454 9.88-6.115 21.365-13.816 33.509-23.108 7.832-17.563 13.399-34.696 17.236-51.032z" fill="#23a8fe"/>
                            <path d="m43.783 350.671v-191.55c0-37.183 30.423-67.606 67.606-67.606h-43.783c-37.183 0-67.606 30.423-67.606 67.606v191.55c0 37.183 30.423 67.606 67.606 67.606h43.783c-37.184 0-67.606-30.422-67.606-67.606z" fill="#23a8fe"/>
                            <g fill="#dfebfa">
                                <circle cx="93.714" cy="260.397" r="22.434"/>
                                <circle cx="166.174" cy="260.397" r="22.434"/>
                                <circle cx="238.633" cy="260.397" r="22.434"/>
                                <circle cx="311.093" cy="260.397" r="22.434"/>
                            </g>
                            <path d="m93.714 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.129-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z" fill="#b1dbfc"/>
                            <path d="m166.174 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.129-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.916-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z" fill="#b1dbfc"/>
                            <path d="m238.633 260.397c0-8.302 4.514-15.546 11.217-19.425-3.301-1.91-7.13-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.703-3.879-11.217-11.123-11.217-19.425z" fill="#b1dbfc"/>
                            <path d="m311.093 260.397c0-8.302 4.513-15.546 11.217-19.425-3.301-1.91-7.13-3.009-11.217-3.009-12.39 0-22.434 10.044-22.434 22.434s10.044 22.434 22.434 22.434c4.088 0 7.917-1.099 11.217-3.009-6.704-3.879-11.217-11.123-11.217-19.425z" fill="#b1dbfc"/>
                        </svg>
                    <?php
                    }
                ?>
                <span class="notif"></span>
            </a>
            <a href="../sign-in/dashboard.php" target="_blank" class="account"><i class="fas fa-user-circle"></i> <?php echo $_SESSION["username"]; ?></a>
            <a href="javascript:void(0);" class="icon" onclick="responsiveNavbar()" id="ico">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <!--NAVBAR-->

        <!--HEADER-->
		<div class="header" style="margin-top: 70px;">
            <div class="go-back">
                <a href="../index" class="link" title="Go to PC Build App index page">
                    <i class="fas fa-arrow-circle-left"></i> PC Build App
                </a>
            </div>
            <div class="image">
                <a href="../index">
                    <img src="../logo/LogoRight.png" alt="go home-logo" class="img" title="Go to PC Build App index page">
                </a>
            </div>
        </div>
		<!--HEADER-->

        <!--SEARCH BAR-->
        <script type="text/javascript" src="js/search-bar/load-data.js"></script>
        <script type="text/javascript" src="js/search-bar/menu-display.js"></script>
        <div class="search-friend" style="margin-top: 30px;">
            <div id="form-div">
                <form action="" method="post" autocomplete="off" name="search-form" id="search-form" onsubmit="submitSearchFunction()">
                    <div style="display: inline-block;margin-right: -80px;">
                        <input type="text" name="search" id="search-bar" placeholder="Search for a friend (e-mail/username)..." maxlength="200" minlength="1" onclick="menuDisplay()">
                        <!--MENU-->
                        <div class="menu-container" style="height: 9cm;z-index: 9;position: relative;background-color: transparent;">
                            <div class="menu" style="display: none;position: relative;top:0;" id="search_menu">
                                <!--AUTO FILL-->
                            </div>
                        </div>
                        <!--MENU-->
                    </div>
                </form>
            </div>
        </div>
        <!--SEARCH BAR-->
		
        <div id="other-content" style="position: relative;top: -9cm;z-index: 99999999;">
            <!--NOTIFICATIONS SPACE-->
            <?php
                $sql = "SELECT * FROM notifications WHERE username='$username' AND email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            ?>
                <div class="notification-space" id="notifications">
                    <div class="space">
                        <?php
                            //Notification cards
                                //--------------------------------??? 21 ???te?----------------------------------
                            /*<a href="#" class="a-notification">
                                <div class="notification">
                                    <table>
                                        <tr>
                                            <td class="first-field">
                                                <div class="image">
                                                    
                                                        SVG FOR NOTIFICATION TYPE!
                                                        SVG code should have:
                                                            class="img-notification"
                                                            id="img_notification"
                                                        
                                                        SVG files are in: (MAIN FOLDER)/InkScape/Notifications/(Choose an SVG file)
                                                    
                                                </div>
                                            </td>
                                            <td class="second-field">
                                                <div class="text">
                                                    One notification from something shared or anything else....I don't know ??
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>*/
                            //Notification cards
                            $i = 0;
                            while($row = $result->fetch_assoc() and $i <= 21) {
                                $i++;
                            ?>
                                <a href="/notifications" class="a-notification">
                                    <div class="notification">
                                        <table>
                                            <tr>
                                                <td class="first-field">
                                                    <div class="image">
                                                        <?php
                                                            if ($row["notification_code"] == "100001") {
                                                            ?>
                                                                <!--Add friend request-->
                                                                <svg class="img-notification" id="img_notification" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="XMLID_4271_">
                                                                        <path id="XMLID_192_" d="m423.09 249.079c-18.96-26.421-42.665-44.459-74.6-56.767l-2.624-1.011h-141.89v119.104l92.993 92.994h128.957v-150.369z" fill="#4b5be4"/>
                                                                        <path id="XMLID_190_" d="m286.664 16.233c-22.406 0-44.025 6.611-62.521 19.118l-6.649 4.496v152.114l39.546 43.867 4.662 1.064c8.144 1.859 16.542 2.802 24.962 2.802 61.609 0 111.731-50.122 111.731-111.731s-50.123-111.73-111.731-111.73z" fill="#8095ff"/>
                                                                        <path id="XMLID_3742_" d="m286.664 16.233v223.462c61.609 0 111.731-50.122 111.731-111.731s-50.123-111.731-111.731-111.731z" fill="#8066ff"/>
                                                                        <path id="XMLID_3556_" d="m327.73 275.265-.385-.78c-19.106-38.749-49.551-66.395-90.487-82.173l-2.624-1.011-118.411.001-2.624 1.012c-68.766 26.505-113.199 96.373-113.199 177.996v125.458h385.073z" fill="#00ee84"/>
                                                                        <path id="XMLID_201_" d="m175.03 495.767h210.043l-57.343-220.502-.385-.78c-19.106-38.749-49.551-66.395-90.487-82.173l-2.624-1.011h-59.203v304.466z" fill="#00cc71"/>
                                                                        <ellipse id="XMLID_4005_" cx="175.03" cy="127.963" fill="#68ffb1" rx="111.731" ry="111.731" transform="matrix(.973 -.23 .23 .973 -24.718 43.637)"/>
                                                                        <path id="XMLID_48_" d="m385.387 242.541c-69.815 0-126.613 56.798-126.613 126.613s56.798 126.613 126.613 126.613 116.613-56.798 116.613-126.613-46.798-126.613-116.613-126.613z" fill="#e6f3fb"/>
                                                                        <path id="XMLID_4181_" d="m385.387 242.541v253.227c69.815 0 126.613-56.798 126.613-126.613s-56.798-126.614-126.613-126.614z" fill="#d1e9ff"/>
                                                                        <path id="XMLID_261_" d="m442.55 354.154h-42.163v-42.163h-30v42.163h-42.164v30h42.164v42.164h30v-42.164h42.163z" fill="#8095ff"/>
                                                                        <path id="XMLID_202_" d="m175.03 16.233v223.462c61.609 0 111.731-50.122 111.731-111.731s-50.122-111.731-111.731-111.731z" fill="#00ee84"/>
                                                                        <path id="XMLID_4183_" d="m400.387 354.154v-42.163h-15v114.327h15v-42.164h42.163v-30z" fill="#8066ff"/>
                                                                    </g>
                                                                </svg>
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "100002") {
                                                            ?>
                                                                <!--Add friend request was accepted-->
                                                                <svg class="img-notification" id="img_notification" height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="m512 511.992188h-512v-78.367188c0-26.914062 16.832031-50.945312 42.128906-60.144531l133.871094-48.6875v-31.457031l-48-64v-96.816407c0-68.113281 51.28125-127.679687 119.230469-132.222656 74.53125-5.007813 136.769531 54.222656 136.769531 127.695313v101.328124l-48 64v31.472657l133.871094 48.6875c25.296875 9.183593 42.128906 33.214843 42.128906 60.144531zm0 0" fill="#64ccf4"/>
                                                                    <path d="m288 223.992188h-64v-96h32v64h32zm0 0" fill="#40a2e7"/>
                                                                    <path d="m336 324.792969v-31.457031l48-64v-5.34375c-88.222656 0-160 71.777343-160 160 0 35.632812 11.96875 68.351562 31.761719 94.925781h-255.761719v33.074219h512v-123.199219zm0 0" fill="#43ade8"/>
                                                                    <path d="m512 383.992188c0 70.691406-57.308594 128-128 128s-128-57.308594-128-128c0-70.691407 57.308594-128 128-128s128 57.308593 128 128zm0 0" fill="#9cc618"/>
                                                                    <g fill="#fff">
                                                                        <path d="m288 47.992188h32v32h-32zm0 0"/>
                                                                        <path d="m368 438.617188-51.3125-51.3125 22.625-22.625 28.6875 28.6875 68.6875-68.6875 22.625 22.625zm0 0"/>
                                                                    </g>
                                                                </svg>
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "200001" or $row["notification_code"] == "200002" or $row["notification_code"] == "300001") {
                                                            ?>
                                                                <svg class="img-notification" id="img_notification" height="512" viewBox="0 0 60 60" width="512" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="Page-1" fill="none" fill-rule="evenodd">
                                                                        <g id="016---PC-and-Monitor" fill-rule="nonzero">
                                                                            <path id="Shape" d="m45 19v25h-44v-25c0-2.209139 1.790861-4 4-4h36c2.209139 0 4 1.790861 4 4z" fill="#02a9f4"/>
                                                                            <path id="Shape" d="m45 19v25h-44v-4.68c27.48 2.36 34.69-16.75 36.46-24.32h3.54c2.209139 0 4 1.790861 4 4z" fill="#0377bc"/>
                                                                            <path id="Shape" d="m45 44v1c0 2.209139-1.790861 4-4 4h-36c-2.209139 0-4-1.790861-4-4v-1z" fill="#607d8b"/>
                                                                            <path id="Shape" d="m42 44v1c0 2.209139-1.790861 4-4 4h3c2.209139 0 4-1.790861 4-4v-1z" fill="#37474f"/>
                                                                            <path id="Rectangle-path" d="m17 49h12v6h-12z" fill="#607d8b"/>
                                                                            <path id="Rectangle-path" d="m26 49h3v6h-3z" fill="#37474f"/>
                                                                            <path id="Shape" d="m35 57c0 1.1045695-.8954305 2-2 2h-20c-1.1045695 0-2-.8954305-2-2s.8954305-2 2-2h20c1.1045695 0 2 .8954305 2 2z" fill="#607d8b"/>
                                                                            <path id="Shape" d="m33 55h-3c1.1045695 0 2 .8954305 2 2s-.8954305 2-2 2h3c1.1045695 0 2-.8954305 2-2s-.8954305-2-2-2z" fill="#37474f"/>
                                                                            <path id="Shape" d="m5 24c-.26580298.0015368-.52128117-.1028135-.71-.29-.18931265-.1877666-.29579832-.4433625-.29579832-.71s.10648567-.5222334.29579832-.71l4-4c.25365857-.2536586.62337399-.3527235.96987804-.259878.34650405.0928454.61715452.3634959.71.71.09284546.346504-.00621947.7162194-.25987804.969878l-4 4c-.18871883.1871865-.44419702.2915368-.71.29z" fill="#f5f5f5"/>
                                                                            <path id="Shape" d="m5 30c-.26580298.0015368-.52128117-.1028135-.71-.29-.18931265-.1877666-.29579832-.4433625-.29579832-.71s.10648567-.5222334.29579832-.71l10-10c.2536586-.2536586.623374-.3527235.969878-.259878.3465041.0928454.6171546.3634959.71.71.0928455.346504-.0062194.7162194-.259878.969878l-10 10c-.18871883.1871865-.44419702.2915368-.71.29z" fill="#f5f5f5"/>
                                                                            <path id="Shape" d="m59 3v54c0 1.1045695-.8954305 2-2 2h-24c1.1045695 0 2-.8954305 2-2s-.8954305-2-2-2h-4v-6h12c2.209139 0 4-1.790861 4-4v-26c0-2.209139-1.790861-4-4-4h-12v-12c0-1.1045695.8954305-2 2-2h26c1.1045695 0 2 .8954305 2 2z" fill="#3f51b5"/>
                                                                            <path id="Shape" d="m57 1h-3c1.1045695 0 2 .8954305 2 2v54c0 1.1045695-.8954305 2-2 2h3c1.1045695 0 2-.8954305 2-2v-54c0-1.1045695-.8954305-2-2-2z" fill="#283593"/>
                                                                            <rect id="Rectangle-path" fill="#283593" height="4" rx="1" width="22" x="33" y="6"/>
                                                                            <circle id="Oval" cx="52" cy="17" fill="#ffeb3a" r="2"/>
                                                                            <circle id="Oval" cx="52" cy="25" fill="#ffeb3a" r="2"/>
                                                                            <g fill="#000">
                                                                                <path id="Shape" d="m57 0h-26c-1.6568542 0-3 1.34314575-3 3v11h-23c-2.76142375 0-5 2.2385763-5 5v26c0 2.7614237 2.23857625 5 5 5h11v4h-3c-1.6568542 0-3 1.3431458-3 3s1.3431458 3 3 3h44c1.6568542 0 3-1.3431458 3-3v-54c0-1.65685425-1.3431458-3-3-3zm-52 16h36c1.6568542 0 3 1.3431458 3 3v24h-42v-24c0-1.6568542 1.34314575-3 3-3zm-3 29h42c0 1.6568542-1.3431458 3-3 3h-36c-1.65685425 0-3-1.3431458-3-3zm16 5h10v4h-10zm13 8h-18c-.5522847 0-1-.4477153-1-1s.4477153-1 1-1h20c.5522847 0 1 .4477153 1 1s-.4477153 1-1 1zm27-1c0 .5522847-.4477153 1-1 1h-21.18c.3241437-.9168047.1838094-1.9338513-.3765005-2.7286171-.5603099-.7947659-1.4710837-1.2686527-2.4434995-1.2713829h-3v-4h11c2.7614237 0 5-2.2385763 5-5v-26c0-2.7614237-2.2385763-5-5-5h-11v-11c0-.55228475.4477153-1 1-1h26c.5522847 0 1 .44771525 1 1z"/>
                                                                                <path id="Shape" d="m54 5h-20c-1.1045695 0-2 .8954305-2 2v2c0 1.1045695.8954305 2 2 2h20c1.1045695 0 2-.8954305 2-2v-2c0-1.1045695-.8954305-2-2-2zm-20 4v-2h20v2z"/>
                                                                                <path id="Shape" d="m52 20c1.6568542 0 3-1.3431458 3-3s-1.3431458-3-3-3-3 1.3431458-3 3 1.3431458 3 3 3zm0-4c.5522847 0 1 .4477153 1 1s-.4477153 1-1 1-1-.4477153-1-1 .4477153-1 1-1z"/>
                                                                                <path id="Shape" d="m55 25c0-1.6568542-1.3431458-3-3-3s-3 1.3431458-3 3 1.3431458 3 3 3 3-1.3431458 3-3zm-3 1c-.5522847 0-1-.4477153-1-1s.4477153-1 1-1 1 .4477153 1 1-.4477153 1-1 1z"/>
                                                                                <path id="Shape" d="m39 52c-.5522847 0-1 .4477153-1 1v2c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-2c0-.5522847-.4477153-1-1-1z"/>
                                                                                <path id="Shape" d="m43 52c-.5522847 0-1 .4477153-1 1v2c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-2c0-.5522847-.4477153-1-1-1z"/>
                                                                                <path id="Shape" d="m47 52c-.5522847 0-1 .4477153-1 1v2c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-2c0-.5522847-.4477153-1-1-1z"/>
                                                                                <path id="Shape" d="m51 52c-.5522847 0-1 .4477153-1 1v2c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-2c0-.5522847-.4477153-1-1-1z"/>
                                                                                <path id="Shape" d="m55 52c-.5522847 0-1 .4477153-1 1v2c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-2c0-.5522847-.4477153-1-1-1z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "400001") {
                                                                $code = $row["order_number"];
                                                                $sql2 = "SELECT * FROM Orders WHERE number='$code'";
                                                                $result2 = $conn->query($sql2);
                                                                if ($result2->num_rows > 0) {
                                                                    while ($row2 = $result2->fetch_assoc()) {
                                                                        $condition = $row2["order_condition"];
                                                                        if ($row["order_condition"] != "Completed") {
                                                                        ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="img-information" id="img_information" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512">
                                                                                <title>Commercial delivery </title>
                                                                                <g id="_Group_2" data-name=" Group 2">
                                                                                    <path d="M496,254.18v202.1a23.091,23.091,0,0,1-23.08,23.09H335.89a23.084,23.084,0,0,1-23.08-23.09V254.18a23.076,23.076,0,0,1,23.08-23.08h31.17v.07a17.156,17.156,0,0,0,17.16,17.16h40.37a17.156,17.156,0,0,0,17.16-17.16v-.07h31.17A23.082,23.082,0,0,1,496,254.18ZM376.92,382.13V349.15H343.95v32.98Z" style="fill:#f8ec7d"/>
                                                                                    <path d="M367.06,231.1v-1.05a17.156,17.156,0,0,1,17.16-17.16h40.37a17.156,17.156,0,0,1,17.16,17.16v1.12a17.156,17.156,0,0,1-17.16,17.16H384.22a17.156,17.156,0,0,1-17.16-17.16Z" style="fill:#6fe3ff"/>
                                                                                    <path d="M391.31,140.98v71.91h-7.09a17.156,17.156,0,0,0-17.16,17.16v1.05H335.89a23.076,23.076,0,0,0-23.08,23.08v148.8L203.65,466V249.3L391.29,140.97Z" style="fill:#c16752"/>
                                                                                    <polygon points="203.65 249.3 107.99 194.07 295.62 85.73 295.63 85.73 391.29 140.97 203.65 249.3" style="fill:#af593c"/>
                                                                                    <rect x="343.95" y="349.15" width="32.97" height="32.98" style="fill:#6fe3ff"/>
                                                                                    <polygon points="295.62 85.73 107.99 194.07 16.02 140.97 203.65 32.63 295.62 85.73" style="fill:#c16752"/>
                                                                                    <polygon points="203.65 249.3 203.65 466 16 357.66 16 140.98 16.02 140.97 107.99 194.07 203.65 249.3" style="fill:#e48e66"/>
                                                                                    <path d="M351.28,325.01h-7.33a7,7,0,0,1-7-7V285.03a7,7,0,0,1,7-7h32.97a7,7,0,0,1,7,7v4.71a7,7,0,0,1-13.617,2.29H350.95v18.98h.33a7,7,0,0,1,0,14Z" style="fill:#6fe3ff"/>
                                                                                    <path d="M351.28,453.24h-7.33a7,7,0,0,1-7-7V413.27a7,7,0,0,1,7-7h32.97a7,7,0,0,1,7,7v6.74a7,7,0,0,1-14,.26H350.95v18.97h.33a7,7,0,0,1,0,14Z" style="fill:#6fe3ff"/>
                                                                                    <path d="M372.54,323.99a6.972,6.972,0,0,1-4.947-2.048L356.4,310.762a7,7,0,1,1,9.9-9.9l6.241,6.235,20.5-20.5a7,7,0,1,1,9.9,9.9l-25.45,25.45A6.979,6.979,0,0,1,372.54,323.99Z" style="fill:#2561a1"/>
                                                                                    <path d="M372.54,453.24a6.972,6.972,0,0,1-4.947-2.048L356.4,440.012a7,7,0,1,1,9.9-9.9l6.241,6.235,20.5-20.5a7,7,0,1,1,9.9,9.9l-25.45,25.45A6.979,6.979,0,0,1,372.54,453.24Z" style="fill:#2561a1"/>
                                                                                    <path d="M464.86,308.52H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/>
                                                                                    <path d="M464.86,372.64H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/>
                                                                                    <path d="M464.86,436.76H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/>
                                                                                </g>
                                                                            </svg>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <svg id="img_notification" class="img-notification" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                                                                <g>
                                                                                    <path d="m419.68 163.97v223.03h-371.71v-223.03l185.86-111.51z" fill="#ffa001"/>
                                                                                    <path d="m419.68 163.97v223.03h-185.85v-334.54z" fill="#f87f02"/>
                                                                                    <path d="m0 163.971 47.968-111.515h185.858l-47.968 111.515z" fill="#ffda2d"/>
                                                                                    <path d="m467.651 163.971-47.968-111.515h-185.857l47.968 111.515z" fill="#fcbe00"/>
                                                                                    <path d="m107.714 293.542h30v30h-30z" fill="#ffda2d"/>
                                                                                    <path d="m512 349.834c0 60.59-49.12 109.71-109.71 109.71-60.6 0-109.72-49.12-109.72-109.71 0-60.6 49.12-109.72 109.72-109.72 60.59 0 109.71 49.119 109.71 109.72z" fill="#83e470"/>
                                                                                    <path d="m512 349.834c0 60.59-49.12 109.71-109.71 109.71v-219.43c60.59 0 109.71 49.119 109.71 109.72z" fill="#01b763"/>
                                                                                    <path d="m459.7 332.064-57.41 57.409-9.95 9.951-47.47-47.471 21.22-21.21 26.25 26.25 9.95-9.949 36.19-36.19z" fill="#f3fdff"/>
                                                                                    <path d="m459.7 332.064-57.41 57.409v-42.429l36.19-36.19z" fill="#d7f3f7"/>
                                                                                </g>
                                                                            </svg>
                                                                        <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            if ($row["notification_code"] == "400002") {
                                                            ?>
                                                                <svg id="img_notification" class="img-notification" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                                                    <g>
                                                                        <path d="m419.68 163.97v223.03h-371.71v-223.03l185.86-111.51z" fill="#ffa001"/>
                                                                        <path d="m419.68 163.97v223.03h-185.85v-334.54z" fill="#f87f02"/>
                                                                        <path d="m0 163.971 47.968-111.515h185.858l-47.968 111.515z" fill="#ffda2d"/>
                                                                        <path d="m467.651 163.971-47.968-111.515h-185.857l47.968 111.515z" fill="#fcbe00"/>
                                                                        <path d="m107.714 293.542h30v30h-30z" fill="#ffda2d"/>
                                                                        <path d="m512 349.834c0 60.59-49.12 109.71-109.71 109.71-60.6 0-109.72-49.12-109.72-109.71 0-60.6 49.12-109.72 109.72-109.72 60.59 0 109.71 49.119 109.71 109.72z" fill="#83e470"/>
                                                                        <path d="m512 349.834c0 60.59-49.12 109.71-109.71 109.71v-219.43c60.59 0 109.71 49.119 109.71 109.72z" fill="#01b763"/>
                                                                        <path d="m459.7 332.064-57.41 57.409-9.95 9.951-47.47-47.471 21.22-21.21 26.25 26.25 9.95-9.949 36.19-36.19z" fill="#f3fdff"/>
                                                                        <path d="m459.7 332.064-57.41 57.409v-42.429l36.19-36.19z" fill="#d7f3f7"/>
                                                                    </g>
                                                                </svg>
                                                            <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="second-field">
                                                    <div class="text">
                                                        <?php
                                                            if ($row["notificatio_code"] == "100001") {
                                                            ?>
                                                                <!--Add friend request-->
                                                                You have a new Add-Friend request from <b><?php echo $row["from_user"]; ?></b>
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "100002") {
                                                            ?>
                                                                <!--Add friend request was accepted-->
                                                                Your Add-Friend request that you did to <b><?php echo $row["from_user"]; ?></b> was accepted!
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "200001") {
                                                            ?>
                                                                <!--An user shared with you his PC Build-->
                                                                <b><?php echo $row["from_user"]; ?></b> shared with you the PC Build with code <i><?php echo $row["pc_build_code"] ?></i> that he/she created!
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "200002") {
                                                            ?>
                                                                You shared the PC Build with code <i><?php echo $row["pc_build_code"]; ?></i> with <b><?php echo $row["from_user"]; ?></b> that you created!
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "300001") {
                                                            ?>
                                                                <b><?php echo $row["from_user"]; ?></b> bought the PC Build with code <i><?php echo $row["pc_build_code"] ?></i> (You can see the PC Build and buy it!)
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "400001") {
                                                            ?>
                                                                The condition of your order with code <i><?php echo $row["order_number"]; ?></i> had been changed to <b><?php echo $condition; ?></b>!
                                                            <?php
                                                            }
                                                            if ($row["notification_code"] == "400002") {
                                                            ?>
                                                                Your order with code <i><?php echo $row["order_number"] ?></i> was successfully placed!
                                                            <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="date-time">
                                                        <?php echo $row["notification_date"]; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </a>
                            <?php
                            }
                        ?>
                        
                        <div class="see-more">
                            <a href="/notifications">
                                <button class="see-more-btn">
                                    See more
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            <!--NOTIFICATIONS SPACE-->
            
            <!--BUTTON SPACE-->
            <div class="button-space" style="margin: 0;margin-top: 60px;background-color: #f3f3f3;">
                <a href="chat"><button class="see-your-chat">See your Chat</button></a>
                <a href="share-a-pc-build"><button class="share-a-pc-build">Share a PC Build</button></a>
                <a href="friends"><button class="your-friends">Your friends...</button></a>
            </div>
            <!--BUTTON SPACE-->
        </div>

    </body>
</html>

<?php
    //$conn->close();
?>