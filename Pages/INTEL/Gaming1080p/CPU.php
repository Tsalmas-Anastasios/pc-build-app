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
<!doctype html>
<html lang="en">
<HEAD>
    <!--HOME PAGE STYLESHEETS-->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="../../../../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
	<TITLE>PC Build App-PC Builder-INTEL/Category: Hard Gaming in 1080p/CPU select</TITLE>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../../../../StyleSheets/INTEL/Layout.css">-->
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/LayoutNot.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/topnav.css">
    <link rel="stylesheet" href="../../../StyleSheets/PC-Builder-General/search/no-one-character.css">
    <link rel="stylesheet" href="../../../StyleSheets/PC-Builder-General/search/no-results.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--HOME PAGE STYLESHEETS-->


    <link rel="stylesheet" href="../../../../StyleSheets/TabsInPCBuilderINTEL.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/ProductCardsPCBuilder.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/ButtonsAll.css">
    <link rel="stylesheet" href="../../../../StyleSheets/Under800px.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/tablesInBigPCBuilder.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/SearchBar.css">
    <link rel="stylesheet" href="../../../../StyleSheets/INTEL/ButtonToGoWithoutChange-fromOtherPages.css">

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
	  border: 2px solid #0071c5;
	  border-radius: 10px;
  }
</style> 

</HEAD>

<BODY BGCOLOR="#ccc" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0" onresize="WindowResize()" onload="WindowResize()" onbeforeunload="return functionOnBeforeUnload();searcherToProducts()" oncontextmenu="return false">

<!--NAVBAR-----------------------MENU IN HOMESCREEN-START----------->
<!--TopNav-->
<div id="myTopnav" class="topnav" style="z-index: 9999;">
  <a href="../../../index"><i class="fa fa-fw fa-home"></i> Home</a>
  <div class="dropdown">
	<button class="active"><i class="fas fa-desktop"></i> PC Builder
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../../Pages/PCBuilderAMD"><i class="fas fa-desktop"></i> AMD</a>
      <a href="../../../Pages/PCBuilderINTEL" class="active"><i class="fas fa-desktop"></i> INTEL</a>
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
  <img src="../../../../Pictures/INTEL_logo_for_PCBuilderINTEL_home.png" class="pictureINTELLogo"/>
  <div class="categoryHeader">
    <center><p><b>Hard Gaming in 1080p</b></p></center>
  </div>
</header>
</div>-->

