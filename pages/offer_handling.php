<?php 
    $dbuser = 'root';
    $dbpass = '';
    $db = 'main';
    
    $database = new mysqli('localhost',$dbuser,$dbpass,$db) or die("Can't connect to database");

    $title = $_POST["title"];
    $description = $_POST["description"];
    $salary = $_POST["salary"];
    $contact_mail = $_POST["contact_mail"];

    $sql = "insert into `pending_job_listings` (`title`,`description`,`salary`,`contact_mail`) values('{$title}','{$description}',$salary,'{$contact_mail}');";
    
    $database->query($sql) or die("error");
    header('Location: '.$uri.'/pages/home.php');
?>

