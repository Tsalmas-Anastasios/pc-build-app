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
  if (!isset($_POST["brandModelCPU"])) {
    header("Location: /Pages/you-made-a-mistake.html");
    die();
  }

  //WHAT CPU?-----------------------------------------------
  $cpu_explode = explode(' ', $_POST["brandModelCPU"]);
  $cpu_upper = "";
  $cpu = "";
  foreach($cpu_explode as $cpu_explode) {
    $cpu_upper = strtoupper($cpu_explode);
    if ($cpu_upper == "AMD") {
      $cpu = "AMD";
    } elseif ($cpu_upper == "INTEL") {
      $cpu = "INTEL";
    }
  }
  //WHAT CPU?-----------------------------------------------
?>

<!doctype html>
<html lang="en">
    <head>
        <!--HOME PAGE STYLESHEETS-->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="../../../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
	<TITLE>PC Build App-PC Builder-Ready PC Build-Category:<?php echo $_POST["categoryCPU"]; ?>/LED for Desk select</TITLE>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../../../StyleSheets/AMD/Layout.css">-->
    <link rel="stylesheet" href="../../../StyleSheets/AMD/LayoutNot.css">
    <link rel="stylesheet" href="../../../StyleSheets/TopNav.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--HOME PAGE STYLESHEETS-->

    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ProductCards-other-pages-other-products.css">
    <link rel="stylesheet" href="../../../StyleSheets/AMD/ButtonsAll.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ModalBoxFilters.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/specsRadioButtonsFilters.css">
    <link rel="stylesheet" href="../../../StyleSheets/Under800px.css">
    <link rel="stylesheet" href="../../../StyleSheets/AMD/tablesInBigPCBuilder.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/SearchBar.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ButtonToGoWithoutChange-fromOtherPages.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/CheckBoxesForFilters.css">

    <!--FOR LIGHT COLORS-->
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/rgb.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/rgbw.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/physic-white.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/cold-white.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/warm-white.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/red.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/blue.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/purple.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/yellow.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/orange.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/green.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/ledDesk-page/led-colors/pink.css">
    <!--FOR LIGHT COLORS-->

	<style>
		img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    		display: none;
		}
		
		/*ΠΛΑΓΙΑ ΓΡΑΜΜΗ ΠΑΝΩ ΑΠΟ ΤΗΝ ΠΑΛΙΑ ΤΙΜΗ*/
        .lineStrike{
        background-color: transparent;
        background-image: gradient(linear, 19.1% -7.9%, 81% 107.9%, color-stop(0, black), color-stop(.48, black), color-stop(.5, black), color-stop(.52, black), color-stop(1, transparent));
        background-image: repeating-linear-gradient(163deg, transparent 0%, transparent 48%, #333333 50%, transparent 52%,     transparent 100%);
        font-weight: bold;
        }
        /*ΠΛΑΓΙΑ ΓΡΑΜΜΗ ΠΑΝΩ ΑΠΟ ΤΗΝ ΠΑΛΙΑ ΤΙΜΗ*/

	</style>

<style>
    .readyPiece {
        text-decoration: none;
        cursor: pointer;
    }

    .readyPiece:hover {
		  text-decoration: underline;
	  }
</style>

<!--TABLE WHEN PRODUCT CARDS IS MIIN-->
<style>
.tableSpecsMin {
  font-family: Verdana;
  border-collapse: collapse;
  width: 100%;
  font-size: 13px;
}

.NameOfSpecsMin {
  border: 1px solid white;
  text-align: left;
  padding: 8px;
}

.FromDatabaseSpecsMin {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  background-color: #dddddd
}

.KEFALIDAmin {
  text-align: left;
  padding: 8px;
}
</style>
<!--TABLE WHEN PRODUCT CARDS IS MIIN-->

<style>
  .frameForProductCards {
	  border: 2px solid #1a0033fa;
	  border-radius: 10px;
  }
</style>

<style>

.imgLogoLinkForEShop{
    width: 50%;
    top: 50;
  }

</style>

    </head>

    <BODY BGCOLOR="#ccc" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0" onresize="WindowResize()" onload="WindowResize()" oncontextmenu="return false">

<!--WHEN THE USER IS MOTHER FUCKER-->
<div id="error" style="display:none;">
    <br><br>
  <div style="color:#1a0033fa;">&nbsp;&nbsp;&nbsp;&nbsp;<b><font family="Verdana"><font size="7">You haven't access in this page with this way</font></font></b></div>
  <br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;<font family="Verdana"><font size="5"><font color="#333333">Go to </font><b><a href="../../../index" style="text-decoration: none; color: #1a0033fa;">HOME PAGE</a></b><br>
  &nbsp;&nbsp;&nbsp;<font color="#333333">or you can make your </font><b><a href="../../../Pages/PCBuilderAMD" style="text-decoration: none; color: #1a0033fa;">AMD PC BUILD</a></b><font color="#333333"> or </font><b><a href="../../../Pages/PCBuilderINTEL" style="text-decoration: none; color: #1a0033fa;">INTEL PC BUILD</a></b></font></font>
<br><br><br>
<center><a href="../../../index"><img src="../../../logo/LogoRight.png" align="middle" alt="logo" class="imgLogoLinkForEShop"></a><!-- width="14%" --></center>
<br><br>
</div>
<!--WHEN THE USER IS MOTHER FUCKER-->

<!--WHEN THE USER IS RIGHT-->
<div id="main">    
<!--NAVBAR-----------------------MENU IN HOMESCREEN-START----------->
<!--TopNav-->
<div id="myTopnav" class="topnav" style="z-index: 9999;">
  <a href="../../../index"><i class="fa fa-fw fa-home"></i> Home</a>
  <div class="dropdown">
	<button class="active"><i class="fas fa-desktop"></i> PC Builder
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <?php
        if ($cpu == "AMD") {
        ?>
          <a href="../../../Pages/PCBuilderAMD" class="active"><i class="fas fa-desktop"></i> AMD</a>
          <a href="../../../Pages/PCBuilderINTEL"><i class="fas fa-desktop"></i> Intel</a>
        <?php
        } else {
        ?>
          <a href="../../../Pages/PCBuilderAMD"><i class="fas fa-desktop"></i> AMD</a>
          <a href="../../../Pages/PCBuilderINTEL" class="active"><i class="fas fa-desktop"></i> Intel</a>
        <?php
        }
      ?>
      
	    <a href="../../../Pages/service/index"><i class="fas fa-tools"></i> Service</a>
    </div>
  </div>
  <a href="../../../eshop/index" target="_blank"><i class="fas fa-cart-arrow-down"></i> e-Shop</a>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-user-friends"></i> Friends
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../../friends/index" target="_blank"><i class="fas fa-user-friends"></i> Friends</a>
	  <a href="../../../friends/chat" target="_blank"><i class="fas fa-comments"></i> Chat</a>
    </div>
  </div>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-lightbulb"></i> Tips
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../../forum/index"><i class="fas fa-comment-alt"></i> Forum</a>
	  <a href="../../../instructions/index"><i class="fas fa-question"></i> How to...</a>
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
      <a href="../../../Pages/report-a-problem"><i class="fas fa-exclamation-triangle"></i> Report a problem</a>
	  <a href="#partners"><i class="fas fa-store-alt"></i> Partner Shops</a>
  	  <a href="#aboutUs"><i class="far fa-address-card"></i> About Us</a>
    </div>
  </div>
  <?php
	if (isset($_SESSION["username"]) and isset($_SESSION["email"])) {
		//THE USER HAS LOGGED IN
		?>
			<a href="../../../sign-in/dashboard.php" class="account"><i class="fas fa-user-circle"></i> <?php echo $_SESSION["username"]; ?></a>
		<?php
	} else {
		//THE USER HASN'T LOGGED IN
		echo '<a href="../../../sign-in/login" class="account"><i class="fas fa-user-circle"></i> Account</a>';
	}
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--TopNav-->
<!--Layout-----------------------START-->

<!--<div class="header">
	<header>
  <img src="../../../Pictures/AMD_logo_for_PCBuilderAMD_home.png" class="pictureAMDLogo"/>
  <div class="categoryHeader">
    <center><p><b>Internet, Office, Simple Gaming, Movies</b></p></center>
  </div>
</header>
</div>-->

<div class="content">
<SECTION>
    <article>
        
    <div class="backToCategoriesButton">
        <?php
        echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="formButtonChange" name="formButtonChange">';
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
            echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
            //FOR CPU
            echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
            echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
            ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
            echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
            echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
            echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
            echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
            echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
            echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
            //FOR CPU
            //FOR MOTHERBOARD
            echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
            echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
            echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
            echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
            echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
            echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
            echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
            echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
            echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
            echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
            echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
            echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
            echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
            //FOR MOTHERBOARD
            //DATA FROM RAM CHOOSE
            echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
            echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
            echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
            echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
            echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
            echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
            //DATA FROM RAM CHOOSE
            //DATA FROM GPU CHOOSE
            echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
            echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
            echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
            echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
            echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
            echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
            echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
            //DATA FROM GPU CHOOSE
            //DATA FROM PSU CHOOSE
            echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
            echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
            echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
            echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
            echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
            echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
            //DATA FROM PSU CHOOSE
            //DATA FROM HARD DRIVE CHOOSE
            echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
            echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
            echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
            echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
            echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
            echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
            echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
            //DATA FROM HARD DRIVE CHOOSE
            //DATA FROM PC CASE CHOOSE
            echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
            echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
            echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
            echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
            echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
            echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
            //DATA FROM PC CASE CHOOSE
            //DATA FROM SECOND RAM
            if (isset($_POST["RAM2Piece"])) {
              echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
              echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
              echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
              echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
              echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
              echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
            }
            //DATA FROM SECOND RAM
            //DATA FROM SECOND HARD DRIVE
            if (isset($_POST["HARD2Piece"])) {
                echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
            }
            //DATA FROM SECOND HARD DRIVE
            //DATA FROM SOFTWARE
            if (isset($_POST["SOFTPiece"])) {
                echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
            }
            //DATA FROM SOFTWARE
            //DATA FROM COOLER FOR CPU
            if (isset($_POST["COOLERPiece"])) {
                echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
            }
            //DATA FROM COOLER FOR CPU
            //DATA FROM FAN FOR PC CASE
            if (isset($_POST["FANPiece"])) {
                echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
            }
            //DATA FROM FAN FOR PC CASE
            //DATA FROM MONITOR
            if (isset($_POST["MONITORPiece"])) {
                echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
            }
            //DATA FROM MONITOR
            //DATA FROM KEYBOARD
            if (isset($_POST["KEYBPiece"])) {
                echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
            }
            //DATA FROM KEYBOARD
            //DATA FROM MOUSE
            if (isset($_POST["MOUSEPiece"])) {
                echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
            }
            //DATA FROM MOUSE
            //DATA FROM CHAIR
            if (isset($_POST["CHAIRPiece"])) {
                echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
            }
            //DATA FROM CHAIR
            //DATA FROM SPEAKERS
            if (isset($_POST["SPEAKERPiece"])) {
                echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
            }
            //DATA FROM SPEAKERS
            //DATA FROM MICROPHONE
            if (isset($_POST["MICROPiece"])) {
                echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
            }
            //DATA FROM MICROPHONE
            //DATA FROM HEADERS
            if (isset($_POST["HEADERPiece"])) {
                echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
            }
            //DATA FROM HEADERS
            //DATA FROM UPS
            if (isset($_POST["UPSPiece"])) {
                echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
            }
            //DATA FROM UPS
            //DATA FROM LED IN PC CASE
            if (isset($_POST["LEDPCPiece"])) {
                echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
            }
            //DATA FROM LED IN PC CASE
            //DATA FROM LED IN DESK
            if (isset($_POST["LEDDESKPiece"])) {
                echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
            }
            //DATA FROM LED IN DESK
            //DATA FROM OPTICAL DRIVE
            if (isset($_POST["OPTICALPiece"])) {
                echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
            }
            //DATA FROM OPTICAL DRIVE
            //DATA FROM SOUND CARD
            if (isset($_POST["SOUNDPiece"])) {
                echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
            }
            //DATA FROM SOUND CARD
            //DATA FROM PRINTER
            if (isset($_POST["PRINTPiece"])) {
                echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
            }
            //DATA FROM PRINTER
            //DATA FROM SCANNER
            if (isset($_POST["SCANPiece"])) {
                echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
            }
            //DATA FROM SCANNER
            //DATA FROM BLUETOOTH ADAPTERS
            if (isset($_POST["BLUEPiece"])) {
                echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
            }
            //DATA FROM BLUETOOTH ADAPTERS
            echo '<button class="button-go-without-changing" id="button-go-without-changing"><i class="fas fa-arrow-right"></i></button>';
            echo '</form>';
        ?>
    </div>

    <br><font color="#ccc" style="visibility: hidden;"><div id="cardHow"></div></font>
    
    <br><br>
    <style>
    * {
        box-sizing: border-box;
    }

    .columnPictureSpecs {
        float: left;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .rowPictureSpecs::after {
        content: "";
        clear: both;
        display: table;
    }
    </style>

<br><div class="frameForProductCards">
<?php
if ($_POST["brandModelCPU"] != "") {
    $onoma_for_title = 0;
    //RESULTS
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
        
        //MODAL------------START------------------
        echo '<button type="button" class="open-modal" data-open="modal1" onclick="displayRadioValue();diskSizeFunction();">
        <i class="fas fa-filter"></i> Filters
        </button>';
        
        //------------------------------------FORM FOR SEARCH------------------------------------------
          echo '<div id="br-before-search-engine"></div>';
            echo '<form method="post" accept-charset="utf-8" autocomplete="off" onsubmit="return forCorrectSubmit()">';
                echo '<center><input type="text" id="searchBar" name="searchBar" placeholder="Search..." class="searchBar" value="';
                if (isset($_POST["searchBar"])) {
                    echo $_POST["searchBar"];
                } else {
                    echo "";
                } 
                echo '"></center>';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                //FOR CPU
                echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                //FOR CPU
                //FOR MOTHERBOARD
                echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                //FOR MOTHERBOARD
                //DATA FROM RAM CHOOSE
                echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                //DATA FROM RAM CHOOSE
                //DATA FROM GPU CHOOSE
                echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                //DATA FROM GPU CHOOSE
                //DATA FROM PSU CHOOSE
                echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                //DATA FROM PSU CHOOSE
                //DATA FROM HARD DRIVE CHOOSE
                echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                //DATA FROM HARD DRIVE CHOOSE
                //DATA FROM PC CASE CHOOSE
                echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                //DATA FROM PC CASE CHOOSE
                //DATA FROM SECOND RAM
                if (isset($_POST["RAM2Piece"])) {
                    echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                    echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                    echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                    echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                    echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                }
                //DATA FROM SECOND RAM
                //DATA FROM SECOND HARD DRIVE
                if (isset($_POST["HARD2Piece"])) {
                    echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                    echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                    echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                }
                //DATA FROM SECOND HARD DRIVE
                //DATA FROM SOFTWARE
                if (isset($_POST["SOFTPiece"])) {
                    echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                    echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                    echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                    echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                }
                //DATA FROM SOFTWARE
                //DATA FROM COOLER FOR CPU
                if (isset($_POST["COOLERPiece"])) {
                    echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                    echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                    echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                    echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                    echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                }
                //DATA FROM COOLER FOR CPU
                //DATA FROM FAN FOR PC CASE
                if (isset($_POST["FANPiece"])) {
                    echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                    echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                    echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                    echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                }
                //DATA FROM FAN FOR PC CASE
                //DATA FROM MONITOR
                if (isset($_POST["MONITORPiece"])) {
                    echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                    echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                    echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                    echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                    echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                }
                //DATA FROM MONITOR
                //DATA FROM KEYBOARD
                if (isset($_POST["KEYBPiece"])) {
                    echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                    echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                    echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                    echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                    echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                    echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                }
                //DATA FROM KEYBOARD
                //DATA FROM MOUSE
                if (isset($_POST["MOUSEPiece"])) {
                    echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                    echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                    echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                    echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                }
                //DATA FROM MOUSE
                //DATA FROM CHAIR
                if (isset($_POST["CHAIRPiece"])) {
                    echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                    echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                    echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                    echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                    echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                }
                //DATA FROM CHAIR
                //DATA FROM SPEAKERS
                if (isset($_POST["SPEAKERPiece"])) {
                    echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                    echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                    echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                    echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                    echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                }
                //DATA FROM SPEAKERS
                //DATA FROM MICROPHONE
                if (isset($_POST["MICROPiece"])) {
                    echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                    echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                    echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                    echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                    echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                }
                //DATA FROM MICROPHONE
                //DATA FROM HEADERS
                if (isset($_POST["HEADERPiece"])) {
                    echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                    echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                    echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                    echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                    echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                }
                //DATA FROM HEADERS
                //DATA FROM UPS
                if (isset($_POST["UPSPiece"])) {
                    echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                    echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                    echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                    echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                    echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                    echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                }
                //DATA FROM UPS
                //DATA FROM LED IN PC CASE
                if (isset($_POST["LEDPCPiece"])) {
                    echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                    echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                    echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                }
                //DATA FROM LED IN PC CASE
                //DATA FROM LED IN DESK
                if (isset($_POST["LEDDESKPiece"])) {
                    echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                    echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                    echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                }
                //DATA FROM LED IN DESK
                //DATA FROM OPTICAL DRIVE
                if (isset($_POST["OPTICALPiece"])) {
                    echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                    echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                    echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                    echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                    echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                    echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                }
                //DATA FROM OPTICAL DRIVE
                //DATA FROM SOUND CARD
                if (isset($_POST["SOUNDPiece"])) {
                    echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                    echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                    echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                    echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                }
                //DATA FROM SOUND CARD
                //DATA FROM PRINTER
                if (isset($_POST["PRINTPiece"])) {
                    echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                    echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                    echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                    echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                    echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                }
                //DATA FROM PRINTER
                //DATA FROM SCANNER
                if (isset($_POST["SCANPiece"])) {
                    echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                    echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                    echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                    echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                }
                //DATA FROM SCANNER
                //DATA FROM BLUETOOTH ADAPTERS
                if (isset($_POST["BLUEPiece"])) {
                    echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                    echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                    echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                    echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                    echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                }
                //DATA FROM BLUETOOTH ADAPTERS
            echo '</form>';
            echo '<div class="br-after-form-for-search"><br /></div>';
            //------------------------------------FORM FOR SEARCH------------------------------------------

        echo '<form method="post" name="formFiltersModal"><div class="modal" id="modal1">
          <div class="modal-dialog" style="width: 700px;">
            <header class="modal-header">
              <font color="black"><div class="headerInModal">Choose your filters!&nbsp;</div></font>
              <button type="button" class="close-modal" aria-label="close modal" data-close onclick="showBigFiltersButton()">✕</button>
            </header>
            <section class="modal-content">
              
                <input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
                //FILTERS----------------------------------------------------------------------------------------------
                //DATA FROM DATABASE TABLE AND COUNT VARIABLES --- START
                  if (isset($_POST["rgbColour"]) or isset($_POST["rgbwColour"]) or isset($_POST["physicWhiteColour"]) or isset($_POST["coldWhiteColour"]) or isset($_POST["warmWhiteColour"]) or isset($_POST["redColour"]) or isset($_POST["blueColour"]) or isset($_POST["purpleColour"]) or isset($_POST["yellowColour"]) or isset($_POST["orangeColour"]) or isset($_POST["greenColour"]) or isset($_POST["pinkColour"]) or isset($_POST["remoteFeature"]) or isset($_POST["setFeature"]) or isset($_POST["waterFeature"]) or isset($_POST["wifiFeature"]) or isset($_POST["movementFeature"]) or isset($_POST["lengthSubmit"]) or isset($_POST["psuSubmit"]) or isset($_POST["typeSubmit"])) {
                    $keywords = "";
                    $key = "";
                    if (isset($_POST["rgbColour"])) {
                      $key = $_POST["rgbColour"];
                      $keywords = " colour LIKE '%$key%'";
                    }
                    if (isset($_POST["rgbwColour"])) {
                      $key = $_POST["rgbwColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["physicWhiteColour"])) {
                      $key = $_POST["physicWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["coldWhiteColour"])) {
                      $key = $_POST["coldWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["warmWhiteColour"])) {
                      $key = $_POST["warmWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["redColour"])) {
                      $key = $_POST["redColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["blueColour"])) {
                      $key = $_POST["blueColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["purpleColour"])) {
                      $key = $_POST["purpleColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["yellowColour"])) {
                      $key = $_POST["yellowColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["orangeColour"])) {
                      $key = $_POST["orangeColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["greenColour"])) {
                      $key = $_POST["greenColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["pinkColour"])) {
                      $key = $_POST["pinkColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["remoteFeature"])) {
                      $key = $_POST["remoteFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["setFeature"])) {
                      $key = $_POST["setFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["waterFeature"])) {
                      $key = $_POST["waterFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["wifiFeature"])) {
                      $key = $_POST["wifiFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["movementFeature"])) {
                      $key = $_POST["movementFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["lengthSubmit"])) {
                      $key = $_POST["lengthSubmit"];
                      if ($key == "1") {
                        if ($keywords == "") {
                          $keywords = " length<=1";
                        } else {
                          $keywords .= " AND length<=1";
                        }
                      } elseif ($key == "5") {
                        if ($keywords == "") {
                          $keywords = " length>1 AND length<=5";
                        } else {
                          $keywords .= " AND length>1 AND length<=5";
                        }
                      } elseif ($key == "10") {
                        if ($keywords == "") {
                          $keywords = " length>5 AND length<=10";
                        } else {
                          $keywords .= " AND length>5 AND length<=10";
                        }
                      } elseif ($keywords == "20") {
                        if ($keywords == "") {
                          $keywords = " length>10 AND length<=20";
                        } else {
                          $keywords .= " AND length>10 AND length<=20";
                        }
                      } elseif ($key == "21") {
                        if ($keywords == "") {
                          $keywords = " length>20";
                        } else {
                          $keywords .= " AND length>20";
                        }
                      }
                    }
                    if (isset($_POST["psuSubmit"])) {
                      $key = $_POST["psuSubmit"];
                      if ($keywords == "") {
                        $keywords = " psu='$key'";
                      } else {
                        $keywords .= " AND psu='$key'";
                      }
                    }
                    if (isset($_POST["typeSubmit"])) {
                      $key = $_POST["typeSubmit"];
                      if ($keywords == "") {
                        $keywords = " led_type='$key'";
                      } else {
                        $keywords .= " AND led_type='$key'";
                      }
                    }
                    $sql = "SELECT * FROM Led_Desk WHERE$keywords";
                  } else {
                    $sql = "SELECT * FROM Led_Desk";
                  }
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    //Variables for light colour---START
                    $rgb = 0;
                    $rgbw = 0;
                    $physic_white = 0;
                    $cold_white = 0;
                    $warm_white = 0;
                    $red = 0;
                    $blue = 0;
                    $purple = 0;
                    $yellow = 0;
                    $orange = 0;
                    $green = 0;
                    $pink = 0;
                    //Variables for light colour---END
                    //Variables for features---START
                    $remote_control = 0;
                    $set = 0;
                    $water_resistance = 0;
                    $wifi = 0;
                    $movement = 0;
                    //Variables for features---END
                    //Variables for length---START
                    $length1 = 0;
                    $length5 = 0;
                    $length10 = 0;
                    $length20 = 0;
                    $length21 = 0;
                    //Variables for length---END
                    //Variables for power supply---START
                    $battery = 0;
                    $usb = 0;
                    $v12 = 0;
                    $v24 = 0;
                    $v220 = 0;
                    //Variables for power supply---END
                    //Variables for led type---START
                    $neon = 0;
                    $t5050 = 0;
                    $t2835 = 0;
                    $t3528 = 0;
                    $t5730 = 0;
                    $t3014 = 0;
                    $t5630 = 0;
                    $ws2811 = 0;
                    $t2812 = 0;
                    $t3030 = 0;
                    $t2538 = 0;
                    $t4014 = 0;
                    $t5054 = 0;
                    $t2216 = 0;
                    $t2528 = 0;
                    $t5025 = 0;
                    $t3527 = 0;
                    //Variables for led type---END
                    while($row = $result->fetch_assoc()) {
                      //LED COLOUR---START
                      $explode = explode(',', $row["colour"]);
                      foreach($explode as $explode) {
                        if ($explode == "RGB") {
                          $rgb++;
                        } elseif ($explode == "RGBW") {
                          $rgbw++;
                        } elseif ($explode == "Physic white") {
                          $physic_white++;
                        } elseif ($explode == "Cold white") {
                          $cold_white++;
                        } elseif ($explode == "Warm white") {
                          $warm_white++;
                        } elseif ($explode == "Red") {
                          $red++;
                        } elseif ($explode == "Blue") {
                          $blue++;
                        } elseif ($explode == "Purple") {
                          $purple++;
                        } elseif ($explode == "Yellow") {
                          $yellow++;
                        } elseif ($explode == "Orange") {
                          $orange++;
                        } elseif ($explode == "Green") {
                          $green++;
                        } elseif ($explode == "Pink") {
                          $pink++;
                        }
                      }
                      //LED COLOUR---END
                      //FEATURES---START
                      $explode = explode(',', $row["contain"]);
                      foreach($explode as $explode) {
                        if ($explode == "Remote control") {
                          $remote_control++;
                        } elseif ($explode == "Set") {
                          $set++;
                        } elseif ($explode == "(Waterproofing)") {
                          $water_resistance++;
                        } elseif ($explode == "Wi-Fi") {
                          $wifi++;
                        } elseif ($explode == "Motion sensor") {
                          $movement++;
                        }
                      }
                      //FEATURES---END
                      //LENGTH---START
                      if ($row["length"] <= 1) {
                        $length1++;
                      } elseif ($row["length"] > 1 and $row["length"] <= 5) {
                        $length5++;
                      } elseif ($row["length"] > 5 and $row["length"] <= 10) {
                        $length10++;
                      } elseif ($row["length"] < 10 and $row["length"] <= 20) {
                        $length20++;
                      } elseif ($row["length"] > 20) {
                        $length21++;
                      }
                      //LENGTH---END
                      //POWER SUPPLY---START
                      if ($row["psu"] == "Battery") {
                        $battery++;
                      } elseif ($row["psu"] == "USB (5V)") {
                        $usb++;
                      } elseif ($row["psu"] == "12V") {
                        $v12++;
                      } elseif ($row["psu"] == "24V") {
                        $v24++;
                      } elseif ($row["psu"] == "220V") {
                        $v220++;
                      }
                      //POWER SUPPLY---END
                      //LED TYPE---START
                      if ($row["led_type"] == "Neon") {
                        $neon++;
                      } elseif ($row["led_type"] == "5050") {
                        $t5050++;
                      } elseif ($row["led_type"] == "2835") {
                        $t2835++;
                      } elseif ($row["led_type"] == "3528") {
                        $t3528++;
                      } elseif ($row["led_type"] == "5730") {
                        $t5730++;
                      } elseif ($row["led_type"] == "3014") {
                        $t3014++;
                      } elseif ($row["led_type"] == "5630") {
                        $t5630++;
                      } elseif ($row["led_type"] == "WS2811") {
                        $ws2811++;
                      } elseif ($row["led_type"] == "2812") {
                        $t2812++;
                      } elseif ($row["led_type"] == "3030") {
                        $t3030++;
                      } elseif ($row["led_type"] == "2538") {
                        $t2538++;
                      } elseif ($row["led_type"] == "4014") {
                        $t4014++;
                      } elseif ($row["led_type"] == "5054") {
                        $t5054++;
                      } elseif ($row["led_type"] == "2216") {
                        $t2216++;
                      } elseif ($row["led_type"] == "2528") {
                        $t2528++;
                      } elseif ($row["led_type"] == "5025") {
                        $t5025++;
                      } elseif ($row["led_type"] == "3527") {
                        $t3527++;
                      }
                      //LED TYPE---END
                    }
                  }

                  $not_isset = 0;
                  //NUMBER OF ISSETS: 17
                  if (!isset($_POST["rgbColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["rgbwColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["physicWhiteColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["coldWhiteColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["warmWhiteColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["redColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["blueColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["purpleColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["yellowColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["orangeColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["greenColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["pinkColour"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["remoteFeature"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["setFeature"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["waterFeature"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["wifiFeature"])) {
                    $not_isset++;
                  }
                  if (!isset($_POST["movementFeature"])) {
                    $not_isset++;
                  }
                  
                  //IF ONLY 1 SUBMIT EXISTS (only for optionboxes) --- START
                    //FOR $_POST["lengthSubmit"]---START
                    if (isset($_POST["lengthSubmit"]) and !isset($_POST["psuSubmit"]) and !isset($_POST["typeSubmit"]) and $not_isset == 0) {
                      //Variables for length---START
                      $length1 = 0;
                      $length5 = 0;
                      $length10 = 0;
                      $length20 = 0;
                      $length21 = 0;
                      //Variables for length---END
                      $sql = "SELECT * FROM Led_Desk";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //LENGTH---START
                          if ($row["length"] <= 1) {
                            $length1++;
                          } elseif ($row["length"] > 1 and $row["length"] <= 5) {
                            $length5++;
                          } elseif ($row["length"] > 5 and $row["length"] <= 10) {
                            $length10++;
                          } elseif ($row["length"] < 10 and $row["length"] <= 20) {
                            $length20++;
                          } elseif ($row["length"] > 20) {
                            $length21++;
                          }
                          //LENGTH---END
                        }
                      }
                    }
                    //FOR $_POST["lengthSubmit"]---END
                    //FOR $_POST["psuSubmit"]---START
                    if (!isset($_POST["lengthSubmit"]) and isset($_POST["psuSubmit"]) and !isset($_POST["typeSubmit"]) and $not_isset == 0) {
                      //Variables for power supply---START
                      $battery = 0;
                      $usb = 0;
                      $v12 = 0;
                      $v24 = 0;
                      $v220 = 0;
                      //Variables for power supply---END
                      $sql = "SELECT * FROM Led_Desk";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //POWER SUPPLY---START
                          if ($row["pus"] == "Battery") {
                            $battery++;
                          } elseif ($row["psu"] == "USB (5V)") {
                            $usb++;
                          } elseif ($row["psu"] == "12V") {
                            $v12++;
                          } elseif ($row["psu"] == "24V") {
                            $v24++;
                          } elseif ($row["psu"] == "220V") {
                            $v220++;
                          }
                          //POWER SUPPLY---END
                        }
                      }
                    }
                    //FOR $_POST["psuSubmit"]---END
                    //FOR $_POST["typeSubmit"]---START
                    if (!isset($_POST["lengthSubmit"]) and !isset($_POST["psuSubmit"]) and isset($_POST["typeSubmit"]) and $not_isset == 0) {
                      //Variables for led type---START
                      $neon = 0;
                      $t5050 = 0;
                      $t2835 = 0;
                      $t3528 = 0;
                      $t5730 = 0;
                      $t3014 = 0;
                      $t5630 = 0;
                      $ws2811 = 0;
                      $t2812 = 0;
                      $t3030 = 0;
                      $t2538 = 0;
                      $t4014 = 0;
                      $t5054 = 0;
                      $t2216 = 0;
                      $t2528 = 0;
                      $t5025 = 0;
                      $t3527 = 0;
                      //Variables for led type---END
                      $sql = "SELECT * FROM Led_Desk";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //LED TYPE---START
                          if ($row["led_type"] == "Neon") {
                            $neon++;
                          } elseif ($row["led_type"] == "5050") {
                            $t5050++;
                          } elseif ($row["led_type"] == "2835") {
                            $t2835++;
                          } elseif ($row["led_type"] == "3528") {
                            $t3528++;
                          } elseif ($row["led_type"] == "5730") {
                            $t5730++;
                          } elseif ($row["led_type"] == "3014") {
                            $t3014++;
                          } elseif ($row["led_type"] == "5630") {
                            $t5630++;
                          } elseif ($row["led_type"] == "WS2811") {
                            $ws2811++;
                          } elseif ($row["led_type"] == "2812") {
                            $t2812++;
                          } elseif ($row["led_type"] == "3030") {
                            $t3030++;
                          } elseif ($row["led_type"] == "2538") {
                            $t2538++;
                          } elseif ($row["led_type"] == "4014") {
                            $t4014++;
                          } elseif ($row["led_type"] == "5054") {
                            $t5054++;
                          } elseif ($row["led_type"] == "2216") {
                            $t2216++;
                          } elseif ($row["led_type"] == "2528") {
                            $t2528++;
                          } elseif ($row["led_type"] == "5025") {
                            $t5025++;
                          } elseif ($row["led_type"] == "3527") {
                            $t3527++;
                          }
                          //LED TYPE---END
                        }
                      }
                    }
                    //FOR $_POST["typeSubmit"]---END
                  //IF ONLY 1 SUBMIT EXISTS (only for optionboxes) --- END
                  //IF 2 ISSETS (both option and check boxes) --- START
                    $issetCategory = 0;
                    if (isset($_POST["lengthSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["psuSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["typeSubmit"])) {
                      $issetCategory++;
                    }

                    //SEE IF CHECKBOXES ARE ISSET---START
                    $keywords = "";
                    $key = "";
                    if (isset($_POST["rgbColour"])) {
                      $key = $_POST["rgbColour"];
                      $keywords = " colour LIKE '%$key%'";
                    }
                    if (isset($_POST["rgbwColour"])) {
                      $key = $_POST["rgbwColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["physicWhiteColour"])) {
                      $key = $_POST["physicWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["coldWhiteColour"])) {
                      $key = $_POST["coldWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["warmWhiteColour"])) {
                      $key = $_POST["warmWhiteColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["redColour"])) {
                      $key = $_POST["redColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["blueColour"])) {
                      $key = $_POST["blueColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["purpleColour"])) {
                      $key = $_POST["purpleColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["yellowColour"])) {
                      $key = $_POST["yellowColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["orangeColour"])) {
                      $key = $_POST["orangeColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["greenColour"])) {
                      $key = $_POST["greenColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["pinkColour"])) {
                      $key = $_POST["pinkColour"];
                      if ($keywords == "") {
                        $keywords = " colour LIKE '%$key%'";
                      } else {
                        $keywords .= " AND colour LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["remoteFeature"])) {
                      $key = $_POST["remoteFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["setFeature"])) {
                      $key = $_POST["setFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["waterFeature"])) {
                      $key = $_POST["waterFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["wifiFeature"])) {
                      $key = $_POST["wifiFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    if (isset($_POST["movementFeature"])) {
                      $key = $_POST["movementFeature"];
                      if ($keywords == "") {
                        $keywords = " contain LIKE '%$key%'";
                      } else {
                        $keywords .= " AND contain LIKE '%$key%'";
                      }
                    }
                    //SEE IF CHECKBOXES ARE ISSET---END

                    //FOR $_POST["lengthSubmit"]---START
                    if (isset($_POST["lengthSubmit"]) and (isset($_POST["psuSubmit"]) or isset($_POST["typeSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["lengthSubmit"];
                      if ($keywords == "") {
                        if ($key == "1") {
                          $sql = "SELECT * FROM Led_Desk WHERE length<=1";
                        } elseif ($key == "5") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>1 AND length<=5";
                        } elseif ($key == "10") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>5 AND length<=10";
                        } elseif ($key == "20") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>10 AND length<=20";
                        } elseif ($key == "21") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>20";
                        }
                      } else {
                        if ($key == "1") {
                          $sql = "SELECT * FROM Led_Desk WHERE length<=1 AND$keywords";
                        } elseif ($key == "5") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>1 AND length<=5 AND$keywords";
                        } elseif ($key == "10") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>5 AND length<=10 AND$keywords";
                        } elseif ($key == "20") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>10 AND length<=20 AND$keywords";
                        } elseif ($key == "21") {
                          $sql = "SELECT * FROM Led_Desk WHERE length>20 AND$keywords";
                        }
                      }
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["psuSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for power supply---START
                          $battery = 0;
                          $usb = 0;
                          $v12 = 0;
                          $v24 = 0;
                          $v220 = 0;
                          //Variables for power supply---END
                        }
                        if (isset($_POST["typeSubmit"])) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for led type---START
                          $neon = 0;
                          $t5050 = 0;
                          $t2835 = 0;
                          $t3528 = 0;
                          $t5730 = 0;
                          $t3014 = 0;
                          $t5630 = 0;
                          $ws2811 = 0;
                          $t2812 = 0;
                          $t3030 = 0;
                          $t2538 = 0;
                          $t4014 = 0;
                          $t5054 = 0;
                          $t2216 = 0;
                          $t2528 = 0;
                          $t5025 = 0;
                          $t3527 = 0;
                          //Variables for led type---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //POWER SUPPLY---START
                            if ($row["pus"] == "Battery") {
                              $battery++;
                            } elseif ($row["psu"] == "USB (5V)") {
                              $usb++;
                            } elseif ($row["psu"] == "12V") {
                              $v12++;
                            } elseif ($row["psu"] == "24V") {
                              $v24++;
                            } elseif ($row["psu"] == "220V") {
                              $v220++;
                            }
                            //POWER SUPPLY---END
                          } elseif ($isset == 2) {
                            //LED TYPE---START
                            if ($row["led_type"] == "Neon") {
                              $neon++;
                            } elseif ($row["led_type"] == "5050") {
                              $t5050++;
                            } elseif ($row["led_type"] == "2835") {
                              $t2835++;
                            } elseif ($row["led_type"] == "3528") {
                              $t3528++;
                            } elseif ($row["led_type"] == "5730") {
                              $t5730++;
                            } elseif ($row["led_type"] == "3014") {
                              $t3014++;
                            } elseif ($row["led_type"] == "5630") {
                              $t5630++;
                            } elseif ($row["led_type"] == "WS2811") {
                              $ws2811++;
                            } elseif ($row["led_type"] == "2812") {
                              $t2812++;
                            } elseif ($row["led_type"] == "3030") {
                              $t3030++;
                            } elseif ($row["led_type"] == "2538") {
                              $t2538++;
                            } elseif ($row["led_type"] == "4014") {
                              $t4014++;
                            } elseif ($row["led_type"] == "5054") {
                              $t5054++;
                            } elseif ($row["led_type"] == "2216") {
                              $t2216++;
                            } elseif ($row["led_type"] == "2528") {
                              $t2528++;
                            } elseif ($row["led_type"] == "5025") {
                              $t5025++;
                            } elseif ($row["led_type"] == "3527") {
                              $t3527++;
                            }
                            //LED TYPE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["lengthSubmit"]---END
                    //FOR $_POST["psuSubmit"]---START
                    if (isset($_POST["psuSubmit"]) and (isset($_POST["lengthSubmit"]) or isset($_POST["typeSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["psuSubmit"];
                      if ($keywords == "") {
                        $sql = "SELECT * FROM Led_Desk WHERE psu='$key'";
                      } else {
                        $sql = "SELECT * FROM Led_Desk WHERE psu='$key' AND$keywords";
                      }
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["lengthSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for length---START
                          $length1 = 0;
                          $length5 = 0;
                          $length10 = 0;
                          $length20 = 0;
                          $length21 = 0;
                          //Variables for length---END
                        }
                        if (isset($_POST["typeSubmit"]) and $issetStep == 0) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for led type---START
                          $neon = 0;
                          $t5050 = 0;
                          $t2835 = 0;
                          $t3528 = 0;
                          $t5730 = 0;
                          $t3014 = 0;
                          $t5630 = 0;
                          $ws2811 = 0;
                          $t2812 = 0;
                          $t3030 = 0;
                          $t2538 = 0;
                          $t4014 = 0;
                          $t5054 = 0;
                          $t2216 = 0;
                          $t2528 = 0;
                          $t5025 = 0;
                          $t3527 = 0;
                          //Variables for led type---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //LENGTH---START
                            if ($row["length"] <= 1) {
                              $length1++;
                            } elseif ($row["length"] > 1 and $row["length"] <= 5) {
                              $length5++;
                            } elseif ($row["length"] > 5 and $row["length"] <= 10) {
                              $length10++;
                            } elseif ($row["length"] < 10 and $row["length"] <= 20) {
                              $length20++;
                            } elseif ($row["length"] > 20) {
                              $length21++;
                            }
                            //LENGTH---END
                          } elseif ($isset == 2) {
                            //LED TYPE---START
                            if ($row["led_type"] == "Neon") {
                              $neon++;
                            } elseif ($row["led_type"] == "5050") {
                              $t5050++;
                            } elseif ($row["led_type"] == "2835") {
                              $t2835++;
                            } elseif ($row["led_type"] == "3528") {
                              $t3528++;
                            } elseif ($row["led_type"] == "5730") {
                              $t5730++;
                            } elseif ($row["led_type"] == "3014") {
                              $t3014++;
                            } elseif ($row["led_type"] == "5630") {
                              $t5630++;
                            } elseif ($row["led_type"] == "WS2811") {
                              $ws2811++;
                            } elseif ($row["led_type"] == "2812") {
                              $t2812++;
                            } elseif ($row["led_type"] == "3030") {
                              $t3030++;
                            } elseif ($row["led_type"] == "2538") {
                              $t2538++;
                            } elseif ($row["led_type"] == "4014") {
                              $t4014++;
                            } elseif ($row["led_type"] == "5054") {
                              $t5054++;
                            } elseif ($row["led_type"] == "2216") {
                              $t2216++;
                            } elseif ($row["led_type"] == "2528") {
                              $t2528++;
                            } elseif ($row["led_type"] == "5025") {
                              $t5025++;
                            } elseif ($row["led_type"] == "3527") {
                              $t3527++;
                            }
                            //LED TYPE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["psuSubmit"]---END
                    //FOR $_POST["typeSubmit"]---START
                    if (isset($_POST["typeSubmit"]) and (isset($_POST["lengthSubmit"]) or isset($_POST["psuSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["typeSubmit"];
                      if ($keywords == "") {
                        $sql = "SELECT * FROM Led_Desk WHERE type='$key'";
                      } else {
                        $sql = "SELECT * FROM Led_Desk WHERE type='$key' AND$keywords";
                      }
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["lengthSubmit"])) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for length---START
                          $length1 = 0;
                          $length5 = 0;
                          $length10 = 0;
                          $length20 = 0;
                          $length21 = 0;
                          //Variables for length---END
                        }
                        if (isset($_POST["psuSubmit"])) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for power supply---START
                          $battery = 0;
                          $usb = 0;
                          $v12 = 0;
                          $v24 = 0;
                          $v220 = 0;
                          //Variables for power supply---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //LENGTH---START
                            if ($row["length"] <= 1) {
                              $length1++;
                            } elseif ($row["length"] > 1 and $row["length"] <= 5) {
                              $length5++;
                            } elseif ($row["length"] > 5 and $row["length"] <= 10) {
                              $length10++;
                            } elseif ($row["length"] < 10 and $row["length"] <= 20) {
                              $length20++;
                            } elseif ($row["length"] > 20) {
                              $length21++;
                            }
                            //LENGTH---END
                          } elseif ($isset == 2) {
                            //POWER SUPPLY---START
                            if ($row["pus"] == "Battery") {
                              $battery++;
                            } elseif ($row["psu"] == "USB (5V)") {
                              $usb++;
                            } elseif ($row["psu"] == "12V") {
                              $v12++;
                            } elseif ($row["psu"] == "24V") {
                              $v24++;
                            } elseif ($row["psu"] == "220V") {
                              $v220++;
                            }
                            //POWER SUPPLY---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeSubmit"]---END
                  //IF 2 ISSETS (both option and check boxes) --- END
                //DATA FROM DATABASE TABLE AND COUNT VARIABLES --- END
                //CREATE OPTION AND CHECK BOXES---START
                  //FOR LED COLOUR --- START
                    if ($rgb > 0 or $rgbw > 0 or $physic_white > 0 or $cold_white > 0 or $warm_white > 0 or $red > 0 or $blue > 0 or $purple > 0 or $yellow > 0 or $orange > 0 or $green > 0 or $pink > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Light colour</b>
                      </p><br>';
                        if ($rgb > 0) {
                          echo '<label class="containerCheckBoxRGB">RGB ('. $rgb.')
                            <input type="checkbox" class="CheckBoxRGB" name="rgbColour" id="RGB" value="RGB" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxRGB"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">RGB (0)</font>
                            <input type="checkbox" class="CheckBox" id="RGB" name="rgbColour" value="RGB" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($rgbw > 0) {
                          echo '<label class="containerCheckBoxRGBW">RGBW ('. $rgbw.')
                            <input type="checkbox" class="CheckBoxRGBW" name="rgbwColour" id="RGBW" value="RGBW" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxRGBW"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">RGBW (0)</font>
                            <input type="checkbox" class="CheckBox" id="RGBW" name="rgbwColour" value="RGBW" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($physic_white > 0) {
                          echo '<label class="containerCheckBoxPhysic-White">Physic white ('. $physic_white.')
                            <input type="checkbox" class="CheckBoxPhysic-White" name="physicWhiteColour" id="Physicwhite" value="Physic white" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxPhysic-White"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Physic white (0)</font>
                            <input type="checkbox" class="CheckBox" id="Physicwhite" name="physicWhiteColour" value="Physic white" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($cold_white > 0) {
                          echo '<label class="containerCheckBoxCold-White">Cold white ('. $cold_white.')
                            <input type="checkbox" class="CheckBoxCold-White" name="coldWhiteColour" id="Coldwhite" value="Cold white" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxCold-White"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Cold white (0)</font>
                            <input type="checkbox" class="CheckBox" id="Coldwhite" name="coldWhiteColour" value="Cold white" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($warm_white > 0) {
                          echo '<label class="containerCheckBoxWarm-White">Warm white ('. $warm_white.')
                            <input type="checkbox" class="CheckBoxWarm-White" name="warmWhiteColour" id="Warmwhite" value="Warm white" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxWarm-White"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Warm white (0)</font>
                            <input type="checkbox" class="CheckBox" id="Warmwhite" name="warmWhiteColour" value="Warm white" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($red > 0) {
                          echo '<label class="containerCheckBoxRed">Red ('. $red.')
                            <input type="checkbox" class="CheckBoxRed" name="redColour" id="Red" value="Red" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxRed"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Red (0)</font>
                            <input type="checkbox" class="CheckBox" id="Red" name="redColour" value="Red" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($blue > 0) {
                          echo '<label class="containerCheckBoxBlue">Blue ('. $blue.')
                            <input type="checkbox" class="CheckBoxBlue" name="blueColour" id="Blue" value="Blue" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxBlue"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Blue (0)</font>
                            <input type="checkbox" class="CheckBox" id="Blue" name="blueColour" value="Blue" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($purple > 0) {
                          echo '<label class="containerCheckBoxPurple">Purple ('. $purple.')
                            <input type="checkbox" class="CheckBoxPurple" name="purpleColour" id="Purple" value="Purple" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxPurple"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Purple (0)</font>
                            <input type="checkbox" class="CheckBox" id="Purple" name="purpleColour" value="Purple" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($yellow > 0) {
                          echo '<label class="containerCheckBoxYellow">Yellow ('. $yellow.')
                            <input type="checkbox" class="CheckBoxYellow" name="yellowColour" id="Yellow" value="Yellow" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxYellow"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Yellow (0)</font>
                            <input type="checkbox" class="CheckBox" id="Yellow" name="yellowColour" value="Yellow" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($orange > 0) {
                          echo '<label class="containerCheckBoxOrange">Orange ('. $orange.')
                            <input type="checkbox" class="CheckBoxOrange" name="orangeColour" id="Orange" value="Orange" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxOrange"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Orange (0)</font>
                            <input type="checkbox" class="CheckBox" id="Orange" name="orangeColour" value="Orange" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($green > 0) {
                          echo '<label class="containerCheckBoxGreen">Green ('. $green.')
                            <input type="checkbox" class="CheckBoxGreen" name="greenColour" id="Green" value="Green" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxGreen"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Green (0)</font>
                            <input type="checkbox" class="CheckBox" id="Green" name="greenColour" value="Green" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($pink > 0) {
                          echo '<label class="containerCheckBoxPink">Pink ('. $pink.')
                            <input type="checkbox" class="CheckBoxPink" name="pinkColour" id="Pink" value="Pink" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBoxPink"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Pink (0)</font>
                            <input type="checkbox" class="CheckBox" id="Pink" name="pinkColour" value="Pink" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                      if ($remote_control > 0 or $Set > 0 or $water_resistance > 0 or $wifi > 0 or $movement > 0 or $length1 > 0 or $length5 > 0 or $length10 > 0 or $length20 > 0 or $length21 > 0 or $battery > 0 or $usb > 0 or $v12 > 0 or $v24 > 0 or $v220 > 0 or $neon > 0 or $t5050 > 0 or $t2835 > 0 or $t3528 > 0 or $t5730 > 0 or $t3014 > 0 or $t5630 > 0 or $ws2811 > 0 or $t2812 > 0 or $t3030 > 0 or $t2538 > 0 or $t4014 > 0 or $t5054 > 0 or $t2216 > 0 or $t2528 > 0 or $t5025 > 0 or $t3527 > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //FOR LED COLOUR --- END
                  //FOR FEATURES --- START
                    if ($remote_control > 0 or $set > 0 or $water_resistance > 0 or $wifi > 0 or $movement > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Features</b>
                      </p><br>';
                        if ($remote_control > 0) {
                          echo '<label class="containerCheckBox">Remote control ('. $remote_control.')
                            <input type="checkbox" class="CheckBox" id="Remotecontrol" name="remoteFeature" value="Remote control" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Remote control (0)</font>
                            <input type="checkbox" class="CheckBox" id="Remotecontrol" name="remoteFeature" value="Remote control" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($set > 0) {
                          echo '<label class="containerCheckBox">Set ('. $set.')
                            <input type="checkbox" class="CheckBox" id="Set" name="setFeature" value="Set" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Set (0)</font>
                            <input type="checkbox" class="CheckBox" id="Set" name="setFeature" value="Set" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($water_resistance > 0) {
                          echo '<label class="containerCheckBox">(Waterproofing) ('. $water_resistance.')
                            <input type="checkbox" class="CheckBox" id="Waterresistance" name="waterFeature" value="(Waterproofing)" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">(Waterproofing) (0)</font>
                            <input type="checkbox" class="CheckBox" id="Waterresistance" name="waterFeature" value="(Waterproofing)" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($wifi > 0) {
                          echo '<label class="containerCheckBox">Wi-Fi ('. $wifi.')
                            <input type="checkbox" class="CheckBox" id="Wi_Fi" name="wifiFeature" value="Wi-Fi" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Wi-Fi (0)</font>
                            <input type="checkbox" class="CheckBox" id="Wi_Fi" name="wifiFeature" value="Wi-Fi" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                        if ($movement > 0) {
                          echo '<label class="containerCheckBox">Motion sensor ('. $movement.')
                            <input type="checkbox" class="CheckBox" id="Motionsensor" name="movementFeature" value="Motion sensor" onclick="footerModal();submitForFilters()">
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        } else {
                          echo '<label class="containerCheckBox"><font color="#b3b3b3">Motion sensor (0)</font>
                            <input type="checkbox" class="CheckBox" id="Motionsensor" name="movementFeature" value="Motion sensor" disabled>
                            <span class="checkmarkCheckBox"></span>
                          </label>';
                        }
                      if ($length1 > 0 or $length5 > 0 or $length10 > 0 or $length20 > 0 or $length21 > 0 or $battery > 0 or $usb > 0 or $v12 > 0 or $v24 > 0 or $v220 > 0 or $neon > 0 or $t5050 > 0 or $t2835 > 0 or $t3528 > 0 or $t5730 > 0 or $t3014 > 0 or $t5630 > 0 or $ws2811 > 0 or $t2812 > 0 or $t3030 > 0 or $t2538 > 0 or $t4014 > 0 or $t5054 > 0 or $t2216 > 0 or $t2528 > 0 or $t5025 > 0 or $t3527 > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //FOR FEATURES --- END
                  //FOR LENGTH --- START
                    if ($length1 > 0 or $length5 > 0 or $length10 > 0 or $length20 > 0 or $length21 > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Length</b>
                      </p><br>';
                        if ($length1 > 0) {
                          echo '<label class="containerRadioButton">Up to 1m ('. $length1. ')
                            <input type="radio" name="lengthSubmit" id="length1" value="1" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Up to 1m (0)</font>
                            <input type="radio" name="lengthSubmit" id="length1" value="1" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($length5 > 0) {
                          echo '<label class="containerRadioButton">1m - 5m ('. $length5. ')
                            <input type="radio" name="lengthSubmit" id="length5" value="5" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">1m - 5m (0)</font>
                            <input type="radio" name="lengthSubmit" id="length5" value="5" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($length10 > 0) {
                          echo '<label class="containerRadioButton">5m - 10m ('. $length10. ')
                            <input type="radio" name="lengthSubmit" id="length10" value="10" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5m - 10m (0)</font>
                            <input type="radio" name="lengthSubmit" id="length10" value="10" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($length20 > 0) {
                          echo '<label class="containerRadioButton">10m - 20m ('. $length20. ')
                            <input type="radio" name="lengthSubmit" id="length20" value="20" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">10m - 20m (0)</font>
                            <input type="radio" name="lengthSubmit" id="length20" value="20" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($length21 > 0) {
                          echo '<label class="containerRadioButton">More than 20m ('. $length21. ')
                            <input type="radio" name="lengthSubmit" id="length21" value="21" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">More than 20m (0)</font>
                            <input type="radio" name="lengthSubmit" id="length21" value="21" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                      if ($battery > 0 or $usb > 0 or $v12 > 0 or $v24 > 0 or $v220 > 0 or $neon > 0 or $t5050 > 0 or $t2835 > 0 or $t3528 > 0 or $t5730 > 0 or $t3014 > 0 or $t5630 > 0 or $ws2811 > 0 or $t2812 > 0 or $t3030 > 0 or $t2538 > 0 or $t4014 > 0 or $t5054 > 0 or $t2216 > 0 or $t2528 > 0 or $t5025 > 0 or $t3527 > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //FOR LENGTH --- END
                  //FOR POWER SUPPLY --- START
                    if ($battery > 0 or $usb > 0 or $v12 > 0 or $v24 > 0 or $v220 > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Power Supply</b>
                      </p><br>';
                        if ($battery > 0) {
                          echo '<label class="containerRadioButton">Battery ('. $battery. ')
                            <input type="radio" name="psuSubmit" id="Battery" value="Battery" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Battery (0)</font>
                            <input type="radio" name="psuSubmit" id="Battery" value="Battery" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($usb > 0) {
                          echo '<label class="containerRadioButton">USB (5V) ('. $usb. ')
                            <input type="radio" name="psuSubmit" id="USB" value="USB (5V)" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">USB (5V) (0)</font>
                            <input type="radio" name="psuSubmit" id="USB" value="USB (5V)" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($v12 > 0) {
                          echo '<label class="containerRadioButton">12V ('. $v12. ')
                            <input type="radio" name="psuSubmit" id="V12" value="12V" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">12V (0)</font>
                            <input type="radio" name="psuSubmit" id="V12" value="12V" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($v24 > 0) {
                          echo '<label class="containerRadioButton">24V ('. $v24. ')
                            <input type="radio" name="psuSubmit" id="V24" value="24V" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">24V (0)</font>
                            <input type="radio" name="psuSubmit" id="V24" value="24V" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($v220 > 0) {
                          echo '<label class="containerRadioButton">220V ('. $v220. ')
                            <input type="radio" name="psuSubmit" id="V220" value="220V" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">220V (0)</font>
                            <input type="radio" name="psuSubmit" id="V220" value="220V" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                      if ($neon > 0 or $t5050 > 0 or $t2835 > 0 or $t3528 > 0 or $t5730 > 0 or $t3014 > 0 or $t5630 > 0 or $ws2811 > 0 or $t2812 > 0 or $t3030 > 0 or $t2538 > 0 or $t4014 > 0 or $t5054 > 0 or $t2216 > 0 or $t2528 > 0 or $t5025 > 0 or $t3527 > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //FOR POWER SUPPLY --- END
                  //FOR LED TYPE --- START
                    if ($neon > 0 or $t5050 > 0 or $t2835 > 0 or $t3528 > 0 or $t5730 > 0 or $t3014 > 0 or $t5630 > 0 or $ws2811 > 0 or $t2812 > 0 or $t3030 > 0 or $t2538 > 0 or $t4014 > 0 or $t5054 > 0 or $t2216 > 0 or $t2528 > 0 or $t5025 > 0 or $t3527 > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Led type</b>
                      </p><br>';
                        if ($neon > 0) {
                          echo '<label class="containerRadioButton">Neon ('. $neon. ')
                            <input type="radio" name="typeSubmit" id="Neon" value="Neon" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Neon (0)</font>
                            <input type="radio" name="typeSubmit" id="Neon" value="Neon" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t5050 > 0) {
                          echo '<label class="containerRadioButton">5050 ('. $t5050. ')
                            <input type="radio" name="typeSubmit" id="t5050" value="5050" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5050 (0)</font>
                            <input type="radio" name="typeSubmit" id="t5050" value="5050" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t2835 > 0) {
                          echo '<label class="containerRadioButton">2835 ('. $t2835. ')
                            <input type="radio" name="typeSubmit" id="t2835" value="2835" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">2835 (0)</font>
                            <input type="radio" name="typeSubmit" id="t2835" value="2835" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t3528 > 0) {
                          echo '<label class="containerRadioButton">3528 ('. $t3528. ')
                            <input type="radio" name="typeSubmit" id="t3528" value="3528" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">3528 (0)</font>
                            <input type="radio" name="typeSubmit" id="t3528" value="3528" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t5730 > 0) {
                          echo '<label class="containerRadioButton">5730 ('. $t5730. ')
                            <input type="radio" name="typeSubmit" id="t5730" value="5730" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5730 (0)</font>
                            <input type="radio" name="typeSubmit" id="t5730" value="5730" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t3014 > 0) {
                          echo '<label class="containerRadioButton">3014 ('. $t3014. ')
                            <input type="radio" name="typeSubmit" id="t3014" value="3014" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">3014 (0)</font>
                            <input type="radio" name="typeSubmit" id="t3014" value="3014" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t5630 > 0) {
                          echo '<label class="containerRadioButton">3014 ('. $t5630. ')
                            <input type="radio" name="typeSubmit" id="t5630" value="5630" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5630 (0)</font>
                            <input type="radio" name="typeSubmit" id="t5630" value="5630" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($ws2811 > 0) {
                          echo '<label class="containerRadioButton">WS2811 ('. $ws2811. ')
                            <input type="radio" name="typeSubmit" id="WS2811" value="WS2811" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">WS2811 (0)</font>
                            <input type="radio" name="typeSubmit" id="WS2811" value="WS2811" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t2812 > 0) {
                          echo '<label class="containerRadioButton">2812 ('. $ws2811. ')
                            <input type="radio" name="typeSubmit" id="t2812" value="2812" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">2812 (0)</font>
                            <input type="radio" name="typeSubmit" id="t2812" value="2812" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t3030 > 0) {
                          echo '<label class="containerRadioButton">3030 ('. $t3030. ')
                            <input type="radio" name="typeSubmit" id="t3030" value="3030" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">3030 (0)</font>
                            <input type="radio" name="typeSubmit" id="t3030" value="3030" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t2538 > 0) {
                          echo '<label class="containerRadioButton">2538 ('. $t2538. ')
                            <input type="radio" name="typeSubmit" id="t2538" value="2538" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">2538 (0)</font>
                            <input type="radio" name="typeSubmit" id="t2538" value="2538" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t4014 > 0) {
                          echo '<label class="containerRadioButton">4014 ('. $t4014. ')
                            <input type="radio" name="typeSubmit" id="t4014" value="4014" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">4014 (0)</font>
                            <input type="radio" name="typeSubmit" id="t4014" value="4014" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t5054 > 0) {
                          echo '<label class="containerRadioButton">5054 ('. $t5054. ')
                            <input type="radio" name="typeSubmit" id="t5054" value="5054" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5054 (0)</font>
                            <input type="radio" name="typeSubmit" id="t5054" value="5054" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t2216 > 0) {
                          echo '<label class="containerRadioButton">2216 ('. $t2216. ')
                            <input type="radio" name="typeSubmit" id="t2216" value="2216" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">2216 (0)</font>
                            <input type="radio" name="typeSubmit" id="t2216" value="2216" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t2528 > 0) {
                          echo '<label class="containerRadioButton">2528 ('. $t2528. ')
                            <input type="radio" name="typeSubmit" id="t2528" value="2528" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">2528 (0)</font>
                            <input type="radio" name="typeSubmit" id="t2528" value="2528" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t5025 > 0) {
                          echo '<label class="containerRadioButton">5025 ('. $t5025. ')
                            <input type="radio" name="typeSubmit" id="t5025" value="5025" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">5025 (0)</font>
                            <input type="radio" name="typeSubmit" id="t5025" value="5025" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($t3527 > 0) {
                          echo '<label class="containerRadioButton">3527 ('. $t3527. ')
                            <input type="radio" name="typeSubmit" id="t3527" value="3527" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">3527 (0)</font>
                            <input type="radio" name="typeSubmit" id="t3527" value="3527" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                    }
                  //FOR LED TYPE --- END
                //CREATE OPTION AND CHECK BOXES---START
                //FILTERS----------------------------------------------------------------------------------------------
                echo '<!----------------------Inputs for CPU-MOTHERBOARD-RAM-GPU-PSU-HARD DRVIE---------------------->';
                //FOR CPU
                echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                //FOR CPU
                //FOR MOTHERBOARD
                echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                //FOR MOTHERBOARD
                //DATA FROM RAM CHOOSE
                echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                //DATA FROM RAM CHOOSE
                //DATA FROM GPU CHOOSE
                echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                //DATA FROM GPU CHOOSE
                //DATA FROM PSU CHOOSE
                echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                //DATA FROM PSU CHOOSE
                //DATA FROM HARD DRIVE CHOOSE
                echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                //DATA FROM HARD DRIVE CHOOSE
                //DATA FROM PC CASE CHOOSE
                echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                //DATA FROM PC CASE CHOOSE
                //DATA FROM SECOND RAM
                if (isset($_POST["RAM2Piece"])) {
                  echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                  echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                  echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                  echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                  echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                  echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                }
                //DATA FROM SECOND RAM
                //DATA FROM SECOND HARD DRIVE
                if (isset($_POST["HARD2Piece"])) {
                    echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                    echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                    echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                }
                //DATA FROM SECOND HARD DRIVE
                //DATA FROM SOFTWARE
                if (isset($_POST["SOFTPiece"])) {
                    echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                    echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                    echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                    echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                }
                //DATA FROM SOFTWARE
                //DATA FROM COOLER FOR CPU
                if (isset($_POST["COOLERPiece"])) {
                    echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                    echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                    echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                    echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                    echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                }
                //DATA FROM COOLER FOR CPU
                //DATA FROM FAN FOR PC CASE
                if (isset($_POST["FANPiece"])) {
                    echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                    echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                    echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                    echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                }
                //DATA FROM FAN FOR PC CASE
                //DATA FROM MONITOR
                if (isset($_POST["MONITORPiece"])) {
                    echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                    echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                    echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                    echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                    echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                }
                //DATA FROM MONITOR
                //DATA FROM KEYBOARD
                if (isset($_POST["KEYBPiece"])) {
                    echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                    echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                    echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                    echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                    echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                    echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                }
                //DATA FROM KEYBOARD
                //DATA FROM MOUSE
                if (isset($_POST["MOUSEPiece"])) {
                    echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                    echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                    echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                    echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                }
                //DATA FROM MOUSE
                //DATA FROM CHAIR
                if (isset($_POST["CHAIRPiece"])) {
                    echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                    echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                    echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                    echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                    echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                }
                //DATA FROM CHAIR
                //DATA FROM SPEAKERS
                if (isset($_POST["SPEAKERPiece"])) {
                    echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                    echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                    echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                    echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                    echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                }
                //DATA FROM SPEAKERS
                //DATA FROM MICROPHONE
                if (isset($_POST["MICROPiece"])) {
                    echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                    echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                    echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                    echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                    echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                }
                //DATA FROM MICROPHONE
                //DATA FROM HEADERS
                if (isset($_POST["HEADERPiece"])) {
                    echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                    echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                    echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                    echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                    echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                }
                //DATA FROM HEADERS
                //DATA FROM UPS
                if (isset($_POST["UPSPiece"])) {
                    echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                    echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                    echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                    echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                    echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                    echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                }
                //DATA FROM UPS
                //DATA FROM LED IN PC CASE
                if (isset($_POST["LEDPCPiece"])) {
                    echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                    echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                    echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                }
                //DATA FROM LED IN PC CASE
                //DATA FROM LED IN DESK
                if (isset($_POST["LEDDESKPiece"])) {
                    echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                    echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                    echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                }
                //DATA FROM LED IN DESK
                //DATA FROM OPTICAL DRIVE
                if (isset($_POST["OPTICALPiece"])) {
                    echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                    echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                    echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                    echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                    echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                    echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                }
                //DATA FROM OPTICAL DRIVE
                //DATA FROM SOUND CARD
                if (isset($_POST["SOUNDPiece"])) {
                    echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                    echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                    echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                    echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                }
                //DATA FROM SOUND CARD
                //DATA FROM PRINTER
                if (isset($_POST["PRINTPiece"])) {
                    echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                    echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                    echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                    echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                    echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                }
                //DATA FROM PRINTER
                //DATA FROM SCANNER
                if (isset($_POST["SCANPiece"])) {
                    echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                    echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                    echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                    echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                }
                //DATA FROM SCANNER
                //DATA FROM BLUETOOTH ADAPTERS
                if (isset($_POST["BLUEPiece"])) {
                    echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                    echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                    echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                    echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                    echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                }
                //DATA FROM BLUETOOTH ADAPTERS
                echo '<!----------------------Inputs for CPU-MOTHERBOARD-RAM-GPU-PSU-HARD DRVIE---------------------->';
            echo '</section>
            <!----------------------Buttons for form---------------------->
              <footer class="modal-footer" id="buttonsForFilters" style="display:none;">
                <div>
                  <p>';
                    //<button class="submitButtonOnModalBox" name="submitFilters" value="submit">Submit</button>
                    echo '<button class="clearButtonOnModalBox" name="clearFilters" value="clear" onclick="clearFiltersFunction()">Clear</button>
                  </p>
                </div>
              </footer>
              <!--SCRIPT FOR CLEAR FILTERS-->
                <script>
                  function clearFiltersFunction() {';
                    $key_javascript = "";
                    $something_explode = "";

                    //LIGHT COLOUR---START
                    if (isset($_POST["rgbColour"])) {
                      $key_javascript = $_POST["rgbColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["rgbwColour"])) {
                      $key_javascript = $_POST["rgbwColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["physicWhiteColour"])) {
                      $something_explode = explode(' ', $_POST["physicWhiteColour"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["coldWhiteColour"])) {
                      $something_explode = explode(' ', $_POST["coldWhiteColour"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["warmWhiteColour"])) {
                      $something_explode = explode(' ', $_POST["warmWhiteColour"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["redColour"])) {
                      $key_javascript = $_POST["redColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["blueColour"])) {
                      $key_javascript = $_POST["blueColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["purpleColour"])) {
                      $key_javascript = $_POST["purpleColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["yellowColour"])) {
                      $key_javascript = $_POST["yellowColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["orangeColour"])) {
                      $key_javascript = $_POST["orangeColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["greenColour"])) {
                      $key_javascript = $_POST["greenColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["pinkColour"])) {
                      $key_javascript = $_POST["pinkColour"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //LED COLOUR---END
                    //FEATURES --- START
                    if (isset($_POST["remoteFeature"])) {
                      $something_explode = explode(' ', $_POST["remoteFeature"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["setFeature"])) {
                      $key_javascript = $_POST["setFeature"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["waterFeature"])) {
                      $something_explode = explode(' ', $_POST["waterFeature"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["wifiFeature"])) {
                      $key_javascript = "Wi_Fi";
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    if (isset($_POST["movementFeature"])) {
                      $something_explode = explode(' ', $_POST["movementFeature"]);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //FEATURES --- END
                    //LENGTH --- START
                    if (isset($_POST["lengthSubmit"])) {
                      $key_javascript = "length". $_POST['lengthSubmit'];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //LENGTH --- END
                    //POWER SUPPLY --- START
                    if (isset($_POST["psuSubmit"])) {
                      if ($_POST["psuSubmit"] == "Battery") {
                        $key_javascript = "Battery";
                      } elseif ($_POST["psuSubmit"] == "USB (5V)") {
                        $key_javascript = "USB";
                      } elseif ($_POST["psuSubmit"] == "12V") {
                        $key_javascript = "V12";
                      } elseif ($_POST["psuSubmit"] == "24V") {
                        $key_javascript = "V24";
                      } elseif ($_POST["psuSubmit"] == "220V") {
                        $key_javascript = "V220";
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //POWER SUPPLY --- END
                    //LED TYPE --- START
                    if (isset($_POST["typeSubmit"])) {
                      if ($_POST["typeSubmit"] == "Neon" or $_POST["typeSubmit"] == "WS2811") {
                        $key_javascript = $_POST["typeSubmit"];
                      } else {
                        $key_javascript = "t". $_POST["typeSubmit"];
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //LED TYPE --- END
                  echo '}
                </script>';
              echo '<!--SCRIPT FOR CLEAR FILTERS-->
            <!----------------------Buttons for form---------------------->
          </div>
        </div></form>';
        //MODAL------------END------------------

        //------------------SEARCH ENGINE-----------------START----------------
        $notSearch = 1;
        $searcher = 0;
        if(isset($_POST["searchBar"])) {
          $searchBar = $_POST["searchBar"];
          if (strlen($searchBar) == 0 or strlen($searchBar) > 600) {
            $notSearch = 1;
            $searcher = 1;
          } elseif (strlen($searchBar) == 1) {
            $notSearch = 2;
            $searcher = 1;
          } else {
            $notSearch = 0;
            $searcher = 1;
          }
        }

          if ($searcher == 1) {
            if ($notSearch == 0) {
              $search_explode = explode(' ', $_POST["searchBar"]);
              $search_post = $_POST["searchBar"];
              $search_expression = "";
              $keywords = "";
              $x = 0;
              foreach($search_explode as $search_explode) {
                $x++;
                if ($x == 1) {
                $keywords .= "Description LIKE '%$search_explode%'";
                } else {
                $keywords .= " or Description LIKE '%$search_explode%'";
                }
                $search_expression .= $search_explode;
              }
              $sql = "SELECT * FROM Led_Desk WHERE Description LIKE '%$search_expression%'";
              $result = $conn->query($sql);
              if ($result->num_rows <= 0) {
                $sql = "SELECT * FROM Led_Desk WHERE Description LIKE '%$search_post%'";
                $result = $conn->query($sql);
                if ($result->num_rows <=0 ) {
                  $sql = "SELECT * FROM Led_Desk WHERE $keywords";
                  $result = $conn->query($sql);
                  if ($result->num_rows <= 0) {
                    $sql = "SELECT * FROM Led_Desk";
                    $result = $conn->query($sql);
                    echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
                  }
                }
              }
            } elseif ($notSearch == 1 or $notSearch == 2) {
              $sql = "SELECT * FROM Led_Desk";
              $result = $conn->query($sql);
              if ($notSearch == 2) {
                echo '<div class="no-one-character">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-one-character.png" alt="No results" class="no-one-character-img">
		<center><div class="no-one-character-message">
        	You can not search with only one character!
        </div></center>
    </div>';
              }
            }
            if ($result->num_rows > 0) {
              $onoma_for_title = 0;
              $brINbutton = 0;
  
              echo '<div id="cardMinBrFirst"></div>';
              while($row=$result->fetch_assoc()) {
                $onoma_for_title++;
                $ekptwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];
  
                //MAKE CARDS-START
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                    echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                    //FOR CPU
                    echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                    echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                    ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                    echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                    echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                    echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                    echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                    //FOR CPU
                    //FOR MOTHERBOARD
                    echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                    echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                    echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                    echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                    echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                    echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                    echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                    echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                    echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                    echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                    echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                    echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                    //FOR MOTHERBOARD
                    //DATA FROM RAM CHOOSE
                    echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                    echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                    echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                    echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                    echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                    echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                    //DATA FROM RAM CHOOSE
                    //DATA FROM GPU CHOOSE
                    echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                    echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                    echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                    echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                    echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                    echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                    echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                    //DATA FROM GPU CHOOSE
                    //DATA FROM PSU CHOOSE
                    echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                    echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                    echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                    echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                    echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                    echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                    //DATA FROM PSU CHOOSE
                    //DATA FROM HARD DRIVE CHOOSE
                    echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                    echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                    echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                    echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                    echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                    //DATA FROM HARD DRIVE CHOOSE
                    //DATA FROM PC CASE CHOOSE
                    echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                    echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                    echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                    echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                    echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                    echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                    //DATA FROM PC CASE CHOOSE
                    //DATA FROM SECOND RAM
                    if (isset($_POST["RAM2Piece"])) {
                        echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                        echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                        echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                        echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                        echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                        echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                    }
                    //DATA FROM SECOND RAM
                    //DATA FROM SECOND HARD DRIVE
                    if (isset($_POST["HARD2Piece"])) {
                        echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                        echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                        echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                        echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                        echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                        echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                    }
                    //DATA FROM SECOND HARD DRIVE
                    //DATA FROM SOFTWARE
                    if (isset($_POST["SOFTPiece"])) {
                        echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                        echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                        echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                        echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                        echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                    }
                    //DATA FROM SOFTWARE
                    //DATA FROM COOLER FOR CPU
                    if (isset($_POST["COOLERPiece"])) {
                        echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                        echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                        echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                        echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                        echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                    }
                    //DATA FROM COOLER FOR CPU
                    //DATA FROM FAN FOR PC CASE
                    if (isset($_POST["FANPiece"])) {
                        echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                        echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                        echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                        echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                        echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                        echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                    }
                    //DATA FROM FAN FOR PC CASE
                    //DATA FROM MONITOR
                    if (isset($_POST["MONITORPiece"])) {
                        echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                        echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                        echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                        echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                        echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                    }
                    //DATA FROM MONITOR
                    //DATA FROM KEYBOARD
                    if (isset($_POST["KEYBPiece"])) {
                        echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                        echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                        echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                        echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                        echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                        echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                    }
                    //DATA FROM KEYBOARD
                    //DATA FROM MOUSE
                    if (isset($_POST["MOUSEPiece"])) {
                        echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                        echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                        echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                        echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                        echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                    }
                    //DATA FROM MOUSE
                    //DATA FROM CHAIR
                    if (isset($_POST["CHAIRPiece"])) {
                        echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                        echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                        echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                        echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                        echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                        echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                    }
                    //DATA FROM CHAIR
                    //DATA FROM SPEAKERS
                    if (isset($_POST["SPEAKERPiece"])) {
                        echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                        echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                        echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                        echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                        echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                    }
                    //DATA FROM SPEAKERS
                    //DATA FROM MICROPHONE
                    if (isset($_POST["MICROPiece"])) {
                        echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                        echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                        echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                        echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                        echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                    }
                    //DATA FROM MICROPHONE
                    //DATA FROM HEADERS
                    if (isset($_POST["HEADERPiece"])) {
                        echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                        echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                        echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                        echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                        echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                    }
                    //DATA FROM HEADERS
                    //DATA FROM UPS
                    if (isset($_POST["UPSPiece"])) {
                        echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                        echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                        echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                        echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                        echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                        echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                    }
                    //DATA FROM UPS
                    //DATA FROM LED IN PC CASE
                    if (isset($_POST["LEDPCPiece"])) {
                        echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                        echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                        echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                        echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                        echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                        echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                    }
                    //DATA FROM LED IN PC CASE
                    //DATA FROM LED IN DESK
                    if (isset($_POST["LEDDESKPiece"])) {
                        echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                        echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                        echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                        echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                        echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                        echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                    }
                    //DATA FROM LED IN DESK
                    //DATA FROM OPTICAL DRIVE
                    if (isset($_POST["OPTICALPiece"])) {
                        echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                        echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                        echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                        echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                        echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                        echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                    }
                    //DATA FROM OPTICAL DRIVE
                    //DATA FROM SOUND CARD
                    if (isset($_POST["SOUNDPiece"])) {
                        echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                        echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                        echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                        echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                        echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                    }
                    //DATA FROM SOUND CARD
                    //DATA FROM PRINTER
                    if (isset($_POST["PRINTPiece"])) {
                        echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                        echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                        echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                        echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                        echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                        echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                    }
                    //DATA FROM PRINTER
                    //DATA FROM SCANNER
                    if (isset($_POST["SCANPiece"])) {
                        echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                        echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                        echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                        echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                        echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                    }
                    //DATA FROM SCANNER
                    //DATA FROM BLUETOOTH ADAPTERS
                    if (isset($_POST["BLUEPiece"])) {
                        echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                        echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                        echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                        echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                        echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                        echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                    }
                    //DATA FROM BLUETOOTH ADAPTERS
  
                    echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="Led for Desk">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                echo '<br><br><br><br><br>';
                echo '<button type="button" class="productCard-Button"></font></button>
                  <div class="specs">';
                    if ($row["Picture5"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 20%;
                              }
                            </style>';
                      if ($row["Picture9"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-3" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture9"]. '" alt="Picture-9" style="width: 100%"></div>';
                      } elseif ($row["Picture8"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                      } elseif ($row["Picture7"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                      } elseif ($row["Picture6"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      } else {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      }
                    } else {
                      if ($row["Picture4"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 25%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      } elseif ($row["Picture3"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 33.33%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      } elseif ($row["Picture2"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 50%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      } elseif ($row["Picture1"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 100%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      }
                    }
                    echo '<center><font color="black"><table class="tableSpecs">
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Length</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["length"]. 'm</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power supply</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["psu"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED density</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_p"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["power"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Waterproofing</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["water_resistance"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Contains</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["contain"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Colour</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["colour"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">White temperature</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["white_temp"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                }
                if ($brINbutton = 0) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  echo '<br><br>';
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                } elseif ($brINbutton = 1) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                }
                echo '</div>';
                //PRICE OF PRODUCTS
                echo '</div>';
                echo '</form>';
                echo '</div>';
                //PRODUCT CARDS MIN
                echo '<div class="cardMin" id="cardMin'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                    echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                    //FOR CPU
                    echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                    echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                    ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                    echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                    echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                    echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                    echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                    //FOR CPU
                    //FOR MOTHERBOARD
                    echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                    echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                    echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                    echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                    echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                    echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                    echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                    echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                    echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                    echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                    echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                    echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                    //FOR MOTHERBOARD
                    //DATA FROM RAM CHOOSE
                    echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                    echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                    echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                    echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                    echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                    echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                    //DATA FROM RAM CHOOSE
                    //DATA FROM GPU CHOOSE
                    echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                    echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                    echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                    echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                    echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                    echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                    echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                    //DATA FROM GPU CHOOSE
                    //DATA FROM PSU CHOOSE
                    echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                    echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                    echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                    echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                    echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                    echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                    //DATA FROM PSU CHOOSE
                    //DATA FROM HARD DRIVE CHOOSE
                    echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                    echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                    echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                    echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                    echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                    //DATA FROM HARD DRIVE CHOOSE
                    //DATA FROM PC CASE CHOOSE
                    echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                    echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                    echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                    echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                    echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                    echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                    //DATA FROM PC CASE CHOOSE
                    //DATA FROM SECOND RAM
                    if (isset($_POST["RAM2Piece"])) {
                        echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                        echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                        echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                        echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                        echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                        echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                    }
                    //DATA FROM SECOND RAM
                    //DATA FROM SECOND HARD DRIVE
                    if (isset($_POST["HARD2Piece"])) {
                        echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                        echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                        echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                        echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                        echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                        echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                    }
                    //DATA FROM SECOND HARD DRIVE
                    //DATA FROM SOFTWARE
                    if (isset($_POST["SOFTPiece"])) {
                        echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                        echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                        echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                        echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                        echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                    }
                    //DATA FROM SOFTWARE
                    //DATA FROM COOLER FOR CPU
                    if (isset($_POST["COOLERPiece"])) {
                        echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                        echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                        echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                        echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                        echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                    }
                    //DATA FROM COOLER FOR CPU
                    //DATA FROM FAN FOR PC CASE
                    if (isset($_POST["FANPiece"])) {
                        echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                        echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                        echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                        echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                        echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                        echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                    }
                    //DATA FROM FAN FOR PC CASE
                    //DATA FROM MONITOR
                    if (isset($_POST["MONITORPiece"])) {
                        echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                        echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                        echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                        echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                        echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                    }
                    //DATA FROM MONITOR
                    //DATA FROM KEYBOARD
                    if (isset($_POST["KEYBPiece"])) {
                        echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                        echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                        echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                        echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                        echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                        echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                    }
                    //DATA FROM KEYBOARD
                    //DATA FROM MOUSE
                    if (isset($_POST["MOUSEPiece"])) {
                        echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                        echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                        echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                        echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                        echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                    }
                    //DATA FROM MOUSE
                    //DATA FROM CHAIR
                    if (isset($_POST["CHAIRPiece"])) {
                        echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                        echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                        echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                        echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                        echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                        echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                    }
                    //DATA FROM CHAIR
                    //DATA FROM SPEAKERS
                    if (isset($_POST["SPEAKERPiece"])) {
                        echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                        echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                        echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                        echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                        echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                    }
                    //DATA FROM SPEAKERS
                    //DATA FROM MICROPHONE
                    if (isset($_POST["MICROPiece"])) {
                        echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                        echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                        echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                        echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                        echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                        echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                    }
                    //DATA FROM MICROPHONE
                    //DATA FROM HEADERS
                    if (isset($_POST["HEADERPiece"])) {
                        echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                        echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                        echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                        echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                        echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                        echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                    }
                    //DATA FROM HEADERS
                    //DATA FROM UPS
                    if (isset($_POST["UPSPiece"])) {
                        echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                        echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                        echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                        echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                        echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                        echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                    }
                    //DATA FROM UPS
                    //DATA FROM LED IN PC CASE
                    if (isset($_POST["LEDPCPiece"])) {
                        echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                        echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                        echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                        echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                        echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                        echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                    }
                    //DATA FROM LED IN PC CASE
                    //DATA FROM LED IN DESK
                    if (isset($_POST["LEDDESKPiece"])) {
                        echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                        echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                        echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                        echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                        echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                        echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                    }
                    //DATA FROM LED IN DESK
                    //DATA FROM OPTICAL DRIVE
                    if (isset($_POST["OPTICALPiece"])) {
                        echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                        echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                        echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                        echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                        echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                        echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                    }
                    //DATA FROM OPTICAL DRIVE
                    //DATA FROM SOUND CARD
                    if (isset($_POST["SOUNDPiece"])) {
                        echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                        echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                        echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                        echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                        echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                    }
                    //DATA FROM SOUND CARD
                    //DATA FROM PRINTER
                    if (isset($_POST["PRINTPiece"])) {
                        echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                        echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                        echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                        echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                        echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                        echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                    }
                    //DATA FROM PRINTER
                    //DATA FROM SCANNER
                    if (isset($_POST["SCANPiece"])) {
                        echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                        echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                        echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                        echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                        echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                        echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                    }
                    //DATA FROM SCANNER
                    //DATA FROM BLUETOOTH ADAPTERS
                    if (isset($_POST["BLUEPiece"])) {
                        echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                        echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                        echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                        echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                        echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                        echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                    }
                    //DATA FROM BLUETOOTH ADAPTERS
        
                  echo '<input type="hidden" id="pieceLEDDESK" name="LEDDESKPiece" value="Led for Desk">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                      echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED type</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_type"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Length</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["length"]. 'm</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power supply</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["psu"]. '</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED density</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_p"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Power</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["power"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Waterproofing</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["water_resistance"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Contains</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["conatin"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Colour</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["colour"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">White temperature</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["white_temp"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                      </table>';
                    echo '</div></center>';
                  echo '<br><p><button class="cardButtonMin">I Want This!</button></p>';
                  echo '</form>';
                  echo '</div>';
                  echo '<div id="brAfterCards'. $onoma_for_title. '"></div>';
                //PRODUCT CARDS MIN
              }
            }
          }
        //------------------SEARCH ENGINE-----------------END------------------
        $clearStep = 0;
        if (isset($_POST["clearFilters"])) {
          $clearStep = 1;
        }

        $isset_yes = 0;
        if (isset($_POST["rgbColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["rgbwColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["pysicWhiteColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["coldWhiteColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["warmWhiteColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["redColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["blueColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["purpleColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["yellowColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["orangeColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["greenColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["pinkColour"])) {
          $isset_yes++;
        }
        if (isset($_POST["remoteFeature"])) {
          $isset_yes++;
        }
        if (isset($_POST["setFeature"])) {
          $isset_yes++;
        }
        if (isset($_POST["waterFeature"])) {
          $isset_yes++;
        }
        if (isset($_POST["wifiFeature"])) {
          $isset_yes++;
        }
        if (isset($_POST["movementFeature"])) {
          $isset_yes++;
        }
        if (isset($_POST["lengthSubmit"])) {
          $isset_yes++;
        }
        if (isset($_POST["psuSubmit"])) {
          $isset_yes++;
        }
        if (isset($_POST["typeSubmit"])) {
          $isset_yes++;
        }
        if ($clearStep == 0 and $isset_yes > 0 and $searcher == 0) {
          $keywords = "";
          $key = "";
          $key_javascript = "";
          $something_explode = "";

          //LIGHT COLOUR---START
          if (isset($_POST["rgbColour"])) {
            $key = $_POST["rgbColour"];
            $key_javascript = $_POST["rgbColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            $keywords = " colour LIKE '%$key%'";
          }
          if (isset($_POST["rgbwColour"])) {
            $key = $_POST["rgbwColour"];
            $key_javascript = $_POST["rgbwColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["physicWhiteColour"])) {
            $key = $_POST["physicWhiteColour"];
            $something_explode = explode(' ', $_POST["physicWhiteColour"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["coldWhiteColour"])) {
            $key = $_POST["coldWhiteColour"];
            $something_explode = explode(' ', $_POST["coldWhiteColour"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["warmWhiteColour"])) {
            $key = $_POST["warmWhiteColour"];
            $something_explode = explode(' ', $_POST["warmWhiteColour"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["redColour"])) {
            $key = $_POST["redColour"];
            $key_javascript = $_POST["redColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["blueColour"])) {
            $key = $_POST["blueColour"];
            $key_javascript = $_POST["blueColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["purpleColour"])) {
            $key = $_POST["purpleColour"];
            $key_javascript = $_POST["purpleColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["yellowColour"])) {
            $key = $_POST["yellowColour"];
            $key_javascript = $_POST["yellowColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["orangeColour"])) {
            $key = $_POST["orangeColour"];
            $key_javascript = $_POST["orangeColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["greenColour"])) {
            $key = $_POST["greenColour"];
            $key_javascript = $_POST["greenColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          if (isset($_POST["pinkColour"])) {
            $key = $_POST["pinkColour"];
            $key_javascript = $_POST["pinkColour"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " colour LIKE '%$key%'";
            } else {
              $keywords .= " AND colour LIKE '%$key'";
            }
          }
          //LED COLOUR---END
          //FEATURES --- START
          if (isset($_POST["remoteFeature"])) {
            $key = $_POST["remoteFeature"];
            $something_explode = explode(' ', $_POST["remoteFeature"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " contain LIKE '%$key%'";
            } else {
              $keywords .= " AND contain LIKE '%$key%'";
            }
          }
          if (isset($_POST["setFeature"])) {
            $key = $_POST["setFeature"];
            $key_javascript = $_POST["setFeature"];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " contain LIKE '%$key%'";
            } else {
              $keywords .= " AND contain LIKE '%$key%'";
            }
          }
          if (isset($_POST["waterFeature"])) {
            $key = $_POST["waterFeature"];
            $something_explode = explode(' ', $_POST["waterFeature"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " contain LIKE '%$key%'";
            } else {
              $keywords .= " AND contain LIKE '%$key%'";
            }
          }
          if (isset($_POST["wifiFeature"])) {
            $key = $_POST["wifiFeature"];
            $key_javascript = "Wi_Fi";
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " contain LIKE '%$key%'";
            } else {
              $keywords .= " AND contain LIKE '%$key%'";
            }
          }
          if (isset($_POST["movementFeature"])) {
            $key = $_POST["movementFeature"];
            $something_explode = explode(' ', $_POST["movementFeature"]);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " contain LIKE '%$key%'";
            } else {
              $keywords .= " AND contain LIKE '%$key%'";
            }
          }
          //FEATURES --- END
          //LENGTH --- START
          if (isset($_POST["lengthSubmit"])) {
            $key = $_POST["lengthSubmit"];
            $key_javascript = "length". $_POST['lengthSubmit'];
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($key == "1") {
              if ($keywords == "") {
                $keywords = " length<=1";
              } else {
                $keywords .= " AND length<=1";
              }
            } elseif ($key == "5") {
              if ($keywords == "") {
                $keywords = " length>1 AND length<=5";
              } else {
                $keywords .= " AND length>1 AND length<=5";
              }
            } elseif ($key == "10") {
              if ($keywords == "") {
                $keywords = " length>5 AND length<=10";
              } else {
                $keywords .= " AND length>5 AND length<=10";
              }
            } elseif ($key == "20") {
              if ($keywords == "") {
                $keywords = " length>10 AND length<=20";
              } else {
                $keywords .= " AND length>10 AND length<=20";
              }
            } elseif ($key == "21") {
              if ($keywords == "") {
                $keywords = " length>20";
              } else {
                $keywords = " AND length>20";
              }
            }
          }
          //LENGTH --- END
          //POWER SUPPLY --- START
          if (isset($_POST["psuSubmit"])) {
            $key = $_POST["psuSubmit"];
            if ($_POST["psuSubmit"] == "Battery") {
              $key_javascript = "Battery";
            } elseif ($_POST["psuSubmit"] == "USB (5V)") {
              $key_javascript = "USB";
            } elseif ($_POST["psuSubmit"] == "12V") {
              $key_javascript = "V12";
            } elseif ($_POST["psuSubmit"] == "24V") {
              $key_javascript = "V24";
            } elseif ($_POST["psuSubmit"] == "220V") {
              $key_javascript = "V220";
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " psu='$key'";
            } else {
              $keywords .= " AND psu='$key'";
            }
          }
          //POWER SUPPLY --- END
          //LED TYPE --- START
          if (isset($_POST["typeSubmit"])) {
            $key = $_POST["typeSubmit"];
            if ($_POST["typeSubmit"] == "Neon" or $_POST["typeSubmit"] == "WS2811") {
              $key_javascript = $_POST["typeSubmit"];
            } else {
              $key_javascript = "t". $_POST["typeSubmit"];
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " led_type='$key'";
            } else {
              $keywords .= " AND led_type='$key'";
            }
          }
          //LED TYPE --- END

            $sql = "SELECT * FROM Led_Desk WHERE$keywords";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $onoma_for_title = 0;
              $brINbutton = 0;

              echo '<div id="cardMinBrFirst"></div>';
              while($row=$result->fetch_assoc()) {
                $onoma_for_title++;
                $ekptwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];

                //MAKE CARDS-START
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                  echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                  echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                  //FOR CPU
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                  echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                  echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                  echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                  //FOR CPU
                  //FOR MOTHERBOARD
                  echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                  echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                  echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                  echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                  echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                  echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                  echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                  echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                  echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                  echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                  echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                  echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                  echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                  //FOR MOTHERBOARD
                  //DATA FROM RAM CHOOSE
                  echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                  echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                  echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                  echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                  echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                  echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                  //DATA FROM RAM CHOOSE
                  //DATA FROM GPU CHOOSE
                  echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                  echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                  echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                  echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                  echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                  echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                  //DATA FROM GPU CHOOSE
                  //DATA FROM PSU CHOOSE
                  echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                  echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                  echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                  echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                  echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                  echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                  //DATA FROM PSU CHOOSE
                  //DATA FROM HARD DRIVE CHOOSE
                  echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                  echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                  echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                  echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                  echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                  //DATA FROM HARD DRIVE CHOOSE
                  //DATA FROM PC CASE CHOOSE
                  echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                  echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                  echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                  echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                  echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                  echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                  //DATA FROM PC CASE CHOOSE
                  //DATA FROM SECOND RAM
                  if (isset($_POST["RAM2Piece"])) {
                      echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                      echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                      echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                  }
                  //DATA FROM SECOND RAM
                  //DATA FROM SECOND HARD DRIVE
                  if (isset($_POST["HARD2Piece"])) {
                      echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                      echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                      echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                      echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                      echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                  }
                  //DATA FROM SECOND HARD DRIVE
                  //DATA FROM SOFTWARE
                  if (isset($_POST["SOFTPiece"])) {
                      echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                      echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                      echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                      echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                  }
                  //DATA FROM SOFTWARE
                  //DATA FROM COOLER FOR CPU
                  if (isset($_POST["COOLERPiece"])) {
                      echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                      echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                      echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                      echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                      echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                  }
                  //DATA FROM COOLER FOR CPU
                  //DATA FROM FAN FOR PC CASE
                  if (isset($_POST["FANPiece"])) {
                      echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                      echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                      echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                      echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                  }
                  //DATA FROM FAN FOR PC CASE
                  //DATA FROM MONITOR
                  if (isset($_POST["MONITORPiece"])) {
                      echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                      echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                      echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                      echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                      echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                  }
                  //DATA FROM MONITOR
                  //DATA FROM KEYBOARD
                  if (isset($_POST["KEYBPiece"])) {
                      echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                      echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                      echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                      echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                      echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                      echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                  }
                  //DATA FROM KEYBOARD
                  //DATA FROM MOUSE
                  if (isset($_POST["MOUSEPiece"])) {
                      echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                      echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                      echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                      echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                      echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                  }
                  //DATA FROM MOUSE
                  //DATA FROM CHAIR
                  if (isset($_POST["CHAIRPiece"])) {
                      echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                      echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                      echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                      echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                      echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                  }
                  //DATA FROM CHAIR
                  //DATA FROM SPEAKERS
                  if (isset($_POST["SPEAKERPiece"])) {
                      echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                      echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                      echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                      echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                      echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                  }
                  //DATA FROM SPEAKERS
                  //DATA FROM MICROPHONE
                  if (isset($_POST["MICROPiece"])) {
                      echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                      echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                      echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                      echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                      echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                  }
                  //DATA FROM MICROPHONE
                  //DATA FROM HEADERS
                  if (isset($_POST["HEADERPiece"])) {
                      echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                      echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                      echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                      echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                      echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                  }
                  //DATA FROM HEADERS
                  //DATA FROM UPS
                  if (isset($_POST["UPSPiece"])) {
                      echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                      echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                      echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                      echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                      echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                      echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                  }
                  //DATA FROM UPS
                  //DATA FROM LED IN PC CASE
                  if (isset($_POST["LEDPCPiece"])) {
                      echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                      echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                      echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                  }
                  //DATA FROM LED IN PC CASE
                  //DATA FROM LED IN DESK
                  if (isset($_POST["LEDDESKPiece"])) {
                      echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                      echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                      echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                  }
                  //DATA FROM LED IN DESK
                  //DATA FROM OPTICAL DRIVE
                  if (isset($_POST["OPTICALPiece"])) {
                      echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                      echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                      echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                      echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                      echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                      echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                  }
                  //DATA FROM OPTICAL DRIVE
                  //DATA FROM SOUND CARD
                  if (isset($_POST["SOUNDPiece"])) {
                      echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                      echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                      echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                      echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                  }
                  //DATA FROM SOUND CARD
                  //DATA FROM PRINTER
                  if (isset($_POST["PRINTPiece"])) {
                      echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                      echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                      echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                      echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                      echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                  }
                  //DATA FROM PRINTER
                  //DATA FROM SCANNER
                  if (isset($_POST["SCANPiece"])) {
                      echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                      echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                      echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                      echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                  }
                  //DATA FROM SCANNER
                  //DATA FROM BLUETOOTH ADAPTERS
                  if (isset($_POST["BLUEPiece"])) {
                      echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                      echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                      echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                      echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                      echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                  }
                  //DATA FROM BLUETOOTH ADAPTERS

                  echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="Led for Desk">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                echo '<br><br><br><br><br>';
                echo '<button type="button" class="productCard-Button"></font></button>
                  <div class="specs">';
                    if ($row["Picture5"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 20%;
                              }
                            </style>';
                      if ($row["Picture9"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-3" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture9"]. '" alt="Picture-9" style="width: 100%"></div>';
                      } elseif ($row["Picture8"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                      } elseif ($row["Picture7"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                      } elseif ($row["Picture6"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      } else {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      }
                    } else {
                      if ($row["Picture4"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 25%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      } elseif ($row["Picture3"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 33.33%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      } elseif ($row["Picture2"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 50%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      } elseif ($row["Picture1"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 100%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      }
                    }
                    echo '<center><font color="black"><table class="tableSpecs">
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Length</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["length"]. 'm</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power supply</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["psu"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED density</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_p"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["power"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Waterproofing</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["water_resistance"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Contains</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["contain"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Colour</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["colour"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">White temperature</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["white_temp"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                }
                if ($brINbutton = 0) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  echo '<br><br>';
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                } elseif ($brINbutton = 1) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                }
                echo '</div>';
                //PRICE OF PRODUCTS
                echo '</div>';
                echo '</form>';
                echo '</div>';
                //PRODUCT CARDS MIN
                echo '<div class="cardMin" id="cardMin'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                  echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                  echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                  //FOR CPU
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                  echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                  echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                  echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                  //FOR CPU
                  //FOR MOTHERBOARD
                  echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                  echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                  echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                  echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                  echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                  echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                  echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                  echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                  echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                  echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                  echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                  echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                  echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                  //FOR MOTHERBOARD
                  //DATA FROM RAM CHOOSE
                  echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                  echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                  echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                  echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                  echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                  echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                  //DATA FROM RAM CHOOSE
                  //DATA FROM GPU CHOOSE
                  echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                  echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                  echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                  echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                  echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                  echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                  //DATA FROM GPU CHOOSE
                  //DATA FROM PSU CHOOSE
                  echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                  echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                  echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                  echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                  echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                  echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                  //DATA FROM PSU CHOOSE
                  //DATA FROM HARD DRIVE CHOOSE
                  echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                  echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                  echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                  echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                  echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                  //DATA FROM HARD DRIVE CHOOSE
                  //DATA FROM PC CASE CHOOSE
                  echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                  echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                  echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                  echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                  echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                  echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                  //DATA FROM PC CASE CHOOSE
                  //DATA FROM SECOND RAM
                  if (isset($_POST["RAM2Piece"])) {
                      echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                      echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                      echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                  }
                  //DATA FROM SECOND RAM
                  //DATA FROM SECOND HARD DRIVE
                  if (isset($_POST["HARD2Piece"])) {
                      echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                      echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                      echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                      echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                      echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                  }
                  //DATA FROM SECOND HARD DRIVE
                  //DATA FROM SOFTWARE
                  if (isset($_POST["SOFTPiece"])) {
                      echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                      echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                      echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                      echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                  }
                  //DATA FROM SOFTWARE
                  //DATA FROM COOLER FOR CPU
                  if (isset($_POST["COOLERPiece"])) {
                      echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                      echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                      echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                      echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                      echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                  }
                  //DATA FROM COOLER FOR CPU
                  //DATA FROM FAN FOR PC CASE
                  if (isset($_POST["FANPiece"])) {
                      echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                      echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                      echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                      echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                  }
                  //DATA FROM FAN FOR PC CASE
                  //DATA FROM MONITOR
                  if (isset($_POST["MONITORPiece"])) {
                      echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                      echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                      echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                      echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                      echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                  }
                  //DATA FROM MONITOR
                  //DATA FROM KEYBOARD
                  if (isset($_POST["KEYBPiece"])) {
                      echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                      echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                      echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                      echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                      echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                      echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                  }
                  //DATA FROM KEYBOARD
                  //DATA FROM MOUSE
                  if (isset($_POST["MOUSEPiece"])) {
                      echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                      echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                      echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                      echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                      echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                  }
                  //DATA FROM MOUSE
                  //DATA FROM CHAIR
                  if (isset($_POST["CHAIRPiece"])) {
                      echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                      echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                      echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                      echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                      echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                  }
                  //DATA FROM CHAIR
                  //DATA FROM SPEAKERS
                  if (isset($_POST["SPEAKERPiece"])) {
                      echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                      echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                      echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                      echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                      echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                  }
                  //DATA FROM SPEAKERS
                  //DATA FROM MICROPHONE
                  if (isset($_POST["MICROPiece"])) {
                      echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                      echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                      echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                      echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                      echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                  }
                  //DATA FROM MICROPHONE
                  //DATA FROM HEADERS
                  if (isset($_POST["HEADERPiece"])) {
                      echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                      echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                      echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                      echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                      echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                  }
                  //DATA FROM HEADERS
                  //DATA FROM UPS
                  if (isset($_POST["UPSPiece"])) {
                      echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                      echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                      echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                      echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                      echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                      echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                  }
                  //DATA FROM UPS
                  //DATA FROM LED IN PC CASE
                  if (isset($_POST["LEDPCPiece"])) {
                      echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                      echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                      echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                  }
                  //DATA FROM LED IN PC CASE
                  //DATA FROM LED IN DESK
                  if (isset($_POST["LEDDESKPiece"])) {
                      echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                      echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                      echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                  }
                  //DATA FROM LED IN DESK
                  //DATA FROM OPTICAL DRIVE
                  if (isset($_POST["OPTICALPiece"])) {
                      echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                      echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                      echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                      echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                      echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                      echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                  }
                  //DATA FROM OPTICAL DRIVE
                  //DATA FROM SOUND CARD
                  if (isset($_POST["SOUNDPiece"])) {
                      echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                      echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                      echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                      echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                  }
                  //DATA FROM SOUND CARD
                  //DATA FROM PRINTER
                  if (isset($_POST["PRINTPiece"])) {
                      echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                      echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                      echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                      echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                      echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                  }
                  //DATA FROM PRINTER
                  //DATA FROM SCANNER
                  if (isset($_POST["SCANPiece"])) {
                      echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                      echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                      echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                      echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                  }
                  //DATA FROM SCANNER
                  //DATA FROM BLUETOOTH ADAPTERS
                  if (isset($_POST["BLUEPiece"])) {
                      echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                      echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                      echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                      echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                      echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                  }
                  //DATA FROM BLUETOOTH ADAPTERS
        
                  echo '<input type="hidden" id="pieceLEDDESK" name="LEDDESKPiece" value="Led for Desk">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                      echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED type</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_type"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Length</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["length"]. 'm</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power supply</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["psu"]. '</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED density</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_p"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Power</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["power"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Waterproofing</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["water_resistance"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Contains</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["conatin"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Colour</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["colour"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">White temperature</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["white_temp"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                      </table>';
                    echo '</div></center>';
                  echo '<br><p><button class="cardButtonMin">I Want This!</button></p>';
                  echo '</form>';
                  echo '</div>';
                  echo '<div id="brAfterCards'. $onoma_for_title. '"></div>';
                //PRODUCT CARDS MIN
              }
            } else {
              echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
            }
          } elseif ($clearStep == 1 and isset($_POST["clearFilters"]) and $searcher == 0) {
                echo '<script>';
                  $key_javascript = "";
                  $something_explode = "";

                  //LIGHT COLOUR---START
                  if (isset($_POST["rgbColour"])) {
                    $key_javascript = $_POST["rgbColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["rgbwColour"])) {
                    $key_javascript = $_POST["rgbwColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["physicWhiteColour"])) {
                    $something_explode = explode(' ', $_POST["physicWhiteColour"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["coldWhiteColour"])) {
                    $something_explode = explode(' ', $_POST["coldWhiteColour"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["warmWhiteColour"])) {
                    $something_explode = explode(' ', $_POST["warmWhiteColour"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["redColour"])) {
                    $key_javascript = $_POST["redColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["blueColour"])) {
                    $key_javascript = $_POST["blueColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["purpleColour"])) {
                    $key_javascript = $_POST["purpleColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["yellowColour"])) {
                    $key_javascript = $_POST["yellowColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["orangeColour"])) {
                    $key_javascript = $_POST["orangeColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["greenColour"])) {
                    $key_javascript = $_POST["greenColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["pinkColour"])) {
                    $key_javascript = $_POST["pinkColour"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //LED COLOUR---END
                  //FEATURES --- START
                  if (isset($_POST["remoteFeature"])) {
                    $something_explode = explode(' ', $_POST["remoteFeature"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["setFeature"])) {
                    $key_javascript = $_POST["setFeature"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["waterFeature"])) {
                    $something_explode = explode(' ', $_POST["waterFeature"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["wifiFeature"])) {
                    $key_javascript = "Wi_Fi";
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  if (isset($_POST["movementFeature"])) {
                    $something_explode = explode(' ', $_POST["movementFeature"]);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //FEATURES --- END
                  //LENGTH --- START
                  if (isset($_POST["lengthSubmit"])) {
                    $key_javascript = "length". $_POST['lengthSubmit'];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //LENGTH --- END
                  //POWER SUPPLY --- START
                  if (isset($_POST["psuSubmit"])) {
                    if ($_POST["psuSubmit"] == "Battery") {
                      $key_javascript = "Battery";
                    } elseif ($_POST["psuSubmit"] == "USB (5V)") {
                      $key_javascript = "USB";
                    } elseif ($_POST["psuSubmit"] == "12V") {
                      $key_javascript = "V12";
                    } elseif ($_POST["psuSubmit"] == "24V") {
                      $key_javascript = "V24";
                    } elseif ($_POST["psuSubmit"] == "220V") {
                      $key_javascript = "V220";
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //POWER SUPPLY --- END
                  //LED TYPE --- START
                  if (isset($_POST["typeSubmit"])) {
                    if ($_POST["typeSubmit"] == "Neon" or $_POST["typeSubmit"] == "WS2811") {
                      $key_javascript = $_POST["typeSubmit"];
                    } else {
                      $key_javascript = "t". $_POST["typeSubmit"];
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //LED TYPE --- END
                echo '</script>';

            $onoma_for_title = 0;
            $sql = "SELECT * FROM Led_Desk";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $onoma_for_title = 0;
              $brINbutton = 0;

              echo '<div id="cardMinBrFirst"></div>';
              while($row=$result->fetch_assoc()) {
                $onoma_for_title++;
                $ekptwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];

                //MAKE CARDS-START
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                  echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                  echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                  //FOR CPU
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                  echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                  echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                  echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                  //FOR CPU
                  //FOR MOTHERBOARD
                  echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                  echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                  echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                  echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                  echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                  echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                  echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                  echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                  echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                  echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                  echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                  echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                  echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                  //FOR MOTHERBOARD
                  //DATA FROM RAM CHOOSE
                  echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                  echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                  echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                  echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                  echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                  echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                  //DATA FROM RAM CHOOSE
                  //DATA FROM GPU CHOOSE
                  echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                  echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                  echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                  echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                  echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                  echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                  //DATA FROM GPU CHOOSE
                  //DATA FROM PSU CHOOSE
                  echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                  echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                  echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                  echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                  echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                  echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                  //DATA FROM PSU CHOOSE
                  //DATA FROM HARD DRIVE CHOOSE
                  echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                  echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                  echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                  echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                  echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                  //DATA FROM HARD DRIVE CHOOSE
                  //DATA FROM PC CASE CHOOSE
                  echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                  echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                  echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                  echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                  echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                  echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                  //DATA FROM PC CASE CHOOSE
                  //DATA FROM SECOND RAM
                  if (isset($_POST["RAM2Piece"])) {
                      echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                      echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                      echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                  }
                  //DATA FROM SECOND RAM
                  //DATA FROM SECOND HARD DRIVE
                  if (isset($_POST["HARD2Piece"])) {
                      echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                      echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                      echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                      echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                      echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                  }
                  //DATA FROM SECOND HARD DRIVE
                  //DATA FROM SOFTWARE
                  if (isset($_POST["SOFTPiece"])) {
                      echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                      echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                      echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                      echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                  }
                  //DATA FROM SOFTWARE
                  //DATA FROM COOLER FOR CPU
                  if (isset($_POST["COOLERPiece"])) {
                      echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                      echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                      echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                      echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                      echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                  }
                  //DATA FROM COOLER FOR CPU
                  //DATA FROM FAN FOR PC CASE
                  if (isset($_POST["FANPiece"])) {
                      echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                      echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                      echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                      echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                  }
                  //DATA FROM FAN FOR PC CASE
                  //DATA FROM MONITOR
                  if (isset($_POST["MONITORPiece"])) {
                      echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                      echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                      echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                      echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                      echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                  }
                  //DATA FROM MONITOR
                  //DATA FROM KEYBOARD
                  if (isset($_POST["KEYBPiece"])) {
                      echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                      echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                      echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                      echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                      echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                      echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                  }
                  //DATA FROM KEYBOARD
                  //DATA FROM MOUSE
                  if (isset($_POST["MOUSEPiece"])) {
                      echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                      echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                      echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                      echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                      echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                  }
                  //DATA FROM MOUSE
                  //DATA FROM CHAIR
                  if (isset($_POST["CHAIRPiece"])) {
                      echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                      echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                      echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                      echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                      echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                  }
                  //DATA FROM CHAIR
                  //DATA FROM SPEAKERS
                  if (isset($_POST["SPEAKERPiece"])) {
                      echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                      echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                      echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                      echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                      echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                  }
                  //DATA FROM SPEAKERS
                  //DATA FROM MICROPHONE
                  if (isset($_POST["MICROPiece"])) {
                      echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                      echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                      echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                      echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                      echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                  }
                  //DATA FROM MICROPHONE
                  //DATA FROM HEADERS
                  if (isset($_POST["HEADERPiece"])) {
                      echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                      echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                      echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                      echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                      echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                  }
                  //DATA FROM HEADERS
                  //DATA FROM UPS
                  if (isset($_POST["UPSPiece"])) {
                      echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                      echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                      echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                      echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                      echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                      echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                  }
                  //DATA FROM UPS
                  //DATA FROM LED IN PC CASE
                  if (isset($_POST["LEDPCPiece"])) {
                      echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                      echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                      echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                  }
                  //DATA FROM LED IN PC CASE
                  //DATA FROM LED IN DESK
                  if (isset($_POST["LEDDESKPiece"])) {
                      echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                      echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                      echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                  }
                  //DATA FROM LED IN DESK
                  //DATA FROM OPTICAL DRIVE
                  if (isset($_POST["OPTICALPiece"])) {
                      echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                      echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                      echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                      echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                      echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                      echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                  }
                  //DATA FROM OPTICAL DRIVE
                  //DATA FROM SOUND CARD
                  if (isset($_POST["SOUNDPiece"])) {
                      echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                      echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                      echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                      echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                  }
                  //DATA FROM SOUND CARD
                  //DATA FROM PRINTER
                  if (isset($_POST["PRINTPiece"])) {
                      echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                      echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                      echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                      echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                      echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                  }
                  //DATA FROM PRINTER
                  //DATA FROM SCANNER
                  if (isset($_POST["SCANPiece"])) {
                      echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                      echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                      echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                      echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                  }
                  //DATA FROM SCANNER
                  //DATA FROM BLUETOOTH ADAPTERS
                  if (isset($_POST["BLUEPiece"])) {
                      echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                      echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                      echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                      echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                      echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                  }
                  //DATA FROM BLUETOOTH ADAPTERS

                  echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="Led for Desk">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                echo '<br><br><br><br><br>';
                echo '<button type="button" class="productCard-Button"></font></button>
                  <div class="specs">';
                    if ($row["Picture5"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 20%;
                              }
                            </style>';
                      if ($row["Picture9"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-3" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture9"]. '" alt="Picture-9" style="width: 100%"></div>';
                      } elseif ($row["Picture8"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                      } elseif ($row["Picture7"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                      } elseif ($row["Picture6"] != NULL) {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      } else {
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      }
                    } else {
                      if ($row["Picture4"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 25%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      } elseif ($row["Picture3"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 33.33%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      } elseif ($row["Picture2"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 50%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      } elseif ($row["Picture1"] != NULL) {
                        echo '<style>
                                .columnPictureSpecs {
                                  width: 100%;
                                }
                              </style>';
                        echo '<div class="columnPictureSpecs">
                                <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      }
                    }
                    echo '<center><font color="black"><table class="tableSpecs">
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Length</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["length"]. 'm</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power supply</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["psu"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED density</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_p"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["power"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Waterproofing</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["water_resistance"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Contains</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["contain"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Colour</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["colour"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">White temperature</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["white_temp"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                }
                if ($brINbutton = 0) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  echo '<br><br>';
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                } elseif ($brINbutton = 1) {
                  echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                  
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
                }
                echo '</div>';
                //PRICE OF PRODUCTS
                echo '</div>';
                echo '</form>';
                echo '</div>';
                //PRODUCT CARDS MIN
                echo '<div class="cardMin" id="cardMin'. $onoma_for_title. '">';
                echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                  echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                  echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                  //FOR CPU
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                  echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                  echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                  echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                  //FOR CPU
                  //FOR MOTHERBOARD
                  echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                  echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                  echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                  echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                  echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                  echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                  echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                  echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                  echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                  echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                  echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                  echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                  echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                  //FOR MOTHERBOARD
                  //DATA FROM RAM CHOOSE
                  echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                  echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                  echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                  echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                  echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                  echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                  //DATA FROM RAM CHOOSE
                  //DATA FROM GPU CHOOSE
                  echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                  echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                  echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                  echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                  echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                  echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                  echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                  //DATA FROM GPU CHOOSE
                  //DATA FROM PSU CHOOSE
                  echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                  echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                  echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                  echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                  echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                  echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                  //DATA FROM PSU CHOOSE
                  //DATA FROM HARD DRIVE CHOOSE
                  echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                  echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                  echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                  echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                  echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                  echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                  //DATA FROM HARD DRIVE CHOOSE
                  //DATA FROM PC CASE CHOOSE
                  echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                  echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                  echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                  echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                  echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                  echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                  //DATA FROM PC CASE CHOOSE
                  //DATA FROM SECOND RAM
                  if (isset($_POST["RAM2Piece"])) {
                      echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                      echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                      echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                  }
                  //DATA FROM SECOND RAM
                  //DATA FROM SECOND HARD DRIVE
                  if (isset($_POST["HARD2Piece"])) {
                      echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                      echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                      echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                      echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                      echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                      echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                  }
                  //DATA FROM SECOND HARD DRIVE
                  //DATA FROM SOFTWARE
                  if (isset($_POST["SOFTPiece"])) {
                      echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                      echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                      echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                      echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                  }
                  //DATA FROM SOFTWARE
                  //DATA FROM COOLER FOR CPU
                  if (isset($_POST["COOLERPiece"])) {
                      echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                      echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                      echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                      echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                      echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                  }
                  //DATA FROM COOLER FOR CPU
                  //DATA FROM FAN FOR PC CASE
                  if (isset($_POST["FANPiece"])) {
                      echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                      echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                      echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                      echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                  }
                  //DATA FROM FAN FOR PC CASE
                  //DATA FROM MONITOR
                  if (isset($_POST["MONITORPiece"])) {
                      echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                      echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                      echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                      echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                      echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                  }
                  //DATA FROM MONITOR
                  //DATA FROM KEYBOARD
                  if (isset($_POST["KEYBPiece"])) {
                      echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                      echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                      echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                      echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                      echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                      echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                  }
                  //DATA FROM KEYBOARD
                  //DATA FROM MOUSE
                  if (isset($_POST["MOUSEPiece"])) {
                      echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                      echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                      echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                      echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                      echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                  }
                  //DATA FROM MOUSE
                  //DATA FROM CHAIR
                  if (isset($_POST["CHAIRPiece"])) {
                      echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                      echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                      echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                      echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                      echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                      echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                  }
                  //DATA FROM CHAIR
                  //DATA FROM SPEAKERS
                  if (isset($_POST["SPEAKERPiece"])) {
                      echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                      echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                      echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                      echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                      echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                  }
                  //DATA FROM SPEAKERS
                  //DATA FROM MICROPHONE
                  if (isset($_POST["MICROPiece"])) {
                      echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                      echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                      echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                      echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                      echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                      echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                  }
                  //DATA FROM MICROPHONE
                  //DATA FROM HEADERS
                  if (isset($_POST["HEADERPiece"])) {
                      echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                      echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                      echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                      echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                      echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                      echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                  }
                  //DATA FROM HEADERS
                  //DATA FROM UPS
                  if (isset($_POST["UPSPiece"])) {
                      echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                      echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                      echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                      echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                      echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                      echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                  }
                  //DATA FROM UPS
                  //DATA FROM LED IN PC CASE
                  if (isset($_POST["LEDPCPiece"])) {
                      echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                      echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                      echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                  }
                  //DATA FROM LED IN PC CASE
                  //DATA FROM LED IN DESK
                  if (isset($_POST["LEDDESKPiece"])) {
                      echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                      echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                      echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                      echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                      echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                      echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                  }
                  //DATA FROM LED IN DESK
                  //DATA FROM OPTICAL DRIVE
                  if (isset($_POST["OPTICALPiece"])) {
                      echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                      echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                      echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                      echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                      echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                      echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                  }
                  //DATA FROM OPTICAL DRIVE
                  //DATA FROM SOUND CARD
                  if (isset($_POST["SOUNDPiece"])) {
                      echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                      echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                      echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                      echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                      echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                  }
                  //DATA FROM SOUND CARD
                  //DATA FROM PRINTER
                  if (isset($_POST["PRINTPiece"])) {
                      echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                      echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                      echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                      echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                      echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                      echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                  }
                  //DATA FROM PRINTER
                  //DATA FROM SCANNER
                  if (isset($_POST["SCANPiece"])) {
                      echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                      echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                      echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                      echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                      echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                      echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                  }
                  //DATA FROM SCANNER
                  //DATA FROM BLUETOOTH ADAPTERS
                  if (isset($_POST["BLUEPiece"])) {
                      echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                      echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                      echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                      echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                      echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                      echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                  }
                  //DATA FROM BLUETOOTH ADAPTERS
        
                  echo '<input type="hidden" id="pieceLEDDESK" name="LEDDESKPiece" value="Led for Desk">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                      echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED type</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_type"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Length</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["length"]. 'm</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power supply</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["psu"]. '</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED density</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_p"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Power</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["power"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Waterproofing</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["water_resistance"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Contains</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["conatin"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Colour</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["colour"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">White temperature</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["white_temp"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                      </table>';
                    echo '</div></center>';
                  echo '<br><p><button class="cardButtonMin">I Want This!</button></p>';
                  echo '</form>';
                  echo '</div>';
                  echo '<div id="brAfterCards'. $onoma_for_title. '"></div>';
                //PRODUCT CARDS MIN
              }
            } else {
              echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
            }
        } elseif ($searcher == 0) {
          $onoma_for_title = 0;
          $sql = "SELECT * FROM Led_Desk";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $onoma_for_title = 0;
            $brINbutton = 0;

            echo '<div id="cardMinBrFirst"></div>';
            while($row=$result->fetch_assoc()) {
              $onoma_for_title++;
              $ekptwshPrice = $row["PriceEkptwsh"];
              $PriceMod = $row["Price"];

              //MAKE CARDS-START
              echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
              echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                //FOR CPU
                echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                //FOR CPU
                //FOR MOTHERBOARD
                echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                //FOR MOTHERBOARD
                //DATA FROM RAM CHOOSE
                echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                //DATA FROM RAM CHOOSE
                //DATA FROM GPU CHOOSE
                echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                //DATA FROM GPU CHOOSE
                //DATA FROM PSU CHOOSE
                echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                //DATA FROM PSU CHOOSE
                //DATA FROM HARD DRIVE CHOOSE
                echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                //DATA FROM HARD DRIVE CHOOSE
                //DATA FROM PC CASE CHOOSE
                echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                //DATA FROM PC CASE CHOOSE
                //DATA FROM SECOND RAM
                if (isset($_POST["RAM2Piece"])) {
                    echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                    echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                    echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                    echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                    echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                }
                //DATA FROM SECOND RAM
                //DATA FROM SECOND HARD DRIVE
                if (isset($_POST["HARD2Piece"])) {
                    echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                    echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                    echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                }
                //DATA FROM SECOND HARD DRIVE
                //DATA FROM SOFTWARE
                if (isset($_POST["SOFTPiece"])) {
                    echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                    echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                    echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                    echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                }
                //DATA FROM SOFTWARE
                //DATA FROM COOLER FOR CPU
                if (isset($_POST["COOLERPiece"])) {
                    echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                    echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                    echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                    echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                    echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                }
                //DATA FROM COOLER FOR CPU
                //DATA FROM FAN FOR PC CASE
                if (isset($_POST["FANPiece"])) {
                    echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                    echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                    echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                    echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                }
                //DATA FROM FAN FOR PC CASE
                //DATA FROM MONITOR
                if (isset($_POST["MONITORPiece"])) {
                    echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                    echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                    echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                    echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                    echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                }
                //DATA FROM MONITOR
                //DATA FROM KEYBOARD
                if (isset($_POST["KEYBPiece"])) {
                    echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                    echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                    echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                    echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                    echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                    echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                }
                //DATA FROM KEYBOARD
                //DATA FROM MOUSE
                if (isset($_POST["MOUSEPiece"])) {
                    echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                    echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                    echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                    echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                }
                //DATA FROM MOUSE
                //DATA FROM CHAIR
                if (isset($_POST["CHAIRPiece"])) {
                    echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                    echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                    echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                    echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                    echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                }
                //DATA FROM CHAIR
                //DATA FROM SPEAKERS
                if (isset($_POST["SPEAKERPiece"])) {
                    echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                    echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                    echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                    echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                    echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                }
                //DATA FROM SPEAKERS
                //DATA FROM MICROPHONE
                if (isset($_POST["MICROPiece"])) {
                    echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                    echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                    echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                    echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                    echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                }
                //DATA FROM MICROPHONE
                //DATA FROM HEADERS
                if (isset($_POST["HEADERPiece"])) {
                    echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                    echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                    echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                    echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                    echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                }
                //DATA FROM HEADERS
                //DATA FROM UPS
                if (isset($_POST["UPSPiece"])) {
                    echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                    echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                    echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                    echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                    echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                    echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                }
                //DATA FROM UPS
                //DATA FROM LED IN PC CASE
                if (isset($_POST["LEDPCPiece"])) {
                    echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                    echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                    echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                }
                //DATA FROM LED IN PC CASE
                //DATA FROM LED IN DESK
                if (isset($_POST["LEDDESKPiece"])) {
                    echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                    echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                    echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                }
                //DATA FROM LED IN DESK
                //DATA FROM OPTICAL DRIVE
                if (isset($_POST["OPTICALPiece"])) {
                    echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                    echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                    echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                    echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                    echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                    echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                }
                //DATA FROM OPTICAL DRIVE
                //DATA FROM SOUND CARD
                if (isset($_POST["SOUNDPiece"])) {
                    echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                    echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                    echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                    echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                }
                //DATA FROM SOUND CARD
                //DATA FROM PRINTER
                if (isset($_POST["PRINTPiece"])) {
                    echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                    echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                    echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                    echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                    echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                }
                //DATA FROM PRINTER
                //DATA FROM SCANNER
                if (isset($_POST["SCANPiece"])) {
                    echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                    echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                    echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                    echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                }
                //DATA FROM SCANNER
                //DATA FROM BLUETOOTH ADAPTERS
                if (isset($_POST["BLUEPiece"])) {
                    echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                    echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                    echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                    echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                    echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                }
                //DATA FROM BLUETOOTH ADAPTERS

                echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="Led for Desk">';
              echo '<div class="productCard">';
              //INFO OF PRODUCTS
              echo '<div class="productCard-info">';
              echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
              echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
              echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
              echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
              echo '<br><br><br><br><br>';
              echo '<button type="button" class="productCard-Button"></font></button>
                <div class="specs">';
                  if ($row["Picture5"] != NULL) {
                    echo '<style>
                            .columnPictureSpecs {
                              width: 20%;
                            }
                          </style>';
                    if ($row["Picture9"] != NULL) {
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-3" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture9"]. '" alt="Picture-9" style="width: 100%"></div>';
                    } elseif ($row["Picture8"] != NULL) {
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture8"]. '" alt="Picture-8" style="width: 100%"></div>';
                    } elseif ($row["Picture7"] != NULL) {
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture7"]. '" alt="Picture-7" style="width: 100%"></div>';
                    } elseif ($row["Picture6"] != NULL) {
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture6"]. '" alt="Picture-6" style="width: 100%"></div>';
                    } else {
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture5"]. '" alt="Picture-5" style="width: 100%"></div>';
                    }
                  } else {
                    if ($row["Picture4"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 25%;
                              }
                            </style>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture4"]. '" alt="Picture-4" style="width: 100%"></div>';
                    } elseif ($row["Picture3"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 33.33%;
                              }
                            </style>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture3"]. '" alt="Picture-1" style="width: 100%"></div>';
                    } elseif ($row["Picture2"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 50%;
                              }
                            </style>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture2"]. '" alt="Picture-2" style="width: 100%"></div>';
                    } elseif ($row["Picture1"] != NULL) {
                      echo '<style>
                              .columnPictureSpecs {
                                width: 100%;
                              }
                            </style>';
                      echo '<div class="columnPictureSpecs">
                              <img src="'. $row["Picture1"]. '" alt="Picture-1" style="width: 100%"></div>';
                    }
                  }
                  echo '<center><font color="black"><table class="tableSpecs">
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Length</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["length"]. 'm</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power supply</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["psu"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">LED density</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["led_p"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["power"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Waterproofing</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["water_resistance"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Contains</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["contain"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Colour</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["colour"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">White temperature</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["white_temp"]. '</td>
                      </tr>
                    </table></font></center>';
                echo '</div>';
              echo '</div>';
              echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip">';
              //INFO OF PRODUCTS-END
              //PRICE OF PRODUCTS
              echo '<div class="productCardpreview">';
              if ($ekptwshPrice == $PriceMod) {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
              } elseif ($ekptwshPrice == "0") {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
              } else {
                if ($PriceMod > $ekptwshPrice) {
                $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                $brINbutton = 1;
                } else {
                $ekptwshPososto = 0;
                }
                echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
              }
              if ($brINbutton = 0) {
                echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                echo '<br><br>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
              } elseif ($brINbutton = 1) {
                echo '<h2 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>';
                
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="productCardpreview-Button" value="I Want This!">';
              }
              echo '</div>';
              //PRICE OF PRODUCTS
              echo '</div>';
              echo '</form>';
              echo '</div>';
              //PRODUCT CARDS MIN
              echo '<div class="cardMin" id="cardMin'. $onoma_for_title. '">';
              echo '<form action="../../../Pages/PCBuilderPCBuild" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
                echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
                //FOR CPU
                echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $_POST["MicroCPU"]. '">';
                echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $_POST["SocketCPU"]. '">';
                ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $_POST["gpuCPU"]. '">';
                echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $_POST["brandModelCPU"]. '">';
                echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $_POST["ProductCodeCPU"]. '">';
                echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="'. $_POST["categoryCPU"]. '">';
                echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $_POST["PriceCPU"]. '">';
                echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $_POST["EkptwshCPU"]. '">';
                //FOR CPU
                //FOR MOTHERBOARD
                echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="'. $_POST["MotherPiece"]. '">';
                echo '<input type="hidden" id="MOTHERsize" name="MOTHERsize" value="'. $_POST["MOTHERsize"]. '">';
                echo '<input type="hidden" id="brandModelMOTHER" name="brandModelMOTHER" value="'. $_POST["brandModelMOTHER"]. '">';
                echo '<input type="hidden" id="ProductCodeMOTHER" name="ProductCodeMOTHER" value="'. $_POST["ProductCodeMOTHER"]. '">';
                echo '<input type="hidden" id="categoryMOTHER" name="categoryMOTHER" value="'. $_POST["categoryMOTHER"]. '">';
                echo '<input type="hidden" id="PriceMOTHER" name="PriceMOTHER" value="'. $_POST["PriceMOTHER"]. '">';
                echo '<input type="hidden" id="RamType" name="RamType" value="'. $_POST["RamType"]. '">';
                echo '<input type="hidden" id="RamPL" name="RamPL" value="'. $_POST["RamPL"]. '">';
                echo '<input type="hidden" id="RamSP" name="RamSP" value="'. $_POST["RamSP"]. '">';
                echo '<input type="hidden" id="pciEx1620" name="pciEx1620" value="'. $_POST["pciEx1620"]. '">';
                echo '<input type="hidden" id="pciEx1630" name="pciEx1630" value="'. $_POST["pciEx1630"]. '">';
                echo '<input type="hidden" id="pciEx1640" name="pciEx1640" value="'. $_POST["pciEx1640"]. '">';
                echo '<input type="hidden" id="EkptwshMOTHER" name="EkptwshMOTHER" value="'. $_POST["EkptwshMOTHER"]. '">';
                //FOR MOTHERBOARD
                //DATA FROM RAM CHOOSE
                echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                //DATA FROM RAM CHOOSE
                //DATA FROM GPU CHOOSE
                echo '<input type="hidden" id="GPUPiece" name="GPUPiece" value="Graphics Card">';
                echo '<input type="hidden" id="brandModelGPU" name="brandModelGPU" value="'. $_POST["brandModelGPU"]. '">';
                echo '<input type="hidden" id="ProductCodeGPU" name="ProductCodeGPU" value="'. $_POST["ProductCodeGPU"]. '">';
                echo '<input type="hidden" id="categoryGPU" name="categoryGPU" value="'. $_POST["categoryGPU"]. '">';
                echo '<input type="hidden" id="PriceGPU" name="PriceGPU" value="'. $_POST["PriceGPU"]. '">';
                echo '<input type="hidden" id="psuGPU" name="psuGPU" value="'. $_POST["psuGPU"]. '">';
                echo '<input type="hidden" id="EkptwshGPU" name="EkptwshGPU" value="'. $_POST["EkptwshGPU"]. '">';
                //DATA FROM GPU CHOOSE
                //DATA FROM PSU CHOOSE
                echo '<input type="hidden" id="PSUPiece" name="PSUPiece" value="PSU">';
                echo '<input type="hidden" id="brandModelPSU" name="brandModelPSU" value="'. $_POST["brandModelPSU"]. '">';
                echo '<input type="hidden" id="ProductCodePSU" name="ProductCodePSU" value="'. $_POST["ProductCodePSU"]. '">';
                echo '<input type="hidden" id="categoryPSU" name="categoryPSU" value="'. $_POST["categoryPSU"]. '">';
                echo '<input type="hidden" id="PricePSU" name="PricePSU" value="'. $_POST["PricePSU"]. '">';
                echo '<input type="hidden" id="EkptwshPSU" name="EkptwshPSU" value="'. $_POST["EkptwshPSU"]. '">';
                //DATA FROM PSU CHOOSE
                //DATA FROM HARD DRIVE CHOOSE
                echo '<input type="hidden" id="HARDPiece" name="HARDPiece" value="Hard Drive Type: '. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="HARDtype" name="HARDtype" value="'. $_POST["HARDtype"]. '">';
                echo '<input type="hidden" id="brandModelHARD" name="brandModelHARD" value="'. $_POST["brandModelHARD"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD" name="ProductCodeHARD" value="'. $_POST["ProductCodeHARD"]. '">';
                echo '<input type="hidden" id="categoryHARD" name="categoryHARD" value="'. $_POST["categoryHARD"]. '">';
                echo '<input type="hidden" id="PriceHARD" name="PriceHARD" value="'. $_POST["PriceHARD"]. '">';
                echo '<input type="hidden" id="EkptwshHARD" name="EkptwshHARD" value="'. $_POST["EkptwshHARD"]. '">';
                //DATA FROM HARD DRIVE CHOOSE
                //DATA FROM PC CASE CHOOSE
                echo '<input type="hidden" id="CASEPiece" name="CASEPiece" value="PC Case">';
                echo '<input type="hidden" id="brandModelCASE" name="brandModelCASE" value="'. $_POST["brandModelCASE"]. '">';
                echo '<input type="hidden" id="ProductCodeCASE" name="ProductCodeCASE" value="'. $_POST["ProductCodeCASE"]. '">';
                echo '<input type="hidden" id="categoryCASE" name="categoryCASE" value="'. $_POST["categoryCASE"]. '">';
                echo '<input type="hidden" id="PriceCASE" name="PriceCASE" value="'. $_POST["PriceCASE"]. '">';
                echo '<input type="hidden" id="EkptwshCASE" name="EkptwshCASE" value="'. $_POST["EkptwshCASE"]. '">';
                //DATA FROM PC CASE CHOOSE
                //DATA FROM SECOND RAM
                if (isset($_POST["RAM2Piece"])) {
                    echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                    echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                    echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                    echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                    echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                }
                //DATA FROM SECOND RAM
                //DATA FROM SECOND HARD DRIVE
                if (isset($_POST["HARD2Piece"])) {
                    echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                    echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                    echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                    echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                    echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                    echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                }
                //DATA FROM SECOND HARD DRIVE
                //DATA FROM SOFTWARE
                if (isset($_POST["SOFTPiece"])) {
                    echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                    echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                    echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                    echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                }
                //DATA FROM SOFTWARE
                //DATA FROM COOLER FOR CPU
                if (isset($_POST["COOLERPiece"])) {
                    echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                    echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                    echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                    echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                    echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                }
                //DATA FROM COOLER FOR CPU
                //DATA FROM FAN FOR PC CASE
                if (isset($_POST["FANPiece"])) {
                    echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                    echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                    echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                    echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                }
                //DATA FROM FAN FOR PC CASE
                //DATA FROM MONITOR
                if (isset($_POST["MONITORPiece"])) {
                    echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                    echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                    echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                    echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                    echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                }
                //DATA FROM MONITOR
                //DATA FROM KEYBOARD
                if (isset($_POST["KEYBPiece"])) {
                    echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                    echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                    echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                    echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                    echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                    echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                }
                //DATA FROM KEYBOARD
                //DATA FROM MOUSE
                if (isset($_POST["MOUSEPiece"])) {
                    echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                    echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                    echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                    echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                    echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                }
                //DATA FROM MOUSE
                //DATA FROM CHAIR
                if (isset($_POST["CHAIRPiece"])) {
                    echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                    echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                    echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                    echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                    echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                    echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                }
                //DATA FROM CHAIR
                //DATA FROM SPEAKERS
                if (isset($_POST["SPEAKERPiece"])) {
                    echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                    echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                    echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                    echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                    echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                }
                //DATA FROM SPEAKERS
                //DATA FROM MICROPHONE
                if (isset($_POST["MICROPiece"])) {
                    echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                    echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                    echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                    echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                    echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                    echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                }
                //DATA FROM MICROPHONE
                //DATA FROM HEADERS
                if (isset($_POST["HEADERPiece"])) {
                    echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                    echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                    echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                    echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                    echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                    echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                }
                //DATA FROM HEADERS
                //DATA FROM UPS
                if (isset($_POST["UPSPiece"])) {
                    echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                    echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                    echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                    echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                    echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                    echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                }
                //DATA FROM UPS
                //DATA FROM LED IN PC CASE
                if (isset($_POST["LEDPCPiece"])) {
                    echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                    echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                    echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                }
                //DATA FROM LED IN PC CASE
                //DATA FROM LED IN DESK
                if (isset($_POST["LEDDESKPiece"])) {
                    echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                    echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                    echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                    echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                    echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                    echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                }
                //DATA FROM LED IN DESK
                //DATA FROM OPTICAL DRIVE
                if (isset($_POST["OPTICALPiece"])) {
                    echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                    echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                    echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                    echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                    echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                    echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                }
                //DATA FROM OPTICAL DRIVE
                //DATA FROM SOUND CARD
                if (isset($_POST["SOUNDPiece"])) {
                    echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                    echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                    echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                    echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                    echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                }
                //DATA FROM SOUND CARD
                //DATA FROM PRINTER
                if (isset($_POST["PRINTPiece"])) {
                    echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                    echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                    echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                    echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                    echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                    echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                }
                //DATA FROM PRINTER
                //DATA FROM SCANNER
                if (isset($_POST["SCANPiece"])) {
                    echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                    echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                    echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                    echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                    echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                    echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                }
                //DATA FROM SCANNER
                //DATA FROM BLUETOOTH ADAPTERS
                if (isset($_POST["BLUEPiece"])) {
                    echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                    echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                    echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                    echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                    echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                    echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                }
                //DATA FROM BLUETOOTH ADAPTERS
      
                echo '<input type="hidden" id="pieceLEDDESK" name="LEDDESKPiece" value="Led for Desk">';
                echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $row["ProductCode"]. '">';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="LED Strip"><br><br>';
                if ($ekptwshPrice == $PriceMod) {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } elseif ($ekptwshPrice == "0") {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="">';
                } else {
                if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                } else {
                  $ekptwshPososto = 0;
                }
                echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $row["Price"]. '">';
                }
                echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                  echo '<div class="contentMin">';
                    echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED type</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_type"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Length</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["length"]. 'm</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power supply</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["psu"]. '</td>
                          </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">LED density</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["led_p"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Power</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["power"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Waterproofing</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["water_resistance"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Contains</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["conatin"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">Colour</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["colour"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                          <!--ONE SPEC-->
                            <tr>
                              <td class="NameOfSpecsMin">White temperature</td>
                            </tr>
                            <tr>
                              <td class="FromDatabaseSpecsMin">'. $row["white_temp"]. '</td>
                            </tr>
                          <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                      </table>';
                  echo '</div></center>';
                echo '<br><p><button class="cardButtonMin">I Want This!</button></p>';
                echo '</form>';
                echo '</div>';
                echo '<div id="brAfterCards'. $onoma_for_title. '"></div>';
              //PRODUCT CARDS MIN
            }
          } else {
            echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
          }
        }
        //RESULTS
        } else {
        echo "<br><br><br>";
		    echo '<b><center><font color="#b32400"><font size="7">You should choose CPU first!</font></font></center></b>';
        echo '<br><br><br>';
        //LIST OF HARDWARE
        echo '<script>
            document.getElementById("main").style.display = "none";
            document.getElementById("error").style.display = "block";
            </script>';
        //LIST OF HARDWARE
      }
      $conn->close();
    ?>
</div>

  <br><button type="button" id="openModalMin" class="open-modal2" data-open="modal1" onclick="hideBigFiltersButton()">
      <i class="fas fa-filter"></i> Filters
    </button>

    </article>
</section>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<!--<footer>-->

<!--END OF SHEET-->
    <!--<img src="../../../logo/pictureForTabs.png" width="25%" height="25%" ALT="PC Builder" HSPACE="30">
    <br>
    <h4><FONT COLOR="white">Created and designed by Tsalmas Anastasios ©</FONT></H4>
    <br>-->
<!--END OF SHEET-->

<!--</footer>-->

<!--Layout-----------------------END-->
</div>
</div>
<!--WHEN THE USER IS RIGHT-->

<script>
  
    function hideBigFiltersButton() {
      if (document.getElementById("cardHow").innerHTML == "B") {
        document.getElementById("openModalMin").style.display = "none";
        document.getElementById("myTopnav").style.display = "none";
      }
    }

    function showBigFiltersButton() {
      if (document.getElementById("cardHow").innerHTML == "B") {
        document.getElementById("openModalMin").style.display = "block";
        document.getElementById("myTopnav").style.display = "block";
      }
    }
  
</script>

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

<?php
  $temp = $onoma_for_title;

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

  echo '<script>

    //MODAL BOX FOR FILTERS
    const openEls = document.querySelectorAll("[data-open]");
    const closeEls = document.querySelectorAll("[data-close]");
    const isVisible = "is-visible";

    for (const el of openEls) {
      el.addEventListener("click", function () {
        const modalId = this.dataset.open;
        document.getElementById(modalId).classList.add(isVisible);';
        //FOR PRODUCT CARDS
        //$onoma_for_title = 0;
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
          echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
          echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
        }
        echo 'document.getElementById("openModalMin").style.display = "none";';
        echo 'document.getElementById("myTopnav").style.display = "none";';
        //FOR PRODUCT CARDS
      echo '});
    }

    for (const el of closeEls) {
      el.addEventListener("click", function () {
        this.parentElement.parentElement.parentElement.classList.remove(isVisible);
        if (document.getElementById("cardHow").innerHTML == "B") {';
          for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "block";';
          }
        //FOR PRODUCT CARDS-MAX
        echo 'document.getElementById("openModalMin").style.display = "block";';
        echo 'document.getElementById("br-before-search-engine").innerHTML = "<br>";';
        echo '} else {';
          //FOR PRODUCT CARDS-MAX
          for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
              echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "block";';
              echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
          }
          //FOR PRODUCT CARDS-MAX
          echo 'document.getElementById("br-before-search-engine").innerHTML = "";';
        echo '}
        document.getElementById("myTopnav").style.display = "block";
      });
    }

    document.addEventListener("click", (e) => {
      if (e.target == document.querySelector(".modal.is-visible")) {
        document.querySelector(".modal.is-visible").classList.remove(isVisible);
        if (document.getElementById("cardHow").innerHTML == "B") {';
          //FOR PRODUCT CARDS-MAX
          for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
              echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
              echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "block";';
          }
          //FOR PRODUCT CARDS-MAX
          echo 'document.getElementById("openModalMin").style.display = "block";';
          echo 'document.getElementById("br-before-search-engine").innerHTML = "<br>";';
        echo '} else {';
          //FOR PRODUCT CARDS-MAX
          for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
              echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "block";';
              echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
          }
          //FOR PRODUCT CARDS-MAX
          echo 'document.getElementById("br-before-search-engine").innerHTML = "";';
        echo '}
        document.getElementById("myTopnav").style.display = "block";
      }
    });

    document.addEventListener("keyup", (e) => {
      // if we press the ESC
      if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
        document.querySelector(".modal.is-visible").classList.remove(isVisible);
        if (document.getElementById("cardHow").innerHTML == "B") {';
          //FOR PRODUCT CARDS-MAX
          for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "block";';
        }
        //FOR PRODUCT CARDS-MAX
        echo 'document.getElementById("openModalMin").style.display = "block";';
        echo 'document.getElementById("br-before-search-engine").innerHTML = "<br>";';
      echo '} else {';
        //FOR PRODUCT CARDS-MAX
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "block";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
        }
          //FOR PRODUCT CARDS-MAX
          echo 'document.getElementById("br-before-search-engine").innerHTML = "";';
        echo '}
        document.getElementById("myTopnav").style.display = "block";
      }
    });
    //MODAL BOX FOR FILTERS
  </script>
  <script>
    function WindowResize() {
      var size = window.outerWidth;
      if (size > 800) {
        document.getElementById("cardHow").innerHTML = "A";
      }
      if (size <= 800) {
        document.getElementById("cardHow").innerHTML = "B";
      }

      if (document.getElementById("cardHow").innerHTML == "B") {';
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "<br>";';
        }
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "<br>";';
        }
        echo 'document.getElementById("cardMinBrFirst").innerHTML = "<br>";';
        echo 'document.getElementById("br-before-search-engine").innerHTML = "<br>";';
      echo '}

      if (document.getElementById("cardHow").innerHTML == "B" && document.getElementById("modal1").className == "modal") {';
        //FOR PRODUCT CARD-MAX************HIDE
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "block";';
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "<br>";';
        }
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "block";';
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "<br>";';
        }
        //FOR PRODUCT CARD-MAX************HIDE
        echo 'document.getElementById("br-before-search-engine").innerHTML = "<br>";';
        echo 'document.getElementById("cardMinBrFirst").innerHTML = "<br>";
        document.getElementById("openModalMin").style.display = "block";
      } else if (document.getElementById("cardHow").innerHTML == "A" && document.getElementById("modal1").className == "modal") {';
        //FOR PRODUCT CARD-MAX************SHOW
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "block";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "";';
        }
        for($onoma_for_title = 1; $onoma_for_title<= $temp; $onoma_for_title++){
            echo 'document.getElementById("productCardContainer'. $onoma_for_title. '").style.display = "block";';
            echo 'document.getElementById("cardMin'. $onoma_for_title. '").style.display = "none";';
            echo 'document.getElementById("brAfterCards'. $onoma_for_title. '").innerHTML = "";';
        }
        //FOR PRODUCT CARD-MAX************SHOW
        echo 'document.getElementById("br-before-search-engine").innerHTML = "";';
        echo 'document.getElementById("cardMinBrFirst").innerHTML = "";
        document.getElementById("openModalMin").style.display = "none";
      }
    }
  </script>';
  $conn->close();
?>

<!--SCRIPT FOR PC COLLAPSIBLE-->
<script>
var coll = document.getElementsByClassName("productCard-Button");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active-card");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<!--SCRIPT FOR PC COLLAPSIBLE-->

<!--SCRIPT FOR COLLAPSIBLE MIN-->
<script>
var coll = document.getElementsByClassName("collapsibleMin");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activeMin");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var size = window.size;

</script>
<!--SCRIPT FOR COLLAPSIBLE MIN-->

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

<!--MODAL FORM SUBMIT-->
<script>
  function footerModal() {
    document.getElementById("buttonsForFilters").style.display = "block";
  }
</script>
<!--MODAL FORM SUBMIT-->

<!--SCRIPT FOR SUBMIT FORM WITH ONCLICK IN OPTION BOX-->
<script>
  function submitForFilters() {
    var submitForm = document.getElementsByName('formFiltersModal');
    submitForm[0].submit()
  }
</script>
<!--SCRIPT FOR SUBMIT FORM WITH ONCLICK IN OPTION BOX-->

<?php
  echo '<script>
    function forCorrectSubmit() {
        var actionVar = document.getElementById("searchBar").value;';
        if (isset($_POST["searchBar"])) {
          echo 'var searchVar = "'. $_POST["searchBar"]. '";';
        } else {
          echo 'var searchVar = "";';
        }
        echo 'if (actionVar == "") {
            //document.getElementById("searchBar").value = searchVar;
            return false;
        }
    }    
  </script>';
?>

</BODY>
    
</html>