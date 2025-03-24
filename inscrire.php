<?php
    include_once "connexionbd.php";
    if(isset($_POST['inscrire'])){
        extract($_POST);
        $email=$_POST['email'];
        $req=mysqli_query($con, "SELECT email, numtel FROM client WHERE numtel='$numtel' OR email = '$email' ");
        if(mysqli_num_rows($req) > 0){
            $message = '<p class="s">addresse email ou numero de telephone deja utilise</p>';
        }else{
            mysqli_query($con, "INSERT INTO client VALUES(null, '$nom', '$numtel', '$email', '$mdp')");
            $message = '<p class="s">vous etes inscrit</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exo5.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
          <p class="b"><a href="index.php">Accueil</a></p>
            <p>LY~Logement</p></br>
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
            <input type="text" placeholder="Nom et Prenom" name="nom" required><br>
            <input type="number" placeholder="Numero de Telephone" name="numtel" required><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <input type="password" placeholder="Mot de passe" name="mdp" required><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" class="inscrire" value="S'inscrire"  name="inscrire" id=""><br>
            <p class="s">j'ai un compte?<a href="connexion.php">se connecter</a></p>
        </form>
      <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
</body>
</html>