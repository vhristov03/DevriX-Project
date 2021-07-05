<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PANEL</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/main.css"/>
</head>

<body>
   
    <h1>Pending job offerings:</h1>
    <?php
    
    $dbuser = 'root';
    $dbpass = '';
    $db = 'main';
    
    $database = new mysqli('localhost',$dbuser,$dbpass,$db) or die("Can't connect to database");

    $sql = "select `id`,`title`,`description`,`salary`,`contact_mail` from `pending_job_listings`";
    $result=$database->query($sql) or die("Can't pull information from the database");
    
    echo("There are currently $result->num_rows pending job listings <br><hr><br>");

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
          echo ("
          <form action='approve.php' method='post'>
          <input type='submit' value='approve'>
          </form>
          <form action='reject.php' method='post'>
          <input type='submit' value='reject'>
          </form>
          ");
          echo ("</div>");
          echo ("<br><br>");
          
        }
    }
    
    ?>
    

</body>

</html> 