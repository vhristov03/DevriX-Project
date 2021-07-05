# DevriX-Project

How to build the project (Windows):
1. Download and install XAMPP : https://www.apachefriends.org/index.html
2. Go to XAMPP/htdocs and open the index.php file
3. Replace line 8 : 	header('Location: '.$uri.'/pages/home.php');
4. Run XAMPP as an administrator
5. Start the apache web server and MYSQL
6. Click on MYSQL -> Admin
7. Copy and paste the setupquery.sql file from the repo in the SQL tab
