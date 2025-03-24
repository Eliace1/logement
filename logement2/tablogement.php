<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exo6.css">
    <title>liste des logements</title>
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
    <div class="result">
        <div class="result-content">
            <h3>liste des Logements</h3>
            <div class="liste-produits">
                <?php
                    // affichage des produits ajoute
                    include_once "connexionbd.php";
                    $req3= mysqli_query($con, "SELECT * FROM ajout");
                    if(mysqli_num_rows($req3)==0){
                        echo "aucun produit trouve";
                    }else{
                        while($row = mysqli_fetch_assoc($req3)){
                            echo'
                            <div class="produit">
                                <div class="image-prod">
                                    <img src="image/'.$row['imag'].'" alt="" srcset=""> 
                                </div>
                                <div class="text">
                                    <strong><p class="titre">'.$row['lieu'].'</p></strong>
                                    <p class="description">'.$row['descrip'].'</p>
                                </div>
                                <div class="">
                                    <a href=supprimerl.php?id='.$row['id_ajout'].'><img src="image/supprimer.png"></a>
                                   <a href=modifierl.php?id='.$row['id_ajout'].'> <img src="image/modifier.png"></a>
                                </div>
                        </div>';
                        }
                    }
                ?>
                <!-- produit -->
                
                
            </div>
        </div>
    </div>
</body>
</html>