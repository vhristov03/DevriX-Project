<?php 
    include 'connect_to_db.php';

    $title = $_POST["title"];
    $description = $_POST["description"];
    $salary = $_POST["salary"];
    $company = $_POST["company"];

    $sql = "insert into `pending_job_listings` (`title`,`description`,`salary`,`company`) values('{$title}','{$description}',$salary,'{$company}');";
    
    $database->query($sql) or die("error");
    header('Location: '.$uri.'/pages/home.php');
?>

