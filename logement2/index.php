
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="exo1.css">
    <title>Accueil</title>
    <script>
        function reserver(){
            alert("veillez vous connecter");
        }
    </script>
</head>
<body>
    <header class="header">
    <h1>Ly~Logement</h1>
        <nav class="nav">
            <a href="index.php">Accueil</a>
            <a href="#" Onclick= "reserver()">Reservation</a>
            <a href="connexion.php">Connexion</a>
            <a href="#">A propos</a>
        </nav>
    </header>
    <section class="home">
        <div class="content"> 
            <h2>Bonjour ici Ly~Logement </h2><br>
            <p>Retrouver tous vos logement en un clic</p><br>
            <form action="" method="POST">
                <div class="search">
                    
                        <button type="submit" name="button"><i class="ri-home-line"></i></button>
                        <input type="text" name="lieu" placeholder="Recherche">
                
                </div>
            </form>
        </div>
        <div class="img">
        <img src="image/3.jpg" alt="" srcset="">
    </div>   
    </section>
    <section id="logement">
        <h1 class="title">Liste des logements</h1>
        <div class="content">
        <?php
        include_once "connexionbd.php";
        if(isset($_POST['button'])){
            extract($_POST);
            $req=mysqli_query($con, "SELECT * FROM ajout WHERE lieu='$lieu'");
        }else{
        $req=mysqli_query($con, "SELECT * FROM ajout");
        }
        if(mysqli_num_rows($req)==0){
            echo '<img src="image/not_found.png">
            Aucun element trouve';
        }else{
            while($row = mysqli_fetch_assoc($req)){
                echo'
            <div class="box">
            <h4>'.$row['lieu'].'</h4>
                <img src="image/'.$row['imag'].'" alt="">
                <div class="content">
                    <div>
                        <h4>Description</h4>
                        '.$row['descrip'].'
                    </div>
                </div>
            </div>';
            }
        }
        ?>
        </div>
    </section>
        <footer>
        <p> Réalisé par &copy;<span>Eliace</span> | Tous les droits sont réservés. Contacter 673455487/695364775 pour tous vos probleme technique</p>
    </footer>
</body>
</html>