<!DOCTYPE html>
<html>

<?php 
    
    $username = $_POST["name"];

?>

<head>
    <title>Home</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/navbar.css"/>

    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="jobs.php">Jobs</a></li>
        <li><a href="about.php">About</a></li>
        <li><a class ="right" href="profile.php"><?php echo($username)?></a></li>
    </ul>
</head>

<body>
   

    <?php
        
        echo("<h1>Welcome to the home page, $username!</h1>");
    ?>



</body>

</html> 