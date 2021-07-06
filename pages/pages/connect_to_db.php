<?php
$user = 'root';
$pass = '';
$db = 'main';

$database = new mysqli('localhost',$user,$pass,$db) or die("Can't connect to database");
?>