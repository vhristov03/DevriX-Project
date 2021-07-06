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
   
    <h1>Job offers:</h1>
    <?php
    
    include 'connect_to_db.php';

    $sql = "select `title`,`description`,`salary`,`company` from `job_listing`";
    $result=$database->query($sql) or die("Can't pull information from the database");

    echo("There are currently $result->num_rows job listings <br> <a href='create_listing.php'>New offer</a> <br><hr>");
    echo("
        <form action='filter.php' method='get'>
        Keyword:<input type='text' name='keyword'>
        <input type='submit' value='search'>
        </form><br>
    ");

    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        
          echo ("<div class='job'>");
          echo ($row['title'] . " at " . $row['company'] . "<br><hr>");
          echo ("Description: " . $row['description'] . "<br><br>");
          echo ("Salary: " . $row['salary'] . " $" . "<br>");
          echo ("</div><br><br>");      
        }
    }
    
    ?>
    

</body>

</html> 