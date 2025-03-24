<?php
    include_once "connexionbd.php";
    if(isset($_POST['button'])){
        extract($_POST);
        $req=mysqli_query($con, "SELECT email, mdp FROM client WHERE email='$email' AND mdp='$mdp'");
        $req1=mysqli_query($con, "SELECT email, mdp FROM administrateur WHERE email='$email' AND mdp='$mdp'");
        if(mysqli_num_rows($req)>0){
            header("location:index2.php");
        }elseif(mysqli_num_rows($req1)>0){
            header("location:ajout.php");
        }else{
            $message='<p class="s">mot de passe ou addresse email incorrect</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="exo3.css">
    <title>Connexion</title>
</head>
<body>
     <div class="container">
        <form action="" method="POST">
            <p class="b"><a href="index.php"><i class="ri-home-4-line"></i>Accueil</a></p>
            <p>LY~Logement</p></br>
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
            <i class="ri-user-line"></i>
            <input type="email" placeholder="Email" name="email" required><br>
            <i class="ri-git-repository-private-fill"></i>
            <input type="password" placeholder="Mot de passe" name="mdp" required><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" value="connexion" name="button" id=""><br>
            <p class="s">je n'ai pas de compte?<a href="inscrire.php">s'incrire</a></p>
            <a href="#">Mot de passe oublie</a>
        </form>
        <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
</body>
</html>