<?php
    $id = $_GET["id"];
    if(isset($_GET["next"])){
        $next = $_GET["next"];
        $R = "Location:adminVents.php";
        
    }
        
    else{
        $next = $_GET["con"];
        $R ="Location:perfil.php";
    }
    echo $R;
    include("conection.php");
    $base->query("UPDATE Compra SET estatus='$next' WHERE id ='$id'");
    header($R); 
           
?>