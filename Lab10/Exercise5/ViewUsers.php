<style> <?php include '../style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m183m438", "oogh3Ahx", "m183m438");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error); exit();
    }
    echo "<table style='border: 1px white, width: 100%'>";
    echo "<tr>";
    echo "<td style='border: 1px white'>" . "USERS: " . "</td>";
    echo "</tr>";
    $query = "SELECT user_id from Users";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    $mysqli->close();
?>
