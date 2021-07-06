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

    $sql = "select `id`,`title`,`description`,`salary`,`company`,`url` from `job_listing`";
    $result=$database->query($sql) or die("Can't pull information from the database");

    echo("There are currently $result->num_rows job listings <br><br>");
    echo(" 
      <form action='adminpanel.php' method='post'>
      <input type='submit' value='Back to admin panel' class='gray_button'>
      </form><br><hr><br>
      ");
    
      $counter = 0;
      $indexarr = array();
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $indexarr[$counter] = $row["id"];
            echo ("<div class='job'>");
            echo ($row['title'] . " at " . $row['company'] . "<br>");
            echo ("URL: " . $row['url'] . "<br><hr>");
            echo ("Description: " . $row['description'] . "<br><br>");
            echo ("Salary: " . $row['salary'] . " $" . "<br><hr>");
            echo ("
            <div style='float: left;'>
                <form action='edit.php' method='post'>
                    <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
                    <input type='submit' value='Edit' class='button_green'>
                </form>
            </div>
            <div style='float: right;'>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
                    <input type='submit' value='Delete' class='button_red'>
                </form>
            </div><br><br>
            </div><br><br>
            ");
            $counter++;
          }
      }
    
    ?>
    

</body>

</html> 