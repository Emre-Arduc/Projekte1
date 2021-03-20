<?php 
session_start() ;
$pdo = new PDO('mysql:host=localhost:3306;dbname=c0emre', 'c0emre', 'User123!') ;
if(isset($_GET['login'])) {
 $email = $_POST['email'] ;
 $password = $_POST['password'] ;  
 $statement = $pdo->prepare("SELECT * FROM Login WHERE email = :email") ;
 $result = $statement->execute(array('email' => $email)) ;
 $user = $statement->fetch() ;     
 if ($user !== false && password_verify($password, $user['password'])) {
  $_SESSION['userid'] = $user['id'] ;
  die('Hier geht es zur <a href="index.php">Homepage</a>') ;
  } else {
  $errorMessage = "E-Mail oder Passwort war ungültig<br>" ;
  }
 }
?>
<?php
 ini_set('display_errors', 'on') ;
 error_reporting(E_ALL) ;
?>
<!DOCTYPE html> 
<html> 
<head>
 <style>
  body {
   background-image: url( "https://hudsonpubliclibrary.org/wp-content/uploads/2019/11/Earth-Space-WS.png" ) ;
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
   overflow: hidden ;
   background: skyblue ;
   margin-top: 20px ;
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
 <title>Login</title>    
</head> 
<body>
 <?php 
 if(isset($errorMessage)) {
  echo $errorMessage;
 }
 ?>
 <div class="container">
  <form action="?login=1" method="post">
   <p>E-Mail:</p>
   <p><input type="email" size="40" maxlength="250" name="email"></p>
   <p>Dein Passwort:</p>
   <p><input type="password" size="40"  maxlength="250" name="password"></p>
   <p><input type="submit" value="Einloggen"></p>
   <p class="text-center">Noch kein Mitglied? <a href="registrierung.php">Hier Registrieren</a></p>
   </form> 
  </div>
</body>
</html>