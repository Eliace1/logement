<?php
    include_once "connexionbd.php";
    $id=$_GET['id'];
   $req = mysqli_query($con, "DELETE  FROM client WHERE id_client = $id");
    header("location:tableclient.php")
?>