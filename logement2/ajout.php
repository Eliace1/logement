<?php
    include_once "connexionbd.php";
     if(isset($_POST['button'])){
        //  extract($_POST);
        $lieu=$_POST['lieu'];
        $description=$_POST['description'];
         //verifier si le produit existe deja
        //  $req1 = mysqli_query($con, "SELECT  lieu,descrip FROM produit WHERE lieu = '$lieu' AND descrip = '$descrip' ");
    //     if(mysqli_num_rows($req1) > 0){
    //          $message = '<p style="color:#ff800">Le lieu existe deja</p>';
        
    //  }else{
              if(isset($_FILES['image'])){
                 $img_nom = $_FILES['image']['name'];//on recupere le nom de l'image
                 $tmp_nom = $_FILES['image']['tmp_name'];// nous definisson un nom temporaire
                 $time = time();//On recuper l'heure actuelle
                //on renomme l'image
                 $nouveau_nom_img = $time.$img_nom;
                //on deplace l'image dans le dossier image
                 $deplacer_image = move_uploaded_file($tmp_nom,"image/".$nouveau_nom_img);
                 if($deplacer_image){
                     //si l'image a ete deplacer
                     //inserons le titre ,la description et le nom de l'image dans la base de donnes
                     $req2= mysqli_query($con, "INSERT INTO ajout VALUES(NULL,'$lieu','$description','$nouveau_nom_img')");
                     if($req2){
                         $message = '<p class="s">logement ajoute !</p>';
                     }else{
                        $message = '<p class="s">logement non  ajoute !</p>';
                     }
                 }
             }else{
                $message='<p class="s">bonjour</p>';
             }
         }
    // }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exo2.css">
    <title>Ajouter logement</title>
</head>
<body>
<header class="header">
    <h1>Ly~Logement</h1>
        <nav class="nav">
            <a href="tableclient.php">Liste des clients</a>
            <a href="tablereservation.php">liste des reservations</a>
            <a href="ajout.php">Ajouter un logement</a>
            <a href="connexion.php">deconnexion</a>
            <a href="tablogement.php">liste des logements</a>
        </nav>
    </header>
<div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
            <input type="text" placeholder="Lieu du logement" name="lieu" required><br>
            <textarea  id="" placeholder="veillez decrire le lieu" cols="30" rows="10" name="description" required></textarea><br>
            <input type="file" name="image" required><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" 
            value="Ajouter" name="button" id=""><br>
        </form>
        <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
</body>
</html>