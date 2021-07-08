<?php 
    include 'connect_to_db.php';

    $name = mysqli_real_escape_string($database,$_POST["name"]);
    $password = $_POST["password"];
    $password = hash("sha256", $password, false);

    $sql = "select `username`,`password_hash` from `user`
            where `username` = '{$name}';";

    $result=$database->query($sql) or die("Can't pull information from the database");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row["password_hash"]===$password){
            echo("Login successful");
            header('Location: '.$uri.'/pages/adminpanel.php');
        }else{
            echo("Wrong password");
        }
    }else{
        echo("No such user found");
    }
    
?>
