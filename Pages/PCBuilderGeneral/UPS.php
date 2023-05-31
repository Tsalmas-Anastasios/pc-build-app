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
	<TITLE>PC Build App-PC Builder-Ready PC Build-Category:<?php echo $_POST["categoryCPU"]; ?>/UPS select</TITLE>
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
                  if (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) {
                      $keywords = "";
                      $key = "";
                      if (isset($_POST["typeSubmit"])) {
                          $key = $_POST["typeSubmit"];
                          $keywords = " type='$key'";
                      }
                      if (isset($_POST["numSubmit"])) {
                          $key = $_POST["numSubmit"];
                          if ($key == "2") {
                              if ($keywords == "") {
                                  $keywords = " AC<=2";
                              } else {
                                  $keywords .= " AND AC<=2";
                              }
                          } elseif ($key == "3") {
                              if ($keywords == "") {
                                  $keywords = " AC>=3 AND AC<=4";
                              } else {
                                  $keywords .= " AND AC>=3 AND AC<=4";
                              }
                          } elseif ($key == "5") {
                              if ($keywords == "") {
                                  $keywords = " AC>=5 AND AC<=6";
                              } else {
                                  $keywords .= " AND AC>=5 AND AC<=6";
                              }
                          } elseif ($key == "7") {
                              if ($keywords == "") {
                                  $keywords = " AC>=7";
                              } else {
                                  $keywords .= " AND AC>=7";
                              }
                          }
                      }
                      if (isset($_POST["exitSubmit"])) {
                          $key = $_POST["exitSubmit"];
                          if ($keywords == "") {
                              $keywords = " k_exit='$key'";
                          } else {
                              $keywords .= " AND k_exit='$key'";
                          }
                      }
                      if (isset($_POST["sizeSubmit"])) {
                          $key = $_POST["sizeSubmit"];
                          if ($keywords == "") {
                              $keywords = " size='$key'";
                          } else {
                              $keywords .= " AND size='$key'";
                          }
                      }
                      $sql = "SELECT * FROM UPS WHERE$keywords";
                  } else {
                      $sql = "SELECT * FROM UPS";
                  }
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    //Variables for type---START
                    $vi = 0;                    //(VI) Line-Interactive
                    $vf = 0;                    //(VF) On-Line/Double Conversion
                    $vfd = 0;                   //(VFD) Off-Line
                    //Variables for type---END
                    //Variables for number of sockets---START
                    $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                    $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                    $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                    $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                    //Variables for number of sockets---END
                    //Variables for output waveform---START
                    $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                    $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                    //Variables for output waveform---END
                    //Variables for size---START
                    $tower = 0;                 //Tower
                    $rack = 0;                  //Rack
                    $compact = 0;               //Compact
                    $mini = 0;                  //Mini
                    //Variables for size---END
                    while($row = $result->fetch_assoc()) {
                        //TYPE---START
                        if ($row["type"] == "(VI) Line-Interactive") {
                            $vi++;
                        } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                            $vf++;
                        } elseif ($row["type"] == "(VFD) Off-Line") {
                            $vfd++;
                        }
                        //TYPE---END
                        //NUMBER OF SOCKETS---START
                        if ($row["AC"] <= 2) {
                            $ac2++;
                        } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                            $ac3++;
                        } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                            $ac5++;
                        } elseif ($row["AC"] >= 7) {
                            $ac7++;
                        }
                        //NUMBER OF SOCKETS---END
                        //OUTPUT WAVEFORM---START
                        if ($row["k_exit"] == "Pure sine") {
                            $clear++;
                        } elseif ($row["k_exit"] == "Modified sine") {
                            $trop++;
                        }
                        //OUTPUT WAVEFORM---END
                        //SIZE---START
                        if ($row["size"] == "Tower") {
                            $tower++;
                        } elseif ($row["size"] == "Rack") {
                            $rack++;
                        } elseif ($row["size"] == "Compact") {
                            $compact++;
                        } elseif ($row["size"] == "Mini") {
                            $mini++;
                        }
                        //SIZE---END
                    }
                  }

                  //FOR ONLY 1 SUBMIT---START
                    //FOR $_POST["typeSubmit"]---START
                    if (isset($_POST["typeSubmit"]) and !isset($_POST["numSubmit"]) and !isset($_POST["exitSubmit"]) and !isset($_POST["sizeSubmit"])) {
                      //Variables for type---START
                      $vi = 0;                    //(VI) Line-Interactive
                      $vf = 0;                    //(VF) On-Line/Double Conversion
                      $vfd = 0;                   //(VFD) Off-Line
                      //Variables for type---END
                      $sql = "SELECT * FROM UPS";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //TYPE---START
                          if ($row["type"] == "(VI) Line-Interactive") {
                            $vi++;
                          } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                            $vf++;
                          } elseif ($row["type"] == "(VFD) Off-Line") {
                            $vfd++;
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeSubmit"]---END
                    //FOR $_POST["numSubmit"]---START
                    if (!isset($_POST["typeSubmit"]) and isset($_POST["numSubmit"]) and !isset($_POST["exitSubmit"]) and !isset($_POST["sizeSubmit"])) {
                      //Variables for number of sockets---START
                      $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                      $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                      $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                      $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                      //Variables for number of sockets---END
                      $sql = "SELECT * FROM UPS";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //NUMBER OF SOCKETS---START
                          if ($row["AC"] <= 2) {
                            $ac2++;
                          } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                            $ac3++;
                          } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                            $ac5++;
                          } elseif ($row["AC"] >= 7) {
                            $ac7++;
                          }
                          //NUMBER OF SOCKETS---END
                        }
                      }
                    }
                    //FOR $_POST["numSubmit"]---END
                    //FOR $_POST["exitSubmit"]---START
                    if (!isset($_POST["typeSubmit"]) and !isset($_POST["numSubmit"]) and isset($_POST["exitSubmit"]) and !isset($_POST["sizeSubmit"])) {
                      //Variables for output waveform---START
                      $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                      $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                      //Variables for output waveform---END
                      $sql = "SELECT * FROM UPS";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //OUTPUT WAVEFORM---START
                          if ($row["k_exit"] == "Pure sine") {
                            $clear++;
                          } elseif ($row["k_exit"] == "Modified sine") {
                            $trop++;
                          }
                          //OUTPUT WAVEFORM---END
                        }
                      }
                    }
                    //FOR $_POST["exitSubmit"]---END
                    //FOR $_POST["sizeSubmit"]---START
                    if (!isset($_POST["typeSubmit"]) and !isset($_POST["numSubmit"]) and !isset($_POST["exitSubmit"]) and isset($_POST["sizeSubmit"])) {
                      //Variables for size---START
                      $tower = 0;                 //Tower
                      $rack = 0;                  //Rack
                      $compact = 0;               //Compact
                      $mini = 0;                  //Mini
                      //Variables for size---END
                      $sql = "SELECT * FROM UPS";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          //SIZE---START
                          if ($row["size"] == "Tower") {
                            $tower++;
                          } elseif ($row["size"] == "Rack") {
                            $rack++;
                          } elseif ($row["size"] == "Compact") {
                            $compact++;
                          } elseif ($row["size"] == "Mini") {
                            $mini++;
                          }
                          //SIZE---END
                        }
                      }
                    }
                    //FOR $_POST["sizeSubmit"]---END
                  //FOR ONLY 1 SUBMIT---END
                  //FOR 2 Submits --- START
                    $issetCategory = 0;
                    if (isset($_POST["typeSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["numSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["exitSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["sizeSubmit"])) {
                      $issetCategory++;
                    }
                    //FOR $_POST["typeSubmit"]---START
                    if (isset($_POST["typeSubmit"]) and (isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["typeSubmit"];
                      $sql = "SELECT * FROM UPS WHERE type='$key'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["numSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep == 0) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep == 0) {
                          $isset = 3;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                            //NUMBER OF SOCKETS---END
                          } elseif ($isset == 2) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          } elseif ($isset == 3) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeSubmit"]---END
                    //FOR $_POST["numSubmit"]---START
                    if (isset($_POST["numSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["numSubmit"];
                      if ($key == "2") {
                        $sql = "SELECT * FROM UPS WHERE AC<=2";
                      } elseif ($key == "3") {
                        $sql = "SELECT * FROM UPS WHERE AC>=3 AND AC<=4";
                      } elseif ($key == "5") {
                        $sql = "SELECT * FROM UPS WHERE AC>=5 AND AC<=6";
                      } elseif ($key == "7") {
                        $sql = "SELECT * FROM UPS WHERE AC>=7";
                      }
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep == 0) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep == 0) {
                          $isset = 3;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          } elseif ($isset == 2) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          } elseif ($isset == 3) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["numSubmit"]---END
                    //FOR $_POST["exitSubmit"]---START
                    if (isset($_POST["exitSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["exitSubmit"];
                      $sql = "SELECT * FROM UPS WHERE k_exit='$key'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["numSubmit"]) and $issetStep == 0) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep == 0) {
                          $isset = 3;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          } elseif ($isset == 2) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                            //NUMBER OF SOCKETS---END
                          } elseif ($isset == 3) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["exitSubmit"]---END
                    //FOR $_POST["sizeSubmit"]---START
                    if (isset($_POST["sizeSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"])) and $issetCategory == 2) {
                      $issetCategory++;
                      $key = $_POST["sizeSubmit"];
                      $sql = "SELECT * FROM UPS WHERE size='$key'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep == 0) {
                          $isset = 1;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["numSubmit"]) and $issetStep == 0) {
                          $isset = 2;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep == 0) {
                          $isset = 3;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if ($isset == 1) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          } elseif ($isset == 2) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                            //NUMBER OF SOCKETS---END
                          } elseif ($isset == 3) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["sizeSubmit"]---END
                  //FOR 2 Submits --- END

                  //FOR 3 Submits --- START
                    $issetCategory = 0;
                    if (isset($_POST["typeSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["numSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["exitSubmit"])) {
                      $issetCategory++;
                    }
                    if (isset($_POST["sizeSubmit"])) {
                      $issetCategory++;
                    }

                    //FOR $_POST["typeSubmit"]---START
                    if (isset($_POST["typeSubmit"]) and (isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["numSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["numSubmit"];
                        if ($key == "2") {
                          $keywords = " AC<=2";
                        } elseif ($key == "3") {
                          $keywords = " AC>=3 AND AC<=4";
                        } elseif ($key == "5") {
                          $keywords = " AC>=5 AND AC<=6";
                        } elseif ($key == "7") {
                          $keywords = " AC>=7";
                        }
                      }
                      if (isset($_POST["exitSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["exitSubmit"];
                        $keywords = " k_exit='$key'";
                      }
                      if (isset($_POST["sizeSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["sizeSubmit"];
                        $keywords = " size='$key'";
                      }
                      $key = $_POST["typeSubmit"];
                      $sql = "SELECT * FROM UPS WHERE type='$key' AND$keywords";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["numSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["numSubmit"]) and $issetSec == 2) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                            //NUMBER OF SOCKETS---END
                          }
                          if (isset($_POST["exitSubmit"]) and $issetSec == 2) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          }
                          if (isset($_POST["sizeSubmit"]) and $issetSec == 2) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["typeSubmit"]---END
                    //FOR $_POST["numSubmit"]---START
                    if (isset($_POST["numSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["typeSubmit"]) and $issetKey == 1) {
                        $issetKey++;
                        $key = $_POST["typeSubmit"];
                        $keywords = " type='$key'";
                      }
                      if (isset($_POST["exitSubmit"]) and $issetKey == 1) {
                        $issetKey++;
                        $key = $_POST["exitSubmit"];
                      }
                      if (isset($_POST["sizeSubmit"]) and $issetKey == 1) {
                        $issetKey++;
                        $key = $_POST["sizeSubmit"];
                        $keywords = " size='$key'";
                      }
                      $key = $_POST["numSubmit"];
                      if ($key == "2") {
                        $sql = "SELECT * FROM UPS WHERE AC<=2 AND$keywords";
                      } elseif ($key == "3") {
                        $sql = "SELECT * FROM UPS WHERE AC>=3 AND AC<=4 AND$keywords";
                      } elseif ($key == "5") {
                        $sql = "SELECT * FROM UPS WHERE AC>=5 AND AC<=6 AND$keywords";
                      } elseif ($key == "7") {
                        $sql = "SELECT * FROM UPS WHERE AC>=7 AND$keywords";
                      }
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["typeSubmit"]) and $issetSec == 2) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          }
                          if (isset($_POST["exitSubmit"]) and $issetSec == 2) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          }
                          if (isset($_POST["sizeSubmit"]) and $issetSec == 2) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["numSubmit"]---END
                    //FOR $_POST["exitSubmit"]---START
                    if (isset($_POST["exitSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["sizeSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["typeSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["typeSubmit"];
                        $keywords = " type='$key'";
                      }
                      if (isset($_POST["numSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["numSubmit"];
                        if ($key == "2") {
                          $keywords = " AC<=2";
                        } elseif ($key == "3") {
                          $keywords = " AC>=3 AND AC<=4";
                        } elseif ($key == "5") {
                          $keywords = " AC>=5 AND AC<=6";
                        } elseif ($key == "7") {
                          $keywords = " AC>=7";
                        }
                      }
                      if (isset($_POST["sizeSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["sizeSubmit"];
                        $keywords = " size='$key'";
                      }
                      $key = $_POST["exitSubmit"];
                      $sql = "SELECT * FROM UPS WHERE k_exit='$key' AND$keywords";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["numSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["sizeSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //Variables for size---START
                          $tower = 0;                 //Tower
                          $rack = 0;                  //Rack
                          $compact = 0;               //Compact
                          $mini = 0;                  //Mini
                          //Variables for size---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["typeSubmit"]) and $issetSec == 2) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          }
                          if (isset($_POST["numSubmit"]) and $issetSec == 2) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                            //NUMBER OF SOCKETS---END
                          }
                          if (isset($_POST["sizeSubmit"]) and $issetSec == 2) {
                            //SIZE---START
                            if ($row["size"] == "Tower") {
                              $tower++;
                            } elseif ($row["size"] == "Rack") {
                              $rack++;
                            } elseif ($row["size"] == "Compact") {
                              $compact++;
                            } elseif ($row["size"] == "Mini") {
                              $mini++;
                            }
                            //SIZE---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["exitSubmit"]---END
                    //FOR $_POST["sizeSubmit"]---START
                    if (isset($_POST["sizeSubmit"]) and (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"])) and $issetCategory == 3) {
                      $issetCategory++;
                      $issetKey = 0;
                      if (isset($_POST["typeSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["typeSubmit"];
                        $keywords = " type='$key'";
                      }
                      if (isset($_POST["numSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["numSubmit"];
                        if ($key == "2") {
                          $keywords = " AC<=2";
                        } elseif ($key == "3") {
                          $keywords = " AC>=3 AND AC<=4";
                        } elseif ($key == "5") {
                          $keywords = " AC>=5 AND AC<=6";
                        } elseif ($key == "7") {
                          $keywords = " AC>=7";
                        }
                      }
                      if (isset($_POST["exitSubmit"]) and $issetKey == 0) {
                        $issetKey++;
                        $key = $_POST["exitSubmit"];
                        $keywords = " k_exit='$key'";
                      }
                      $key = $_POST["sizeSubmit"];
                      $sql = "SELECT * FROM UPS WHERE size='$key' AND$keywords";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $issetStep = 0;
                        $issetSec = 0;
                        if (isset($_POST["typeSubmit"]) and $issetStep <= 1) {
                          $isset = 1;
                          $issetSec++;
                          $issetStep++;
                          //Variables for type---START
                          $vi = 0;                    //(VI) Line-Interactive
                          $vf = 0;                    //(VF) On-Line/Double Conversion
                          $vfd = 0;                   //(VFD) Off-Line
                          //Variables for type---END
                        }
                        if (isset($_POST["numSubmit"]) and $issetStep <= 1) {
                          $isset = 2;
                          $issetSec++;
                          $issetStep++;
                          //Variables for number of sockets---START
                          $ac2 = 0;                   //Up to 2 sockets (έως 2 πρίζες)
                          $ac3 = 0;                   //From 3 to 4 sockets (από 3 έως 4 πρίζες)
                          $ac5 = 0;                   //From 5 to 6 sockets (από 5 έως 6 πρίζες)
                          $ac7 = 0;                   //From 7 sockets and up (από 7 πρίζες και πάνω)
                          //Variables for number of sockets---END
                        }
                        if (isset($_POST["exitSubmit"]) and $issetStep <= 1) {
                          $isset = 3;
                          $issetSec++;
                          $issetStep++;
                          //Variables for output waveform---START
                          $clear = 0;                 //Pure sine (Καθαρού ημιτόνου)
                          $trop = 0;                  //Modified sine (Τροποποιημένου ημιτόνου)
                          //Variables for output waveform---END
                        }
                        while($row = $result->fetch_assoc()) {
                          if (isset($_POST["typeSubmit"]) and $issetSec == 2) {
                            //TYPE---START
                            if ($row["type"] == "(VI) Line-Interactive") {
                              $vi++;
                            } elseif ($row["type"] == "(VF) On-Line/Double Conversion") {
                              $vf++;
                            } elseif ($row["type"] == "(VFD) Off-Line") {
                              $vfd++;
                            }
                            //TYPE---END
                          }
                          if (isset($_POST["numSubmit"]) and $issetSec == 2) {
                            //NUMBER OF SOCKETS---START
                            if ($row["AC"] <= 2) {
                              $ac2++;
                            } elseif ($row["AC"] >= 3 and $row["AC"] <= 4) {
                              $ac3++;
                            } elseif ($row["AC"] >= 5 and $row["AC"] <= 6) {
                              $ac5++;
                            } elseif ($row["AC"] >= 7) {
                              $ac7++;
                            }
                          }
                          if (isset($_POST["exitSubmit"]) and $issetSec == 2) {
                            //OUTPUT WAVEFORM---START
                            if ($row["k_exit"] == "Pure sine") {
                              $clear++;
                            } elseif ($row["k_exit"] == "Modified sine") {
                              $trop++;
                            }
                            //OUTPUT WAVEFORM---END
                          }
                        }
                      }
                    }
                    //FOR $_POST["sizeSubmit"]---END
                  //FOR 3 Submits --- END
                //DATA FROM DATABASE TABLE AND COUNT VARIABLES --- END

                //CREATE OPTION BOXES --- START
                  //TYPE --- START
                    if ($vi > 0 or $vf > 0 or $vfd > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Type</b>
                      </p><br>';
                        if ($vi > 0) {
                          echo '<label class="containerRadioButton">(VI) Line-Interactive ('. $vi. ')
                            <input type="radio" name="typeSubmit" id="vi" value="(VI) Line-Interactive" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">(VI) Line-Interactive (0)</font>
                            <input type="radio" name="typeSubmit" id="vi" value="(VI) Line-Interactive" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($vf > 0) {
                          echo '<label class="containerRadioButton">(VF) On-Line/Double Conversion ('. $vf. ')
                            <input type="radio" name="typeSubmit" id="vf" value="(VF) On-Line/Double Conversion" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">(VI) Line-Interactive (0)</font>
                            <input type="radio" name="typeSubmit" id="vi" value="(VI) Line-Interactive" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($vfd > 0) {
                          echo '<label class="containerRadioButton">(VFD) Off-Line ('. $vfd. ')
                            <input type="radio" name="typeSubmit" id="vfd" value="(VFD) Off-Line" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">(VFD) Off-Line (0)</font>
                            <input type="radio" name="typeSubmit" id="vfd" value="(VFD) Off-Line" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                      if ($ac2 > 0 or $ac3 > 0 or $ac5 > 0 or $ac7 > 0 or $clear > 0 or $trop > 0 or $tower > 0 or $rack > 0 or $compact > 0 or $mini > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //TYPE --- END
                  //NUMBER OF SOCKETS --- START
                    if ($ac2 > 0 or $ac3 > 0 or $ac5 > 0 or $ac7 > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Number of sockets</b>
                      </p><br>';
                        if ($ac2 > 0) {
                          echo '<label class="containerRadioButton">Up to 2 sockets ('. $ac2. ')
                            <input type="radio" name="numSubmit" id="sockets2" value="2" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Up to 2 sockets (0)</font>
                            <input type="radio" name="numSubmit" id="sockets2" value="2" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($ac3 > 0) {
                          echo '<label class="containerRadioButton">From 3 to 4 sockets ('. $ac3. ')
                            <input type="radio" name="numSubmit" id="sockets3" value="3" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">From 3 to 4 sockets (0)</font>
                            <input type="radio" name="numSubmit" id="sockets3" value="3" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($ac5 > 0) {
                          echo '<label class="containerRadioButton">From 5 to 6 sockets ('. $ac5. ')
                            <input type="radio" name="numSubmit" id="sockets5" value="5" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">From 5 to 6 sockets (0)</font>
                            <input type="radio" name="numSubmit" id="sockets5" value="5" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($ac7 > 0) {
                          echo '<label class="containerRadioButton">From 7 sockets and up ('. $ac7. ')
                            <input type="radio" name="numSubmit" id="sockets7" value="7" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">From 7 sockets and up (0)</font>
                            <input type="radio" name="numSubmit" id="sockets7" value="7" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                      if ($clear > 0 or $trop > 0 or $tower > 0 or $rack > 0 or $compact > 0 or $mini > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //NUMBER OF SOCKETS --- END
                  //OUTPUT WAVEFORM --- START
                    if ($clear > 0 or $trop > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Output waveform</b>
                      </p><br>';
                        if ($clear > 0) {
                          echo '<label class="containerRadioButton">Pure sine ('. $clear. ')
                            <input type="radio" name="exitSubmit" id="Puresine" value="Pure sine" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Pure sine (0)</font>
                            <input type="radio" name="exitSubmit" id="Puresine" value="Pure sine" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($trop > 0) {
                          echo '<label class="containerRadioButton">Modified sine ('. $trop. ')
                            <input type="radio" name="exitSubmit" id="Modifiedsine" value="Modified sine" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Modified sine (0)</font>
                            <input type="radio" name="exitSubmit" id="Modifiedsine" value="Modified sine" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                      if ($tower > 0 or $rack > 0 or $compact > 0 or $mini > 0) {
                        echo '<br><hr class="hrModalBox"><br>';
                      }
                    }
                  //OUTPUT WAVEFORM --- END
                  //SIZE --- START
                    if ($tower > 0 or $rack > 0 or $compact > 0 or $mini > 0) {
                      echo '<p class="typesOfDisksInCategorySSD">
                        <b>Size</b>
                      </p><br>';
                        if ($tower > 0) {
                          echo '<label class="containerRadioButton">Tower ('. $tower. ')
                            <input type="radio" name="sizeSubmit" id="Tower" value="Tower" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Tower (0)</font>
                            <input type="radio" name="sizeSubmit" id="Tower" value="Tower" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($rack > 0) {
                          echo '<label class="containerRadioButton">Rack ('. $rack. ')
                            <input type="radio" name="sizeSubmit" id="Rack" value="Rack" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Rack (0)</font>
                            <input type="radio" name="sizeSubmit" id="Rack" value="Rack" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($compact > 0) {
                          echo '<label class="containerRadioButton">Compact ('. $compact. ')
                            <input type="radio" name="sizeSubmit" id="Compact" value="Compact" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Compact (0)</font>
                            <input type="radio" name="sizeSubmit" id="Compact" value="Compact" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                        if ($mini > 0) {
                          echo '<label class="containerRadioButton">Mini ('. $mini. ')
                            <input type="radio" name="sizeSubmit" id="Mini" value="Mini" onclick="footerModal();submitForFilters()"> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        } else {
                          echo '<label class="containerRadioButton"><font color="#b3b3b3">Mini (0)</font>
                            <input type="radio" name="sizeSubmit" id="Mini" value="Mini" disabled> <!--checked="checked"-->
                            <span class="checkmarkRadioButton"></span>
                          </label>&nbsp;&nbsp;&nbsp;';
                        }
                    }
                  //SIZE --- END
                //CREATE OPTION BOXES --- END
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
          
                    //TYPE---START
                    if (isset($_POST["typeSubmit"])) {
                      if ($key == "(VI) Line-Interactive") {
                        $key_javascript = "vi";
                      } elseif ($key == "(VF) On-Line/Double Conversion") {
                        $key_javascript = "vf";
                      } elseif ($key == "(VFD) Off-Line") {
                        $key_javascript = "vfd";
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //TYPE---END
          
                    //NUMBER OF SOCKETS---START
                    if (isset($_POST["numSubmit"])) {
                      $key = $_POST["numSubmit"];
                      $key_javascript = "sockets$key";
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //NUMBER OF SOCKETS---END
          
                    //OUTPUT WAVEFORM---START
                    if (isset($_POST["exitSubmit"])) {
                      $key = $_POST["exitSubmit"];
                      $key_javascript = "";
                      $something_explode = explode(' ', $key);
                      foreach($something_explode as $something_explode) {
                        $key_javascript .= $something_explode;
                      }
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //OUTPUT WAVEFORM---END
          
                    //SIZE---START
                    if (isset($_POST["sizeSubmit"])) {
                      $key_javascript = $_POST["sizeSubmit"];
                      echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                    }
                    //SIZE---END
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
              $sql = "SELECT * FROM UPS WHERE Description LIKE '%$search_expression%'";
              $result = $conn->query($sql);
              if ($result->num_rows <= 0) {
                $sql = "SELECT * FROM UPS WHERE Description LIKE '%$search_post%'";
                $result = $conn->query($sql);
                if ($result->num_rows <=0 ) {
                  $sql = "SELECT * FROM UPS WHERE $keywords";
                  $result = $conn->query($sql);
                  if ($result->num_rows <= 0) {
                    $sql = "SELECT * FROM UPS";
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
              $sql = "SELECT * FROM UPS";
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
  
                    echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="UPS">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
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
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Characteristics</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["watt"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Size</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["size"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Output Waveform</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["k_exit"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Half Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["half_load"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Full Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["full_load"]. '</td>
                      </tr>
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Connectivity</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">USB Ports</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["usb"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">AC Sockets</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["AC"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceUPS" name="UPSPiece" value="UPS">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                          echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                        <tr>
                          <th class="KEFALIDAmin">Characteristics</th>
                        </tr>
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Type</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["type"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["watt"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Size</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["size"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Output Waveform</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["k_exit"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Half Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["half_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Full Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["full_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">USB Ports</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["usb"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">AC Sockets</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["AC"]. '</td>
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

        if ($clearStep == 0 and (isset($_POST["typeSubmit"]) or isset($_POST["numSubmit"]) or isset($_POST["exitSubmit"]) or isset($_POST["sizeSubmit"])) and $searcher == 0) {
          $keywords = "";
          $key = "";
          $key_javascript = "";
          $something_explode = "";

          //TYPE---START
          if (isset($_POST["typeSubmit"])) {
            $key = $_POST["typeSubmit"];
            if ($key == "(VI) Line-Interactive") {
              $key_javascript = "vi";
            } elseif ($key == "(VF) On-Line/Double Conversion") {
              $key_javascript = "vf";
            } elseif ($key == "(VFD) Off-Line") {
              $key_javascript = "vfd";
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            $keywords = " type='$key'";
          }
          //TYPE---END

          //NUMBER OF SOCKETS---START
          if (isset($_POST["numSubmit"])) {
            $key = $_POST["numSubmit"];
            $key_javascript = "sockets$key";
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($key == "2") {
              if ($keywords == "") {
                $keywords = " AC<=2";
              } else {
                $keywords .= " AND AC<=2";
              }
            } elseif ($key == "3") {
              if ($keywords == "") {
                $keywords = " AC>=3 AND AC<=4";
              } else {
                $keywords .= " AND AC>=3 AND AC<=4";
              }
            } elseif ($key == "5") {
              if ($keywords == "") {
                $keywords = " AC>=5 AND AC<=6";
              } else {
                $keywords .= " AND AC>=5 AND AC<=6";
              }
            } elseif ($key == "7") {
              if ($keywords == "") {
                $keywords = " AC>=7";
              } else {
                $keywords .= " AND AC>=7";
              }
            }
          }
          //NUMBER OF SOCKETS---END

          //OUTPUT WAVEFORM---START
          if (isset($_POST["exitSubmit"])) {
            $key = $_POST["exitSubmit"];
            $key_javascript = "";
            $something_explode = explode(' ', $key);
            foreach($something_explode as $something_explode) {
              $key_javascript .= $something_explode;
            }
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " k_exit='$key'";
            } else {
              $keywords .= " AND k_exit='$key'";
            }
          }
          //OUTPUT WAVEFORM---END

          //SIZE---START
          if (isset($_POST["sizeSubmit"])) {
            $key = $_POST["sizeSubmit"];
            $key_javascript = $key;
            echo '<script>
              document.getElementById("'. $key_javascript. '").checked = true;
              document.getElementById("buttonsForFilters").style.display = "block"
            </script>';
            if ($keywords == "") {
              $keywords = " size='$key'";
            } else {
              $keywords .= " AND size='$key'";
            }
          }
          //SIZE---END

            $sql = "SELECT * FROM UPS WHERE$keywords";
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

                  echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="UPS">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
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
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Characteristics</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["watt"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Size</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["size"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Output Waveform</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["k_exit"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Half Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["half_load"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Full Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["full_load"]. '</td>
                      </tr>
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Connectivity</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">USB Ports</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["usb"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">AC Sockets</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["AC"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceUPS" name="UPSPiece" value="UPS">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                      echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                        <tr>
                          <th class="KEFALIDAmin">Characteristics</th>
                        </tr>
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Type</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["type"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["watt"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Size</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["size"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Output Waveform</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["k_exit"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Half Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["half_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Full Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["full_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">USB Ports</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["usb"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">AC Sockets</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["AC"]. '</td>
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
        
                  //TYPE---START
                  if (isset($_POST["typeSubmit"])) {
                    if ($key == "(VI) Line-Interactive") {
                      $key_javascript = "vi";
                    } elseif ($key == "(VF) On-Line/Double Conversion") {
                      $key_javascript = "vf";
                    } elseif ($key == "(VFD) Off-Line") {
                      $key_javascript = "vfd";
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //TYPE---END
        
                  //NUMBER OF SOCKETS---START
                  if (isset($_POST["numSubmit"])) {
                    $key = $_POST["numSubmit"];
                    $key_javascript = "sockets$key";
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //NUMBER OF SOCKETS---END
        
                  //OUTPUT WAVEFORM---START
                  if (isset($_POST["exitSubmit"])) {
                    $key = $_POST["exitSubmit"];
                    $key_javascript = "";
                    $something_explode = explode(' ', $key);
                    foreach($something_explode as $something_explode) {
                      $key_javascript .= $something_explode;
                    }
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //OUTPUT WAVEFORM---END
        
                  //SIZE---START
                  if (isset($_POST["sizeSubmit"])) {
                    $key_javascript = $_POST["sizeSubmit"];
                    echo 'document.getElementById("'. $key_javascript. '").checked = false;';
                  }
                  //SIZE---END
                echo '</script>';

            $onoma_for_title = 0;
            $sql = "SELECT * FROM UPS";
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

                  echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="UPS">';
                echo '<div class="productCard">';
                //INFO OF PRODUCTS
                echo '<div class="productCard-info">';
                echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
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
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Characteristics</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["watt"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Size</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["size"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Output Waveform</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["k_exit"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Half Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["half_load"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Full Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["full_load"]. '</td>
                      </tr>
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Connectivity</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">USB Ports</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["usb"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">AC Sockets</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["AC"]. '</td>
                      </tr>
                    </table></font></center>';
                  echo '</div>';
                echo '</div>';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---">';
                //INFO OF PRODUCTS-END
                //PRICE OF PRODUCTS
                echo '<div class="productCardpreview">';
                if ($ekptwshPrice == $PriceMod) {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } elseif ($ekptwshPrice == "0") {
                  echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } else {
                  if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  $brINbutton = 1;
                  } else {
                  $ekptwshPososto = 0;
                  }
                  echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
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
        
                  echo '<input type="hidden" id="pieceUPS" name="UPSPiece" value="UPS">';
                  echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                  echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                  echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                  echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
                  echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---"><br><br>';
                  if ($ekptwshPrice == $PriceMod) {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } elseif ($ekptwshPrice == "0") {
                  echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                  } else {
                  if ($PriceMod > $ekptwshPrice) {
                    $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                  } else {
                    $ekptwshPososto = 0;
                  }
                  echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                  echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                  echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
                  }
                  echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">';
                      echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                        <tr>
                          <th class="KEFALIDAmin">Characteristics</th>
                        </tr>
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Type</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["type"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["watt"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Size</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["size"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Output Waveform</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["k_exit"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Half Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["half_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Full Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["full_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">USB Ports</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["usb"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">AC Sockets</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["AC"]. '</td>
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
          $sql = "SELECT * FROM UPS";
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

                echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="UPS">';
              echo '<div class="productCard">';
              //INFO OF PRODUCTS
              echo '<div class="productCard-info">';
              echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
              echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
              echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
              echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
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
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Characteristics</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Type</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["type"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Power</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["watt"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Size</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["size"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Output Waveform</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["k_exit"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Half Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["half_load"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">Battery life (Full Load)</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["full_load"]. '</td>
                      </tr>
                      <tr class="tableSpecs">
                        <th class="rowsOnSpecs">Connectivity</th>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">USB Ports</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["usb"]. '</td>
                      </tr>
                      <tr class="rowsOnSpecsTR">
                        <td class="rowsOnSpecs">AC Sockets</td>
                        <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="rowsOnSpecs">'. $row["AC"]. '</td>
                      </tr>
                    </table></font></center>';
                echo '</div>';
              echo '</div>';
              echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---">';
              //INFO OF PRODUCTS-END
              //PRICE OF PRODUCTS
              echo '<div class="productCardpreview">';
              if ($ekptwshPrice == $PriceMod) {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
              } elseif ($ekptwshPrice == "0") {
                echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
              } else {
                if ($PriceMod > $ekptwshPrice) {
                $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                $brINbutton = 1;
                } else {
                $ekptwshPososto = 0;
                }
                echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
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
      
                echo '<input type="hidden" id="pieceUPS" name="UPSPiece" value="UPS">';
                echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $row["ProductCode"]. '">';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="---"><br><br>';
                if ($ekptwshPrice == $PriceMod) {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } elseif ($ekptwshPrice == "0") {
                echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["Price"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="">';
                } else {
                if ($PriceMod > $ekptwshPrice) {
                  $ekptwshPososto = 100*(($ekptwshPrice-$PriceMod)/$PriceMod);
                } else {
                  $ekptwshPososto = 0;
                }
                echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $row["PriceEkptwsh"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $row["Price"]. '">';
                }
                echo '<br><center><button type="button" class="collapsibleMin">Specs</button>';
                  echo '<div class="contentMin">';
                    echo '<table class="tableSpecsMin">
                        <!--ONE CATEGORY OF SPECS-->
                        <tr>
                          <th class="KEFALIDAmin">Characteristics</th>
                        </tr>
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Type</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["type"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Power</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["watt"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Size</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["size"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Output Waveform</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["k_exit"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Half Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["half_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">Battery life (Full Load)</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["full_load"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE CATEGORY OF SPECS-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">USB Ports</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["usb"]. '</td>
                          </tr>
                        <!--ONE SPEC-->
                        <!--ONE SPEC-->
                          <tr>
                            <td class="NameOfSpecsMin">AC Sockets</td>
                          </tr>
                          <tr>
                            <td class="FromDatabaseSpecsMin">'. $row["AC"]. '</td>
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