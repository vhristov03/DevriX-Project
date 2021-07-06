<?php 
    include 'connect_to_db.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $password = hash("sha256", $password, false);

    $sql = "insert into `user` (`username`,`email`,`password_hash`) values('{$name}','{$email}','{$password}');";
    
    $database->query($sql) or die("error");
    header('Location: '.$uri.'/pages/home.php');
?>

