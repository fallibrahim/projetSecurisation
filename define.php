<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-header text-white text-center bg-primary" id="entete">
        ajouter un nouveau admin
    </div>
    <form>
    <div class="card-body">
         <div class="form-group row mb-2">
         <label for="prenom" class="col-md-2 col-form-label">
             prenom
         </label>
         <div class="col-md-8">
             <input type="text"
              class="form-control"
              placeholder="prenom(obligatoire)"
              id="prenom"/>
         </div>
         </div>
         <div class="form-group row mb-2">
             <label for="nom" class="col-md-2 col-form-label">
                nom 
             </label>
             <div class="col-md-8">
                 <input type="text"
                  class="form-control"
                  placeholder="nom(obligatoire)"
                  id="nom"/>
             </div>
             </div>
                 </div>
                    <div class="form-group row mb-2">
                        <label for="email" class="col-md-2 col-form-label ms-3">
                          Email
                        </label>
                        <div class="col-md-8">
                        <input type="email"
                          class="form-control"
                          placeholder="date de naissance(obligatoire)"
                          id="email"/>
                    </div>
                </div>      
                    <div class="form-group row mb-2">
                        <label for="lieuN" class="col-md-2 col-form-label ms-3">
                           Mot de passe
                        </label>
                        <div class="col-md-8">
                        <input type="password"
                          class="form-control"
                          placeholder="lieu de naissance(obligatoire)"
                          id="password"/>
                    </div>
                </div>      
                    <div class="form-group row mb-2">
                        <label for="address" class="col-md-2 col-form-label ms-3">
                            Address
                        </label>
                        <div class="col-md-8">
                        <input type="text"
                          class="form-control"
                          placeholder="address(obligatoire)"
                          id="address"/>
                    </div>
                </div>      
          </div>
       <div class="card-footer">
        <div class="form-group row">
          <div class="offset-md-2 col-md-8">
            <button class="btn btn-primary me-3" type="submit">
                enregistrer
            </button>
            <button class="btn btn-outline-secondary me-3" 
            type="reset"> annuler </button>
        
</div>
</div>
</div>
</form>
</div>
