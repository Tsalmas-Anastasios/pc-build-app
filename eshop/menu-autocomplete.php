<?php
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

    if (isset($_POST["query"])) {
        $inpText = $_POST["query"];
        $explode = explode(' ', $inpText);
        $inpText = "";
        foreach($explode as $explode) {
            $inpText .= $explode;
        }
        $sql = "SELECT * FROM All_products WHERE Description LIKE '%$inpText%'";
        $result = $conn->query($sql);
        if ($inpText == "") {
            //NOT NOT NOT
        } elseif ($result->num_rows > 0) {
            echo '<div class="title">Products</div>';
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                if ($i <= 9) {
                    echo '<a onclick="goAhead'. $i. '()">'. $row["Brand"]. ' '. $row["Model"]. '</a>
                    <input type="hidden" id="prod'. $i. '" name="nameProd'. $i. '" value="'. $row["Brand"]. ' '. $row["Model"]. '">';
                    echo '<script>
                        function goAhead'. $i. '() {
                            var submitForm = document.getElementsByName("searcher");
                            submitForm[0].submit();
                        }
                    </script>';
                }
            }
        } else {
            echo '<div style="padding-left: 23px;padding-right: 23px;padding-top: 7px;padding-bottom: 7px;">
                <i class="fas fa-times-circle"></i> No products
            </div>';
        }
    }

    $conn->close();
?>