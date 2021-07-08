<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PANEL</title>
    <link rel="icon" href="static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="static/css/main.css"/>
</head>

<body>
   
    <h1>Pending job listings:</h1>
    <?php
    //pagination
    if(isset($_GET["page"])==true){
        $page = $_GET["page"];
        if($page < 1){
            $page = 1;
        }
    }else{
        $page = 1;
    }
    $prev = $page-1;
    $next = $page+1;
    $page_lim = $prev*3;

    //database stuff
    include 'connect_to_db.php';

    $amountsql = "select count(id) from `pending_job_listings`";
    $amount=$database->query($amountsql)->fetch_row()[0]; 

    $sql = "select `id`,`title`,`description`,`salary`,`company`,`url` from `pending_job_listings` limit $page_lim,3";
    $result=$database->query($sql) or die("Can't pull information from the database");

    //Page contents
    echo("There are currently $amount pending job listings<br><br>");
    echo(" 
    <div style='float: left;'> 
        <form action='editpage.php' method='post'>
            <input type='submit' value='Edit existing job offers' class='gray_button'>
        </form>
    </div>
    <div style='float: right;'> 
        <form action='jobs.php' method='post'>
            <input type='submit' value='Back to user side' class='gray_button'>
        </form>
    </div>
    <br><br><hr><br>
      ");
    //pagination
    if($amount>$page_lim+3){
        echo("
        <div>
            <div style='float:right;'>
                <form action='adminpanel.php' method='get' class='myform'>
                    <input type='hidden' name='page' id='page' value=$next>
                    <input type='submit' value='>>' class='gray_button'>
            </form>
        </div>  
        ");
    }
    if($page!=1){
        echo("
            <div style='float:right;'>
                <form action='adminpanel.php' method='get' class='myform'>
                    <input type='hidden' name='page' id='page' value=$prev>
                    <input type='submit' value='<<' class='gray_button'>
                </form>
            </div>
        </div>
    ");
    }
    
    
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