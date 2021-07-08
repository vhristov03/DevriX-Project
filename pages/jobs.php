<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>
    <?php include 'head.php' ?>
    <ul>
        <li><a class='active' href='jobs.php'>Jobs</a></li>
        <li><a href='about.php'>About</a></li>
        <li><a href='login.php' style='float:right'>Admin</a></li>
    </ul>
    
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

    //search
    if(isset($_GET["keyword"])==true){
        $kw = mysqli_real_escape_string($database,$_GET["keyword"]);    
    }else{
        $kw="";
    }
    
    $prev = $page-1;
    $next = $page+1;
    $page_lim = $prev*3;

//-----------------------------------------------------------------------------------------------
    //database stuff
    
        //listings count
    $amountsql = "select count(id) from `job_listing`
    where  
        `title` like '%$kw%' or
        `description` like '%$kw%' or
        `company` like '%$kw%'
    ";
    $amount=$database->query($amountsql)->fetch_row()[0]; 
        //listings info
    $sql = "select `title`,`description`,`salary`,`company`,`url` from `job_listing`  
    where
        `title` like '%$kw%' or
        `description` like '%$kw%' or
        `company` like '%$kw%'
        limit $page_lim,3";
    
    $result=$database->query($sql) or die("Can't pull information from the database");

//-----------------------------------------------------------------------------------------------

    //page contents
    if($kw===""){
        echo("There are currently $amount job listings <br><br>");
    }else{
        echo("There are $amount matching job listings<br><br>");
    }
    
        echo("
            <a href='create_listing.php' class='gray_button'>New offer</a> <br><hr>
            <div style='float:left;'>
                <form action='jobs.php' method='get' class='myform'>
                    Keyword: <input type='text' name='keyword' class='txt'>
                    <input type='submit' value='Search' class='gray_button'>
                </form>
            </div>  
            
        ");
        echo("<div>");
        if($amount>$page_lim+3){
        echo("
                
                    <div style='float:right;'>
                        <form action='jobs.php' method='get' class='myform'>
                            <input type='hidden' name='page' id='page' value=$next>
                            <input type='hidden' name='keyword' id='keyword' value=$kw>
                            <input type='submit' value='>>' class='gray_button'>
                        </form>
                    </div>  
            ");
        }
        if($page!=1){
        echo("
                    <div style='float:right;'>
                        <form action='jobs.php' method='get' class='myform'>
                            <input type='hidden' name='keyword' id='keyword' value=$kw>
                            <input type='hidden' name='page' id='page' value=$prev>
                            <input type='submit' value='<<' class='gray_button'>
                        </form>
                    </div>
            ");            
        }
        echo("</div><br><br><br><div style='margin-left:10px;'>Page: $page</div><br>");
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