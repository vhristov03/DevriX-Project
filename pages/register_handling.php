<?php 
    $dbuser = 'root';
    $dbpass = '';
    $db = 'main';
    
    $database = new mysqli('localhost',$dbuser,$dbpass,$db) or die("Can't connect to database");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $password = hash("sha256", $password, false);

    $sql = "insert into `user` (`username`,`email`,`password_hash`) values('{$name}','{$email}','{$password}');";
    
    $database->query($sql) or die("error");
?>

<form name="info_transfer" action="home.php" method="post">
            <br><input type="hidden" id="1" name="name" value=<?php echo htmlspecialchars($name); ?>>
</form>
<script>document.info_transfer.submit()</script>