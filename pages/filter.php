<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/main.css"/>

    <ul>
        <li><a class="active" href="jobs.php">Jobs</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</head>

<body>
   
    <h1>Job offers:</h1>
    <?php
    
    include 'connect_to_db.php';

    $kw = $_GET["keyword"];
    $sql = "select `title`,`description`,`salary`,`company`,`url` from `job_listing`
    where
        `title` like '%$kw%' or
        `description` like '%$kw%' or
        `company` like '%$kw%';";
    $result=$database->query($sql) or die("Can't pull information from the database");
    echo(" $result->num_rows matching job offer <br><br> <a href='create_listing.php' class='gray_button'>New offer</a> <br><hr>");
    echo("
        <form action='filter.php' method='get' class='myform'>
        Keyword: <input type='text' name='keyword' class='txt'>
        <input type='submit' value='Search' class='gray_button'>
        </form><br><br>
    ");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $url = $row["url"];
          echo ("<div class='job'>");
          echo ($row['title'] . " at " . "<a href=$url target='_blank' rel='noopener noreferrer'>" . $row['company'] . "</a><br><hr>");
          echo ("Description: " . $row['description'] . "<br><br>");
          echo ("Salary: " . $row['salary'] . " $" . "<br>");
          echo ("</div><br><br>");      
        }
    }
    
    ?>
    

</body>

</html> 