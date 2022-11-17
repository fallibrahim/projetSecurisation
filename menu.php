
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <style>
        #disconnect {
            position : relative;
            left : 750px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary p-4">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">ADFI SYSTEME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="accueil.php">ACCUEIL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="admin.php">ADMINISTRATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white me-2 d-flex" id="disconnect" href="deconnection.php" tabindex="-1" aria-disabled="true"><span class="material-symbols-outlined me-2">
                logout</span>SE DECONNECTER</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</body>
</html>