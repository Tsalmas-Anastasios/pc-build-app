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

    

    

    if (isset($_POST["deleteOrder"]) and isset($_POST["codeOrder"])) {
        if ($_POST["deleteOrder"] == "delete") {
            $code = $_POST["codeOrder"];
            $sql = "UPDATE Orders SET order_condition='Deleted' WHERE number='$code'";
            if ($conn->query($sql) === TRUE) {
                //THIS ORDER HAD BEEN UPDATED WITH CONDITION=DELETED
                unset($_POST);
            } else {
                echo 'An unexpected server error occured! Please try again later!';
                exit();
            }
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../logo/pictureForTabs.png" />	<!--Icon στην tab στον browser-->
        <TITLE>PC Build App-Account Dashboard-Orders</TITLE>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="style/main.css">
<link rel="stylesheet" href="style/error-message.css">
        <link rel="stylesheet" href="style/orders/cards.css">
        <script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>

        <style>
            img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
                display: none;
            }

            body {
                background-color: #f3f3f3;
            }
        </style>
    </head>

    <body LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="0" BOTTOMMARGIN="0">
        <div class="main">
            <!--
                ICONS FOR SITUATIONS:
                    FOUR CONDITIONS FOR ORDERS:
                    1. PLACED		Icon: <i class="fas fa-location-arrow"></i>
                    2. SAVED		Icon: <i class="fas fa-bookmark"></i>
                    3. DELETED		Icon: <i class="fas fa-trash"></i>
                    4. COMPLETED	Icon: <i class="fas fa-check-circle"></i>
            -->

            <!--CREATE INFO CARDS-->
            <?php
                $username = $_SESSION["username"];
                $email = $_SESSION["email"];

                $sql = "SELECT * FROM Orders WHERE username='$username' AND email='$email' AND order_condition='Saved'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $number_row = 0;
                    while($row = $result->fetch_assoc()) {
                        $number_row++;
                        ?>
                        <form action="" method="post" name="orderCard<?php echo $number_row; ?>">
                            <input type="hidden" id="delete<?php echo $number_row; ?>" name="delete<?php echo $number_row; ?>" value="">
                            <input type="hidden" id="code<?php echo $number_row; ?>" name="code<?php echo $number_row; ?>" value="<?php echo $row["number"]; ?>">
                            <center><div class="order-card">
                                <table class="table-structure">
                                    <tr>
                                        <td class="image-td">
                                            <div class="image-area">
                                                <img src="http://pc-build-webapp.000webhostapp.com/logo/pictureForTabs.png" alt="Logo" class="image">
                                            </div>
                                        </td>
                            
                                        <td>
                                            <div class="button-area">
                                                <button type="button" class="see-more" onclick="see_more<?php echo $number_row; ?>()">See more</button><br>
                                                <?php
                                                    if ($row["order_condition"] != "Deleted") {
                                                        echo '<button class="see-more" onclick="delete_fun<?php echo $number_row; ?>()">Close Order</button>';
                                                    }
                                                ?>
                                                
                                            </div>
                            
                                            <div class="order-condition">
                                                <?php
                                                    echo '<div class="text saved">
                                                        <i class="fas fa-bookmark"></i>'. $row["order_condition"]. '
                                                    </div>';
                                                ?>
                                            </div>
                                            <div class="order-address">
                                                <div class="title">
                                                    Order address
                                                </div>
                                                <div class="text">
                                                    <?php echo $row["address"]; ?>
                                                </div>
                                            </div>
                                            <div class="other-informations-div">
                                                <div class="order-date">
                                                    <div class="title">
                                                        Ordering date
                                                    </div>
                                                    <div class="text">
                                                        25/12/2023 5:08 mm
                                                        <?php echo $row["date"]; ?>
                                                    </div>
                                                </div>
                                                <div class="order-number">
                                                    <div class="title">
                                                        Order number
                                                    </div>
                                                    <div class="text">
                                                        <?php echo $row["number"]; ?>
                                                    </div>
                                                </div>
                                                <div class="order-total">
                                                    <div class="title">
                                                        Order total
                                                    </div>
                                                    <div class="text">
                                                        <?php echo $row["total"]; ?>
                                                    </div>
                                                </div>                      
                                            </div>               
                                        </td>
                                    </tr>
                                </table>
                                
                                <!--FOR OTHER INFORMATIONS-->
                                <div class="informations" id="informations<?php echo $number_row; ?>" style="display: none">
                                    <hr>
                                    <?php
                                        $order_number = $row["order_number"];
                                        $sql2 = "SELECT * FROM Order_products WHERE number='$order_number'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            echo '<div class="products">
                                                <table width=100% class="table-products">
                                                    <tr class="title">
                                                        <th>Product</th>
                                                        <th>Product code</th>
                                                        <th>Price</th>
                                                    </tr>';
                                                while($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row2["product"]; ?></td>
                                                        <td><?php echo $row2["product_code"]; ?></td>
                                                        <td><?php echo $row2["price"]; ?></td>
                                                    <tr>
                                                    
                                                    <tr class="blank-tr">
                                                        <td></td>
                                                    </tr>
                                                <?php
                                                }
                                                echo '</table>
                                            </div>';
                                        }
                                    ?> 
                                    
                                    <div class="pay">
                                        <div class="title">
                                            Payment way
                                        </div>
                                        <div class="text">
                                            <?php echo $row["payment"]; ?>
                                        </div>
                                    </div>
                                    <div id="br-before-table"><br></div>
                                    <table class="table-total">
                                        <tr class="prod-cost">
                                            <td class="title">Product value</td>
                                            <td class="text"><?php echo $row["product_value"]; ?></td>
                                        </tr>
                                        <tr class="transfer-cost">
                                            <td class="title">Transportation</td>
                                            <td class="text"><?php echo $row["transportation"]; ?></td>
                                        </tr>
                                        <tr class="total-cost">
                                            <td class="title">Total cost</td>
                                            <td class="text"><?php echo $row["total"]; ?></td>
                                        </tr>
                                    </table>
                                    <div id="br-after-table"><br><br></div>
                                </div>
                                <!--FOR OTHER INFORMATIONS-->
                            </div></center>
                        </form>

                        <script>
                            function see_more<?php echo $number_row; ?>() {
                                document.getElementById("informations<?php echo $number_row; ?>").style.display = "block";
                            }
                            <?php
                                if ($row["order_condition"] != "Deleted") {
                                    echo 'function delete_fun<?php echo $number_row; ?>() {
                                        document.getElementById("delete<?php echo $number_row; ?>").value = "delete";
                                        document.getElementById("delete<?php echo $number_row; ?>").setAttribute("name", "deleteOrder");
                                        document.getElementById("code<?php echo $number_row; ?>").setAttribute("name", "codeOrder");
                                    }';
                                }
                            ?>
                            
                        </script>
                    <?php
                    }
                } else {
                    //NO ORDERS HERE
                    echo '<div class="main-panel-dashboard" style="margin-top: 60px;">
                        <img src="http://pc-build-webapp.000webhostapp.com/logo/pictureForTabs.png" alt="No results" class="main-panel-dashboard-img">
                        <center><div class="main-panel-dashboard-message">'.
                           "We don't have any order from you in our system!" 
                        . '</div></center>
                    </div>';
                }
            ?>
            <!--CREATE INFO CARDS-->
        </div>
    </body>
</html>

<?php
    $conn->close();
?>