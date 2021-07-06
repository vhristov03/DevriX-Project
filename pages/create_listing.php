<!DOCTYPE html>
<html>
    <head>
        <title>Create new job offer</title>
        <link rel="icon" href="static/favicon.ico">
    </head>

    <body>

        <form action="listing_handling.php" method="post">
            Title:<br><input type="text" name="title"><br>
            Description:<br><input type="textarea" name="description" cols=15 rows=5><br>
            Salary:<br><input type="number" name="salary"><br>
            Company:<br><input type="text" name="company"><br>
            <input type="submit">
        </form>
    
    </body>
</html>