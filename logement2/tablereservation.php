<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tableau des reservation</title>
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
    <section class="home">
        <div class="content">
        <table>
            <tr id="items">
                <th>Lieu</th>
                <th>Prix</th>
                <th>numero de telephone</th>
                <th>Description</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            include_once "connexionbd.php";
            $req=mysqli_query($con, "SELECT * FROM reservation");
            if(mysqli_num_rows($req)==0){
                echo "Aucun enregistrement trouver";
            }else{
                while($row = mysqli_fetch_assoc($req)){
                    echo'
                <tr>
                    <td>'.$row['lieu'].'</td>
                    <td>'.$row['prix'].'</td>
                    <td>'.$row['numero'].'</td>
                    <td>'.$row['descrip'].'</td>
                    <td><a href=modifierr.php?id='.$row['id_reservation'].'><img src="image/modifier.png" alt="" srcset="" class="img"></a></td>
                    <td><a href=supprimerr.php?id='.$row['id_reservation'].'><img src="image/supprimer.png" alt="" srcset="" class="img"></a></td>
                </tr> ';
                }
            }
           ?>
        </table>
        </div>
    </section>
</body>
</html>