<?php
include 'connect_to_db.php';
$id = $_POST['id'];

$deleterow = "delete from `job_listing` where `id`=$id";

$database->query($deleterow) or die("error");
header('Location: '.$uri.'/pages/editpage.php');

?>