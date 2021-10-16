<?php
    $id = $_GET["id"];  
    $status = "Borrado";
    include("conection.php");
    $base->query("UPDATE Libro SET estatus='$status' WHERE id ='$id'");
    header("Location:mislibros.php");
?>