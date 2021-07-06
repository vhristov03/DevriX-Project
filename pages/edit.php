<!DOCTYPE html>
<html>
    <head>
        <title>Edit job offer</title>
        <link rel="icon" href="static/favicon.ico">
    </head>

    <body>
        <?php 
        
        $id = $_POST["id"];

        include 'connect_to_db.php';

        $sql = "select `title`,`description`,`salary`,`company` from `job_listing` where `id`=$id";
        $result=$database->query($sql) or die("Can't pull information from the database");
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $description = $row["description"];
        $salary = $row["salary"];
        $company = $row["company"];
        echo("
        <form action='edit_handling.php' method='post'>
        Title:<br><input type='text' name='title' value='$title'><br>
        Description:<br><input type='textarea' name='description' cols='15' rows='5' value='$description'><br>
        Salary:<br><input type='number' name='salary' value=$salary><br>
        Company:<br><input type='text' name='company' value='$company'><br>
        <input type='hidden' name='id' id='id' value=$id>
        <input type='submit'>
        </form>
        ");
        
        ?>
        
    
    </body>
</html>