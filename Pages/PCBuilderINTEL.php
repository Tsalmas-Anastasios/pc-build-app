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
?>
<!doctype HTML>
<html lang="en">
<HEAD>
  <!--HOME PAGE STYLESHEETS-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="../../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
	<TITLE>PC Build App-PC Builder-INTEL</TITLE>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../StyleSheets/INTEL/Layout.css">
  <link rel="stylesheet" href="../../StyleSheets/INTEL/topnav.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--HOME PAGE STYLESHEETS-->

  <link rel="stylesheet" href="./StyleSheets/INTEL/ModalBox.css">

  <link rel="stylesheet" href="../../StyleSheets/INTEL/Tabs.css">
  <link rel="stylesheet" href="../../StyleSheets/Under800px.css">
  <link rel="stylesheet" href="../../StyleSheets/INTEL/IntelLogo.css">

  
	<style>
		img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    		display: none;
		}
	</style>

</HEAD>

<BODY BGCOLOR="#ccc" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0" oncontextmenu="return false">

<!--TopNav-->
<div id="myTopnav" class="topnav" style="z-index: 9999;">
  <a href="../index"><i class="fa fa-fw fa-home"></i> Home</a>
  <div class="dropdown">
	  <button class="active"><i class="fas fa-desktop"></i> PC Builder
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../Pages/PCBuilderAMD"><i class="fas fa-desktop"></i> AMD</a>
      <a href="" class="active"><i class="fas fa-desktop"></i> INTEL</a>
	    <a href="../Pages/service/index"><i class="fas fa-tools"></i> Service</a>
    </div>
  </div>
  <a href="../eshop/index" target="_blank"><i class="fas fa-cart-arrow-down"></i> e-Shop</a>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-user-friends"></i> Friends
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../friends/index" target="_blank"><i class="fas fa-user-friends"></i> Friends</a>
	  <a href="../friends/chat" target="_blank"><i class="fas fa-comments"></i> Chat</a>
    </div>
  </div>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-lightbulb"></i> Tips
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../forum/index"><i class="fas fa-comment-alt"></i> Forum</a>
	  <a href="../instructions/index"><i class="fas fa-question"></i> How to...</a>
    </div>
  </div>
  <a href="#news"><i class="far fa-newspaper"></i> News</a>
  <div class="dropdown">
    <button class="dropbtn"><i class="far fa-plus-square"></i> More
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="#donate"><i class="fas fa-donate"></i> Donate</a>
      <a href="#contactUs"><i class="fas fa-envelope-open-text"></i> Contact Us</a>
      <a href="../Pages/report-a-problem"><i class="fas fa-exclamation-triangle"></i> Report a problem</a>
	  <a href="#partners"><i class="fas fa-store-alt"></i> Partner Shops</a>
  	  <a href="#aboutUs"><i class="far fa-address-card"></i> About Us</a>
    </div>
  </div>
  <?php
	if (isset($_SESSION["username"]) and isset($_SESSION["email"])) {
		//THE USER HAS LOGGED IN
		?>
			<a href="../sign-in/dashboard.php" class="account"><i class="fas fa-user-circle"></i> <?php echo $_SESSION["username"]; ?></a>
		<?php
	} else {
		//THE USER HASN'T LOGGED IN
		echo '<a href="../sign-in/login" class="account"><i class="fas fa-user-circle"></i> Account</a>';
	}
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--TopNav-->

