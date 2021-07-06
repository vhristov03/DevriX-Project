# DevriX-Project

How to build the project (Windows):
1. Download and install XAMPP : https://www.apachefriends.org/index.html 
2. Go to XAMPP/htdocs 
3. Paste the pages folder from the repo into the /htdocs folder
4. Open the index.php file
5. Replace line 8 : 	header('Location: '.$uri.'/pages/jobs.php');
6. Run XAMPP as an administrator
7. Start the apache web server and MYSQL
8. Click on MYSQL -> Admin
9. Import the main.sql file
