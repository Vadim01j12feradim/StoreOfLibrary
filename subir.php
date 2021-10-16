<?php

    session_start();
    $user = $_SESSION["sesion_user"];
    $precio = $_POST["precio"];
    $categorie = $_POST["categorie"];
    $editorial = $_POST["editorial"];
    $name = $_POST["nombre"];
    $autor = $_POST["autor"];
    $status = "Activo";

    $revisar = getimagesize($_FILES["archivo"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES["archivo"]["tmp_name"];
        $imgcontent = addslashes(file_get_contents($image));
        $db = new mysqli("localhost","Vadim","Maluma2001","amazon");

        if($db->connect_error)
            echo "Ocurrio un error al conectar con la base de datos";
        $sql = $db->query("INSERT INTO Libro(precio,categoria,editorial,nombre,autor,Contenido,id,propietario,estatus)
        values ('$precio','$categorie','$editorial','$name','$autor','$imgcontent',0,'$user','$status')");
        if($sql){
            header("Location:mislibros.php");
        }
        else
            echo "Error al registrar al usuario";
    }
    else
        echo"Selecciones una imagen de perfil";

?>


