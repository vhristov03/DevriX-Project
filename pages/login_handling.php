<?php 
    $dbuser = 'root';
    $dbpass = '';
    $db = 'main';
    
    $database = new mysqli('localhost',$dbuser,$dbpass,$db) or die("Can't connect to database");

    $name = $_POST["name"];
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
