<?php
    $servername = "localhost";
    $username = "id16559427_products_user";
    $password = "o9n*65%Wy7(!f1VQ";
    $dbname = "id16559427_products";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection with database failed: " . $conn->connect_error);
    }

    if (isset($_POST["query"])) {
        $inpText = $_POST["query"];
        $explode = explode(' ', $inpText);
        $inpText = "";
        foreach($explode as $explode) {
            $inpText .= $explode;
        }
        $sql = "SELECT * FROM Accounts WHERE username LIKE '%$inpText%' OR email LIKE '%$inpText%'";
        $result = $conn->query($sql);
        if ($inpText == "") {
            //NOT NOT NOT
        } elseif ($result->num_rows > 0) {
            echo '<div class="people" style="text-align: left;padding-top: 20px;">People</div>';
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                if ($i <= 9) {
                    echo '<a class="list-options" onclick="submitTheForm'. $i. '()">'. $row["username"]. '</a>';
                    //MAKE THE FUNCTION FOR THE FORM SUBMIT
                    ?>
                        <script>
                            function submitTheForm<?php echo $i; ?>() {
                                var sss = document.getElementsByName("search-form");
                                sss[0].submit();
                            }    
                        </script>
                    <?php
                }
            }
        } else {
            echo '<div style="width: 100%;display: block;padding-left: 20px;padding-top: 7px;padding-bottom: 7px;font-size: 15px;font-weight: bold;">
                <i class="fas fa-times-circle"></i> No users
            </div>';
        }
    }

    $conn->close();
?>