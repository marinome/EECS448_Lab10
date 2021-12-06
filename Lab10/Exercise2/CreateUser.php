<style> <?php include '../style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m183m438", "oogh3Ahx", "m183m438");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error); exit();
    }
    $user = $_POST["user_id"]; //variable
    if($user == ""){
        echo "New user not stored because text field is empty.";
        exit();
    }
    $query = "INSERT INTO Users (user_id) VALUES ('" . $user . "');";
    if($result = $mysqli->query($query)){
        echo "New user successfully stored in database.";
    }
    else{
        echo "User '" . $user . "' already exists.";
    }
    $mysqli->close();
?>
