<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
<style>
</style>
<title></title>
</head>
<body>
    <form action=""  method="POST">

      <?php
      include("menu.php");?>
      <p class="cat">
        Sugeridos
      </p>
      <br>
          <?php
          session_start();
          $user = $_SESSION["sesion_user"];
          $activ = "Activo";
          $pers = $base->query("SELECT ult_libro FROM Cliente WHERE username='$user'")->fetchAll(PDO::FETCH_OBJ);
          foreach($pers as $Sel):
          $registros = $base->query("SELECT *FROM Libro WHERE categoria='$Sel->ult_libro'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Libros):
              echo "<p class='libro'>";
              echo "<a href='#'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Libros->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Libros->nombre."<br>";
            ?>
        </a>
          <?php
          echo $Libros->autor."<br>";
          echo $Libros->editorial."<br>";
          echo $Libros->precio." $<br>";
          ?>
          <a href="pago.php?id=<?php echo $Libros->id;?>">
            <input type="button" class="comprar" value="Comprar" id="comprar">
          </a>
          
          <?php                          
          endforeach;
          endforeach;
         ?>
      <p class="cat">
        Los mas populares
      </p>
      <?php
          $activ = "Activo";
           $regi = $base->query("SELECT *FROM popular ORDER BY id DESC LIMIT 10")->fetchAll(PDO::FETCH_OBJ);
              foreach($regi as $id):
              $Lib = $base->query("SELECT *FROM Libro WHERE id = '$id->id'")->fetchAll(PDO::FETCH_OBJ);
              foreach($Lib as $Libros):
              echo "<p class='libro'>";
              echo "<a href='#'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Libros->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Libros->nombre."<br>";
            ?>
        </a>
          <?php

          echo $Libros->id."<br>";
          echo $Libros->autor."<br>";
          echo $Libros->editorial."<br>";
          echo $Libros->precio." $<br>";
          ?>
          <a href="pago.php?id=<?php echo $Libros->id;?>">
            <input type="button" class="comprar" value="Comprar" id="comprar">
          </a>
          
          <?php                          
          endforeach;
          endforeach;?>

    <p class="cat">
        Todos
      </p>
    <br>
          <?php
          $activ = "Activo";
           $registros = $base->query("SELECT *FROM Libro WHERE estatus='$activ'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Libros):
              echo "<p class='libro'>";
              echo "<a href='#'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Libros->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Libros->nombre."<br>";
            ?>
        </a>
          <?php
          echo $Libros->autor."<br>";
          echo $Libros->editorial."<br>";
          echo $Libros->precio." $<br>";
          ?>
          <a href="pago.php?id=<?php echo $Libros->id;?>">
            <input type="button" class="comprar" value="Comprar" id="comprar">
          </a>
          
          <?php                          
          endforeach;?>

    </form>
</body>

</html>