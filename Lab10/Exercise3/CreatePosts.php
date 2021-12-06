<style> <?php include '../style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m183m438", "oogh3Ahx", "m183m438");
    if ($mysqli->connect_error){
        printf("Connect: failed %s\n", $mysqli->connect_error); exit();
    }
    $user = $_POST["user_id"];
    $post = $_POST["post"];
    if ($post == ""){
        echo "Post not saved because post has no text.";
        exit();
    }
    $query = "SELECT user_id from Users";
    $result = $mysqli->query($query);
    $found = FALSE;
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["user_id"] == $user){
                $found = TRUE;
            }
        }
    }
    if(!$found){
        echo "Post not saved because the username doesn't exist.";
        exit();
    }

    $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user .  "')";
    if($result = $mysqli->query($query)){
        echo "Post saved.";
    }
    else{
        echo "Post not saved.";
    }

    $mysqli->close();
?>
