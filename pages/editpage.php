<!DOCTYPE html>
<html>
<head>
    <title>Edit jobs</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/main.css"/>
</head>

<body>
   
    <h1>Job offers:</h1>
    <?php
    
    include 'connect_to_db.php';

    $sql = "select `id`,`title`,`description`,`salary`,`company` from `job_listing`";
    $result=$database->query($sql) or die("Can't pull information from the database");

    echo("There are currently $result->num_rows job listings <br><br>");
    echo(" 
      <form action='adminpanel.php' method='post'>
      <input type='submit' value='Back to admin panel'>
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
            <form action='edit.php' method='post'>
            <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
            <input type='submit' value='edit'>
            </form>
            <form action='delete.php' method='post'>
            <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
            <input type='submit' value='delete'>
            </form>
            </div><br><br>
            ");
            $counter++;
          }
      }
    
    ?>
    

</body>

</html> 