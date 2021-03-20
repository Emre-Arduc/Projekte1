<?php 
 session_start() ;
 $pdo = new PDO('mysql:host=localhost:3306;dbname=c0emre', 'c0emre', 'User123!') ;
 ?>
<?php
 ini_set( 'display_errors', 'on' );
 error_reporting( E_ALL );
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
  <title>Registrierung</title>    
 </head> 
<body>
<?php
 $showFormular = true ;
 if(isset($_GET['register'])) {
  $error = false ;
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
  $password2 = $_POST['password2'] ; 
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>' ;
   $error = true ;
   }     
  if(strlen($password) == 0) {
   echo 'Bitte ein Passwort angeben<br>' ;
   $error = true ;
   }
  if($password != $password2) {
   echo 'Die Passwörter müssen übereinstimmen<br>' ;
   $error = true ;
   }    
  if(!$error) { 
   $statement = $pdo->prepare("SELECT * FROM Login WHERE email = :email") ;
   $result = $statement->execute(array('email' => $email)) ;
   $user = $statement->fetch() ;       
  if($user !== false) {
   echo 'Diese E-Mail-Adresse ist bereits vergeben<br>' ;
   $error = true ;
   }    
  }
  if(!$error) {    
   $password_hash = password_hash($password, PASSWORD_DEFAULT);
   $statement = $pdo->prepare( "INSERT INTO Login (email, password) VALUES (:email, :password)") ;
   $result = $statement->execute(array('email' => $email, 'password' => $password_hash)) ;
  if($result) {        
   echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>' ;
   $showFormular = false;
   } else {
   echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>' ;
   }
 } 
}
 
if($showFormular) {
?>
 <div class="container">
  <form action="?register=1" method="post">
   <p>E-Mail:</p>
   <p><input type="email" size="40" maxlength="250" name="email"></p> 
   <p>Dein Passwort</p>
   <p><input type="password" size="40"  maxlength="250" name="password"></p>
   <p>Passwort wiederholen:</p>
   <p><input type="password" size="40" maxlength="250" name="password2"></p>
   <p><input type="submit" value="Registrieren"></p>
   <p class="text-center">Bereits Mitglied? <a href="login.php">Hier Anmelden</a></p>
   </form>
  </div>
 <?php
}
?>
</body>
</html>