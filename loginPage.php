<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<h1>Connectez vous</h1>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Mot de passe" name="mot_de_passe" />
			<a href="forget_password.php">Mot de passe oublié?</a>
			<button type="submit" class="btn btn-primary" name="submit">Connectez vous</button> <br/>
			<?php
                  $servername = "localhost";
                  $username = "newUsers";
                  $password = "password";
                  $dbname = "adfi_système";
                 $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if (isset($_POST['submit'])) {
                  $adminEmail = htmlspecialchars($_POST['email']);
                  $adminPassword =  htmlspecialchars($_POST['mot_de_passe']);
                  
                  password_hash($adminPassword, PASSWORD_DEFAULT);

                  $findEmail = $connection->prepare('SELECT email from adminadfi where email = ?');
                  $findEmail->execute(array($adminEmail));

                  $findPassword = $connection->prepare('SELECT mot_de_passe from adminadfi where mot_de_passe = ?');
                  $findPassword->execute(array($adminPassword));

               if($findEmail->rowCount() > 0 && $findPassword->rowCount() > 0) {
	             $_SESSION['connexion'] = true;
	             header('location:admin.php');
                }
              else if(empty($_POST["email"]) || empty($_POST['mot_de_passe'])) {
	              echo "<p style='color:red;'>Veuillez vous authentifier svp.</p>";
              }
             else {
	                  echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
                  }
           }
          if (isset($_GET["login"]))
          {
             echo "<p style='color:blue;'>Vous venez de vous déconnecter.</p>";
          }
        
        if (isset($_GET["msgAdmin"]))
         {
             echo "<p style='color:blue;'>Vous etes déconnecté. Veuillez vous reconnecter svp!</p>";
         }
      
        ?>
		</form>
	</div>
	<div class="overlay-container">
		<img src="images.jpeg" alt="téléchargement" style="width:370px;height:370px;position:relative;top:50px;"/>
	</div>
</div>
</body>
</html>