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

    
    
    include 'connect_to_db.php';

    $sql = "select `id`,`title`,`description`,`salary`,`company` from `pending_job_listings`";
    $result=$database->query($sql) or die("Can't pull information from the database");

    echo("There are currently $result->num_rows pending job listings<br><br>");
    echo(" 
      <form action='editpage.php' method='post'>
      <input type='submit' value='Edit or delete existing job offers'>
      </form><br><hr><br>
      ");
    
    
    $counter = 0;
    $indexarr = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $indexarr[$counter] = $row["id"];
          echo ("<div class='job'>");
          echo ($row['title']);
          echo ("<br>");
          echo ($row['description']);
          echo ("<br>");
          echo ($row['salary']);
          echo ("<br>");
          echo ($row['company']);
          echo ("
          <form action='approve.php' method='post'>
          <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
          <input type='submit' value='approve'>
          </form>
          <form action='reject.php' method='post'>
          <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
          <input type='submit' value='reject'>
          </form>
          </div><br><br>
          ");
          $counter++;
        }
    }
    
    ?>
    

</body>

</html> 