<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>table des Clients</title>
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
                <th>Nom</th>
                <th>Numero de telephone</th>
                <th>email</th>
                <th>mot de passe</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            include_once "connexionbd.php";
            $req=mysqli_query($con, "SELECT * FROM client");
            if(mysqli_num_rows($req)==0){
                echo "Aucun enregistrement trouver";
            }else{
                while($row = mysqli_fetch_assoc($req)){
                    echo'
                <tr>
                    <td>'.$row['nom'].'</td>
                    <td>'.$row['numtel'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['mdp'].'</td>
                    <td><a href=modifier.php?id='.$row['id_client'].'><img src="image/modifier.png" alt="" srcset="" class="img"></a></td>
                    <td><a href=supprimer.php?id='.$row['id_client'].'><img src="image/supprimer.png" alt="" srcset="" class="img"></a></td>
                </tr> ';
                }
            }
           ?>
        </table>
        </div>
    </section>
</body>
</html>