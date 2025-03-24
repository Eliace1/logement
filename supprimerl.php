<?php
include_once "connexionbd.php";

// recupération de l'id dans le lien 
$id = $_GET['id'];
$req = mysqli_query($con, "DELETE FROM ajout WHERE id_ajout=$id");
// redirection vers la page.php

header("location:tablogement.php")
?>