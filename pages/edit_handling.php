<?php 
    include 'connect_to_db.php';

    $id = $_POST["id"];
    $title = mysqli_real_escape_string($database, $_POST["title"]);
    $description = mysqli_real_escape_string($database, $_POST["description"]);
    $salary = mysqli_real_escape_string($database, $_POST["salary"]);
    $company = mysqli_real_escape_string($database, $_POST["company"]);
    $url = mysqli_real_escape_string($database, $_POST["url"]);

    $sql = "update `job_listing` 
    set
        `title`= '{$title}',
        `description`= '{$description}',
        `salary`= '{$salary}',
        `company`= '{$company}',
        `url`='{$url}'
    where
        `id`=$id;";
    
    $database->query($sql) or die(error_get_last());
    header('Location: '.$uri.'/pages/editpage.php');
?>
