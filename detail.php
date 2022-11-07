<?php
  session_start(); 
?>
<!doctype html>
<html lang="fr">
<head>
<title>detailPHP</title>
<meta rel="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include 'menu.php';?>
<?php
    if($_SESSION['connexion'] == false)
     {
       header('location:loginPage.php?msgAdmin=admin');
     } 
     ?>
<table class="table table-light table-striped mt-5 ">
<thead>  
<tr>
    <th>Caractéristiques</th>
    <th>Valeurs</th>
</tr>
</thead>
<tbody>
<?php 
$getIdParam = $_GET['id'];

try {

  $serverName = "localhost";
  $userName = "newUsers";
  $password = "password";
  $dbName = "adfi_système";
  $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql= $connexion->prepare('SELECT * from eleves where id = :idParam');
  $sql->bindValue(":idParam", $getIdParam);
  $sql->execute();
  $detail = $sql->fetchAll();
}
catch(PDOException $e) {
  echo "Error : ".$e->getMessage();
}

$connexion = null;
$getOneId = $detail;
?>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>ID</td>
      <td><?=$getIdData['id'] ?></td>
      <?php endforeach ?>  
    </tr>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>Prénom</td>
      <td><?=$getIdData['prenoms'] ?></td>
      <?php endforeach ?>  
    </tr>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>Nom</td>
      <td><?=$getIdData['Noms'] ?></td>
      <?php endforeach ?>  
    </tr>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>Date de Naissance</td>
      <td><?=$getIdData['Date_de_naissance'] ?></td>
      <?php endforeach ?>  
    </tr>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>Lieu de naissance</td>
      <td><?=$getIdData['Lieu_de_naissance'] ?></td>
      <?php endforeach ?>  
    </tr>
    <tr>
    <?php foreach($getOneId as $getIdData): ?>
      <td>Address</td>
      <td><?=$getIdData['adress'] ?></td>
      <?php endforeach ?>  
    </tr>
    
</tbody>
</table> 
<a class="btn btn-outline-primary d-flex ms-2 " href="admin.php" style="width:170px;">
<span class="material-symbols-outlined">
arrow_back_ios
</span>
retour à la liste
</a>
</body>
</html>