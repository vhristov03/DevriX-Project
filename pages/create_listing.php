<!DOCTYPE html>
<html>
    <head>
        <title>Create new job offer</title>
        <link rel="icon" href="static/favicon.ico">
        <link rel="stylesheet" type="text/css" href="static/css/main.css"/>
    </head>

    <body>
        
        <form action="listing_handling.php" method="post" class="myform">
            <h1>Create a new job listing</h1>
            Title:<br><input type="text" name="title" class="txt"><br>
            Company:<br><input type="text" name="company" class="txt"><br>
            Salary:<br><input type="number" name="salary" class="txt"><br>
            Description:<br><textarea  name="description" class="txtarea"></textarea><br>
            <input type="submit">
        </form>
    
    </body>
</html>