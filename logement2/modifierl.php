<style>
*{
    margin: 0;
    padding: 0;
    outline: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
html {
    scroll-behavior: smooth;
    scroll-padding-top: 9px;
}
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
.header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: black;
    padding: 10px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
    color: white;
}
.nav a{
    position: relative;
    font-size: 1.1em;
    color: white;
    text-decoration: none;
    margin-left: 40px;
}
.nav a::after{
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: white;
    border-radius: 5px;
    transform: scaleX(0);
}
.nav a:hover::after{
    transform: scaleX(1);

}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exo5.css">
    <title>Modifier</title>
</head>
<body>
<div class="container">
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
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
                    include_once "connexionbd.php";
                    $id = $_GET['id']; 
                        $req = mysqli_query($con, "SELECT * FROM ajout WHERE id_ajout=$id");
                        $row = mysqli_fetch_assoc($req);
                        $message='<p class="s">Modification</p>';
                        if(isset($_POST['modifier'])){
                            extract($_POST);
                            if(isset($_FILES['image'])){
                                $img_nom = $_FILES['image']['name'];//on recupere le nom de l'image
                                $tmp_nom = $_FILES['image']['tmp_name'];// nous definisson un nom temporaire
                                $time = time();//On recuper l'heure actuelle
                               //on renomme l'image
                                $nouveau_nom_img = $time.$img_nom;
                               //on deplace l'image dans le dossier image
                                $deplacer_image = move_uploaded_file($tmp_nom,"image/".$nouveau_nom_img);
                        }
                            $req = mysqli_query($con, "UPDATE ajout SET lieu = '$lieu', descrip = '$description', imag='$nouveau_nom_img'  WHERE id_ajout = $id ");
                            if($req){
                                $message='<p class="s"> modification effectuer avec succes</p>';
                            }

                        }
                        echo'             
            <input type="text" placeholder="Lieu du logement" value="'.$row['lieu'].'" name="lieu" required><br>
            <textarea  id="" placeholder="veillez decrire le lieu" cols="30" rows="10" name="description" required>'.$row['descrip'].'</textarea><br>
            <input type="file" name="image" required><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" 
            value="Modifier" name="modifier" id=""><br>'
            ?>
        </form>
      <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
</body>
</html>