<?php
session_start() ;
$pdo = new PDO('mysql:host=localhost:3306;dbname=c0emre', 'c0emre', 'User123!') ;
if(!isset($_SESSION['userid'])) {
    die('<a href="login.php">Bitte loggen Sie sich zuerst ein.</a>') ;
}
$userid = $_SESSION['userid'] ;
$email = $_SESSION['email'] ;
echo " ".$userid ;
?>
<?php
ini_set('display_errors', 'on') ;
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
  body {
   background-image: url( "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Tiananmen_Square%2C_Beijing%2C_China_1988_%281%29.jpg/1200px-Tiananmen_Square%2C_Beijing%2C_China_1988_%281%29.jpg" ) ;
   background-size: cover ;
   font-family: 'Open Sans' , sans-serif ;
   display: flex ;
   align-items: center ;
   justify-content: center ;
   min-height: 100vh ;
   margin: auto ;
   }
  .section {
   background-size: cover ;
   width: 100% ;
   height: 100% ;
   position: bottom ;
   overflow: hidden ;
   }
  .container {
   width: 90% ;
   margin: auto ;
   position: center ;
   overflow: hidden ;
   background: skyblue ;
   margin-top: 80px ;
   border-radius: 5px ;
   text-align: center ;
   background-color: skyblue ;
   border: 2px solid skyblue ;
   border-radius: 10px ;
   color: black ;
   display: block ;
   font-family: inherit ;
   font-size: 16px ;
   padding: 10px ;
   margin-top: 20px ;
   width: 400px ;
   max-width: 100% ;
   z-index:1 ;
   }
  .form {
   padding: 30px 40px ;
   }
  </style>
<title>Homepage</title>
</head>
 <body>
 <section>
  <div class="snow1"></div>
  </section>
 <embed src="/reg/pValid/hk97.mp3" loop="true" autostart="true" width="2" height="0">
  <div class="container">
   Herzlichen Glückwunsch<?php echo " ".$email?>! Sie sind eingeloggt. 
   <p class="text-center"><a href="login.php">Ausloggen</a></p>
   </div>
 </body>
</html>