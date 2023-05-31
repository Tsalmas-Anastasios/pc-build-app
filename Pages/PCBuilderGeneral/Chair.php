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
	<TITLE>PC Build App-PC Builder-Ready PC Build-Category:<?php echo $_POST["categoryCPU"]; ?>/Chair select</TITLE>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../../../StyleSheets/AMD/Layout.css">-->
    <link rel="stylesheet" href="../../../StyleSheets/AMD/LayoutNot.css">
    <link rel="stylesheet" href="../../../StyleSheets/TopNav.css">
    <link rel="stylesheet" href="../../../StyleSheets/PC-Builder-General/search/no-one-character.css">
    <link rel="stylesheet" href="../../../StyleSheets/PC-Builder-General/search/no-results.css">

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

    <!--STYLESHEETS FOR COLOR OPTION BOXES-->
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/black.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/blue.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/brown.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/colourful.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/gold.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/green.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/grey.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/orange.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/other-colors.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/pink.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/pink-gold.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/purple.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/red.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/silver.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/tirkouaz.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/white.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/yellow.css">
    <link rel="stylesheet" href="../../../StyleSheets/PCBuilderReady/mouse-page/radio-buttons/colors/beige.css">
    <!--STYLESHEETS FOR COLOR OPTION BOXES-->

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
            <section class="modal-content">';
              //DATA FROM DATABASE FOR CHAIR---------------
              
              $keywords = "";
              //FOR GAMING PANEL------------------------------------------START
              if (isset($_POST["colourGamingSubmit"]) or isset($_POST["materialGamingSubmit"])) {
                if (isset($_POST["colourGamingSubmit"])) {
                  $key = $_POST["colourGamingSubmit"];
                  $keywords = " colour_gaming='$key'";
                }
                if (isset($_POST["materialGamingSubmit"])) {
                  $key = $_POST["materialGamingSubmit"];
                  if ($keywords == "") {
                    $keywords = " material_gaming='$key'";
                  } else {
                    $keywords .= " AND material_gaming='$key'";
                  }
                }
                $keywords .= " AND Category='Gaming'";
              }
              //FOR GAMING PANEL------------------------------------------END
              //FOR DESK PANEL------------------------------------------START
              if (isset($_POST["colourDeskSubmit"]) or isset($_POST["materialDeskSubmit"]) or isset($_POST["typeDeskSubmit"]) or isset($_POST["charDeskSubmit"])) {
                if (isset($_POST["colourDeskSubmit"])) {
                  $key = $_POST["colourDeskSubmit"];
                  $keywords = "colour_desk='$key'";
                }
                if (isset($_POST["materialDeskSubmit"])) {
                  $key = $_POST["materialDeskSubmit"];
                  if ($keywords == "") {
                    $keywords = " yliko_desk='$key'";
                  } else {
                    $keywords .= " AND yliko_desk='$key'";
                  }
                }
                if (isset($_POST["typeDeskSubmit"])) {
                  $key = $_POST["typeDeskSubmit"];
                  if ($keywords == "") {
                    $keywords = " type_desk='$key'";
                  } else {
                    $keywords .= " AND type_desk='$key'";
                  }
                }
                if (isset($_POST["charDeskSubmit"])) {
                  $key = $_POST["charDeskSubmit"];
                  if ($keywords == "") {
                    $keywords = " withHands_desk='$key'";
                  } else {
                    $keywords .= " AND withHands_desk='$key'";
                  }
                }
                $keywords .= " AND Category='For desk'";
              }
              //FOR DESK PANEL------------------------------------------END

              //MAKE THE $sql VARIABLE------------------------------------------START
              if ($keywords != "") {
                $sql = "SELECT * FROM Chair WHERE$keywords";
              } else {
                $sql = "SELECT * FROM Chair";
              }
              //MAKE THE $sql VARIABLE------------------------------------------START

              //COUNT VARIABLES FOR TWO CATEGORIES: Gaming, For desk--SIMPLE SITUATION------------------------------------------START
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                //for gaming chairs---start
                  //color--start
                  $black_gaming = 0;                //BLACK
                  $white_gaming = 0;                //WHITE
                  $red_gaming = 0;                  //RED
                  $blue_gaming = 0;                 //BLUE
                  $grey_gaming = 0;                 //GREY
                  $pink_gaming = 0;                 //PINK
                  $colourful_gaming = 0;            //COLOURFUL
                  $green_gaming = 0;                //GREEN
                  $tirkouaz_gaming = 0;             //TURQUOISE
                  $purple_gaming = 0;               //PURPLE
                  $yellow_gaming = 0;               //YELLOW
                  $orange_gaming = 0;               //ORANGE
                  $bez_gaming = 0;                  //BEIGE
                  $otherColors_gaming = 0;          //OTHER COLORS
                  //color--end
                  //material--start
                  $dermatini_gaming = 0;            //LEATHER
                  $yfasma_gaming = 0;               //FABRIC
                  $derma_gaming = 0;                //GENUINE LEATHER
                  //material--end
                //for gaming chairs---end
                //for 'for desk' chairs---start
                  //color--start
                  $black_desk = 0;                  //BLACK
                  $white_desk = 0;                  //WHITE
                  $red_desk = 0;                    //RED
                  $blue_desk = 0;                   //BLUE
                  $grey_desk = 0;                   //GREY
                  $pink_desk = 0;                   //PINK
                  $colourful_desk = 0;              //COLOURFUL
                  $green_desk = 0;                  //GREEN
                  $tirkouaz_desk = 0;               //TURQUOISE
                  $purple_desk = 0;                 //PURPLE
                  $yellow_desk = 0;                 //YELLOW
                  $orange_desk = 0;                 //ORANGE
                  $bez_desk = 0;                    //BEIGE
                  $otherColors_desk = 0;            //OTHER COLORS
                  //color--end
                  //type--start
                  $president_desk = 0;              //MANAGERIAL
                  $employee_desk = 0;               //LABOR
                  //type--end
                  //characteristics--start
                  $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                  //characteristics--end
                  //material--start
                  $dermatini_desk = 0;              //LEATHER
                  $mesh_desk = 0;                   //MESH
                  $yfasma_desk = 0;                 //FABRIC
                  $derma_desk = 0;                  //GENUINE LEATHER
                  $plastic_desk = 0;                //PLASTIC
                  //material--end
                //for 'for desk' chairs---end
                while($row = $result->fetch_assoc()) {
                  if ($row["Category"] == "Gaming") {
                    //colour--start
                    if ($row["colour_gaming"] == "Black") {
                      $black_gaming++;
                    } elseif ($row["colour_gaming"] == "White") {
                      $white_gaming++;
                    } elseif ($row["colour_gaming"] == "Red") {
                      $red_gaming++;
                    } elseif ($row["colour_gaming"] == "Blue") {
                      $blue_gaming++;
                    } elseif ($row["colour_gaming"] == "Grey") {
                      $grey_gaming++;
                    } elseif ($row["colour_gaming"] == "Pink") {
                      $pink_gaming++;
                    } elseif ($row["colour_gaming"] == "Colourful") {
                      $colourful_gaming++;
                    } elseif ($row["colour_gaming"] == "Green") {
                      $green_gaming++;
                    } elseif ($row["colour_gaming"] == "Turqoise") {
                      $tirkouaz_gaming++;
                    } elseif ($row["colour_gaming"] == "Purple") {
                      $purple_gaming++;
                    } elseif ($row["colour_gaming"] == "Yellow") {
                      $yellow_gaming++;
                    } elseif ($row["colour_gaming"] == "Orange") {
                      $orange_gaming++;
                    } elseif ($row["colour_gaming"] == "Beige") {
                      $bez_gaming++;
                    } else {
                      $otherColors_gaming++;
                    }
                    //colour--end
                    //material--start
                    if ($row["material_gaming"] == "Leather") {
                      $dermatini_gaming++;
                    } elseif ($row["material_gaming"] == "Fabric") {
                      $yfasma_gaming++;
                    } elseif ($row["material_gaming"] == "Genuine Leather") {
                      $derma_gaming++;
                    }
                    //material--end
                  } elseif ($row["Category"] == "For desk") {
                    //color--start
                    if ($row["colour_desk"] == "Black") {
                      $black_desk++;
                    } elseif ($row["colour_desk"] == "White") {
                      $white_desk++;
                    } elseif ($row["colour_desk"] == "Red") {
                      $red_desk++;
                    } elseif ($row["colour_desk"] == "Blue") {
                      $blue_desk++;
                    } elseif ($row["colour_desk"] == "Grey") {
                      $grey_desk++;
                    } elseif ($row["colour_desk"] == "Pink") {
                      $pink_desk++;
                    } elseif ($row["colour_desk"] == "Colourful") {
                      $colourful_desk++;
                    } elseif ($row["colour_desk"] == "Green") {
                      $green_desk++;
                    } elseif ($row["colour_desk"] == "Turqoise") {
                      $tirkouaz_desk++;
                    } elseif ($row["colour_desk"] == "Purple") {
                      $purple_desk++;
                    } elseif ($row["colour_desk"] == "Yellow") {
                      $yellow_desk++;
                    } elseif ($row["colour_desk"] == "Orange") {
                      $orange_desk++;
                    } elseif ($row["colour_desk"] == "Beige") {
                      $bez_desk++;
                    } else {
                      $otherColors_desk++;
                    }
                    //color--end
                    //type--start
                    if ($row["type_desk"] == "Managerial") {
                      $president_desk++;
                    } elseif ($row["type_desk"] == "Labor") {
                      $employee_desk++;
                    }
                    //type--end
                    //characteristics--start
                    if ($row["withHads_desk"] == "Yes") {
                      $withHands_desk++;
                    }
                    //characteristics--end
                    //material--start
                    if ($row["material_desk"] == "Leather") {
                      $dermatini_desk++;
                    } elseif ($row["material_desk"] == "Mesh") {
                      $mesh_desk++;
                    } elseif ($row["material_desk"] == "Fabric") {
                      $yfasma_desk++;
                    } elseif ($row["material_desk"] == "Genuine Leather") {
                      $derma_desk++;
                    } elseif ($row["material_desk"] == "Plastic") {
                      $plastic_desk++;
                    }
                    //material--end
                  }
                }
              }
              //COUNT VARIABLES FOR TWO CATEGORIES: Gaming, For desk--SIMPLE SITUATION------------------------------------------END

              if (isset($_POST["categorySubmit"])) {
                //FOR GAMING PANEL--START
                if ($_POST["categorySubmit"] == " Gaming") {
                  //FOR 1 Submit-START
                    //FOR $_POST["colourGamingSubmit"]--START
                    if (isset($_POST["colourGamingSubmit"]) and !isset($_POST["materialGamingSubmit"])) {
                      //color--start
                      $black_gaming = 0;                //BLACK
                      $white_gaming = 0;                //WHITE
                      $red_gaming = 0;                  //RED
                      $blue_gaming = 0;                 //BLUE
                      $grey_gaming = 0;                 //GREY
                      $pink_gaming = 0;                 //PINK
                      $colourful_gaming = 0;            //COLOURFUL
                      $green_gaming = 0;                //GREEN
                      $tirkouaz_gaming = 0;             //TURQUOISE
                      $purple_gaming = 0;               //PURPLE
                      $yellow_gaming = 0;               //YELLOW
                      $orange_gaming = 0;               //ORANGE
                      $bez_gaming = 0;                  //BEIGE
                      $otherColors_gaming = 0;          //OTHER COLORS
                      //color--end
                      $sql = "SELECT * FROM Chair WHERE Category='Gaming'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //colour--start
                          if ($row["colour_gaming"] == "Black") {
                            $black_gaming++;
                          } elseif ($row["colour_gaming"] == "White") {
                            $white_gaming++;
                          } elseif ($row["colour_gaming"] == "Red") {
                            $red_gaming++;
                          } elseif ($row["colour_gaming"] == "Blue") {
                            $blue_gaming++;
                          } elseif ($row["colour_gaming"] == "Grey") {
                            $grey_gaming++;
                          } elseif ($row["colour_gaming"] == "Pink") {
                            $pink_gaming++;
                          } elseif ($row["colour_gaming"] == "Colourful") {
                            $colourful_gaming++;
                          } elseif ($row["colour_gaming"] == "Green") {
                            $green_gaming++;
                          } elseif ($row["colour_gaming"] == "Turqoise") {
                            $tirkouaz_gaming++;
                          } elseif ($row["colour_gaming"] == "Purple") {
                            $purple_gaming++;
                          } elseif ($row["colour_gaming"] == "Yellow") {
                            $yellow_gaming++;
                          } elseif ($row["colour_gaming"] == "Orange") {
                            $orange_gaming++;
                          } elseif ($row["colour_gaming"] == "Beige") {
                            $bez_gaming++;
                          } else {
                            $otherColors_gaming++;
                          }
                          //colour--end
                        }
                      }
                    }
                    //FOR $_POST["colourGamingSubmit"]--END
                    //FOR $_POST["materialGamingSubmit"]--START
                    if (isset($_POST["materialGamingSubmit"]) and !isset($_POST["colourGamingSubmit"])) {
                      //material--start
                      $dermatini_gaming = 0;            //LEATHER
                      $yfasma_gaming = 0;               //FABRIC
                      $derma_gaming = 0;                //GENUINE LEATHER
                      //material--end
                      $sql = "SELECT * FROM Chair WHERE Category='Gaming'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //material--start
                          if ($row["material_gaming"] == "Leather") {
                            $dermatini_gaming++;
                          } elseif ($row["material_gaming"] == "Fabric") {
                            $yfasma_gaming++;
                          } elseif ($row["material_gaming"] == "Genuine Leather") {
                            $derma_gaming++;
                          }
                          //material--end
                        }
                      }
                    }
                    //FOR $_POST["materialGamingSubmit"]--END
                  //IF 1 Submit--END

                  //IF 2 Submits--START
                    if (isset($_POST["colourGamingSubmit"]) and isset($_POST["materialGamingSubmit"])) {
                      //FOR $_POST["colourGamingSubmit"]
                      $key = $_POST["materialGamingSubmit"];
                      $sql = "SELECT * FROM Chair WHERE material_gaming='$key' AND Category='Gaming'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        //color--start
                        $black_gaming = 0;                //BLACK
                        $white_gaming = 0;                //WHITE
                        $red_gaming = 0;                  //RED
                        $blue_gaming = 0;                 //BLUE
                        $grey_gaming = 0;                 //GREY
                        $pink_gaming = 0;                 //PINK
                        $colourful_gaming = 0;            //COLOURFUL
                        $green_gaming = 0;                //GREEN
                        $tirkouaz_gaming = 0;             //TURQUOISE
                        $purple_gaming = 0;               //PURPLE
                        $yellow_gaming = 0;               //YELLOW
                        $orange_gaming = 0;               //ORANGE
                        $bez_gaming = 0;                  //BEIGE
                        $otherColors_gaming = 0;          //OTHER COLORS
                        //color--end
                        while($row = $result->fetch_assoc()) {
                          //colour--start
                          if ($row["colour_gaming"] == "Black") {
                            $black_gaming++;
                          } elseif ($row["colour_gaming"] == "White") {
                            $white_gaming++;
                          } elseif ($row["colour_gaming"] == "Red") {
                            $red_gaming++;
                          } elseif ($row["colour_gaming"] == "Blue") {
                            $blue_gaming++;
                          } elseif ($row["colour_gaming"] == "Grey") {
                            $grey_gaming++;
                          } elseif ($row["colour_gaming"] == "Pink") {
                            $pink_gaming++;
                          } elseif ($row["colour_gaming"] == "Colourful") {
                            $colourful_gaming++;
                          } elseif ($row["colour_gaming"] == "Green") {
                            $green_gaming++;
                          } elseif ($row["colour_gaming"] == "Turqoise") {
                            $tirkouaz_gaming++;
                          } elseif ($row["colour_gaming"] == "Purple") {
                            $purple_gaming++;
                          } elseif ($row["colour_gaming"] == "Yellow") {
                            $yellow_gaming++;
                          } elseif ($row["colour_gaming"] == "Orange") {
                            $orange_gaming++;
                          } elseif ($row["colour_gaming"] == "Beige") {
                            $bez_gaming++;
                          } else {
                            $otherColors_gaming++;
                          }
                          //colour--end
                        }
                      }

                      //FOR $_POST["materialGamingSubmit"]
                      $key = $_POST["colourGamingSubmit"];
                      $sql = "SELECT * FROM Chair WHERE colour_gaming='$key' AND Category='Gaming'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        //material--start
                        $dermatini_gaming = 0;            //LEATHER
                        $yfasma_gaming = 0;               //FABRIC
                        $derma_gaming = 0;                //GENUINE LEATHER
                        //material--end
                        while($row = $result->fetch_assoc()) {
                          //material--start
                          if ($row["material_gaming"] == "Leather") {
                            $dermatini_gaming++;
                          } elseif ($row["material_gaming"] == "Fabric") {
                            $yfasma_gaming++;
                          } elseif ($row["material_gaming"] == "Genuine Leather") {
                            $derma_gaming++;
                          }
                          //material--end
                        }
                      }
                    }
                  //IF 2 Submits--END
                }
                //FOR GAMING PANEL--END
                //FOR DESK PANEL--START
                  //FOR 1 Submit--START
                    //FOR $_POST["colourDeskSubmit"]--START
                    if (isset($_POST["colourDeskSubmit"]) and !isset($_POST["materialDeskSubmit"]) and !isset($_POST["typeDeskSubmit"]) and !isset($_POST["charDeskSubmit"])) {
                      //color--start
                      $black_desk = 0;                  //BLACK
                      $white_desk = 0;                  //WHITE
                      $red_desk = 0;                    //RED
                      $blue_desk = 0;                   //BLUE
                      $grey_desk = 0;                   //GREY
                      $pink_desk = 0;                   //PINK
                      $colourful_desk = 0;              //COLOURFUL
                      $green_desk = 0;                  //GREEN
                      $tirkouaz_desk = 0;               //TURQUOISE
                      $purple_desk = 0;                 //PURPLE
                      $yellow_desk = 0;                 //YELLOW
                      $orange_desk = 0;                 //ORANGE
                      $bez_desk = 0;                    //BEIGE
                      $otherColors_desk = 0;            //OTHER COLORS
                      //color--end
                      $sql = "SELECT * FROM Chair WHERE Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //color--start
                          if ($row["colour_desk"] == "Black") {
                            $black_desk++;
                          } elseif ($row["colour_desk"] == "White") {
                            $white_desk++;
                          } elseif ($row["colour_desk"] == "Red") {
                            $red_desk++;
                          } elseif ($row["colour_desk"] == "Blue") {
                            $blue_desk++;
                          } elseif ($row["colour_desk"] == "Grey") {
                            $grey_desk++;
                          } elseif ($row["colour_desk"] == "Pink") {
                            $pink_desk++;
                          } elseif ($row["colour_desk"] == "Colourful") {
                            $colourful_desk++;
                          } elseif ($row["colour_desk"] == "Green") {
                            $green_desk++;
                          } elseif ($row["colour_desk"] == "Turqoise") {
                            $tirkouaz_desk++;
                          } elseif ($row["colour_desk"] == "Purple") {
                            $purple_desk++;
                          } elseif ($row["colour_desk"] == "Yellow") {
                            $yellow_desk++;
                          } elseif ($row["colour_desk"] == "Orange") {
                            $orange_desk++;
                          } elseif ($row["colour_desk"] == "Beige") {
                            $bez_desk++;
                          } else {
                            $otherColors_desk++;
                          }
                          //color--end
                        }
                      }
                    }
                    //FOR $_POST["colourDeskSubmit"]--END
                    //FOR $_POST["typeDeskSubmit"]--START
                    if (isset($_POST["typeDeskSubmit"]) and !isset($_POST["colourDeskSubmit"]) and !isset($_POST["charDeskSubmit"]) and !isset($_POST["materialDeskSubmit"])) {
                      //type--start
                      $president_desk = 0;              //MANAGERIAL
                      $employee_desk = 0;               //LABOR
                      //type--end
                      $sql = "SELECT * FROM Chair WHERE Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //type--start
                          if ($row["type_desk"] == "Managerial") {
                            $president_desk++;
                          } elseif ($row["type_desk"] == "Labor") {
                            $employee_desk++;
                          }
                          //type--end
                        }
                      }
                    }
                    //FOR $_POST["typeDeskSubmit"]--END
                    //FOR $_POST["charDeskSubmit"]--START
                    if (isset($_POST["charDeskSubmit"]) and !isset($_POST["colourDeskSubmit"]) and !isset($_POST["typeDeskSubmit"]) and !isset($_POST["materialDeskSubmit"])) {
                      //characteristics--start
                      $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                      //characteristics--end
                      $sql = "SELECT * FROM Chair WHERE Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //characteristics--start
                          if ($row["withHads_desk"] == "Yes") {
                            $withHands_desk++;
                          }
                          //characteristics--end
                        }
                      }
                    }
                    //FOR $_POST["charDeskSubmit"]--END
                    //FOR $_POST["materialDeskSubmit"]--START
                    if (isset($_POST["materialDeskSubmit"]) and !isset($_POST["colourDeskSubmit"]) and !isset($_POST["typeDeskSubmit"]) and !isset($_POST["charDeskSubmit"])) {
                      //material--start
                      $dermatini_desk = 0;              //LEATHER
                      $mesh_desk = 0;                   //MESH
                      $yfasma_desk = 0;                 //FABRIC
                      $derma_desk = 0;                  //GENUINE LEATHER
                      $plastic_desk = 0;                //PLASTIC
                      //material--end
                      $sql = "SELECT * FROM Chair WHERE Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //material--start
                          if ($row["material_desk"] == "Leather") {
                            $dermatini_desk++;
                          } elseif ($row["material_desk"] == "Mesh") {
                            $mesh_desk++;
                          } elseif ($row["material_desk"] == "Fabric") {
                            $yfasma_desk++;
                          } elseif ($row["material_desk"] == "Genuine Leather") {
                            $derma_desk++;
                          } elseif ($row["material_desk"] == "Plastic") {
                            $plastic_desk++;
                          }
                          //material--end
                        }
                      }
                    }
                    //FOR $_POST["materialDeskSubmit"]--END
                  //FOR 1 Submit--END
                  //FOR 2 Submits--START
                    $issetCategory = 0;
                    if (isset($_POST["colourDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["typeDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["charDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["materialDeskSubmit"])) {
                      $issetCategory++;
                    }
                    //FOR $_POST["colourDeskSubmit"]--START
                    if (isset($_POST["colourDeskSubmit"]) and (isset($_POST["typeDeskSubmit"]) or isset($_POST["charDeskSubmit"]) or isset($_POST["materialDeskSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["colourDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE colour_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 1;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (isset($_POST["typeDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 2;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 3;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {                //MATERIAL
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          } elseif ($isset == 2) {          //TYPE
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          } elseif ($isset == 3) {          //CHARACTERISTICS
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["colourDeskSubmit"]--END
                    //FOR $_POST["materialDeskSubmit"]--START
                    if (isset($_POST["materialDeskSubmit"]) and (isset($_POST["colourDeskSubmit"]) or isset($_POST["typeDeskSubmit"]) or isset($_POST["charDeskSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["materialDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE yliko_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 1;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["typeDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 2;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep == 0) {
                          $issetCategory++;
                          $isset = 3;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {                //COLOUR
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          } elseif ($isset == 2) {          //TYPE
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          } elseif ($isset == 3) {          //CHARACTERISTICS
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["materialDeskSubmit"]--END
                    //FOR $_POST["typeDeskSubmit"]--START
                    if (isset($_POST["typeDeskSubmit"]) and (isset($_POST["colourDeskSubmit"]) or isset($_POST["materialDeskSubmit"]) or isset($_POST["charDeskSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["typeDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE type_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 1;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 2;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep == 0) {
                          $issetCategory++;
                          $isset = 3;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {                //COLOUR
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          } elseif ($isset == 2) {          //MATERIAL
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          } elseif ($isset == 3) {          //CHARACTERISTICS
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeDeskSubmit"]--END
                    //FOR $_POST["charDeskSubmit"]--START
                    if (isset($_POST["charDeskSubmit"]) and (isset($_POST["colourDeskSubmit"]) or ($_POST["materialDeskSubmit"]) or isset($_POST["typeDeskSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["charDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE withHands_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 1;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep == 0) {
                          $issetStep++;
                          $isset = 2;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and  $issetStep == 0) {
                          $issetStep++;
                          $isset = 3;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {                //COLOUR
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          } elseif ($isset == 2) {          //MATERIAL
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          } elseif ($isset == 3) {          //TYPE
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["charDeskSubmit"]--END
                  //for 2 Submits--END

                  //FOR 3 Submits--START
                    $issetCategory = 0;
                    if (isset($_POST["colourDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["materialDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["typeDeskSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["charDeskSubmit"])) {
                      $issetCategory++;
                    }

                    //FOR $_POST["colourDeskSubmit"]--START
                    if (isset($_POST["colourDeskSubmit"]) and (isset($_POST["materialDeskSubmit"]) or isset($_POST["typeDeskSubmit"]) or isset($_POST["charDeskSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["materialDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["materialDeskSubmti"];
                        $keywords = " yliko_desk='$key'";
                      }
                      if (isset($_POST["typeDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["typeDeskSubmit"];
                        $keywords = " type_desk='$key'";
                      }
                      if (isset($_POST["charDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["charDeskSubmit"];
                        $keywords = " withHands_desk='$key'";
                      }
                      $key = $_POST["colourDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE$keywords AND colour_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (issetE($_POST["typeDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["materialDeskSubmit"]) and $issetSec == 2) {
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          }
                          if (isset($_POST["typeDeskSubmit"]) and $issetSec == 2) {
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          }
                          if (isset($_POST["charDeskSubmit"]) and $issetSec == 2) {
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["colourDeskSubmit"]--END
                    //FOR $_POST["materialDeskSubmit"]--START
                    if (isset($_POST["materialDeskSubmit"]) and (isset($_POST["colourDeskSubmit"]) or isset($_POST["typeDeskSubmit"]) or isset($_POST["charDeskSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["colourDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["colourDeskSubmit"];
                        $keywords = " colour_desk='$key'";
                      }
                      if (isset($_POST["typeDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["typeDeskSubmit"];
                        $keywords = " type_desk='$key'";
                      }
                      if (isset($_POST["charDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["charDeskSubmit"];
                        $keywords = " withHands_desk='$key'";
                      }
                      $key = $_POST["materialDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE$keywords AND yliko_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["typeDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["colourDeskSubmit"]) and $issetSec == 2) {
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          }
                          if (isset($_POST["typeDeskSubmit"]) and $issetSec == 2) {
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          }
                          if (isset($_POST["charDeskSubmit"]) and $issetSec == 2) {
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["materialDeskSubmit"]--END
                    //FOR $_POST["typeDeskSubmit"]--START
                    if (isset($_POST["typeDeskSubit"]) and (isset($_POST["colourDeskSubmit"]) or isset($_POST["materialDeskSubmit"]) or isset($_POST["charDeskSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["colourDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["colourDeskSubmit"];
                        $keywords = " colour_desk='$key'";
                      }
                      if (isset($_POST["materialDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["materialDeskSubmit"];
                        $keywords = " yliko_desk='$key'";
                      }
                      if (isset($_POST["charDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["charDeskSubmit"];
                        $keywords = " withHands_desk='$key'";
                      }
                      $key = $_POST["typeDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE$keywords AND type_desk='$key' AND Category='For desk'";
                      $result = $conn->quwry($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (isset($_POST["charDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //characteristics--start
                          $withHands_desk = 0;              //IF THE CHAIR HAS ARMS   
                          //characteristics--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["colourDeskSubmit"]) and $issetSec == 2) {
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          }
                          if (isset($_POST["materialDeskSubmit"]) and $issetSec == 2) {
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          }
                          if (isset($_POST["charDeskSubmit"]) and $issetSec == 2) {
                            //characteristics--start
                            if ($row["withHads_desk"] == "Yes") {
                              $withHands_desk++;
                            }
                            //characteristics--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeDeskSubmit"]--END
                    //FOR $_POST["charDeskSbubmit"]--START
                    if (isset($_POST["charDeskSubmit"]) and (isset($_POST["colourDeskSubmit"]) or isset($_POST["materialDeskSubmit"]) or isset($_POST["typeDeskSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["colourDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["colourDeskSubmit"];
                        $keywords = " colour_desk='$key'";
                      }
                      if (isset($_POST["materialDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["materialDeskSubmit"];
                        $keywords = " yliko_desk='$key'";
                      }
                      if (isset($_POST["typeDeskSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["typeDeskSubmit"];
                        $keywords = " type_desk='$key'";
                      }
                      $key = $_POST["charDeskSubmit"];
                      $sql = "SELECT * FROM Chair WHERE$keywords AND withHands_desk='$key' AND Category='For desk'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["colourDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //color--start
                          $black_desk = 0;                  //BLACK
                          $white_desk = 0;                  //WHITE
                          $red_desk = 0;                    //RED
                          $blue_desk = 0;                   //BLUE
                          $grey_desk = 0;                   //GREY
                          $pink_desk = 0;                   //PINK
                          $colourful_desk = 0;              //COLOURFUL
                          $green_desk = 0;                  //GREEN
                          $tirkouaz_desk = 0;               //TURQUOISE
                          $purple_desk = 0;                 //PURPLE
                          $yellow_desk = 0;                 //YELLOW
                          $orange_desk = 0;                 //ORANGE
                          $bez_desk = 0;                    //BEIGE
                          $otherColors_desk = 0;            //OTHER COLORS
                          //color--end
                        }
                        if (isset($_POST["materialDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //material--start
                          $dermatini_desk = 0;              //LEATHER
                          $mesh_desk = 0;                   //MESH
                          $yfasma_desk = 0;                 //FABRIC
                          $derma_desk = 0;                  //GENUINE LEATHER
                          $plastic_desk = 0;                //PLASTIC
                          //material--end
                        }
                        if (isset($_POST["typeDeskSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //type--start
                          $president_desk = 0;              //MANAGERIAL
                          $employee_desk = 0;               //LABOR
                          //type--end
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["colourDeskSubmit"]) and $issetSec == 2) {
                            //color--start
                            if ($row["colour_desk"] == "Black") {
                              $black_desk++;
                            } elseif ($row["colour_desk"] == "White") {
                              $white_desk++;
                            } elseif ($row["colour_desk"] == "Red") {
                              $red_desk++;
                            } elseif ($row["colour_desk"] == "Blue") {
                              $blue_desk++;
                            } elseif ($row["colour_desk"] == "Grey") {
                              $grey_desk++;
                            } elseif ($row["colour_desk"] == "Pink") {
                              $pink_desk++;
                            } elseif ($row["colour_desk"] == "Colourful") {
                              $colourful_desk++;
                            } elseif ($row["colour_desk"] == "Green") {
                              $green_desk++;
                            } elseif ($row["colour_desk"] == "Turqoise") {
                              $tirkouaz_desk++;
                            } elseif ($row["colour_desk"] == "Purple") {
                              $purple_desk++;
                            } elseif ($row["colour_desk"] == "Yellow") {
                              $yellow_desk++;
                            } elseif ($row["colour_desk"] == "Orange") {
                              $orange_desk++;
                            } elseif ($row["colour_desk"] == "Beige") {
                              $bez_desk++;
                            } else {
                              $otherColors_desk++;
                            }
                            //color--end
                          }
                          if (isset($_POST["materialDeskSubmit"]) and $issetSec == 2) {
                            //material--start
                            if ($row["material_desk"] == "Leather") {
                              $dermatini_desk++;
                            } elseif ($row["material_desk"] == "Mesh") {
                              $mesh_desk++;
                            } elseif ($row["material_desk"] == "Fabric") {
                              $yfasma_desk++;
                            } elseif ($row["material_desk"] == "Genuine Leather") {
                              $derma_desk++;
                            } elseif ($row["material_desk"] == "Plastic") {
                              $plastic_desk++;
                            }
                            //material--end
                          }
                          if (isset($_POST["typeDeskSubmit"]) and $issetSec == 2) {
                            //type--start
                            if ($row["type_desk"] == "Managerial") {
                              $president_desk++;
                            } elseif ($row["type_desk"] == "Labor") {
                              $employee_desk++;
                            }
                            //type--end
                          }
                        }
                      }
                    }
                    //FOR $_POST["charDeskSubmit"]--END
                  //FOR 3 Submits--END
                //FOR DESK PANEL--END
              }
              //DATA FROM DATABASE FOR CHAIR---------------
              //CREATE OPTION BOXES--START
                //FOR MAIN OPTION BOXES--START
                echo '<p class="typesOfDisksInCategorySSD">
                  <b>Chair kind</b>
                </p><br>
                <center>';
                  $sql = "SELECT * FROM Chair WHERE Category='Gaming'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $gaming_chair = 0;
                    while($row = $result->fetch_assoc()) {
                      $gaming_chair++;
                    }
                    echo '<label class="containerRadioButtonOnRowType">Gaming Chairs ('. $gaming_chair. ')
                      <input type="radio" name="chairType" id="Gaming" value="Gaming" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                      <span class="checkmarkRadioButton"></span>
                    </label>&nbsp;&nbsp;&nbsp;';
                  } else {
                    echo '<label class="containerRadioButtonOnRowType"><font color="#b3b3b3">Gaming Chairs (0)</font>
                      <input type="radio" name="chairType" id="Gaming" value="Gaming" disabled> <!--checked="checked"-->
                      <span class="checkmarkRadioButton"></span>
                    </label>&nbsp;&nbsp;&nbsp;';
                  }

                  $sql = "SELECT * FROM Chair WHERE Category='For Desk'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $for_desk_chair = 0;
                    echo '<label class="containerRadioButtonOnRowType">For desk ('. $for_desk_chair. ')
                      <input type="radio" name="chairType" id="Fordesk" value="For desk" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                      <span class="checkmarkRadioButton"></span>
                    </label>&nbsp;&nbsp;&nbsp;';
                  } else {
                    echo '<label class="containerRadioButtonOnRowType"><font color="#b3b3b3">For desk (0)</font>
                      <input type="radio" name="chairType" id="Fordesk" value="For desk" disabled> <!--checked="checked"-->
                      <span class="checkmarkRadioButton"></span>
                    </label>&nbsp;&nbsp;&nbsp;';
                  }
                echo '</center>';
                //FOR MAIN OPTION BOXES--END

                //LET'S GO FOR GAMING PANEL--START
                echo '<div id="gamingPanel" style="display: none;">';
                  if ($black_gaming > 0 or $white_gaming > 0 or $red_gaming > 0 or $blue_gaming > 0 or $grey_gaming > 0 or $pink_gaming > 0 or $colourful_gaming > 0 or $green_gaming > 0 or $tirkouaz_gaming > 0 or $purple_desk > 0 or $yellow_gaming > 0 or $orange_gaming > 0 or $bez_gaming > 0 or $otherColors_gaming > 0) {
                    echo '<br><hr class="hrModalBox"><br>';
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Colour</b>
                    </p><br>';
                      if ($black_gaming > 0) {
                        echo '<label class="containerRadioButtonBlackColor">Black ('. $black_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Black" value="Black" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlackColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBlackColor"><font color="#b3b3b3">Black (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Black" value="Black" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlackColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($white_gaming > 0) {
                        echo '<label class="containerRadioButtonWhiteColor">White ('. $white_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="White" value="White" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonWhiteColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonWhiteColor"><font color="#b3b3b3">White (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="White" value="White" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonWhiteColor" style=""></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                        echo '<style>
                          .checkmarkRadioButtonWhiteColor {
                            background-color: #ccc;
                            border: none;
                            height: 20px;
                            width: 20px;
                          }
                          @media screen and (max-width:800px) {
                            .checkmarkRadioButtonWhiteColor {
                              height: 14px;
                              width: 14px;
                            }
                          }
                        </style>';
                      }
                      if ($red_gaming > 0) {
                        echo '<label class="containerRadioButtonRedColor">Red ('. $red_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Red" value="Red" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonRedColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonRedColor"><font color="#b3b3b3">Red (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Red" value="Red" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonRedColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($blue_gaming > 0) {
                        echo '<label class="containerRadioButtonBlueColor">Blue ('. $blue_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Blue" value="Blue" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlueColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBlueColor"><font color="#b3b3b3">Blue (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Blue" value="Blue" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlueColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($grey_gaming > 0) {
                        echo '<label class="containerRadioButtonGreyColor">Grey ('. $grey_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Grey" value="Grey" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreyColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonGreyColor"><font color="#b3b3b3">Grey (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Grey" value="Grey" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreyColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($pink_gaming > 0) {
                        echo '<label class="containerRadioButtonPinkColor">Pink ('. $pink_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Pink" value="Pink" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPinkColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonPinkColor"><font color="#b3b3b3">Pink (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Pink" value="Pink" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPinkColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($colourful_gaming > 0) {
                        echo '<label class="containerRadioButtonColourfulColor">Colourful ('. $colourful_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Colourful" value="Colourful" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonColourfulColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonColourfulColor"><font color="#b3b3b3">Colourful (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Colourful" value="Colourful" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonColourfulColor" style="background: none;background-color: #ccc;"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($green_gaming > 0) {
                        echo '<label class="containerRadioButtonGreenColor">Green ('. $green_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Green" value="Green" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreenColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonGreenColor"><font color="#b3b3b3">Green (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Green" value="Green" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGoldColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($tirkouaz_gaming > 0) {
                        echo '<label class="containerRadioButtonTirkouazColor">Turquoise ('. $tirkouaz_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Turquoise" value="Turquoise" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonTirkouazColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonTirkouazColor"><font color="#b3b3b3">Turquoise (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Turquoise" value="Turquoise" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonTirkouazColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($purple_gaming > 0) {
                        echo '<label class="containerRadioButtonPurpleColor">Purple ('. $purple_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Purple" value="Purple" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPurpleColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonPurpleColor"><font color="#b3b3b3">Purple (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Purple" value="Purple" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPurpleColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($yellow_gaming > 0) {
                        echo '<label class="containerRadioButtonYellowColor">Yellow ('. $yellow_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Yellow" value="Yellow" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonYellowColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonYellowColor"><font color="#b3b3b3">Yellow (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Yellow" value="Yellow" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonYellowColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($orange_gaming > 0) {
                        echo '<label class="containerRadioButtonOrangeColor">Orange ('. $orange_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Orange" value="Orange" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOrangeColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOrangeColor"><font color="#b3b3b3">Orange (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Orange" value="Orange" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOrangeColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($bez_gaming > 0) {
                        echo '<label class="containerRadioButtonBeigeColor">Orange ('. $orange_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="Beige" value="Beige" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBeigeColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBeigeColor"><font color="#b3b3b3">Beige (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="Beige" value="Beige" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBeigeColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($otherColors_gaming > 0) {
                        echo '<label class="containerRadioButtonOtherColor">Other Colors ('. $otherColors_gaming. ')
                          <input type="radio" name="colourGamingSubmit" id="OtherColors" value="Other Colors" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOtherColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOtherColor"><font color="#b3b3b3">Other Colors (0)</font>
                          <input type="radio" name="colourGamingSubmit" id="OtherColors" value="Other Colors" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOtherColor" style="background: none;background-color: #ccc;"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                    if ($dermatini_gaming > 0 or $yfasma_gaming > 0 or $derma_gaming > 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                  }
                  if ($dermatini_gaming > 0 or $yfasma_gaming > 0 or $derma_gaming > 0) {
                    if ($black_gaming == 0 and $white_gaming == 0 and $red_gaming == 0 and $blue_gaming == 0 and $grey_gaming == 0 and $pink_gaming == 0 and $colourful_gaming == 0 and $green_gaming == 0 and $tirkouaz_gaming == 0 and $purple_gaming == 0 and $yellow_gaming == 0 and $orange_gaming == 0 and $bez_gaming == 0 and $otherColors_gaming == 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Material</b>
                    </p><br>';
                      if ($dermatini_gaming > 0) {
                        echo '<label class="containerRadioButton">Leather ('. $dermatini_gaming. ')
                          <input type="radio" name="materialGamingSubmit" id="Leather" value="Leather" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Leather (0)</font>
                          <input type="radio" name="materialGamingSubmit" id="Leather" value="Leather" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($yfasma_gaming > 0) {
                        echo '<label class="containerRadioButton">Fabric ('. $yfasma_gaming. ')
                          <input type="radio" name="materialGamingSubmit" id="Fabric" value="Fabric" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Fabric (0)</font>
                          <input type="radio" name="materialGamingSubmit" id="Fabric" value="Fabric" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($derma_gaming > 0) {
                        echo '<label class="containerRadioButton">Genuine Leather ('. $derma_gaming. ')
                          <input type="radio" name="materialGamingSubmit" id="GenuineLeather" value="Genuine Leather" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Genuine Leather (0)</font>
                          <input type="radio" name="materialGamingSubmit" id="Genuine Leather" value="Genuine Leather" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                  }
                echo '</div>';
                //LET'S GO FOR GAMING PANEL--END
                //LET'S GO FOR 'For desk' PANEL--START
                echo '<div id="forDeskpanel" style="display: none;">';
                  if ($black_desk > 0 or $white_desk > 0 or $red_desk > 0 or $blue_desk > 0 or $grey_desk > 0 or $pink_desk > 0 or $colourful_desk > 0 or $green_desk > 0 or $tirkouaz_desk > 0 or $purple_desk > 0 or $yellow_desk > 0 or $orange_desk > 0 or $bez_desk > 0 or $otherColors_desk > 0) {
                    echo '<br><hr class="hrModalBox"><br>';
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Colour</b>
                    </p><br>';
                      if ($black_desk > 0) {
                        echo '<label class="containerRadioButtonBlackColor">Black ('. $black_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Black" value="Black" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlackColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBlackColor"><font color="#b3b3b3">Black (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Black" value="Black" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlackColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($white_desk > 0) {
                        echo '<label class="containerRadioButtonWhiteColor">White ('. $white_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="White" value="White" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonWhiteColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonWhiteColor"><font color="#b3b3b3">White (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="White" value="White" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonWhiteColor" style=""></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                        echo '<style>
                          .checkmarkRadioButtonWhiteColor {
                            background-color: #ccc;
                            border: none;
                            height: 20px;
                            width: 20px;
                          }
                          @media screen and (max-width:800px) {
                            .checkmarkRadioButtonWhiteColor {
                              height: 14px;
                              width: 14px;
                            }
                          }
                        </style>';
                      }
                      if ($red_desk > 0) {
                        echo '<label class="containerRadioButtonRedColor">Red ('. $red_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Red" value="Red" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonRedColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonRedColor"><font color="#b3b3b3">Red (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Red" value="Red" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonRedColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($blue_desk > 0) {
                        echo '<label class="containerRadioButtonBlueColor">Blue ('. $blue_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Blue" value="Blue" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlueColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBlueColor"><font color="#b3b3b3">Blue (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Blue" value="Blue" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBlueColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($grey_desk > 0) {
                        echo '<label class="containerRadioButtonGreyColor">Grey ('. $grey_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Grey" value="Grey" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreyColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonGreyColor"><font color="#b3b3b3">Grey (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Grey" value="Grey" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreyColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($pink_desk > 0) {
                        echo '<label class="containerRadioButtonPinkColor">Pink ('. $pink_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Pink" value="Pink" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPinkColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonPinkColor"><font color="#b3b3b3">Pink (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Pink" value="Pink" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPinkColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($colourful_desk > 0) {
                        echo '<label class="containerRadioButtonColourfulColor">Colourful ('. $colourful_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Colourful" value="Colourful" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonColourfulColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonColourfulColor"><font color="#b3b3b3">Colourful (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Colourful" value="Colourful" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonColourfulColor" style="background: none;background-color: #ccc;"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($green_desk > 0) {
                        echo '<label class="containerRadioButtonGreenColor">Green ('. $green_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Green" value="Green" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGreenColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonGreenColor"><font color="#b3b3b3">Green (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Green" value="Green" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonGoldColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($tirkouaz_desk > 0) {
                        echo '<label class="containerRadioButtonTirkouazColor">Turquoise ('. $tirkouaz_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Turquoise" value="Turquoise" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonTirkouazColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonTirkouazColor"><font color="#b3b3b3">Turquoise (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Turquoise" value="Turquoise" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonTirkouazColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($purple_desk > 0) {
                        echo '<label class="containerRadioButtonPurpleColor">Purple ('. $purple_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Purple" value="Purple" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPurpleColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonPurpleColor"><font color="#b3b3b3">Purple (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Purple" value="Purple" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonPurpleColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($yellow_desk > 0) {
                        echo '<label class="containerRadioButtonYellowColor">Yellow ('. $yellow_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Yellow" value="Yellow" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonYellowColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonYellowColor"><font color="#b3b3b3">Yellow (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Yellow" value="Yellow" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonYellowColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($orange_desk > 0) {
                        echo '<label class="containerRadioButtonOrangeColor">Orange ('. $orange_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Orange" value="Orange" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOrangeColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOrangeColor"><font color="#b3b3b3">Orange (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Orange" value="Orange" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOrangeColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($bez_desk > 0) {
                        echo '<label class="containerRadioButtonBeigeColor">Orange ('. $orange_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="Beige" value="Beige" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBeigeColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonBeigeColor"><font color="#b3b3b3">Beige (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="Beige" value="Beige" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonBeigeColor" style="background-color: #ccc"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($otherColors_desk > 0) {
                        echo '<label class="containerRadioButtonOtherColor">Other Colors ('. $otherColors_desk. ')
                          <input type="radio" name="colourDeskSubmit" id="OtherColors" value="Other Colors" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOtherColor"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOtherColor"><font color="#b3b3b3">Other Colors (0)</font>
                          <input type="radio" name="colourDeskSubmit" id="OtherColors" value="Other Colors" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButtonOtherColor" style="background: none;background-color: #ccc;"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($president_desk > 0 or $employee_desk > 0 or $withHands_desk > 0 or $dermatini_desk > 0 or $mesh_desk > 0 or $yfasma_desk > 0 or $derma_desk > 0 or $plastic_desk > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                  }
                  if ($president_desk > 0 or $employee_desk > 0) {
                    if ($black_desk == 0 and $white_desk == 0 and $red_desk == 0 and $blue_desk == 0 and $grey_desk == 0 and $pink_desk == 0 and $colourful_desk == 0 and $green_desk == 0 and $tirkouaz_desk == 0 and $purple_desk == 0 and $yellow_desk == 0 and $orange_desk == 0 and $bez_desk == 0 and $otherColors_desk == 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Type</b>
                    </p><br>
                    <center>';
                      if ($president_desk > 0) {
                        echo '<label class="containerRadioButtonOnRowType">Managerial ('. $president_desk. ')
                          <input type="radio" name="typeDeskSubmit" id="Managerial" value="Managerial" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOnRowType"><font color="#b3b3b3">Managerial (0)</font>
                          <input type="radio" name="typeDeskSubmit" id="Managerial" value="Managerial" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($employee_desk > 0) {
                        echo '<label class="containerRadioButtonOnRowType">Labor ('. $employee_desk. ')
                          <input type="radio" name="typeDeskSubmit" id="Labor" value="Labor" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOnRowType"><font color="#b3b3b3">Labor (0)</font>
                          <input type="radio" name="typeDeskSubmit" id="Labor" value="Labor" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                    echo '</center>';
                    if ($withHands_desk > 0 or $dermatini_desk > 0 or $mesh_desk > 0 or $yfasma_desk > 0 or $derma_desk > 0 or $plastic_desk > 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                  }
                  if ($withHands_desk > 0) {
                    if ($black_desk == 0 and $white_desk == 0 and $red_desk == 0 and $blue_desk == 0 and $grey_desk == 0 and $pink_desk == 0 and $colourful_desk == 0 and $green_desk == 0 and $tirkouaz_desk == 0 and $purple_desk == 0 and $yellow_desk == 0 and $orange_desk == 0 and $bez_desk == 0 and $otherColors_desk == 0 and $president_desk == 0 and $employee_desk == 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Characteristics</b>
                    </p><br>';
                      if ($withHands_desk > 0) {
                        echo '<label class="containerRadioButtonOnRowType">With arms ('. $withHands_desk. ')
                          <input type="radio" name="charDeskSubmit" id="Yes" value="Yes" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButtonOnRowType"><font color="#b3b3b3">With arms (0)</font>
                          <input type="radio" name="charDeskSubmit" id="Yes" value="Yes" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                    if ($dermatini_desk > 0 or $mesh_desk > 0 or $yfasma_desk > 0 or $derma_desk > 0 or $plastic_desk > 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                  }
                  if ($dermatini_desk > 0 or $mesh_desk > 0 or $yfasma_desk > 0 or $derma_desk > 0 or $plastic_desk > 0) {
                    if ($black_desk == 0 and $white_desk == 0 and $red_desk == 0 and $blue_desk == 0 and $grey_desk == 0 and $pink_desk == 0 and $colourful_desk == 0 and $green_desk == 0 and $tirkouaz_desk == 0 and $purple_desk == 0 and $yellow_desk == 0 and $orange_desk == 0 and $bez_desk == 0 and $otherColors_desk == 0 and $president_desk == 0 and $employee_desk == 0 and $withHands_desk == 0) {
                      echo '<br><hr class="hrModalBox"><br>';
                    }
                    echo '<p class="typesOfDisksInCategorySSD">
                      <b>Material</b>
                    </p><br>';
                      if ($dermatini_desk > 0) {
                        echo '<label class="containerRadioButton">Leather ('. $dermatini_desk. ')
                          <input type="radio" name="materialDeskSubmit" id="Leather" value="Leather" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Leather (0)</font>
                          <input type="radio" name="materialDeskSubmit" id="Leather" value="Leather" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($mesh_desk > 0) {
                        echo '<label class="containerRadioButton">Mesh ('. $mesh_desk. ')
                          <input type="radio" name="materialDeskSubmit" id="Mesh" value="Mesh" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Mesh (0)</font>
                          <input type="radio" name="materialDeskSubmit" id="Mesh" value="Mesh" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($yfasma_desk > 0) {
                        echo '<label class="containerRadioButton">Fabric ('. $yfasma_desk. ')
                          <input type="radio" name="materialDeskSubmit" id="Fabric" value="Fabric" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Fabric (0)</font>
                          <input type="radio" name="materialDeskSubmit" id="Fabric" value="Fabric" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($derma_desk > 0) {
                        echo '<label class="containerRadioButton">Genuine Leather ('. $derma_desk. ')
                          <input type="radio" name="materialDeskSubmit" id="GenuineLeather" value="Genuine Leather" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Genuine Leather (0)</font>
                          <input type="radio" name="materialDeskSubmit" id="GenuineLeather" value="GenuineLeather" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                      if ($plastic_desk > 0) {
                        echo '<label class="containerRadioButton">Plastic ('. $derma_desk. ')
                          <input type="radio" name="materialDeskSubmit" id="Plastic" value="Plastic" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      } else {
                        echo '<label class="containerRadioButton"><font color="#b3b3b3">Plastic (0)</font>
                          <input type="radio" name="materialDeskSubmit" id="Plastic" value="Plastic" disabled> <!--checked="checked"-->
                          <span class="checkmarkRadioButton"></span>
                        </label>&nbsp;&nbsp;&nbsp;';
                      }
                  }
                echo '</div>';
                //LET'S GO FOR 'For desk' PANEL--END
              //CREATE OPTION BOXES--END
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                <script>
                  function clearFiltersFunction() {';
                    $colourGamingSubmit_submit_explode= "";
                    $materialGamingSubmit_submit_explode = "";
                    $colourDeskSubmit_submit_explode = "";
                    $typeDeskSubmit_submit_explode = "";
                    $charDeskSubmit_submit_explode = "";
                    $materialDeskSubmit_submit_explode = "";
          
                    //IF WE ARE IN THIS IF STATEMENT THEN IT MEANS THAT THE 'chairType' IS SUBMITED FOR SURE
                    //AND WE SHOULD SHE IF ANOTHER SUBMIT IS ISSET
                    //2 VALUES FOR 'chairType' ---> =Gaming    or      =For desk
                    if ($_POST["chairType"] == "Gaming") {
                      //IN THIS INPUT 2 OTHER:
                      //------- colourGamingSubmit
                      //------- materialGamingSubmit
                        echo 'document.getElementById("Gaming").checked = false;
                        document.getElementById("gamingPanel").style.display = "none";
                        document.getElementById("forDeskpanel").style.display = "none";
                        document.getElementById("buttonsForFilters").style.display = "none";';
          
                      //colourGamingSubmit---START
                        if (isset($_POST["colourGamingSubmit"])) {
                          if ($_POST["colourGamingSubmit"] == "Other Colors") {
                            $colourGamingSubmit_submit_explode = "OtherColors";
                          } else {
                            $colourGamingSubmit_submit_explode = $_POST["colourGamingSubmit"];
                          }
                          echo 'document.getElementById("'. $colourGamingSubmit_submit_explode. '").checked = false;';
                        }
                      //colourGamingSubmit---END
                      //materialGamingSubmit---START
                        if (isset($_POST["materialGamingSubmit"])) {
                          if ($_POST["materialGamingSubmit"] == "Gaenuine Leather") {
                            $materialGamingSubmit_submit_explode = "GenuineLeather";
                          } else {
                            $materialGamingSubmit_submit_explode = $_POST["materialGamingSubmit"];
                          }
                          echo 'document.getElementById("'. $materialGamingSubmit_submit_explode. '").checked = false;';
                        }
                      //materialGamingSubmit---START
                    } elseif ($_POST["chairType"] == "For desk") {
                      //IN THIS INPUT 2 OTHER:
                      //------- colourDeskSubmit
                      //------- typeDeskSubmit
                      //------- charDeskSubmit
                      //------- materialDeskSubmit
                        echo 'document.getElementById("Fordesk").checked = false;
                        document.getElementById("forDeskpanel").style.display = "none";
                        document.getElementById("gamingPanel").style.display = "none";
                        document.getElementById("buttonsForFilters").style.display = "none";';
          
                      //colourDeskSubmit---START
                        if (isset($_POST["colourDeskSubmit"])) {
                          if ($_POST["colourDeskSubmit"] == "Other Colors") {
                            $colourDeskSubmit_submit_explode = "OtherColors";
                          } else {
                            $colourDeskSubmit_submit_explode = $_POST["colourDeskSubmit"];
                          }
                          echo 'document.getElementById("'. $colourDeskSubmit_submit_explode. '").checked = false;';
                        }
                      //colourDeskSubmit---END
                      //typeDeskSubmit---START
                        if (isset($_POST["typeDeskSubmit"])) {
                          $typeDeskSubmit_submit_explode = $_POST["typeDeskSubmit"];
                          echo 'document.getElementById("'. $typeDeskSubmit_submit_explode. '").checked = false;';
                        }
                      //typeDeskSubmit---END
                      //charDeskSubmit---START
                        if (isset($_POST["charDeskSubmit"])) {
                          $charDeskSubmit_submit_explode = $_POST["charDeskSubmit"];
                          echo 'document.getElementById("'. $charDeskSubmit_submit_explode. '").checked = false;';
                        }
                      //charDeskSubmit---END
                      //materialDeskSubmit---START
                        if (isset($_POST["materialDeskSubmit"])) {
                          if ($_POST["materialDeskSubmit"] == "Genuine Leather") {
                            $materialDeskSubmit_submit_explode = "GenuineLeather";
                          } else {
                            $materialDeskSubmit_submit_explode = $_POST["materialDeskSubmit"];
                          }
                          echo 'document.getElementById("'. $materialDeskSubmit_submit_explode. '").checked = false;';
                        }
                      //materialDeskSubmit---END
                    }
                  echo '}
                </script>
              </footer>
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
              $sql = "SELECT * FROM Chair WHERE Description LIKE '%$search_expression%'";
              $result = $conn->query($sql);
              if ($result->num_rows <= 0) {
                $sql = "SELECT * FROM Chair WHERE Description LIKE '%$search_post%'";
                $result = $conn->query($sql);
                if ($result->num_rows <=0 ) {
                  $sql = "SELECT * FROM Chair $keywords";
                  $result = $conn->query($sql);
                  if ($result->num_rows <= 0) {
                    $sql = "SELECT * FROM Chair WHERE Category='Gaming' OR Category='For desk'";
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
              $sql = "SELECT * FROM Chair WHERE Category='Gaming' OR Category='For desk'";
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
  
                    echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="Chair">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
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
                    if ($row["Category"] == "For desk") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Usage</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["use_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["yliko_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">With arms</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["withHands_desk"]. '</td>
                          </tr>
                      </table></font></center>';
                    } elseif ($row["Category"] == "Gaming") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_gaming"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["material_gaming"]. '</td>
                          </tr>
                       </table></font></center>';
                    }
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceCHAIR" name="CHAIRPiece" value="Chair">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                        if ($row["Category"] == "For desk") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Usage</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["use_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["yliko_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">With arms</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["withHands_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        } elseif ($row["Category"] == "Gaming") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["material_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        }
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

        if ($clearStep == 0 and isset($_POST["chairType"]) and $searcher == 0) {
          $keywords = "";
          $colourGamingSubmit_submit = "";
          $materialGamingSubmit_submit = "";
          $colourDeskSubmit_submit = "";
          $typeDeskSubmit_submit = "";
          $charDeskSubmit_submit = "";
          $materialDeskSubmit_submit = "";
          $something_explode = "";
          $colourGamingSubmit_submit_explode= "";
          $materialGamingSubmit_submit_explode = "";
          $colourDeskSubmit_submit_explode = "";
          $typeDeskSubmit_submit_explode = "";
          $charDeskSubmit_submit_explode = "";
          $materialDeskSubmit_submit_explode = "";

          //IF WE ARE IN THIS IF STATEMENT THEN IT MEANS THAT THE 'chairType' IS SUBMITED FOR SURE
          //AND WE SHOULD SHE IF ANOTHER SUBMIT IS ISSET
          //2 VALUES FOR 'chairType' ---> =Gaming    or      =For desk
          if ($_POST["chairType"] == "Gaming") {
            //IN THIS INPUT 2 OTHER:
            //------- colourGamingSubmit
            //------- materialGamingSubmit
            $keywords = " Category='Gaming'";
            echo '<script>
              document.getElementById("Gaming").checked = true;
              document.getElementById("gamingPanel").style.display = "block";
              document.getElementById("forDeskpanel").style.display = "none";
              document.getElementById("buttonsForFilters").style.display = "block";
            </script>';

            //colourGamingSubmit---START
              if (isset($_POST["colourGamingSubmit"])) {
                $colourGamingSubmit_submit = $_POST["colourGamingSubmit"];
                if ($_POST["colourGamingSubmit"] == "Other Colors") {
                  $colourGamingSubmit_submit_explode = "OtherColors";
                } else {
                  $colourGamingSubmit_submit_explode = $_POST["colourGamingSubmit"];
                }
                echo '<script>
                  document.getElementById("'. $colourGamingSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND colour_gaming='$colourGamingSubmit_submit'";
              }
            //colourGamingSubmit---END
            //materialGamingSubmit---START
              if (isset($_POST["materialGamingSubmit"])) {
                $materialGamingSubmit_submit = $_POST["materialGamingSubmit"];
                if ($_POST["materialGamingSubmit"] == "Gaenuine Leather") {
                  $materialGamingSubmit_submit_explode = "GenuineLeather";
                } else {
                  $materialGamingSubmit_submit_explode = $_POST["materialGamingSubmit"];
                }
                echo '<script>
                  document.getElementById("'. $materialGamingSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND material_gaming='$key'";
              }
            //materialGamingSubmit---START
          } elseif ($_POST["chairType"] == "For desk") {
            //IN THIS INPUT 2 OTHER:
            //------- colourDeskSubmit
            //------- typeDeskSubmit
            //------- charDeskSubmit
            //------- materialDeskSubmit
            $keywords = " Category='For desk'";
            echo '<script>
              document.getElementById("Fordesk").checked = true;
              document.getElementById("forDeskpanel").style.display = "block";
              document.getElementById("gamingPanel").style.display = "none";
              document.getElementById("buttonsForFilters").style.display = "block";
            </script>';

            //colourDeskSubmit---START
              if (isset($_POST["colourDeskSubmit"])) {
                $colourDeskSubmit_submit = $_POST["colourDeskSubmit"];
                if ($_POST["colourDeskSubmit"] == "Other Colors") {
                  $colourDeskSubmit_submit_explode = "OtherColors";
                } else {
                  $colourDeskSubmit_submit_explode = $_POST["colourDeskSubmit"];
                }
                echo '<script>
                  document.getElementById("'. $colourDeskSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND colour_desk='$colourDeskSubmit_submit'";
              }
            //colourDeskSubmit---END
            //typeDeskSubmit---START
              if (isset($_POST["typeDeskSubmit"])) {
                $typeDeskSubmit_submit = $_POST["typeDeskSubmit"];
                $typeDeskSubmit_submit_explode = $_POST["typeDeskSubmit"];
                echo '<script>
                  document.getElementById("'. $typeDeskSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND type_desk='$typeDeskSubmit_submit'";
              }
            //typeDeskSubmit---END
            //charDeskSubmit---START
              if (isset($_POST["charDeskSubmit"])) {
                $charDeskSubmit_submit = $_POST["charDeskSubmit"];
                $charDeskSubmit_submit_explode = $_POST["charDeskSubmit"];
                echo '<script>
                  document.getElementById("'. $charDeskSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND withHands_desk='$charDeskSubmit_submit'";
              }
            //charDeskSubmit---END
            //materialDeskSubmit---START
              if (isset($_POST["materialDeskSubmit"])) {
                $materialDeskSubmit_submit = $_POST["materialDeskSubmit"];
                if ($_POST["materialDeskSubmit"] == "Genuine Leather") {
                  $materialDeskSubmit_submit_explode = "GenuineLeather";
                } else {
                  $materialDeskSubmit_submit_explode = $_POST["materialDeskSubmit"];
                }
                echo '<script>
                  document.getElementById("'. $materialDeskSubmit_submit_explode. '").checked = true;
                </script>';
                $keywords .= " AND yliko_desk='$materialDeskSubmit_submit'";
              }
            //materialDeskSubmit---END
          }
          $sql = "SELECT * FROM Chair WHERE$keywords";
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

                  echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="Chair">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
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
                  if ($row["Category"] == "For desk") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Usage</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["use_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["yliko_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">With arms</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["withHands_desk"]. '</td>
                          </tr>
                      </table></font></center>';
                    } elseif ($row["Category"] == "Gaming") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_gaming"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["material_gaming"]. '</td>
                          </tr>
                       </table></font></center>';
                    }
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceCHAIR" name="CHAIRPiece" value="Chair">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                    if ($row["Category"] == "For desk") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Usage</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["use_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["yliko_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">With arms</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["withHands_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        } elseif ($row["Category"] == "Gaming") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["material_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        }
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
          } elseif ($clearStep == 1 and isset($_POST["clearFilters"]) && $searcher == 0) {
            echo '<script>';
              $colourGamingSubmit_submit_explode= "";
              $materialGamingSubmit_submit_explode = "";
              $colourDeskSubmit_submit_explode = "";
              $typeDeskSubmit_submit_explode = "";
              $charDeskSubmit_submit_explode = "";
              $materialDeskSubmit_submit_explode = "";
    
              //IF WE ARE IN THIS IF STATEMENT THEN IT MEANS THAT THE 'chairType' IS SUBMITED FOR SURE
              //AND WE SHOULD SHE IF ANOTHER SUBMIT IS ISSET
              //2 VALUES FOR 'chairType' ---> =Gaming    or      =For desk
              if ($_POST["chairType"] == "Gaming") {
                //IN THIS INPUT 2 OTHER:
                //------- colourGamingSubmit
                //------- materialGamingSubmit
                  echo 'document.getElementById("Gaming").checked = false;
                  document.getElementById("gamingPanel").style.display = "none";
                  document.getElementById("forDeskpanel").style.display = "none";
                  document.getElementById("buttonsForFilters").style.display = "none";';
    
                //colourGamingSubmit---START
                  if (isset($_POST["colourGamingSubmit"])) {
                    if ($_POST["colourGamingSubmit"] == "Other Colors") {
                      $colourGamingSubmit_submit_explode = "OtherColors";
                    } else {
                      $colourGamingSubmit_submit_explode = $_POST["colourGamingSubmit"];
                    }
                    echo 'document.getElementById("'. $colourGamingSubmit_submit_explode. '").checked = false;';
                  }
                //colourGamingSubmit---END
                //materialGamingSubmit---START
                  if (isset($_POST["materialGamingSubmit"])) {
                    if ($_POST["materialGamingSubmit"] == "Gaenuine Leather") {
                      $materialGamingSubmit_submit_explode = "GenuineLeather";
                    } else {
                      $materialGamingSubmit_submit_explode = $_POST["materialGamingSubmit"];
                    }
                    echo 'document.getElementById("'. $materialGamingSubmit_submit_explode. '").checked = false;';
                  }
                //materialGamingSubmit---START
              } elseif ($_POST["chairType"] == "For desk") {
                //IN THIS INPUT 2 OTHER:
                //------- colourDeskSubmit
                //------- typeDeskSubmit
                //------- charDeskSubmit
                //------- materialDeskSubmit
                  echo 'document.getElementById("Fordesk").checked = false;
                  document.getElementById("forDeskpanel").style.display = "none";
                  document.getElementById("gamingPanel").style.display = "none";
                  document.getElementById("buttonsForFilters").style.display = "none";';
    
                //colourDeskSubmit---START
                  if (isset($_POST["colourDeskSubmit"])) {
                    if ($_POST["colourDeskSubmit"] == "Other Colors") {
                      $colourDeskSubmit_submit_explode = "OtherColors";
                    } else {
                      $colourDeskSubmit_submit_explode = $_POST["colourDeskSubmit"];
                    }
                    echo 'document.getElementById("'. $colourDeskSubmit_submit_explode. '").checked = false;';
                  }
                //colourDeskSubmit---END
                //typeDeskSubmit---START
                  if (isset($_POST["typeDeskSubmit"])) {
                    $typeDeskSubmit_submit_explode = $_POST["typeDeskSubmit"];
                    echo 'document.getElementById("'. $typeDeskSubmit_submit_explode. '").checked = false;';
                  }
                //typeDeskSubmit---END
                //charDeskSubmit---START
                  if (isset($_POST["charDeskSubmit"])) {
                    $charDeskSubmit_submit_explode = $_POST["charDeskSubmit"];
                    echo 'document.getElementById("'. $charDeskSubmit_submit_explode. '").checked = false;';
                  }
                //charDeskSubmit---END
                //materialDeskSubmit---START
                  if (isset($_POST["materialDeskSubmit"])) {
                    if ($_POST["materialDeskSubmit"] == "Genuine Leather") {
                      $materialDeskSubmit_submit_explode = "GenuineLeather";
                    } else {
                      $materialDeskSubmit_submit_explode = $_POST["materialDeskSubmit"];
                    }
                    echo 'document.getElementById("'. $materialDeskSubmit_submit_explode. '").checked = false;';
                  }
                //materialDeskSubmit---END
              }
            echo '</script>';

            $onoma_for_title = 0;
            $sql = "SELECT * FROM Chair WHERE Category='Gaming' OR Category='For desk'";
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

                  echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="Chair">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
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
                  if ($row["Category"] == "For desk") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Usage</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["use_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["yliko_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">With arms</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["withHands_desk"]. '</td>
                          </tr>
                      </table></font></center>';
                    } elseif ($row["Category"] == "Gaming") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_gaming"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["material_gaming"]. '</td>
                          </tr>
                       </table></font></center>';
                    }
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceCHAIR" name="CHAIRPiece" value="Chair">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                    if ($row["Category"] == "For desk") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Usage</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["use_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["yliko_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">With arms</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["withHands_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        } elseif ($row["Category"] == "Gaming") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["material_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        }
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
          $sql = "SELECT * FROM Chair WHERE Category='Gaming' OR Category='For desk'";
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

                echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="Chair">';
              echo '<div class="productCard">';
              //INFO OF PRODUCTS
              echo '<div class="productCard-info">';
              echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
              echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
              echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
              echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
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
                if ($row["Category"] == "For desk") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Usage</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["use_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["yliko_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_desk"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">With arms</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["withHands_desk"]. '</td>
                          </tr>
                      </table></font></center>';
                    } elseif ($row["Category"] == "Gaming") {
                      echo '<center><font color="black"><table class="tableSpecs">
                          <tr class="tableSpecs">
                              <th class="rowsOnSpecs">General Characteristics</th>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Colour</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["colour_gaming"]. '</td>
                          </tr>
                          <tr class="rowsOnSpecsTR">
                              <td class="rowsOnSpecs">Material</td>
                              <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td class="rowsOnSpecs">'. $row["material_gaming"]. '</td>
                          </tr>
                       </table></font></center>';
                    }
                echo '</div>';
              echo '</div>';
              echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '">';
              //INFO OF PRODUCTS-END
              //PRICE OF PRODUCTS
              echo '<div class="productCardpreview">';
              if ($ekptwshPrice == $PriceMod) {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
              } elseif ($ekptwshPrice == "0") {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
              } else {
                if ($PriceMod > $ekptwshPrice) {
                $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                $brINbutton = 1;
                } else {
                $ekptwshPososto = 0;
                }
                echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
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
      
                echo '<input type="hidden" id="pieceCHAIR" name="CHAIRPiece" value="Chair">';
                echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $row["ProductCode"]. '">';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $row["Category"]. '"><br><br>';
                if ($ekptwshPrice == $PriceMod) {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } elseif ($ekptwshPrice == "0") {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="">';
                } else {
                if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                } else {
                  $ekptwshPososto = 0;
                }
                echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $row["Price"]. '">';
                }
                echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                  echo '<div class="contentMin">';
                  if ($row["Category"] == "For desk") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Usage</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["use_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["yliko_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">With arms</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["withHands_desk"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        } elseif ($row["Category"] == "Gaming") {
                          echo '<table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Colour</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["colour_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                                  <tr>
                                  <td class="NameOfSpecsMin">Material</td>
                                  </tr>
                                  <tr>
                                  <td class="FromDatabaseSpecsMin">'. $row["material_gaming"]. '</td>
                                  </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                          </table>';
                        }
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

<!--SCRIPT FOR SUBMIT FORM WITH ONCLICK IN OPTION BOX-->
<script>
  function submitForFilters() {
    var submitForm = document.getElementsByName('formFiltersModal');
    submitForm[0].submit()
  }
</script>
<!--SCRIPT FOR SUBMIT FORM WITH ONCLICK IN OPTION BOX-->

<!--MODAL FORM SUBMIT-->
<script>
  function footerModal() {
    document.getElementById("buttonsForFilters").style.display = "block";
  }
</script>
<!--MODAL FORM SUBMIT-->

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