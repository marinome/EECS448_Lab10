<style> <?php include '../style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m183m438", "Ethan'sPeach4", "m183m438");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];
    $post = $_POST["post"];

    if ($post == ""){
        echo "Post was not created because the post was empty.";
        exit();
    }

    $query = "SELECT user_id from Users";
    $result = $mysqli->query($query);

    $found = FALSE;
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["user_id"] == $user){
                $found = TRUE;
            }
        }
    }
    if (!$found){
        echo "Post was not created because the user_id was not found.";
        exit();
    }

    $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user .  "')";
    if ($result = $mysqli->query($query)){
        echo "Post created successfully";
    }
    else{
        echo "User was not created because some unforseen error happened.";
    }

    $mysqli->close();
?>
