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

    //search
    if(isset($_GET["keyword"])==true){
        $kw = mysqli_real_escape_string($database,$_GET["keyword"]);    
    }else{
        $kw="";
    }

    //queries
    
        //listings count
    $amountsql = "select count(id) from `job_listing`
    where  
        `title` like '%$kw%' or
        `description` like '%$kw%' or
        `company` like '%$kw%'
    ";
    $amount=$database->query($amountsql)->fetch_row()[0]; 
        //listings info
    $sql = "select `id`,`title`,`description`,`salary`,`company`,`url` from `job_listing`  
    where
        `title` like '%$kw%' or
        `description` like '%$kw%' or
        `company` like '%$kw%'
        limit $page_lim,3";
    
    $result=$database->query($sql) or die("Can't pull information from the database");

    //page contents
    echo("There are currently $amount job offers <br><br>");
    echo(" 
            <div style='float: left;'> 
                <form action='adminpanel.php' method='post'>
                    <input type='submit' value='Back to admin panel' class='gray_button'>
                </form>
            </div>

            <div style='float: right;'> 
                <form action='jobs.php' method='post'>
                    <input type='submit' value='Back to user side' class='gray_button'>
                </form>
            </div><br><br><hr><br>

            <div style='float:left;'>
                <form action='editpage.php' method='get' class='myform'>
                    Keyword: <input type='text' name='keyword' class='txt'>
                    <input type='submit' value='Search' class='gray_button'>
                </form>
            </div>
      ");
      echo("<div>");
    if($amount>$page_lim+3){
        echo("
            <div style='float:right;'>
                <form action='editpage.php' method='get' class='myform'>
                    <input type='hidden' name='keyword' id='keyword' value=$kw>
                    <input type='hidden' name='page' id='page' value=$next>
                    <input type='submit' value='>>' class='gray_button'>
                </form>
            </div>  
        ");
    }
    if($page!=1){
        echo("
            <div style='float:right;'>
                <form action='editpage.php' method='get' class='myform'>
                    <input type='hidden' name='keyword' id='keyword' value=$kw>
                    <input type='hidden' name='page' id='page' value=$prev>
                    <input type='submit' value='<<' class='gray_button'>
                </form>
            </div>
        
    ");
    }
    echo("</div><br><br><br><div style='margin-left:10px;'>Page: $page</div><br>");
    
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