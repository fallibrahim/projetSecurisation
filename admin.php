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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
  #font {
    background-color:#fffffff5;
  }
</style>
</head>
<body id="font">
<?php
    if($_SESSION['connexion'] == false)
     {
       header('location:loginPage.php?msgAdmin=admin');
     } 
     ?>
<?php include 'menu.php'?>
<div class="container-fluid">
<h1 class="text-center mt-5">Bienvenue à la page administration du Site</h1>
<hr>
<?php
 if (isset($_GET['mod'])) {
  echo "<p class='alert alert-success alert-dismissible fade show' role='alert'>
  mise à jour effectuée avec success
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </p>";
 }
 if (isset($_GET['add'])) {
  echo "<p class='alert alert-success alert-dismissible fade show' role='alert'>
  insertion effectuée avec success
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </p>";
 }
 if (isset($_GET['sup'])) {
    echo "<p class='alert alert-success alert-dismissible fade show' role='alert'>
    suppression effectuée avec success
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
    </p>";
 }
?>
<div class="float-end me-5">
<a class="btn btn-primary d-flex" href="ajouter.php"><span class="material-symbols-outlined me-2">
person_add
</span>Inscrire un nouveau élève</a><br>
</div>
<?php 
  $serverName = "localhost";
  $userName = "newUsers";
  $password = "password";
  $dbName = "adfi_système";
  try {
      $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $request = $connexion->prepare('SELECT * from eleves');
      $request->execute();
      $data = $request->fetchAll();
  } 
  catch(PDOException $e) {
    echo "Error : ". $e->getMessage();
  }

  $connexion = null;
  $result = $data;
?>
<table class="table caption-top table-hover">
  <caption class="text-center text-primary" id="liste">Liste  des élèves de l'établissement</caption>
  <thead>
    <tr>
      <th scope="col">Prénom</th>
      <th scope="col">nom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">lieu de naissance</th>
      <th scope="col">Address</th>
      <th scope="col">Supprimer</th>
      <th scope="col">Modifier</th>
      <th scope="col">Détail</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($result as $getData): ?>
    <tr>
      <td><?= $getData['prenoms']?></td>
      <td><?= $getData['Noms']?></td>
      <td><?= $getData['Date_de_naissance']?></td>
      <td><?= $getData['Lieu_de_naissance']?></td>
      <td><?= $getData['adress']?></td>
      <td><a class="btn btn-outline-danger" href="supprimer.php?id=<?=$getData['id']?>"
      onClick="return confirm('Voulez vous vraiment supprimer l\'eleve <?=$getData['prenoms']?> <?=$getData['Noms']?>')">
      <span class="material-symbols-outlined">
         delete
      </span>
      </a></td>
      <td><a class="btn btn-primary" href="modifier.php?id=<?= $getData['id']?>">
      <span class="material-symbols-outlined">
         edit
      </span>
      </a></td>
      <td><a class="btn btn-outline-primary" href="detail.php?id=<?= $getData['id'] ?>"><span class="material-symbols-outlined">
        arrow_forward_ios
      </span></a></td>
      </tr>
      <?php endforeach ?>
  </tbody>
</table>
</div>
</body>
</html>
