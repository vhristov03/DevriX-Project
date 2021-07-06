<!DOCTYPE html>
<html>
    <head>
        <title>Edit job offer</title>
        <link rel="icon" href="static/favicon.ico">
        <link rel="stylesheet" type="text/css" href="static/css/main.css"/>
    </head>

    <body>
        <?php 
        
        $id = $_POST["id"];

        include 'connect_to_db.php';

        $sql = "select `title`,`description`,`salary`,`company`,`url` from `job_listing` where `id`=$id";
        $result=$database->query($sql) or die("Can't pull information from the database");
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $description = $row["description"];
        $salary = $row["salary"];
        $company = $row["company"];
        $url = $row["url"];
        echo("
        <form action='edit_handling.php' method='post' class='myform'>
        <h1>Edit job listing</h1>
        Title:<br><input type='text' name='title' value='$title' class='txt'><br>
        Company:<br><input type='text' name='company' value='$company' class='txt'><br>
        Salary:<br><input type='number' name='salary' value=$salary class='txt'><br>
        Description:<br><textarea type='textarea' name='description' class='txtarea'>$description</textarea><br>
        URL:<br><input type='text' name='url' value='$url' class='txt'><br><br>
        <input type='hidden' name='id' id='id' value=$id>
        <input type='submit' class='gray_button'>
        </form>
        ");
        
        ?>
        
    
    </body>
</html>