<div class="header">
	<header>
  <div class="wrapper">
  <br><br><br>  
  <div class="INTEL">
    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" id="svg2328" sodipodi:version="0.32" inkscape:version="0.45.1" width="293" height="194" version="1.0">
      <defs id="defs2331"/>
      <g fill="none" fill-rule="evenodd" stroke="#fff" stroke-width="0">
      <path d="M 291.28737,55.058565 C 277.50683,-12.11587 147.525,-16.369963 63.737895,34.808098 L 63.737895,40.460487 C 147.41497,-2.7316788 266.14859,-2.4562338 276.95315,59.422033 C 280.59385,79.920851 269.12707,101.24048 248.56679,113.50757 L 248.56679,129.56114 C 273.31695,120.47998 298.61629,91.08816 291.28737,55.058565 M 138.92617,172.67053 C 81.102616,178.02238 20.853265,169.59848 12.418485,124.23687 C 8.2296052,101.90025 18.426965,78.192925 31.877897,63.483967 L 31.877897,55.608451 C 7.6234054,76.957185 -5.5514356,103.96031 2.0555709,135.84419 C 11.756767,176.75954 63.462304,199.91949 142.39931,192.20804 C 173.65361,189.19069 214.55609,179.09205 242.94244,163.42581 L 242.94244,141.16845 C 217.14544,156.61695 174.47938,169.38024 138.92617,172.67053 z " id="oval-border" style="fill:#fff;fill-opacity:1"/>
      <path d="M 238.31142,45.347552 L 223.15342,45.347552 L 223.15342,113.16 C 223.15342,121.1244 226.95767,128.05143 238.31142,129.14959" id="path8" style="fill:#fff;fill-opacity:1"/>
      <path d="M 57.729915,70.130433 L 42.57092,70.130433 L 42.57092,114.42193 C 42.57092,122.38934 46.375174,129.31386 57.729915,130.41152" id="path10" style="fill:#fff;fill-opacity:1"/>
      <rect x="42.570919" y="47.40823" width="15.158995" height="14.425744" id="rect" style="fill:#fff;fill-opacity:1"/>
      <path d="M 148.57135,129.69867 C 136.2803,129.69867 131.09859,121.12491 131.09859,112.66317 L 131.09859,53.837923 L 146.09203,53.837923 L 146.09203,70.130433 L 157.44627,70.130433 L 157.44627,82.329722 L 146.09203,82.329722 L 146.09203,111.75641 C 146.09203,115.21716 147.74557,117.11508 151.32725,117.11508 L 157.44627,117.11508 L 157.44627,129.69867 L 148.57135,129.69867" id="path14" style="fill:#fff;fill-opacity:1"/>
      <path d="M 188.42548,81.588742 C 183.30029,81.588742 179.33248,84.253255 177.67794,87.85316 C 176.68611,90.022849 176.3545,91.672094 176.19095,94.338616 L 199.39759,94.338616 C 199.06648,87.82553 196.14302,81.588742 188.42548,81.588742 M 176.19095,104.61387 C 176.19095,112.33513 181.03904,118.01982 189.52834,118.01982 C 196.19954,118.01982 199.50663,116.15155 203.3654,112.33563 L 212.62645,121.26456 C 206.67299,127.14267 200.44444,130.71544 189.41981,130.71544 C 175.03357,130.71544 161.25152,122.82991 161.25152,99.85904 C 161.25152,80.21479 173.26798,69.115166 189.0887,69.115166 C 205.12948,69.115166 214.33351,82.110693 214.33351,99.173822 L 214.33351,104.61437 L 176.19095,104.61437" id="path16" style="fill:#fff;fill-opacity:1"/>
      <path d="M 98.576374,82.329722 C 102.98533,82.329722 104.80493,84.500918 104.80493,88.045061 L 104.80493,129.78055 L 119.85388,129.78055 L 119.85388,87.990304 C 119.85388,79.499933 115.33339,70.129931 102.15955,70.129931 L 71.125329,70.129931 L 71.125329,129.78005 L 86.118769,129.78005 L 86.118769,82.329219" id="path18" style="fill:#fff;fill-opacity:1"/>
      <text xml:space="preserve" style="font-size:14.03530121px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:start;line-height:125%;writing-mode:lr-tb;text-anchor:start;fill:#fff;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1;font-family:Arial" x="244.26051" y="55.85825" id="text2177" transform="scale(1.0107951,0.9893202)" sodipodi:linespacing="125%"><tspan sodipodi:role="line" id="tspan2179" x="244.26051" y="55.85825">®</tspan></text>
      </g>
    </svg>
  </div>
  <br><br><br>
</div>
<div class="intelGrammar">
    <h1><font family="Arial">INTEL<SUP>&reg;</SUP></font></h1>
</div>
</header>
</div>


<!--Layout-----------------------START-->
<div class="content">
<SECTION>
<article>
  <font family="Verdana"><center><p><h1><font size="6">Please select a category:</font></h1></p></center>
  <!--  ../../Pages/INTEL/Internet/CPU  -->
    <input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">
    <center><button class="TabsBtn" onclick="internet()"><b>Internet, Office, Simple Gaming, Movies</b></button></center>
  <BR>
  <!--  ../../Pages/INTEL/SimpleEdit/CPU  -->
    <!--input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="simpleEdit()"><b>Simple Edit</b></button></center>
  <BR>
  <!--  ../../Pages/INTEL/ModerateGaming/CPU  -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="moderateGaming()"><b>Moderate Gaming</b></button></center>
  <BR>
  <!--  ../../Pages/INTEL/Gaming1080p/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="gaming1080p()"><b>Hard Gaming in 1080p</b></button></center>
  <BR>
  <!--  ../../Pages/INTEL/Gaming1440p/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="gaming1440p()"><b>Hard Gaming in 1440p</b></button></center>
  <BR>
  <!--  ../../Pages/INTEL/ProfessionalUse/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="prof()"><b>Heavy Professional Use</b></button></center>
  <BR></font>
  
  <script>
    var myWindow;

    //Internet, Office, Simple Gaming, Movies
    function internet() {
        myWindow = window.open("INTEL/Internet/CPU");
    }
    //Internet, Office, Simple Gaming, Movies

    //Simple edit
    function simpleEdit() {
        myWindow = window.open("INTEL/SimpleEdit/CPU");
    }
    //Simple edit

    //Moderate Gaming
    function moderateGaming() {
        myWindow = window.open("INTEL/ModerateGaming/CPU");
    }
    //Moderate Gaming

    //Gaming 1080p
    function gaming1080p() {
        myWindow = window.open("INTEL/Gaming1080p/CPU");
    }
    //Gaming 1080p

    //Gaming 1440p
    function gaming1440p() {
        myWindow = window.open("INTEL/Gaming1440p/CPU");
    }
    //Gaming 1440p

    //Professional use
    function prof() {
        myWindow = window.open("INTEL/ProfessionalUse/CPU");
    }
    //Professional use
  </script>
</article>
</section>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<footer>

	<!--END OF SHEET-->
    <img src="../../logo/pictureForTabs.png" width="25%" height="25%" ALT="PC Builder" HSPACE="30">
    <br>
    <h4><FONT COLOR="white">Created and designed by Tsalmas Anastasios ©</FONT></H4>
    <br>
	<!--END OF SHEET-->

</footer>

<!--Layout-----------------------END-->
</div>

<script>
//ΜΠΑΡΑ ΕΠΙΛΟΓΩΝ
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
//ΜΠΑΡΑ ΕΠΙΛΟΓΩΝ
</script>

<script>
// When the user scrolls down 20px from the top of the document, put the box-shadow
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myTopnav").style.boxShadow = "0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19)";
  } else {
	document.getElementById("myTopnav").style.boxShadow = "";
  }
}
</script>

</BODY>

</HTML>