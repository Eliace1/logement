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
        <form action="" method="POST">
            <?php
                    include_once "connexionbd.php";
                    $id = $_GET['id']; 
                        $req = mysqli_query($con, "SELECT * FROM reservation WHERE id_reservation=$id");
                        $row = mysqli_fetch_assoc($req);
                        $message='<p class="s">Modification</p>';
                        if(isset($_POST['modifier'])){
                            extract($_POST);
                            $req = mysqli_query($con, "UPDATE reservation SET lieu = '$lieu', prix = '$prix', numero = '$numero', descrip = '$description' WHERE id_reservation = $id ");
                            if($req){
                                $message='<p class="s"> modification effectuer avec succes</p>';
                            }
                        }
                        echo'
           <input type="text" placeholder="Lieu du logement" name="lieu" value='.$row['lieu'].' required><br>
            <input type="text"placeholder="prix du logement" name="prix" value='.$row['prix'].' required><br>
            <input type="text" placeholder="numero de telephone" name="numero" value='.$row['numero'].' required><br>
            <textarea  id="" placeholder="veillez decrire le lieu" cols="30" rows="10" name="description" required>'.$row['descrip'].'</textarea><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" value="modifier" name="modifier" id=""><br>';
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