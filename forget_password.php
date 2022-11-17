<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Document</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="card-header bg-primary text-white text-center">
      Vous avez oublié votre mot de passe?
    </div>
     <div class="card-body">
         <div class="form-group row mb-2">
         <label for="email" class="col-md-2 col-form-label">
             Entrez votre email
         </label>
         <div class="col-md-8">
             <input type="email"
              name="email"
              class="form-control"
              placeholder="email"
              id="email" required/>
         </div>
         </div>
         <div class="form-group row mb-2">
             <label for="identifiant_personnel" class="col-md-2 col-form-label">
                Entrez votre identifiant
             </label>
             <div class="col-md-8">
                 <input type="text"
                  name="identifiant_personnel"
                  class="form-control"
                  placeholder="votre identifiant personnel"
                  id="identifiant_personnel" required/>
             </div>
             </div>
                 </div>        
          </div>
       <div class="card-footer">
        <div class="form-group row">
          <div class="offset-md-2 col-md-8">
            <button class="btn btn-outline-primary me-3" 
            type="submit" 
            name="Envoyer">RÉINITIALISER</button> 
            <a class="btn btn-outline-secondary me-3" 
            href="loginPage.php"> retour </a>     
</div>
</div>
</div>
</form>
  <?php
  $serverName = "localhost";
  $userName = "newUsers";
  $userPassword = "password"; 
  $dbName = "adfi_système";
  $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $userPassword);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST["Envoyer"])) {
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST["email"]);
    $ident = htmlspecialchars($_POST["identifiant_personnel"]);
    $findIdent = $connexion->prepare('SELECT identifiant_personnel from adminadfi where identifiant_personnel = ?');
    $findIdent->execute(array($ident));
    $findEmail = $connexion->prepare('SELECT email from adminadfi where email = ?');
    $findEmail->execute(array($email));
    if ($findIdent->rowCount() > 0 &&  $findEmail->rowCount() > 0) {
      $password = uniqid();
      echo "<p class='alert alert-success'>Salut voici votre  nouveau mot de passe 
      <strong>$password</strong></p>"; 
       $request = $connexion->prepare('UPDATE adminadfi set mot_de_passe = ? where email = ?');
       $request->execute([ $password , $_POST['email']]);
    } else {
      echo " <p class='alert alert-danger'>
      désolé l'address email ou l'identifiant saisie ne figure pas dans notre système
      </p>";
    }
    // $headers = "bineta66@gmail.com";
    // $headers .= 'Content-Type : text/plain; charset="utf-8"'." ";

    // echo $message;

    // if (mail($_POST["email"], 'Mot de passe oublié', $message, $headers)) {
    //   $request = $connexion->prepare('UPDATE adminadfi set mot_de_passe = ? where email = ?');
    //   $request->execute([$hashedPassword, $_POST['email']]);
    //   echo "mail Envoyé";
    // }   
  }
?>
</body>
</html>