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
          echo ($row['title'] . " at " . $row['company'] . "<br><hr>");
            echo ("Description: " . $row['description'] . "<br><br>");
            echo ("Salary: " . $row['salary'] . " $" . "<br><hr>");
          echo ("
            <div style='float: left;'> 
                    <form action='approve.php' method='post'>
                        <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
                        <input type='submit' value='Approve' class='button_green'>
                    </form>
                </div>
                <div style='float: right;'> 
                    <form action='reject.php' method='post'>
                        <input type='hidden' name='id' id='id' value=$indexarr[$counter]>
                        <input type='submit' value='Reject' class='button_red'>
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