<?php
include 'connect_to_db.php';

$id = $_POST['id'];
$sql = "select `title`,`description`,`salary`,`company`,`url` from `pending_job_listings` where `id` = $id";

$result = $database->query($sql) or die("Can't pull from database");
$row = $result->fetch_assoc();

$deleterow = "delete from `pending_job_listings` where `id`=$id";

$database->query($deleterow) or die("error");

$title = $row['title'];
$desc = $row['description'];
$salary = $row['salary'];
$company = $row['company'];
$url = $row['url'];

$insert = "insert into `job_listing`(`title`,`description`,`salary`,`company`,`url`) values('{$title}','{$desc}',$salary,'{$company}','{$url}')";
$database->query($insert) or die(error_get_last());
header('Location: '.$uri.'/pages/adminpanel.php');



?>