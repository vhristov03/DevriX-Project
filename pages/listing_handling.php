<?php 
    include 'connect_to_db.php';

    $title = mysqli_real_escape_string($database, $_POST["title"]);
    $description = mysqli_real_escape_string($database, $_POST["description"]);
    $salary = mysqli_real_escape_string($database, $_POST["salary"]);
    $company = mysqli_real_escape_string($database, $_POST["company"]);

    $sql = "insert into `pending_job_listings` (`title`,`description`,`salary`,`company`) values('{$title}','{$description}',$salary,'{$company}');";
    
    $database->query($sql) or die("error");
    header('Location: '.$uri.'/pages/home.php');
?>

