
<?php
$idParam = intval($_GET['id']);
if($idParam) {
    $serverName = "localhost";
    $userName = "newUsers";
    $password = "password";
    $dbName = "adfi_système";
    try {
        $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = $connexion->prepare("DELETE from eleves where id = :idParam");
        $request->bindValue(':idParam', $idParam);
        $request->execute();
        header('location:admin.php?sup=suppression');
    
    }
    catch (PDOException $e) {
        echo "Error : ". $e->getMessage();
    }

}
?>