<?php
    if (isset($_POST["username"])) {
        //CONNECT WITH DATABASE
        $servername = "localhost";
        $name = "id16559427_products_user";
        $password = "o9n*65%Wy7(!f1VQ";
        $dbname = "id16559427_products";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection with databse failed: " . $conn->connect_error);
        }
        
        $name = $_POST["username"];
        echo '<div class="people">People</div>';

        if (filter_var($name, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM Accounts WHERE email LIKE '%$name%' AND activate='DONE'";
        } else {
            $sql = "SELECT * FROM Accounts WHERE username LIKE '%$name%' AND activate='DONE'";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                if ($i <= 8) {
                    if ($i == 1) {
                        $i++;
                        echo '<a class="list-options start">'. $row["username"]. '</a>';
                    } else {
                        $i++;
                        echo '<a class="list-options">'. $row["username"]. '</a>';
                    }
                }
            }
        }
    }
?>