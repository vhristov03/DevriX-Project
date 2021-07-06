<?php
include 'connect_to_db.php';
$id = $_POST['id'];

$deleterow = "delete from `pending_job_listings` where `id`=$id";

$database->query($deleterow) or die("error");
header('Location: '.$uri.'/pages/adminpanel.php');

?>