<div class="content">
<SECTION>
    <article>
    <div class="backToCategoriesButton"> 
          <a href="../../../../Pages/PCBuilderINTEL"><button class="btnBackToCategoriesINTEL"><b><font color="white">Categories</font></b></button></a>
          <?php
            if (isset($_POST["hiddenButton"])) {
              if ($_POST["hiddenInput"] == "MOTHERBOARD") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
              } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
              } elseif ($_POST["hiddenInput"] == "RAM") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/Ram" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
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
              } elseif ($_POST["hiddenInput"] == "GPU") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/GPU" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
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
              } elseif ($_POST["hiddenInput"] == "PSU") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/PSU" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
              } elseif ($_POST["hiddenInput"] == "HARD") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/HardDrive" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
              } elseif ($_POST["hiddenInput"] == "CASE") {
                echo '<form action="../../../../Pages/INTEL/Gaming1080p/PCCase" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
              } elseif ($_POST["hiddenInput"] == "OK") {
                echo '<form action="../../../../Pages/PCBuilderPCBuild" method="post" id="formButtonChange" name="formButtonChange">';
                echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
              }
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
            }
          ?>
        <br><a class="dieykrinish"><font size="1px">&nbsp;&nbsp;(Your data will be deleted!)</font></a>
        </div>
        <br><br>

      <div class="goToList" id="goToList">
        <CENTER><B><U>CPU</U></B> <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        Motherboard <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        Ram <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        GPU <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        PSU <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        Hard Drive <font color="#0071c5"><i class="fas fa-long-arrow-alt-right"></i></font>
        PC Case</CENTER><br />
      </div>
      
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

      <?php
      
        
        echo '<div class="frameForProductCards"><br>';//frame
        echo '<form method="post" accept-charset="utf-8" autocomplete="off" onsubmit="return forCorrectSubmit()">';
          if (isset($_POST["hiddenButton"])) {
            echo '<input type="hidden" id="hiddenButton" name="hiddenButton" value="1">';
          }
          echo '<center><input type="text" id="searchBar" name="searchBar" placeholder="Search..." class="searchBar" value="';
           if (isset($_POST["searchBar"])) {
            echo $_POST["searchBar"];
          } else {
            echo "";
          } 
          echo '"></center>';                                                                                                              
          if (!isset($_POST["hiddenInput"])) {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
          } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
          } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
          } elseif ($_POST["hiddenInput"] == "RAM") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
          } elseif ($_POST["hiddenInput"] == "GPU") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
            //DATA FROM RAM CHOOSE
            echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
            echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
            echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
            echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
            echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
            echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
            //DATA FROM RAM CHOOSE
          } elseif ($_POST["hiddenInput"] == "PSU") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
          } elseif ($_POST["hiddenInput"] == "HARD") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
          } elseif ($_POST["hiddenInput"] == "CASE") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
          } elseif ($_POST["hiddenInput"] == "OK") {
            echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
          }
          //DATA FROM CPU AND MOTHERBOARD
          if (isset($_POST["hiddenButton"])) {
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
          }
          if (isset($_POST["MotherPiece"])) {
            //DATA FROM MOTHERBOARD CHOOSE
            echo '<input type="hidden" id="MotherPiece" name="MotherPiece" value="Motherboard">';
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
            //DATA FROM MOTHERBOARD CHOOSE
          }
          //DATA FROM CPU AND MOTHERBOARD
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

        $notSearch = 1;
        if(isset($_POST["searchBar"])) {
          $searchBar = $_POST["searchBar"];
          if (strlen($searchBar) == 0 or strlen($searchBar) > 600) {
            $notSearch = 1;
          } elseif (strlen($searchBar) == 1) {
            $notSearch = 2;
          } else {
            $notSearch = 0;
          }
        }

        if ($notSearch == 0) {
          $search_explode = explode(' ', $_POST["searchBar"]);
          $search_split = str_split($_POST["searchBar"], 1);
          $search_post = $_POST["searchBar"];
          $search_expression = "";
          $keywords = "";
          $x = 0;
          foreach($search_explode as $search_explode) {
            $x++;
            if ($x == 1) {
              $keywords .= " AND Description LIKE '%$search_explode%'";
            } else {
              $keywords .= " or Description LIKE '%$search_explode%'";
            }
            $search_expression .= $search_explode;
          }
          $sql = "SELECT * FROM CPU WHERE Category='Hard Gaming in 1080p' AND Description LIKE '%$search_expression%'";
          $result = $conn->query($sql);
          if ($result->num_rows <=0 ) {
            $sql = "SELECT * FROM CPU WHERE Category='Hard Gaming in 1080p' AND Description LIKE '%$search_post%'";
            $result = $conn->query($sql);
            if ($result->num_rows <=0 ) {
              $sql = "SELECT * FROM CPU WHERE Category='Hard Gaming in 1080p'$keywords";
              $result = $conn->query($sql);
            }
          }
          if ($result->num_rows > 0) {
            $brINbutton = 0;
            $onoma_for_title = 0;
            
            //output data of each view (E.O.F.)
            while($row = $result->fetch_assoc()) {
              /*id for name in product card*/ 
                $onoma_for_title++; 
              /*id for name in product card*/
              $brandMod = $row["Brand"];
              if ($brandMod == "INTEL") {
                $ektpwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];
                //MAKE CARDS-START
                  
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                  //MAKE THE FORM
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    if (!isset($_POST["hiddenInput"])) {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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
                  echo '';
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                  echo '<div class="productCard">';
                  //INFO OF PRODUCTS
                  echo '<div class="productCard-info">';
                  echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
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
                                <th class="rowsOnSpecs">General Characteristics</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Release Year</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Year"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Family</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Family"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Microarchitecture</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Micro"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Socket</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Socket"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">64-bit</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Bit"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Packing</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Box"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Performances</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cores</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cores"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Threads</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Threads"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Maximum Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cache Memory</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cache"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Unlocked</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Unlocked"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Thermal Design Power(TDP)</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["TDP"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Features and Functions</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Built-in Graphics</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GPU"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Includes heat sink</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cooler"]. '</td>
                              </tr>
                            </table></font></center>
                          </div>';
                  echo '</div>';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                  //INFO OF PRODUCTS-END
                  //PRICE OF PRODUCTS
                  echo '<div class="productCardpreview">';
                  if ($ektpwshPrice == $PriceMod) {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } elseif ($ektpwshPrice == "0") {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } else {
                    if ($PriceMod > $ektpwshPrice) {
                      $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      $brINbutton = 1;
                    } else {
                      $ekptwshPososto = 0;
                    }
                    echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
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
                  echo '<div class="cardMin">';
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                  if (!isset($_POST["hiddenInput"])) {
                    echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                  } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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
                    echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                    echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                    echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                    ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                    echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                    echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                    echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                    echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                    echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
                    echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                    if ($ektpwshPrice == $PriceMod) {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } elseif ($ektpwshPrice == "0") {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } else {
                      if ($PriceMod > $ektpwshPrice) {
                        $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      } else {
                        $ekptwshPososto = 0;
                      }
                      echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
                    }
                    echo '<center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">
                            <table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">General Characteristics</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Release Year</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Year"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Family</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Family"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Microarchitecture</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Micro"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Socket</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Socket"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">64-bit</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Bit"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Packing</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Box"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Performances</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cores</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cores"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Threads</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Threads"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Maximum Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cache Memory</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cache"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Unlocked</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Unlocked"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Thermal Design Power</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["TDP"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Features and Functions</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Built-In Graphics</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GPU"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Includes heat sink</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cooler"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                            </table>
                          </div></center>';
                    echo '<p><button class="cardButtonMin">I Want This!</button></p>';
                    echo '</form>';
                    echo '</div>';
                  //PRODUCT CARDS MIN
                  //MAKE CARDS-END
              }  
            }
          } else {
              echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
              $sql = "SELECT * FROM CPU WHERE Category='Hard Gaming in 1080p'";
              $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            $brINbutton = 0;
            $onoma_for_title = 0;
            
            //output data of each view (E.O.F.)
            while($row = $result->fetch_assoc()) {
              /*id for name in product card*/ 
                $onoma_for_title++; 
              /*id for name in product card*/
              $brandMod = $row["Brand"];
              if ($brandMod == "INTEL") {
                $ektpwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];
                //MAKE CARDS-START
                  
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                  //MAKE THE FORM
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    if (!isset($_POST["hiddenInput"])) {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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
                  echo '';
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                  echo '<div class="productCard">';
                  //INFO OF PRODUCTS
                  echo '<div class="productCard-info">';
                  echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
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
                                <th class="rowsOnSpecs">General Characteristics</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Release Year</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Year"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Family</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Family"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Microarchitecture</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Micro"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Socket</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Socket"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">64-bit</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Bit"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Packing</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Box"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Performances</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cores</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cores"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Threads</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Threads"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Maximum Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cache Memory</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cache"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Unlocked</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Unlocked"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Thermal Design Power(TDP)</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["TDP"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Features and Functions</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Built-in Graphics</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GPU"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Includes heat sink</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cooler"]. '</td>
                              </tr>
                            </table></font></center>
                          </div>';
                  echo '</div>';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                  //INFO OF PRODUCTS-END
                  //PRICE OF PRODUCTS
                  echo '<div class="productCardpreview">';
                  if ($ektpwshPrice == $PriceMod) {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } elseif ($ektpwshPrice == "0") {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } else {
                    if ($PriceMod > $ektpwshPrice) {
                      $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      $brINbutton = 1;
                    } else {
                      $ekptwshPososto = 0;
                    }
                    echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
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
                  echo '<div class="cardMin">';
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    if (!isset($_POST["hiddenInput"])) {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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
                    echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                    echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                    echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                    ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                    echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                    echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                    echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                    echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                    echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
                    echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                    if ($ektpwshPrice == $PriceMod) {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } elseif ($ektpwshPrice == "0") {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } else {
                      if ($PriceMod > $ektpwshPrice) {
                        $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      } else {
                        $ekptwshPososto = 0;
                      }
                      echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
                    }
                    echo '<center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">
                            <table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">General Characteristics</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Release Year</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Year"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Family</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Family"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Microarchitecture</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Micro"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Socket</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Socket"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">64-bit</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Bit"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Packing</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Box"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Performances</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cores</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cores"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Threads</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Threads"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Maximum Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cache Memory</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cache"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Unlocked</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Unlocked"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Thermal Design Power</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["TDP"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Features and Functions</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Built-In Graphics</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GPU"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Includes heat sink</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cooler"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                            </table>
                          </div></center>';
                    echo '<p><button class="cardButtonMin">I Want This!</button></p>';
                    echo '</form>';
                    echo '</div>';
                  //PRODUCT CARDS MIN
                  //MAKE CARDS-END
              }  
            }
          }
        }
        } elseif ($notSearch == 1 or $notSearch == 2) {
          if ($notSearch == 2) {
            echo '<div class="no-one-character">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-one-character.png" alt="No results" class="no-one-character-img">
		<center><div class="no-one-character-message">
        	You can not search with only one character!
        </div></center>
    </div>';
          }
          $sql = "SELECT * FROM CPU WHERE Category='Hard Gaming in 1080p'";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            $brINbutton = 0;
            $onoma_for_title = 0;
            
            //output data of each view (E.O.F.)
            while($row = $result->fetch_assoc()) {
              /*id for name in product card*/ 
                $onoma_for_title++; 
              /*id for name in product card*/
              $brandMod = $row["Brand"];
              if ($brandMod == "INTEL") {
                $ektpwshPrice = $row["PriceEkptwsh"];
                $PriceMod = $row["Price"];
                //MAKE CARDS-START
                  
                echo '<div class="productCardContainer" id="productCardContainer'. $onoma_for_title. '">';
                  //MAKE THE FORM
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    if (!isset($_POST["hiddenInput"])) {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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
                  echo '';
                  echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                  echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                  ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                  echo '<div class="productCard">';
                  //INFO OF PRODUCTS
                  echo '<div class="productCard-info">';
                  echo '<font size="6px"><b id="onoma'. $onoma_for_title./*id for name in product card*/ '">'. $row["Brand"]. ' '. $row["Model"]. '</b></font><br>';
                  echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                  echo '<b><font size="2px">Product Code: '. $row["ProductCode"]. '</font></b>';  
                  echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
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
                                <th class="rowsOnSpecs">General Characteristics</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Release Year</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Year"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Family</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Family"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Microarchitecture</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Micro"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Socket</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Socket"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">64-bit</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Bit"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Packing</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Box"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Performances</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cores</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cores"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Threads</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Threads"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Maximum Processor Frequency</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Cache Memory</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cache"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Unlocked</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Unlocked"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Thermal Design Power(TDP)</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["TDP"]. '</td>
                              </tr>
                              <tr class="tableSpecs">  
                                <th class="rowsOnSpecs">Features and Functions</th>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Built-in Graphics</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["GPU"]. '</td>
                              </tr>
                              <tr class="rowsOnSpecsTR">
                                <td class="rowsOnSpecs">Includes heat sink</td>
                                <td class="rowsOnSpecs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="rowsOnSpecs">'. $row["Cooler"]. '</td>
                              </tr>
                            </table></font></center>
                          </div>';
                  echo '</div>';
                  echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                  //INFO OF PRODUCTS-END
                  //PRICE OF PRODUCTS
                  echo '<div class="productCardpreview">';
                  if ($ektpwshPrice == $PriceMod) {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } elseif ($ektpwshPrice == "0") {
                    echo '<h2 align="right">'. $row["Price"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                  } else {
                    if ($PriceMod > $ektpwshPrice) {
                      $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      $brINbutton = 1;
                    } else {
                      $ekptwshPososto = 0;
                    }
                    echo '<div align="left"><b><font size="6"><font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. round($ekptwshPososto). '%</font></font></b></div>'. '<h2 align="right"><font color="#333333"><sup><span class="lineStrike">'. $row["Price"]. '€</span></sup></font>&nbsp;'. $row["PriceEkptwsh"]. '€</h2>';
                    echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                    echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
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
                  echo '<div class="cardMin">';
                  echo '<form action="../../../../Pages/INTEL/Gaming1080p/Motherboard" method="post" id="form'. $onoma_for_title./*id for form in product card*/ '" name="form'. $onoma_for_title./*id for form in product card*/'">';
                    if (!isset($_POST["hiddenInput"])) {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "CPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';
                    } elseif ($_POST["hiddenInput"] == "MOTHERBOARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">';     
                    } elseif ($_POST["hiddenInput"] == "RAM") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="RAM">';
                    } elseif ($_POST["hiddenInput"] == "GPU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="GPU">';
                      //DATA FROM RAM CHOOSE
                      echo '<input type="hidden" id="RamPiece" name="RamPiece" value="Ram">';
                      echo '<input type="hidden" id="brandModelRAM" name="brandModelRAM" value="'. $_POST["brandModelRAM"]. '">';
                      echo '<input type="hidden" id="ProductCodeRAM" name="ProductCodeRAM" value="'. $_POST["ProductCodeRAM"]. '">';
                      echo '<input type="hidden" id="categoryRAM" name="categoryRAM" value="'. $_POST["categoryRAM"]. '">';
                      echo '<input type="hidden" id="PriceRAM" name="PriceRAM" value="'. $_POST["PriceRAM"]. '">';
                      echo '<input type="hidden" id="EkptwshRAM" name="EkptwshRAM" value="'. $_POST["EkptwshRAM"]. '">';
                      //DATA FROM RAM CHOOSE
                    } elseif ($_POST["hiddenInput"] == "PSU") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="PSU">';
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
                    } elseif ($_POST["hiddenInput"] == "HARD") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="HARD">';
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
                    } elseif ($_POST["hiddenInput"] == "CASE") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="CASE">';
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
                    } elseif ($_POST["hiddenInput"] == "OK") {
                      echo '<input type="hidden" id="hiddenInput" name="hiddenInput" value="OK">';
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
                    }
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

                    echo '<input type="hidden" id="pieceCPU" name="CPUpiece" value="CPU">';
                    echo '<input type="hidden" id="MicroCPU" name="MicroCPU" value="'. $row["Micro"]. '">';
                    echo '<input type="hidden" id="SocketCPU" name="SocketCPU" value="'. $row["Socket"]. '">';
                    ECHO '<input type="hidden" id="gpuCPU" name="gpuCPU" value="'. $row["GPU"]. '">';
                    echo '<img src="'. $row["Picture1"]. '" alt="CPU Picture" class="cardImgMin"><br><br>';
                    echo '<div class="brandNameCard">'. $row["Brand"]. ' '. $row["Model"]. '</div>';
                    echo '<div class="productCodeCard">Product Code: '. $row["ProductCode"]. '</div>';
                    echo '<input type="hidden" id="brandModelCPU" name="brandModelCPU" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                    echo '<input type="hidden" id="ProductCodeCPU" name="ProductCodeCPU" value="'. $row["ProductCode"]. '">';
                    echo '<input type="hidden" id="categoryCPU" name="categoryCPU" value="Hard Gaming in 1080p">';
                    if ($ektpwshPrice == $PriceMod) {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } elseif ($ektpwshPrice == "0") {
                      echo '<p class="priceMin">'. $row["Price"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["Price"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="">';
                    } else {
                      if ($PriceMod > $ektpwshPrice) {
                        $ekptwshPososto = 100*(($ektpwshPrice-$PriceMod)/$PriceMod);
                      } else {
                        $ekptwshPososto = 0;
                      }
                      echo '<p class="priceMin"><sup><font size="3"><span class="lineStrike">'. $row["Price"]. '€</span></font></sup>'. $row["PriceEkptwsh"]. '€</p>';
                      echo '<input type="hidden" id="PriceCPU" name="PriceCPU" value="'. $row["PriceEkptwsh"]. '">';
                      echo '<input type="hidden" id="EkptwshCPU" name="EkptwshCPU" value="'. $row["Price"]. '">';
                    }
                    echo '<center><button type="button" class="collapsibleMin">Specs</button>';
                    echo '<div class="contentMin">
                            <table class="tableSpecsMin">
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">General Characteristics</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Release Year</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Year"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Family</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Family"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Microarchitecture</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Micro"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Socket</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Socket"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">64-bit</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Bit"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Packing</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Box"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Performances</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cores</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cores"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Threads</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Threads"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Maximum Processor Frequency</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["MaxGHz"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Cache Memory</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cache"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Unlocked</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Unlocked"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Thermal Design Power</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["TDP"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                              <!--ONE CATEGORY OF SPECS-->
                              <tr>
                                <th class="KEFALIDAmin">Features and Functions</th>
                              </tr>
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Built-In Graphics</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["GPU"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE SPEC-->
                              <tr>  
                                <td class="NameOfSpecsMin">Includes heat sink</td>
                              </tr>
                              <tr>
                                <td class="FromDatabaseSpecsMin">'. $row["Cooler"]. '</td>
                              </tr>
                              <!--ONE SPEC-->
                              <!--ONE CATEGORY OF SPECS-->
                            </table>
                          </div></center>';
                    echo '<p><button class="cardButtonMin">I Want This!</button></p>';
                    echo '</form>';
                    echo '</div>';
                  //PRODUCT CARDS MIN
                  //MAKE CARDS-END
              }  
            }
          }else{
            echo '<div class="no-results-search">
    	<img src="http://pc-build-webapp.000webhostapp.com/Pictures/pc-builder/no-results-search.png" alt="No results" class="no-results-search-img">
		<center><div class="no-results-search-message">
        	We do not have SOMETHING right now. Please search for an other product!
        </div></center>
    </div>';
          }
        }
          echo '</div>';//frame
          $conn->close();
        
        ?>
        <!--RIGHT ARROW LIST AND CARD CREATE-->

    </article>
</section>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<!--<footer>-->

<!--END OF SHEET-->
    <!--<img src="../../../../logo/pictureForTabs.png" width="25%" height="25%" ALT="PC Builder" HSPACE="30">
    <br>
    <h4><FONT COLOR="white">Created and designed by Tsalmas Anastasios ©</FONT></H4>
    <br>-->
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

//RESIZE
function WindowResize() {
  var size = window.outerWidth;
  if (size <= 1340) {
    document.getElementById("goToList").style.fontSize = "25px";
  } else {
    document.getElementById("goToList").style.fontSize = "35px";
  }

  if (size <= 900) {
    document.getElementById("goToList").style.fontSize = "20px";
  }

  if (size <= 850) {
    document.getElementById("goToList").style.fontSize = "16px";
  }

  if (size <= 650) {
    document.getElementById("goToList").style.fontSize = "12px";
  }

  if (size < 550) {
    document.getElementById("goToList").style.fontSize = "10px";
  }

  var width = window.innerWidth;

  if (width <= 384) {
    document.getElementsByClassName("productCardContainer").style.display = "none";
  }
  if (width > 384) {
    document.getElementsByClassName("productCardContainer").style.display = "display";
  }
}
//RESIZE
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

</HTML>