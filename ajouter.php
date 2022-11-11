<?php
  session_start();   
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<?php include 'menu.php';?>
<?php
    if($_SESSION['connexion'] == false)
     {
       header('location:loginPage.php?msgAdmin=admin');
     } 
     ?>
<div class="card mt-5">
<?php 
  $prenom = "";
 $nom = "";
 $dateN = null;
 $lieuN = "";
 $adress = "";
 $response = "";
  if (isset($_POST['enregistrer'])) {
    $prenom .= $_POST["prenom"];
    $nom .= $_POST["nom"];
    $dateN .= $_POST["dateN"];
    $lieuN .= $_POST["lieuN"];
     $adress .= $_POST["address"];
     

    $serverName = "localhost";
    $userName = "newUsers";
    $password = "password";
    $dbName = "adfi_système";

    $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connexion->prepare('INSERT into eleves (prenoms,Noms,Date_de_naissance,Lieu_de_naissance,adress)
    values (:prenoms,:noms,:Date_de_naissance,:Lieu_de_naissance,:adress)');
    $request->bindValue(":prenoms", $prenom, PDO::PARAM_STR);
    $request->bindValue(":noms", $nom, PDO::PARAM_STR);
    $request->bindValue(":Date_de_naissance", $dateN, PDO::PARAM_STR);
    $request->bindValue(":Lieu_de_naissance", $lieuN, PDO::PARAM_STR);
    $request->bindValue(":adress", $adress, PDO::PARAM_STR);
    $request->execute();
       header('location:admin.php?add=ajout');
  }
 
?>
    
    <div class="card-header text-white text-center bg-primary">
    <h3><span class="material-symbols-outlined me-2">person</span>ajouter un nouveau élève</h3>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="card-body">
         <div class="form-group row mb-2">
         <label for="prenom" class="col-md-2 col-form-label">
             prenom de l'élève
         </label>
         <div class="col-md-8">
             <input type="text"
              name="prenom"
              class="form-control"
              placeholder="prenom(obligatoire)"
              id="prenom" required/>
         </div>
         </div>
         <div class="form-group row mb-2">
             <label for="nom" class="col-md-2 col-form-label">
                nom de l'élève
             </label>
             <div class="col-md-8">
                 <input type="text"
                  name="nom"
                  class="form-control"
                  placeholder="nom(obligatoire)"
                  id="nom" required/>
             </div>
             </div>
                 </div>
                    <div class="form-group row mb-2">
                        <label for="dateN" class="col-md-2 col-form-label ms-3">
                            Date de naissance
                        </label>
                        <div class="col-md-8">
                        <input type="date"
                          name="dateN"
                          class="form-control"
                          placeholder="date de naissance(obligatoire)"
                          id="dateN" required/>
                    </div>
                </div>      
                    <div class="form-group row mb-2">
                        <label for="lieuN" class="col-md-2 col-form-label ms-3">
                            Lieu de naissance
                        </label>
                        <div class="col-md-8">
                        <input type="text"
                          name="lieuN"
                          class="form-control"
                          placeholder="lieu de naissance(obligatoire)"
                          id="lieuN" required/>
                    </div>
                </div>      
                    <div class="form-group row mb-2">
                        <label for="address" class="col-md-2 col-form-label ms-3">
                            Address
                        </label>
                        <div class="col-md-8">
                        <input type="text"
                          name="address"
                          class="form-control"
                          placeholder="address(obligatoire)"
                          id="address" required/>
                    </div>
                </div>      
          </div>
       <div class="card-footer">
        <div class="form-group row">
          <div class="offset-md-2 col-md-8">
            <button class="btn btn-outline-primary me-3" 
            type="submit" 
            name="enregistrer">enregistrer</button> 
            <a class="btn btn-outline-secondary me-3" 
            href="admin.php"> annuler </a>       
</div>
</div>
</div>

</form>
</div>
