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
	<link rel="shortcut icon" type="image/x-icon" href="../../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
	<TITLE>PC Build App-PC Builder-Ready PC BUILD</TITLE>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../../StyleSheets/AMD/Layout.css">-->
    <link rel="stylesheet" href="../../StyleSheets/AMD/LayoutNot.css">
    <link rel="stylesheet" href="../../StyleSheets/TopNav.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--HOME PAGE STYLESHEETS-->

    <link rel="stylesheet" href="../../StyleSheets/AMD/ProductCardsPCBuilder.css">
    <link rel="stylesheet" href="../../StyleSheets/AMD/ButtonsAll.css">
    <link rel="stylesheet" href="../../StyleSheets/Under800px.css">
    <link rel="stylesheet" href="../../StyleSheets/PCBuilderReady/tables-Specs.css">
    <link rel="stylesheet" href="../../StyleSheets/PCBuilderReady/titleReadyPCBUILD.css">
    <link rel="stylesheet" href="../../StyleSheets/PCBuilderReady/dismissButton.css">
    <link rel="stylesheet" href="../../StyleSheets/PCBuilderReady/FooterForActionButtons.css">

    <style>
        abbr {
          text-decoration: none;
        }
    </style>

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
	  border: 2px solid #b32400;
	  border-radius: 10px;
  }
</style>

<style>

.imgLogoLinkForEShop{
    width: 50%;
    top: 50;
  }

</style>

<style>
  .link-min:hover {
    text-decoration: underline;
  }
  .link-min {
    cursor: pointer;
  }
</style>

    </head>

    <BODY BGCOLOR="#fff" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0" onresize="windowResizeFitActionButtons()" onload="windowResizeFitActionButtons()">

<!--WHEN THE USER IS MOTHER FUCKER-->
<div id="error" style="display:none;">
    <br><br>
  <div style="color:#1a0033fa;">&nbsp;&nbsp;&nbsp;&nbsp;<b><font family="Verdana"><font size="7">You haven't access in this page with this way</font></font></b></div>
  <br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;<font family="Verdana"><font size="5"><font color="#333333">Go to </font><b><a href="../../index" style="text-decoration: none; color: #1a0033fa;">HOME PAGE</a></b><br>
  &nbsp;&nbsp;&nbsp;<font color="#333333">or you can make your </font><b><a href="../../Pages/PCBuilderAMD" style="text-decoration: none; color: #1a0033fa;">AMD PC BUILD</a></b><font color="#333333"> or </font><b><a href="../../Pages/PCBuilderINTEL" style="text-decoration: none; color: #1a0033fa;">INTEL PC BUILD</a></b></font></font>
<br><br><br>
<center><a href="../../index"><img src="../../logo/LogoRight.png" align="middle" alt="logo" class="imgLogoLinkForEShop"></a><!-- width="14%" --></center>
<br><br>
</div>
<!--WHEN THE USER IS MOTHER FUCKER-->

<!--WHEN THE USER IS RIGHT-->
<div id="main">    
<!--NAVBAR-----------------------MENU IN HOMESCREEN-START----------->
<!--TopNav-->
<div id="myTopnav" class="topnav" style="z-index: 9999;">
  <a href="../index"><i class="fa fa-fw fa-home"></i> Home</a>
  <div class="dropdown">
	<button class="dropbtn" class="active"><i class="fas fa-desktop"></i> PC Builder
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <?php
        if ($cpu == "AMD") {
        ?>
          <a href="../Pages/PCBuilderAMD" class="active"><i class="fas fa-desktop"></i> AMD</a>
          <a href="../Pages/PCBuilderINTEL"><i class="fas fa-desktop"></i> INTEL</a>
        <?php
        } else {
        ?>
          <a href="../Pages/PCBuilderAMD"><i class="fas fa-desktop"></i> AMD</a>
          <a href="../Pages/PCBuilderINTEL" class="active"><i class="fas fa-desktop"></i> INTEL</a>
        <?php
        }
      ?>
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
			<a href="sign-in/dashboard.php" class="account"><i class="fas fa-user-circle"></i> <?php echo $_SESSION["username"]; ?></a>
		<?php
	} else {
		//THE USER HASN'T LOGGED IN
		echo '<a href="sign-in/login" class="account"><i class="fas fa-user-circle"></i> Account</a>';
	}
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--TopNav-->
<!--Layout-----------------------START-->

<!--<div class="header">
	<header>
  <img src="../../Pictures/AMD_logo_for_PCBuilderAMD_home.png" class="pictureAMDLogo"/>
  <div class="categoryHeader">
    <center><p><b>Internet, Office, Simple Gaming, Movies</b></p></center>
  </div>
</header>
</div>-->

