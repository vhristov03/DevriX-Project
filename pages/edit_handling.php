<?php 
    include 'connect_to_db.php';
    
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $salary = $_POST["salary"];
    $company = $_POST["company"];

    $sql = "update `job_listing` 
    set
        `title`= '{$title}',
        `description`= '{$description}',
        `salary`= '{$salary}',
        `company`= '{$company}'
    where
        `id`=$id;";
    
    $database->query($sql) or die("error");
    header('Location: '.$uri.'/pages/editpage.php');
?>
