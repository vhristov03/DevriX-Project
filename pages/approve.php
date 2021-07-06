<?php
include 'connect_to_db.php';

$id = $_POST['id'];
$sql = "select `title`,`description`,`salary`,`company` from `pending_job_listings` where `id` = $id";

$result = $database->query($sql) or die("Can't pull from database");
$row = $result->fetch_assoc();

$deleterow = "delete from `pending_job_listings` where `id`=$id";

$database->query($deleterow) or die("error");

$title = $row['title'];
$desc = $row['description'];
$salary = $row['salary'];
$company = $row['company'];

$insert = "insert into `job_listing`(`title`,`description`,`salary`,`company`) values('{$title}','{$desc}',$salary,'{$company}')";
$database->query($insert) or die(error_get_last());
header('Location: '.$uri.'/pages/adminpanel.php');



?>