<?php
    include_once "connexionbd.php";
    $id=$_GET['id'];
   $req = mysqli_query($con, "DELETE  FROM reservation WHERE id_reservation = $id");
    header("location:tablereservation.php")
?>