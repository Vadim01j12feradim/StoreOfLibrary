<!DOCTYPE html>
<html>
<LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>

    <head>
        <meta charset="utf-8">
        <title>Sube tu libro <?php  
          session_start();
          $user = $_SESSION["sesion_user"];
          echo $user;
           ?></title>
        <style>
        </style>
    </head>
    <body class="center">
        <form action="subir.php" method="POST" enctype="multipart/form-data">
            <div class="reglib">
            Registra tu nuevo libro <?php 
           echo " ".$user;
            ?>
            <br><br>
            Precio<input step="0.01" class="inlib" type="number" name="precio" required>
            <br>
            Categoria<input type="text" class="inlib" name="categorie" required>
            <br>
            Editorial<input type="text"class="inlib" name="editorial" required>
            <br>
            Nombre<input type="text"class="inlib" name="nombre" required>
            <br>
            Autor<input type="text"class="inlib" name="autor" required>
            <br>
            Selecciona la imagen del libro 
            <input type="file" name="archivo" size="20" required>
            <br>
            <br>
            <input type="submit" class="pointer" value="Guardar">
        </div>
        </form>
    </body>
</html>