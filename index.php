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
	
	//This piece of code should be removed when the site is okey
	if (isset($_SESSION["username"])) {
		if ($_SESSION["username"] != "anastasios") {
			header("Location: https://pc-build-webapp.000webhostapp.com/access-denied");
		}
	} else {
		header("Location: https://pc-build-webapp.000webhostapp.com/access-denied");
	}
	//-----------------------------------------------------------
?>
<!doctype HTML>
<html lang="en">
<HEAD>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=utf-8" />
	<meta name="keywords" content="pc, pc build, pc builder, pcbuild, pcbuilder, dreamingpc, pcbuildapp, pconly, pcbuy, pc eshop, pceshop, pc build app">
	<meta name="description" content="Make your dreaming PC Build">
	<link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
	<TITLE>PC Build App</TITLE>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../StyleSheets/LayoutForHomeScreen.css">
	<link rel="stylesheet" href="../StyleSheets/TopNav.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../StyleSheets/Under800px.css">
	<link rel="stylesheet" href="../StyleSheets/carouselPhoto.css">

	<style>
		img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    		display: none;
		}
	</style>

</HEAD>

<BODY BGCOLOR="#ccc" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0">

<div id="home"></div>

<!--TopNav-->
<div id="myTopnav" class="topnav" style="z-index: 9999;">
  <a href="" class="active"><i class="fa fa-fw fa-home"></i> Home</a>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-desktop"></i> PC Builder
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/Pages/PCBuilderAMD"><i class="fas fa-desktop"></i> AMD</a>
      <a href="/Pages/PCBuilderINTEL"><i class="fas fa-desktop"></i> INTEL</a>
	  <a href="/Pages/service/index"><i class="fas fa-tools"></i> Service</a>
    </div>
  </div>
  <a href="/eshop/index" target="_blank"><i class="fas fa-cart-arrow-down"></i> e-Shop</a>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-user-friends"></i> Friends
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="friends/index" target="_blank"><i class="fas fa-user-friends"></i> Friends</a>
	  <a href="friends/chat" target="_blank"><i class="fas fa-comments"></i> Chat</a>
    </div>
  </div>
  <div class="dropdown">
	<button class="dropbtn"><i class="fas fa-lightbulb"></i> Tips
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="forum/index"><i class="fas fa-comment-alt"></i> Forum</a>
	  <a href="instructions/index"><i class="fas fa-question"></i> How to...</a>
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
      <a href="Pages/report-a-problem"><i class="fas fa-exclamation-triangle"></i> Report a problem</a>
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
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()" id="navbar-icon">&#9776;</a>
</div>
<!--TopNav-->

<div class="header">
  <header>
	<div class="desktopHeader">
		<video width="100%" poster="./logo/logo_transparent.png" oncontextmenu="return false;" id="welcomeVideo" autoplay loop>
  			<source src="./Pictures/VideoForWelcome.mp4" type="video/mp4">   	
			<p><h1>PC Build App</h1></p>
		</video>
	</div>
	<div class="mobileHeader">
		<p><h1>PC Build App</h1></p>
	</div>
  </header>
</div>

<!--Layout-----------------------START-->
<div class="content">
<SECTION>
	<article>
		<img src="./Pictures/PCBuilder.png" align="right" HSPACE="1%" class="imgForHomeScreen">
		<FONT SIZE="7"><FONT FACE="Verdana">Welcome to the <B>PC Build App</B></FONT></FONT>
		<br>
		<br>
		<BR>
		<!--<FONT FACE="Verdana"><FONT SIZE="5">Τhe <b>PC Build App</b> is a web app that helps you to create your own PC Build as you want it...with a range over 1500+ hardware pieces that can offer to you and with 42 partner shops which can help you, it offers you the best expirience in PC Build!-->
		<br>
		<br>
		<!--With our support, you can contact us to help you and to solve your problems with your PC Build!-->
		<br>
		<br>
		<!--<i>Welcome to our PC Build App family and the biggest e-shop for PC Build Hardware in the World!</i></FONT></FONT>-->
		<br><br><br><br><br><br><br><br><br><br>
		<!--PC BUILDER-->
			
		<!--PC BUILDER-->
		<!--E-SHOP-->
		
		<!--E-SHOP-->
	</article>
</section>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<footer>

	<!--END OF SHEET-->
	<img src="./logo/pictureForTabs.png" width="25%" height="25%" ALT="PC Builder" HSPACE="30">
    <br>
    <h4><FONT COLOR="white">Created and designed by Tsalmas Anastasios ©</FONT></H4>
    <br>
	<!--END OF SHEET-->

</footer>

<script>
//ΜΠΑΡΑ ΕΠΙΛΟΓΩΝ
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
	document.getElementById("navbar-icon").style.color = "#1a0033fa";
  } else {
    x.className = "topnav";
	document.getElementById("navbar-icon").style.color = "#fff";
  }
}
//ΜΠΑΡΑ ΕΠΙΛΟΓΩΝ
//DISABLE PICTURE IN PICTURE MODE
vid=document.getElementById("welcomeVideo")
vid.disablePictureInPicture = true
//DISABLE PICTURE IN PICTURE MODE
</script>
<!--Layout-----------------------END-->

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

</div>

</BODY>

</HTML>
<?php
	$conn->close();
?>