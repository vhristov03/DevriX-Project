<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/main.css"/>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="jobs.php">Jobs</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</head>

<body>
   
    <h1>Job offerings:</h1>
    <?php
    
    $dbuser = 'root';
    $dbpass = '';
    $db = 'main';
    
    $database = new mysqli('localhost',$dbuser,$dbpass,$db) or die("Can't connect to database");

    $sql = "select `title`,`description`,`salary`,`contact_mail` from `job_listing`";
    $result=$database->query($sql) or die("Can't pull information from the database");

    echo("There are currently $result->num_rows job listings <br> <a href='create_listing.php'>New offer</a> <br><hr><br>");
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo ("<div class='job'>");
          echo ($row['title']);
          echo ("<br>");
          echo ($row['description']);
          echo ("<br>");
          echo ($row['salary']);
          echo ("<br>");
          echo ($row['contact_mail']);
          echo ("</div>");
          echo ("<br>");
        }
    }
    
    ?>
    

</body>

</html> 