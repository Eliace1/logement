<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>modifier</title>
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
        <div class="container">
        <form action="" method="POST">
            <?php
            include_once "connexionbd.php";
        $id = $_GET['id']; 
            $req = mysqli_query($con, "SELECT * FROM client WHERE id_client=$id");
            $row = mysqli_fetch_assoc($req);
            $message='<p class="s">Modification</p>';
            if(isset($_POST['modifier'])){
                extract($_POST);
                $req = mysqli_query($con, "UPDATE client SET nom = '$nom', numtel = '$numtel', email = '$email', mdp = '$mdp' WHERE id_client = $id ");
                if($req){
                    $message='<p class="s"> modification effectuer avec succes</p>';
                }

            
            }
            echo $message;
            echo'
            <input type="text" placeholder="Nom et Prenom" value="'.$row['nom'].'" name="nom" required><br>
            <input type="number" placeholder="Numero de Telephone" value="'.$row['numtel'].'" name="numtel" required><br>
            <input type="email" placeholder="Email" name="email" value="'.$row['email'].'" required><br>
            <input type="text" placeholder="Mot de passe" name="mdp" value="'.$row['mdp'].'" required><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" class="inscrire" value="Modifier"  name="modifier" id=""><br>'
        ?>
        </form>
      <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
        
        </div>
    </section>
</body>
</html>