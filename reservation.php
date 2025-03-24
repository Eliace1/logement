<?php
    include_once "connexionbd.php";
    if(isset($_POST['reserver'])){
        extract($_POST);

        $req=mysqli_query($con, "SELECT lieu, prix, descrip FROM reservation WHERE lieu='$lieu' AND prix = '$prix' AND descrip ='$description' ");
        if(mysqli_num_rows($req) > 0){
            $message = '<p class="s">deja reserver</p>';
        }else{
            mysqli_query($con, "INSERT INTO reservation VALUES(null, '$lieu', '$prix', '$numero', '$description')");
            $message = '<p class="s">merci pour la reservation</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exo5.css">
    <title>Reservation</title>
</head>
<body>
<div class="container">
        <form action="" method="POST">
          <p class="b"><a href="index2.php">Accueil</a></p>
            <p>LY~Logement</p></br>
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
           <input type="text" placeholder="Lieu du logement" name="lieu" required><br>
            <input type="text"placeholder="prix du logement" name="prix" required><br>
            <input type="text" placeholder="numero de telephone" name="numero" required><br>
            <textarea  id="" placeholder="veillez decrire le lieu" cols="30" rows="10" name="description" required></textarea><br>
            <input type="submit" style="cursor: pointer;margin-top: 10px;font-size: 1rem;width: 150px;" 
            value="reserver" name="reserver" id=""><br>
        </form>
      <div class="drop drop-1"></div>
     <div class="drop drop-2"></div>
     <div class="drop drop-3"></div>
     <div class="drop drop-4"></div>
     <div class="drop drop-5"></div>
     </div>
</body>
</html>