<div class="content">
<SECTION>
    <article>
      <br>
      <center><div class="borderAroundtitleReadyPCBUILD">
        <div class="titleReadyPCBUILD">Your PC BUILD is ready!</div>
      </div></center><br>

		<?php
			if ($_POST["brandModelCPU"] != "") {
				
				//SELECT DATA->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->

				//FOR READY PC BUILD
				echo '<div style="margin: 25px;">
        <!--TABLE FOR MAX SIZE-->
        <table class="tableOnTopReadyPieces-Maximum">
          <form method="post" id="tableReady" name="tableReady">
            <tr class="trForthOnTopReadyPieces-Maximum">
              <th class="thOnTopReadyPieces-Maximum">Hardware Piece</th>
              <th class="thOnTopReadyPieces-Maximum">Brand & Model</th>
              <th class="thOnTopReadyPieces-Maximum">Product Code</th>
              <th class="thOnTopReadyPieces-Maximum">Category</th>
              <th class="thOnTopReadyPieces-Maximum">Price</th>
            </tr>
            
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Change CPU"><a class="link-for-non-delete-specs" onclick="cpuFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["CPUpiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelCPU"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeCPU"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryCPU"]. '</td>';
              if ($_POST["EkptwshCPU"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceCPU"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshCPU"]. '€</strike></font></sup> '. $_POST["PriceCPU"]. '€</td>';
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Change Motherboard"><a class="link-for-non-delete-specs" onclick="motherFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["MotherPiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelMOTHER"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeMOTHER"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryMOTHER"]. '</td>';
              if ($_POST["EkptwshMOTHER"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceMOTHER"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshMOTHER"]. '€</strike></font></sup> '. $_POST["PriceMOTHER"]. '€</td>';
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Change RAM"><a class="link-for-non-delete-specs" onclick="ramFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["RamPiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelRAM"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeRAM"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryRAM"]. '</td>';
              if ($_POST["EkptwshRAM"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceRAM"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshRAM"]. '€</strike></font></sup> '. $_POST["PriceRAM"]. '€</td>';
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">';
              if ($_POST["ProductCodeGPU"] == "---") {
                echo '<td class="tdOnTopReadyPieces-Maximum"><abbr title="Change GPU"><a class="link-for-non-delete-specs" onclick="gpuFunMAX()"><i class="fas fa-check-circle"></i> Graphics Card</a></abbr></td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["gpuCPU"]. '</td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">---</td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">Built-in processor</td>
                <td class="tdOnTopReadyPieces-Maximum" align="right">---</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum"><abbr title="Change GPU"><a class="link-for-non-delete-specs" onclick="gpuFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["GPUPiece"]. '</a></abbr></td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelGPU"]. '</td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeGPU"]. '</td>
                <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryGPU"]. '</td>';
                if ($_POST["EkptwshGPU"] == "") {
                  echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceGPU"]. '€</td>';
                } elseif ($_POST["EkptwshGPU"] == "---") {
                  echo '<td class="tdOnTopReadyPieces-Maximum" align="right">---</td>';
                } else {
                  echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshGPU"]. '€</strike></font></sup> '. $_POST["PriceGPU"]. '€</td>';
                }
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Chnage PSU"><a class="link-for-non-delete-specs" onclick="psuFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["PSUPiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelPSU"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodePSU"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryPSU"]. '</td>';
              if ($_POST["EkptwshPSU"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PricePSU"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshPSU"]. '€</strike></font></sup> '. $_POST["PricePSU"]. '€</td>';
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Change Hard Drive"><a class="link-for-non-delete-specs" onclick="hardFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["HARDPiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelHARD"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeHARD"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryHARD"]. '</td>';
              if ($_POST["EkptwshHARD"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceHARD"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshHARD"]. '€</strike></font></sup> '. $_POST["PriceHARD"]. '€</td>';
              }
            echo '</tr>
            <tr class="trChangeColorForAll-Maximum">
              <td class="tdOnTopReadyPieces-Maximum"><abbr title="Change PC Case"><a class="link-for-non-delete-specs" onclick="caseFunMAX()"><i class="fas fa-check-circle"></i> '. $_POST["CASEPiece"]. '</a></abbr></td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelCASE"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeCASE"]. '</td>
              <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryCASE"]. '</td>';
              if ($_POST["EkptwshCASE"] == "") {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceCASE"]. '€</td>';
              } else {
                echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshCASE"]. '€</strike></font></sup> '. $_POST["PriceCASE"]. '€</td>';
              }
            echo '</tr>';
            //OTHER PIECES FOR SETUP
              //RAM 2
              $category = $_POST["categoryCPU"];
              $type = $_POST["RamType"];
              $count = intval($_POST["RamPL"]);
              $speed = $_POST["RamSP"];

              $sql = "SELECT * FROM RAM WHERE Category='$category' AND type='$type' AND modules<=$count AND speed LIKE '%$speed%'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["RAM2Piece"])) {
                  if ($_POST["RAM2Piece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["RAM2Piece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="ram2FunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissRAM2()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelRAM2"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeRAM2"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryRAM2"]. '</td>';
                      if ($_POST["EkptwshRAM2"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceRAM2"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshRAM2"]. '€</strike></font></sup> '. $_POST["PriceRAM2"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Second Ram"><a class="links-for-add-in-specs" onclick="ram2FunMAX()"><i class="fas fa-plus-circle"></i> More Ram</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Second Ram"><a class="links-for-add-in-specs" onclick="ram2FunMAX()"><i class="fas fa-plus-circle"></i> More Ram</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //RAM 2
              //SECOND HARD DRIVE
              $sql = "SELECT * FROM SSD_HDD";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["HARD2Piece"])) {
                  if ($_POST["HARD2Piece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["HARD2Piece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="hard2FunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissHARD2()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelHARD2"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeHARD2"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryHARD2"]. '</td>';
                      if ($_POST["EkptwshHARD2"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceHARD2"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshHARD2"]. '€</strike></font></sup> '. $_POST["PriceHARD2"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Second Hard Drive"><a class="links-for-add-in-specs" onclick="hard2FunMAX()"><i class="fas fa-plus-circle"></i> Second Hard Drive</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Second Hard Drive"><a class="links-for-add-in-specs" onclick="hard2FunMAX()"><i class="fas fa-plus-circle"></i> Second Hard Drive</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //SECOND HARD DRIVE
              //SOFTWARE
              $sql = "SELECT * FROM SOFTWARE WHERE Category='OPERATING SYSTEM'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["SOFTPiece"])) {
                  if ($_POST["SOFTPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["SOFTPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="softFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissSOFT()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelSOFT"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeSOFT"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categorySOFT"]. '</td>';
                      if ($_POST["EkptwshSOFT"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceSOFT"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshSOFT"]. '€</strike></font></sup> '. $_POST["PriceSOFT"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Software"><a class="links-for-add-in-specs" onclick="softFunMAX()"><i class="fas fa-plus-circle"></i> Software</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Software"><a class="links-for-add-in-specs" onclick="softFunMAX()"><i class="fas fa-plus-circle"></i> Software</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //SOFTWARE
              //COOLER FOR CPU
              $socket = $_POST["SocketCPU"];
              $sql = "SELECT * FROM CPU_COOLER WHERE socket LIKE '%$socket%'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["COOLERPiece"])) {
                  if ($_POST["COOLERPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["COOLERPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="coolerFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissCOOLER()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelCOOLER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeCOOLER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryCOOLER"]. '</td>';
                      if ($_POST["EkptwshCOOLER"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceCOOLER"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshCOOLER"]. '€</strike></font></sup> '. $_POST["PriceCOOLER"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Cooler for CPU"><a class="links-for-add-in-specs" onclick="coolerFunMAX()"><i class="fas fa-plus-circle"></i> Cooler For CPU</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Cooler for CPU"><a class="links-for-add-in-specs" onclick="coolerFunMAX()"><i class="fas fa-plus-circle"></i> Cooler For CPU</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //COOLER FOR CPU
              //FANS FOR CASE
              $sql = "SELECT * FROM Fans_PCCase";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["FANPiece"])) {
                  if ($_POST["FANPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["FANPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="fanFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissFAN()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelFAN"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeFAN"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryFAN"]. '</td>';
                      if ($_POST["EkptwshFAN"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceFAN"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshFAN"]. '€</strike></font></sup> '. $_POST["PriceFAN"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Fans for Case"><a class="links-for-add-in-specs" onclick="fanFunMAX()"><i class="fas fa-plus-circle"></i> Fans for case</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Fans for Case"><a class="links-for-add-in-specs" onclick="fanFunMAX()"><i class="fas fa-plus-circle"></i> Fans for case</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //FANS FOR CASE
              //MONITOR
              $sql = "SELECT * FROM Monitor";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["MONITORPiece"])) {
                  if ($_POST["MONITORPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["MONITORPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="monitorFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissMONITOR()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelMONITOR"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeMONITOR"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryMONITOR"]. '</td>';
                      if ($_POST["EkptwshMONITOR"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceMONITOR"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshMONITOR"]. '€</strike></font></sup> '. $_POST["PriceMONITOR"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Monitor"><a class="links-for-add-in-specs" onclick="monitorFunMAX()"><i class="fas fa-plus-circle"></i> Monitor</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Monitor"><a class="links-for-add-in-specs" onclick="monitorFunMAX()"><i class="fas fa-plus-circle"></i> Monitor</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //MONITOR
              //KEYBOARD
              $sql = "SELECT * FROM Keyboard_Mouse WHERE Category LIKE '%Keyboard%'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["KEYBPiece"])) {
                  if ($_POST["KEYBPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["KEYBPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="keybFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissKEYB()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelKEYB"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeKEYB"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryKEYB"]. '</td>';
                      if ($_POST["EkptwshKEYB"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceKEYB"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshKEYB"]. '€</strike></font></sup> '. $_POST["PriceKEYB"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Keyboard"><a class="links-for-add-in-specs" onclick="keybFunMAX()"><i class="fas fa-plus-circle"></i> Keyboard</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Keyboard"><a class="links-for-add-in-specs" onclick="keybFunMAX()"><i class="fas fa-plus-circle"></i> Keyboard</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //KEYBOARD
              //MOUSE
              $sql = "SELECT * FROM Keyboard_Mouse WHERE Category='Mouse'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["MOUSEPiece"])) {
                  if ($_POST["MOUSEPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["MOUSEPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="mouseFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissMOUSE()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelMOUSE"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeMOUSE"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryMOUSE"]. '</td>';
                      if ($_POST["EkptwshMOUSE"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceMOUSE"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshMOUSE"]. '€</strike></font></sup> '. $_POST["PriceMOUSE"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Mouse"><a class="links-for-add-in-specs" onclick="mouseFunMAX()"><i class="fas fa-plus-circle"></i> Mouse</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Mouse"><a class="links-for-add-in-specs" onclick="mouseFunMAX()"><i class="fas fa-plus-circle"></i> Mouse</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //MOUSE
              //CHAIR
              $sql = "SELECT * FROM Chair";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["CHAIRPiece"])) {
                  if ($_POST["CHAIRPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["CHAIRPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="chairFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissCHAIR()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelCHAIR"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeCHAIR"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryCHAIR"]. '</td>';
                      if ($_POST["EkptwshCHAIR"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceCHAIR"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshCHAIR"]. '€</strike></font></sup> '. $_POST["PriceCHAIR"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Chair"><a class="links-for-add-in-specs" onclick="chairFunMAX()"><i class="fas fa-plus-circle"></i> Chair</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Chair"><a class="links-for-add-in-specs" onclick="chairFunMAX()"><i class="fas fa-plus-circle"></i> Chair</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //CHAIR
              //SPEAKERS
              $sql = "SELECT * FROM Speakers_PC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["SPEAKERPiece"])) {
                  if ($_POST["SPEAKERPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["SPEAKERPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="speakerFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissSPEAKER()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelSPEAKER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeSPEAKER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categorySPEAKER"]. '</td>';
                      if ($_POST["EkptwshSPEAKER"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceSPEAKER"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshSPEAKER"]. '€</strike></font></sup> '. $_POST["PriceSPEAKER"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Speakers"><a class="links-for-add-in-specs" onclick="speakerFunMAX()"><i class="fas fa-plus-circle"></i> Speakers</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Speakers"><a class="links-for-add-in-specs" onclick="speakerFunMAX()"><i class="fas fa-plus-circle"></i> Speakers</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //SPEAKERS
              //MICROPHONE
              $sql = "SELECT * FROM Microphone_PC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["MICROPiece"])) {
                  if ($_POST["MICROPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["MICROPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="microFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissMICRO()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelMICRO"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeMICRO"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryMICRO"]. '</td>';
                      if ($_POST["EkptwshMICRO"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceMICRO"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshMICRO"]. '€</strike></font></sup> '. $_POST["PriceMICRO"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Microphone"><a class="links-for-add-in-specs" onclick="microFunMAX()"><i class="fas fa-plus-circle"></i> Microphone</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Microphone"><a class="links-for-add-in-specs" onclick="microFunMAX()"><i class="fas fa-plus-circle"></i> Microphone</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //MICROPHONE
              //HEADERS---AKOUSTIKA
              $sql = "SELECT * FROM Gaming_Headset";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["HEADERPiece"])) {
                  if ($_POST["HEADERPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["HEADERPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="headerFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissHEADER()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelHEADER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeHEADER"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryHEADER"]. '</td>';
                      if ($_POST["EkptwshHEADER"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceHEADER"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshHEADER"]. '€</strike></font></sup> '. $_POST["PriceHEADER"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Headset"><a class="links-for-add-in-specs" onclick="headerFunMAX()"><i class="fas fa-plus-circle"></i> Headset</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Headset"><a class="links-for-add-in-specs" onclick="headerFunMAX()"><i class="fas fa-plus-circle"></i> Headset</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //HEADERS---AKOUSTIKA
              //UPS
              $sql = "SELECT * FROM UPS";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["UPSPiece"])) {
                  if ($_POST["UPSPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["UPSPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="upsFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissUPS()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelUPS"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeUPS"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryUPS"]. '</td>';
                      if ($_POST["EkptwshUPS"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceUPS"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshUPS"]. '€</strike></font></sup> '. $_POST["PriceUPS"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add UPS"><a class="links-for-add-in-specs" onclick="upsFunMAX()"><i class="fas fa-plus-circle"></i> UPS</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add UPS"><a class="links-for-add-in-specs" onclick="upsFunMAX()"><i class="fas fa-plus-circle"></i> UPS</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //UPS
              //LED FOR PC
              $sql = "SELECT * FROM Led_PC WHERE Category='LED Strip'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["LEDPCPiece"])) {
                  if ($_POST["LEDPCPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["LEDPCPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="ledpcFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissLEDPC()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelLEDPC"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeLEDPC"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryLEDPC"]. '</td>';
                      if ($_POST["EkptwshLEDPC"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceLEDPC"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshLEDPC"]. '€</strike></font></sup> '. $_POST["PriceLEDPC"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add LED for PC Case"><a class="links-for-add-in-specs" onclick="ledpcFunMAX()"><i class="fas fa-plus-circle"></i> LED for Case</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add LED for PC Case"><a class="links-for-add-in-specs" onclick="ledpcFunMAX()"><i class="fas fa-plus-circle"></i> LED for Case</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //LED FOR PC
              //LED FOR DESK
              $sql = "SELECT * FROM Led_Desk";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["LEDDESKPiece"])) {
                  if ($_POST["LEDDESKPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["LEDDESKPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="ledDeskFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissLEDDESK()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelLEDDESK"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeLEDDESK"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryLEDDESK"]. '</td>';
                      if ($_POST["EkptwshLEDDESK"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceLEDDESK"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshLEDDESK"]. '€</strike></font></sup> '. $_POST["PriceLEDDESK"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add LED for Desk"><a class="links-for-add-in-specs" onclick="ledDeskFunMAX()"><i class="fas fa-plus-circle"></i> LED for Desk</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add LED for Desk"><a class="links-for-add-in-specs" onclick="ledDeskFunMAX()"><i class="fas fa-plus-circle"></i> LED for Desk</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //LED FOR DESK
              //OPTICAL DRIVE
              $sql = "SELECT * FROM Optical_drives";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["OPTICALPiece"])) {
                  if ($_POST["OPTICALPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["OPTICALPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="opticalFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissOPTICAL()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelOPTICAL"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeOPTICAL"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryOPTICAL"]. '</td>';
                      if ($_POST["EkptwshOPTICAL"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceOPTICAL"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshOPTICAL"]. '€</strike></font></sup> '. $_POST["PriceOPTICAL"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Optical Drive"><a class="links-for-add-in-specs" onclick="opticalFunMAX()"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Optical Drive"><a class="links-for-add-in-specs" onclick="opticalFunMAX()"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //OPTICAL DRIVE
              //SOUND CARD
              $sql = "SELECT * FROM Sound_Cards WHERE in_device='Yes'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["SOUNDPiece"])) {
                  if ($_POST["SOUNDPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["SOUNDPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="soundFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissSOUND()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelSOUND"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeSOUND"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categorySOUND"]. '</td>';
                      if ($_POST["EkptwshSOUND"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceSOUND"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshSOUND"]. '€</strike></font></sup> '. $_POST["PriceSOUND"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Sound Card"><a class="links-for-add-in-specs" onclick="soundFunMAX()"><i class="fas fa-plus-circle"></i> Sound Card</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Sound Card"><a class="links-for-add-in-specs" onclick="soundFunMAX()"><i class="fas fa-plus-circle"></i> Sound Card</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //SOUND CARD
              //PRINTER
              $sql = "SELECT * FROM Printers";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["PRINTPiece"])) {
                  if ($_POST["PRINTPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["PRINTPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="printFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissPRINT()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelPRINT"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodePRINT"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryPRINT"]. '</td>';
                      if ($_POST["EkptwshPRINT"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PricePRINT"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshPRINT"]. '€</strike></font></sup> '. $_POST["PricePRINT"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Printer"><a class="links-for-add-in-specs" onclick="printFunMAX()"><i class="fas fa-plus-circle"></i> Printer</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Printer"><a class="links-for-add-in-specs" onclick="printFunMAX()"><i class="fas fa-plus-circle"></i> Printer</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //PRINTER
              //SCANNER
              $sql = "SELECT * FROM Scanners";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["SCANPiece"])) {
                  if ($_POST["SCANPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["SCANPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="scanFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissSCAN()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelSCAN"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeSCAN"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categorySCAN"]. '</td>';
                      if ($_POST["EkptwshSCAN"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceSCAN"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshSCAN"]. '€</strike></font></sup> '. $_POST["PriceSCAN"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Scanner"><a class="links-for-add-in-specs" onclick="scanFunMAX()"><i class="fas fa-plus-circle"></i> Scanner</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Scanner"><a class="links-for-add-in-specs" onclick="scanFunMAX()"><i class="fas fa-plus-circle"></i> Scanner</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //SCANNER
              //BLUETOOTH ADAPTERS
              $sql = "SELECT * FROM Bluetooth_Adapters";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                if (isset($_POST["BLUEPiece"])) {
                  if ($_POST["BLUEPiece"] != "") {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><abbr class="links-for-specs"><i class="fas fa-check-circle"></i> '. $_POST["BLUEPiece"]. '
                        <span class="tooltiptext"><a class="link-action" onclick="blueFunMAX()"><i class="fas fa-sync-alt"></i>Change</a><a class="slash">/</a>-<a class="slash">/</a><a class="link-action" onclick="dismissBLUE()"><i class="fas fa-times-circle"></i>Dismiss</a>
                      </abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["brandModelBLUE"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["ProductCodeBLUE"]. '</td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD">'. $_POST["categoryBLUE"]. '</td>';
                      if ($_POST["EkptwshBLUE"] == "") {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right">'. $_POST["PriceBLUE"]. '€</td>';
                      } else {
                        echo '<td class="tdOnTopReadyPieces-Maximum" align="right"><sup><font color="#808080"><strike>'. $_POST["EkptwshBLUE"]. '€</strike></font></sup> '. $_POST["PriceBLUE"]. '€</td>';
                      }
                    echo '</tr>';
                  } else {
                    echo '<tr class="trChangeColorForAll-Maximum">
                      <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Bluetooth Adapter"><a class="links-for-add-in-specs" onclick="blueFunMAX()"><i class="fas fa-plus-circle"></i> Bluetooth Adapter</font></a></abbr></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                      <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    </tr>';
                  }
                } else {
                  echo '<tr class="trChangeColorForAll-Maximum">
                    <td class="tdOnTopReadyPieces-Maximum"><font color="#0066ff"><abbr title="Add Bluetooth Adapter"><a class="links-for-add-in-specs" onclick="blueFunMAX()"><i class="fas fa-plus-circle"></i> Bluetooth Adapter</font></a></abbr></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                    <td class="tdOnTopReadyPieces-Maximum leftAlignTD"></td>
                  </tr>';
                }
              }
              //BLUETOOTH ADAPTERS
            //OTHER PIECES FOR SETUP
        echo '</table>
        <!--TABLE FOR MAX SIZE-->';
        echo '<!--TABLE FOR MIN SIZE-->';
          //----CPU----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="cpuFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["CPUpiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelCPU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeCPU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryCPU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshCPU"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceCPU"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshCPU"]. '€</strike></font></sup> '. $_POST["PriceCPU"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----CPU----//
          //----MOTHERBOARD----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="motherFunMAX()"><font color="white"><i class="fas fa-check-circle"></i>'. $_POST["MotherPiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelMOTHER"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeMOTHER"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryMOTHER"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshMOTHER"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceMOTHER"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshMOTHER"]. '€</strike></font></sup> '. $_POST["PriceMOTHER"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----MOTHERBOARD----//
          //----RAM----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ramFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["RamPiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelRAM"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeRAM"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryRAM"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshRAM"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceRAM"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshRAM"]. '€</strike></font></sup> '. $_POST["PriceRAM"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----RAM----//
          //----GPU----//
          if ($_POST["ProductCodeGPU"] == "---") {
            echo '<table class="tableOnTopReadyPieces-Minimum">
              <tr>
                <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="gpuFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> Graphics Card</font></a></th>
              </tr>
              <tr class="trChangeColorForAll-Minimum">
                <td class=""><div class="titleForBrandAll">---</div><div class="otherSpecsForAll">Built-In Processor</div></td>
              </tr>
              <tr class="trChangeColorForAll-Minimum">
                <td class=""><div class="titleForBrandAll">Model</div><div class="otherSpecsForAll">'. $_POST["gpuCPU"]. '</div></td>
              </tr>
            </table><div class="br-after-min-cards"><br></div>';
          } else {
            echo '<table class="tableOnTopReadyPieces-Minimum">
              <tr>
                <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="gpuFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["GPUPiece"]. '</font></a></th>
              </tr>
              <tr class="trChangeColorForAll-Minimum">
                <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelGPU"]. '</div></td>
              </tr>
              <tr class="trChangeColorForAll-Minimum">
                <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeGPU"]. '</div></td>
              </tr>
              <tr class="trChangeColorForAll-Minimum">
                <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryGPU"]. '</div></td>
              </tr>
              <tr class="trChangeColorForAll-Minimum">';
                if ($_POST["EkptwshGPU"] == "") {
                  echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceGPU"]. '€</div></td>';
                } elseif ($_POST["EkptwshGPU"] == "---") {
                  echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">---</div></td>';
                } else {
                  echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshGPU"]. '€</strike></font></sup> '. $_POST["PriceGPU"]. '€</div></td>';
                }
              echo '</tr>
            </table><div class="br-after-min-cards"><br></div>';
          }
          //----GPU----//
          //----PSU----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="psuFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["PSUPiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelPSU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodePSU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryPSU"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshPSU"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PricePSU"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshPSU"]. '€</strike></font></sup> '. $_POST["PricePSU"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----PSU----//
          //----HARD DRIVE----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="hardFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["HARDPiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelHARD"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeHARD"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryHARD"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshHARD"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceHARD"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshHARD"]. '€</strike></font></sup> '. $_POST["PriceHARD"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----HARD DRIVE----//
          //----CASE ----//
          echo '<table class="tableOnTopReadyPieces-Minimum">
            <tr>
              <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="caseFunMAX()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["CASEPiece"]. '</font></a></th>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelCASE"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeCASE"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">
              <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryCASE"]. '</div></td>
            </tr>
            <tr class="trChangeColorForAll-Minimum">';
              if ($_POST["EkptwshCASE"] == "") {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceCASE"]. '€</div></td>';
              } else {
                echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshCASE"]. '€</strike></font></sup> '. $_POST["PriceCASE"]. '€</div></td>';
              }
            echo '</tr>
          </table><div class="br-after-min-cards"><br></div>';
          //----CASE ----//
          //----MORE RAM----//
          $category = $_POST["categoryCPU"];
          $type = $_POST["RamType"];
          $count = intval($_POST["RamPL"]);
          $speed = $_POST["RamSP"];

          $sql = "SELECT * FROM RAM WHERE Category='$category' AND type='$type' AND modules<=$count AND speed LIKE '%$speed%'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["RAM2Piece"])) {
              if ($_POST["RAM2Piece"] != "") {
                echo '<input type="hidden" id="RAM2Piece" name="RAM2Piece" value="'. $_POST["RAM2Piece"]. '">';
                echo '<input type="hidden" id="brandModelRAM2" name="brandModelRAM2" value="'. $_POST["brandModelRAM2"]. '">';
                echo '<input type="hidden" id="ProductCodeRAM2" name="ProductCodeRAM2" value="'. $_POST["ProductCodeRAM2"]. '">';
                echo '<input type="hidden" id="categoryRAM2" name="categoryRAM2" value="'. $_POST["categoryRAM2"]. '">';
                echo '<input type="hidden" id="PriceRAM2" name="PriceRAM2" value="'. $_POST["PriceRAM2"]. '">';
                echo '<input type="hidden" id="EkptwshRAM2" name="EkptwshRAM2" value="'. $_POST["EkptwshRAM2"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funRam2()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["RAM2Piece"]. '</a>
                      <div id="ram2" style="display:none;">
                        <a onclick="ram2FunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissRAM2()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelRAM2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeRAM2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryRAM2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshRAM2"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceRAM2"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshRAM2"]. '€</strike></font></sup> '. $_POST["PriceRAM2"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ram2FunMin()"><font color="white"><i class="fas fa-plus-circle"></i> More Ram</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ram2FunMin()"><font color="white"><i class="fas fa-plus-circle"></i> More Ram</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----MORE RAM----//
          //-----SECOND HARD DRIVE----//
          $sql = "SELECT * FROM SSD_HDD";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["HARD2Piece"])) {
              if ($_POST["HARD2Piece"] != "") {
                echo '<input type="hidden" id="HARD2Piece" name="HARD2Piece" value="'. $_POST["HARD2Piece"]. '">';
                echo '<input type="hidden" id="brandModelHARD2" name="brandModelHARD2" value="'. $_POST["brandModelHARD2"]. '">';
                echo '<input type="hidden" id="ProductCodeHARD2" name="ProductCodeHARD2" value="'. $_POST["ProductCodeHARD2"]. '">';
                echo '<input type="hidden" id="categoryHARD2" name="categoryHARD2" value="'. $_POST["categoryHARD2"]. '">';
                echo '<input type="hidden" id="PriceHARD2" name="PriceHARD2" value="'. $_POST["PriceHARD2"]. '">';
                echo '<input type="hidden" id="EkptwshHARD2" name="EkptwshHARD2" value="'. $_POST["EkptwshHARD2"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funHard2()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["HARD2Piece"]. '</a>
                      <div id="hard2" style="display:none;">
                        <a onclick="hard2FunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissHARD2()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelHARD2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeHARD2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryHARD2"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshHARD2"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceHARD2"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshHARD2"]. '€</strike></font></sup> '. $_POST["PriceHARD2"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="hard2FunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Second Hard Drive</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="hard2FunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Second Hard Drive</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----SECOND HARD DRIVE----//
          //----SOFTWARE----//
          $sql = "SELECT * FROM SOFTWARE WHERE Category='OPERATING SYSTEM'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["SOFTPiece"])) {
              if ($_POST["SOFTPiece"] != "") {
                echo '<input type="hidden" id="SOFTPiece" name="SOFTPiece" value="'. $_POST["SOFTPiece"]. '">';
                echo '<input type="hidden" id="brandModelSOFT" name="brandModelSOFT" value="'. $_POST["brandModelSOFT"]. '">';
                echo '<input type="hidden" id="ProductCodeSOFT" name="ProductCodeSOFT" value="'. $_POST["ProductCodeSOFT"]. '">';
                echo '<input type="hidden" id="categorySOFT" name="categorySOFT" value="'. $_POST["categorySOFT"]. '">';
                echo '<input type="hidden" id="PriceSOFT" name="PriceSOFT" value="'. $_POST["PriceSOFT"]. '">';
                echo '<input type="hidden" id="EkptwshSOFT" name="EkptwshSOFT" value="'. $_POST["EkptwshSOFT"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funSoft()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["SOFTPiece"]. '</a>
                      <div id="soft" style="display:none;">
                        <a onclick="softFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissSOFT()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelSOFT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeSOFT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categorySOFT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshSOFT"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceSOFT"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshSOFT"]. '€</strike></font></sup> '. $_POST["PriceSOFT"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="softFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Software</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="softFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Software</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----SOFTWARE----//
          //----COOLER FOR CPU----//
          $socket = $_POST["SocketCPU"];
          $sql = "SELECT * FROM CPU_COOLER WHERE socket='$socket'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["COOLERPiece"])) {
              if ($_POST["COOLERPiece"] != "") {
                echo '<input type="hidden" id="COOLERPiece" name="COOLERPiece" value="'. $_POST["COOLERPiece"]. '">';
                echo '<input type="hidden" id="brandModelCOOLER" name="brandModelCOOLER" value="'. $_POST["brandModelCOOLER"]. '">';
                echo '<input type="hidden" id="ProductCodeCOOLER" name="ProductCodeCOOLER" value="'. $_POST["ProductCodeCOOLER"]. '">';
                echo '<input type="hidden" id="categoryCOOLER" name="categoryCOOLER" value="'. $_POST["categoryCOOLER"]. '">';
                echo '<input type="hidden" id="PriceCOOLER" name="PriceCOOLER" value="'. $_POST["PriceCOOLER"]. '">';
                echo '<input type="hidden" id="EkptwshCOOLER" name="EkptwshCOOLER" value="'. $_POST["EkptwshCOOLER"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funCooler()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["COOLERPiece"]. '</a>
                      <div id="cooler" style="display:none;">
                        <a onclick="coolerFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissCOOLER()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelCOOLER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeCOOLER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryCOOLER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshCOOLER"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceCOOLER"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshCOOLER"]. '€</strike></font></sup> '. $_POST["PriceCOOLER"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="coolerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Cooler for CPU</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="coolerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Cooler for CPU</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----COOLER FOR CPU----//
          //----FANS FOR CASE----//
          $sql = "SELECT * FROM Fans_PCCase";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["FANPiece"])) {
              if ($_POST["FANPiece"] != "") {
                echo '<input type="hidden" id="FANPiece" name="FANPiece" value="'. $_POST["FANPiece"]. '">';
                echo '<input type="hidden" id="brandModelFAN" name="brandModelFAN" value="'. $_POST["brandModelFAN"]. '">';
                echo '<input type="hidden" id="ProductCodeFAN" name="ProductCodeFAN" value="'. $_POST["ProductCodeFAN"]. '">';
                echo '<input type="hidden" id="categoryFAN" name="categoryFAN" value="'. $_POST["categoryFAN"]. '">';
                echo '<input type="hidden" id="PriceFAN" name="PriceFAN" value="'. $_POST["PriceFAN"]. '">';
                echo '<input type="hidden" id="EkptwshFAN" name="EkptwshFAN" value="'. $_POST["EkptwshFAN"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funFun()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["FANPiece"]. '</a>
                      <div id="fun" style="display:none;">
                        <a onclick="fanFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissFAN()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelFAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeFAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryFAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshFAN"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceFAN"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshFAN"]. '€</strike></font></sup> '. $_POST["PriceFAN"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="fanFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Fans for Case</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="fanFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Fans for Case</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----FANS FOR CASE----//
          //----MONITOR----//
          $sql = "SELECT * FROM Monitor";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["MONITORPiece"])) {
              if ($_POST["MONITORPiece"] != "") {
                echo '<input type="hidden" id="MONITORPiece" name="MONITORPiece" value="'. $_POST["MONITORPiece"]. '">';
                echo '<input type="hidden" id="brandModelMONITOR" name="brandModelMONITOR" value="'. $_POST["brandModelMONITOR"]. '">';
                echo '<input type="hidden" id="ProductCodeMONITOR" name="ProductCodeMONITOR" value="'. $_POST["ProductCodeMONITOR"]. '">';
                echo '<input type="hidden" id="categoryMONITOR" name="categoryMONITOR" value="'. $_POST["categoryMONITOR"]. '">';
                echo '<input type="hidden" id="PriceMONITOR" name="PriceMONITOR" value="'. $_POST["PriceMONITOR"]. '">';
                echo '<input type="hidden" id="EkptwshMONITOR" name="EkptwshMONITOR" value="'. $_POST["EkptwshMONITOR"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funMonitor()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["MONITORPiece"]. '</a>
                      <div id="monitor" style="display:none;">
                        <a onclick="monitorFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissMONITOR()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelMONITOR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeMONITOR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryMONITOR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshMONITOR"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceMONITOR"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshMONITOR"]. '€</strike></font></sup> '. $_POST["PriceMONITOR"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="monitorFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Monitor</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="monitorFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Monitor</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----MONITOR----//
          //----KEYBOARD----//
          $sql = "SELECT * FROM Keyboard_Mouse WHERE Category LIKE '%Keyboard%'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["KEYBPiece"])) {
              if ($_POST["KEYBPiece"] != "") {
                echo '<input type="hidden" id="KEYBPiece" name="KEYBPiece" value="'. $_POST["KEYBPiece"]. '">';
                echo '<input type="hidden" id="brandModelKEYB" name="brandModelKEYB" value="'. $_POST["brandModelKEYB"]. '">';
                echo '<input type="hidden" id="ProductCodeKEYB" name="ProductCodeKEYB" value="'. $_POST["ProductCodeKEYB"]. '">';
                echo '<input type="hidden" id="categoryKEYB" name="categoryKEYB" value="'. $_POST["categoryKEYB"]. '">';
                echo '<input type="hidden" id="PriceKEYB" name="PriceKEYB" value="'. $_POST["PriceKEYB"]. '">';
                echo '<input type="hidden" id="EkptwshKEYB" name="EkptwshKEYB" value="'. $_POST["EkptwshKEYB"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funKeyb()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["KEYBPiece"]. '
                      <div id="keyb" style="display:none;">
                        <a onclick="keybFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissKEYB()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></a></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelKEYB"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeKEYB"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryKEYB"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshKEYB"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceKEYB"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshKEYB"]. '€</strike></font></sup> '. $_POST["PriceKEYB"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="keybFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Keyboard</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="keybFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Keyboard</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----KEYBOARD----//
          //----MOUSE----//
          $sql = "SELECT * FROM Keyboard_Mouse WHERE Category='Mouse'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["MOUSEPiece"])) {
              if ($_POST["MOUSEPiece"] != "") {
                echo '<input type="hidden" id="MOUSEPiece" name="MOUSEPiece" value="'. $_POST["MOUSEPiece"]. '">';
                echo '<input type="hidden" id="brandModelMOUSE" name="brandModelMOUSE" value="'. $_POST["brandModelMOUSE"]. '">';
                echo '<input type="hidden" id="ProductCodeMOUSE" name="ProductCodeMOUSE" value="'. $_POST["ProductCodeMOUSE"]. '">';
                echo '<input type="hidden" id="categoryMOUSE" name="categoryMOUSE" value="'. $_POST["categoryMOUSE"]. '">';
                echo '<input type="hidden" id="PriceMOUSE" name="PriceMOUSE" value="'. $_POST["PriceMOUSE"]. '">';
                echo '<input type="hidden" id="EkptwshMOUSE" name="EkptwshMOUSE" value="'. $_POST["EkptwshMOUSE"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funMouse"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["MOUSEPiece"]. '</a>
                      <div id="mouse" style="display:none;">
                        <a onclick="mouseFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissMOUSE()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelMOUSE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeMOUSE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryMOUSE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshMOUSE"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceMOUSE"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshMOUSE"]. '€</strike></font></sup> '. $_POST["PriceMOUSE"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="mouseFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Mouse</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="mouseFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Mouse</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----MOUSE----//
          //----CHAIR----//
          $sql = "SELECT * FROM Chair";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["CHAIRPiece"])) {
              if ($_POST["CHAIRPiece"] != "") {
                echo '<input type="hidden" id="CHAIRPiece" name="CHAIRPiece" value="'. $_POST["CHAIRPiece"]. '">';
                echo '<input type="hidden" id="brandModelCHAIR" name="brandModelCHAIR" value="'. $_POST["brandModelCHAIR"]. '">';
                echo '<input type="hidden" id="ProductCodeCHAIR" name="ProductCodeCHAIR" value="'. $_POST["ProductCodeCHAIR"]. '">';
                echo '<input type="hidden" id="categoryCHAIR" name="categoryCHAIR" value="'. $_POST["categoryCHAIR"]. '">';
                echo '<input type="hidden" id="PriceCHAIR" name="PriceCHAIR" value="'. $_POST["PriceCHAIR"]. '">';
                echo '<input type="hidden" id="EkptwshCHAIR" name="EkptwshCHAIR" value="'. $_POST["EkptwshCHAIR"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funChair()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["CHAIRPiece"]. '</a>
                      <div id="chair" style="display:none;">
                        <a onclick="chairFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissCHAIR()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelCHAIR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeCHAIR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryCHAIR"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshCHAIR"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceCHAIR"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshCHAIR"]. '€</strike></font></sup> '. $_POST["PriceCHAIR"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="chairFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Chair</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="chairFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Chair</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----CHAIR----//
          //----SPEAKER----//
          $sql = "SELECT * FROM Speakers_PC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["SPEAKERPiece"])) {
              if ($_POST["SPEAKERPiece"] != "") {
                echo '<input type="hidden" id="SPEAKERPiece" name="SPEAKERPiece" value="'. $_POST["SPEAKERPiece"]. '">';
                echo '<input type="hidden" id="brandModelSPEAKER" name="brandModelSPEAKER" value="'. $_POST["brandModelSPEAKER"]. '">';
                echo '<input type="hidden" id="ProductCodeSPEAKER" name="ProductCodeSPEAKER" value="'. $_POST["ProductCodeSPEAKER"]. '">';
                echo '<input type="hidden" id="categorySPEAKER" name="categorySPEAKER" value="'. $_POST["categorySPEAKER"]. '">';
                echo '<input type="hidden" id="PriceSPEAKER" name="PriceSPEAKER" value="'. $_POST["PriceSPEAKER"]. '">';
                echo '<input type="hidden" id="EkptwshSPEAKER" name="EkptwshSPEAKER" value="'. $_POST["EkptwshSPEAKER"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funSpeaker"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["SPEAKERPiece"]. '</a>
                      <div id="speaker" style="display:none;">
                        <a onclick="speakerFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissSPEAKER()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelSPEAKER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeSPEAKER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categorySPEAKER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshSPEAKER"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceSPEAKER"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshSPEAKER"]. '€</strike></font></sup> '. $_POST["PriceSPEAKER"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="speakerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Chair</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="speakerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Chair</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----SPEAKER----//
          //----MICROPHONE----//
          $sql = "SELECT * FROM Microphone_PC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["MICROPiece"])) {
              if ($_POST["MICROPiece"] != "") {
                echo '<input type="hidden" id="MICROPiece" name="MICROPiece" value="'. $_POST["MICROPiece"]. '">';
                echo '<input type="hidden" id="brandModelMICRO" name="brandModelMICRO" value="'. $_POST["brandModelMICRO"]. '">';
                echo '<input type="hidden" id="ProductCodeMICRO" name="ProductCodeMICRO" value="'. $_POST["ProductCodeMICRO"]. '">';
                echo '<input type="hidden" id="categoryMICRO" name="categoryMICRO" value="'. $_POST["categoryMICRO"]. '">';
                echo '<input type="hidden" id="PriceMICRO" name="PriceMICRO" value="'. $_POST["PriceMICRO"]. '">';
                echo '<input type="hidden" id="EkptwshMICRO" name="EkptwshMICRO" value="'. $_POST["EkptwshMICRO"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funMicro()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["MICROPiece"]. '</a>
                      <div id="micro" style="display:none;">
                        <a onclick="microFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissMICRO()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelMICRO"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeMICRO"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryMICRO"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshMICRO"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceMICRO"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshMICRO"]. '€</strike></font></sup> '. $_POST["PriceMICRO"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="microFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Microphone</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="microFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Microphone</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----MICROPHONE----//
          //----HEADERS----//
          $sql = "SELECT * FROM Gaming_Headset";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["HEADERPiece"])) {
              if ($_POST["HEADERPiece"] != "") {
                echo '<input type="hidden" id="HEADERPiece" name="HEADERPiece" value="'. $_POST["HEADERPiece"]. '">';
                echo '<input type="hidden" id="brandModelHEADER" name="brandModelHEADER" value="'. $_POST["brandModelHEADER"]. '">';
                echo '<input type="hidden" id="ProductCodeHEADER" name="ProductCodeHEADER" value="'. $_POST["ProductCodeHEADER"]. '">';
                echo '<input type="hidden" id="categoryHEADER" name="categoryHEADER" value="'. $_POST["categoryHEADER"]. '">';
                echo '<input type="hidden" id="PriceHEADER" name="PriceHEADER" value="'. $_POST["PriceHEADER"]. '">';
                echo '<input type="hidden" id="EkptwshHEADER" name="EkptwshHEADER" value="'. $_POST["EkptwshHEADER"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funHeader()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["HEADERPiece"]. '</a>
                      <div id="header" style="display:none;">
                        <a onclick="headerFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissHEADER()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelHEADER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeHEADER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryHEADER"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshHEADER"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceHEADER"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshHEADER"]. '€</strike></font></sup> '. $_POST["PriceHEADER"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="headerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Headers</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="headerFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Headers</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----HEADERS----//
          //----UPS----//
          $sql = "SELECT * FROM UPS";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["UPSPiece"])) {
              if ($_POST["UPSPiece"] != "") {
                echo '<input type="hidden" id="UPSPiece" name="UPSPiece" value="'. $_POST["UPSPiece"]. '">';
                echo '<input type="hidden" id="brandModelUPS" name="brandModelUPS" value="'. $_POST["brandModelUPS"]. '">';
                echo '<input type="hidden" id="ProductCodeUPS" name="ProductCodeUPS" value="'. $_POST["ProductCodeUPS"]. '">';
                echo '<input type="hidden" id="categoryUPS" name="categoryUPS" value="'. $_POST["categoryUPS"]. '">';
                echo '<input type="hidden" id="PriceUPS" name="PriceUPS" value="'. $_POST["PriceUPS"]. '">';
                echo '<input type="hidden" id="EkptwshUPS" name="EkptwshUPS" value="'. $_POST["EkptwshUPS"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funUps()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["UPSPiece"]. '</a>
                      <div id="ups" style="display:none;">
                        <a onclick="upsFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissUPS()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelUPS"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeUPS"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryUPS"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshUPS"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceUPS"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshUPS"]. '€</strike></font></sup> '. $_POST["PriceUPS"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="upsFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> UPS</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="upsFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> UPS</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----UPS----//
          //----LED FOR PC CASE----//
          $sql = "SELECT * FROM Led_PC WHERE Category='LED Strip'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["LEDPCPiece"])) {
              if ($_POST["LEDPCPiece"] != "") {
                echo '<input type="hidden" id="LEDPCPiece" name="LEDPCPiece" value="'. $_POST["LEDPCPiece"]. '">';
                echo '<input type="hidden" id="brandModelLEDPC" name="brandModelLEDPC" value="'. $_POST["brandModelLEDPC"]. '">';
                echo '<input type="hidden" id="ProductCodeLEDPC" name="ProductCodeLEDPC" value="'. $_POST["ProductCodeLEDPC"]. '">';
                echo '<input type="hidden" id="categoryLEDPC" name="categoryLEDPC" value="'. $_POST["categoryLEDPC"]. '">';
                echo '<input type="hidden" id="PriceLEDPC" name="PriceLEDPC" value="'. $_POST["PriceLEDPC"]. '">';
                echo '<input type="hidden" id="EkptwshLEDPC" name="EkptwshLEDPC" value="'. $_POST["EkptwshLEDPC"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funLedpc()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["LEDPCPiece"]. '</a>
                      <div id="ledpc" style="display:none;">
                        <a onclick="ledpcFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissLEDPC()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelLEDPC"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeLEDPC"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryLEDPC"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshLEDPC"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceLEDPC"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshLEDPC"]. '€</strike></font></sup> '. $_POST["PriceLEDPC"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ledpcFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Led for case</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ledpcFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Led for case</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----LED FOR PC CASE----//
          //----LED FOR DESK----//
          $sql = "SELECT * FROM Led_Desk";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["LEDDESKPiece"])) {
              if ($_POST["LEDDESKPiece"] != "") {
                echo '<input type="hidden" id="LEDDESKPiece" name="LEDDESKPiece" value="'. $_POST["LEDDESKPiece"]. '">';
                echo '<input type="hidden" id="brandModelLEDDESK" name="brandModelLEDDESK" value="'. $_POST["brandModelLEDDESK"]. '">';
                echo '<input type="hidden" id="ProductCodeLEDDESK" name="ProductCodeLEDDESK" value="'. $_POST["ProductCodeLEDDESK"]. '">';
                echo '<input type="hidden" id="categoryLEDDESK" name="categoryLEDDESK" value="'. $_POST["categoryLEDDESK"]. '">';
                echo '<input type="hidden" id="PriceLEDDESK" name="PriceLEDDESK" value="'. $_POST["PriceLEDDESK"]. '">';
                echo '<input type="hidden" id="EkptwshLEDDESK" name="EkptwshLEDDESK" value="'. $_POST["EkptwshLEDDESK"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funLeddesk()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["LEDDESKPiece"]. '</a>
                      <div id="leddesk" style="display:none;">
                        <a onclick="ledDeskFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissLEDDESK()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelLEDDESK"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeLEDDESK"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryLEDDESK"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshLEDDESK"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceLEDDESK"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshLEDDESK"]. '€</strike></font></sup> '. $_POST["PriceLEDDESK"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ledDeskFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Led for desk</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="ledDeskFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Led for desk</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----LED FOR DESK----//
          //----OPTICAL DRIVE----//
          $sql = "SELECT * FROM Optical_drives";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["OPTICALPiece"])) {
              if ($_POST["OPTICALPiece"] != "") {
                echo '<input type="hidden" id="OPTICALPiece" name="OPTICALPiece" value="'. $_POST["OPTICALPiece"]. '">';
                echo '<input type="hidden" id="brandModelOPTICAL" name="brandModelOPTICAL" value="'. $_POST["brandModelOPTICAL"]. '">';
                echo '<input type="hidden" id="ProductCodeOPTICAL" name="ProductCodeOPTICAL" value="'. $_POST["ProductCodeOPTICAL"]. '">';
                echo '<input type="hidden" id="categoryOPTICAL" name="categoryOPTICAL" value="'. $_POST["categoryOPTICAL"]. '">';
                echo '<input type="hidden" id="PriceOPTICAL" name="PriceOPTICAL" value="'. $_POST["PriceOPTICAL"]. '">';
                echo '<input type="hidden" id="EkptwshOPTICAL" name="EkptwshOPTICAL" value="'. $_POST["EkptwshOPTICAL"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funOptical()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["OPTICALPiece"]. '</a>
                      <div id="optical" style="display:none;">
                        <a onclick="opticalFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissOPTICAL()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelOPTICAL"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeOPTICAL"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryOPTICAL"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshOPTICAL"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceOPTICAL"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshOPTICAL"]. '€</strike></font></sup> '. $_POST["PriceOPTICAL"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="opticalFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="opticalFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----OPTICAL DRIVE----//
          //----SOUND CARD----//
          $sql = "SELECT * FROM Sound_Cards";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["SOUNDPiece"])) {
              if ($_POST["SOUNDPiece"] != "") {
                echo '<input type="hidden" id="SOUNDPiece" name="SOUNDPiece" value="'. $_POST["SOUNDPiece"]. '">';
                echo '<input type="hidden" id="brandModelSOUND" name="brandModelSOUND" value="'. $_POST["brandModelSOUND"]. '">';
                echo '<input type="hidden" id="ProductCodeSOUND" name="ProductCodeSOUND" value="'. $_POST["ProductCodeSOUND"]. '">';
                echo '<input type="hidden" id="categorySOUND" name="categorySOUND" value="'. $_POST["categorySOUND"]. '">';
                echo '<input type="hidden" id="PriceSOUND" name="PriceSOUND" value="'. $_POST["PriceSOUND"]. '">';
                echo '<input type="hidden" id="EkptwshSOUND" name="EkptwshSOUND" value="'. $_POST["EkptwshSOUND"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funSound()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["SOUNDPiece"]. '</a>
                      <div id="sound" style="display:none;">
                        <a onclick="soundFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissSOUND()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelSOUND"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeSOUND"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categorySOUND"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshSOUND"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceSOUND"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshSOUND"]. '€</strike></font></sup> '. $_POST["PriceSOUND"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="soundFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="soundFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Optical Drive</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----SOUND CARD----//
          //----PRINTER----//
          $sql = "SELECT * FROM Printers";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["PRINTPiece"])) {
              if ($_POST["PRINTPiece"] != "") {
                echo '<input type="hidden" id="PRINTPiece" name="PRINTPiece" value="'. $_POST["PRINTPiece"]. '">';
                echo '<input type="hidden" id="brandModelPRINT" name="brandModelPRINT" value="'. $_POST["brandModelPRINT"]. '">';
                echo '<input type="hidden" id="ProductCodePRINT" name="ProductCodePRINT" value="'. $_POST["ProductCodePRINT"]. '">';
                echo '<input type="hidden" id="categoryPRINT" name="categoryPRINT" value="'. $_POST["categoryPRINT"]. '">';
                echo '<input type="hidden" id="PricePRINT" name="PricePRINT" value="'. $_POST["PricePRINT"]. '">';
                echo '<input type="hidden" id="EkptwshPRINT" name="EkptwshPRINT" value="'. $_POST["EkptwshPRINT"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funPrint()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["PRINTPiece"]. '</a>
                      <div id="print" style="display:none;">
                        <a onclick="printFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissPRINT()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelPRINT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodePRINT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryPRINT"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshPRINT"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PricePRINT"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshPRINT"]. '€</strike></font></sup> '. $_POST["PricePRINT"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="printFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Printer</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="printFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Printer</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----PRINTER----//
          //----SCANNER----//
          $sql = "SELECT * FROM Scanners";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["SCANPiece"])) {
              if ($_POST["SCANPiece"] != "") {
                echo '<input type="hidden" id="SCANPiece" name="SCANPiece" value="'. $_POST["SCANPiece"]. '">';
                echo '<input type="hidden" id="brandModelSCAN" name="brandModelSCAN" value="'. $_POST["brandModelSCAN"]. '">';
                echo '<input type="hidden" id="ProductCodeSCAN" name="ProductCodeSCAN" value="'. $_POST["ProductCodeSCAN"]. '">';
                echo '<input type="hidden" id="categorySCAN" name="categorySCAN" value="'. $_POST["categorySCAN"]. '">';
                echo '<input type="hidden" id="PriceSCAN" name="PriceSCAN" value="'. $_POST["PriceSCAN"]. '">';
                echo '<input type="hidden" id="EkptwshSCAN" name="EkptwshSCAN" value="'. $_POST["EkptwshSCAN"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funScan()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["SCANPiece"]. '</a>
                      <div id="scan" style="display:none;">
                        <a onclick="scanFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissSCAN()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelSCAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeSCAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categorySCAN"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshSCAN"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceSCAN"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshSCAN"]. '€</strike></font></sup> '. $_POST["PriceSCAN"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="scanFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Scanner</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="scanFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Scanner</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----SCANNER----//
          //----BLUETOOTH ADAPTORS----//
          $sql = "SELECT * FROM Bluetooth_Adapters";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            if (isset($_POST["BLUEPiece"])) {
              if ($_POST["BLUEPiece"] != "") {
                echo '<input type="hidden" id="BLUEPiece" name="BLUEPiece" value="'. $_POST["BLUEPiece"]. '">';
                echo '<input type="hidden" id="brandModelBLUE" name="brandModelBLUE" value="'. $_POST["brandModelBLUE"]. '">';
                echo '<input type="hidden" id="ProductCodeBLUE" name="ProductCodeBLUE" value="'. $_POST["ProductCodeBLUE"]. '">';
                echo '<input type="hidden" id="categoryBLUE" name="categoryBLUE" value="'. $_POST["categoryBLUE"]. '">';
                echo '<input type="hidden" id="PriceBLUE" name="PriceBLUE" value="'. $_POST["PriceBLUE"]. '">';
                echo '<input type="hidden" id="EkptwshBLUE" name="EkptwshBLUE" value="'. $_POST["EkptwshBLUE"]. '">';
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="funBlue()"><font color="white"><i class="fas fa-check-circle"></i> '. $_POST["BLUEPiece"]. '</a>
                      <div id="blue" style="display:none;">
                        <a onclick="blueFunMin()" class="link-min"><i class="fas fa-sync-alt"></i> Change</a>
                        <a onclick="dismissBLUE()" class="link-min"><i class="fas fa-times-circle"></i> Dismiss</a>
                      </div>
                    </font></th>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Brand & Model</div><div class="otherSpecsForAll">'. $_POST["brandModelBLUE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Product Code</div><div class="otherSpecsForAll">'. $_POST["ProductCodeBLUE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">
                    <td class=""><div class="titleForBrandAll">Category</div><div class="otherSpecsForAll">'. $_POST["categoryBLUE"]. '</div></td>
                  </tr>
                  <tr class="trChangeColorForAll-Minimum">';
                    if ($_POST["EkptwshBLUE"] == "") {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll">'. $_POST["PriceBLUE"]. '€</div></td>';
                    } else {
                      echo '<td class=""><div class="titleForBrandAll">Price</div><div class="otherSpecsForAll"><sup><font color="#808080"><strike>'. $_POST["EkptwshBLUE"]. '€</strike></font></sup> '. $_POST["PriceBLUE"]. '€</div></td>';
                    }
                  echo '</tr>
                </table><div class="br-after-min-cards"><br></div>';
              } else {
                echo '<table class="tableOnTopReadyPieces-Minimum">
                  <tr>
                    <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="blueFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Scanner</font></a></th>
                  </tr>
                </table><div class="br-after-min-cards"><br></div>';
              }
            } else {
              echo '<table class="tableOnTopReadyPieces-Minimum">
                <tr>
                  <th class="thOnTopReadyPieces-Minimum"><a class="links-for-specs" onclick="blueFunMin()"><font color="white"><i class="fas fa-plus-circle"></i> Scanner</font></a></th>
                </tr>
              </table><div class="br-after-min-cards"><br></div>';
            }
          }
          //----BLUETOOTH ADAPTORS----//
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
        echo '</form>';
        echo '</div>';
				//FOR READY PC BUILD
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
		?>

    </article>
</section>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<!--<footer>-->

<!--END OF SHEET-->
    <!--<img src="../../logo/pictureForTabs.png" width="25%" height="25%" ALT="PC Builder" HSPACE="30">
    <br>
    <h4><FONT COLOR="white">Created and designed by Tsalmas Anastasios ©</FONT></H4>
    <br>-->
<!--END OF SHEET-->

<!--</footer>-->

<!--Layout-----------------------END-->
</div>
</div>
<!--WHEN THE USER IS RIGHT-->

<!--FOR MAXIMUM TABLE FORM-->
<?php
  function amdInternet() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Internet/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Internet/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function intelInternet() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Internet/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Internet/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function simpleEditAMD() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/SimpleEdit/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/SimpleEdit/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function simpleEditINTEL() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/SimpleEdit/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/SimpleEdit/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function moderateAMD() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ModerateGaming/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ModerateGaming/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function moderateINTEL() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ModerateGaming/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ModerateGaming/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function hard1080pAMD() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1080p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1080p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function hard1080pINTEL() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1080p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../INTEL/AMD/Gaming1080p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1080p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function hard1440pAMD() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/Gaming1440p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function hard1440pINTEL() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/Gaming1440p/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function heavyAMD() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ProfessionalUSE/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ProfessionalUSE/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ProfessionalUSE/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ProfessionalUSE/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/AMD/ProfessionalUSE/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/AMD/ProfessionalUSE/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
  function heavyINTEL() {
    echo 'function cpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function motherFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/Gaming1440p/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function ramFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ProfessionalUSE/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function gpuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ProfessionalUSE/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function psuFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ProfessionalUSE/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function hardFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ProfessionalUSE/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function caseFunMAX() {
      document.getElementById("tableReady").action = "../../Pages/INTEL/ProfessionalUSE/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }

    function cpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/CPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function motherFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/Motherboard";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function ramFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/Ram";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function gpuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/GPU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function psuFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/PSU";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function hardFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/HardDrive";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }
    
    function caseFunMIN() {
      document.getElementById("tableReadyMin").action = "../../Pages/INTEL/ProfessionalUSE/PCCase";'.
      "var submitForm = document.getElementsByName('tableReady');".
      'submitForm[0].submit();
    }';
  }
?>
<script>
  <?php
    if ($_POST["categoryCPU"] == "Internet, Office, Simple Gaming, Movies") {
      if ($cpu == "AMD") {
        amdInternet();
      } elseif ($cpu == "INTEL") {
        intelInternet();
      }
    } elseif ($_POST["categoryCPU"] == "Simple Edit") {
      if ($cpu == "AMD") {
        simpleEditAMD();
      } elseif ($cpu == "INTEL") {
        simpleEditINTEL();
      }
    } elseif ($_POST["categoryCPU"] == "Moderate Gaming") {
      if ($cpu == "AMD") {
        moderateAMD();
      } elseif ($cpu == "INTEL") {
        moderateINTEL();
      }
    } elseif ($_POST["categoryCPU"] == "Hard Gaming in 1080p") {
      if ($cpu == "AMD") {
        hard1080pAMD();
      } elseif ($cpu == "INTEL") {
        hard1080pINTEL();
      }
    } elseif ($_POST["categoryCPU"] == "Hard Gaming in 1440p") {
      if ($cpu == "AMD") {
        hard1440pAMD();
      } elseif ($cpu == "INTEL") {
        hard1440pINTEL();
      }
    } elseif ($_POST["categoryCPU"] == "Heavy Professional Use") {
      if ($cpu == "AMD") {
        heavyAMD();
      } elseif ($cpu == "INTEL") {
        heavyINTEL();
      }
    }
  ?>
</script>

<!--OTHER SPECS SUBMIT FORMS MAX TABLE--><script src="../../JavaScripts/PCBuilderReadyPCBUILD/FunctionsForFormSubmitMaxTable.js"></script><!--OTHER SPECS SUBMIT FORMS MAX TABLE-->
<!--OTHER SPECS SUBMIT FORMS MIN TABLE--><script src="../../JavaScripts/PCBuilderReadyPCBUILD/FunctionsForFormSubmitMinTable.js"></script><!--OTHER SPECS SUBMIT FORMS MIN TABLE-->

<!--FOR MAXIMUM TABLE FORM-->

<div class="footer-buttons-action-general">
  <div class="footer-buttons-action-collapsible-div" id="footer-buttons-action-collapsible-div">
      <button class="footer-buttons-action-collapsible"  id="footer-buttons-action-collapsible" onclick="displayFooterButtonsAction()" style="margin-left:2px;"><i class="fas fa-angle-up"></i></button>
  </div>

  <div class="footer-buttons-action-collapsible-div-two" id="footer-buttons-action-collapsible-div-two">
      <button class="footer-buttons-action-collapsible-two" id="footer-buttons-action-collapsible-two" onclick="displayNoneFooterButtonsAction()" style="margin-left:2px;"><i class="fas fa-angle-down"></i></button>
  </div>
	<div id="windowSizeFit" style="display: none;"></div>
  <div class="footer-buttons-action" id="footer-buttons-action">
      <div class="footer-buttons-action-all-buttons">
          <center><button class="footer-buttons-action-buy-it"><i class="fas fa-shopping-cart"></i> Buy this PC Build</button>
          <button class="footer-buttons-action-save"><i class="fas fa-save"></i> Save</button>
          <button class="footer-buttons-action-share"><i class="fas fa-share-alt"></i> Share</button>
          <button class="footer-buttons-action-dismiss" onclick="dismiss()"><i class="fas fa-trash-alt"></i> Dismiss</button></center>
      </div>
  </div>
</div>

<script>
  function dismiss() {
    if (confirm("Are you sure that you want to dismiss this PC Build?\n(Your PC Build data will be restored in your device cache and in your browser history)")) {
      window.location.replace("../../index");
      window.close();
    }
  }
</script>

<!--DISMISS SPECS-->
<script>
  function dismissRAM2() {
    document.getElementById("RAM2Piece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }

  function dismissHARD2() {
    document.getElementById("HARD2Piece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }

  function dismissSOFT() {
    document.getElementById("SOFTPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissCOOLER() {
    document.getElementById("COOLERPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissFAN() {
    document.getElementById("FANPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissMONITOR() {
    document.getElementById("MONITORPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissCHAIR() {
    document.getElementById("CHAIRPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissSPEAKER() {
    document.getElementById("SPEAKERPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissMICRO() {
    document.getElementById("MICROPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissHEADER() {
    document.getElementById("HEADERPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissUPS() {
    document.getElementById("UPSPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissLEDPC() {
    document.getElementById("LEDPCPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissLEDDESK() {
    document.getElementById("LEDDESKPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }

  function dismissOPTICAL() {
    document.getElementById("OPTICALPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissSOUND() {
    document.getElementById("SOUNDPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissPRINT() {
    document.getElementById("PRINTPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissSCAN() {
    document.getElementById("SCANPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
  
  function dismissBLUE() {
    document.getElementById("BLUEPiece").value = "";
    var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();
  }
</script>
<?php
//ONLY FOR MOUSE AND KEYBOARD
echo '<script>
  function dismissKEYB() {
    document.getElementById("KEYBPiece").value = "";';
      if ($_POST["categoryKEYB"] == "Keyboard & Mouse Set") {
        echo 'document.getElementById("MOUSEPiece").value = "";';
      }
      echo "var submitForm = document.getElementsByName('tableReady');
      submitForm[0].submit();";
  echo '}

  function dismissMOUSE() {
    document.getElementById("MOUSEPiece").value = "";';
    if (isset($_POST["categoryMOUSE"])) {
      if ($_POST["categoryMOUSE"] == "Keyboard & Mouse Set") {
        echo 'document.getElementById("KEYBPiece").value = "";';
      }
    }
    echo "var submitForm = document.getElementsByName('tableReady');
    submitForm[0].submit();";
  echo '}
</script>';
//ONLY FOR MOUSE AND KEYBOARD
?>

<!--DISMISS SPECS-->

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

<!--FOOTER WITH ACTION BUTTONS--><script src="../../JavaScripts/PCBuilderReadyPCBUILD/FooterForActionButtons.js"></script><!--FOOTER WITH ACTION BUTTONS-->
<!--FOOTER WITH ACTION BUTTONS--><script src="../../JavaScripts/PCBuilderReadyPCBUILD/div-display-block-min-table-actions.js"></script><!--FOOTER WITH ACTION BUTTONS-->

<?php
  $conn->close();
?>

</BODY>

</html>