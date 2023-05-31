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
	<TITLE>PC Build App-PC Builder-AMD</TITLE>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../StyleSheets/AMD/Layout.css">
  <link rel="stylesheet" href="../../StyleSheets/AMD/topnav.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--HOME PAGE STYLESHEETS-->

  <link rel="stylesheet" href="./StyleSheets/AMD/ModalBox.css">

  <link rel="stylesheet" href="../../StyleSheets/AMD/Tabs.css">
  <link rel="stylesheet" href="../../StyleSheets/AMD/ProductCards.css">
  <link rel="stylesheet" href="../../StyleSheets/Under800px.css">

  
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
      <a href="" class="active"><i class="fas fa-desktop"></i> AMD</a>
      <a href="../Pages/PCBuilderINTEL"><i class="fas fa-desktop"></i> INTEL</a>
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
  <img src="../../Pictures/AMD_logo_for_PCBuilderAMD_home.png" class="pictureAMDLogo"/>
</header>
</div>


<!--Layout-----------------------START-->
<div class="content">
<SECTION>
<article>
  <font family="Verdana"><center><p><h1><font size="6">Please select a category:</font></h1></p></center>
  <!--  ../../Pages/AMD/Internet/CPU  -->
    <input type="hidden" id="hiddenInput" name="hiddenInput" value="MOTHERBOARD">
    <center><button class="TabsBtn" onclick="internet()"><b>Internet, Office, Simple Gaming, Movies</b></button></center>
  <BR>
  <!--  ../../Pages/AMD/SimpleEdit/CPU  -->
    <!--input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="simpleEdit()"><b>Simple Edit</b></button></center>
  <BR>
  <!--  ../../Pages/AMD/ModerateGaming/CPU  -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="moderateGaming()"><b>Moderate Gaming</b></button></center>
  <BR>
  <!--  ../../Pages/AMD/Gaming1080p/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="gaming1080p()"><b>Hard Gaming in 1080p</b></button></center>
  <BR>
  <!--  ../../Pages/AMD/Gaming1440p/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="gaming1440p()"><b>Hard Gaming in 1440p</b></button></center>
  <BR>
  <!--  ../../Pages/AMD/ProfessionalUse/CPU -->
    <!--<input type="hidden" id="hiddenInput" name="hiddenInput" value="CPU">-->
    <center><button class="TabsBtn" onclick="prof()"><b>Heavy Professional Use</b></button></center>
  <BR></font>

  <script src="make-a-pc-amd.js"></script>
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