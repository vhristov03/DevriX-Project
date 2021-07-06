<?php 
    include 'connect_to_db.php';

    $id = $_POST["id"];
    $title = mysqli_real_escape_string($database, $_POST["title"]);
    $description = mysqli_real_escape_string($database, $_POST["description"]);
    $salary = mysqli_real_escape_string($database, $_POST["salary"]);
    $company = mysqli_real_escape_string($database, $_POST["company"]);
    

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
