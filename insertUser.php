<?php
    $name = $_POST["name"];
    $ape1 = $_POST["ape1"];
    $ape2 = $_POST["ape2"];
    $username = $_POST["username"];
    $passwordd = $_POST["passwordd"];
    $revisar = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES["imagen"]["tmp_name"];
        $imgcontent = addslashes(file_get_contents($image));
        $db = new mysqli("localhost","Vadim","Maluma2001","amazon");

        if($db->connect_error)
            echo "Ocurrio un error al conectar con la base de datos";
        $sql = $db->query("INSERT INTO Cliente(nombre,ape1,ape2,Contenido,username,passwordd)
            values ('$name','$ape1','$ape2','$imgcontent','$username','$passwordd')");
        if($sql){
            //echo"Registro exitoso";
            header("Location:index.php");
        }
        else
            echo "Error al registrar al usuario";
    }
    else
        echo"Selecciones una imagen de perfil";
?>