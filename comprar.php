<?php
    session_start();
    $user = $_SESSION["sesion_user"];
    $tipo_pago = $_GET["tipo"];
    $id = 0;
    $id_libro =  $_GET["id"];
    $estarus = "Preparando tu paquete";

    include("conection.php");
    $reg = $base->query("SELECT *FROM Libro WHERE id='$id_libro'")->fetchAll(PDO::FETCH_OBJ);
    foreach($reg as $obt){
        if(strcmp($tipo_pago,"Envio estandar") !== 0)
            $coste =  $obt->precio + 100;
        else
            $coste = $obt->precio;
    }
    $base->query("INSERT INTO Compra(id,cliente,id_libro,estatus,coste,metodo_pago) values ('$id','$user','$id_libro','$estarus','$coste','$tipo_pago')");
    $pop = $base->query("SELECT *FROM popular WHERE id='$id_libro'")->fetchAll(PDO::FETCH_OBJ);
    $vandera = 0;
    foreach($pop as $agr){
        $vandera = 1;
        $inc = $agr->cantidad + 1;
        $base->query("UPDATE popular SET cantidad='$inc' WHERE id ='$id_libro'");
      }
    $xd = 1;
    if($vandera == 0){
        $base->query("INSERT INTO popular(id,cantidad) values ('$id_libro','$xd')");
    }
    header("Location:perfil.php");
?>