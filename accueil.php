<?php
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include 'menu.php';?>
<?php
    if (!$_SESSION['connexion']) {
       header('location:loginPage.php?msgAdmin=admin');
     }

?>
   <h1 class="text-center mt-5">Page d'accueil </h1> 
   <div class="text-center text-primary">
       <a href="admin.php">Aller à la page admin du site</a>
   </div>
   <div class="rounded mx-auto d-block mt-2 d-flex" style="width:1024px;height:1024px;">
       <img src="https://m.media-amazon.com/images/I/51F6ChFu5nL._AC_SY580_.jpg"
        alt="education"/>
        <p class="ms-5">Adfi Système est une application qui permet de gerer les informations des élèves de l'établissement de manière sécuriser</p>
   </div>
</body>
</html>